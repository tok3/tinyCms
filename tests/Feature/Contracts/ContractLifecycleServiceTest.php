<?php

use App\Models\Company;
use App\Models\Contract;
use App\Models\MollieSubscription;
use App\Services\Contracts\ContractLifecycleService;
use Carbon\CarbonImmutable;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

uses(TestCase::class, DatabaseTransactions::class);

afterEach(function () {
    CarbonImmutable::setTestNow();
});

function makeLifecycleServiceContract(array $overrides = []): Contract
{
    return Contract::query()->create(array_merge([
        'contractable_type' => Company::class,
        'contractable_id' => 999999,
        'product_name' => 'Lifecycle Test',
        'price' => 1000,
        'interval' => 'monthly',
        'iteration' => 1,
        'start_date' => '2025-06-24',
        'end_date' => '2027-06-24',
        'status' => Contract::STATUS_ACTIVE,
        'auto_renew' => true,
        'notice_period_months' => 3,
        'renewal_period_months' => 12,
    ], $overrides));
}

it('keeps a normal cancellation received on the deadline in the current term', function () {
    $contract = makeLifecycleServiceContract();

    $result = app(ContractLifecycleService::class)->scheduleCancellation(
        $contract->id,
        CarbonImmutable::parse('2027-03-24'),
        null,
        'Kündigung der Kundin',
        null
    );

    expect($result->status)->toBe(Contract::STATUS_CANCELLATION_PENDING)
        ->and($result->auto_renew)->toBeFalse()
        ->and($result->end_date->toDateString())->toBe('2027-06-24')
        ->and($result->cancellation_effective_at->toDateString())->toBe('2027-06-24')
        ->and($result->iteration)->toBe(1)
        ->and($result->lifecycleEvents()->where('type', 'cancellation_scheduled')->count())->toBe(1);
});

it('extends a normal cancellation received one day late exactly once', function () {
    $contract = makeLifecycleServiceContract();
    $service = app(ContractLifecycleService::class);

    $result = $service->scheduleCancellation(
        $contract->id,
        CarbonImmutable::parse('2027-03-25'),
        null,
        null,
        null
    );

    expect($result->end_date->toDateString())->toBe('2028-06-24')
        ->and($result->cancellation_effective_at->toDateString())->toBe('2028-06-24')
        ->and($result->iteration)->toBe(2);

    expect(fn () => $service->scheduleCancellation(
        $contract->id,
        CarbonImmutable::parse('2027-03-25'),
        null,
        null,
        null
    ))->toThrow(DomainException::class);

    expect($contract->fresh()->end_date->toDateString())->toBe('2028-06-24')
        ->and($contract->fresh()->iteration)->toBe(2);
});

it('uses no overflow arithmetic at month and leap year boundaries', function () {
    $service = app(ContractLifecycleService::class);
    $mayEnd = makeLifecycleServiceContract(['end_date' => '2028-05-31']);
    $leapEnd = makeLifecycleServiceContract(['end_date' => '2028-02-29']);

    expect($service->normalEffectiveDate($mayEnd, CarbonImmutable::parse('2028-02-29'))->toDateString())
        ->toBe('2028-05-31')
        ->and($service->normalEffectiveDate($mayEnd, CarbonImmutable::parse('2028-03-01'))->toDateString())
        ->toBe('2029-05-31')
        ->and($service->normalEffectiveDate($leapEnd, CarbonImmutable::parse('2027-11-30'))->toDateString())
        ->toBe('2029-02-28');
});

it('rejects normal cancellation for contracts outside the managed lifecycle', function (array $attributes) {
    $contract = makeLifecycleServiceContract($attributes);

    if (($attributes['deleted_at'] ?? null) !== null) {
        DB::table('contracts')->where('id', $contract->id)->update(['deleted_at' => $attributes['deleted_at']]);
    }

    expect(fn () => app(ContractLifecycleService::class)->scheduleCancellation(
        $contract->id,
        CarbonImmutable::parse('2027-03-24'),
        null,
        null,
        null
    ))->toThrow(DomainException::class);
})->with([
    'one-time' => [['interval' => 'one_time']],
    'ended' => [['status' => Contract::STATUS_ENDED]],
    'deleted' => [['deleted_at' => '2026-01-01 00:00:00']],
    'missing end' => [['end_date' => null]],
]);

it('rejects goodwill without a reason', function () {
    CarbonImmutable::setTestNow('2026-10-23 10:00:00');

    expect(fn () => app(ContractLifecycleService::class)->scheduleCancellation(
        makeLifecycleServiceContract()->id,
        CarbonImmutable::parse('2026-10-23'),
        CarbonImmutable::parse('2027-01-15'),
        '   ',
        null
    ))->toThrow(DomainException::class, 'Für Kulanz ist eine Begründung erforderlich.');
});

