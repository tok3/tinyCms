<?php

use App\Models\Company;
use App\Models\Contract;
use App\Models\ContractLifecycleEvent;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

uses(TestCase::class, DatabaseTransactions::class);

beforeEach(function () {
    Event::swap(new Illuminate\Events\Dispatcher(app()));
});

function makeLifecycleDataContract(array $overrides = []): Contract
{
    return Contract::query()->create(array_merge([
        'contractable_type' => Company::class,
        'contractable_id' => 999999,
        'product_name' => 'Testvertrag',
        'price' => 1000,
        'interval' => 'monthly',
        'iteration' => 1,
        'start_date' => '2026-01-01',
        'end_date' => '2028-01-01',
    ], $overrides));
}

it('enables renewal defaults for every recurring interval', function (string $interval) {
    $contract = makeLifecycleDataContract(['interval' => $interval]);

    expect($contract->status)->toBe(Contract::STATUS_ACTIVE)
        ->and($contract->auto_renew)->toBeTrue()
        ->and($contract->notice_period_months)->toBe(3)
        ->and($contract->renewal_period_months)->toBe(12)
        ->and($contract->isRecurring())->toBeTrue();
})->with(['daily', 'weekly', 'monthly', 'annual', 'yearly']);

it('never enables automatic renewal for one time contracts', function () {
    $contract = makeLifecycleDataContract(['interval' => 'one_time']);

    expect($contract->auto_renew)->toBeFalse()
        ->and($contract->isRecurring())->toBeFalse();
});

it('casts lifecycle values to dates datetimes and booleans', function () {
    $contract = makeLifecycleDataContract([
        'cancellation_received_at' => '2027-03-24',
        'cancellation_effective_at' => '2027-06-24',
        'cancellation_is_goodwill' => 1,
        'mollie_canceled_at' => '2027-06-23 07:30:00',
    ])->fresh();

    expect($contract->cancellation_received_at)->toBeInstanceOf(Carbon\CarbonInterface::class)
        ->and($contract->cancellation_effective_at)->toBeInstanceOf(Carbon\CarbonInterface::class)
        ->and($contract->cancellation_is_goodwill)->toBeTrue()
        ->and($contract->mollie_canceled_at)->toBeInstanceOf(Carbon\CarbonInterface::class);
});

it('records an idempotent lifecycle event with context', function () {
    $contract = makeLifecycleDataContract();

    $first = ContractLifecycleEvent::record(
        $contract,
        'renewed',
        ['old_end_date' => '2028-01-01', 'new_end_date' => '2029-01-01'],
        null,
        'renewal:'.$contract->id.':2028-01-01'
    );
    $second = ContractLifecycleEvent::record(
        $contract,
        'renewed',
        ['old_end_date' => 'ignored-on-retry'],
        null,
        'renewal:'.$contract->id.':2028-01-01'
    );

    expect($second->is($first))->toBeTrue()
        ->and($first->contract->is($contract))->toBeTrue()
        ->and($first->context)->toBe([
            'old_end_date' => '2028-01-01',
            'new_end_date' => '2029-01-01',
        ])
        ->and($contract->lifecycleEvents()->count())->toBe(1);
});

it('prevents saved lifecycle events from being changed or deleted', function () {
    $event = ContractLifecycleEvent::record(
        makeLifecycleDataContract(),
        'cancellation_scheduled',
        ['effective_date' => '2027-06-24']
    );

    expect(fn () => $event->update(['type' => 'changed']))
        ->toThrow(LogicException::class)
        ->and(fn () => $event->delete())
        ->toThrow(LogicException::class);
});
