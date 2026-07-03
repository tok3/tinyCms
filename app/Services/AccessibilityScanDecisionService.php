<?php

namespace App\Services;

use App\Models\Pa11yUrl;
use App\Models\Pa11yUrlFingerprint;
use Illuminate\Support\Carbon;

class AccessibilityScanDecisionService
{
    public function decideForUrl(Pa11yUrl $url, ?string $standard = null): array
    {
        $standard = normalizeWcagStandard($standard ?? getCurrentWcagStandard($url));
        $current = $this->loadLatestFingerprint($url, $standard);
        $previous = $this->loadPreviousFingerprint($url, $standard);

        $context = $this->buildContext($url, $standard, $current, $previous);

        return $this->evaluateMatrix(
            $context,
            config('accessibility_scan.decision_matrix', []),
            config('accessibility_scan.default_decision', [
                'action' => 'scan',
                'reason' => 'no_rule_matched',
            ])
        );
    }

    public function buildContext(
        Pa11yUrl $url,
        string $standard,
        ?Pa11yUrlFingerprint $current,
        ?Pa11yUrlFingerprint $previous
    ): array {
        $fingerprintScanDateField = (string) config('accessibility_scan.fingerprint.scan_date_field', 'fingerprint_scan_date');
        $windowMinutes = (int) config('accessibility_scan.fingerprint.scan_window_minutes', 60);
        $staleAfterMinutes = (int) config('accessibility_scan.fingerprint.stale_after_minutes', 10080);

        $scanDate = $current?->{$fingerprintScanDateField};
        $fingerprintValue = $current?->fingerprint;
        $previousValue = $previous?->fingerprint;

        $fingerprintState = match (true) {
            $current === null => 'missing',
            blank($fingerprintValue) || blank($scanDate) => 'undeterminable',
            $previous !== null && $previousValue === $fingerprintValue => 'unchanged',
            $previous !== null && $previousValue !== $fingerprintValue => 'changed',
            default => 'new',
        };

        $fingerprintAgeMinutes = null;
        $withinScanWindow = false;

        if ($scanDate instanceof Carbon) {
            $fingerprintAgeMinutes = max(0, (int) $scanDate->diffInMinutes(now()));
            $withinScanWindow = $fingerprintAgeMinutes <= $windowMinutes;

            if ($fingerprintAgeMinutes >= $staleAfterMinutes && in_array($fingerprintState, ['new', 'unchanged'], true)) {
                $fingerprintState = 'stale';
            }
        }

        return [
            'company_id' => $url->company_id,
            'url_id' => $url->id,
            'url' => $url->url,
            'standard' => $standard,
            'fingerprint_state' => $fingerprintState,
            'fingerprint' => $fingerprintValue,
            'previous_fingerprint' => $previousValue,
            'fingerprint_scan_date' => $scanDate,
            'fingerprint_age_minutes' => $fingerprintAgeMinutes,
            'within_scan_window' => $withinScanWindow,
            'fingerprint_source' => $current?->fingerprint_source,
            'fingerprint_model_id' => $current?->id,
        ];
    }

    public function evaluateMatrix(array $context, array $rules, array $defaultDecision): array
    {
        foreach ($rules as $rule) {
            if (! $this->ruleMatches($context, $rule['conditions'] ?? [])) {
                continue;
            }

            return [
                'action' => $rule['decision']['action'] ?? $defaultDecision['action'] ?? 'scan',
                'reason' => $rule['decision']['reason'] ?? $defaultDecision['reason'] ?? 'rule_matched',
                'matched_rule' => $rule['name'] ?? null,
                'context' => $context,
            ];
        }

        return [
            'action' => $defaultDecision['action'] ?? 'scan',
            'reason' => $defaultDecision['reason'] ?? 'no_rule_matched',
            'matched_rule' => null,
            'context' => $context,
        ];
    }

    private function ruleMatches(array $context, array $conditions): bool
    {
        foreach ($conditions as $condition) {
            $field = $condition['field'] ?? null;
            $operator = $condition['operator'] ?? 'eq';
            $expected = $condition['value'] ?? null;
            $actual = data_get($context, $field);

            if (! $this->matchesCondition($actual, $operator, $expected)) {
                return false;
            }
        }

        return true;
    }

    private function matchesCondition(mixed $actual, string $operator, mixed $expected): bool
    {
        return match ($operator) {
            'eq' => $actual === $expected,
            'neq' => $actual !== $expected,
            'in' => in_array($actual, (array) $expected, true),
            'not_in' => ! in_array($actual, (array) $expected, true),
            'gt' => $actual !== null && $expected !== null && $actual > $expected,
            'gte' => $actual !== null && $expected !== null && $actual >= $expected,
            'lt' => $actual !== null && $expected !== null && $actual < $expected,
            'lte' => $actual !== null && $expected !== null && $actual <= $expected,
            'exists' => ! blank($actual),
            'missing' => blank($actual),
            'between' => is_array($expected) && count($expected) === 2
                ? $actual !== null && $actual >= $expected[0] && $actual <= $expected[1]
                : false,
            default => false,
        };
    }

    private function loadLatestFingerprint(Pa11yUrl $url, string $standard): ?Pa11yUrlFingerprint
    {
        return Pa11yUrlFingerprint::query()
            ->where('url_id', $url->id)
            ->where('standard', $standard)
            ->orderByDesc('fingerprint_scan_date')
            ->orderByDesc('id')
            ->first();
    }

    private function loadPreviousFingerprint(Pa11yUrl $url, string $standard): ?Pa11yUrlFingerprint
    {
        return Pa11yUrlFingerprint::query()
            ->where('url_id', $url->id)
            ->where('standard', $standard)
            ->orderByDesc('fingerprint_scan_date')
            ->orderByDesc('id')
            ->skip(1)
            ->first();
    }
}
