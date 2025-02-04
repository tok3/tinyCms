<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pa11yStatistic;
use Carbon\Carbon;

class Pa11yChartWidget21 extends Component
{
    public $urlId;

    public function mount($urlId)
    {
        $this->urlId = $urlId;
    }

    public function render()
    {
        $statistics = Pa11yStatistic::where('url_id', $this->urlId)
            ->where('standard', '2.1') // Nur WCAG 2.1-Daten
            ->orderBy('scanned_at', 'asc') // Nach Datum aufsteigend sortieren
            ->get();

        $labels = $statistics->map(fn($stat) => Carbon::parse($stat->scanned_at)->format('d.m.Y H:i'))->toArray(); // Zeitstempel anzeigen
        $errors = $statistics->pluck('error_count')->toArray();
        $warnings = $statistics->pluck('warning_count')->toArray();

        return view('livewire.pa11y-chart-widget21', compact('labels', 'errors', 'warnings'));
    }
}
