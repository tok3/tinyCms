<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pa11yStatistic;
use Carbon\Carbon;

class Pa11yChartWidget21 extends Component
{
    public $urlId;
    public $standard;

    public function mount($urlId, $standard = '2.1')
    {
        $this->urlId = $urlId;
        $this->standard = normalizeWcagStandard($standard);
    }

    public function render()
    {
        $statistics = Pa11yStatistic::where('url_id', $this->urlId)
            ->where('standard', $this->standard) // WCAG 2.1 / 2.2
            ->orderBy('scanned_at', 'asc') // Nach Datum aufsteigend sortieren
            ->get();

        $labels = $statistics->map(fn($stat) => Carbon::parse($stat->scanned_at)->format('d.m.Y H:i'))->toArray(); // Zeitstempel anzeigen
        $errors = $statistics->pluck('error_count')->toArray();
        $warnings = $statistics->pluck('warning_count')->toArray();

        return view('livewire.pa11y-chart-widget21', compact('labels', 'errors', 'warnings'));
    }
}
