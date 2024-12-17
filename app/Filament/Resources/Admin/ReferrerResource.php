<?php
namespace App\Filament\Resources\Admin;

use App\Models\Referrer;
use App\Models\Company;
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
                TextColumn::make('referrer')
                    ->label('Referrer URL')
                    ->sortable()
                    ->url(fn (Referrer $record) => $record->referrer)
                    ->openUrlInNewTab()
                    ->placeholder('No Referrer Provided'),

                TextColumn::make('company.name')
                    ->label('Company')
                    ->sortable()
                    ->url(fn (Referrer $record) => $record->company
                        ? \App\Filament\Resources\Shared\CompanyResource::getUrl('edit', ['record' => $record->company->id])
                        : null)
                    ->openUrlInNewTab()
                    ->placeholder('No Company Linked'),

                TextColumn::make('count')
                    ->label('Count')
                    ->sortable(),

                TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->dateTime(),
            ])
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
