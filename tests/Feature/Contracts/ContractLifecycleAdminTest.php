<?php

use App\Filament\Resources\Admin\ContractResource\Pages\EditContract;
use App\Models\Company;
use App\Models\Contract;
use App\Models\MollieSubscription;
use App\Models\User;
use Filament\Facades\Filament;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;
use Livewire\Livewire;
use Tests\TestCase;

uses(TestCase::class, DatabaseTransactions::class);

beforeEach(function () {
    $userId = DB::table('users')->insertGetId([
        'name' => 'Lifecycle Admin',
        'email' => 'lifecycle-filament-'.uniqid().'@example.test',
        'password' => 'not-used',
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    $this->actingAs(User::findOrFail($userId));
    Filament::setCurrentPanel(Filament::getPanel('admin'));
});

function makeLifecycleAdminContract(array $overrides = []): Contract
{
    return Contract::query()->create(array_merge([
        'contractable_type' => Company::class,
        'contractable_id' => 999999,
        'product_name' => 'Admin Lifecycle Test',
        'product_description' => 'Testbeschreibung',
        'invoice_text' => 'Testleistung',
        'price' => 1000,
        'interval' => 'monthly',
        'iteration' => 1,
        'order_date' => '2025-06-24',
        'start_date' => '2025-06-24',
        'duration' => 24,
        'end_date' => '2027-06-24',
        'status' => Contract::STATUS_ACTIVE,
        'auto_renew' => true,
        'notice_period_months' => 3,
        'renewal_period_months' => 12,
    ], $overrides));
}

it('schedules a normal cancellation through the contract action', function () {
    $contract = makeLifecycleAdminContract();

    Livewire::test(EditContract::class, ['record' => $contract->getRouteKey()])
        ->assertActionExists('scheduleCancellation')
        ->callAction('scheduleCancellation', data: [
            'received_on' => '2027-03-24',
            'is_goodwill' => false,
            'reason' => 'Kündigung per E-Mail',
        ])
        ->assertHasNoActionErrors();

    expect($contract->fresh()->status)->toBe(Contract::STATUS_CANCELLATION_PENDING)
        ->and($contract->fresh()->cancellation_effective_at->toDateString())->toBe('2027-06-24');
});

it('requires a reason for a goodwill cancellation action', function () {
    $contract = makeLifecycleAdminContract();

    Livewire::test(EditContract::class, ['record' => $contract->getRouteKey()])
        ->callAction('scheduleCancellation', data: [
            'received_on' => now()->toDateString(),
            'is_goodwill' => true,
            'goodwill_end' => now()->addMonth()->toDateString(),
            'reason' => '',
        ])
        ->assertHasActionErrors(['reason' => 'required']);

    expect($contract->fresh()->status)->toBe(Contract::STATUS_ACTIVE);
});

it('revokes a cancellation with a mandatory reason', function () {
    $contract = makeLifecycleAdminContract([
        'status' => Contract::STATUS_CANCELLATION_PENDING,
        'auto_renew' => false,
        'cancellation_received_at' => '2027-03-24',
        'cancellation_effective_at' => '2027-06-24',
    ]);
    $contract->lifecycleEvents()->create([
        'type' => 'cancellation_scheduled',
        'occurred_at' => now(),
        'context' => [
            'normal_effective_date' => '2027-06-24',
            'previous_end_date' => '2027-06-24',
        ],
    ]);

    Livewire::test(EditContract::class, ['record' => $contract->getRouteKey()])
        ->assertActionExists('revokeCancellation')
        ->callAction('revokeCancellation', data: ['reason' => ''])
        ->assertHasActionErrors(['reason' => 'required'])
        ->callAction('revokeCancellation', data: ['reason' => 'Irrtümliche Kündigung'])
        ->assertHasNoActionErrors();

    expect($contract->fresh()->status)->toBe(Contract::STATUS_ACTIVE);
});

it('requires invoice fallback confirmation after Mollie was canceled', function () {
    MollieSubscription::query()->create([
        'subscription_id' => 'sub_admin_canceled',
        'customer_id' => 'cst_admin_canceled',
        'amount_value' => 10,
        'amount_currency' => 'EUR',
        'interval' => '1 month',
        'status' => 'canceled',
        'start_date' => '2025-07-24 00:00:00',
    ]);
    $contract = makeLifecycleAdminContract([
        'status' => Contract::STATUS_CANCELLATION_PENDING,
        'auto_renew' => false,
        'subscription_id' => 'sub_admin_canceled',
        'subscription_start_date' => '2025-07-24',
        'cancellation_received_at' => '2027-03-24',
        'cancellation_effective_at' => '2027-06-24',
        'mollie_canceled_at' => now(),
    ]);
    $contract->lifecycleEvents()->create([
        'type' => 'cancellation_scheduled',
        'occurred_at' => now(),
        'context' => [
            'normal_effective_date' => '2027-06-24',
            'previous_end_date' => '2027-06-24',
        ],
    ]);

    Livewire::test(EditContract::class, ['record' => $contract->getRouteKey()])
        ->callAction('revokeCancellation', data: [
            'reason' => 'Irrtümliche Kündigung',
            'confirm_invoice_fallback' => false,
        ])
        ->assertHasActionErrors(['confirm_invoice_fallback' => 'accepted'])
        ->callAction('revokeCancellation', data: [
            'reason' => 'Irrtümliche Kündigung',
            'confirm_invoice_fallback' => true,
        ])
        ->assertHasNoActionErrors();

    expect($contract->fresh()->status)->toBe(Contract::STATUS_ACTIVE)
        ->and($contract->fresh()->subscription_id)->toBeNull();
});

it('does not dehydrate protected lifecycle and Mollie identifiers through the normal form', function () {
    $contract = makeLifecycleAdminContract(['subscription_id' => 'sub_protected']);

    Livewire::test(EditContract::class, ['record' => $contract->getRouteKey()])
        ->fillForm([
            'status' => Contract::STATUS_ENDED,
            'subscription_id' => 'sub_tampered',
            'cancellation_effective_at' => '2026-01-01',
        ])
        ->call('save')
        ->assertHasNoFormErrors();

    expect($contract->fresh()->status)->toBe(Contract::STATUS_ACTIVE)
        ->and($contract->fresh()->subscription_id)->toBe('sub_protected')
        ->and($contract->fresh()->cancellation_effective_at)->toBeNull();
});
