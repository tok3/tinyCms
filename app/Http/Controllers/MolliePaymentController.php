<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Coupon;
use App\Models\Product;
use App\Services\InvoiceService;
use Carbon\Carbon;
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
use App\Services\MessageTranslationService;

class MolliePaymentController extends Controller
{

    var $contractID = null;


    /**
     * @param $subscriptionId
     * @param $customerId
     * @param $newAmount
     * @return mixed|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
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
        \Log::info('<---------------------------------->');
        \Log::info('Payment Webhook: ' . $request->id . ' -> ' . json_encode($request->json()->all(), JSON_PRETTY_PRINT));
        \Log::info('<---------------------------------->');

        // Erhalte die Payment-ID aus dem Webhook-Request

        $paymentId = $request->id;

        // Rufe die Zahlung über Mollie API ab
        $payment = Mollie::api()->payments->get($paymentId);

        \Log::info('<---------------------------------->');
        \Log::info('Payment: ' . $request->id . ' -> ' . json_encode($payment, JSON_PRETTY_PRINT));
        \Log::info('<---------------------------------->');

        // Decode metadata from the payment object
        $metadata = $payment->metadata; // Decode the metadata

        // Access the product_id safely
        $productId = $metadata->product_id ?? null; // Safely access the product_id
        $customerId = $payment->customerId ?? $metadata->customer_id ?? null; // Kunden-ID aus Payment oder Metadaten

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
                'customer_id' => $customerId ?? null,
                'country_code' => $payment->countryCode ?? null,
                'metadata' => json_encode($payment->metadata), // Metadaten als JSON speichern
                'details' => json_encode($payment->details) // Details als JSON speichern
            ]
        );


        if (isset($metadata->company_id) && $metadata->company_id != 0)
        {
            // firma existiert bereits
            $company = Company::where('id', $metadata->company_id)->first();
        }
        else
        {
            // firma und useraccount für firma initiieren
            $company = $this->initCompanyAccount($customerId);
        }


        // Unterscheide, ob eine Subscription erstellt werden muss
        if ($payment->sequenceType === 'first')
        {

            // Hole den Kunden anhand der Customer ID
            $mandates = $this->getMandates($customerId);

            $hasValidMandate = false;
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

            \Log::info('<---------------------------------->');
            \Log::info('MANDATE ' . $customerId . ' ' . $hasValidMandate . ' -> ' . json_encode($mandates, JSON_PRETTY_PRINT));
            \Log::info('<---------------------------------->');

            $productPriceDec = number_format($product->price / 100, 2, '.', '');

            if (isset($metadata->coupon_code) && $metadata->coupon_code != 0)
            {
                $coupon = Coupon::where('code', $metadata->coupon_code)->first();

                $cpCtrl = new CouponController;
                $productPriceDec = number_format($cpCtrl->calculateTotalPrice($coupon->promotion, $product, false), 2, '.', '');

                if ($coupon->infinite !== 1)
                {
                    $coupon->redeem();
                }
            }

            if ($hasValidMandate === true)
            {
                // Erstelle die Subscription
                // Subscription-Daten (Diese können je nach Bedarf angepasst werden)
                $subscriptionData = [
                    'amount' => [
                        'currency' => $product->currency,
                        'value' => $productPriceDec,  // Betrag der Subscription
                    ],
                    'interval' => $intervals[$product->interval], // Intervall für wiederkehrende Zahlungen
                    'description' => $product->name . ' ' . $product->description, // Korrigierte Beschreibung
                    'startDate' => $startDate, // Startdatum der ersten Abonnementzahlung
                    //  'webhookUrl' => route('mollie.subscriptionWebhook'), // Webhook URL für Subscription-Events
                    'webhookUrl' => route('mollie.paymentWebhook'),
                    'metadata' => [],
                ];

                $subscription = $this->createSubscription($customerId, $subscriptionData);

                //\Log::info('Subscription: ' . json_encode($subscription, JSON_PRETTY_PRINT));

                $this->syncLocalSubscription($subscription);

                // Add the subscription_id for the specified payment
                if (isset($subscription->id))
                {
                    MolliePayment::where('payment_id', $payment->id)
                        ->update(['subscription_id' => $subscription->id]);
                }

                $product->price = $productPriceDec * 100; // $productPrice is decimal contract in database is integer format

                // contract erstellen

                $additionalData = [];
                if (!empty($coupon))
                {
                    $additionalData['promotion'] = $coupon->promotion;
                    $additionalData['bemerkung'] = 'Product über Promocode erworben';
                }

                $this->createContract($company, $product, $subscription, $startDate, $additionalData);
            }
            else
            {
                // Falls kein gültiges Mandat existiert
                \Log::error('No valid mandate found for customer: ' . $hasValidMandate . ' ' . $customerId);
            }

        }
        elseif ($payment->subscriptionId !== null)
        {
            \Log::error('subsctiption JA aber kein first payment ');
            $subscription = $this->getMollieSubscription($payment->subscriptionId, $payment->customerId);

            // Aktualisiere oder speichere die Subscription in der Datenbank
            $this->syncLocalSubscription($subscription);

        }

        // Rechnung erstellen
        $this->prepareInvoice($payment->id);


    }


    /**
     * @param $company
     * @param $product
     * @param $subscription
     * @param $startDate
     * @return void
     */
    public function createContract($company, $product, $subscription = false, $startDate, array $additionalData = [])
    {
        // Füge das Produkt zu den zusätzlichen Daten hinzu
        $additionalData['ordered_product'] = $product;

        if (!is_object($subscription))
        {
            $subscriptionId = null;
        }
        else
        {
            $subscriptionId = $subscription->id;
        }


        \Log::info('<---------------------------------->');
        \Log::info('CONTRACT ERSTELLEN FÜR COMPANY: ' . json_encode($company, JSON_PRETTY_PRINT));
        \Log::info('<---------------------------------->');

        $duration = $product->lz ?? 24;

        $taxRate = config('accounting.tax_rate', 19); // 19%

        $grossPriceCents = $product->price; // z. B. 29000 Cent
        $grossPriceEuro = $grossPriceCents / 100; // → 290.00 €

        $netPriceEuro = $grossPriceEuro / (1 + ($taxRate / 100)); // → 243.697 €
        $netPriceCents = round($netPriceEuro * 100); // → 24370

        // Erstelle und speichere den Vertrag
        $contract = new Contract([
            'contractable_type' => \App\Models\Company::class,
            'contractable_id' => $company->id, // Verknüpfung mit der Company
            'product_id' => $product->id,
            'interval' => $product->interval,
            'price' => $netPriceCents,
            'subscription_id' => $subscriptionId,
            'subscription_start_date' => $startDate,
            'duration' => $duration,
            'data' => json_encode($additionalData), // JSON-Daten speichern
            'order_date' => Carbon::now(),
            'start_date' => \Carbon\Carbon::now()->addDays($product->trial_period_days),
            'end_date' => Carbon::now()->addDays($product->trial_period_days)->addMonths($duration), // Enddatum berechnen
        ]);

        $contract->save();

        $this->contractID = $contract->id;

        \Log::info('Contract erfolgreich erstellt: ' . json_encode($contract, JSON_PRETTY_PRINT));

        return $contract;
    }

