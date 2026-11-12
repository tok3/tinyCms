<?php

use App\Http\Controllers\MolliePaymentController;
use App\Models\Company;
use App\Models\Contract;
use App\Models\ContractLifecycleEvent;
use App\Models\Invoice;
use App\Models\MolliePayment;
use App\Services\InvoiceService;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Events\Dispatcher;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Mollie\Api\MollieApiClient;
use Mollie\Laravel\Facades\Mollie;
use Tests\TestCase;

uses(TestCase::class, DatabaseTransactions::class);

beforeEach(function () {
    Mail::fake();
});

afterEach(function () {
    Carbon::setTestNow();
});

function makeBillingFallbackContract(array $overrides = []): Contract
{
    $companyId = DB::table('companies')->insertGetId([
        'name' => 'Billing Test '.uniqid(),
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return Contract::query()->create(array_merge([
        'contractable_type' => Company::class,
        'contractable_id' => $companyId,
        'product_name' => 'Billing Fallback',
        'product_description' => 'Test',
        'invoice_text' => 'Monatliche Leistung',
        'price' => 1000,
        'interval' => 'monthly',
        'iteration' => 1,
        'start_date' => '2025-01-01',
        'end_date' => '2030-01-01',
        'status' => Contract::STATUS_ACTIVE,
        'auto_renew' => true,
        'notice_period_months' => 3,
        'renewal_period_months' => 12,
    ], $overrides));
}

function createBillingInvoice(
    Contract $contract,
    string $issueDate,
    string $status = 'paid',
    ?string $molliePaymentId = null,
    array $overrides = []
): int {
    return DB::table('invoices')->insertGetId(array_merge([
        'invoice_number' => 'TEST-'.uniqid(),
        'company_id' => $contract->contractable_id,
        'contract_id' => $contract->id,
        'mollie_payment_id' => $molliePaymentId,
        'issue_date' => $issueDate,
        'due_date' => $issueDate,
        'payment_date' => $status === 'paid' ? $issueDate : null,
        'total_net' => 10,
        'total_gross' => 11.90,
        'tax' => 1.90,
        'tax_rate' => 19,
        'currency' => 'EUR',
        'status' => $status,
        'data' => json_encode(['items' => []]),
        'created_at' => now(),
        'updated_at' => now(),
    ], $overrides));
}

function bindLightweightInvoiceService(?int $expectedEmails = null): void
{
    $service = Mockery::mock(InvoiceService::class);
    $service->shouldReceive('createInvoice')->andReturnUsing(function (array $data): Invoice {
        $id = DB::table('invoices')->insertGetId([
            'invoice_number' => 'GENERATED-'.uniqid(),
            'company_id' => $data['company_id'],
            'contract_id' => $data['contract_id'],
            'mollie_payment_id' => $data['mollie_payment_id'],
            'issue_date' => $data['issue_date'],
            'due_date' => $data['due_date'],
            'payment_date' => $data['payment_date'],
            'total_net' => $data['total_net'],
            'total_gross' => $data['total_gross'],
            'tax' => $data['tax'],
            'tax_rate' => $data['tax_rate'],
            'currency' => 'EUR',
            'status' => $data['status'],
            'data' => json_encode($data['data']),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return Invoice::findOrFail($id);
    });
    $emailExpectation = $service->shouldReceive('sendInvoiceEmail')
        ->with(Mockery::on(fn (mixed $invoiceId): bool => is_int($invoiceId)
            && Invoice::query()->whereKey($invoiceId)->exists()))
        ->andReturnNull();
    if ($expectedEmails !== null) {
        $emailExpectation->times($expectedEmails);
    }
    app()->instance(InvoiceService::class, $service);
}

it('continues monthly or annual invoice cadence after the last Mollie invoice', function (string $interval, string $lastIssue, string $today, string $expectedIssue) {
    Carbon::setTestNow($today.' 10:00:00');
    bindLightweightInvoiceService();
    $contract = makeBillingFallbackContract(['interval' => $interval]);
    createBillingInvoice($contract, $lastIssue, 'paid', 'tr_last_mollie');

    $this->artisan('app:generate-recurring-invoices')->assertExitCode(0);

    expect(DB::table('invoices')->where('contract_id', $contract->id)->count())->toBe(2)
        ->and(DB::table('invoices')->where('contract_id', $contract->id)->max('issue_date'))->toBe($expectedIssue);
})->with([
    'monthly' => ['monthly', '2026-09-01', '2026-10-01', '2026-10-01'],
    'annual' => ['annual', '2025-10-01', '2026-10-01', '2026-10-01'],
    'legacy yearly' => ['yearly', '2025-10-01', '2026-10-01', '2026-10-01'],
]);

it('uses the latest non canceled invoice as the cadence anchor', function () {
    Carbon::setTestNow('2026-10-01 10:00:00');
    bindLightweightInvoiceService();
    $contract = makeBillingFallbackContract();
    createBillingInvoice($contract, '2026-09-01', 'paid', 'tr_paid_period');
    createBillingInvoice($contract, '2026-09-20', 'canceled');

    $this->artisan('app:generate-recurring-invoices')->assertExitCode(0);

    expect(DB::table('invoices')->where('contract_id', $contract->id)->where('issue_date', '2026-10-01')->count())->toBe(1);
});

it('bills active and pending contracts through end date but never ended contracts', function () {
    Carbon::setTestNow('2026-10-01 10:00:00');
    bindLightweightInvoiceService();
    $active = makeBillingFallbackContract(['status' => Contract::STATUS_ACTIVE]);
    $pending = makeBillingFallbackContract([
        'status' => Contract::STATUS_CANCELLATION_PENDING,
        'auto_renew' => false,
        'cancellation_received_at' => '2026-08-01',
        'cancellation_effective_at' => '2030-01-01',
    ]);
    $ended = makeBillingFallbackContract(['status' => Contract::STATUS_ENDED]);

    foreach ([$active, $pending, $ended] as $contract) {
        createBillingInvoice($contract, '2026-09-01');
    }

    $this->artisan('app:generate-recurring-invoices')->assertExitCode(0);

    expect(DB::table('invoices')->where('contract_id', $active->id)->count())->toBe(2)
        ->and(DB::table('invoices')->where('contract_id', $pending->id)->count())->toBe(2)
        ->and(DB::table('invoices')->where('contract_id', $ended->id)->count())->toBe(1);
});

it('does not create the same contract issue date twice across repeated runs', function () {
    Carbon::setTestNow('2026-10-01 10:00:00');
    bindLightweightInvoiceService();
    $contract = makeBillingFallbackContract();
    createBillingInvoice($contract, '2026-09-01', 'paid', 'tr_paid_once');

    $this->artisan('app:generate-recurring-invoices')->assertExitCode(0);
    $this->artisan('app:generate-recurring-invoices')->assertExitCode(0);

    expect(DB::table('invoices')
        ->where('contract_id', $contract->id)
        ->where('issue_date', '2026-10-01')
        ->count())->toBe(1);
});

it('advances beyond a canceled invoice on the next cadence date', function () {
    Carbon::setTestNow('2026-11-01 10:00:00');
    bindLightweightInvoiceService();
    $contract = makeBillingFallbackContract();
    createBillingInvoice($contract, '2026-09-01', 'paid', 'tr_paid_before_cancel');
    createBillingInvoice($contract, '2026-10-01', 'canceled');

    $this->artisan('app:generate-recurring-invoices')->assertExitCode(0);

    expect(DB::table('invoices')
        ->where('contract_id', $contract->id)
        ->where('issue_date', '2026-11-01')
        ->where('status', 'sent')
        ->count())->toBe(1);
});

it('honors the unique recurring invoice claim before creating or emailing', function () {
    Carbon::setTestNow('2026-10-01 10:00:00');
    $contract = makeBillingFallbackContract();
    createBillingInvoice($contract, '2026-09-01', 'paid');
    ContractLifecycleEvent::record(
        $contract,
        'recurring_invoice_claimed',
        ['issue_date' => '2026-10-01'],
        null,
        "recurring-invoice:{$contract->id}:2026-10-01"
    );

    $service = Mockery::mock(InvoiceService::class);
    $service->shouldNotReceive('createInvoice');
    $service->shouldNotReceive('sendInvoiceEmail');
    app()->instance(InvoiceService::class, $service);

    $this->artisan('app:generate-recurring-invoices')->assertExitCode(0);

    expect(DB::table('invoices')->where('contract_id', $contract->id)->count())->toBe(1);
});

it('keeps a corrected recurring invoice as the cadence anchor until the next interval', function () {
    Carbon::setTestNow('2026-11-12 10:00:00');
    bindLightweightInvoiceService(1);

    $contract = makeBillingFallbackContract([
        'price' => 4639,
        'interval' => 'monthly',
        'start_date' => '2026-10-02',
        'data' => [
            'pricing_snapshot' => [
                'items' => [[
                    'id' => '1',
                    'description' => 'Kombi-Paket Connect',
                    'quantity' => 1,
                    'line_total_amount' => 46.39,
                ]],
                'total_net' => 46.39,
            ],
            'promotion' => ['discount_percent' => 20],
            'bemerkung' => 'Product über Promocode erworben',
        ],
    ]);

    createBillingInvoice($contract, '2026-10-02');
    $originalId = createBillingInvoice($contract, '2026-11-02', 'paid', null, [
        'total_net' => 46.39,
        'total_gross' => 55.20,
        'tax' => 8.81,
    ]);
    createBillingInvoice($contract, '2026-11-11', 'paid', null, [
        'ref_to_id' => $originalId,
        'type' => 'KR',
        'total_net' => -46.39,
        'total_gross' => -55.20,
        'tax' => -8.81,
    ]);
    ContractLifecycleEvent::record(
        $contract,
        'recurring_invoice_claimed',
        ['issue_date' => '2026-11-02'],
        null,
        "recurring-invoice:{$contract->id}:2026-11-02"
    );

    Model::setEventDispatcher(new Dispatcher(app()));
    Contract::clearBootedModels();
    $contract = Contract::query()->findOrFail($contract->id);
    $contract->update([
        'price' => 46387,
        'billing_gross' => 55200,
        'interval' => 'annual',
    ]);

    expect($contract->refresh()->data)
        ->not->toHaveKey('pricing_snapshot')
        ->and($contract->data['billing_total_gross_cents'])->toBe(55200)
        ->and($contract->data['promotion'])->toBe(['discount_percent' => 20])
        ->and($contract->data['bemerkung'])->toBe('Product über Promocode erworben');

    $this->artisan('app:generate-recurring-invoices')->assertExitCode(0);
    $this->artisan('app:generate-recurring-invoices')->assertExitCode(0);

    $prematureInvoices = Invoice::query()
        ->where('contract_id', $contract->id)
        ->where('id', '>', $originalId)
        ->where('type', 'RG')
        ->get();

    expect($prematureInvoices)->toHaveCount(0);

    Carbon::setTestNow('2027-11-02 10:00:00');
    $this->artisan('app:generate-recurring-invoices')->assertExitCode(0);

    $followingAnnualInvoices = Invoice::query()
        ->forRecurringCadence()
        ->where('contract_id', $contract->id)
        ->whereDate('issue_date', '2027-11-02')
        ->where('total_gross', 552.00)
        ->get();

    expect($followingAnnualInvoices)->toHaveCount(1);

    $followingAnnualInvoice = $followingAnnualInvoices->sole();

    expect(Carbon::parse($followingAnnualInvoice->due_date)->toDateString())->toBe('2027-11-16')
        ->and((float) $followingAnnualInvoice->total_net)->toBe(463.87)
        ->and((float) $followingAnnualInvoice->tax)->toBe(88.14)
        ->and((float) $followingAnnualInvoice->total_gross)->toBe(552.00)
        ->and($followingAnnualInvoice->payable_rounding)->toBe(-0.01)
        ->and($followingAnnualInvoice->data['items'])->toBe([[
            'id' => '1',
            'description' => 'Monatliche Leistung',
            'quantity' => 1,
            'line_total_amount' => 463.87,
        ]]);
});

it('ignores manual invoices when determining the recurring cadence', function () {
    Carbon::setTestNow('2026-10-01 10:00:00');
    bindLightweightInvoiceService(1);

    $contract = makeBillingFallbackContract();
    createBillingInvoice($contract, '2026-09-01', 'paid', null, ['type' => 'RG']);
    createBillingInvoice($contract, '2026-09-20', 'paid', null, ['type' => 'MR']);

    $this->artisan('app:generate-recurring-invoices')->assertExitCode(0);

    expect(Invoice::query()
        ->where('contract_id', $contract->id)
        ->where('type', 'RG')
        ->whereDate('issue_date', '2026-10-01')
        ->count())->toBe(1);
});

it('can preview a recurring run without creating claims invoices or emails', function () {
    Carbon::setTestNow('2026-10-01 10:00:00');
    bindLightweightInvoiceService(0);

    $contract = makeBillingFallbackContract();
    createBillingInvoice($contract, '2026-09-01');

    $this->artisan('app:generate-recurring-invoices', ['--dry-run' => true])
        ->assertExitCode(0);

    expect(Invoice::query()->where('contract_id', $contract->id)->count())->toBe(1)
        ->and(ContractLifecycleEvent::query()
            ->where('contract_id', $contract->id)
            ->where('type', 'recurring_invoice_claimed')
            ->count())->toBe(0);
});

it('can preview invoices due on a future date without mutating billing data', function () {
    Carbon::setTestNow('2026-11-12 10:00:00');
    bindLightweightInvoiceService(0);

    $contract = makeBillingFallbackContract();
    createBillingInvoice($contract, '2026-11-02');

    $this->artisan('app:generate-recurring-invoices', [
        '--dry-run' => true,
        '--as-of' => '2026-12-02',
    ])
        ->expectsOutputToContain('2026-12-02')
        ->assertExitCode(0);

    expect(Invoice::query()->where('contract_id', $contract->id)->count())->toBe(1)
        ->and(ContractLifecycleEvent::query()
            ->where('contract_id', $contract->id)
            ->where('type', 'recurring_invoice_claimed')
            ->count())->toBe(0);
});

it('rejects a simulated billing date outside dry run mode', function () {
    Carbon::setTestNow('2026-11-12 10:00:00');
    bindLightweightInvoiceService(0);

    $contract = makeBillingFallbackContract();
    createBillingInvoice($contract, '2026-11-02');

    $this->artisan('app:generate-recurring-invoices', ['--as-of' => '2026-12-02'])
        ->expectsOutputToContain('nur zusammen mit --dry-run')
        ->assertExitCode(2);

    expect(Invoice::query()->where('contract_id', $contract->id)->count())->toBe(1);
});

it('can limit a recurring run to one contract', function () {
    Carbon::setTestNow('2026-10-01 10:00:00');
    bindLightweightInvoiceService(1);

    $selectedContract = makeBillingFallbackContract();
    $otherContract = makeBillingFallbackContract();
    createBillingInvoice($selectedContract, '2026-09-01');
    createBillingInvoice($otherContract, '2026-09-01');

    $this->artisan('app:generate-recurring-invoices', ['--contract' => $selectedContract->id])
        ->assertExitCode(0);

    expect(Invoice::query()->where('contract_id', $selectedContract->id)->count())->toBe(2)
        ->and(Invoice::query()->where('contract_id', $otherContract->id)->count())->toBe(1);
});

it('does not backfill a corrected historical gap behind a later live invoice', function () {
    Carbon::setTestNow('2026-11-12 10:00:00');
    bindLightweightInvoiceService(0);

    $contract = makeBillingFallbackContract([
        'interval' => 'annual',
        'start_date' => '2026-09-02',
    ]);

    $historicalId = createBillingInvoice($contract, '2026-09-02');
    createBillingInvoice($contract, '2026-09-03', 'paid', null, [
        'ref_to_id' => $historicalId,
        'total_net' => -10,
        'total_gross' => -11.90,
        'tax' => -1.90,
    ]);
    createBillingInvoice($contract, '2026-10-02');

    $this->artisan('app:generate-recurring-invoices')->assertExitCode(0);

    expect(DB::table('invoices')->where('contract_id', $contract->id)->count())->toBe(3);
});

it('rejects an incompatible explicit gross amount before creating an invoice', function () {
    Carbon::setTestNow('2026-11-12 10:00:00');
    bindLightweightInvoiceService(0);

    $contract = makeBillingFallbackContract([
        'price' => 1000,
        'start_date' => '2026-11-12',
        'data' => ['billing_total_gross_cents' => 100],
    ]);

    expect(fn () => $this->artisan('app:generate-recurring-invoices')->run())
        ->toThrow(UnexpectedValueException::class);

    expect(DB::table('invoices')->where('contract_id', $contract->id)->count())->toBe(0);
});

it('keeps a paid post-term Mollie payment and records one critical lifecycle alert', function () {
    Carbon::setTestNow('2026-10-01 10:00:00');
    Log::spy();

    $contract = makeBillingFallbackContract([
        'subscription_id' => 'sub_post_term',
        'status' => Contract::STATUS_ENDED,
        'auto_renew' => false,
        'cancellation_received_at' => '2026-06-01',
        'cancellation_effective_at' => '2026-09-30',
    ]);

    $payment = (object) [
        'id' => 'tr_post_term',
        'metadata' => (object) [],
        'customerId' => 'cst_post_term',
        'subscriptionId' => 'sub_post_term',
        'mode' => 'live',
        'amount' => (object) ['value' => '11.90', 'currency' => 'EUR'],
        'settlementAmount' => null,
        'description' => 'Vertragszahlung',
        'method' => 'directdebit',
        'status' => 'paid',
        'createdAt' => '2026-10-01T08:00:00+00:00',
        'paidAt' => '2026-10-01T08:00:00+00:00',
        'dueDate' => null,
        'details' => (object) [],
        'sequenceType' => 'recurring',
    ];

    $paymentsApi = Mockery::mock();
    $paymentsApi->shouldReceive('get')->twice()->with('tr_post_term')->andReturn($payment);
    $api = Mockery::mock(MollieApiClient::class);
    $api->payments = $paymentsApi;
    Mollie::shouldReceive('api')->twice()->andReturn($api);

    $controller = new class extends MolliePaymentController
    {
        public int $preparedInvoices = 0;

        public function prepareInvoice($molliePaymentId)
        {
            $this->preparedInvoices++;
        }
    };
    $request = Request::create('/mollie/webhook', 'POST', ['id' => 'tr_post_term']);

    expect($controller->handlePaymentNotification($request)->getStatusCode())->toBe(200)
        ->and($controller->handlePaymentNotification($request)->getStatusCode())->toBe(200)
        ->and(MolliePayment::query()->where('payment_id', 'tr_post_term')->count())->toBe(1)
        ->and(ContractLifecycleEvent::query()
            ->where('contract_id', $contract->id)
            ->where('type', 'unexpected_post_term_payment')
            ->count())->toBe(1)
        ->and($controller->preparedInvoices)->toBe(2);

    Log::shouldHaveReceived('critical')->once()->with(
        'Mollie payment received after contract end.',
        Mockery::on(fn (array $context): bool => $context['contract_id'] === $contract->id
            && $context['payment_id'] === 'tr_post_term'
            && $context['effective_date'] === '2026-09-30')
    );
});

it('does not alert for a payment made on the effective contract end date', function () {
    Carbon::setTestNow('2026-09-30 10:00:00');
    Log::spy();

    $contract = makeBillingFallbackContract([
        'subscription_id' => 'sub_final_day',
        'status' => Contract::STATUS_CANCELLATION_PENDING,
        'auto_renew' => false,
        'cancellation_received_at' => '2026-06-01',
        'cancellation_effective_at' => '2026-09-30',
    ]);

    $payment = (object) [
        'id' => 'tr_final_day',
        'metadata' => (object) [],
        'customerId' => 'cst_final_day',
        'subscriptionId' => 'sub_final_day',
        'mode' => 'live',
        'amount' => (object) ['value' => '11.90', 'currency' => 'EUR'],
        'settlementAmount' => null,
        'description' => 'Letzte Vertragszahlung',
        'method' => 'directdebit',
        'status' => 'paid',
        'createdAt' => '2026-09-30T08:00:00+00:00',
        'paidAt' => '2026-09-30T08:00:00+00:00',
        'dueDate' => null,
        'details' => (object) [],
        'sequenceType' => 'recurring',
    ];

    $paymentsApi = Mockery::mock();
    $paymentsApi->shouldReceive('get')->once()->andReturn($payment);
    $api = Mockery::mock(MollieApiClient::class);
    $api->payments = $paymentsApi;
    Mollie::shouldReceive('api')->once()->andReturn($api);

    $controller = new class extends MolliePaymentController
    {
        public function prepareInvoice($molliePaymentId) {}
    };

    $controller->handlePaymentNotification(Request::create('/mollie/webhook', 'POST', ['id' => 'tr_final_day']));

    expect(ContractLifecycleEvent::query()
        ->where('contract_id', $contract->id)
        ->where('type', 'unexpected_post_term_payment')
        ->count())->toBe(0);

    Log::shouldNotHaveReceived('critical');
});
