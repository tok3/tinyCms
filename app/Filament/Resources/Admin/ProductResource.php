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

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Textarea::make('description')
                    ->nullable(),
                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->label('Price ($)'),
                Select::make('currency')
                    ->options([
                        'USD' => 'USD',
                        'EUR' => 'EUR',
                        'GBP' => 'GBP',
                        // Add other currencies as needed
                    ])
                    ->required()
                    ->label('Currency'),
                Select::make('payment_type')
                    ->options([
                        'one_time' => 'One-time',
                        'recurrent' => 'Recurrent',
                    ])
                    ->required()
                    ->label('Payment Type')
                    ->reactive()
                    ->afterStateUpdated(fn ($state, callable $set) => $state === 'one_time' ? $set('interval', null) : null),
                Select::make('interval')
                    ->options([
                        'weekly' => 'Weekly',
                        'monthly' => 'Monthly',
                        'daily' => 'Daily',
                    ])
                    ->label('Interval')
                    ->hidden(fn (callable $get) => $get('payment_type') !== 'recurrent'),
                Toggle::make('active')
                    ->required(),
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
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->sortable()
                    ->searchable(),
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
