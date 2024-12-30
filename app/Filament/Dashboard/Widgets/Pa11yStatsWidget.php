<?php

namespace App\Filament\Dashboard\Widgets;

use App\Models\Pa11yStatistic;
use Filament\Widgets\Widget;
use Filament\Widgets\Charts\Chart;

class Pa11yStatsWidget extends Widget
{
    protected static string $view = 'filament.widgets.pa11y-stats-widget';

    public function mount()
    {
        // Hier können wir mit den Daten arbeiten
    }

    public function getStatsData()
    {
        // Hole die Statistiken aus der Pa11yStatistic-Tabelle für eine bestimmte Company
        $companyId = auth()->user()->company_id; // Hier kannst du je nach User die richtige CompanyID verwenden
        return Pa11yStatistic::where('company_id', $companyId)
            ->selectRaw('scanned_at, sum(error_count) as errors, sum(warning_count) as warnings, sum(notice_count) as notices')
            ->groupBy('scanned_at')
            ->orderBy('scanned_at', 'asc')
            ->get();
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        $stats = $this->getStatsData();

        echo "sdfjakl";
        die();
        // Daten für das Diagramm aufbereiten
        $labels = $stats->pluck('scanned_at')->toArray();
        $errors = $stats->pluck('errors')->toArray();
        $warnings = $stats->pluck('warnings')->toArray();
        $notices = $stats->pluck('notices')->toArray();

        return view('filament.dashboard.widgets.pa11y-stats-widget', [
            'labels' => $labels,
            'errors' => $errors,
            'warnings' => $warnings,
            'notices' => $notices,
        ]);
    }
}
