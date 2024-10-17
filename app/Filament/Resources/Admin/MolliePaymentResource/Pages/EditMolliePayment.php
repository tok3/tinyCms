<?php

namespace App\Filament\Resources\Admin\MolliePaymentResource\Pages;

use App\Filament\Resources\Admin\MolliePaymentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use GuzzleHttp\Client;
use Filament\Notifications\Notification;

class EditMolliePayment extends EditRecord
{
    protected static string $resource = MolliePaymentResource::class;


    // Get the actions that should be available in the header (like Save, Delete, Chargeback)
    protected function getHeaderActions(): array
    {
        $record = $this->record; // Get the current record being edited
        $paymentData = MolliePaymentResource::getPaymentDataFromApi($record->payment_id);

        $actions = [];

        // Allow deleting only if payment status is 'open'
        if (isset($paymentData['status']) && $paymentData['status'] === 'open') {
            $actions[] = Actions\DeleteAction::make(); // Show delete action if status is open
        }

        // Show chargeback button for 'paid' payments
        if (isset($paymentData['status']) && $paymentData['status'] === 'paid') {

            $actions[] = Actions\Action::make('chargeback')
                ->label('Chargeback')
                ->action('chargebackPayment')
                ->requiresConfirmation() // Ask for confirmation before charging back
                ->color('danger'); // Button will be red


            // Add a refund button for 'paid' payments
            $actions[] = Actions\Action::make('refund')
                ->label('Refund')
                ->action('refundPayment')
                ->requiresConfirmation()
                ->color('warning'); // Button will be yellow

        }

        return $actions;
    }


// Chargeback method
    public function chargebackPayment(): void
    {
        $record = $this->record; // Retrieve the current record

        // Perform chargeback only if the payment is in 'paid' status
        if ($record->status !== 'paid') {
            $this->notify('danger', 'Chargeback is only possible for payments with "paid" status.');
            return;
        }

        // Call the function to initiate chargeback
        $this->performChargeback($record->payment_id, $record->amount_value, $record->amount_currency);
    }

// Function to perform the chargeback using the Mollie API
    public function performChargeback($paymentId, $amountValue, $currency): void
    {
        $client = new \GuzzleHttp\Client();
        $apiKey = env('MOLLIE_KEY');

        try {
            // Send the chargeback request to the Mollie API
            $response = $client->request('POST', "https://api.mollie.com/v2/payments/{$paymentId}/chargebacks", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $apiKey,
                    'Accept'        => 'application/json',
                ],
                'json' => [
                    'amount' => [
                        'currency' => $currency,
                        'value'    => number_format($amountValue, 2, '.', ''), // Ensure proper formatting for the amount
                    ],
                ],
            ]);

            // Notify on success using Filament's Notification system
            Notification::make()
                ->title('Chargeback successful.')
                ->success() // This will show a success notification
                ->send();

        } catch (\Exception $e) {
            \Log::error('Chargeback failed: ' . $e->getMessage());

            // Notify on failure using Filament's Notification system
            Notification::make()
                ->title('Chargeback failed.')
                ->danger() // This will show a danger/error notification
                ->send();
        }
    }
    public function refundPayment(): void
    {
        $record = $this->record; // Get the current record
        $client = new \GuzzleHttp\Client();
        $apiKey = env('MOLLIE_KEY');

        try {
            $response = $client->request('POST', "https://api.mollie.com/v2/payments/{$record->payment_id}/refunds", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $apiKey,
                    'Accept' => 'application/json',
                ],
                'json' => [
                    'amount' => [
                        'currency' => $record->amount_currency,
                        'value' => number_format($record->amount_value, 2, '.', ''),
                    ],
                ],
            ]);

            $responseData = json_decode($response->getBody(), true);
         //   \Log::info('Refund Response: ' . json_encode($responseData));

            if (isset($responseData['status']) && $responseData['status'] === 'pending') {
                Notification::make()
                    ->title('Refund Successful')
                    ->body('Refund has been initiated and is pending approval.')
                    ->success()
                    ->send();
            } else {
                Notification::make()
                    ->title('Refund Successful')
                    ->body('Refund has been successfully processed.')
                    ->success()
                    ->send();
            }
        } catch (\Exception $e) {
            \Log::error('Refund failed: ' . $e->getMessage());

            Notification::make()
                ->title('Refund Failed')
                ->body('There was an error processing the refund. Please try again.')
                ->danger()
                ->send();
        }
    }
    // Override the save method to update Mollie API and database
    public function save(bool $shouldRedirect = true, bool $shouldSendSavedNotification = true): void
    {
        $record = $this->record;
        $client = new Client();
        $apiKey = env('MOLLIE_KEY');

        // Update Mollie API
        try {
            $response = $client->request('PATCH', "https://api.mollie.com/v2/payments/{$record->payment_id}", [
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
                    'status'      => $this->data['status'],
                ],
            ]);

            // Save to the database if successful
            parent::save($shouldRedirect, $shouldSendSavedNotification);

        } catch (\Exception $e) {
            \Log::error('Failed to update Mollie payment: ' . $e->getMessage());
            // Handle the error (optional)
        }
    }


}
