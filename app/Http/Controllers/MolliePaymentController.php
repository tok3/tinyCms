<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Mollie\Laravel\Facades\Mollie;
use App\Models\MolliePayment;
use App\Models\MollieSubscription;
use GuzzleHttp\Client;
use App\Models\User;
use App\Models\Company;
use App\Models\TemporaryUserData;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use App\Models\MollieCustomer;

class MolliePaymentController extends Controller
{


    public function test()
    {

        /// user register test

        // Benutzer registrieren und in der Datenbank speichern
        // Erstelle einen Faker-Instanz
        $faker = Faker::create();

        // Falsche Benutzerdaten für Tests erstellen
        $fakeUserData = [
            'name' => $faker->name,
            'email' => $faker->unique()->safeEmail,
            'password' => Hash::make('password123'), // Beispiel für ein Testpasswort
        ];

        // Benutzer registrieren und in der Datenbank speichern
        $user = User::create([
            'name' => $fakeUserData['name'],
            'email' => 'test' . time() . '@eq3w.de',
            'password' => $fakeUserData['password'], // Bereits gehasht
        ]);


        die();
        // fetchtest
        $customerID = 'cst_dSioH9Xsg2';
        $subscriptionId = 'sub_8MwaGqmCWH';
        $client = new Client();

// Authentifizierung mit deinem Mollie API Key
        $apiKey = env('MOLLIE_KEY');

        $response = $client->request('GET', "https://api.mollie.com/v2/customers/{$customerID}/subscriptions/{$subscriptionId}", [
            'headers' => [
                'Authorization' => 'Bearer ' . $apiKey,
                'Accept' => 'application/json',
            ],
        ]);

        $subscriptionData = json_decode($response->getBody(), true);
        echo "<pre>";
        print_r($subscriptionData);
        echo "</pre>";
        die();
        // updarte test
        $resp = $this->updateSubscriptionAmount($subscriptionId, $customerID, '18.30');

        echo "<pre>";
        print_r($resp);
        echo "</pre>";
//$this->deleteAllSubscriptions();
        $customer = Mollie::api()->customers->get('cst_mMnp2Khrbq');
        $mandates = Mollie::api()->mandates->listFor($customer);
        echo "<pre>";
        print_r($mandates);
        echo "</pre>";
        die();
    }


    function updateSubscriptionAmount($subscriptionId, $customerId, $newAmount)
    {
        $client = new Client();

        // Authentifizierung mit deinem Mollie API Key
        $apiKey = env('MOLLIE_KEY');

        // Der Betrag muss im richtigen Format gesendet werden (z.B. "12.20")
        $formattedAmount = number_format($newAmount, 2, '.', '');

        try
        {
            $response = $client->request('PATCH', "https://api.mollie.com/v2/customers/{$customerId}/subscriptions/{$subscriptionId}", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $apiKey,
                    'Accept' => 'application/json',
                ],
                'json' => [
                    'amount' => [
                        'value' => $formattedAmount,
                        'currency' => 'EUR', // Währung festlegen
                    ]
                ]
            ]);

            // Erfolgreiche Antwort von Mollie
            $responseData = json_decode($response->getBody(), true);

