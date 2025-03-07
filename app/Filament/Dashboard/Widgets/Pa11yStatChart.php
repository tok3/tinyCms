<?php

namespace App\Filament\Dashboard\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Pa11yStatistic;
use Carbon\Carbon;
use Filament\Facades\Filament;
class Pa11yStatChart extends ChartWidget
{
    protected static ?string $heading = 'Firmament Scan Result Chart ';

    protected static ?int $sort = 2; // Wird als zweites Widget angezeigt
    protected function getData(): array
    {


        // Holen der Daten für die letzten 14 Tage
        // Holen der Daten für die letzten 14 Tage
        $statistics = Pa11yStatistic::selectRaw("
        DATE(scanned_at) as scan_date,
        SUM(error_count) as total_errors,
        SUM(warning_count) as total_warnings,
        SUM(notice_count) as total_notices,
        COUNT(DISTINCT url_id) as total_urls
    ")
            ->where('scanned_at', '>=', now()->subDays(14))
            ->where('company_id', Filament::getTenant()->id)
            ->whereRaw('id IN (
        SELECT MAX(id)
        FROM pa11y_statistics
        WHERE company_id = ?
        GROUP BY DATE(scanned_at), wcag_level, url_id
    )', [Filament::getTenant()->id])
            ->groupBy('scan_date')
            ->orderBy('scan_date', 'asc')
            ->get();


        $statistics->toArray();


        // Extrahieren der Labels und der Daten
        $labels = $statistics->pluck('scan_date')->map(function ($date) {
            return Carbon::parse($date)->format('d.m.Y');
        });

        $labels = $statistics->map(function ($stat) {
            $formattedDate = Carbon::parse($stat->scan_date)->format('d.m.Y');
            return "{$formattedDate} ({$stat->total_urls} URLs)";
        });
        $errors = $statistics->pluck('total_errors');
        $warnings = $statistics->pluck('total_warnings');
        $notices = $statistics->pluck('total_notices');

        // Rückgabe der Daten im gewünschten Format
        return [
            'labels' => $labels->toArray(), // Labels (Datum)
            'datasets' => [
                [
                    'label' => 'Errors',
                    'borderColor' => 'red',
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                    'fill' => false,
                    'data' => $errors->toArray(), // Fehlerdaten
                ],
                [
                    'label' => 'Warnings',
                    'borderColor' => 'orange',
                    'backgroundColor' => 'rgba(255, 159, 64, 0.2)',
                    'fill' => false,
                    'data' => $warnings->toArray(), // Warnungsdaten
                ],
                [
                    'label' => 'Notices',
                    'borderColor' => 'blue',
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                    'fill' => false,
                    'data' => $notices->toArray(), // Hinweisdaten
                ]
            ],
        ];



    }

    protected function getType(): string
    {
        return 'line';
    }
}
