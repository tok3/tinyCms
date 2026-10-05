<?php

use App\Models\Company;
use Tests\TestCase;

uses(TestCase::class);

test('an agency uses itself as the discount source for its own products', function () {
    $agency = new Company([
        'is_agency' => true,
        'agency_discount_percent' => 30,
    ]);

    expect($agency->agencyBillingDiscountSource())->toBe($agency);
});

test('an agency-managed tenant uses its billing agency as the discount source', function () {
    $agency = new Company([
        'is_agency' => true,
        'agency_discount_percent' => 30,
    ]);
    $agency->id = 485;

    $tenant = new Company([
        'agency_company_id' => 485,
        'billing_via_agency' => true,
    ]);
    $tenant->setRelation('agency', $agency);

    expect($tenant->agencyBillingDiscountSource())->toBe($agency);
});

test('a regular company has no agency discount source', function () {
    $company = new Company([
        'is_agency' => false,
        'agency_discount_percent' => 0,
    ]);

    expect($company->agencyBillingDiscountSource())->toBeNull();
});
