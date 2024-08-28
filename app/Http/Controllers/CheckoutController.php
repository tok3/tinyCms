<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Mollie\Laravel\Facades\Mollie;
use App\Models\User;
use App\Models\Company;
use App\Models\Subscription;

/**
 *
 */
class CheckoutController extends Controller
{
    /**https://www.youtube.com/watch?v=fzZ9S2RxFPw&t=295s
     * Handle the incoming request.
     */

    public function preparePayment(Request $request)
    {

        $orderedProduct = Product::where('id', $request->input('product_id'))->first();

        $payment = Mollie::api()->payments->create([
            "amount" => [
                "currency" => $orderedProduct->currency,
                "value" => $orderedProduct->price // You must send the correct number of decimals, thus we enforce the use of strings
            ],
            "description" => $orderedProduct->name,
            "redirectUrl" => route('order.success'),
            "webhookUrl" => route('ng-webhook'),
            "metadata" => [
                "order_id" => "12345",
            ],
        ]);

        session()->put('pymentId', $payment->id);

        // redirect customer to Mollie checkout page
        return redirect($payment->getCheckoutUrl(), 303);
    }

    /**
     * After the customer has completed the transaction,
     * you can fetch, check and process the payment.
     * This logic typically goes into the controller handling the inbound webhook request.
     * See the webhook docs in /docs and on mollie.com for more information.
     */

    public function handleWebhookNotification(Request $request)
    {
        $paymentId = $request->input('id');


        $payment = Mollie::api()->payments->get($paymentId);

        \Log::info('Payment retrieved: ', (array) $payment);


        // Zahlungsdaten in die subscriptions Tabelle einfügen
        Subscription::create([
            'name' => 'Subscription Name', // Beispiel: Name des Abonnements
            'plan' => 'basic', // Beispiel: Plan des Abonnements
            'owner_type' => $payment->metadata->owner->type, // Beispiel: Besitzer-Typ (z.B. User Modell)
            'owner_id' => $payment->metadata->owner->id, // Beispiel: Besitzer-ID (z.B. User ID)
            'next_plan' => null, // Optional
            'quantity' => 1,
            'tax_percentage' => 0.0000,
            'ends_at' => null,
            'trial_ends_at' => null,
            'cycle_started_at' => now(),
            'cycle_ends_at' => null,
            'scheduled_order_item_id' => null,
            'cp_object' => json_encode($payment), // Zahlungsdaten als JSON speichern
        ]);



        if ($payment->isPaid())
        {
            echo 'Payment received.';
            // Do your thing ...
        }
        return response()->json(['message' => 'Payment saved successfully']);
    }


    public function success(Request $request)
    {

        $paymentId = session()->get('pymentId');

        $payment = Mollie::api()->payments->get($paymentId);
        // Zahlungsdaten in die subscriptions Tabelle einfügen

        // Zahlungsinformationen ausgeben, um zu sehen, was da kommt
        \Log::info('Payment retrieved: ', (array) $payment);

        // Zahlungsdaten in die subscriptions Tabelle einfügen
        Subscription::create([
            'name' => 'Subscription Name', // Beispiel: Name des Abonnements
            'plan' => 'basic', // Beispiel: Plan des Abonnements
            'owner_type' => 'App\\Models\\User', // Beispiel: Besitzer-Typ (z.B. User Modell)
            'owner_id' => 1, // Beispiel: Besitzer-ID (z.B. User ID)
            'next_plan' => null, // Optional
            'quantity' => 1,
            'tax_percentage' => 0.0000,
            'ends_at' => null,
            'trial_ends_at' => null,
            'cycle_started_at' => now(),
            'cycle_ends_at' => null,
            'scheduled_order_item_id' => null,
            'cp_object' => json_encode($payment), // Zahlungsdaten als JSON speichern
        ]);

        echo "<pre>";
        print_r($payment);
        echo "</pre>";
        if ($payment->isPaid())
        {
            echo 'Payment received.';
            // Do your thing ...
        }
    }

    public function cancel()
    {

        echo "canceled";
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function showPlans(Request $request)
    {

        $products = Product::where('active', 1)->get();

        return view('checkout', ['products' => $products]);
    }


    // test mollie subsctiption with mollie cashier

    public function newSubscription()
    {




        $user = Company::find(2);

// Make sure to configure the 'premium' plan in config/cashier_plans.php
        $result = $user->newSubscription('main', 'premium')->create();
    }


}
