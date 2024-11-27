<?php
namespace App\Filament\Resources\Admin;

use App\Filament\Resources\Admin\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Support\Enums\Alignment;
class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';

    public static function getPluralModelLabel(): string
    {
        return 'Produkte';
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Name des Produkts
                TextInput::make('name')
                    ->label('Produktname')
                    ->required()
                    ->maxLength(255),

                // Beschreibung des Produkts
                Textarea::make('description')
                    ->label('Beschreibung')
                    ->nullable(),

                // Preis des Produkts
                TextInput::make('price')
                    ->label('Preis (€)')
                    ->string()
                    ->required()
                    ->afterStateHydrated(function ($set, $state) {
                        // Preis im Formular als Euro anzeigen (von Cent zu Euro)
                        $set('price', number_format($state / 100, 2, ',', '.'));
                    })
                    ->dehydrateStateUsing(function ($state) {
                        // Vor dem Speichern, Euro wieder in Cent umrechnen
                        return intval(str_replace(',', '.', str_replace('.', '', $state)) * 100);
                    }),

                // Währungsauswahl
                Select::make('currency')
                    ->label('Währung')
                    ->options([
                        'USD' => 'USD - US Dollar',
                        'EUR' => 'EUR - Euro',
                        'GBP' => 'GBP - Britisches Pfund',
                    ])
                    ->required(),

                // Testzeitraum in Tagen
                TextInput::make('trial_period_days')
                    ->label('Testzeitraum (Tage)')
                    ->numeric()
                    ->required(),

                // Zahlungstyp
                Select::make('payment_type')
                    ->label('Zahlungstyp')
                    ->options([
                        'one_time' => 'Einmalzahlung',
                        'recurrent' => 'Wiederkehrend',
                    ])
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set) {
                        if ($state === 'one_time') {
                            // Wenn Zahlungstyp auf "Einmalzahlung" gesetzt wird, Intervall zurücksetzen
                            $set('interval', 'one_time');
                        }
                    }),

                // Zahlungsintervall
                Select::make('interval')
                    ->label('Zahlungsintervall')
                    ->options([
                        'daily' => 'Täglich',
                        'weekly' => 'Wöchentlich',
                        'monthly' => 'Monatlich',
                        'annual' => 'Jährlich',
                        'one_time' => 'Einmalig',
                    ])
                    ->hidden(fn (callable $get) => $get('payment_type') === 'one_time'), // Nur anzeigen, wenn der Zahlungstyp wiederkehrend ist

                // Status und Sichtbarkeit (in einer Zeile)
                Forms\Components\Fieldset::make('Status')
                    ->schema([
                        Toggle::make('active')
                            ->label('Aktiv')
                            ->default(true)
                            ->required(),

                        Toggle::make('visible')
                            ->label('Öffentlich sichtbar')
                            ->default(true)
                            ->required(),
                    ])
                    ->columns(4),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('formatted_price')
                    ->searchable()
                    ->label('Preis')
                    ->formatStateUsing(fn (string $state) => $state )
                    ->alignment(Alignment::End),
                Tables\Columns\TextColumn::make('currency')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('payment_type')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('interval')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\BooleanColumn::make('active')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                // Define your table filters here
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Define your resource relations here
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
