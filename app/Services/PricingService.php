<?php

namespace App\Services;

use App\Models\Company;
use App\Models\Coupon;
use App\Models\Product;

class PricingService
{
    /**
     * Rechnet finalen Preis + Rabatt-Breakdown und liefert:
     * - contract_price_cents:   finale NETTO-Summe (Cent) für Contract->price
     * - additional_data:        Array, das du 1:1 als $additionalData an createContract geben kannst
     *                           (enthält ordered_product-Snapshot mit NETTO-Preis in Cent und Discounts NETTO negativ)
     * - totals:                 Netto/Steuer/Brutto zur Kontrolle (Euro)
     * - meta:                   Finaler Brutto in Cent + verwendete Rabatte (brutto)
     *
     * Erwartung:
     * - $product->priceFor($interval) liefert BRUTTO (Cent)
     * - CouponController::calculateTotalPrice(..., false) liefert NETTO-Decimal (€)
     *   (Fallback ist drin, falls sie doch brutto liefert)
     */
    public static function buildForContract(Product $product, string $interval, ?string $couponCode, ?Company $company): array
    {
        $taxRate = (float) (config('accounting.tax_rate') ?? 19);
        $divisor = 1 + ($taxRate / 100);

        // 1) Basis BRUTTO (Cent) aus dem Interval-Preis
        $priceModel       = $product->prices()->where('interval', $interval)->firstOrFail();
        $baseGrossCents   = (int) $priceModel->price;
        $finalGrossCents  = $baseGrossCents;
        $appliedDiscounts = []; // je: ['type'=>'coupon|agency','label'=>..., 'grossCents'=>positiv]

        // Trials => alles 0
        if (($product->trial_period_days ?? 0) > 0) {
            return [
                'contract_price_cents' => 0,
                'additional_data' => [
                    'ordered_product' => array_merge($product->toArray(), [
                        'interval' => $interval,
                        'price'    => 0, // NETTO-Cents
                    ]),
                    'discounts' => [],
                ],
                'totals' => [
                    'total_net'   => 0.00,
                    'tax'         => 0.00,
                    'total_gross' => 0.00,
                ],
                'meta' => [
                    'final_gross_cents' => 0,
                    'discounts_gross'   => [],
                ],
            ];
        }

        // 2) Coupon (wenn vorhanden)
        if (!empty($couponCode) && ($coupon = Coupon::where('code', $couponCode)->first())) {
            $cp = app(\App\Http\Controllers\CouponController::class);

            // Annahme: NETTO zurück
            $netAfterDec      = (float) $cp->calculateTotalPrice($coupon->promotion, $priceModel, false);
            $grossAfterCents1 = (int) round($netAfterDec * $divisor * 100);

            // Fallback: falls Controller brutto liefert
            $grossAfterDec    = (float) $cp->calculateTotalPrice($coupon->promotion, $priceModel, true);
            $grossAfterCents2 = (int) round($grossAfterDec * 100);

            $candidates = array_filter([$grossAfterCents1, $grossAfterCents2], fn($v) => $v > 0 && $v < $finalGrossCents);
            $grossAfter = !empty($candidates) ? min($candidates) : $finalGrossCents;

            $couponDisc = max(0, $finalGrossCents - $grossAfter);
            if ($couponDisc > 0) {
                $appliedDiscounts[] = [
                    'type'       => 'coupon',
                    'label'      => 'Gutschein ' . $coupon->code,
                    'grossCents' => $couponDisc,
                    'meta'       => ['code' => $coupon->code],
                ];
                $finalGrossCents = $grossAfter;
            }
        }

        // 3) Agentur-Rabatt kaskadiert (auf bereits reduzierten Brutto)
        $agencyPercent = self::detectAgencyPercent($company);
        if ($agencyPercent > 0) {
            $agencyDisc = (int) round($finalGrossCents * ($agencyPercent / 100));
            if ($agencyDisc > 0) {
                $appliedDiscounts[] = [
                    'type'       => 'agency',
                    'label'      => 'Agentur-Rabatt ' . rtrim(rtrim(number_format($agencyPercent, 2, ',', ''), '0'), ',') . '%',
                    'grossCents' => $agencyDisc,
                ];
                $finalGrossCents = max(0, $finalGrossCents - $agencyDisc);
            }
        }

        // 4) Invoice-Logik: Produktzeile = BRUTTO vor Rabatt; Rabatte einzeln → alles in NETTO schreiben
        $sumDiscGrossEuro      = 0.0;
        foreach ($appliedDiscounts as $d) {
            $sumDiscGrossEuro += round(($d['grossCents'] ?? 0) / 100, 2);
        }
        $finalGrossEuro        = round($finalGrossCents / 100, 2);
        $productLineGrossEuro  = round($finalGrossEuro + $sumDiscGrossEuro, 2);   // Brutto vor Rabatt
        $productNetEuro        = round($productLineGrossEuro / $divisor, 2);      // Netto Produktzeile
        $productNetCents       = (int) round($productNetEuro * 100);

        // Rabattzeilen NETTO (negativ)
        $discountsNetForData = [];
        $sumDiscNetEuro      = 0.0;
        $sumDiscTaxEuro      = 0.0;

        foreach ($appliedDiscounts as $d) {
            $grossEuro = round(($d['grossCents'] ?? 0) / 100, 2);
            if ($grossEuro <= 0) continue;

            $netEuro  = round($grossEuro / $divisor, 2);
            $taxEuro  = round($grossEuro - $netEuro, 2);

            $discountsNetForData[] = [
                'type'         => $d['type'] ?? 'discount',
                'label'        => $d['label'] ?? 'Rabatt',
                'amount_cents' => - (int) round($netEuro * 100), // **NETTO negativ in Cent**
                'vat_rate'     => $taxRate,
            ];

            $sumDiscNetEuro += $netEuro;
            $sumDiscTaxEuro += $taxEuro;
        }

        $totalNetEuro  = round($productNetEuro - $sumDiscNetEuro, 2);
        $totalTaxEuro  = round(($productLineGrossEuro - $productNetEuro) - $sumDiscTaxEuro, 2);
        $checkGross    = round($totalNetEuro + $totalTaxEuro, 2); // sollte = $finalGrossEuro

        // 5) additional_data so, wie dein PDF es erwartet:
        $orderedSnapshot          = $product->toArray();
        $orderedSnapshot['price'] = $productNetCents; // **NETTO in Cent**
        $orderedSnapshot['interval'] = $interval;

        $additionalData = [
            'ordered_product' => $orderedSnapshot,
            'discounts'       => $discountsNetForData, // **NETTO negativ**
        ];

        return [
            // Für Contract->price:
            'contract_price_cents' => (int) round($totalNetEuro * 100), // **NETTO final in Cent**

            // Für createContract(..., $additionalData, ...):
            'additional_data'      => $additionalData,

            // Zu deiner Kontrolle oder spätere Nutzung:
            'totals' => [
                'total_net'   => $totalNetEuro,
                'tax'         => $totalTaxEuro,
                'total_gross' => $checkGross,   // == $finalGrossEuro
            ],
            'meta' => [
                'final_gross_cents' => $finalGrossCents, // was an Mollie geht
                'discounts_gross'   => $appliedDiscounts, // brutto je Rabatt in Cent
            ],
        ];
    }

    private static function detectAgencyPercent(?Company $company): float
    {
        if (!$company) return 0.0;

        // self-agency
        if ((int)($company->is_agency ?? 0) === 1 && (float)($company->agency_discount_percent ?? 0) > 0) {
            return (float) $company->agency_discount_percent;
        }
        // FK → Agentur
        if (!empty($company->agency_company_id)) {
            $agency = Company::find($company->agency_company_id);
            if ($agency && (int)($agency->is_agency ?? 0) === 1 && (float)($agency->agency_discount_percent ?? 0) > 0) {
                return (float) $agency->agency_discount_percent;
            }
        }
        return 0.0;
    }
}
