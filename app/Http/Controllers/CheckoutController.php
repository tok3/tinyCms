<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
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

        $name = $request->input('user')['vorname'] . ' ' . $request->input('user')['name'];
        $email = $request->input('user')['email'];
        $billingEmail = $request->input('company')['email'];

        $customer = Mollie::api()->customers->create([
            'name' => $name,
            'email' => $email,
        ]);

        // Temporäre Daten in der Datenbank speichern
        TemporaryUserData::create([
            'mollie_customer_id' => $customer->id,
            'user_data' => json_encode($request->input('user')),
            'company_data' => json_encode($request->input('company')),
        ]);


        if ($orderedProduct->payment_type == 'one_time' && $orderedProduct->price <= 0)
        {

            $this->initCompanyAccount($customer->id);

            return route('view.plans') . '#step-4';

        }

        $price = $orderedProduct->price;
        if ($orderedProduct->trial_period_days > 0)
        {
            $price = 0.00;
        }
        // Zahlung erstellen
        $payment = Mollie::api()->payments->create([
            "amount" => [
                "currency" => $orderedProduct->currency,
                "value" => number_format($price / 100, 2, '.', '') // You must send the correct number of decimals, thus we enforce the use of strings
            ],
            'customerId' => $customer->id,
            'sequenceType' => 'first',
            'billingEmail' => $billingEmail,
            'description' => $orderedProduct->name,
            'redirectUrl' => url('preise#step-4'),
            'webhookUrl' => route('mollie.paymentWebhook'),
            "method" => ["creditcard", "directdebit", "sofort", "directdebit", "klarnapaylater", "ideal"],
            "metadata" => [
                "product_id" => $orderedProduct->id,
                "customer_id" => $customer->id,
                "company" => $request->input('company')['name'],
            ],
        ]);


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

        $products = Product::where('active', 1)
            ->orderBy('payment_type')->orderBy('id')->orderBy('sequence')->get();

        return view('checkout', ['products' => $products]);
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

        // Rückgabe der Produktdetails als JSON
        return response()->json($productDetails);
    }

}
