<?php

namespace App\Http\Controllers;

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
        if (! $selection || ! str_contains($selection, ':')) {
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

            if ($request->boolean('firstContract')) {
                // wenn user einen reinen trial account hatte und die erste bestellung über das upgrade form macht

                // --- Company Update ---
                $companyData = $request->input('company', []);
                $company = auth()->user()->companies()->first(); // oder dein Mechanismus

                if ($company && !empty($companyData)) {
                    $company->update($companyData);

                    // MollieCustomer anlegen (mit Bezug zur Company)
                    MollieCustomer::create([
                        'model_id'          => $company->id,
                        'model_type'        => get_class($company), // z. B. App\Models\Company
                        'mollie_customer_id'=> $customerID ?? null, // hier die Mollie-ID einsetzen
                    ]);
                }

                // --- User Update ---
                $userData = $request->input('user', []);
                $user = auth()->user();

                if ($user && !empty($userData)) {
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
            // Company
            $company = auth()->check()
                ? auth()->user()->companies[0]
                : $this->initCompanyAccount($customerID);

            // Kaskadierte Berechnung
            $calc = $this->computePricingBreakdown($orderedProduct, $interval, ($request->input('coupon_code') ?: null), $company);

            // Snapshot für Contract->data (damit PDF & Recurring dieselben Zeilen bauen können)
            $rawDesc = FormatHelper::stripHtmlButKeepSpaces($orderedProduct->invoice_text ?: $orderedProduct->description);
            $itemDescription = Str::limit($rawDesc, $this->descriptionLength, '...');

            $contractData = [
                'ordered_product' => [
                    'id'           => $orderedProduct->id,
                    'name'         => $orderedProduct->name,
                    'invoice_text' => $orderedProduct->invoice_text,
                    'description'  => $orderedProduct->description,
                    'interval'     => $interval,
                ],
                'tax_rate'   => $calc['tax_rate'],
                'base_net'   => $calc['base']['net_eur'],   // z.B. 84.03
                'discounts'  => $calc['discounts']['net'],  // [{label, net, tax, gross, type}], net=positiv – später als NEGATIVE Position schreiben
                'item_desc'  => $itemDescription,
            ];

            // Contract.price = final NETTO (Cent)
            $finalNetCents = (int) round($calc['final']['net_eur'] * 100);

            $additionalData = $contractData; // da createContract json_encode($additionalData) macht

            $contract = $this->createContract(
                $company,
                $orderedProduct,    // wird als ordered_product in data gespeichert, das ist okay
                false,
                Carbon::now(),
                $additionalData,
                $interval
            );

            // Sofort Rechnung erzeugen, wenn kein Trial
            if ($orderedProduct->trial_period_days == 0)
            {
                // baue die Items exakt aus dem Contract-Snapshot
                $this->prepareInvoiceFromContractSnapshot($company, $contract);
            }

            return auth()->check()
                ? url('dashboard/'.$company->id.'/upgrade-page')
                : route('view.plans') . '#step-4';
        }

        $price = $orderedProduct->price;

        if ($couponCode)
        {
            $coupon = Coupon::where('code', $couponCode)->first();

            $cpCtrl = new CouponController;
            $price = $cpCtrl->calculateTotalPrice($coupon->promotion, $orderedProduct, false) * 100 ?? null;
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


    public function prepareInvoicePurchaseByInvoice($orderedProduct, $company, $contract = null)
    {
        if (!$contract) {
            return; // ohne Vertrag kein Snapshot -> nichts tun
        }

        // NEU: keine Berechnung mehr hier – nur aus dem Contract-Snapshot bauen
        $this->prepareInvoiceFromContractSnapshot($company, $contract);

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
        if (! $interval || ! in_array($interval, ['monthly', 'annual', 'one_time'])) {
            abort(400, 'Ungültiges Intervall.');
        }

        // Preis für dieses Intervall holen
        $priceModel = $product->prices()->where('interval', $interval)->first();
        if (! $priceModel) {
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
        $selection  = $request->input('product_selection');
        $couponCode = $request->input('coupon_code', '');

        if (! $selection || ! str_contains($selection, ':')) {
            return response()->json(['error' => 'Ungültige Produktauswahl.'], 400);
        }
        [$productId, $interval] = explode(':', $selection, 2);

        // 2) Lade Produkt und den passenden Preis
        $product = Product::find($productId);
        if (! $product) {
            return response()->json(['error' => 'Produkt nicht gefunden.'], 404);
        }
        $priceModel = $product->prices()->where('interval', $interval)->first();
        if (! $priceModel) {
            return response()->json(['error' => 'Kein Preis für dieses Intervall gefunden.'], 404);
        }

        // 3) Basis-Antwort aufbauen
        $basePriceCents = $priceModel->price;
        $formattedBase  = number_format($basePriceCents / 100, 2, ',', '.');

        $productDetails = [
            'name'            => $product->name,
            'description'     => $product->description,
            'price_cents'     => $basePriceCents,        // <— Integer Cent-Wert
            'formattedPrice'  => $formattedBase,         // <— String für Anzeige
            'interval'        => $interval,
            'trial_period_days' => $product->trial_period_days,
            'laufzeit'        => $product->lz,
        ];

        // 4) Rabattcode
        if ($couponCode && $coupon = Coupon::where('code', $couponCode)->first()) {
            $type = $coupon->promotion->discount_type === 'fixed'
                ? $coupon->promotion->formatted_discount . ' €'
                : $coupon->promotion->formatted_discount . ' %';

            $cpCtrl   = new CouponController;

            $subtotal = $cpCtrl->calculateTotalPrice($coupon->promotion, $priceModel,  false) ?? 0;
            $formattedSubtotal = number_format($subtotal, 2, ',', '.');


            $productDetails = [
                'name'                  => $product->name,
                'description'           => $product->description
                    . "<br>Aktionscode: <b>{$coupon->code}</b> angewendet.<br>"
                    . $coupon->promotion->description
                    . "<br><span style=\"display:inline-block;text-align:right;\">"
                    . "<b>{$formattedBase} €</b><br><b>&minus; {$type}</b>"
                    . "</span>",
                'formattedPrice'        => $formattedSubtotal, // <— formatiert für Anzeige
                'interval'              => $interval,
                'trial_period_days'     => $product->trial_period_days,
                'has_discount'          => true,
                'discountedPriceCents'  => $subtotal * 100,          // <— evtl. extra Feld
            ];
        }

        return response()->json($productDetails);
    }

    /**
     * Kaskadierte Preisberechnung + Netto-Zeilenableitung (für Invoice/Contract).
     * Gibt ALLES zurück, was du brauchst, um Contract->price (final NETTO) zu setzen
     * und Invoice-Items (Produktzeile NETTO + Rabattzeilen NETTO) zu bauen.
     */
    private function computePricingBreakdown(Product $product, string $interval, ?string $couponCode, ?Company $company): array
    {
        $taxRate = (float) (config('accounting.tax_rate') ?? 19);
        $divisor = 1 + ($taxRate / 100);

        // Basis: BRUTTO in Cent aus dem Intervall
        $priceModel = $product->prices()->where('interval', $interval)->first();
        $baseGrossCents = (int) ($priceModel ? $priceModel->price : $product->priceFor($interval));

        $currentGrossCents = $baseGrossCents;
        $discountsGross = []; // [['label'=>'..', 'grossCents'=>1234], ...]

        // 1) Coupon (so wie deine Logik: calculateTotalPrice($promo, $product, false) => NETTO-Euro)
        if (!empty($couponCode) && ($coupon = \App\Models\Coupon::where('code', $couponCode)->first())) {
            $cpCtrl = new \App\Http\Controllers\CouponController();

            // versuche netto → addiere MwSt
            $netAfter = (float) $cpCtrl->calculateTotalPrice($coupon->promotion, $product, false);
            $grossAfterCents = (int) round($netAfter * $divisor * 100);

            // Fallback: falls die Methode direkt Brutto liefert
            if ($grossAfterCents <= 0 || $grossAfterCents >= $currentGrossCents) {
                $grossAfter = (float) $cpCtrl->calculateTotalPrice($coupon->promotion, $product, true);
                $grossAfterCents = (int) round($grossAfter * 100);
            }

            $couponDiscount = max(0, $currentGrossCents - $grossAfterCents);
            if ($couponDiscount > 0) {
                $discountsGross[] = [
                    'type'       => 'coupon',
                    'label'      => 'Gutschein ' . $coupon->code,
                    'grossCents' => $couponDiscount,
                ];
                $currentGrossCents = $grossAfterCents;
            }
        }

        // 2) Agentur-Rabatt (kaskadiert)
        $agency = null;
        if ($company) {
            if ((int)($company->is_agency ?? 0) === 1) {
                $agency = $company;
            } elseif (!empty($company->agency_company_id)) {
                $agency = \App\Models\Company::find($company->agency_company_id);
            }
        }
        if ($agency && (int)($agency->is_agency ?? 0) === 1 && (float)($agency->agency_discount_percent ?? 0) > 0) {
            $pct = (float) $agency->agency_discount_percent;
            $agencyDiscount = (int) round($currentGrossCents * ($pct / 100));
            if ($agencyDiscount > 0) {
