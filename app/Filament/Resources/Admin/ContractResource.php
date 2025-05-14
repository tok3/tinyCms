<?php

namespace App\Filament\Resources\Admin;

use App\Filament\Resources\Admin;
use App\Filament\Resources\ContractResource\Pages;
use App\Filament\Resources\ContractResource\RelationManagers;
use App\Models\Contract;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\Alignment;
use Filament\Tables;
use Filament\Tables\Table;
use Carbon\Carbon;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\KeyValue;
use App\Models\Company;
use Filament\Forms\Components\ViewField;
use Filament\Forms\Components\Placeholder;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\MultiSelect;
use Illuminate\Database\Eloquent\Model;
class ContractResource extends Resource
{
    protected static ?string $model = Contract::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Company Information')
                    ->schema([
                        Placeholder::make('company_name')
                            ->label('')
                            ->content(fn($record) => $record->contractable?->name . "nl" . $record->contractable?->name_2)
                            ->columnSpan(4),

                        Placeholder::make('company_plz')
                            ->label('')
                            ->content(fn($record) => ($record->contractable?->plz ?? 'N/A') . ' ' . $record->contractable?->ort ?? 'N/A'),


                    ])
                    ->columns(4),

                Section::make('Contract Details')
                    ->schema([
                        TextInput::make('product_name')
                            ->label('Product Name')
                            ->required(),
                        Textarea::make('product_description')
                            ->label('Product Description')
                            ->rows(3)
                            ->required(),
                        TextInput::make('price')
                            ->label('Price (€)')
                            ->required()
                            ->afterStateHydrated(function ($state, callable $set) {
                                if (is_numeric($state)) {
                                    $set('price', number_format($state / 100, 2, ',', '.'));
                                }
                            })
                            ->dehydrateStateUsing(function ($state) {
                                $normalized = str_replace(['.', ' '], ['', ''], $state);
                                $normalized = str_replace(',', '.', $normalized);
                                return (int) round((float) $normalized * 100);
                            }),
                        Select::make('interval')
                            ->label('Payment Interval')
                            ->options([
                                'daily'   => 'Daily',
                                'weekly'  => 'Weekly',
                                'monthly' => 'Monthly',
                                'annual'  => 'Annual',
                                'one_time' => 'One-time',
                            ])
                            ->required(),

                        TextInput::make('subscription_id')
                            ->label('Subscription ID')
                            ->required()
                            ->visible(fn (callable $get): bool => (bool) $get('subscription_id')),
                        DatePicker::make('subscription_start_date')
                            ->label('Subscription Start Date')
                            ->required()
                            ->visible(fn (callable $get): bool => (bool) $get('subscription_id')),
                    ])
                    ->columns(2),

                Section::make('Contract Period')
                    ->schema([
                        DatePicker::make('order_date')
                            ->label('Order Date')
                            ->required(),
                        DatePicker::make('start_date')
                            ->label('Start Date')
                            ->required(),
                        TextInput::make('duration')
                            ->label('Duration (in Months)')
                            ->numeric()
                            ->required(),
                        DatePicker::make('end_date')
                            ->label('End Date')
                            ->required(),
                        TextInput::make('iteration')
                            ->label('Iteration')
                            ->numeric()
                            ->required(),
                    ])
                    ->columns(2),

                Section::make('Booked Features')
                    ->schema([
                        MultiSelect::make('features')
                            ->label('Features')
                            ->relationship('features', 'name')
                            ->preload()
                            ->saveRelationshipsUsing(function (Model $record, array $state) {
                                // $state = [1,2,3] Feature-IDs
                                // Sync mit Pivot-Werten, einschließlich company_id
                                $pivots = collect($state)
                                    ->mapWithKeys(fn ($featureId) => [
                                        $featureId => ['company_id' => $record->contractable_id],
                                    ])
                                    ->toArray();

                                $record->features()->sync($pivots);
                            })
                          ,
                    ])
                    ->columns(2),



                 ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(
                fn (): Builder => Contract::query()
                    ->where('contractable_type', Company::class)
                    ->with(['contractable' => function ($query) {
                        $query->select('id', 'name', 'plz', 'ort', 'kd_nr');
                    }])
            )
            ->columns([

                Tables\Columns\TextColumn::make('contractable_id')
                    ->label('ID')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('contractable.name')
                    ->label('Firma')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('contractable.kd_nr')
                    ->label('Kd-Nr.')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('contractable.plz')
                    ->label('PLZ')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('contractable.ort')
                    ->label('Ort')
                    ->sortable()
                    ->searchable(),


                Tables\Columns\TextColumn::make('product_name')
                    ->label('Product Name')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('price')
                    ->label('Preis')
                    ->searchable()
                    ->formatStateUsing(fn($state) => number_format($state / 100, 2, ',', '.') . ' €')
                    ->alignment(Alignment::End),


                Tables\Columns\TextColumn::make('interval')
                    ->label('Interval')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('subscription_start_date')
                    ->label('Subscription Start Date')
                    ->formatStateUsing(fn($state) => $state ? Carbon::parse($state)->format('d.m.Y') : null)
                    ->sortable(),

                Tables\Columns\TextColumn::make('order_date')
                    ->label('Order Date')
                    ->formatStateUsing(fn($state) => $state ? Carbon::parse($state)->format('d.m.Y') : null)
                    ->sortable(),

                Tables\Columns\TextColumn::make('start_date')
                    ->label('Start Date')
                    ->formatStateUsing(fn($state) => $state ? Carbon::parse($state)->format('d.m.Y') : null)
                    ->sortable(),

                Tables\Columns\TextColumn::make('duration')
                    ->label('LZ')
                    ->sortable(),

                Tables\Columns\TextColumn::make('end_date')
                    ->label('End Date')
                    ->formatStateUsing(fn($state) => $state ? Carbon::parse($state)->format('d.m.Y') : null)
                    ->sortable(),

            ])
            ->defaultSort('id', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->addSelect([
                'company_name' => Company::select('name')
                    ->whereColumn('companies.id', 'contracts.contractable_id')
                    ->where('contracts.contractable_type', Company::class)
                    ->limit(1),
            ]);
    }
    public static function getPages(): array
    {
        return [
            'index' => Admin\ContractResource\Pages\ListContracts::route('/'),
            'create' => Admin\ContractResource\Pages\CreateContract::route('/create'),
            'edit' => Admin\ContractResource\Pages\EditContract::route('/{record}/edit'),
        ];
    }


}
