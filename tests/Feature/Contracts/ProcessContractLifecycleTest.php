<?php

use App\Contracts\MollieSubscriptionGateway;
use App\Models\Company;
use App\Models\Contract;
use App\Models\MollieSubscription;
use Carbon\CarbonImmutable;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

uses(TestCase::class, DatabaseTransactions::class);

afterEach(function () {
    CarbonImmutable::setTestNow();
});

function makeProcessLifecycleContract(array $overrides = []): Contract
{
    return Contract::query()->create(array_merge([
        'contractable_type' => Company::class,
        'contractable_id' => 999999,
        'product_name' => 'Process Test',
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

function bindUnusedMollieGateway(): void
{
    $mock = Mockery::mock(MollieSubscriptionGateway::class);
    $mock->shouldNotReceive('status');
    $mock->shouldNotReceive('cancel');
    app()->instance(MollieSubscriptionGateway::class, $mock);
}

function createProcessMollieSubscription(string $subscriptionId, string $status = 'active', string $customerId = 'cst_process'): MollieSubscription
{
    return MollieSubscription::query()->create([
        'subscription_id' => $subscriptionId,
        'customer_id' => $customerId,
        'amount_value' => 10,
        'amount_currency' => 'EUR',
        'interval' => '1 month',
        'status' => $status,
        'start_date' => '2025-07-24 00:00:00',
    ]);
}

it('renews only on the day after the notice deadline', function () {
    bindUnusedMollieGateway();
    $contract = makeProcessLifecycleContract();

    $this->artisan('contracts:process-lifecycle', ['--date' => '2027-03-24'])->assertExitCode(0);
    expect($contract->fresh()->end_date->toDateString())->toBe('2027-06-24');

    $this->artisan('contracts:process-lifecycle', ['--date' => '2027-03-25'])->assertExitCode(0);
    expect($contract->fresh()->end_date->toDateString())->toBe('2028-06-24')
        ->and($contract->fresh()->iteration)->toBe(2);
});

it('renews annual and legacy yearly contracts but never one time contracts', function () {
    bindUnusedMollieGateway();
    $annual = makeProcessLifecycleContract(['interval' => 'annual']);
    $yearly = makeProcessLifecycleContract(['interval' => 'yearly']);
    $oneTime = makeProcessLifecycleContract(['interval' => 'one_time', 'auto_renew' => true]);

    $this->artisan('contracts:process-lifecycle', ['--date' => '2027-03-25'])->assertExitCode(0);

    expect($annual->fresh()->end_date->toDateString())->toBe('2028-06-24')
        ->and($yearly->fresh()->end_date->toDateString())->toBe('2028-06-24')
        ->and($oneTime->fresh()->end_date->toDateString())->toBe('2027-06-24');
});

it('does not renew or record the same period twice', function () {
    bindUnusedMollieGateway();
    $contract = makeProcessLifecycleContract();

    $this->artisan('contracts:process-lifecycle', ['--date' => '2027-03-25'])->assertExitCode(0);
    $this->artisan('contracts:process-lifecycle', ['--date' => '2027-03-25'])->assertExitCode(0);

    expect($contract->fresh()->end_date->toDateString())->toBe('2028-06-24')
        ->and($contract->fresh()->iteration)->toBe(2)
        ->and($contract->lifecycleEvents()->where('type', 'renewed')->count())->toBe(1);
});

it('keeps a pending contract active through its complete effective end day', function () {
    bindUnusedMollieGateway();
    $contract = makeProcessLifecycleContract([
        'status' => Contract::STATUS_CANCELLATION_PENDING,
        'auto_renew' => false,
        'cancellation_received_at' => '2027-03-24',
        'cancellation_effective_at' => '2027-06-24',
    ]);

    $this->artisan('contracts:process-lifecycle', ['--date' => '2027-06-24'])->assertExitCode(0);
    expect($contract->fresh()->status)->toBe(Contract::STATUS_CANCELLATION_PENDING);

    $this->artisan('contracts:process-lifecycle', ['--date' => '2027-06-25'])->assertExitCode(0);
    expect($contract->fresh()->status)->toBe(Contract::STATUS_ENDED)
        ->and($contract->lifecycleEvents()->where('type', 'contract_ended')->count())->toBe(1);
});

it('does not contact Mollie before the cancellation due day', function () {
    bindUnusedMollieGateway();
    createProcessMollieSubscription('sub_not_due');
    $contract = makeProcessLifecycleContract([
        'status' => Contract::STATUS_CANCELLATION_PENDING,
        'auto_renew' => false,
        'subscription_id' => 'sub_not_due',
        'cancellation_received_at' => '2027-03-24',
        'cancellation_effective_at' => '2027-06-24',
    ]);

    $this->artisan('contracts:process-lifecycle', ['--date' => '2027-06-22'])->assertExitCode(0);

    expect($contract->fresh()->mollie_canceled_at)->toBeNull();
});

it('cancels an active Mollie subscription on the due day', function () {
    $gateway = Mockery::mock(MollieSubscriptionGateway::class);
    $gateway->shouldReceive('status')->once()->with('cst_process', 'sub_due')->andReturn('active');
    $gateway->shouldReceive('cancel')->once()->with('cst_process', 'sub_due');
    app()->instance(MollieSubscriptionGateway::class, $gateway);
    createProcessMollieSubscription('sub_due');
    $contract = makeProcessLifecycleContract([
        'status' => Contract::STATUS_CANCELLATION_PENDING,
        'auto_renew' => false,
        'subscription_id' => 'sub_due',
        'cancellation_received_at' => '2027-03-24',
        'cancellation_effective_at' => '2027-06-24',
    ]);

    $this->artisan('contracts:process-lifecycle', ['--date' => '2027-06-23'])->assertExitCode(0);

    expect($contract->fresh()->mollie_canceled_at)->not->toBeNull()
        ->and(MollieSubscription::where('subscription_id', 'sub_due')->value('status'))->toBe('canceled')
        ->and($contract->lifecycleEvents()->where('type', 'mollie_cancellation_succeeded')->count())->toBe(1);
});

it('repairs local state without delete when Mollie is already canceled', function (string $localStatus, string $remoteStatus, int $statusCalls) {
    $gateway = Mockery::mock(MollieSubscriptionGateway::class);
    $gateway->shouldReceive('status')->times($statusCalls)->andReturn($remoteStatus);
    $gateway->shouldNotReceive('cancel');
    app()->instance(MollieSubscriptionGateway::class, $gateway);
    createProcessMollieSubscription('sub_already_canceled_'.$statusCalls, $localStatus);
    $contract = makeProcessLifecycleContract([
        'status' => Contract::STATUS_CANCELLATION_PENDING,
        'auto_renew' => false,
        'subscription_id' => 'sub_already_canceled_'.$statusCalls,
        'cancellation_received_at' => '2027-03-24',
        'cancellation_effective_at' => '2027-06-24',
    ]);

    $this->artisan('contracts:process-lifecycle', ['--date' => '2027-06-23'])->assertExitCode(0);

    expect($contract->fresh()->mollie_canceled_at)->not->toBeNull()
        ->and(MollieSubscription::where('subscription_id', $contract->subscription_id)->value('status'))->toBe('canceled');
})->with([
    'local cancellation already known' => ['canceled', 'canceled', 0],
    'remote cancellation repairs a lost local commit' => ['active', 'canceled', 1],
]);

it('records a failed Mollie attempt and succeeds on a later retry', function () {
    $failingGateway = Mockery::mock(MollieSubscriptionGateway::class);
    $failingGateway->shouldReceive('status')->once()->andThrow(new RuntimeException('Mollie unavailable'));
    $failingGateway->shouldNotReceive('cancel');
    app()->instance(MollieSubscriptionGateway::class, $failingGateway);
    createProcessMollieSubscription('sub_retry');
    $contract = makeProcessLifecycleContract([
        'status' => Contract::STATUS_CANCELLATION_PENDING,
        'auto_renew' => false,
        'subscription_id' => 'sub_retry',
        'cancellation_received_at' => '2027-03-24',
        'cancellation_effective_at' => '2027-06-24',
    ]);

    $this->artisan('contracts:process-lifecycle', ['--date' => '2027-06-23'])->assertExitCode(1);
    expect($contract->fresh()->mollie_canceled_at)->toBeNull()
        ->and($contract->lifecycleEvents()->where('type', 'mollie_cancellation_failed')->count())->toBe(1);

    $recoveringGateway = Mockery::mock(MollieSubscriptionGateway::class);
    $recoveringGateway->shouldReceive('status')->once()->andReturn('canceled');
    $recoveringGateway->shouldNotReceive('cancel');
    app()->instance(MollieSubscriptionGateway::class, $recoveringGateway);

    $this->artisan('contracts:process-lifecycle', ['--date' => '2027-06-23'])->assertExitCode(0);
    expect($contract->fresh()->mollie_canceled_at)->not->toBeNull();
});

it('fails visibly and remains retryable when local Mollie data is incomplete', function (bool $createSubscription, string $customerId) {
    bindUnusedMollieGateway();
    $subscriptionId = 'sub_incomplete_'.($createSubscription ? 'customer' : 'record');

    if ($createSubscription) {
        createProcessMollieSubscription($subscriptionId, 'active', $customerId);
    }

    $contract = makeProcessLifecycleContract([
        'status' => Contract::STATUS_CANCELLATION_PENDING,
        'auto_renew' => false,
        'subscription_id' => $subscriptionId,
        'cancellation_received_at' => '2027-03-24',
        'cancellation_effective_at' => '2027-06-24',
    ]);

    $this->artisan('contracts:process-lifecycle', ['--date' => '2027-06-23'])->assertExitCode(1);

    expect($contract->fresh()->mollie_canceled_at)->toBeNull()
        ->and($contract->lifecycleEvents()->where('type', 'mollie_cancellation_failed')->count())->toBe(1);
})->with([
    'missing local subscription' => [false, 'cst_process'],
    'missing customer id' => [true, ''],
]);

it('does not issue another Mollie cancellation after success', function () {
    $gateway = Mockery::mock(MollieSubscriptionGateway::class);
    $gateway->shouldReceive('status')->once()->andReturn('active');
    $gateway->shouldReceive('cancel')->once();
    app()->instance(MollieSubscriptionGateway::class, $gateway);
    createProcessMollieSubscription('sub_once');
    $contract = makeProcessLifecycleContract([
        'status' => Contract::STATUS_CANCELLATION_PENDING,
        'auto_renew' => false,
        'subscription_id' => 'sub_once',
        'cancellation_received_at' => '2027-03-24',
        'cancellation_effective_at' => '2027-06-24',
    ]);

    $this->artisan('contracts:process-lifecycle', ['--date' => '2027-06-23'])->assertExitCode(0);
    $this->artisan('contracts:process-lifecycle', ['--date' => '2027-06-23'])->assertExitCode(0);

    expect($contract->lifecycleEvents()->where('type', 'mollie_cancellation_succeeded')->count())->toBe(1);
});