    /**
     * @param $product
     * @return string
     */
    private function getStartDate($product)
    {
        // Falls eine Testperiode existiert, füge die Testtage hinzu
        if ($product->trial_period_days > 0)
        {
            return now()->addDays($product->trial_period_days)->toDateString();
        }

        // Falls keine Testperiode existiert, bestimme das Startdatum basierend auf dem Intervall
        switch ($product->interval)
        {
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


    /** sync subscriptions in local database
     *
     * @param $mollieSubscriptionResponse
     * @return true
     */
    private function syncLocalSubscription($mollieSubscriptionResponse)
    {

        \Log::info('<---------------------------------->');
        \Log::info('Subscription syncLocalSubscription(): ' . __LINE__ . json_encode($mollieSubscriptionResponse, JSON_PRETTY_PRINT));
        \Log::info('<---------------------------------->');
        // Prüfen, ob $mollieSubscriptionResponse ein Array ist
        if (is_array($mollieSubscriptionResponse))
        {
            // In ein Objekt umwandeln
            $mollieSubscriptionResponse = json_decode(json_encode($mollieSubscriptionResponse));

            \Log::info('<---------------------------------->');
            \Log::info('Subscription array to object: ' . __LINE__ . json_encode($mollieSubscriptionResponse, JSON_PRETTY_PRINT));
            \Log::info('<---------------------------------->');

        }

        if (isset($mollieSubscriptionResponse->id))
        {
            // Aktualisiere oder speichere die Subscription in der Datenbank
            MollieSubscription::updateOrCreate(
                ['subscription_id' => $mollieSubscriptionResponse->id],
                [
                    'customer_id' => $mollieSubscriptionResponse->customerId,
                    'amount_value' => $mollieSubscriptionResponse->amount->value,
                    'amount_currency' => $mollieSubscriptionResponse->amount->currency,
                    'times' => $mollieSubscriptionResponse->times,
                    'times_remaining' => $mollieSubscriptionResponse->timesRemaining,
                    'interval' => $mollieSubscriptionResponse->interval,
                    'status' => $mollieSubscriptionResponse->status,
                    'start_date' => $mollieSubscriptionResponse->startDate,
                    'next_payment_date' => $mollieSubscriptionResponse->nextPaymentDate ?? null,
                    'description' => $mollieSubscriptionResponse->description, // Hinzufügen des description-Feldes
                    'metadata' => json_encode($mollieSubscriptionResponse->metadata), // Hinzufügen des metadata-Feldes als JSON
                ]
            );
            \Log::info('<---------------------------------->');
            \Log::info('SUBSCRIPTION SYNCED: ' . __LINE__);
            \Log::info('<---------------------------------->');

            return true;
        }
        else
        {
            \Log::info('<---------------------------------->');
            \Log::info('SUBSCRIPTION NOT SYNCED no subscription id ' . __LINE__);
            \Log::info('<---------------------------------->');

            return false;
        }
    }

    /**
     * @param $customerId
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getMandates($customerId = 'cst_EuWP587Cqy', $maxRetries = 3, $delaySeconds = 2)
    {
        $client = new Client();
        $apiKey = env('MOLLIE_KEY');
        $retryCount = 0;

        while ($retryCount < $maxRetries)
        {
            // API-Request für Mandate des Kunden
            $response = $client->request('GET', "https://api.mollie.com/v2/customers/{$customerId}/mandates", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $apiKey,
                    'Accept' => 'application/json',
                ],
            ]);

            // JSON-Antwort dekodieren
            $mandates = json_decode($response->getBody(), true);

            // Überprüfe, ob ein gültiges Mandat vorhanden ist
            foreach ($mandates['_embedded']['mandates'] as $mandate)
            {
                if ($mandate['status'] === 'valid')
                {
                    return $mandates; // Gültiges Mandat gefunden, Rückgabe und Abbruch der Schleife
                }
            }

            $retryCount++;
            \Log::info("Retry #{$retryCount} für Mandat von Customer: {$customerId} nach {$delaySeconds} Sekunden.");
            sleep($delaySeconds); // Wartezeit zwischen den Versuchen
        }

        return $mandates; // Gibt das Mandat (ob gültig oder nicht) nach max. Versuchen zurück
    }


    /**
     * @param $paymentId
     * @return void
     */
    public function prepareInvoice($paymentId)
    {

        $payment = MolliePayment::where('payment_id', $paymentId)->first();

        if ($payment->amount_value > 0.00)
        {

            $customer = MollieCustomer::where('mollie_customer_id', $payment->customer_id)->first();


            $total_gross = $payment->amount_value; // Bruttobetrag
            $tax_rate = config('accounting.tax_rate'); // 19% Steuersatz

            // Berechnungen
            $total_net = round($total_gross / (1 + ($tax_rate / 100)), 2); // Nettobetrag
            $tax = $total_gross - $total_net; // Steuerbetrag


            $invoiceData = [
                'company_id' => $customer->model_id, // Eine existierende company_id, um eine Firma zu verknüpfen
                'contract_id' => $this->contractID, // vertrags id
                'issue_date' => now()->format('Y-m-d'),
                'mollie_payment_id' => $payment->payment_id,
                'due_date' => $payment->paid_at,
                'payment_date' => $payment->paid_at,
                'total_net' => $total_net,
                'total_gross' => $total_gross, // Mit Mehrwertsteuer
                'tax' => $tax, // Mit Mehrwertsteuer
                'tax_rate' => $tax_rate, // 19% Mehrwertsteuer
                'status' => 'paid', // 19% Mehrwertsteuer
                'data' => [
                    // Position 1
                    'items' => [
                        [
                            'id' => '1', // Positionsnummer
                            'description' => $payment->description, // Beschreibung
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
     * @param $subscriptionId
     * @param $customerId
     * @return mixed|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getMollieSubscription($subscriptionId, $customerId)
    {
        // Mollie API Schlüssel
        $apiKey = env('MOLLIE_KEY');
        $client = new Client();

        try
        {
            // Sende eine GET-Anfrage an die Mollie-API
            $response = $client->request('GET', "https://api.mollie.com/v2/customers/{$customerId}/subscriptions/{$subscriptionId}", [
                'headers' => [
                    'Authorization' => "Bearer {$apiKey}",
                    'Accept' => 'application/json',
                ],
            ]);

            // Den JSON-Body der Antwort als Array dekodieren
            $subscriptionData = json_decode($response->getBody()->getContents(), true);

            // Protokolliere oder arbeite mit den Daten
            \Log::info('Mollie Subscription Data: ' . json_encode($subscriptionData, JSON_PRETTY_PRINT));

            return $subscriptionData;

        }
        catch (\Exception $e)
        {
            // Fehlerbehandlung
            \Log::error('Error fetching Mollie subscription: ' . $e->getMessage());

            return null;
        }
    }

    /**
     * @param $customerId
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function createSubscription($customerId = 'cst_EuWP587Cqy', $subscriptionData)
    {
        $client = new Client();
        $apiKey = env('MOLLIE_KEY');

        try
        {
            // API-Request für die Erstellung der Subscription
            $response = $client->request('POST', "https://api.mollie.com/v2/customers/{$customerId}/subscriptions", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $apiKey,
                    'Accept' => 'application/json',
                ],
                'json' => $subscriptionData
            ]);

            // JSON-Antwort dekodieren
            $subscription = json_decode($response->getBody(), false);

            return $subscription;

        }
        catch (\GuzzleHttp\Exception\ClientException $e)
        {
            // Logge den Fehler und seine Details
            \Log::error('Error creating subscription: ' . __FILE__ . ' ' . __LINE__ . $e->getMessage(), [
                'customer_id' => $customerId,
                'subscription_data' => $subscriptionData,
            ]);

            // Optional: Rückgabe einer spezifischen Fehlermeldung oder `null`, falls die Subscription nicht erstellt wurde
            return null;
        }
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
                // Lösche jede Subscription
                $subscriptionId = $subscription['id'];

                try
                {
                    $client->request('DELETE', "https://api.mollie.com/v2/customers/{$customerId}/subscriptions/{$subscriptionId}", [
                        'headers' => [
                            'Authorization' => 'Bearer ' . $apiKey,
                            'Accept' => 'application/json',
                        ],
                    ]);

                    // Logge das Ergebnis
                    \Log::info("Deleted subscription: {$subscriptionId} for customer: {$customerId}");

                }
                catch (\Exception $e)
                {
                    // Logge den Fehler und fahre fort
                    \Log::warning("Skipping subscription with ID: {$subscriptionId} for customer: {$customerId}. Reason: " . $e->getMessage());
                    continue; // Überspringe diese Subscription und fahre mit der nächsten fort
                }
            }

            \Log::info("All subscriptions for customer {$customerId} have been processed.");
        }
        else
        {
            \Log::info("No subscriptions found for customer {$customerId}.");
        }


        return true;
    }


    /**
     * @param $mollieCustomerId
     * @return false
     */
    public function initCompanyAccount($mollieCustomerId)
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

            $tempData->delete();

            return $company;
        }
        else
        {
            // Eine oder beide Session-Daten fehlen
            //\Log::error('Benutzer- oder Firmendaten fehlen.');

            return false;
        }


    }


    /**
     * delete all subscriptions BE CAREFUL FOR CLEANING TESTDATA ONY
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function deleteAllSubscriptions()
    {

        $apiKey = env('MOLLIE_KEY');

        if (strpos($apiKey, 'test_') !== 0)
        {
            // Falls der API-Key nicht mit 'test_' beginnt, wird die Ausführung verhindert
            abort(403, 'Ungültiger API-Key. Nur Test-API-Keys sind erlaubt.');
        }

        $client = new Client();

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

    public function deleteAllCustomers()
    {
        $apiKey = env('MOLLIE_KEY');

        if (strpos($apiKey, 'test_') !== 0)
        {
            // Falls der API-Key nicht mit 'test_' beginnt, wird die Ausführung verhindert
            abort(403, 'Ungültiger API-Key. Nur Test-API-Keys sind erlaubt.');
        }

        $client = new Client();

        // 1. Hole alle Kunden
        $response = $client->request('GET', 'https://api.mollie.com/v2/customers', [
            'headers' => [
                'Authorization' => 'Bearer ' . $apiKey,
                'Accept' => 'application/json',
            ],
        ]);

        // 2. JSON-Antwort dekodieren
        $data = json_decode($response->getBody(), true);

        // 3. Überprüfe, ob Kunden vorhanden sind
        if (isset($data['_embedded']['customers']))
        {
            foreach ($data['_embedded']['customers'] as $customer)
            {
                $customerId = $customer['id'];

                // 4. Lösche alle Subscriptions für den Kunden
                $this->deleteCustomerSubscriptions($customerId);

                // 5. Lösche den Kunden
                $client->request('DELETE', "https://api.mollie.com/v2/customers/{$customerId}", [
                    'headers' => [
                        'Authorization' => 'Bearer ' . $apiKey,
                        'Accept' => 'application/json',
                    ],
                ]);

                // Logge das Ergebnis
                \Log::info("Deleted customer with ID: {$customerId}");
            }

            return "All customers have been deleted.";
        }
        else
        {
            return "No customers found.";
        }
    }


}
