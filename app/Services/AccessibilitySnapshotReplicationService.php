<?php

namespace App\Services;

use App\Models\Pa11yAccessibilityIssue;
use App\Models\Pa11yStatistic;
use App\Models\Pa11yUrl;
use Illuminate\Support\Facades\DB;

class AccessibilitySnapshotReplicationService
{
    public function replicateLatestSnapshot(Pa11yUrl $url, string $standard): array
    {
        $standard = normalizeWcagStandard($standard);
        $now = now();

        return DB::transaction(function () use ($url, $standard, $now) {
            $statsCopied = $this->copyLatestStatistics($url, $standard, $now);
            $issuesCopied = $this->copyLatestIssues($url, $standard, $now);

            return [
                'stats_copied' => $statsCopied,
                'issues_copied' => $issuesCopied,
                'standard' => $standard,
                'replicated_at' => $now->toIso8601String(),
            ];
        });
    }

    private function copyLatestStatistics(Pa11yUrl $url, string $standard, $now): int
    {
        $baseQuery = Pa11yStatistic::query()
            ->where('url_id', $url->id)
            ->where('standard', $standard);

        $latestScannedAt = (clone $baseQuery)->max('scanned_at');

        if (! $latestScannedAt) {
            return 0;
        }

        $sourceRows = (clone $baseQuery)
            ->where('scanned_at', $latestScannedAt)
            ->orderBy('id')
            ->get();

        $count = 0;

        foreach ($sourceRows as $sourceRow) {
            $copy = $sourceRow->replicate(['id', 'created_at', 'updated_at']);
            $copy->scanned_at = $now;
            $copy->created_at = $now;
            $copy->updated_at = $now;
            $copy->save();
            $count++;
        }

        return $count;
    }

    private function copyLatestIssues(Pa11yUrl $url, string $standard, $now): int
    {
        $baseQuery = Pa11yAccessibilityIssue::query()
            ->where('url_id', $url->id)
            ->where(function ($query) use ($standard) {
                if ($standard === '2.0') {
                    $query->whereNull('standard')
                        ->orWhere('standard', '2.0');
                    return;
                }

                $query->where('standard', $standard);
            });

        if ($standard !== '2.0') {
            return $this->copyLatestIssueRows($baseQuery, $now);
        }

        $levels = (clone $baseQuery)
            ->select('wcag_level')
            ->distinct()
            ->pluck('wcag_level')
            ->filter()
            ->values();

        $count = 0;

        foreach ($levels as $level) {
            $levelQuery = (clone $baseQuery)->where('wcag_level', $level);
            $latestCreatedAt = $levelQuery->max('created_at');

            if (! $latestCreatedAt) {
                continue;
            }

            $sourceRows = (clone $levelQuery)
                ->where('created_at', $latestCreatedAt)
                ->orderBy('id')
                ->get();

            foreach ($sourceRows as $sourceRow) {
                $copy = $sourceRow->replicate(['id', 'created_at', 'updated_at', 'deleted_at']);
                $copy->created_at = $now;
                $copy->updated_at = $now;
                $copy->save();
                $count++;
            }
        }

        return $count;
    }

    private function copyLatestIssueRows($baseQuery, $now): int
    {
        $latestCreatedAt = (clone $baseQuery)->max('created_at');

        if (! $latestCreatedAt) {
            return 0;
        }

        $sourceRows = (clone $baseQuery)
            ->where('created_at', $latestCreatedAt)
            ->orderBy('id')
            ->get();

        $count = 0;

        foreach ($sourceRows as $sourceRow) {
            $copy = $sourceRow->replicate(['id', 'created_at', 'updated_at', 'deleted_at']);
            $copy->created_at = $now;
            $copy->updated_at = $now;
            $copy->save();
            $count++;
        }

        return $count;
    }
}
