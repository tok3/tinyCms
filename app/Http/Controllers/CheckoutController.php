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
    {// 1) Auswahl auslesen:
        //    Entweder neuer Key "product_selection" (z.B. "3:annual")
        //    oder alte Kombi aus product_id + interval
        $selection = $request->input('product_selection')
            ?: (
            $request->filled('product_id') && $request->filled('interval')
                ? $request->input('product_id') . ':' . $request->input('interval')
                : null
            );

        if (! $selection || ! str_contains($selection, ':')) {
            abort(400, 'Ungültige Produktauswahl: ' . json_encode($request->all()));
        }

        // 2) Aufsplitten in ID und Interval
        [$productId, $interval] = explode(':', $selection, 2);

        // 3) Zum Debuggen einfach mal ausgeben:
        echo "Produkt-ID: {$productId}\n";
        echo "Intervall: {$interval}\n";

        // 4) Produkt und Preis abrufen
        $product = Product::findOrFail($productId);

        // Falls Du eine product_prices-Tabelle hast:
        $priceModel = $product->prices()->where('interval', $interval)->firstOrFail();

        // 5) Build “orderedProduct” wie gewünscht
        //    Nimm alle Spalten des Produkts, überschreibe price + interval + formatted_price
        $orderedProduct = (object) array_merge(
            $product->toArray(),
            [
                'price'           => $priceModel->price,
                'interval'        => $interval,
                'formatted_price' => number_format($priceModel->price / 100, 2, ',', '.'),
            ]
        );

        echo "<pre>";
        print_r($orderedProduct);
        echo "</pre>";
        die();
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

                if ($coupon) {
                    $cpCtrl = new CouponController;
                    $discountedPriceDecimal = $cpCtrl->calculateTotalPrice($coupon->promotion, $orderedProduct, false);
                    $orderedProduct->price = round($discountedPriceDecimal * 100); // Preis im Produkt überschreiben (zentral korrekt in Cent!)

                    $additionalData['promotion'] = $coupon->promotion;
                    $additionalData['bemerkung'] = 'Product über Promocode erworben';
                    session()->forget('coupon_code');
                }
            }

            $contract = $this->createContract($company, $orderedProduct, false, Carbon::now(), $additionalData);

            if ($orderedProduct->trial_period_days == 0)
            {

                $this->prepareInvoicePurchaseByInvoice($orderedProduct, $company, $contract);
            }
            if (auth()->check())
            {
                return url('dashboard/'.$company->id.'/upgrade-page');

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

        if ($orderedProduct->trial_period_days > 0)
        {
            $price = 0.00;
        }
        // Zahlung erstellen
        $metadata = [
            "product_id" => $orderedProduct->id,
            "customer_id" => $customerID,
            "company" => $request->input('company')['name'],
            "coupon_code" => $request->input('coupon_code') ?? '0',
            "company_id" => $request->input('company_id') ?? '0',
        ];

        if ($couponCode)
        {
            $metadata['coupon_code'] = $couponCode;
        }

        $descriptionText = FormatHelper::stripHtmlButKeepSpaces($orderedProduct->invoice_description ?: $orderedProduct->description);

        $itemDescription = Str::limit(
            $orderedProduct->name . ', ' . $descriptionText,
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
                    ? url('dashboard/' . $request->input('company_id') . '/subscriptions')
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
                    ? url('dashboard/' . $request->input('company_id') . '/subscriptions')
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

        $tax_rate = config('accounting.tax_rate');

        $total_gross = $orderedProduct->price / 100; // Bruttobetrag

        if ($total_gross > 0.00)
        {
            if ($orderedProduct->promotion)
            {
                $cpCtrl = new CouponController;
                $total_gross = number_format($cpCtrl->calculateTotalPrice($orderedProduct->promotion, $orderedProduct, false), 2, '.', '');
            }

            $tax_rate = config('accounting.tax_rate'); // 19% Steuersatz

            // Berechnungen
            $total_net = round($total_gross / (1 + ($tax_rate / 100)), 2); // Nettobetrag
            $tax = $total_gross - $total_net; // Steuerbetrag

            $descriptionText = FormatHelper::stripHtmlButKeepSpaces($orderedProduct->invoice_description ?: $orderedProduct->description);

            $itemDescription = Str::limit(
                $orderedProduct->name . ', ' . $descriptionText,
                $this->descriptionLength,
                '...'
            );

            $invoiceData = [
                'company_id' => $company->id, // Eine existierende company_id, um eine Firma zu verknüpfen
                'contract_id' => $contract->id, // vertrags id
                'issue_date' => now()->format('Y-m-d'),
                'mollie_payment_id' => null,
                'due_date' => \Carbon\Carbon::now()->addWeekdays(10)->format('Y-m-d'),
                'payment_date' => null,
                'total_net' => $total_net,
                'total_gross' => $total_gross, // Mit Mehrwertsteuer
                'tax' => $tax, // Mit Mehrwertsteuer
                'tax_rate' => $tax_rate, // Mehrwertsteuer
                'status' => 'sent',
                'data' => [
                    // Position 1
                    'items' => [
                        [
                            'id' => '1', // Positionsnummer
                            'description' => $itemDescription, // Beschreibung
                            'quantity' => 1, // Menge
                            'line_total_amount' => $total_net, // Gesamtbetrag für diese Position
                        ],
                        /*   [
                               'id' => '2', // Positionsnummer
                               'description' => 'description',
                               'quantity' => 1,
                               'line_amount' => '199.00',
                           ],*/
                    ],

                ]
            ];


            $invoiceService = new InvoiceService();

            $invoiceService->createInvoice($invoiceData);

            $invoiceService->sendInvoiceEmail();
        }

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
    public function checkoutUpgrade(Request $request)
    {
        $request->session()->put('product_id', $request->product);
        $products = Product::where(['active' => 1, 'visible' => 1])
            ->orderBy('payment_type')->orderBy('id')->orderBy('sequence')->get();


        return view('checkout-upgrade', ['products' => $products]);
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

        // 3) Baue Basis-Antwort
        $baseCents  = $priceModel->price;
        $formatted  = number_format($baseCents / 100, 2, ',', '.');
        $details = [
            'name'              => $product->name,
            'description'       => $product->description,
            'formattedPrice'    => $formatted,
            'interval'          => $interval,
            'trial_period_days' => $product->trial_period_days,
            'laufzeit'          => $product->lz,
        ];

        // 4) Ggf. Rabatt
        if ($couponCode) {
            $coupon = Coupon::where('code', $couponCode)->first();
            if ($coupon) {
                $type = $coupon->promotion->discount_type === 'fixed'
                    ? $coupon->promotion->formatted_discount.' €'
                    : $coupon->promotion->formatted_discount.' %';
                $cpCtrl   = new CouponController;
                $subtotal = $cpCtrl->calculateTotalPrice($coupon->promotion, $product, $interval) ?? 0;
                $formattedSubtotal = number_format($subtotal/100, 2, ',', '.');

                $details = [
                    'name'              => $product->name,
                    'description'       => $product->description
                        . "<br>Aktionscode: <b>{$coupon->code}</b> angewendet.<br>{$coupon->promotion->description}"
                        . "<br><span style=\"display:inline-block;text-align:right;\"><b>{$formatted} €</b><br><b>&minus; {$type}</b></span>",
                    'formattedPrice'    => $formattedSubtotal,
                    'interval'          => $interval,
                    'trial_period_days' => $product->trial_period_days,
                    'has_discount'      => true,
                    'discountedPrice'   => $formattedSubtotal,
                ];
            }
        }

        return response()->json($details);
    }

}