it('rejects goodwill dates outside today and the normal effective end', function (string $goodwillEnd, string $message) {
    CarbonImmutable::setTestNow('2026-10-23 10:00:00');

    expect(fn () => app(ContractLifecycleService::class)->scheduleCancellation(
        makeLifecycleServiceContract()->id,
        CarbonImmutable::parse('2026-10-23'),
        CarbonImmutable::parse($goodwillEnd),
        'Kulanz nach Rücksprache',
        null
    ))->toThrow(DomainException::class, $message);
})->with([
    ['2026-10-22', 'Ein Kulanzende darf nicht in der Vergangenheit liegen.'],
    ['2027-06-25', 'Ein Kulanzende darf nicht nach dem normalen Vertragsende liegen.'],
]);

it('accepts today or a future goodwill end and preserves the normal end', function (string $goodwillEnd) {
    CarbonImmutable::setTestNow('2026-10-23 10:00:00');
    $contract = makeLifecycleServiceContract();

    $result = app(ContractLifecycleService::class)->scheduleCancellation(
        $contract->id,
        CarbonImmutable::parse('2026-10-23'),
        CarbonImmutable::parse($goodwillEnd),
        'Kulanz nach Rücksprache',
        null
    );
    $event = $result->lifecycleEvents()->where('type', 'goodwill_cancellation_scheduled')->firstOrFail();

    expect($result->end_date->toDateString())->toBe($goodwillEnd)
        ->and($result->cancellation_effective_at->toDateString())->toBe($goodwillEnd)
        ->and($result->cancellation_is_goodwill)->toBeTrue()
        ->and($result->cancellation_reason)->toBe('Kulanz nach Rücksprache')
        ->and($event->context['previous_end_date'])->toBe('2027-06-24')
        ->and($event->context['normal_effective_date'])->toBe('2027-06-24');
})->with(['2026-10-23', '2027-01-15']);

it('revokes a pending cancellation while keeping an active Mollie subscription', function () {
    CarbonImmutable::setTestNow('2026-10-23 10:00:00');
    $actorId = DB::table('users')->insertGetId([
        'name' => 'Admin',
        'email' => 'lifecycle-admin-1@example.test',
        'password' => 'not-used',
        'created_at' => now(),
        'updated_at' => now(),
    ]);
    MollieSubscription::query()->create([
        'subscription_id' => 'sub_active_revoke',
        'customer_id' => 'cst_active_revoke',
        'amount_value' => 10,
        'amount_currency' => 'EUR',
        'interval' => '1 month',
        'status' => 'active',
        'start_date' => '2025-07-24 00:00:00',
    ]);
    $contract = makeLifecycleServiceContract([
        'subscription_id' => 'sub_active_revoke',
        'subscription_start_date' => '2025-07-24',
    ]);
    $service = app(ContractLifecycleService::class);
    $service->scheduleCancellation($contract->id, CarbonImmutable::parse('2026-10-23'), null, null, $actorId);

    $result = $service->revokeCancellation($contract->id, 'Eingabefehler korrigiert', false, $actorId);
    $event = $result->lifecycleEvents()->where('type', 'cancellation_revoked')->firstOrFail();

    expect($result->status)->toBe(Contract::STATUS_ACTIVE)
        ->and($result->auto_renew)->toBeTrue()
        ->and($result->subscription_id)->toBe('sub_active_revoke')
        ->and($result->cancellation_received_at)->toBeNull()
        ->and($result->cancellation_effective_at)->toBeNull()
        ->and($event->user_id)->toBe($actorId)
        ->and($event->context['reason'])->toBe('Eingabefehler korrigiert');

    expect(fn () => $service->revokeCancellation($contract->id, 'Noch einmal', false, $actorId))
        ->toThrow(DomainException::class, 'Es gibt keine Kündigung, die zurückgenommen werden kann.');
});

it('restores the normal end when revoking a goodwill cancellation', function () {
    CarbonImmutable::setTestNow('2026-10-23 10:00:00');
    $contract = makeLifecycleServiceContract();
    $service = app(ContractLifecycleService::class);
    $service->scheduleCancellation(
        $contract->id,
        CarbonImmutable::parse('2026-10-23'),
        CarbonImmutable::parse('2026-12-31'),
        'Kulanz',
        null
    );

    $result = $service->revokeCancellation($contract->id, 'Kündigung war irrtümlich', false, null);

    expect($result->end_date->toDateString())->toBe('2027-06-24')
        ->and($result->cancellation_is_goodwill)->toBeFalse();
});

