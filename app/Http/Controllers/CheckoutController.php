<?php

namespace App\Http\Controllers;

use App\Filament\Resources\Shared\CompanyResource\Pages\ListCompanies;
use App\Http\Middleware\PreventRequestsDuringMaintenance;
use App\Models\MollieCustomer;
use App\Services\InvoiceService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Coupon;
use Mollie\Laravel\Facades\Mollie;
use App\Models\User;
use App\Models\Company;
use App\Models\Subscription;
use Faker\Factory as Faker;
use GuzzleHttp\Client;
use App\Models\TemporaryUserData;
use Illuminate\Support\Str;
use App\Helpers\FormatHelper;

/**
 *
 */
class CheckoutController extends MolliePaymentController

{

    var $descriptionLength = 80; // item description length on invoice. combination of product_name and description

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Mollie\Api\Exceptions\ApiException
     */
    public function preparePayment(Request $request)
    {


        $checkoutUrl = $this->firstPayment($request);


        return redirect($checkoutUrl, 303);

    }


    /**
     * @param $orderedProduct
     * @return \Mollie\Api\Resources\Payment
     * @throws \Mollie\Api\Exceptions\ApiException
     */
    private function firstPayment(Request $request)
    {

        $selection = $request->input('product_selection');       // z.B. "3:annual"
        if (!$selection || !str_contains($selection, ':'))
        {
            abort(400, 'Ungültige Produktauswahl.');
        }

        [$productId, $interval] = explode(':', $selection, 2);

        $orderedProduct = Product::where('id', $productId)->first();

        $orderedProduct->setAttribute('price', $orderedProduct->priceFor($interval));
        $orderedProduct->setAttribute('interval', $interval);


        $couponCode = $request->input('coupon_code') ?? '0';

        $user = \Auth::user();

        if ($user && $user->companies->isNotEmpty() && $user->companies[0]->mollieCustomer)
        {
            // User hat bereits eine Company und damit eine Mollie Customer ID
            $molieCostomer = $user->companies[0]->mollieCustomer;
            $customerID = $molieCostomer->mollie_customer_id;
            $billingEmail = $user->companies[0]->email;


        }
        else
        {


            $name = $request->input('user')['vorname'] . ' ' . $request->input('user')['name'];

            $email = $request->input('user')['email'];
            $billingEmail = $request->input('company')['email'];

            $customer = Mollie::api()->customers->create([
                'name' => $name,
                'email' => $email,
            ]);

            $customerID = $customer->id;

            if ($request->boolean('firstContract'))
            {
                // wenn user einen reinen trial account hatte und die erste bestellung über das upgrade form macht

                // --- Company Update ---
                $companyData = $request->input('company', []);
                $company = auth()->user()->companies()->first(); // oder dein Mechanismus

                if ($company && !empty($companyData))
                {
                    $company->update($companyData);

                    // MollieCustomer anlegen (mit Bezug zur Company)
                    MollieCustomer::create([
                        'model_id' => $company->id,
                        'model_type' => get_class($company), // z. B. App\Models\Company
                        'mollie_customer_id' => $customerID ?? null, // hier die Mollie-ID einsetzen
                    ]);
                }

                // --- User Update ---
                $userData = $request->input('user', []);
                $user = auth()->user();

                if ($user && !empty($userData))
                {
                    // Namen zusammensetzen
                    $user->name = trim(($userData['vorname'] ?? '') . ' ' . ($userData['name'] ?? ''));

                    $user->save();
                }
            }


            if ($request->input('payment_method') === 'sepa')
            {
                // Nutze die eingegebene IBAN

                $iban = preg_replace('/\s+/', '', trim($request->input('iban')));

                $mandate = Mollie::api()->customers->get($customerID)
                    ->createMandate([
                        'method' => 'directdebit',
                        'consumerAccount' => $iban,
                        'consumerName' => $name,
                    ]);
                // Falls das Mandat fehlschlägt, kannst du den Fehler abfangen und dem Kunden anzeigen
            }


            // Temporäre Daten in der Datenbank speichern
            TemporaryUserData::create([
                'mollie_customer_id' => $customerID,
                'user_data' => json_encode($request->input('user')),
                'company_data' => json_encode($request->input('company')),
            ]);
        }
        // 0.00 Zahler, Gratis Accounts, oder zahlung auf rechnung gehen nicht über payment gateway
        if (($orderedProduct->payment_type == 'one_time' && $orderedProduct->price <= 0) || $request->input('pay_by_invoice') == 1)
        {

            if (auth()->check())
            {
                // Eingeloggt = upgrade
                $company = auth()->user()->companies[0];
            }
            else
            {
                  $company = $this->initCompanyAccount($customerID);

            }

            //$company = Company::where('id', 264)->first();
            $additionalData = [];

            if ($couponCode)
            {
                $coupon = Coupon::where('code', $couponCode)->first();

                if ($coupon)
                {
                    $cpCtrl = new CouponController;
                    $discountedPriceDecimal = $cpCtrl->calculateTotalPrice($coupon->promotion, $orderedProduct, false);
                    $orderedProduct->price = round($discountedPriceDecimal * 100); // Preis im Produkt überschreiben (zentral korrekt in Cent!)

                    $additionalData['promotion'] = $coupon->promotion;
                    $additionalData['bemerkung'] = 'Product über Promocode #' . $couponCode . ' erworben';
                    session()->forget('coupon_code');
                }
            }

            $contract = $this->createContract($company, $orderedProduct, false, Carbon::now(), $additionalData, $interval);

            if ($orderedProduct->trial_period_days == 0)
            {

                $this->prepareInvoicePurchaseByInvoice($orderedProduct, $company, $contract, $couponCode ?: null, $interval);

            }


            if (auth()->check())
            {


                return url('dashboard/' . $company->id . '/upgrade-page');
            }

            return route('view.plans') . '#step-4';

        }

        $price = $orderedProduct->price;

        if ($couponCode)
        {
            $coupon = Coupon::where('code', $couponCode)->first();

            $cpCtrl = new CouponController;
            $price = $cpCtrl->calculateTotalPrice($coupon->promotion, $orderedProduct, false) * 100 ?? null;
        }

        $actingCompany = auth()->check() ? (auth()->user()->companies->first() ?? null) : null;
        if ($actingCompany && (int)($actingCompany->is_agency ?? 0) === 1 && (float)($actingCompany->agency_discount_percent ?? 0) > 0) {
            $agencyPct = (float) $actingCompany->agency_discount_percent;
            $price = (int) round($price * (1 - ($agencyPct / 100)));
            if ($price < 1) { $price = 1; } // Mollie darf keinen 0-Betrag bekommen
        }

        if ($orderedProduct->trial_period_days > 0)
        {
            $price = 0.00;
        }
        // Zahlung erstellen
        $metadata = [
            "product_id" => $orderedProduct->id,
            "interval" => $interval,
            "customer_id" => $customerID,
            "company" => $request->input('company')['name'],
            "coupon_code" => $request->input('coupon_code') ?? '0',
            "company_id" => $request->input('company_id') ?? '0',
            "acting_company_id" => auth()->check() ? optional(auth()->user()->companies->first())->id : null,
        ];

        if ($couponCode)
        {
            $metadata['coupon_code'] = $couponCode;
        }

        $descriptionText = FormatHelper::stripHtmlButKeepSpaces($orderedProduct->invoice_text ?: $orderedProduct->description);

        $itemDescription = Str::limit(
            $descriptionText,
            $this->descriptionLength,
            '...'
        );

        if ($orderedProduct->payment_type == 'one_time' && $orderedProduct->price <= 0)
        {
            $payment = Mollie::api()->payments->create([
                "amount" => [
                    "currency" => $orderedProduct->currency,
                    "value" => number_format($price / 100, 2, '.', '')
                ],
                'billingEmail' => $billingEmail,
                'description' => $itemDescription,
                'redirectUrl' => $request->input('company_id')
                    ? url('dashboard/' . $request->input('company_id') . '/upgrade-page')
                    : url('preise#step-4'),
                'webhookUrl' => route('mollie.paymentWebhook'),
                "method" => ["creditcard", "directdebit", "paypal", "sofort", "klarnapaylater", "ideal", "banktransfer"],
                "metadata" => $metadata,
            ]);
        }
        else
        {

            $payment = Mollie::api()->payments->create([
                "amount" => [
                    "currency" => $orderedProduct->currency,
                    "value" => number_format($price / 100, 2, '.', '')
                ],
                'customerId' => $customerID,
                'sequenceType' => 'first',
                'billingEmail' => $billingEmail,
                'description' => $itemDescription,
                'redirectUrl' => $request->input('company_id')
                    ? url('dashboard/' . $request->input('company_id') . '/upgrade-page')
                    : url('preise#step-4'),
                'webhookUrl' => route('mollie.paymentWebhook'),
                "method" => ["creditcard", "directdebit", "sofort", "klarnapaylater", "ideal", "paypal", "banktransfer"],
                "metadata" => $metadata,
            ]);
        }


        return $payment->getCheckoutUrl();

    }


