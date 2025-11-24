<?php

namespace App\Services;

use App\Models\Company;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AccessibilityScoreService
{
    public function getCompanyMetrics(Company $company, float $k = 10.0): ?array
    {
// Tagesaggregationen pro Company
        $rows = DB::table('pa11y_statistics')
            ->selectRaw('
DATE(scanned_at) as day,
SUM(error_count) as total_errors,
COUNT(DISTINCT url_id) as urls_scanned
')
            ->where('company_id', $company->id)
            ->whereNotNull('scanned_at')
            ->groupBy(DB::raw('DATE(scanned_at)'))
            ->orderBy('day')
            ->get();

        if ($rows->isEmpty())
        {
            return null; // noch keine Daten
        }

        $daily = [];
        foreach ($rows as $row)
        {
            $urls = (int)$row->urls_scanned;
            $errs = (int)$row->total_errors;
            $avg = $urls > 0 ? $errs / $urls : 0.0;

            $rawScore = 100 - $k * $avg;
            $score = (int)max(0, min(100, round($rawScore)));

            $daily[] = [
                'day' => $row->day,
                'total_errors' => $errs,
                'urls_scanned' => $urls,
                'errors_per_url' => $avg,
                'score' => $score,
            ];
        }

// erster und letzter Tag
        $first = $daily[0];
        $last = $daily[count($daily) - 1];

        $startScore = $first['score'];
        $currentScore = $last['score'];
        $startErrors = $first['total_errors'];
        $currentErrors = $last['total_errors'];
        $resolvedErrors = max(0, $startErrors - $currentErrors);
        $newErrors = max(0, $currentErrors - $startErrors);
        $observationStart = Carbon::parse($first['day']);
        $observationEnd = Carbon::parse($last['day']);

// Tendenz
        $trendDiff = $currentScore - $startScore;
        if ($trendDiff > 3)
        {
            $trendLabel = 'verbessert';
        }
        elseif ($trendDiff < -3)
        {
            $trendLabel = 'verschlechtert';
        }
        else
        {
            $trendLabel = 'stabil';
        }

        return [
            'current_score' => $currentScore,
            'start_score' => $startScore,
            'trend_diff' => $trendDiff,
            'trend_label' => $trendLabel,

            'observation_start' => $observationStart,
            'observation_end' => $observationEnd,

            'current_errors' => $currentErrors,
            'start_errors' => $startErrors,
            'resolved_errors' => $resolvedErrors,
            'new_errors' => $newErrors,

            'current_urls' => $last['urls_scanned'],
            'start_urls' => $first['urls_scanned'],

            'daily' => $daily, // für Chart (Zeitverlauf)
        ];
    }
}
