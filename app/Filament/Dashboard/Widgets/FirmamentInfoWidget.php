<?php

namespace App\Filament\Dashboard\Widgets;

use Carbon\Carbon;
use Filament\Widgets\Widget;
use Filament\Facades\Filament;
use App\Models\Pa11yStatistic;
use App\Filament\Resources\Shared\Pa11yUrlResource;

class FirmamentInfoWidget extends Widget
{
    protected static ?int $sort = -0;
    protected int|string|array $columnSpan = 1;
    protected static bool $isLazy = false;
    protected static string $view = 'filament.dashboard.widgets.firmament-info-widget';

    public function render(): \Illuminate\Contracts\View\View
    {
        $companyId = Filament::getTenant()->id;

        // WCAG 2.0 Query
        $statisticsWCAG20 = Pa11yStatistic::selectRaw("
            DATE(scanned_at) as scan_date,
            SUM(error_count) as total_errors,
            SUM(warning_count) as total_warnings,
            SUM(notice_count) as total_notices,
            COUNT(DISTINCT url_id) as total_urls
        ")
            ->where('scanned_at', '>=', now()->subDays(14))
            ->where('company_id', $companyId)
            ->whereRaw('id IN (
                SELECT MAX(id)
                FROM pa11y_statistics
                WHERE company_id = ?
                AND standard = "2.0"
                GROUP BY DATE(scanned_at), wcag_level, url_id
            )', [$companyId])
            ->groupBy('scan_date')
            ->orderBy('scan_date', 'asc')
            ->get();

        // WCAG 2.1 Query (keine WCAG Level, nur Errors & Warnings)
        $statisticsWCAG21 = Pa11yStatistic::selectRaw("
            DATE(scanned_at) as scan_date,
            SUM(error_count) as total_errors,
            SUM(warning_count) as total_warnings,
            COUNT(DISTINCT url_id) as total_urls
        ")
            ->where('scanned_at', '>=', now()->subDays(14))
            ->where('company_id', $companyId)
            ->where('standard', '2.1')
            ->groupBy('scan_date')
            ->orderBy('scan_date', 'asc')
            ->get();

        // Daten formatieren
        $chartDataWCAG20 = $statisticsWCAG20->isEmpty() ? null : $this->formatChartData($statisticsWCAG20, true);
        $chartDataWCAG21 = $statisticsWCAG21->isEmpty() ? null : $this->formatChartData($statisticsWCAG21, false);

        $pa11yUrlIndex = Pa11yUrlResource::getUrl('index');

        return view(static::$view, [
            'firmamentLink' => $pa11yUrlIndex,
            'chartDataWCAG20' => $chartDataWCAG20,
            'chartDataWCAG21' => $chartDataWCAG21,
        ]);
    }

    private function formatChartData($statistics, $includeNotices = true)
    {
        $labels = $statistics->pluck('scan_date')->map(fn($date) => Carbon::parse($date)->format('d.m.Y'))->toArray();
        $urlsPerDate = $statistics->pluck('total_urls')->toArray();

        $datasets = [
            [
                'label' => 'Errors',
                'borderColor' => 'red',
                'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                'fill' => false,
                'data' => $statistics->pluck('total_errors')->toArray(),
                'urls' => $urlsPerDate, // Anzahl der URLs pro Datum
            ],
            [
                'label' => 'Warnings',
                'borderColor' => 'orange',
                'backgroundColor' => 'rgba(255, 159, 64, 0.2)',
                'fill' => false,
                'data' => $statistics->pluck('total_warnings')->toArray(),
                'urls' => $urlsPerDate, // Anzahl der URLs pro Datum
            ],
        ];

        // WCAG 2.0 spezifisch: Notices hinzufügen
        if ($includeNotices) {
            $datasets[] = [
                'label' => 'Notices',
                'borderColor' => 'blue',
                'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                'fill' => false,
                'data' => $statistics->pluck('total_notices')->toArray(),
                'urls' => $urlsPerDate, // Anzahl der URLs pro Datum
            ];
        }

        return [
            'labels' => $labels,
            'datasets' => $datasets,
        ];
    }
}
