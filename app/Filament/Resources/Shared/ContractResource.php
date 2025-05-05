<?php

namespace App\Filament\Resources\Shared;

use App\Filament\Resources\Shared\ContractResource\Pages;
use App\Filament\Resources\Shared\ContractResource\RelationManagers;
use App\Models\Contract;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\Action;
use Carbon\Carbon;
use Filament\Forms\Components\Select;
use App\Models\Company;
use App\Models\Product;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Get;
use Filament\Tables\Actions\ViewAction;
use Illuminate\Contracts\View\View;
class ContractResource extends Resource
{
    protected static ?string $model = Contract::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


    public static function shouldRegisterNavigation(): bool
    {


        // Prüfen, ob der User ein Admin ist
        if (auth()->user()->is_admin == 1) {
            return false; // Admins sollen die Resource NICHT sehen
        }

        return true; // Alle anderen dürfen sie sehen
    }

    public static function canCreate(): bool
    {
        if(auth()->user()->is_admin == 1 ){
            return true;
        }
        return false; // Completely removes the "Create" button from the resource
    }

    public static function getNavigationLabel(): string
    {
        return 'Vertragsdaten';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Verträge';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                ->schema([
                    Forms\Components\Select::make('contractable_id')
                        ->label('Company')
                        ->options(function () {
                            return Company::all()->mapWithKeys(function (Company $company) {
                                return [$company->id => "{$company->name} ({$company->id})"];
                            })->all();
                        })
                        //->searchable()
                        //->required(),
                        ->disabled(),
                    ])->columns(1),
                Forms\Components\Select::make('product_id')
                    ->label('Product')
                    ->options(function () {
                        return Product::all()->mapWithKeys(function (Product $product) {
                            return [$product->id => "{$product->name} ({$product->id})"];
                        })->all();

                    })
                    //->searchable()
                    //->required(),
                    ->disabled(),
                Forms\Components\Select::make('interval')
                    ->label('Interval')
                    ->default('one_time')
                    ->options([
                        'one_time' => 'einmalig',
                        'monthly' => 'monatlich',
                        'annual' => 'jährlich',
                    ])
                    //->reactive()
                    //->required()
                    ->disabled(),
                Forms\Components\TextInput::make('price')
                    ->label('Preis')
                    ->formatStateUsing(fn ($state) => number_format($state / 100, 2, ',', '.')." €")
                    //->required(),
                    ->disabled(),
                Forms\Components\DateTimePicker::make('order_date')
                    ->label('Bestelldatum')
                    //->required(),
                    ->disabled(),
                Forms\Components\DateTimePicker::make('start_date')
                    ->label('Startdatum')
                    ->default(now()->toDateTimeString())
                    //->live()
                    //->required(),
                    ->disabled(),
                Forms\Components\TextInput::make('duration')
                    ->label('Dauer')
                    //->default(24)
                    ->integer()
                    //->live()
                    //->required(),
                    ->suffix('Monate')
                    ->disabled(),
                Forms\Components\DateTimePicker::make('end_date')
                    ->label('Enddatum')
                    //->live()
                    ->disabled()
                    ->dehydrateStateUsing(function (callable $get) {
                        $start = Carbon::parse($get('start_date'));
                        $duration = $get('duration');
                        $interval = $get('interval');
                        switch($interval){
                            case 'one_time':
                                return $start->addMonths($duration);
                                break;
                            case 'monthly':
                                return $start->addMonths($duration);
                                break;
                            case 'annual':
                                return $start->addYears($duration);
                                break;
                        }

                    })
                    ->dehydrated(true),
                    Forms\Components\Hidden::make('contractable_type')
                        ->default('App\Models\Company'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Erworben am')
                    ->dateTime('d.m.Y'),
                Tables\Columns\TextColumn::make('product_name')
                    ->label('Name'),
                Tables\Columns\TextColumn::make('product_description')
                    ->label('Beschreibung')
                    ->formatStateUsing(fn ($state) => substr($state, 25)." ...")
                    ->width('10%'),
                Tables\Columns\TextColumn::make('price')
                    ->label('Preis (€)')
                    ->formatStateUsing(fn ($state) => number_format($state / 100, 2, ',', '.')." €"),
                Tables\Columns\TextColumn::make('interval')
                    ->label('Zahlung')
                    ->formatStateUsing(function ($state) {
                        $mapping = [
                            'one_time' => 'einmalig',
                            'daily' => 'täglich',
                            'monthly' => 'monatlich',
                            'annually' => 'jährlich',
                        ];
                        return $mapping[$state] ?? $state; // Return the mapped value or the original state if not found
                    }),
            ])
            ->filters([
                //
            ])
            ->actions([
                //Tables\Actions\EditAction::make(),
                Action::make('delete')
                ->label('Vertrag im Testzeitraum kündigen')
                ->action(fn ($record) => $record->delete())
                ->requiresConfirmation() // Optional: Adds a confirmation dialog
                ->color('danger')
                ->icon('heroicon-o-trash')
                ->visible(fn ($record): bool => Carbon::parse($record->created_at)->greaterThan(Carbon::now()->subDays($record->data['ordered_product']['trial_period_days']))), // Show only for 'draft' status

                ViewAction::make()
                    ->modal(true)
                    //->slideOver(true)
                    ->modalHeading('Anzeigen'),
                    //->modalWidth('lg'),

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListContracts::route('/'),
            'create' => Pages\CreateContract::route('/create'),
            //'edit' => Pages\EditContract::route('/{record}/edit'),
            'view' => Pages\ViewContract::route('/{record}'),
        ];
    }
}
