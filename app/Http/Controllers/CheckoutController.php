<?php

namespace App\Http\Controllers;

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

/**
 *
 */
class CheckoutController extends MolliePaymentController

{


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


        $orderedProduct = Product::where('id', $request->input('product_id'))->first();
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


            if ($request->input('payment_method') === 'sepa') {
                // Nutze die eingegebene IBAN

                $iban = preg_replace('/\s+/', '', trim($request->input('iban')));

                $mandate = Mollie::api()->customers->get($customerID)
                    ->createMandate([
                        'method'          => 'directdebit',
                        'consumerAccount' => $iban,
                        'consumerName'    => $name,
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
        // 0.00 Zahler, Gratis Accounts, gehen nicht über payment gateway
        if ($orderedProduct->payment_type == 'one_time' && $orderedProduct->price <= 0)
        {

            $company = $this->initCompanyAccount($customerID);

            $additionalData = [];

            if ($couponCode)
            {
                $coupon = Coupon::where('code', $couponCode)->first();

                $additionalData['promotion'] = $coupon->promotion;
                $additionalData['bemerkung'] = 'Product über Promocode erworben';
                session()->forget('coupon_code');
            }

            $this->createContract($company, $orderedProduct, false, Carbon::now(), $additionalData);

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


        if ($orderedProduct->payment_type == 'one_time' && $orderedProduct->price <= 0)
        {
            $payment = Mollie::api()->payments->create([
                "amount" => [
                    "currency" => $orderedProduct->currency,
                    "value" => number_format($price / 100, 2, '.', '')
                ],
                'billingEmail' => $billingEmail,
                'description' => $orderedProduct->name,
                'redirectUrl' => $request->input('company_id')
                    ? url('dashboard/'.$request->input('company_id').'/subscriptions')
                    : url('preise#step-4'),
                'webhookUrl' => route('mollie.paymentWebhook'),
                "method" => ["creditcard", "directdebit","paypal",  "sofort", "klarnapaylater", "ideal", "banktransfer"],
                "metadata" => $metadata,
            ]);
        }
        else
        {
            $methods = [
                'alma',
                'applepay',
                'bacs',
                'bancomatpay',
                'bancontact',
                'banktransfer',
                'belfius',
                'blik',
                'creditcard',
                'directdebit',
                'eps',
                'giftcard',
                'googlepay',
                'ideal',
                'in3',
                'kbc',
                'mbway',
                'multibanco',
                'mybank',
                'payconiq',
                'paypal',
                'paysafecard',
                'pointofsale',
                'przelewy24',
                'riverty',
                'satispay',
                'trustly',
                'twint',
                'voucher',
            ];
            $payment = Mollie::api()->payments->create([
                "amount" => [
                    "currency" => $orderedProduct->currency,
                    "value"    => number_format($price / 100, 2, '.', '')
                ],
                'customerId'   => $customerID,
                'sequenceType' => 'first',
                'billingEmail' => $billingEmail,
                'description'  => $orderedProduct->name,
                'redirectUrl'  => $request->input('company_id')
                    ? url('dashboard/' . $request->input('company_id') . '/subscriptions')
                    : url('preise#step-4'),
                'webhookUrl'   => route('mollie.paymentWebhook'),
             //   "method"       => ["creditcard", "directdebit", "sofort", "klarnapaylater", "ideal","paypal", "banktransfer"],
                "method"=>$methods,
                "metadata"     => $metadata,
            ]);
        }

        /*$payment = Mollie::api()->payments->create([
            "amount" => [
                "currency" => $orderedProduct->currency,
                "value" => number_format($price / 100, 2, '.', '') // You must send the correct number of decimals, thus we enforce the use of strings
            ],
            'customerId' => $customerID,
            'sequenceType' => 'first',
            'billingEmail' => $billingEmail,
            'description' => $orderedProduct->name,
            'redirectUrl' => $request->input('company_id')
                ? url('dashboard/'.$request->input('company_id').'/subscriptions')
                : url('preise#step-4'),
            'webhookUrl' => route('mollie.paymentWebhook'),
            "method" => ["creditcard", "directdebit", "sofort", "directdebit", "klarnapaylater", "ideal"],
            "metadata" => $metadata,
        ]);*/


        return $payment->getCheckoutUrl();

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
            ->orderBy('payment_type')->orderBy('id')->orderBy('sequence')->get();


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
        // Produkt-ID aus der Session abrufen
        $productId = $request->input('product_id');
        $couponCode = $request->input('coupon_code');

        if (!$productId)
        {
            return response()->json(['error' => 'Kein Produkt ausgewählt.'], 400);
        }

        // Produktdetails anhand der Produkt-ID abrufen
        $product = Product::find($productId);

        if (!$product)
        {
            return response()->json(['error' => 'Produkt nicht gefunden.'], 404);
        }

        // Produktdaten für die Ausgabe vorbereiten
        $productDetails = [
            'name' => $product->name,
            'description' => $product->description,
            'formattedPrice' => number_format($product->price / 100, 2, ',', '.'), // Preis in € formatieren
            'interval' => $product->interval,
            'trial_period_days' => $product->trial_period_days
        ];

        if ($couponCode)
        {
            // Hier kannst du den Rabattcode validieren
            $coupon = Coupon::where('code', $couponCode)->first();

            // Produktdaten für die Ausgabe vorbereiten

            $dicType = ($coupon->promotion->discount_type === 'fixed' ? $coupon->promotion->formatted_discount . ' €' : $coupon->promotion->formatted_discount . ' %');

            $cpCtrl = new CouponController;
            $subtotal = $cpCtrl->calculateTotalPrice($coupon->promotion, $product) ?? null;

            $productDetails = [
                'name' => $coupon->name,
                'description' => $product->description . "<br> Aktionscode: <b>" . $coupon->code . '</b> angewendet.<br> ' . $coupon->promotion->description . '<br><span style="width:auto !important; display:inline-block; text-align:right;"><b>' . number_format($product->price / 100, 2, ',', '.') . ' &euro;</b><br><b>&minus; ' . $dicType . '</span>',
                'formattedPrice' => $subtotal, // Preis in € formatieren
                'interval' => $product->interval,
                'trial_period_days' => $product->trial_period_days
            ];


        }

        // Rückgabe der Produktdetails als JSON
        return response()->json($productDetails);
    }

}
