<?php
namespace App\Filament\Resources\Admin\MollieSubscriptionResource\Pages;
use App\Filament\Resources\Admin\MollieSubscriptionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use GuzzleHttp\Client;

class EditMollieSubscription extends EditRecord
{
    protected static string $resource = MollieSubscriptionResource::class;

    // Verwende die mount()-Methode, um die Daten zu aktualisieren
    public function mount($record): void
    {
        parent::mount($record); // Rufe die ursprüngliche Logik auf

        // Aktualisiere die Subscription-Daten in der Datenbank mit den Daten von Mollie
        $this->updateLocalSubscriptionData();
    }

    // Funktion zur Aktualisierung der Subscription-Daten von Mollie
    protected function updateLocalSubscriptionData()
    {
        return null;
        $record = $this->record;

        $subscriptionId = $record->subscription_id;
        $customerId = $record->customer_id;

        if (!$subscriptionId || !$customerId) {
            \Log::error('Subscription-ID oder Customer-ID fehlt');
            return;
        }

        // API-Request an Mollie, um die aktuellen Subscription-Daten zu holen
        $client = new Client();
        $apiKey = env('MOLLIE_KEY');

        try {
            $response = $client->request('GET', "https://api.mollie.com/v2/customers/{$customerId}/subscriptions/{$subscriptionId}", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $apiKey,
                    'Accept'        => 'application/json',
                ],
            ]);

            $subscriptionData = json_decode($response->getBody(), true);

            // Aktualisiere die Datenbank mit den abgerufenen Daten
            $record->update([
                'amount_value'      => $subscriptionData['amount']['value'],
                'amount_currency'   => $subscriptionData['amount']['currency'],
                'description'       => $subscriptionData['description'],
                'status'            => $subscriptionData['status'],
                'start_date'        => $subscriptionData['startDate'],
                'next_payment_date' => $subscriptionData['nextPaymentDate'] ?? null,
            ]);


        } catch (\Exception $e) {
            \Log::error('Fehler beim Abrufen der Subscription-Daten von Mollie: ' . $e->getMessage());
        }
    }


    // Override the save method to update Mollie API
    public function save(bool $shouldRedirect = true, bool $shouldSendSavedNotification = true): void
    {
        $record = $this->record;
        $client = new \GuzzleHttp\Client();
        $apiKey = env('MOLLIE_KEY');

        // Update Mollie API
        try {
            $response = $client->request('PATCH', "https://api.mollie.com/v2/customers/{$record->customer_id}/subscriptions/{$record->subscription_id}", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $apiKey,
                    'Accept'        => 'application/json',
                ],
                'json' => [
                    'amount' => [
                        'value'    => number_format($this->data['amount_value'], 2, '.', ''), // Format amount as decimal
                        'currency' => $record->amount_currency,
                    ],
                    'description' => $this->data['description'],
                    'startDate'   => $this->data['start_date'],
                    'interval'    => $record->interval,
                ],
            ]);

            // If the API request is successful, proceed to save in the database
            parent::save($shouldRedirect, $shouldSendSavedNotification);

        } catch (\Exception $e) {
            \Log::error('Failed to update Mollie subscription: ' . $e->getMessage());
            // Optionally handle the error (e.g., display an error message)
        }
    }

   /* public function save(bool $shouldRedirect = true, bool $shouldSendSavedNotification = true): void
    {
        $record = $this->record;

        // API-Request zum Aktualisieren der Subscription bei Mollie
        $client = new Client();
        $apiKey = env('MOLLIE_KEY');

        try {
            $startDate = \Carbon\Carbon::parse($this->data['start_date'])->format('Y-m-d');
            $nextPaymentDate = \Carbon\Carbon::parse($this->data['next_payment_date'])->format('Y-m-d');

            $response = $client->request('PATCH', "https://api.mollie.com/v2/customers/{$record->customer_id}/subscriptions/{$record->subscription_id}", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $apiKey,
                    'Accept'        => 'application/json',
                ],
                'json' => [
                    'amount' => [
                        'value'    => number_format($this->data['amount_value'], 2, '.', ''), // Betrag formatieren
                        'currency' => $this->data['amount_currency'], // Währung beibehalten
                    ],
                    'startDate' => $startDate, // Formatiertes Startdatum senden
                    //'nextPaymentDate' => $nextPaymentDate, // Formatiertes Next Payment Date senden
                    'description' => $this->data['description'], // Beschreibung aktualisieren
                ]
            ]);

            // Optional: Rückmeldung von Mollie
            $updatedSubscription = json_decode($response->getBody(), true);

        } catch (\Exception $e) {
            \Log::error('Fehler beim Senden der Subscription-Daten an Mollie: ' . $e->getMessage());
        }

        // Rufe die Standard-Speicherlogik von Filament auf, um die Daten lokal zu speichern
        parent::save($shouldRedirect, $shouldSendSavedNotification);
    }*/

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
