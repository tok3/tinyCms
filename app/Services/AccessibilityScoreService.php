<?php

namespace App\Services;

use App\Models\Company;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class AccessibilityScoreService
{
    // ==================== KONFIGURIERBARE KONSTANTEN ====================
    private const BASE_K = 10.0;
    private const MAX_PROGRESS_BONUS = 20;
    private const MAX_INTRODUCED_PENALTY = 30;
    private const MAX_DIVERSITY_PENALTY = 25;

    /**
     * Wohlwollender Mindest-Score
     * Alle berechneten Scores unter diesem Wert werden auf diesen Wert angehoben.
     */
    private const MINIMUM_SCORE = 40;

    /**
     * Berechnet die Accessibility Metrics für eine Firma
     *
     * @param Company $company
     * @param float   $k            Multiplikator für Fehler pro URL (je höher, desto strenger)
     * @param int     $minimumScore Mindest-Score (0 = deaktiviert)
     */
    public function getCompanyMetrics(Company $company, float $k = self::BASE_K, int $minimumScore = self::MINIMUM_SCORE): ?array
    {
        $compSettings = DB::table('company_settings')
            ->where('company_id', $company->id)
            ->first();

        $wcagStd = $compSettings->default_standard ?? '2.1';
        if (!in_array($wcagStd, ['2.1', '2.2'])) {
            $wcagStd = '2.1';
        }

        $totalPossibleTypes = $this->getTotalPossibleIssueTypes($wcagStd);

        // Basis-Query
        $baseQuery = DB::table('pa11y_statistics')
            ->join('pa11y_urls', 'pa11y_urls.id', '=', 'pa11y_statistics.url_id')
            ->where('pa11y_statistics.company_id', $company->id)
            ->where('pa11y_statistics.standard', $wcagStd)
            ->whereNull('pa11y_urls.deleted_at')
            ->whereNotNull('pa11y_statistics.scanned_at');

        // Tägliche Zusammenfassung
        $rows = (clone $baseQuery)
            ->selectRaw('
                DATE(pa11y_statistics.scanned_at) as day,
                SUM(pa11y_statistics.error_count) as total_errors,
                COUNT(DISTINCT pa11y_statistics.url_id) as urls_scanned
            ')
            ->groupBy(DB::raw('DATE(pa11y_statistics.scanned_at)'))
            ->orderBy('day')
            ->get();

        if ($rows->isEmpty()) {
            return null;
        }

        // Gescannte URLs pro Tag
        $scannedUrlsByDay = (clone $baseQuery)
            ->selectRaw('DATE(pa11y_statistics.scanned_at) as day, pa11y_statistics.url_id')
            ->groupBy(DB::raw('DATE(pa11y_statistics.scanned_at)'), 'pa11y_statistics.url_id')
            ->orderBy('day')
            ->get()
            ->groupBy('day')
            ->map(fn($items) => $items->pluck('url_id')->map(fn($id) => (int)$id));

        // Issues für Cluster-Analyse
        $issueRows = DB::table('pa11y_accessibility_issues')
            ->join('pa11y_urls', 'pa11y_urls.id', '=', 'pa11y_accessibility_issues.url_id')
            ->where('pa11y_urls.company_id', $company->id)
            ->where('pa11y_accessibility_issues.standard', $wcagStd)
            ->whereNotNull('pa11y_accessibility_issues.created_at')
            ->whereNull('pa11y_urls.deleted_at')
            ->select([
                'pa11y_accessibility_issues.url_id',
                'pa11y_accessibility_issues.issue',
                'pa11y_accessibility_issues.code',
                'pa11y_accessibility_issues.type',
                'pa11y_accessibility_issues.typeCode',
                DB::raw('DATE(pa11y_accessibility_issues.created_at) as day'),
            ])
            ->orderBy('day')
            ->orderBy('pa11y_accessibility_issues.url_id')
            ->get();

        $issuesByDayAndUrl = $this->groupIssuesByDayAndUrl($issueRows);

        // --- Berechnung pro Tag ---
        $daily = [];
        $previousClustersByUrl = [];
        $activityFixedTotal = 0;
        $activityIntroducedTotal = 0;
        $introducedClusterKeys = [];

        foreach ($rows as $row) {
            $day = $row->day;
            $urlsScanned = (int)$row->urls_scanned;
            $totalErrors = (int)$row->total_errors;
            $avgErrorsPerUrl = $urlsScanned > 0 ? $totalErrors / $urlsScanned : 0.0;

            $scannedUrlIds = $scannedUrlsByDay->get($day, collect());

            $uniqueClustersToday = $this->getUniqueClustersForDay($scannedUrlIds, $issuesByDayAndUrl[$day] ?? []);

            // Diversity Penalty
            $diversityRatio = $totalPossibleTypes > 0
                ? count($uniqueClustersToday) / $totalPossibleTypes
                : 0;
            $diversityPenalty = min(self::MAX_DIVERSITY_PENALTY, round($diversityRatio * 40));

            // Base Score
            $baseScore = 100 - $k * $avgErrorsPerUrl;

            // Activity Tracking
            $dayFixed = 0;
            $dayIntroduced = 0;

            foreach ($scannedUrlIds as $urlId) {
                $currentClusters = array_keys($issuesByDayAndUrl[$day][$urlId] ?? []);
                $previousClusters = $previousClustersByUrl[$urlId] ?? [];

                if (!empty($previousClusters)) {
                    $fixed = array_diff($previousClusters, $currentClusters);
                    $introduced = array_diff($currentClusters, $previousClusters);

                    $dayFixed += count($fixed);
                    $dayIntroduced += count($introduced);

                    foreach ($introduced as $key) {
                        $introducedClusterKeys[$key] = true;
                    }
                }

                $previousClustersByUrl[$urlId] = $currentClusters;
            }

            $activityFixedTotal += $dayFixed;
            $activityIntroducedTotal += $dayIntroduced;
            $introducedClusterTotal = count($introducedClusterKeys);

            $progressBonus = min(self::MAX_PROGRESS_BONUS, $activityFixedTotal * 0.4);
            $introducedPenalty = min(self::MAX_INTRODUCED_PENALTY, $introducedClusterTotal * 4);

            // Finaler Score mit wohlwollendem Minimum
            $calculatedScore = $baseScore + $progressBonus - $introducedPenalty - $diversityPenalty;
            $finalScore = max($minimumScore, min(100, round($calculatedScore)));

            $daily[] = [
                'day'                    => $day,
                'total_errors'           => $totalErrors,
                'urls_scanned'           => $urlsScanned,
                'errors_per_url'         => round($avgErrorsPerUrl, 2),

                'base_score'             => (int)max(0, min(100, round($baseScore))),
                'progress_bonus'         => round($progressBonus, 1),
                'introduced_penalty'     => round($introducedPenalty, 1),
                'diversity_penalty'      => (int)$diversityPenalty,
                'calculated_score'       => (int)round($calculatedScore),
                'score'                  => (int)$finalScore,

                'unique_issue_types'     => count($uniqueClustersToday),
                'total_possible_types'   => $totalPossibleTypes,
                'diversity_ratio'        => round($diversityRatio, 3),
            ];
        }

        // Trend-Berechnung
        $first = $daily[0];
        $last = $daily[count($daily) - 1];
        $trendDiff = $last['score'] - $first['score'];

        $trendLabel = match (true) {
            //$trendDiff > 5  => 'stark verbessert',
            $trendDiff > 5  => 'verbessert',
            $trendDiff > 3  => 'verbessert',
            //$trendDiff < -5 => 'stark verschlechtert',
            $trendDiff < -5 => 'verschlechtert',
            $trendDiff < -3 => 'verschlechtert',
            default         => 'stabil'
        };

        return [
            'current_score'     => $last['score'],
            'start_score'       => $first['score'],
            'trend_diff'        => $trendDiff,
            'trend_label'       => $trendLabel,

            'observation_start' => Carbon::parse($first['day']),
            'observation_end'   => Carbon::parse($last['day']),

            'current_errors'    => $last['total_errors'],
            'start_errors'      => $first['total_errors'],

            'activity_fixed_total'      => $activityFixedTotal,
            'activity_introduced_total' => $activityIntroducedTotal,

            'daily' => $daily,
        ];
    }

    private function getTotalPossibleIssueTypes(string $standard): int
    {
        $cacheKey = "accessibility_total_types_{$standard}";

        return Cache::remember($cacheKey, now()->addHours(12), function () use ($standard) {
            $likePattern = $standard === '2.1' ? '%WCAG 2.1%' : '%WCAG 2.2%';

            return DB::table('accessibility_rules')
                ->where('standards', 'like', $likePattern)
                ->orWhere('standards', 'like', '%WCAG 2.0%')
                ->count();
        });
    }

    private function groupIssuesByDayAndUrl($issueRows): array
    {
        $grouped = [];

        foreach ($issueRows as $issue) {
            $day = $issue->day;
            $urlId = (int)$issue->url_id;
            $clusterKey = $this->makeIssueClusterKey($issue);

            $grouped[$day][$urlId][$clusterKey] = true;
        }

        return $grouped;
    }

    private function getUniqueClustersForDay($scannedUrlIds, array $dayIssues): array
    {
        $urlIds = $scannedUrlIds instanceof \Illuminate\Support\Collection
            ? $scannedUrlIds->all()
            : (array) $scannedUrlIds;

        $allClusters = [];

        foreach ($urlIds as $urlId) {
            $urlId = (int)$urlId;
            if (isset($dayIssues[$urlId])) {
                $allClusters = array_merge($allClusters, array_keys($dayIssues[$urlId]));
            }
        }

        return array_unique($allClusters);
    }

    private function makeIssueClusterKey(object $issue): string
    {
        $code     = trim((string)($issue->code ?? ''));
        $type     = trim((string)($issue->type ?? ''));
        $typeCode = trim((string)($issue->typeCode ?? ''));
        $message  = trim(preg_replace('/\s+/', ' ', (string)($issue->issue ?? '')));

        return md5(strtolower(implode('|', [
            $code ?: 'no-code',
            $type ?: 'no-type',
            $typeCode ?: 'no-type-code',
            $message ?: 'no-message',
        ])));

    }
}
