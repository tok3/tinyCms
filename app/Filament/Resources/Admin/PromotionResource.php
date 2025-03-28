<?php

namespace App\Filament\Resources\Admin;

use App\Filament\Resources\PromotionResource\Pages;
use App\Filament\Resources\PromotionResource\RelationManagers;
use App\Models\Promotion;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\DateColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Support\Enums\Alignment;
use Filament\Tables\Columns\IconColumn;
use Filament\Notifications\Notification;
use App\Models\Coupon;
use App\Models\Product;
use Illuminate\Support\HtmlString;
use Filament\Forms\Components\Placeholder;
class PromotionResource extends Resource
{
    protected static ?string $model = Promotion::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Name')
                    ->required(),

                Textarea::make('description')
                    ->label('Beschreibung')
                    ->nullable(),

                Select::make('discount_type')
                    ->label('Rabatt-Typ')
                    ->options([
                        'percent' => 'Prozentual',
                        'fixed'   => 'Festbetrag',
                    ])
                    ->required(),

                TextInput::make('discount_value')
                    ->label('Rabattwert')
                    ->numeric()
                    ->required(),

                DatePicker::make('valid_from')
                    ->label('Gültig von')
                    ->nullable(),

                DatePicker::make('valid_till')
                    ->label('Gültig bis')
                    ->nullable(),

                Toggle::make('is_active')
                    ->label('Aktiv')
                    ->default(true),

                Select::make('product_id')
                    ->label('Produkt')
                    ->options(
                        \App\Models\Product::orderBy('name')->get()->mapWithKeys(function ($product) {
                            return [$product->id => $product->name . ' - ' . \Str::limit(strip_tags($product->description), 55) . ' (' . $product->interval . ')'];
                        })
                    )
                    ->placeholder('Wähle ein Produkt aus')
                    ->searchable()
                    ->nullable(),

                // Info-Bereich, der unendliche Coupons anzeigt:
                Placeholder::make('infinite_coupons')
                    ->label('Unendliche Coupons')
                    ->content(function ($record) {
                        // Falls eine Beziehung definiert ist:
                        if (method_exists($record, 'coupons')) {
                            $coupons = $record->coupons()->where('infinite', true)->get();
                        } else {
                            // Andernfalls über direkte Abfrage (sofern Promotion eine ID hat):
                            $coupons = \App\Models\Coupon::where('promotion_id', $record->id)
                                ->where('infinite', true)
                                ->get();
                        }

                        if ($coupons->isEmpty()) {
                            return 'Keine unendlichen Coupons vorhanden.';
                        }

                        // Erstelle eine HTML-Liste der Coupons
                        $html = '<ul>';
                        foreach ($coupons as $coupon) {
                            $html .= '<li>' . e($coupon->code) . ' – ' .
                                ($coupon->discount_type === 'fixed'
                                    ? number_format($coupon->discount_value, 2, ',', '.') . ' €'
                                    : $coupon->discount_value . ' %')
                                . '</li>';
                        }
                        $html .= '</ul>';

                        return new HtmlString($html);
                    }),
            ]);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Name')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('description')
                    ->label('Beschreibung')
                    ->limit(50),

                TextColumn::make('discount_type')
                    ->label('Rabatt-Typ')
                    ->formatStateUsing(fn ($state) => $state === 'percent' ? 'Prozentual' : 'Festbetrag')
                    ->sortable(),

                TextColumn::make('discount_value')
                    ->label('Rabattwert')
                    ->sortable()
                    ->formatStateUsing(fn ($record) =>
                    $record->discount_type === 'fixed'
                        ? $record->formatted_discount . ' €'
                        : $record->formatted_discount . ' %'
                    ),

                IconColumn::make('is_active')
                    ->label('Aktiv')
                    ->boolean(), // Zeigt ein Icon für true/false an

                TextColumn::make('valid_from')
                    ->label('Gültig von')
                    ->date('d.m.Y')
                    ->sortable(),

                TextColumn::make('valid_till')
                    ->label('Gültig bis')
                    ->date('d.m.Y')
                    ->sortable(),



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
            'index' => PromotionResource\Pages\ListPromotions::route('/'),
            'create' => PromotionResource\Pages\CreatePromotion::route('/create'),
            'edit' => PromotionResource\Pages\EditPromotion::route('/{record}/edit'),
        ];
    }
}