    public function prepareInvoicePurchaseByInvoice($orderedProduct, $company, $contract = null, ?string $couponCode = null, ?string $interval = null)
    {

        $tax_rate = (float)config('accounting.tax_rate', 19);
        $divisor = 1 + ($tax_rate / 100);
        $interval = $interval ?? ($orderedProduct->interval ?? 'annual');

        // 1) Basispreis BRUTTO aus der Preise-Tabelle (nicht aus $orderedProduct->price!)
        $priceModel = $orderedProduct->prices()->where('interval', $interval)->first();
        if (!$priceModel)
        {
            return;
        } // safety
        $base_cents = (int)$priceModel->price;
        $base_gross = round($base_cents / 100, 2); // z.B. 100.00 €

        // 2) Coupon -> finaler BRUTTO
        $coupon_discount_gross = 0.00;
        $coupon_label = null;

        if (!empty($couponCode) && ($coupon = \App\Models\Coupon::where('code', $couponCode)->first()))
        {
            $cp = new \App\Http\Controllers\CouponController;

            // deine calculateTotalPrice(false) liefert NETTO; wir schlagen MwSt. drauf
            $netAfter = (float)$cp->calculateTotalPrice($coupon->promotion, $priceModel, false);
            $grossAfterFromNet = round($netAfter * $divisor, 2);

            // Fallback: falls true bereits BRUTTO liefert
            $grossAfterDirect = round((float)$cp->calculateTotalPrice($coupon->promotion, $priceModel, true), 2);

            // plausiblen Kandidaten wählen (< Basis, > 0)
            $candidates = array_filter([$grossAfterFromNet, $grossAfterDirect], fn($v) => $v > 0 && $v < $base_gross);
            $grossAfter = !empty($candidates) ? min($candidates) : $base_gross;

            $coupon_discount_gross = max(0, round($base_gross - $grossAfter, 2)); // z.B. 30.00 €
            if ($coupon_discount_gross > 0)
            {
                $coupon_label = 'Aktionscode ' . $coupon->code;
            }
        }

        // === AGENCY (kaskadiert nach Coupon) ======================================
        $agency_discount_gross = 0.00;
        $agency_label = null;
        $agencyPct = 0.0;

        // 1) Wenn eingeloggter User selbst eine Agentur ist -> dessen Rabatt nehmen
        $actingCompany = auth()->check() ? (auth()->user()->companies[0] ?? null) : null;
        if ($actingCompany && (int)($actingCompany->is_agency ?? 0) === 1 && (float)($actingCompany->agency_discount_percent ?? 0) > 0)
        {
            $agencyPct = (float)$actingCompany->agency_discount_percent;
        }

        if ($agencyPct > 0)
        {
            // Brutto nach Coupon:
            $gross_after_coupon = round($base_gross - $coupon_discount_gross, 2);

            // Agentur-Rabatt auf diesen (kaskadiert)
            $agency_discount_gross = (float)round($gross_after_coupon * ($agencyPct / 100), 2);
            if ($agency_discount_gross > 0)
            {
                $agency_label = 'Agentur-Rabatt ' . rtrim(rtrim(number_format($agencyPct, 2, ',', ''), '0'), ',') . '%';
            }
        }
        // === FINALE SUMMEN =========================================================
        $final_gross = round($base_gross - $coupon_discount_gross - $agency_discount_gross, 2);
        if ($final_gross <= 0.00)
        {
            return;
        }

        $divisor = 1 + ($tax_rate / 100);

        $base_net = round($base_gross / $divisor, 2);
        $base_tax = round($base_gross - $base_net, 2);

        // Coupon (falls vorhanden)
        $disc_coupon_net = round($coupon_discount_gross / $divisor, 2);
        $disc_coupon_tax = round($coupon_discount_gross - $disc_coupon_net, 2);

        // Agentur (falls vorhanden)
        $disc_agency_net = round($agency_discount_gross / $divisor, 2);
        $disc_agency_tax = round($agency_discount_gross - $disc_agency_net, 2);

        $total_net = round($base_net - $disc_coupon_net - $disc_agency_net, 2);
        $tax = round($base_tax - $disc_coupon_tax - $disc_agency_tax, 2);
        $total_gross = round($final_gross, 2);

        // 6) Positionen (nur Anzeige; PDF rechnet NICHT)
        $descriptionText = \App\Helpers\FormatHelper::stripHtmlButKeepSpaces($orderedProduct->invoice_text ?: $orderedProduct->description);
        $itemDescription = \Illuminate\Support\Str::limit($descriptionText, $this->descriptionLength, '...');

        $items = [
            [
                'id' => '1',
                'description' => $itemDescription,
                'quantity' => 1,
                'line_total_amount' => $base_net, // netto
            ],
        ];

        $pos = 2;
        if ($coupon_discount_gross > 0.00)
        {
            $items[] = [
                'id' => (string)$pos++,
                'description' => $coupon_label ?? 'Gutschein',
                'quantity' => 1,
                'line_total_amount' => -$disc_coupon_net, // netto negativ
            ];
        }
        if ($agency_discount_gross > 0.00)
        {
            $items[] = [
                'id' => (string)$pos++,
                'description' => $agency_label ?? 'Agentur-Rabatt',
                'quantity' => 1,
                'line_total_amount' => -$disc_agency_net, // netto negativ
            ];
        }
        // Invoice daten
        $invoiceData = [
            'company_id' => $company->id,
            'contract_id' => $contract?->id,
            'issue_date' => now()->format('Y-m-d'),
            'mollie_payment_id' => null,
            'due_date' => \Carbon\Carbon::now()->addWeekdays(10)->format('Y-m-d'),
            'payment_date' => null,
            'total_net' => $total_net,
            'total_gross' => $total_gross,
            'tax' => $tax,
            'tax_rate' => $tax_rate,
            'status' => 'sent',
            'data' => ['items' => $items],
        ];


        // Contract-Snapshot updaten, damit Recurrings identische Netto-Positionen bekommen
        if ($contract) {
            $data = $contract->data ?? [];
            $data['pricing_snapshot'] = [
                'items'     => $items,           // netto-Positionsliste (wie fürs PDF)
                'total_net' => $total_net,       // optional, kann man auch bei Recurring neu summieren
                'meta'      => [
                    'coupon_code'     => $couponCode ?? null,      // wenn bekannt
                    'agency_percent'  => $agencyPct ?? null,       // wenn angewendet
                    'captured_at'     => now()->toDateTimeString()
                ],
            ];
            $contract->data = $data;
            $contract->save();
        }

        $svc = new \App\Services\InvoiceService();
        $svc->createInvoice($invoiceData);
        $svc->sendInvoiceEmail();
    }

