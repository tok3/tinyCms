<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pa11yStatistic;
use Carbon\Carbon;

class Pa11yChartWidget extends Component
{
    public $urlId;

    public function mount($urlId)
    {
        $this->urlId = $urlId;
    }

    public function render()
    {
        // Hole die Daten aus der Pa11yStatistic Tabelle
        $statistics = Pa11yStatistic::where('url_id', $this->urlId)
            ->where('standard', '2.0') // Nur WCAG 2.0-Daten
            ->where('scanned_at', '>=', now()->subDays(14))
            ->selectRaw("
        DATE(scanned_at) as scan_date,
        SUM(error_count) as total_errors,
        SUM(warning_count) as total_warnings,
        SUM(notice_count) as total_notices
    ")
            ->groupBy('scan_date')
            ->orderBy('scan_date', 'asc')
            ->get();

// Formatiere die Labels und die Daten für die Chart.js Darstellung
        $labels = $statistics->map(function ($stat) {
            return Carbon::parse($stat->scan_date)->format('d.m.Y'); // Formatiere das Datum
        })->toArray();

        $errors = $statistics->pluck('total_errors')->toArray();
        $warnings = $statistics->pluck('total_warnings')->toArray();
        $notices = $statistics->pluck('total_notices')->toArray();

        return view('livewire.pa11y-chart-widget', compact('labels', 'errors', 'warnings', 'notices'));
    }
}
