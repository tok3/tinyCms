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
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\MultiSelect;
use Filament\Support\Enums\Alignment;
use Illuminate\Support\Str;
use App\Helpers\FormatHelper;
use Filament\Tables\Columns\TextColumn;

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
                Forms\Components\Section::make('ROW 1: Produktname + Reihenfolge')
                    ->schema([
                        TextInput::make('name')
                            ->label('Produktname')
                            ->required()
                            ->maxLength(255)
                            ->columnSpan(3),  // belegt 3 von 4 Spalten

                        TextInput::make('sequence')
                            ->label('Reihenfolge')
                            ->numeric()
                            ->minValue(1)
                            ->maxValue(999)
                            ->extraInputAttributes([
                                'style' => 'width: 4rem;',
                                'class' => 'text-right',
                            ])
                            ->columnSpan(1),  // die schmale 4. Spalte
                    ])
                    ->columns(4),

                // ROW 2: Beschreibung
                Forms\Components\Section::make()
                    ->schema([
                        Textarea::make('description')
                            ->label('Beschreibung Kurz')
                            ->extraInputAttributes([
                                'style' => 'min-height: 5rem; max-height: 10rem; overflow-y: auto;',
                            ])
                            ->nullable(),
                    ])
                    ->columns(2),
                Forms\Components\Section::make()
                    ->schema([
                        RichEditor::make('info')
                            ->label('Info/Eigenschaften')
                            ->maxLength(1000),
                    ])
                    ->columns(2),

                // ROW 2: Beschreibung
                Forms\Components\Section::make()
                    ->schema([
                        TextInput::make('invoice_description')
                            ->label('Beschreibung für Rechnungsposition')
                            ->nullable(),
                    ])
                    ->columns(2),

                // ROW 3: Zahlungstyp
                Forms\Components\Section::make()
                    ->schema([
                        Select::make('payment_type')
                            ->label('Zahlungstyp')
                            ->options([
                                'one_time'  => 'Einmalzahlung',
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
                    ->columns(4),

                // ROW 4: Preis, Währung, Intervall, Laufzeit (nur wenn Zahlungstyp "recurrent") und Testzeitraum
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
                                'daily'   => 'Täglich',
                                'weekly'  => 'Wöchentlich',
                                'monthly' => 'Monatlich',
                                'annual'  => 'Jährlich',
                            ])
                            ->hidden(fn (callable $get) => $get('payment_type') !== 'recurrent'),

                        // Neues Feld "Laufzeit" (Spalte lz in der Tabelle products)
                        TextInput::make('lz')
                            ->label('Laufzeit (Monate)')
                            ->numeric()
                            ->default(24)
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

                // Status & Sichtbarkeit
                Forms\Components\Fieldset::make('Status')
                    ->schema([
                        Toggle::make('active')
                            ->label('Aktiv')
                            ->default(true)
                            ->required(),

                        Toggle::make('visible')
                            ->label('Öffentlich sichtbar')
                            ->default(true)
                            ->required()
                            ->reactive()
                            ->dehydrated(fn ($state, callable $get) => $get('upgrade') ? true : $state)
                            ->disabled(fn (callable $get) => $get('upgrade')),

                        Toggle::make('upgrade')
                            ->label('Intern buchbares Upgrade')
                            ->default(false)
                            ->required()
                            ->reactive()
                            ->afterStateUpdated(function (bool $state, callable $set) {
                                if ($state) {
                                    $set('visible', false);
                                }
                            }),
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

                TextColumn::make('description')
                    ->formatStateUsing(fn (?string $state) => Str::limit(
                        FormatHelper::stripHtmlButKeepSpaces($state ?? ''),
                        55,
                        '...'
                    ))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('formatted_price')
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
