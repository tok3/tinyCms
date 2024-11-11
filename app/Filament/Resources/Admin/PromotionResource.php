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
Use App\Models\Product;
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
                        'fixed' => 'Festbetrag',
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
                    ->nullable()
                    ->relationship('product', 'name')
                    ->searchable(),
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
                    ->formatStateUsing(fn ($state) => number_format($state, 2) . ' €'),

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

                Select::make('product_id')
                    ->label('Produkt')
                    ->relationship('product', 'name')
                    ->searchable()
                    ->nullable(),
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
