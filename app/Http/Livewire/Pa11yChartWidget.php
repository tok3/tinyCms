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
            ->where('scanned_at', '>=', now()->subDays(14))
            ->select('scanned_at', 'error_count', 'warning_count', 'notice_count')
            ->orderBy('scanned_at')
            ->get();

        // Formatiere die Labels und die Daten für die Chart.js Darstellung
        $labels = $statistics->pluck('scanned_at')->map(function ($date) {
            return Carbon::parse($date)->format('Y-m-d H:i:s'); // Umwandlung in Carbon und Formatierung
        });

        $errors = $statistics->pluck('error_count');
        $warnings = $statistics->pluck('warning_count');
        $notices = $statistics->pluck('notice_count');

        return view('livewire.pa11y-chart-widget', compact('labels', 'errors', 'warnings', 'notices'));
    }
}
