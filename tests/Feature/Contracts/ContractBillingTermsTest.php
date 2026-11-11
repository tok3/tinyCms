<?php

use App\Models\Company;
use App\Models\Contract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Events\Dispatcher;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

uses(TestCase::class, DatabaseTransactions::class);

beforeEach(function () {
    $companyId = DB::table('companies')->insertGetId([
        'name' => 'Billing Terms Test '.uniqid(),
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    $this->pricingData = [
        'pricing_snapshot' => [
            'items' => [[
                'id' => '1',
                'description' => 'Monatliche Leistung',
                'quantity' => 1,
                'line_total_amount' => 46.39,
            ]],
            'total_net' => 46.39,
        ],
        'promotion' => [
            'name' => 'Rabattcode Gemeinde Krailling',
            'discount_percent' => 20,
        ],
        'bemerkung' => 'Product über Promocode erworben',
    ];

    $contractId = DB::table('contracts')->insertGetId([
        'contractable_type' => Company::class,
        'contractable_id' => $companyId,
        'product_name' => 'Connect',
        'product_description' => 'Test',
        'invoice_text' => 'Kombi-Paket Connect',
        'price' => 4639,
        'interval' => 'monthly',
        'start_date' => '2026-11-02',
        'end_date' => '2028-11-02',
        'status' => Contract::STATUS_ACTIVE,
        'data' => json_encode($this->pricingData),
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    Model::setEventDispatcher(new Dispatcher(app()));
    Contract::clearBootedModels();
    $this->contract = Contract::query()->findOrFail($contractId);
});

it('removes the pricing snapshot when price changes', function () {
    $this->contract->update(['price' => 46387]);

    expect($this->contract->refresh()->data)->toEqual([
        'promotion' => $this->pricingData['promotion'],
        'bemerkung' => $this->pricingData['bemerkung'],
    ]);
});

it('removes the pricing snapshot when interval changes', function () {
    $this->contract->update(['interval' => 'annual']);

    expect($this->contract->refresh()->data)->toEqual([
        'promotion' => $this->pricingData['promotion'],
        'bemerkung' => $this->pricingData['bemerkung'],
    ]);
});

it('preserves the pricing snapshot for unrelated contract changes', function () {
    $this->contract->update(['invoice_text' => 'Aktualisierter Rechnungstext']);

    expect($this->contract->refresh()->data)->toEqual($this->pricingData);
});
