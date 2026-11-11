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

function bindLightweightInvoiceService(): void
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
    $service->shouldReceive('sendInvoiceEmail')->andReturnNull();
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

it('replaces a corrected invoice on its original billing date exactly once', function () {
    Carbon::setTestNow('2026-11-12 10:00:00');
    bindLightweightInvoiceService();

    $contract = makeBillingFallbackContract([
        'price' => 4639,
        'interval' => 'monthly',
        'start_date' => '2026-11-02',
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

    $originalId = createBillingInvoice($contract, '2026-11-02', 'paid', null, [
        'total_net' => 46.39,
        'total_gross' => 55.20,
        'tax' => 8.81,
    ]);
    createBillingInvoice($contract, '2026-11-11', 'paid', null, [
        'ref_to_id' => $originalId,
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

    $replacements = Invoice::query()
        ->where('contract_id', $contract->id)
        ->whereDate('issue_date', '2026-11-02')
        ->whereNull('ref_to_id')
        ->where('id', '!=', $originalId)
        ->where('total_gross', '>', 0)
        ->get();

    expect($replacements)->toHaveCount(1);

    $replacement = $replacements->sole();

    expect(Carbon::parse($replacement->issue_date)->toDateString())->toBe('2026-11-02')
        ->and(Carbon::parse($replacement->due_date)->toDateString())->toBe('2026-11-16')
        ->and((float) $replacement->total_net)->toBe(463.87)
        ->and((float) $replacement->tax)->toBe(88.13)
        ->and((float) $replacement->total_gross)->toBe(552.00)
        ->and($replacement->data['items'])->toBe([[
            'id' => '1',
            'description' => 'Monatliche Leistung',
            'quantity' => 1,
            'line_total_amount' => 463.87,
        ]]);

    Carbon::setTestNow('2027-11-02 10:00:00');
    $this->artisan('app:generate-recurring-invoices')->assertExitCode(0);

    $followingAnnualInvoices = Invoice::query()
        ->forRecurringCadence()
        ->where('contract_id', $contract->id)
        ->whereDate('issue_date', '2027-11-02')
        ->where('total_gross', 552.00)
        ->get();

    expect($followingAnnualInvoices)->toHaveCount(1);
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
