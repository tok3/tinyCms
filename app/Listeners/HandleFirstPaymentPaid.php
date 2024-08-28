<?php
namespace App\Listeners;

use Laravel\Cashier\Events\FirstPaymentPaid;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Log;

class HandleFirstPaymentPaid
{
    /**
     * Handle the event.
     *
     * @param  FirstPaymentPaid  $event
     * @return void
     */
    public function handle(FirstPaymentPaid $event)
    {
        // Zugriff auf die Zahlung und die Bestellung
        $order = $event->order;
        $payment = $order->payment;

        // Beispiel: Loggen der Zahlungsinformationen
        Log::info('First payment paid: ', ['order' => $order, 'payment' => $payment]);

        // Hier können Sie benutzerdefinierte Logik hinzufügen
        // z.B. Aktualisieren einer Subscription, Senden einer E-Mail, etc.
    }
}
