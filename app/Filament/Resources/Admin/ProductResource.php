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
                    ->label('Preis')
                    ->string()
                    ->required()
                    ->afterStateHydrated(function ($set, $state) {
                        // Show the price as euros in the form (from cents)
                        $set('price', number_format($state / 100, 2, ',', '.'));
                    })
                    ->dehydrateStateUsing(function ($state) {
                        // Before saving, convert euros back to cents
                        return intval(str_replace(',', '.', str_replace('.', '', $state)) * 100);
                    })
                  ,
                Select::make('currency')
                    ->options([
                        'USD' => 'USD',
                        'EUR' => 'EUR',
                        'GBP' => 'GBP',
                        // Add other currencies as needed
                    ])
                    ->required()
                    ->label('Currency'),
                TextInput::make('trial_period_days')
                    ->required()
                    ->numeric()
                    ->label('Trial Period (Days)'),
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
                      /*  'daily' => 'Daily',
                        'weekly' => 'Weekly',*/
                        'monthly' => 'Monthly',
                        'annual' => 'Annual',
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
