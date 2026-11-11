<?php

use App\Models\Company;
use App\Models\Invoice;
use App\Services\InvoiceService;
use Carbon\Carbon;
use horstoeko\zugferd\ZugferdDocumentReader;
use horstoeko\zugferd\ZugferdDocumentValidator;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

uses(TestCase::class, DatabaseTransactions::class);

it('represents an exact gross price with a compliant payable rounding amount', function () {
    $companyId = DB::table('companies')->insertGetId([
        'name' => 'XRechnung Rundung Test',
        'email' => 'rechnung@example.test',
        'created_at' => now(),
        'updated_at' => now(),
    ]);
    $company = Company::findOrFail($companyId);

    $invoice = new Invoice;
    $invoice->invoice_number = 'TEST-XR-552';
    $invoice->company_id = $companyId;
    $invoice->issue_date = Carbon::parse('2026-11-02');
    $invoice->due_date = Carbon::parse('2026-11-16');
    $invoice->total_net = 463.87;
    $invoice->tax = 88.14;
    $invoice->tax_rate = 19;
    $invoice->total_gross = 552.00;
    $invoice->currency = 'EUR';
    $invoice->type = 'RG';
    $invoice->data = [
        'items' => [[
            'id' => '1',
            'description' => 'Kombi-Paket Connect',
            'quantity' => 1,
            'line_total_amount' => 463.87,
        ]],
    ];
    $invoice->setRelation('company', $company);

    $method = new ReflectionMethod(InvoiceService::class, 'generateXRechnungData');
    $method->setAccessible(true);
    $xml = $method->invoke(new InvoiceService, $invoice);

    $reader = ZugferdDocumentReader::readAndGuessFromContent($xml);
    $reader->getDocumentSummation(
        $grandTotal,
        $duePayable,
        $lineTotal,
        $chargeTotal,
        $allowanceTotal,
        $taxBasis,
        $taxTotal,
        $roundingAmount,
        $prepaidAmount
    );
    $reader->getDocumentTax(
        $taxCategory,
        $taxType,
        $taxBasisAmount,
        $calculatedTax,
        $taxRate,
        $exemptionReason,
        $exemptionCode,
        $lineTaxBasis,
        $allowanceChargeTaxBasis,
        $taxPointDate,
        $dueDateType
    );

    expect($grandTotal)->toBe(552.01)
        ->and($duePayable)->toBe(552.00)
        ->and($lineTotal)->toBe(463.87)
        ->and($taxBasis)->toBe(463.87)
        ->and($taxTotal)->toBe(88.14)
        ->and($calculatedTax)->toBe(88.14)
        ->and($roundingAmount)->toBe(-0.01)
        ->and((new ZugferdDocumentValidator($reader))->validateDocument())->toHaveCount(0);

    $html = view('accounting.invoice-pdf', [
        'invoice' => $invoice,
        'additionalData' => [],
    ])->render();

    expect($html)->toContain('Rundung')
        ->and($html)->toContain('-0,01');
});
