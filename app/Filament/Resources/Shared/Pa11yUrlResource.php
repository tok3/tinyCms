<?php

namespace App\Filament\Resources\Shared;

use App\Models\Pa11yUrl;
use App\Models\Pa11yStatistic;
use Carbon\Carbon;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms;
use App\Filament\Resources\Shared\Pa11yUrlResource\Pages;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\BulkAction;
use Illuminate\Support\Facades\Artisan;
use App\Models\Company;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\HtmlString;
use App\Helpers\IconHelper;

use App\Filament\Resources\Shared\Pa11yAccessibilityIssueResource;
class Pa11yUrlResource extends Resource
{
    protected static ?string $model = Pa11yUrl::class;

    public static function getSlug(): string
    {
        return 'firmament-urls';
    }


    protected static ?string $navigationIcon = 'heroicon-o-link';
    protected static ?string $navigationLabel = 'URLs';
    protected static ?string $navigationGroup = 'Firmament';

    public static function form(Forms\Form $form): Forms\Form
    {
        // Grundschema des Formulars
        $formSchema = [
            Forms\Components\TextInput::make('url')
                ->label('URL')
                ->required(),
        ];

        // Wenn der Benutzer ein Admin ist, füge das Dropdown für Company hinzu
        if (auth()->user()->is_admin)
        {
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
                    ->visible(fn() => auth()->user()->is_admin)  // Nur sichtbar, wenn der User ein Admin ist
                    ->sortable(),

                TextColumn::make('url')
                    ->label('URL')
                    ->sortable()
                    ->searchable()
                    ->limit(50)  // Zeigt nur die ersten 50 Zeichen an
                    ->tooltip(function ($record) {
                        return $record->url;  // Zeigt die volle URL im Tooltip
                    })
                    ->formatStateUsing(function ($state) {
                        return strlen($state) > 50 ? substr($state, 0, 50) . ' [...]' : $state; // Kürzt die URL und fügt '...' hinzu
                    })
                    ->url(function ($record) {
                        return $record->url; // Die URL, die geöffnet werden soll
                    }, true), // Der zweite Parameter (true) öffnet die URL in einem neuen Tab
                Tables\Columns\TextColumn::make('last_checked')
                    ->label('Last Checked')
                    ->formatStateUsing(fn($state) => Carbon::parse($state)->format('d.m.Y H:i'))
                    ->sortable(),

                Tables\Columns\TextColumn::make('error_count')
                    ->label('Fehler (2.1)')
                    ->sortable()
                    ->badge(fn($record) => $record->error_count > 0 || $record->error_count < 0) // Kein Badge bei Success
                    ->formatStateUsing(fn($record) =>
                    ($record->error_count < 0)
                        ? new HtmlString('<span title="Scan fehlgeschlagen">'.IconHelper::cross().' </span>') // ❌ Scan fehlgeschlagen
                        : ($record->error_count == 0
                        ? IconHelper::shieldCheck() // ✅ Nur Icon anzeigen, kein Badge
                        : $record->error_count) // Zeigt die Zahl mit Badge an
                    )
                    ->color(fn($record): string =>
                    ($record->error_count < 0) ? 'gray' :
                        ($record->error_count > 0 ? 'danger' : 'success')
                    ),


                Tables\Columns\TextColumn::make('warning_count')
                    ->label('Warnungen (2.1)')
                    ->sortable()
                    ->badge(fn($record) => $record->warning_count > 0 || $record->warning_count < 0) // Kein Badge bei Success
                    ->formatStateUsing(fn($record) =>
                    ($record->warning_count < 0)
                        ? new HtmlString('<span title="Scan fehlgeschlagen">'.IconHelper::cross().' </span>') // ❌ Scan fehlgeschlagen
                        : ($record->warning_count == 0
                        ? IconHelper::shieldCheck() // ✅ Nur Icon anzeigen, kein Badge
                        : $record->warning_count) // Zeigt die Zahl mit Badge an
                    )
                    ->color(fn($record): string =>
                    ($record->warning_count < 0) ? 'gray' :
                        ($record->warning_count > 0 ? 'warning' : 'success')
                    ),
/*
                Tables\Columns\TextColumn::make('error_count_20')
                    ->label('Fehler (2.0)')
                    ->sortable()
                    ->badge()
                    ->color(fn($state): string => $state > 0 ? 'danger' : 'gray')
                    ->formatStateUsing(fn($record) => $record->error_count_20),

                Tables\Columns\TextColumn::make('warning_count_20')
                    ->label('Warnings (2.0)')
                    ->sortable()
                    ->badge()
                    ->color(fn($state): string => $state > 0 ? 'warning' : 'gray')
                    ->formatStateUsing(fn($record) => $record->warning_count_20), //

                Tables\Columns\TextColumn::make('notice_count_20')
                    ->label('Notices (2.0)')
                    ->sortable()
                    ->badge()
                    ->color(fn($state): string => $state > 0 ? 'info' : 'gray')
                    ->formatStateUsing(fn($record) => $record->notice_count_20), //*/



            ])
            ->actions([
                Tables\Actions\Action::make('rescan21')
                    ->label('Rescan (2.1)')
                    ->action(function ($record) {

                        $includeNotices = true; // Notices aktivieren
                        $includeWarnings = true; // Warnings aktivieren

                        \Log::info('Starting rescan for URL', ['url_id' => $record->id]);

                        // Starte das Artisan-Kommando
                        Artisan::call('scan:accessibility-21', [
                            'urls' => [$record->id],      // URL-ID übergeben
                            '--warnings' => $includeWarnings,
                        ]);

                        session()->flash('success', "Rescan initiated for {$record->url} (Standard: 2.1)");
                    }),
                /*Tables\Actions\Action::make('view_results')
                    ->label('View Results')
                    ->url(fn($record) => static::getUrl('view', ['record' => $record->id]))
                    ->icon('heroicon-o-eye'),*/

                Tables\Actions\Action::make('view_results')
                    ->label('View Results')
                    ->url(fn($record) => route('filament.admin.resources.firmament-issues.grouped', [
                        'standard' => '2.1',
                        'url_id' => $record->id,
                    ]))
                    ->icon('heroicon-o-eye'),



                // Edit-Action (automatisch verfügbar)
                Tables\Actions\EditAction::make()
                    ->label('Edit')
                    ->icon('heroicon-o-pencil'),

                // Delete-Action
              /*  Tables\Actions\DeleteAction::make()
                    ->label('Delete')
                    ->icon('heroicon-o-trash')
                    ->color('danger')
                    ->action(function ($record) {
                        $record->delete();
                    })*/
            ]) ->bulkActions([
                // Bulk Delete Action
                BulkAction::make('bulk_delete')
                    ->label('Delete Selected')
                    ->icon('heroicon-o-trash')
                    ->action(function ($records) {
                        foreach ($records as $record) {
                            $record->delete(); // Löscht alle ausgewählten URLs
                        }
                    }),

                // Bulk Rescan Action
             /*   BulkAction::make('bulk_rescan')
                    ->label('Rescan Selected')
                    ->icon('heroicon-o-arrow-path')
                    ->action(function ($records) {
                        foreach ($records as $record) {
                            $levels = 'A,AA,AAA';
                            \Log::info('Starting bulk rescan for URL', ['url_id' => $record->id]);
                            Artisan::call('scan:accessibility', [
                                'urls' => [$record->id],
                                '--levels' => $levels,
                            ]);
                        }
                        session()->flash('success', 'Bulk Rescan initiated for selected URLs.');
                    }),*/
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->addSelect([
                'error_count' => Pa11yStatistic::selectRaw('COALESCE(error_count, -1) as error_count')
                    ->whereColumn('pa11y_statistics.url_id', 'pa11y_urls.id')
                    ->where('standard', '2.1')
                    ->latest('scanned_at')
                    ->limit(1),

                'warning_count' => Pa11yStatistic::selectRaw('COALESCE(warning_count, -1) as warning_count')
                    ->whereColumn('pa11y_statistics.url_id', 'pa11y_urls.id')
                    ->where('standard', '2.1')
                    ->latest('scanned_at')
                    ->limit(1),

                'error_count_20' => Pa11yStatistic::select('error_count')
                    ->whereColumn('pa11y_statistics.url_id', 'pa11y_urls.id')
                    ->where('standard', '2.0')
                    ->latest('scanned_at')
                    ->limit(1),

                'warning_count_20' => Pa11yStatistic::select('warning_count')
                    ->whereColumn('pa11y_statistics.url_id', 'pa11y_urls.id')
                    ->where('standard', '2.0')
                    ->latest('scanned_at')
                    ->limit(1),

                'notice_count_20' => Pa11yStatistic::select('notice_count')
                    ->whereColumn('pa11y_statistics.url_id', 'pa11y_urls.id')
                    ->where('standard', '2.0')
                    ->latest('scanned_at')
                    ->limit(1),
            ]);
    }
  /*  public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withCount([
                'accessibilityIssues as error_count' => function ($query) {
                    $query->where('type', 'error')
                        ->where('standard', '2.1');
                },
                'accessibilityIssues as warning_count' => function ($query) {
                    $query->where('type', 'warning')
                        ->where('standard', '2.1');
                },
                'accessibilityIssues as error_count_20' => function ($query) {
                    $query->where('type', 'error')
                        ->where('standard', '2.0');
                },
                'accessibilityIssues as warning_count_20' => function ($query) {
                    $query->where('type', 'warning')
                        ->where('standard', '2.0');
                },

                'accessibilityIssues as notice_count_20' => function ($query) {
                    $query->where('type', 'notice')
                        ->where('standard', '2.0');
                },
            ]);
    }*/

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPa11yUrls::route('/'),
            'create' => Pages\CreatePa11yUrl::route('/create'),
            'edit' => Pages\EditPa11yUrl::route('/{record}/edit'),

        ];
    }

    public static function query(): Builder
    {
        return parent::query()->with('accessibilityIssues');
    }
}
