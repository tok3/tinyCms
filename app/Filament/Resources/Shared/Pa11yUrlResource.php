<?php

namespace App\Filament\Resources\Shared;

use App\Models\Pa11yUrl;
use Carbon\Carbon;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms;
use App\Filament\Resources\Shared\Pa11yUrlResource\Pages;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\Action;
use Illuminate\Support\Facades\Artisan;
use App\Models\Company;
class Pa11yUrlResource extends Resource
{
    protected static ?string $model = Pa11yUrl::class;

    protected static ?string $navigationIcon = 'heroicon-o-link';
    protected static ?string $navigationLabel = 'URLs';
    protected static ?string $navigationGroup = 'Accessibility Tools';

    public static function form(Forms\Form $form): Forms\Form
    {
        // Grundschema des Formulars
        $formSchema = [
            Forms\Components\TextInput::make('url')
                ->label('URL')
                ->required(),
        ];

        // Wenn der Benutzer ein Admin ist, füge das Dropdown für Company hinzu
        if (auth()->user()->is_admin) {
            $formSchema[] = Forms\Components\Select::make('company_id') // Dropdown für Company
            ->label('Company')
                ->placeholder('Firma wählen')
                ->options(Company::all()->pluck('name', 'id')) // Alle Companies anzeigen
                ->required();
        }

        return $form->schema($formSchema);
    }

    public static function table(Tables\Table $table): Tables\Table
    {



        return $table
            ->columns([
                // Company Name anzeigen, wenn der User ein Admin ist
                Tables\Columns\TextColumn::make('company.name')
                    ->label('Company Name')
                    ->visible(fn () => auth()->user()->is_admin)  // Nur sichtbar, wenn der User ein Admin ist
                    ->sortable(),

                Tables\Columns\TextColumn::make('url')
                    ->label('URL')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('last_checked')
                    ->label('Last Checked')
                    ->formatStateUsing(fn($state) => Carbon::parse($state)->format('d.m.Y H:i'))
                    ->sortable(),

                Tables\Columns\TextColumn::make('error_count')
                    ->label('Errors')
                    ->sortable()
                    ->badge()
                    ->color(fn($state): string => $state > 0 ? 'danger' : 'gray')
                    ->formatStateUsing(fn($record) => $record->error_count),

                Tables\Columns\TextColumn::make('warning_count')
                    ->label('Warnings')
                    ->sortable()
                    ->badge()
                    ->color(fn($state): string => $state > 0 ? 'warning' : 'gray')
                    ->formatStateUsing(fn($record) => $record->warning_count),

                Tables\Columns\TextColumn::make('notice_count')
                    ->label('Notices')
                    ->sortable()
                    ->badge()
                    ->color(fn($state): string => $state > 0 ? 'info' : 'gray')
                    ->formatStateUsing(fn($record) => $record->notice_count), //


            ])
            ->actions([
                Tables\Actions\Action::make('view_results')
                    ->label('View Results')
                    ->url(fn($record) => static::getUrl('view', ['record' => $record->id]))
                    ->icon('heroicon-o-eye'),
                Tables\Actions\Action::make('rescan')
                    ->label('Rescan')
                    ->action(function ($record) {
                        // Levels (A, AA, AAA)
                        $levels = ['A', 'AA', 'AAA'];

                        \Log::info('Starting rescan for URL', ['url_id' => $record->id]);

                        foreach ($levels as $level) {
                            \Log::info('Starting scan for level', ['level' => $level]);

                            // Starte das Artisan Kommando für die URL und das Level
                            Artisan::call('scan:accessibility', [
                                'urls' => $record->id,  // URL-ID übergeben
                                '--levels' => $level,   // Level übergeben
                            ]);
                        }

                        session()->flash('success', 'Rescan initiated for ' . $record->url);
                    })
                    ->icon('heroicon-o-arrow-path')
                    ->color('primary'),
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withCount([
                'accessibilityIssues as error_count' => function ($query) {
                    $query->where('type', 'error');
                },
                'accessibilityIssues as warning_count' => function ($query) {
                    $query->where('type', 'warning');
                },
                'accessibilityIssues as notice_count' => function ($query) {
                    $query->where('type', 'notice');
                },
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPa11yUrls::route('/'),
            'create' => Pages\CreatePa11yUrl::route('/create'),
            'edit' => Pages\EditPa11yUrl::route('/{record}/edit'),
            'view' => Pages\ViewPa11yUrl::route('/{record}/view'), // Neue View-Seite
        ];
    }

    public static function query(): Builder
    {
        return parent::query()->with('accessibilityIssues');
    }
}