            return $responseData; // Optional: Rückgabe der aktualisierten Subscription-Daten
        }
        catch (\Exception $e)
        {
            // Fehlerbehandlung
            //\Log::error('Fehler beim Update der Subscription: ' . $e->getMessage());

            return null;
        }
    }

    /**
     * @param Request $request
     * @return void
     * @throws \Mollie\Api\Exceptions\ApiException
     */
    public function handlePaymentNotification(Request $request)
    {

        //\Log::info($request->id . __FILE__ . ' COMPLETE REQUEST: ' . json_encode($request->json()->all(), JSON_PRETTY_PRINT));
        // Erhalte die Payment-ID aus dem Webhook-Request

        $paymentId = $request->id;

        // Rufe die Zahlung über Mollie API ab
        $payment = Mollie::api()->payments->get($paymentId);

        // Decode metadata from the payment object
        $metadata = $payment->metadata; // Decode the metadata

        // Access the product_id safely
        $productId = $metadata->product_id ?? null; // Safely access the product_id

        // Fetch the product based on the product_id

        if ($productId)
        {
            $product = Product::find($productId); // Find the product by its ID
        }
        else
        {
            $product = null; // Handle the case where product_id is not found
        }
        // Logge die empfangenen Daten
        //\Log::info('Webhook received payment: ' . __FILE__ . json_encode($request->all()) . ' | Payment: ' . json_encode($payment));

        MolliePayment::updateOrCreate(
            ['payment_id' => $payment->id], // Bedingung: nach payment_id suchen
            [
                'mode' => $payment->mode,
                'amount_value' => $payment->amount->value,
                'amount_currency' => $payment->amount->currency,
                'settlement_amount_value' => $payment->settlementAmount->value ?? 0.00,
                'settlement_amount_currency' => $payment->settlementAmount->currency ?? $product->currency,
                'amount_refunded_value' => $payment->amountRefunded->value ?? 0.00,
                'amount_remaining_value' => $payment->amountRemaining->value ?? 0.00,
                'description' => $payment->description,
                'method' => $payment->method,
                'status' => $payment->status,
                'created_at' => $payment->createdAt,
                'paid_at' => $payment->paidAt ?? null,
                'canceled_at' => $payment->canceledAt ?? null,
                'expires_at' => $payment->expiresAt ?? null,
                'failed_at' => $payment->failedAt ?? null,
                'due_date' => $payment->dueDate ?? null,
                'billing_email' => $payment->billingAddress->email ?? null,
                'profile_id' => $payment->profileId ?? null,
                'sequence_type' => $payment->sequenceType,
                'redirect_url' => $payment->redirectUrl ?? null,
                'webhook_url' => $payment->webhookUrl ?? null,
                'mandate_id' => $payment->mandateId ?? null,
                'subscription_id' => $payment->subscriptionId ?? null,
                'order_id' => $payment->orderId ?? null,
                'customer_id' => $payment->customerId ?? null,
                'country_code' => $payment->countryCode ?? null,
                'metadata' => json_encode($payment->metadata), // Metadaten als JSON speichern
                'details' => json_encode($payment->details) // Details als JSON speichern
            ]
        );



        // firma und useraccount für firma initiieren
        $this->initCompanyAccount($payment->customerId);


        // Unterscheide, ob eine Subscription erstellt werden muss
        if ($payment->sequenceType === 'first')
        {

            // Dies ist die erste Zahlung für ein Mandat, erstelle die Subscription
            $customerId = $payment->customerId;

            // Hole den Kunden anhand der Customer ID

            //     $customer = Mollie::api()->customers->get($customerId);
            //  $mandates = Mollie::api()->mandates->listFor($customer);
            $mandates = $this->getMandates($customerId);
            // Überprüfe, ob ein gültiges Mandat vorhanden ist
            $hasValidMandate = false;
            //\Log::info('MANDATE: ' . json_encode($mandates, JSON_PRETTY_PRINT));
            foreach ($mandates['_embedded']['mandates'] as $mandate)
            {
                if ($mandate['status'] === 'valid')
                {
                    $hasValidMandate = true;
                    break;
                }
            }
            $intervals['daily'] = '1 day';
            $intervals['weekly'] = '1 week';
            $intervals['monthly'] = '1 month';
            $intervals['annual'] = '12 months';


          $startDate = $this->getStartDate($product);

            if ($hasValidMandate)
            {
                // Erstelle die Subscription
                // Subscription-Daten (Diese können je nach Bedarf angepasst werden)
                $subscriptionData = [
                    'amount' => [
                        'currency' => $product->currency,
                        'value' => number_format($product->price / 100, 2, '.', '')  // Betrag der Subscription
                    ],
                    'interval' => $intervals[$product->interval], // Intervall für wiederkehrende Zahlungen
                    'description' => $product->name . ' ' . $product->dscription,
                    'startDate' => $startDate, // Startdatum der ersten Abonnementzahlung
                    'webhookUrl' => route('mollie.subscriptionWebhook'), // Webhook URL für Subscription-Events
                    'metadata' => [
                        'order_id' => str_pad(mt_rand(0, 99999), 5, '0', STR_PAD_LEFT) // Hier kannst du zusätzliche Metadaten hinzufügen
                    ],
                ];


                $subscription = $this->createSubscription($customerId, $subscriptionData);

                //\Log::info('Subscription: ' . json_encode($subscription, JSON_PRETTY_PRINT));
                MollieSubscription::updateOrCreate(
                    ['subscription_id' => $subscription->id],
                    [
                        'customer_id' => $subscription->customerId,
                        'amount_value' => $subscription->amount->value,
                        'amount_currency' => $subscription->amount->currency,
                        'interval' => $subscription->interval,
                        'status' => $subscription->status,
                        'start_date' => $subscription->startDate,
                        'next_payment_date' => $subscription->nextPaymentDate ?? null,
                        'description' => $subscription->description, // Hinzufügen des description-Feldes
                        'metadata' => json_encode($subscription->metadata), // Hinzufügen des metadata-Feldes als JSON
                    ]
                );

                // Update the subscription_id for the specified payment
                MolliePayment::where('payment_id', $payment->id)
                    ->update(['subscription_id' => $subscription->id]);

                //\Log::info('Subscription created for customer: ' . $customerId);

                /*     $subscription = Mollie::api()->customers()->get($customerId)->subscriptions()->create([
                    "amount" => [
                        "currency" => $payment->amount->currency,
                        "value" => $payment->amount->value // Betrag für das Abonnement
                    ],
                    "interval" => "1 month", // Wiederkehrende Zahlung
                    "description" => "Monthly subscription",
                    "startDate" => now()->addMonth(),
                    "webhookUrl" => route('mollie.subscriptionWebhook') // Webhook für Subscription-Events
                ]);

                //\Log::info('Subscription created for customer: ' . $customer->id);
           */
            }
            else
            {
                // Falls kein gültiges Mandat existiert
                //\Log::error('No valid mandate found for customer: ' . $hasValidMandate . ' ' . $customerId);
            }

        }


    }

    /**
     * @param $product
     * @return string
     */
    private function getStartDate($product)
    {
        // Falls eine Testperiode existiert, füge die Testtage hinzu
        if ($product->trial_period_days > 0) {
            return now()->addDays($product->trial_period_days)->toDateString();
        }

        // Falls keine Testperiode existiert, bestimme das Startdatum basierend auf dem Intervall
        switch ($product->interval) {
            case 'daily':
                return now()->addDay()->toDateString();
            case 'weekly':
                return now()->addWeek()->toDateString();
            case 'monthly':
                return now()->addMonth()->toDateString();
            case 'annual':
                return now()->addYear()->toDateString();
            default:
                // Fallback-Startdatum, falls kein Intervall vorhanden oder ungenau ist
                return now()->toDateString();
        }
    }

    /**
     * @param Request $request
     * @return void
     */
    public function handleSubscriptionWebhook(Request $request)
    {
        // Erhalte die Subscription ID aus dem Webhook-Request
        $subscriptionId = $request->input('id');

        // Rufe die Subscription über Mollie API ab
        $subscription = Mollie::api()->subscriptions()->get($subscriptionId);

        \Log::info('<---------------------------------->');
        \Log::info('Subscription From Webhook: ' . json_encode($subscription, JSON_PRETTY_PRINT));
        \Log::info('<---------------------------------->');

        // Aktualisiere oder speichere die Subscription in der Datenbank
        MollieSubscription::updateOrCreate(
            ['subscription_id' => $subscription->id],
            [
                'customer_id' => $subscription->customerId,
                'amount_value' => $subscription->amount->value,
                'amount_currency' => $subscription->amount->currency,
                'interval' => $subscription->interval,
                'status' => $subscription->status,
                'start_date' => $subscription->startDate,
                'next_payment_date' => $subscription->nextPaymentDate ?? null,
            ]
        );

        // Logge die Aktion
        //\Log::info('Subscription webhook received for subscription ID: ' . $subscription->id);
    }


    /**
     * @param $customerId
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getMandates($customerId = 'cst_EuWP587Cqy')
    {

        $client = new Client();

        // Authentifizierung mit deinem Mollie API Key
        $apiKey = env('MOLLIE_KEY');


        // API-Request für Mandate des Kunden
        $response = $client->request('GET', "https://api.mollie.com/v2/customers/{$customerId}/mandates", [
            'headers' => [
                'Authorization' => 'Bearer ' . $apiKey,
                'Accept' => 'application/json',
            ],
        ]);

        // JSON-Antwort dekodieren
        $mandates = json_decode($response->getBody(), true);

        return $mandates;
    }


    /**
     * @param $customerId
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function createSubscription($customerId = 'cst_EuWP587Cqy', $subscriptionData)
    {
        $client = new Client();

        // Authentifizierung mit deinem Mollie API Key
        $apiKey = env('MOLLIE_KEY');

        // API-Request für die Erstellung der Subscription
        $response = $client->request('POST', "https://api.mollie.com/v2/customers/{$customerId}/subscriptions", [
            'headers' => [
                'Authorization' => 'Bearer ' . $apiKey,
                'Accept' => 'application/json',
            ],
            'json' => $subscriptionData // Subscription-Daten im JSON-Format
        ]);

        // JSON-Antwort dekodieren
        $subscription = json_decode($response->getBody(), false);

        //\Log::info('Subscription: ' . json_encode($subscription, JSON_PRETTY_PRINT));

        return $subscription;
    }


    /**
     * Delete all subscriptions for specified customer
     * @param $customerId
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function deleteCustomerSubscriptions($customerId)
    {
        $client = new Client();
        $apiKey = env('MOLLIE_KEY');

        // 1. Hole alle Subscriptions für den angegebenen Kunden
        $response = $client->request('GET', "https://api.mollie.com/v2/customers/{$customerId}/subscriptions", [
            'headers' => [
                'Authorization' => 'Bearer ' . $apiKey,
                'Accept' => 'application/json',
            ],
        ]);

        // 2. JSON-Antwort dekodieren
        $subscriptions = json_decode($response->getBody(), true);

        // 3. Überprüfe, ob Subscriptions vorhanden sind
        if (isset($subscriptions['_embedded']['subscriptions']))
        {
            foreach ($subscriptions['_embedded']['subscriptions'] as $subscription)
            {
                // 4. Lösche jede Subscription
                $subscriptionId = $subscription['id'];
                $client->request('DELETE', "https://api.mollie.com/v2/customers/{$customerId}/subscriptions/{$subscriptionId}", [
                    'headers' => [
                        'Authorization' => 'Bearer ' . $apiKey,
                        'Accept' => 'application/json',
                    ],
                ]);

                // Logge das Ergebnis
                //\Log::info("Deleted subscription: {$subscriptionId}");
            }

            //\Log::info("All subscriptions for customer {$customerId} have been deleted.");
        }
        else
        {
            //\Log::info("No subscriptions found for customer {$customerId}.");
        }


        return true;
    }


    /**
     * delete all subscriptions BE CAREFUL FOR CLEANING TESTDATA ONY
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function deleteAllSubscriptions()
    {
        $client = new Client();
        $apiKey = env('MOLLIE_KEY');

        // 1. Hole alle Subscriptions
        $response = $client->request('GET', 'https://api.mollie.com/v2/subscriptions', [
            'headers' => [
                'Authorization' => 'Bearer ' . $apiKey,
                'Accept' => 'application/json',
            ],
        ]);

        // 2. JSON-Antwort dekodieren
        $data = json_decode($response->getBody(), true);

        // 3. Überprüfe, ob Subscriptions vorhanden sind
        if (isset($data['_embedded']['subscriptions']))
        {
            foreach ($data['_embedded']['subscriptions'] as $subscription)
            {
                $subscriptionId = $subscription['id'];
                $customerId = $subscription['customerId'];

                // 4. Lösche die Subscription
                $client->request('DELETE', "https://api.mollie.com/v2/customers/{$customerId}/subscriptions/{$subscriptionId}", [
                    'headers' => [
                        'Authorization' => 'Bearer ' . $apiKey,
                        'Accept' => 'application/json',
                    ],
                ]);

                // Logge das Ergebnis
                //\Log::info("Deleted subscription with ID: {$subscriptionId} for customer: {$customerId}");
            }

            return "All subscriptions have been deleted.";
        }
        else
        {
            return "No subscriptions found.";
        }
    }


    private function initCompanyAccount($mollieCustomerId)
    {
        $tempData = TemporaryUserData::where('mollie_customer_id', $mollieCustomerId)->first();
        if ($tempData)
        {

            // User- und Firmendaten aus dem JSON extrahieren
            $userData = json_decode($tempData->user_data, true);
            $companyData = json_decode($tempData->company_data, true);

            // Firma erstellen
            $company = Company::create($companyData);


            // MollieCustomer mit Zuordnung zu Company erstellen
            $mollieCustomer = MollieCustomer::create([
                'mollie_customer_id' => $mollieCustomerId, // Hier die Mollie Customer ID übergeben
                'model_id' => $company->id,               // ID der erstellten Company
                'model_type' => get_class($company),      // Polymorph: Modelltyp, z.B. "App\Models\Company"
            ]);

            $userData = [
                'name' => trim($userData['vorname'] . ' ' . $userData['name']),
                'email' => $userData['email'],
                'password' => Hash::make($userData['password']),
            ];

            // Benutzer registrieren und in der Datenbank speichern
            $user = User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'password' => $userData['password'],
            ]);

            // Verknüpfung in der Pivot-Tabelle company_user herstellen
            $user->companies()->attach($company->id);

            // Verification Mail an User senden
            $user->sendEmailVerificationNotification();

            session()->forget(['user', 'company']);

            session(['user_email' => $user->email]);
        }
        else
        {
            // Eine oder beide Session-Daten fehlen
            //\Log::error('Benutzer- oder Firmendaten fehlen.');

            return false;
        }


    }

}
