<?php

namespace App\Filament\Resources\Admin;

use App\Filament\Resources\Admin;
use App\Filament\Resources\BaseResource;
use App\Models\MollieSubscription;
use Carbon\Carbon;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Support\Enums\Alignment;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Table;
use GuzzleHttp\Client;
use Mollie\Laravel\Facades\Mollie;

class MollieSubscriptionResource extends BaseResource
{
    protected static ?string $model = MollieSubscription::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationLabel(): string
    {
        // Kontextuell basierend auf der Rolle des Benutzers
        if (auth()->user()->is_admin == 1) {
            return 'Mollie Subscriptions';

        }

        return 'Abonnements';
    }

    public static function shouldRegisterNavigation(): bool
    {

        if (auth()->user()->is_admin == 1) {
            return true;

        }

        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Add your form schema here (inputs, grids, etc.)
                Grid::make(4)->schema([
                    TextInput::make('subscription_id')->disabled(),
                    TextInput::make('customer_id')->disabled(),
                    TextInput::make('amount_value')
                        ->label('Amount')
                        ->formatStateUsing(fn (string $state) => number_format($state, 2, ',', '.')),
                    TextInput::make('description')
                        ->label('Description'),
                    DatePicker::make('start_date')->label('Start Date'),
                    DatePicker::make('next_payment_date')->label('Next Payment Date'),
                ]),
            ]);
    }

    // Fetch data from Mollie before the form is filled
    protected function beforeFill(): void
    {
        $record = $this->getRecord();
        $client = new Client;
        $apiKey = env('MOLLIE_KEY');

        try {
            $response = $client->request('GET', "https://api.mollie.com/v2/customers/{$record->customer_id}/subscriptions/{$record->subscription_id}", [
                'headers' => [
                    'Authorization' => 'Bearer '.$apiKey,
                    'Accept' => 'application/json',
                ],
            ]);

            $subscriptionData = json_decode($response->getBody(), true);

            // Update local database with API data
            $record->update([
                'amount_value' => $subscriptionData['amount']['value'],
                'amount_currency' => $subscriptionData['amount']['currency'],
                'description' => $subscriptionData['description'],
                'status' => $subscriptionData['status'],
                'start_date' => $subscriptionData['startDate'],
                'next_payment_date' => $subscriptionData['nextPaymentDate'] ?? null,
            ]);

        } catch (\Exception $e) {
            \Log::error('Failed to fetch subscription data from Mollie: '.$e->getMessage());
        }
    }

    /*   public static function form(Form $form): Form
       {

           // Hole die Subscription ID und Customer ID
           $record = static::getModel()::find(request()->route('record'));
           //$record = $this->record;

           $subscriptionId = $record->subscription_id;
           $customerId = $record->customer_id;

           // Abrufe der Zahlungen über die Mollie API
           $payments = self::getSubscriptionPayments($customerId, $subscriptionId);


           return $form
               ->schema([
                   Grid::make(4)->schema([
                       TextInput::make('status')
                           ->label('Status')
                           ->disabled() // Nicht bearbeitbar
                           ->required(),

                       TextInput::make('interval')
                           ->label('Interval')
                           ->disabled() // Nicht bearbeitbar
                           ->required(),

                       DatePicker::make('start_date')
                           ->label('Start Date')
                           ->required(),

                       DatePicker::make('next_payment_date')
                           ->disabled()
                           ->label('Next Payment Date')
                           ->required(),
                   ]),

                   TextInput::make('amount_value')
                       ->label('Amount Value')
                       ->required(),

                   TextInput::make('amount_currency')
                       ->label('Currency')
                       ->disabled(),

                   TextInput::make('description')
                       ->label('Description'),

                   Card::make() // Zahlungen in einer Liste anzeigen
                   ->schema([
                       Repeater::make('payments') // Zahlungen als Repeater-Elemente anzeigen
                       ->schema([
                           TextInput::make('id')
                               ->label('Payment ID')
                               ->disabled(),
                           TextInput::make('amount')
                               ->label('Amount')
                               ->disabled(),
                           TextInput::make('status')
                               ->label('Status')
                               ->disabled(),
                           TextInput::make('created_at')
                               ->label('Date Created')
                               ->disabled(),
                       ])
                           ->columns(4) // Anzahl der Spalten im Grid für die Zahlungen
                           ->disableItemCreation() // Keine neuen Zahlungen im Frontend hinzufügen
                           ->default($payments), // Zahlungen aus der API als Standardwert setzen
                   ])
               ]);
       }*/

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->sortable()
                    ->searchable(),
                // Display Company Name
                Tables\Columns\TextColumn::make('company.name')
                    ->label('Company Name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('start_date')
                    ->label('Start Date')
                    ->formatStateUsing(fn ($state) => Carbon::parse($state)->format('d.m.Y'))
                    ->sortable(),

                Tables\Columns\TextColumn::make('start_date')
                    ->label('Start Date')
                    ->formatStateUsing(fn ($state) => Carbon::parse($state)->format('d.m.Y'))
                    ->sortable(),

                Tables\Columns\TextColumn::make('next_payment_date')
                    ->label('Next Payment Date')
                    ->formatStateUsing(fn ($state) => Carbon::parse($state)->format('d.m.Y'))
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->label('Description')
                    ->formatStateUsing(fn ($state) => strip_tags(substr($state, 0, 55)).' ...')
                    ->searchable(),

                Tables\Columns\TextColumn::make('interval')
                    ->label('Interval')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created At')
                    ->formatStateUsing(fn ($state) => Carbon::parse($state)->format('d.m.Y'))
                    ->sortable(),

                Tables\Columns\TextColumn::make('amount_value')
                    ->formatStateUsing(fn (string $state) => number_format($state, 2, ',', '.'))
                    ->alignment(Alignment::End)
                    ->label('Amount')
                    ->sortable(),
                Tables\Columns\TextColumn::make('amount_currency')
                    ->label('Currency')
                    ->sortable(),
                Tables\Columns\TextColumn::make('subscription_id')
                    ->label('Subscription ID')
                    ->searchable(),
                Tables\Columns\TextColumn::make('customer_id')
                    ->label('Customer ID')
                    ->searchable(),

            ])
            ->defaultSort('start_date', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Action::make('manageContract')
                    ->label('Über Vertrag verwalten')
                    ->icon('heroicon-o-document-text')
                    ->url(function (MollieSubscription $record): ?string {
                        $contract = \App\Models\Contract::query()
                            ->where('subscription_id', $record->subscription_id)
                            ->first();

                        return $contract
                            ? ContractResource::getUrl('edit', ['record' => $contract])
                            : null;
                    })
                    ->disabled(fn (MollieSubscription $record): bool => ! \App\Models\Contract::query()
                        ->where('subscription_id', $record->subscription_id)
                        ->exists()),

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
            'index' => Admin\MollieSubscriptionResource\Pages\ListMollieSubscriptions::route('/'),
            'create' => Admin\MollieSubscriptionResource\Pages\CreateMollieSubscription::route('/create'),
            'edit' => Admin\MollieSubscriptionResource\Pages\EditMollieSubscription::route('/{record}/edit'),
        ];
    }

    public static function getSubscriptionPayments($customerId, $subscriptionId)
    {
        $client = new Client;
        $apiKey = env('MOLLIE_KEY');

        try {
            $response = $client->request('GET', "https://api.mollie.com/v2/customers/{$customerId}/subscriptions/{$subscriptionId}/payments", [
                'headers' => [
                    'Authorization' => 'Bearer '.$apiKey,
                    'Accept' => 'application/json',
                ],
            ]);

            $payments = json_decode($response->getBody(), true);

            return $payments['_embedded']['payments'] ?? [];

        } catch (\Exception $e) {
            \Log::error('Fehler beim Abrufen der Zahlungen von Mollie: '.$e->getMessage());

            return [];
        }
    }
}
