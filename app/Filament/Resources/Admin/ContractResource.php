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
                            ->content(fn ($record) => $record->contractable?->name ."nl" .  $record->contractable?->name_2)
                             ->columnSpan(4),

                        Placeholder::make('company_plz')
                            ->label('')
                            ->content(fn ($record) => ($record->contractable?->plz ?? 'N/A').' ' .$record->contractable?->ort ?? 'N/A'),



                    ])
                    ->columns(4),

                Section::make('Contract Details')
                    ->schema([
                        Placeholder::make('product_name')
                            ->label('Product Name')
                            ->content(fn ($record) => $record->product_name ?? 'N/A'),

                        Placeholder::make('product_description')
                            ->label('Product Description')
                            ->content(fn ($record) => $record->product_description ?? 'N/A'),

                        Placeholder::make('price')
                            ->label('Price (€)')
                            ->content(fn ($record) => number_format($record->price / 100, 2, ',', '.') . ' €'),

                        Placeholder::make('setup_fee')
                            ->label('Setup Fee (€)')
                            ->content(fn ($record) => number_format($record->setup_fee / 100, 2, ',', '.') . ' €'),

                        Placeholder::make('interval')
                            ->label('Payment Interval')
                            ->content(fn ($record) => $record->interval ?? 'N/A'),

                        Placeholder::make('subscription_id')
                            ->label('Subscription ID')
                            ->content(fn ($record) => $record->subscription_id ?? 'N/A'),

                        Placeholder::make('subscription_start_date')
                            ->label('Subscription Start Date')
                            ->content(fn ($record) => $record->subscription_start_date ?? 'N/A'),
                    ])
                    ->columns(2),

                Section::make('Contract Period')
                    ->schema([
                        Placeholder::make('order_date')
                            ->label('Order Date')
                            ->content(fn ($record) => $record->order_date ?? 'N/A'),

                        Placeholder::make('start_date')
                            ->label('Start Date')
                            ->content(fn ($record) => $record->start_date ?? 'N/A'),

                        Placeholder::make('duration')
                            ->label('Duration (in days)')
                            ->content(fn ($record) => $record->duration ?? 'N/A'),

                        Placeholder::make('end_date')
                            ->label('End Date')
                            ->content(fn ($record) => $record->end_date ?? 'N/A'),

                        Placeholder::make('iteration')
                            ->label('Iteration')
                            ->content(fn ($record) => $record->iteration ?? 'N/A'),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('contractable_id')
                    ->label('ID')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('company_name')
                    ->label('Company Name')
                    ->getStateUsing(fn ($record) => $record->contractable instanceof Company ? $record->contractable->name : '-')
                    ->sortable(),

         Tables\Columns\TextColumn::make('company_plz')
                    ->label('PLZ')
                    ->getStateUsing(fn ($record) => $record->contractable instanceof Company ? $record->contractable->plz : '-')
                    ->sortable(),

                Tables\Columns\TextColumn::make('company_ort')
                    ->label('Ort')
                    ->getStateUsing(fn ($record) => $record->contractable instanceof Company ? $record->contractable->ort : '-')
                    ->sortable(),


                Tables\Columns\TextColumn::make('product_name')
                    ->label('Product Name')
                    ->sortable()
                    ->searchable(),


                Tables\Columns\TextColumn::make('formatted_price')
                    ->searchable()
                    ->label('Preis')
                    ->formatStateUsing(fn (string $state) => $state )
                    ->alignment(Alignment::End),


                Tables\Columns\TextColumn::make('interval')
                    ->label('Interval')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('subscription_start_date')
                    ->label('Subscription Start Date')
                    ->formatStateUsing(fn ($state) => $state ? Carbon::parse($state)->format('d.m.Y') : null)
                    ->sortable(),

                Tables\Columns\TextColumn::make('order_date')
                    ->label('Order Date')
                    ->formatStateUsing(fn ($state) => $state ? Carbon::parse($state)->format('d.m.Y') : null)
                    ->sortable(),

                Tables\Columns\TextColumn::make('start_date')
                    ->label('Start Date')
                    ->formatStateUsing(fn ($state) => $state ? Carbon::parse($state)->format('d.m.Y') : null)
                    ->sortable(),

                Tables\Columns\TextColumn::make('duration')
                    ->label('LZ')
                    ->sortable(),

                Tables\Columns\TextColumn::make('end_date')
                    ->label('End Date')
                    ->formatStateUsing(fn ($state) => $state ? Carbon::parse($state)->format('d.m.Y') : null)
                    ->sortable(),

            ])
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

    public static function getPages(): array
    {
        return [
            'index' => Admin\ContractResource\Pages\ListContracts::route('/'),
            'create' => Admin\ContractResource\Pages\CreateContract::route('/create'),
            'edit' => Admin\ContractResource\Pages\EditContract::route('/{record}/edit'),
        ];
    }



}