    /**
     * email check auf uniqueness
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkEmail(Request $request)
    {
        $emailExists = User::where('email', $request->email)->exists();

        return response()->json(['exists' => $emailExists]);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function showPlans(Request $request)
    {

        $products = Product::where(['active' => 1, 'visible' => 1])
            ->orderBy('payment_type')->orderBy('sequence')->get();


        return view('checkout', ['products' => $products]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function checkoutUpgrade(Product $product, Request $request)
    {
        $interval = $request->input('interval');

        // Sicherheitsprüfung
        if (!$interval || !in_array($interval, ['monthly', 'annual', 'one_time']))
        {
            abort(400, 'Ungültiges Intervall.');
        }

        // Preis für dieses Intervall holen
        $priceModel = $product->prices()->where('interval', $interval)->first();
        if (!$priceModel)
        {
            abort(404, 'Kein Preis für dieses Intervall gefunden.');
        }

        // Preis vorbereiten
        $priceFormatted = number_format($priceModel->price / 100, 2, ',', '.');

        // Optional: Coupon aus Session
        $couponCode = session('coupon_code');

        session()->put('selectedProductSelection', "{$product->id}:{$interval}");

        // Weitergabe an View
        return view('checkout-upgrade', [
            'product' => $product,
            'interval' => $interval,
            'price' => $priceFormatted,
            'coupon' => $couponCode,
            // ggf. weitere Variablen wie Trial-Ends, etc.
        ]);
    }

    /**
     * Produktdetails für die Checkout-Zusammenfassung im Smart Wizard abrufen
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProductDetails(Request $request)
    {
        // 1) Ziehe nur noch product_selection (z.B. "3:annual")
        $selection = $request->input('product_selection');
        $couponCode = $request->input('coupon_code', '');

        if (!$selection || !str_contains($selection, ':'))
        {
            return response()->json(['error' => 'Ungültige Produktauswahl.'], 400);
        }
        [$productId, $interval] = explode(':', $selection, 2);

        // 2) Lade Produkt und den passenden Preis
        $product = Product::find($productId);
        if (!$product)
        {
            return response()->json(['error' => 'Produkt nicht gefunden.'], 404);
        }
        $priceModel = $product->prices()->where('interval', $interval)->first();
        if (!$priceModel)
        {
            return response()->json(['error' => 'Kein Preis für dieses Intervall gefunden.'], 404);
        }

        // 3) Basis-Antwort aufbauen
        $basePriceCents = $priceModel->price;
        $formattedBase = number_format($basePriceCents / 100, 2, ',', '.');

        $productDetails = [
            'name' => $product->name,
            'description' => $product->description,
            'price_cents' => $basePriceCents,        // <— Integer Cent-Wert
            'formattedPrice' => $formattedBase,         // <— String für Anzeige
            'interval' => $interval,
            'trial_period_days' => $product->trial_period_days,
            'laufzeit' => $product->lz,
        ];

        // 4) Rabattcode
        if ($couponCode && $coupon = Coupon::where('code', $couponCode)->first())
        {
            $type = $coupon->promotion->discount_type === 'fixed'
                ? $coupon->promotion->formatted_discount . ' €'
                : $coupon->promotion->formatted_discount . ' %';

            $cpCtrl = new CouponController;

            $subtotal = $cpCtrl->calculateTotalPrice($coupon->promotion, $priceModel, false) ?? 0;
            $formattedSubtotal = number_format($subtotal, 2, ',', '.');


            $productDetails = [
                'name' => $product->name,
                'description' => $product->description
                    . "<br>Aktionscode: <b>{$coupon->code}</b> angewendet.<br>"
                    . $coupon->promotion->description
                    . "<br><span style=\"display:inline-block;text-align:right;\">"
                    . "<b>{$formattedBase} €</b><br><b>&minus; {$type}</b>"
                    . "</span>",
                'formattedPrice' => $formattedSubtotal, // <— formatiert für Anzeige
                'interval' => $interval,
                'trial_period_days' => $product->trial_period_days,
                'has_discount' => true,
                'discountedPriceCents' => $subtotal * 100,          // <— evtl. extra Feld
            ];
        }

        return response()->json($productDetails);
    }

}
