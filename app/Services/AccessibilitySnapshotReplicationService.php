<?php

namespace App\Services;

use App\Models\Pa11yAccessibilityIssue;
use App\Models\Pa11yStatistic;
use App\Models\Pa11yUrl;
use App\Models\Pa11yUrlFingerprint;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AccessibilitySnapshotReplicationService
{
    public function options(Pa11yUrl $url, string $command, array $options): array
    {
        return array_merge($options, [
            'snapshot_version' => 1,
            'command' => $command,
            'url' => $url->url,
            'contrast_errors' => (int) ($url->company?->settings?->contrast_errors ?? 0),
            'browser' => config('accessibility_scan.browser'),
            'axe_chrome_options' => getenv('AXE_CHROME_OPTIONS') ?: null,
            'pa11y_chrome_path' => getenv('PA11Y_CHROME_PATH') ?: null,
            'pa11y_chrome_args' => getenv('PA11Y_CHROME_ARGS') ?: null,
            'node_dependencies' => is_file(base_path('package-lock.json'))
                ? hash_file('sha256', base_path('package-lock.json')) : null,
        ]);
    }

    /** Only a completed scan of this fingerprint and these options may be reused. */
    public function replicateLatestSnapshot(
        Pa11yUrl $url,
        string $standard,
        ?Pa11yUrlFingerprint $fingerprint = null,
        array $options = []
    ): array {
        $empty = ['stats_copied' => 0, 'issues_copied' => 0];
        if (! $fingerprint?->fingerprint || (int) $fingerprint->url_id !== (int) $url->id
            || $fingerprint->standard !== normalizeWcagStandard($standard)) {
            return $empty;
        }

        $signature = $this->signature($options);
        $source = Pa11yUrlFingerprint::query()
            ->where('url_id', $url->id)
            ->where('standard', normalizeWcagStandard($standard))
            ->where('fingerprint', $fingerprint->fingerprint)
            ->where('decision_context->completed_snapshot->options_signature', $signature)
            ->orderByDesc('id')
            ->first();
        $snapshot = $source?->decision_context['completed_snapshot'] ?? null;
        if (! $this->isReusable($snapshot, $signature)) {
            return $empty;
        }

        return DB::transaction(function () use ($url, $standard, $fingerprint, $source, $snapshot) {
            $standard = normalizeWcagStandard($standard);
            $now = now();
            foreach ($snapshot['statistics'] as $attributes) {
                $existing = Pa11yStatistic::query()
                    ->where('url_id', $url->id)->where('standard', $standard)
                    ->where('wcag_level', $attributes['wcag_level'])
                    ->whereDate('scanned_at', $now)->orderBy('id')->first();
                $statistic = $existing ?? new Pa11yStatistic();
                $statistic->forceFill(array_merge($attributes, [
                    'url_id' => $url->id, 'company_id' => $url->company_id,
                    'standard' => $standard, 'scanned_at' => $now,
                ]))->save();
            }

            // Restore one complete result, including the valid zero-issues case.
            $issues = Pa11yAccessibilityIssue::query()->where('url_id', $url->id)
                ->where('standard', $standard);
            if ($standard === '2.0') {
                $issues->whereIn('wcag_level', $snapshot['levels']);
            }
            $issues->delete();
            foreach ($snapshot['issues'] as $attributes) {
                $issue = new Pa11yAccessibilityIssue();
                $issue->forceFill(array_merge($attributes, [
                    'url_id' => $url->id, 'standard' => $standard,
                    'created_at' => $now, 'updated_at' => $now,
                ]))->save();
            }

            $context = $fingerprint->decision_context ?? [];
            $context['reused_from_fingerprint_id'] = $source->id;
            $context['source_scanned_at'] = $snapshot['measured_at'];
            $fingerprint->update([
                'decision_action' => 'skip',
                'decision_reason' => 'completed_matching_scan',
                'decision_context' => $context,
            ]);
            return ['stats_copied' => count($snapshot['statistics']), 'issues_copied' => count($snapshot['issues'])];
        });
    }

    /** Called only after ALL requested scan parts and their persistence succeeded. */
    public function recordCompletedScan(Pa11yUrl $url, Pa11yUrlFingerprint $fingerprint, array $options, array $levels): void
    {
        if (! $fingerprint->fingerprint) {
            return;
        }
        DB::transaction(function () use ($url, $fingerprint, $options, $levels) {
            $statistics = [];
            foreach ($levels as $level) {
                $row = Pa11yStatistic::query()->where('url_id', $url->id)
                    ->where('standard', $fingerprint->standard)->where('wcag_level', $level)
                    ->orderByDesc('scanned_at')->orderByDesc('id')->first();
                if (! $row || $row->error_count === null || $row->warning_count === null || $row->notice_count === null) {
                    return;
                }
                $statistics[] = $row->only(['wcag_level', 'error_count', 'warning_count', 'notice_count']);
            }
            $issues = Pa11yAccessibilityIssue::query()->where('url_id', $url->id)
                ->where('standard', $fingerprint->standard);
            if ($fingerprint->standard === '2.0') {
                $issues->whereIn('wcag_level', $levels);
            }
            $context = $fingerprint->decision_context ?? [];
            $context['completed_snapshot'] = [
                'options_signature' => $this->signature($options),
                'measured_at' => now()->toIso8601String(),
                'levels' => array_values($levels),
                'statistics' => $statistics,
                'issues' => $issues->get()->map(fn ($row) => $row->only([
                    'issue', 'selector', 'wcag_level', 'code', 'type', 'typeCode',
                    'context', 'runner', 'runnerExtras',
                ]))->all(),
            ];
            $fingerprint->update([
                'decision_action' => 'scan', 'decision_reason' => 'scan_completed',
                'decision_context' => $context,
            ]);
        });
    }

    public function signature(array $options): string
    {
        return hash('sha256', json_encode($options, JSON_THROW_ON_ERROR));
    }

    public function isReusable(?array $snapshot, string $signature): bool
    {
        if (! $snapshot || ($snapshot['options_signature'] ?? null) !== $signature
            || empty($snapshot['statistics']) || empty($snapshot['levels'])
            || ! isset($snapshot['issues']) || ! is_array($snapshot['issues'])
            || empty($snapshot['measured_at'])) {
            return false;
        }
        $measuredAt = Carbon::parse($snapshot['measured_at']);
        return $measuredAt->lte(now()) && $measuredAt->gt(now()->subMinutes(
            (int) config('accessibility_scan.fingerprint.stale_after_minutes', 10080)
        ));
    }
}