it('applies every contractually due renewal when revoking after deadlines', function () {
    CarbonImmutable::setTestNow('2026-10-23 10:00:00');
    $contract = makeLifecycleServiceContract();
    $service = app(ContractLifecycleService::class);
    $service->scheduleCancellation($contract->id, CarbonImmutable::parse('2026-10-23'), null, null, null);

    CarbonImmutable::setTestNow('2029-04-01 10:00:00');
    $result = $service->revokeCancellation($contract->id, 'Vertrag soll weiterlaufen', false, null);

    expect($result->end_date->toDateString())->toBe('2030-06-24')
        ->and($result->iteration)->toBe(4);
});

it('requires confirmation and switches a remotely canceled subscription to invoices', function () {
    CarbonImmutable::setTestNow('2026-10-23 10:00:00');
    MollieSubscription::query()->create([
        'subscription_id' => 'sub_canceled_revoke',
        'customer_id' => 'cst_canceled_revoke',
        'amount_value' => 10,
        'amount_currency' => 'EUR',
        'interval' => '1 month',
        'status' => 'canceled',
        'start_date' => '2025-07-24 00:00:00',
    ]);
    $contract = makeLifecycleServiceContract([
        'subscription_id' => 'sub_canceled_revoke',
        'subscription_start_date' => '2025-07-24',
        'mollie_canceled_at' => '2026-10-22 07:30:00',
    ]);
    DB::table('mollie_payments')->insert([
        'payment_id' => 'tr_last_paid_revoke',
        'mode' => 'live',
        'amount_value' => 10,
        'amount_currency' => 'EUR',
        'settlement_amount_value' => 10,
        'settlement_amount_currency' => 'EUR',
        'amount_remaining_value' => 0,
        'description' => 'Letzte Zahlung',
        'status' => 'paid',
        'paid_at' => '2026-10-01 08:00:00',
        'sequence_type' => 'recurring',
        'subscription_id' => 'sub_canceled_revoke',
        'created_at' => '2026-10-01 08:00:00',
        'updated_at' => '2026-10-01 08:00:00',
    ]);
    $service = app(ContractLifecycleService::class);
    $service->scheduleCancellation($contract->id, CarbonImmutable::parse('2026-10-23'), null, null, null);

    expect(fn () => $service->revokeCancellation($contract->id, 'Kündigung war falsch', false, null))
        ->toThrow(DomainException::class, 'Die Umstellung auf normale Rechnung muss bestätigt werden.');

    $result = $service->revokeCancellation($contract->id, 'Kündigung war falsch', true, null);
    $event = $result->lifecycleEvents()->where('type', 'reactivated_on_invoice')->firstOrFail();

    expect($result->subscription_id)->toBeNull()
        ->and($result->subscription_start_date)->toBeNull()
        ->and($result->mollie_canceled_at)->toBeNull()
        ->and(MollieSubscription::where('subscription_id', 'sub_canceled_revoke')->value('status'))->toBe('canceled')
        ->and($event->context['former_subscription_id'])->toBe('sub_canceled_revoke')
        ->and($event->context['last_paid_at'])->toBe('2026-10-01');
});

it('restores feature access when a canceled contract is reactivated', function () {
    CarbonImmutable::setTestNow('2026-10-23 10:00:00');
    $companyId = DB::table('companies')->insertGetId([
        'name' => 'Feature GmbH',
        'created_at' => now(),
        'updated_at' => now(),
    ]);
    $featureId = DB::table('features')->insertGetId([
        'name' => 'Lifecycle Feature '.uniqid(),
        'slug' => 'lifecycle-feature-'.uniqid(),
        'created_at' => now(),
        'updated_at' => now(),
    ]);
    $contract = makeLifecycleServiceContract(['contractable_id' => $companyId]);
    DB::table('company_feature')->insert([
        'company_id' => $companyId,
        'feature_id' => $featureId,
        'contract_id' => $contract->id,
        'value' => 1,
        'deleted_at' => now(),
        'created_at' => now(),
        'updated_at' => now(),
    ]);
    $service = app(ContractLifecycleService::class);
    $service->scheduleCancellation($contract->id, CarbonImmutable::parse('2026-10-23'), null, null, null);

    $service->revokeCancellation($contract->id, 'Zugriff wiederherstellen', false, null);

    expect(DB::table('company_feature')->where('contract_id', $contract->id)->value('deleted_at'))->toBeNull();
});

it('keeps separate audit entries for a second cancellation on the same day', function () {
    CarbonImmutable::setTestNow('2026-10-23 10:00:00');
    $contract = makeLifecycleServiceContract();
    $service = app(ContractLifecycleService::class);

    $service->scheduleCancellation($contract->id, CarbonImmutable::parse('2026-10-23'), null, null, null);
    $service->revokeCancellation($contract->id, 'Erste Kündigung zurückgenommen', false, null);
    $service->scheduleCancellation($contract->id, CarbonImmutable::parse('2026-10-23'), null, 'Erneut gekündigt', null);

    expect($contract->lifecycleEvents()->where('type', 'cancellation_scheduled')->count())->toBe(2);
});
