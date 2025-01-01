<?php

namespace App\Filament\Resources\Shared;

use App\Filament\Resources\Shared\Pa11yAccessibilityIssueResource\Pages; // Richtiges Namespace!
use App\Models\Pa11yAccessibilityIssue;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class Pa11yAccessibilityIssueResource extends Resource
{
    protected static ?string $model = Pa11yAccessibilityIssue::class;

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ViewColumn::make('issue_card')
                    ->label('Issues')
                    ->view('filament.tables.columns.issue-card'), // Custom Blade View für die Karten
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->label('Type')
                    ->options([
                        'notice' => 'Notices',
                        'warning' => 'Warnings',
                        'error' => 'Errors',
                    ]),
            ])
           ;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPa11yAccessibilityIssues::route('/'),
            'create' => Pages\CreatePa11yAccessibilityIssue::route('/create'),
            'edit' => Pages\EditPa11yAccessibilityIssue::route('/{record}/edit'),
        ];
    }
}
