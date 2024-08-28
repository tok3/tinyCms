<?php

namespace App\Filament\Resources\Shared;

use App\Filament\Resources\Shared;
use App\Filament\Resources\SubscriberResource\Pages;
use App\Filament\Resources\SubscriberResource\RelationManagers;
use App\Models\Subscriber;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class SubscriberResource extends Resource
{
    protected static ?string $model = Subscriber::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }


    public static function table(Table $table): Table
    {

        $columns = [
            Tables\Columns\TextColumn::make('first_name')->label('Vorname')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('last_name')->label('Name')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('email')->label('Email')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('unsubscribe_token')->label('Email')
         ,
            Tables\Columns\TextColumn::make('created_at')->dateTime('d.m.Y H:i')->label('Erstellt')
                ->searchable()
                ->sortable(),
        ];


        if (auth()->user()->is_admin == 1)
        {
            array_unshift($columns, Tables\Columns\TextColumn::make('company.name')->label('Firmenname'));
        }

        // Spalten zum Table hinzufügen
        $table->columns($columns)
            ->filters([
                // Filter hier
            ])
            ->actions([
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    ExportBulkAction::make()

                ],
                ),
            ]);

        return $table;

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
            'index' => Shared\SubscriberResource\Pages\ListSubscribers::route('/'),
            'create' => Shared\SubscriberResource\Pages\CreateSubscriber::route('/create'),
            'edit' => Shared\SubscriberResource\Pages\EditSubscriber::route('/{record}/edit'),
        ];
    }
}
