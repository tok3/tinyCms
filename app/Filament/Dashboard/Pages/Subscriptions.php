<?php

namespace App\Filament\Dashboard\Pages;

use Filament\Pages\Page;
use App\Models\MollieSubscription;
use Auth;
use Illuminate\Database\Eloquent\Collection;
class Subscriptions extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.dashboard.pages.subscriptions';

    protected static ?string $title = 'Meine Abonnements';

    // Methode muss public sein
    public static function shouldRegisterNavigation(): bool
    {
        return Auth::user() && !Auth::user()->is_admin;
    }




    public function getSubscriptions()
    {

        $mollie_customer_id = Auth::user()->companies[0]->subscription->customer_id ?? null;
        if ($mollie_customer_id === null) {
            return collect(); // Leere Collection zurückgeben, wenn kein Mollie Customer vorhanden ist
        }

        return MollieSubscription::where('customer_id', $mollie_customer_id)
            ->where('status', 'active') // Nur aktive Abonnements
            ->get();
    }
    public function cancelSubscription($subscriptionId)
    {
        // Hier erfolgt die Kündigung des Abonnements
        $subscription = MollieSubscription::where('subscription_id', $subscriptionId)->first();

        if ($subscription) {
            $subscription->status = 'canceled';
            $subscription->save();

            session()->flash('success', 'Das Abonnement wurde gekündigt.');
        } else {
            session()->flash('error', 'Abonnement nicht gefunden.');
        }

        return redirect()->route('filament.pages.subscriptions-page');
    }
}

