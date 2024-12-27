<?php

namespace App\Filament\Resources\Admin;

use App\Models\Referrer;
use App\Models\Company;
use Carbon\Carbon;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

class ReferrerResource extends Resource
{
    protected static ?string $model = Referrer::class;

    protected static ?string $navigationIcon = 'heroicon-o-link'; // Navigations-Icon
    protected static ?string $navigationGroup = 'Reports'; // Gruppiere die Resource in der Navigation

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([

                TextColumn::make('company.name')
                    ->label('Firma')
                    ->sortable()
                    ->url(fn(Referrer $record) => $record->company
                        ? \App\Filament\Resources\Shared\CompanyResource::getUrl('edit', ['record' => $record->company->id])
                        : null)
                    ->openUrlInNewTab()
                    ->placeholder('No Company Linked')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('referrer')
                    ->label('Referrer URL')
                    ->sortable()
                    ->url(fn(Referrer $record) => $record->referrer)
                    ->openUrlInNewTab()
                    ->placeholder('No Referrer Provided')
                    ->searchable()
                    ->formatStateUsing(fn($state) => strlen($state) > 55 ? substr($state, 0, 55) . '...' : $state) // Zeigt "..." an, wenn die URL länger als 55 Zeichen ist
                    ->sortable(),


                TextColumn::make('count')
                    ->label('Count')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('erstellt')
                    ->sortable()
                    ->formatStateUsing(fn($state) => Carbon::parse($state)->format('d.m.Y H:i')),

                TextColumn::make('updated_at')
                    ->label('aktualisiert')
                    ->sortable()
                    ->formatStateUsing(fn($state) => Carbon::parse($state)->format('d.m.Y H:i')),
            ])
            ->defaultSort('updated_at', 'desc')
            ->filters([
                // Falls erforderlich: Filter hinzufügen
            ])
            ->actions([
                // Falls erforderlich: Zeilenaktionen hinzufügen
            ])
            ->bulkActions([
                // Falls erforderlich: Bulk-Aktionen hinzufügen
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ReferrerResource\Pages\ListReferrers::route('/'),
        ];
    }
}
