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
use Filament\Forms\Components\HasManyRepeater;
use Filament\Forms\Components\Section;

// ← HIER importieren
use Filament\Support\Enums\Alignment;
use Illuminate\Support\Str;
use App\Helpers\FormatHelper;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Get;

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
                Forms\Components\Section::make('Produkt')
                    ->extraAttributes(['class' => 'max-w-3xl'])
                    ->schema([
                        TextInput::make('name')
                            ->label('Produktname')
                            ->required()
                            ->maxLength(255)
                            ->columnSpan(3),

                        Select::make('type')
                            ->label('Produkttyp')
                            ->options([
                                'package' => 'Kombi-Paket (für neue Kunden)',
                                'product' => 'Einzelprodukt',
                                'upgrade' => 'Upgrade (nur für Bestandskunden)',
                            ])
                            ->helperText('Bestimmt, wo und wie das Produkt angezeigt wird.')
                            ->required()
                            ->default('product')
                            ->reactive()
                            ->afterStateUpdated(function ($state, callable $set) {
                                if ($state === 'upgrade') {
                                    $set('upgrade', true);
                                    $set('visible', false);
                                } else {
                                    $set('upgrade', false);
                                }
                            })
                            ->columnSpan(2),

                        TextInput::make('sequence')
                            ->label('Reihenfolge')
                            ->numeric()
                            ->minValue(1)
                            ->maxValue(999)
                            ->default(10)
                            ->extraInputAttributes([
                                'style' => 'width: 4rem;',
                                'class' => 'text-right',
                            ])
                            ->columnSpan(1),
                    ])
                    ->columns(6),

                Forms\Components\Section::make('Inhalte & Beschreibung')
                    ->extraAttributes(['class' => 'max-w-3xl'])
                    ->schema([
                        RichEditor::make('description')
                            ->label('Kurzbeschreibung')
                            ->extraInputAttributes([
                                'style' => 'min-height: 5rem; max-height: 10rem; overflow-y: auto;',
                            ])
                            ->nullable(),

                        RichEditor::make('info')
                            ->label('Details (Modal)')
                            ->maxLength(2000),

                        TextInput::make('invoice_text')
                            ->label('Rechnungstext')
                            ->required(),
                    ])
                    ->columns(1),
                // ROW 4: Preis, Währung, Intervall, Laufzeit (nur wenn Zahlungstyp "recurrent") und Testzeitraum
                Forms\Components\Section::make('Zahlung & Laufzeit')
                    ->extraAttributes(['class' => 'max-w-3xl'])
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
                                if ($state === 'one_time')
                                {
                                    $set('interval', 'one_time');
                                }
                                else
                                {
                                    $set('interval', null);
                                }
                            }),

                        TextInput::make('lz')
                            ->label('Laufzeit (Monate)')
                            ->numeric()
                            ->default(24)
                            ->hidden(fn(callable $get) => $get('payment_type') !== 'recurrent'),

                        TextInput::make('trial_period_days')
                            ->label('Testzeitraum (Tage)')
                            ->numeric()
                            ->default(0),
                    ])
                    ->columns(4),

                Section::make('Produktpreise')
                    ->extraAttributes(['class' => 'fi-section bg-gray-100'])
                    ->schema([
                        HasManyRepeater::make('prices')
                            ->label('Produktpreise')
                            ->addActionLabel('Produktpreis hinzufügen')
                            ->relationship('prices')
                            ->orderable('sort')
                            ->schema([
                                Select::make('interval')
                                    ->label('Zahlungsintervall')
                                    ->options([
                                        'one_time' => 'Einmalzahlung',
                                        'monthly' => 'Monatlich',
                                        'annual' => 'Jährlich',
                                    ])
                                    ->required(),
                                TextInput::make('price')
                                    ->label('Preis (€)')
                                    ->required()
                                    ->afterStateHydrated(function ($component, $state) {
                                        if ($state !== null)
                                        {
                                            $component->state(number_format($state / 100, 2, ',', '.'));
                                        }
                                    })
                                    ->dehydrateStateUsing(function ($state) {
                                        $normalized = str_replace(['.', ' '], ['', ''], $state);
                                        $normalized = str_replace(',', '.', $normalized);

                                        return (int)round((float)$normalized * 100);
                                    }),
                            ])
                            ->columns(2)
                            ->minItems(1)
                            ->defaultItems(1),
                    ])
                    ->columns(2),
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


                Forms\Components\Section::make('Upgrade-Logik')
                    ->visible(fn(callable $get) => $get('type') === 'upgrade')
                    ->schema([
                        Select::make('feature_visibility_mode')
                            ->label('Upgrade anzeigen wenn...')
                            ->options([
                                'exclude' => 'Kunde diese Features NICHT hat',
                                'include' => 'Kunde diese Features hat',
                            ])
                            ->default('exclude'),

                        Select::make('excluded_feature_ids')
                            ->label('Betroffene Features')
                            ->multiple()
                            ->options(fn() => \App\Models\Feature::pluck('name', 'id'))
                            ->searchable()
                            ->preload(),
                    ])
                    ->columns(2),
                // Status & Sichtbarkeit
                Forms\Components\Fieldset::make('Status')
                    ->schema([
                        Toggle::make('active')
                            ->label('Produkt aktiv')
                            ->default(true)
                            ->required(),

                        Toggle::make('visible')
                            ->label('Auf öffentlicher Preisseite sichtbar')
                            ->default(true)
                            ->reactive()
                            ->disabled(fn(callable $get) => $get('type') === 'upgrade'),

                        Toggle::make('upgrade')
                            ->label('Automatisch: Upgrade')
                            ->default(false)
                            ->disabled()
                            ->required()
                            ->reactive()
                            ->afterStateUpdated(function (bool $state, callable $set) {
                                if ($state)
                                {
                                    $set('visible', false);
                                }
                            }),

                    ])
                    ->columns(4),
                \Filament\Forms\Components\Placeholder::make('direct_booking_links')
                    ->label('Replacement-Tags')
                    ->visible(fn(callable $get, $livewire) => $get('active')
                        && $get('type') !== 'upgrade'
                        && !$get('visible')
                        && filled($livewire->record?->prices)
                    )
                    ->content(function (callable $get, $state, $livewire) {
                        $record = $livewire->record;

                        if (!$record || !$record->exists)
                        {
                            return null;
                        }

                        $productId = $record->id;

                        // Verfügbare Intervalle anhand vorhandener Preise ermitteln
                        $availableIntervals = $record->prices
                            ? $record->prices->pluck('interval')->unique()->values()
                            : collect();

                        // Anzeige-Reihenfolge
                        $ordered = collect(['monthly', 'annual', 'one_time'])
                            ->filter(fn($i) => $availableIntervals->contains($i))
                            ->values();

                        if ($ordered->isEmpty())
                        {
                            return new \Illuminate\Support\HtmlString(
                                '<div class="text-sm text-gray-500">Keine Preise/Intervalle gefunden.</div>'
                            );
                        }

                        // Tokens je Intervall: LINK + PRICE
                        $tokensHtml = $ordered->map(function ($interval) use ($productId) {
                            $upper = strtoupper($interval);
                            $linkToken = "##P{$productId}_{$upper}_LINK##";
                            $priceToken = "##P{$productId}_{$upper}_PRICE##";

                            return
                                '<div class="mb-1">' .
                                '<code>' . $linkToken . '</code>' .
                                '&nbsp;' .
                                '<code>' . $priceToken . '</code>' .
                                '</div>';
                        })->implode('');

                        // Allgemeine Tokens: NAME, DESCRIPTION, TRIAL_DAYS
                        $tokensHtml .=
                            '<div class="mb-1"><code>##P' . $productId . '_NAME##</code></div>' .
                            '<div class="mb-1"><code>##P' . $productId . '_DESCRIPTION##</code></div>' .
                            '<div class="mb-1"><code>##P' . $productId . '_TRIAL_DAYS##</code></div>';

                        // Echte Direktlinks pro Intervall
                        $linksHtml = $ordered->map(function ($interval) use ($productId) {
                            $url = url('/preise') . '?interval=' . $interval . '&product=' . $productId . '#step-2';

                            return
                                '<div class="mb-1">' .
                                '<a href="' . $url . '" target="_blank" class="underline text-primary-600">' .
                                'Direktbuchung (' . $interval . ')' .
                                '</a>' .
                                '</div>';
                        })->implode('');

                        return new \Illuminate\Support\HtmlString(
                            "<div class='space-y-1'>{$tokensHtml}<hr class='my-2 border-gray-300'>{$linksHtml}</div>"
                        );
                    }),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->formatStateUsing(fn(?string $state) => Str::limit(
                        FormatHelper::stripHtmlButKeepSpaces($state ?? ''),
                        20,
                        '...'
                    ))
                    ->tooltip(function ($record) {
                        $cleanText = FormatHelper::stripHtmlButKeepSpaces($record->name);

                        return strlen($cleanText) > 20 ? $cleanText : null;
                    })
                    ->sortable()
                    ->searchable(),

                TextColumn::make('description')
                    ->formatStateUsing(fn(?string $state) => Str::limit(
                        FormatHelper::stripHtmlButKeepSpaces($state ?? ''),
                        55,
                        '...'
                    ))
                    ->tooltip(function ($record) {
                        $cleanText = FormatHelper::stripHtmlButKeepSpaces($record->description);

                        return strlen($cleanText) > 55 ? $cleanText : null;
                    })
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('prices')
                    ->label('Preise')
                    ->formatStateUsing(fn($state, $record) => $record->prices
                        ->map(fn($p) => "{$p->interval}: " . number_format($p->price / 100, 2, ',', '.') . ' €')
                        ->implode(' / ')
                    )
                    ->sortable(false)
                    ->searchable(false),

                Tables\Columns\TextColumn::make('payment_type')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('features.name')
                    ->label('Features')
                    ->badge()
                    ->limit(3)
                    ->tooltip(fn($record) => $record->features->pluck('name')->join(', ')),

                Tables\Columns\BooleanColumn::make('active')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable(),
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
