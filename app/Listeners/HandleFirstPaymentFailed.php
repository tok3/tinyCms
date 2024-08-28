<?php
namespace App\Listeners;

use Laravel\Cashier\Events\FirstPaymentFailed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Log;

class HandleFirstPaymentFailed
{
    /**
     * Handle the event.
     *
     * @param  FirstPaymentFailed  $event
     * @return void
     */
    public function handle(FirstPaymentFailed $event)
    {
        // Zugriff auf die Zahlung und die Bestellung
        $order = $event->order;
        $payment = $order->payment;

        // Beispiel: Loggen der Zahlungsinformationen
        Log::error('First payment failed: ', ['order' => $order, 'payment' => $payment]);

        // Hier können Sie benutzerdefinierte Logik hinzufügen
        // z.B. Benachrichtigung des Nutzers, etc.
    }
}
