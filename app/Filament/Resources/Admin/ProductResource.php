<?php
namespace App\Filament\Resources\Admin;

use App\Filament\Resources\Admin\ProductResource\Pages;
use App\Models\Product;
use App\Models\Feature;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\MultiSelect;
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
                // ROW 1: Produktname
                Forms\Components\Section::make()
                    ->schema([
                        TextInput::make('name')
                            ->label('Produktname')
                            ->required()
                            ->maxLength(255),
                    ])
                    ->columns(2), // Eine Spalte mit voller Breite in einem zweispaltigen Layout

                // ROW 2: Beschreibung
                Forms\Components\Section::make()
                    ->schema([
                        Textarea::make('description')
                            ->label('Beschreibung')
                            ->nullable(),
                    ])
                    ->columns(2),

                // ROW 3: Zahlungstyp
                Forms\Components\Section::make()
                    ->schema([
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
                                    $set('interval', 'one_time');
                                } else {
                                    $set('interval', null);
                                }
                            }),
                    ])
                    ->columns(4), // Eine Spalte mit voller Breite in einem vier-spaltigen Layout

                // ROW 4: Preis, Währung, Intervall (nur wenn Zahlungstyp "recurrent"), Testzeitraum
                Forms\Components\Section::make()
                    ->schema([
                        TextInput::make('price')
                            ->label('Preis (€)')
                            ->string()
                            ->nullable()
                            ->hidden(fn (callable $get) => !$get('payment_type'))
                            ->afterStateHydrated(function ($set, $state) {
                                $set('price', number_format($state / 100, 2, ',', '.'));
                            })
                            ->dehydrateStateUsing(function ($state) {
                                return intval(str_replace(',', '.', str_replace('.', '', $state)) * 100);
                            }),

                        Select::make('currency')
                            ->label('Währung')
                            ->options([
                                'EUR' => 'EUR - Euro',
                                'USD' => 'USD - US Dollar',
                                'GBP' => 'GBP - Britisches Pfund',
                            ])
                            ->default('EUR')
                            ->hidden(fn (callable $get) => !$get('payment_type')),

                        Select::make('interval')
                            ->label('Zahlungsintervall')
                            ->options([
                                'daily' => 'Täglich',
                                'weekly' => 'Wöchentlich',
                                'monthly' => 'Monatlich',
                                'annual' => 'Jährlich',
                            ])
                            ->hidden(fn (callable $get) => $get('payment_type') !== 'recurrent'),

                        TextInput::make('trial_period_days')
                            ->label('Testzeitraum (Tage)')
                            ->numeric()
                            ->default(0),
                    ])
                    ->columns(4),

                // ROW 5: Features
                Forms\Components\Section::make()
                    ->schema([
                        Select::make('features')
                            ->label('Features')
                            ->relationship('features', 'name')
                            ->multiple()
                            ->preload(),
                    ])
                    ->columns(2),

                // Status & Sichtbarkeit (Bleibt wie es ist)
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
                    ->formatStateUsing(fn (string $state) => $state)
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

                Tables\Columns\TextColumn::make('features.name')
                    ->label('Features')
                    ->badge()
                    ->limit(3)
                    ->tooltip(fn ($record) => $record->features->pluck('name')->join(', ')),

                Tables\Columns\BooleanColumn::make('active')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([])
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
        return [];
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
