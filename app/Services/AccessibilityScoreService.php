<?php

namespace App\Services;

use App\Models\Company;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AccessibilityScoreService
{
    public function getCompanyMetrics(Company $company, float $k = 10.0): ?array
    {
        // Basis-Query: NUR WCAG 2.1, mit gültigem scanned_at
        $baseQuery = DB::table('pa11y_statistics')
            ->where('company_id', $company->id)
            ->where('standard', '2.1')
            ->whereNotNull('scanned_at');

        // 1) Tages-Aggregation: Score pro Tag (nur 2.1)
        $rows = (clone $baseQuery)
            ->selectRaw('
                DATE(scanned_at) as day,
                SUM(error_count) as total_errors,
                COUNT(DISTINCT url_id) as urls_scanned
            ')
            ->groupBy(DB::raw('DATE(scanned_at)'))
            ->orderBy('day')
            ->get();

        if ($rows->isEmpty()) {
            // Keine 2.1-Daten -> später im Controller abfangen
            return null;
        }

        $daily = [];
        foreach ($rows as $row) {
            $urls = (int) $row->urls_scanned;
            $errs = (int) $row->total_errors;
            $avg  = $urls > 0 ? $errs / $urls : 0.0;

            $rawScore = 100 - $k * $avg;
            $score    = (int) max(0, min(100, round($rawScore)));

            $daily[] = [
                'day'            => $row->day,
                'total_errors'   => $errs,
                'urls_scanned'   => $urls,
                'errors_per_url' => $avg,
                'score'          => $score,
            ];
        }

        // erster und letzter 2.1-Tag
        $first = $daily[0];
        $last  = $daily[count($daily) - 1];

        $startScore       = $first['score'];
        $currentScore     = $last['score'];
        $startErrors      = $first['total_errors'];
        $currentErrors    = $last['total_errors'];
        $observationStart = Carbon::parse($first['day']); // erster 2.1-Scan
        $observationEnd   = Carbon::parse($last['day']);  // letzter 2.1-Scan

        $resolvedTotal = max(0, $startErrors - $currentErrors);
        $newTotal      = max(0, $currentErrors - $startErrors);

        $trendDiff = $currentScore - $startScore;
        if ($trendDiff > 3) {
            $trendLabel = 'verbessert';
        } elseif ($trendDiff < -3) {
            $trendLabel = 'verschlechtert';
        } else {
            $trendLabel = 'stabil';
        }

        // 2) Aktivität: nur 2.1-Daten
        $activityRows = (clone $baseQuery)
            ->select('url_id', 'scanned_at', 'error_count')
            ->whereNotNull('url_id')
            ->orderBy('url_id')
            ->orderBy('scanned_at')
            ->get();

        $fixedTotal      = 0;
        $introducedTotal = 0;
        $currentUrlId    = null;
        $prevErrors      = null;

        foreach ($activityRows as $row) {
            $urlId      = $row->url_id;
            $errorCount = (int) $row->error_count;

            if ($currentUrlId !== $urlId) {
                $currentUrlId = $urlId;
                $prevErrors   = $errorCount;
                continue;
            }

            $diff = $errorCount - $prevErrors;

            if ($diff < 0) {
                $fixedTotal += -$diff;
            } elseif ($diff > 0) {
                $introducedTotal += $diff;
            }

            $prevErrors = $errorCount;
        }

        return [
            'current_score'       => $currentScore,
            'start_score'         => $startScore,
            'trend_diff'          => $trendDiff,
            'trend_label'         => $trendLabel,

            'observation_start'   => $observationStart,
            'observation_end'     => $observationEnd,

            'current_errors'      => $currentErrors,
            'start_errors'        => $startErrors,
            'resolved_total'      => $resolvedTotal,
            'new_total'           => $newTotal,

            'current_urls'        => $last['urls_scanned'],
            'start_urls'          => $first['urls_scanned'],

            'activity_fixed_total'      => $fixedTotal,
            'activity_introduced_total' => $introducedTotal,
            'activity_value'            => $fixedTotal,

            'daily'               => $daily,
        ];
    }
}
