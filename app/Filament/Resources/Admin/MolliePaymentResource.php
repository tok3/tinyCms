<?php

namespace App\Filament\Resources\Admin;

use App\Filament\Resources\Admin;
use App\Filament\Resources\MolliePaymentResource\Pages;
use App\Filament\Resources\MolliePaymentResource\RelationManagers;
use App\Models\MolliePayment;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\Alignment;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use GuzzleHttp\Client;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
class MolliePaymentResource extends Resource
{
    protected static ?string $model = MolliePayment::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        // Retrieve the payment data from the Mollie API
        $record = static::getModel()::find(request()->route('record'));

        // Ensure the record exists before trying to access it
        $paymentData = [];
        $isEditable = false;

        if ($record) {
            try {
                $paymentData = self::getPaymentDataFromApi($record->payment_id);

                // Check if 'status' exists in the payment data
                $isEditable = isset($paymentData['status']) && $paymentData['status'] === 'open';
            } catch (\Exception $e) {
                \Log::error('Error fetching payment data: ' . $e->getMessage());
                // Handle API failure gracefully (e.g., show a notification or log)
            }
        }

        return $form
            ->schema([
                Grid::make(4)->schema([
                    TextInput::make('sequence')
                        ->label('Sequence')
                        ->disabled(),
                    TextInput::make('payment_id')
                        ->label('Payment ID')
                        ->disabled(),
                    TextInput::make('subscription_id')
                        ->label('Subscription ID')
                        ->disabled(),
                    TextInput::make('mandate_id')
                        ->label('Mandate ID')
                        ->disabled(),
                    TextInput::make('mode')
                        ->label('Mode')
                        ->disabled(),
                    TextInput::make('amount_value')
                        ->label('Amount Value')
                        ->formatStateUsing(fn (string $state) => number_format($state, 2, ',', '.'))
                        ->disabled(!$isEditable), // Editable only if payment status is 'open'
                    TextInput::make('amount_currency')
                        ->label('Amount Currency')
                        ->disabled(),
                    TextInput::make('description')
                        ->label('Description')
                        ->disabled(!$isEditable), // Editable only if payment status is 'open'
                    TextInput::make('status')
                        ->label('Status')
                        ->disabled(),
                ]),
            ]);
    }

    // Function to fetch payment data from the Mollie API
    public static function getPaymentDataFromApi($paymentId)
    {
        $client = new Client();
        $apiKey = env('MOLLIE_KEY');

        try {
            $response = $client->request('GET', "https://api.mollie.com/v2/payments/{$paymentId}", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $apiKey,
                    'Accept'        => 'application/json',
                ],
            ]);

            return json_decode($response->getBody(), true);

        } catch (\Exception $e) {
            \Log::error('Error fetching Mollie payment: ' . $e->getMessage());
            return [];
        }
    }
    // Fetch data from Mollie before the form is filled
    protected function beforeFill(): void
    {
        $record = $this->getRecord();
        $client = new Client();
        $apiKey = env('MOLLIE_KEY');

        try {
            $response = $client->request('GET', "https://api.mollie.com/v2/payments/{$record->payment_id}", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $apiKey,
                    'Accept'        => 'application/json',
                ],
            ]);

            $paymentData = json_decode($response->getBody(), true);

            // Update the database with Mollie API data
            $record->update([
                'amount_value'      => $paymentData['amount']['value'],
                'amount_currency'   => $paymentData['amount']['currency'],
                'description'       => $paymentData['description'],
                'status'            => $paymentData['status'],
                'method'            => $paymentData['method'],
                'paid_at'           => $paymentData['paidAt'] ?? null,
                'canceled_at'       => $paymentData['canceledAt'] ?? null,
                'expires_at'        => $paymentData['expiresAt'] ?? null,
            ]);

        } catch (\Exception $e) {
            \Log::error('Error fetching payment data from Mollie: ' . $e->getMessage());
        }
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('paid_at')
                    ->formatStateUsing(fn ($state) => Carbon::parse($state)->format('d.m.Y H:i')) // Format as day/month/year hour:minute
                    //->tooltip(fn ($state) => Carbon::parse($state)->format('d/m/Y H:i')) // Optional tooltip for full date and time
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('company_name')
                    ->label('Company Name')
                    ->getStateUsing(function ($record) {
                        return optional(
                            \App\Models\Company::whereHas('mollieCustomers', function ($query) use ($record) {
                                $query->where('mollie_customer_id', $record->customer_id);
                            })->first()
                        )?->name;
                    })
                    ->sortable(function (Builder $query) {
                        $direction = request()->get('sortDirection', 'asc');

                        return $query
                            ->join('mollie_customers', 'mollie_payments.customer_id', '=', 'mollie_customers.mollie_customer_id')
                            ->join('companies', 'mollie_customers.model_id', '=', 'companies.id')
                            ->orderBy('companies.name', $direction)
                            ->select('mollie_payments.*');
                    }),
                Tables\Columns\TextColumn::make('mode')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('sequence_type')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('amount_value')
                    ->formatStateUsing(fn (string $state) => number_format($state, 2, ',', '.'))
                    ->alignment(Alignment::End)
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('amount_currency')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('method')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('payment_id')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('subscription_id')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('mandate_id')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('amount_refunded_value')
                    ->formatStateUsing(fn (string $state) => number_format($state, 2, ',', '.'))
                    ->alignment(Alignment::End)
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('amount_remaining_value')
                    ->formatStateUsing(fn (string $state) => number_format($state, 2, ',', '.'))
                    ->alignment(Alignment::End)
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('amount_charged_back_value')
                    ->formatStateUsing(fn (string $state) => number_format($state, 2, ',', '.'))
                    ->alignment(Alignment::End)
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('payment_id')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('subscription_id')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('mandate_id')
                    ->sortable()
                    ->searchable(),

          /*      Tables\Columns\TextColumn::make('canceled_at')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('expires_at')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('failed_at')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('due_date')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('billing_email')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('redirect_url')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('cancel_url')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('webhook_url')
                    ->sortable()
                    ->searchable(),*/


            ])
            ->defaultSort('paid_at', 'desc')
            ->filters([
                //
            ])
            ->actions([
           /*     Tables\Actions\EditAction::make(),*/
            ])
            ->bulkActions([
             /*   Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),*/
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Admin\MolliePaymentResource\Pages\ListMolliePayments::route('/'),
            'create' => Admin\MolliePaymentResource\Pages\CreateMolliePayment::route('/create'),
            'edit' => Admin\MolliePaymentResource\Pages\EditMolliePayment::route('/{record}/edit'),
        ];
    }
}
