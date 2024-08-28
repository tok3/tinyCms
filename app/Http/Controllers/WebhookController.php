<?php
namespace App\Http\Controllers;

use Laravel\Cashier\Http\Controllers\WebhookController as CashierController;
use Illuminate\Http\Request;
use App\Models\Subscription;
use Log;

class WebhookController extends CashierController
{
    public function handleWebhook(Request $request)
    {
        // Hier können Sie allgemeine Logik hinzufügen, die für alle Webhook-Events gilt
        Log::info('Webhook Received: ' . json_encode($request));
        // Rufen Sie die übergeordnete Methode auf, um die von Laravel Cashier Mollie bereitgestellte Logik zu behalten
        return parent::handleWebhook($request);
    }

    /**
     * Handle a successful payment.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function handlePaidSuccessfully(Request $request)
    {
        // Hier können Sie spezifische Logik für erfolgreiche Zahlungen hinzufügen
        $payment = $request->input('data');

        Log::info('Payment successful: ' . json_encode($payment));

        // Beispiel: Speichern der Zahlungsdaten in der Datenbank
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

        return response()->json(['message' => 'Payment handled successfully'], 200);
    }
}
