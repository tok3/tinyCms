<?php

namespace App\Console\Commands;

use App\Models\Pa11yUrlFingerprint;
use App\Services\AccessibilityFingerprintService;
use App\Services\AccessibilityScanDecisionService;
use App\Services\AccessibilitySnapshotReplicationService;
use Illuminate\Console\Command;
use App\Models\Company;
use App\Models\CompanyScanLog;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Artisan;
class DetermineScan extends Command
{
    protected $signature = 'determine:scan';
    protected $description = 'Determine which companies need a full scan based on their last scan logs';

    public function handle()
    {
        $lockKey = (string) config('accessibility_scan.determine_scan.lock_key', 'determine:scan:lock');
        $lockTtl = (int) config('accessibility_scan.determine_scan.lock_ttl_seconds', 14400);
        $lockBehavior = (string) config('accessibility_scan.determine_scan.lock_behavior', 'skip');
        $waitSeconds = (int) config('accessibility_scan.determine_scan.wait_seconds', 0);
        $lock = Cache::lock($lockKey, $lockTtl);

        $acquired = false;

        try {
            $acquired = $lockBehavior === 'wait' && $waitSeconds > 0
                ? $lock->block($waitSeconds)
                : $lock->get();

            if (! $acquired) {
                $this->info("⏳ determine:scan läuft bereits und wird nicht parallel gestartet.");
                return 0;
            }

        // Get companies that have URLs and need a scan
        $companiesToScan = Company::whereHas('pa11yUrls')
            ->get()
            ->filter(fn (Company $company) => $this->companyNeedsFullScan($company))
            ->values();

        if ($companiesToScan->isEmpty()) {
            $this->info("✅ No companies need a full scan today.");
            return 0;
        }

        $this->info("📢 Scanning " . count($companiesToScan) . " companies.");
        $decisionService = app(AccessibilityScanDecisionService::class);
        $fingerprintService = app(AccessibilityFingerprintService::class);
        $replicationService = app(AccessibilitySnapshotReplicationService::class);

        // Start scanning & log results
        foreach ($companiesToScan as $company) {
            // Get the company's scan standard setting
            $defaultStandard = normalizeWcagStandard($company->settings?->default_standard ?? '2.1');
            $scanCommand = getWcagScanCommand($defaultStandard);

            $urls = $company->pa11yUrls()->get();

            if ($urls->isEmpty()) {
                $this->info("Skipping Company ID {$company->id} - No URLs found.");
                continue;
            }

            $plannedUrlIds = [];
            $skippedUrls = [];

            foreach ($urls as $url) {
                $fingerprint = $fingerprintService->captureForUrl($url, $defaultStandard, [
                    'scanner' => 'determine:scan',
                    'scan_command' => $scanCommand,
                    'decision_action' => 'pending',
                    'decision_reason' => 'determine_scan_fingerprint',
                    'notes' => 'Pre-scan fingerprint gate',
                ]);

                $decision = $decisionService->decideForUrl($url, $defaultStandard);
                $action = $decision['action'] ?? 'scan';
                $reason = $decision['reason'] ?? 'no_reason';
                $this->recordFingerprintDecision($fingerprint, $decision);

                if ($action === 'scan') {
                    $plannedUrlIds[] = $url->id;
                    continue;
                }

                $replication = $replicationService->replicateLatestSnapshot($url, $defaultStandard);
                if (($replication['stats_copied'] ?? 0) === 0 && ($replication['issues_copied'] ?? 0) === 0) {
                    $plannedUrlIds[] = $url->id;
                    $this->warn("Fingerprint unchanged for URL {$url->id} ({$url->url}), but no snapshot could be copied. Falling back to scan.");
                    continue;
                }

                $url->update(['last_checked' => now()]);
                $skippedUrls[] = [
                    'url_id' => $url->id,
                    'url' => $url->url,
                    'reason' => $reason,
                    'rule' => $decision['matched_rule'] ?? null,
                    'stats_copied' => $replication['stats_copied'] ?? 0,
                    'issues_copied' => $replication['issues_copied'] ?? 0,
                ];
            }

            if (!empty($skippedUrls)) {
                foreach ($skippedUrls as $skippedUrl) {
                    $this->info("↩️ Skipping URL {$skippedUrl['url_id']} ({$skippedUrl['url']}) - {$skippedUrl['reason']}" . ($skippedUrl['rule'] ? " [{$skippedUrl['rule']}]" : '') . " | copied stats={$skippedUrl['stats_copied']}, issues={$skippedUrl['issues_copied']}");
                }
            }

            if (empty($plannedUrlIds)) {
                $this->info("✅ Company ID {$company->id}: all URLs skipped by decision matrix.");

                CompanyScanLog::updateOrCreate(
                    ['company_id' => $company->id, 'scan_type' => 'full'],
                    ['scanned_at' => now()]
                );

                continue;
            }

            // Determine which scan command to use
            $arguments = [
                'urls' => $plannedUrlIds,
                '--skip-fingerprint' => true,
            ];

            if ($scanCommand === 'scan:accessibility-22') {
                $arguments['--standard'] = getWcagScanStandardOption($defaultStandard);
                $arguments['--warnings'] = true;
            }

            // Trigger the correct scan command
            Artisan::call($scanCommand, $arguments);

            // Update or Create Scan Log
            CompanyScanLog::updateOrCreate(
                ['company_id' => $company->id, 'scan_type' => 'full'],
                ['scanned_at' => now()]
            );

            $this->info("✅ Company ID {$company->id} scanned successfully using WCAG {$defaultStandard} for " . count($plannedUrlIds) . " URL(s).");
        }

        $this->info("✅ Full scan process completed.");

            return 0;
        } finally {
            if ($acquired) {
                try {
                    $lock->release();
                } catch (\Throwable $throwable) {
                    \Log::warning('Could not release determine:scan lock cleanly', [
                        'exception' => $throwable->getMessage(),
                    ]);
                }
            }
        }
    }

    private function companyNeedsFullScan(Company $company): bool
    {
        $latestFullScan = $company->scanLogs()
            ->where('scan_type', 'full')
            ->orderByDesc('scanned_at')
            ->first();

        if (! $latestFullScan?->scanned_at) {
            return true;
        }

        $intervalDays = match ($company->settings?->full_scan_interval ?? 'weekly') {
            'daily' => 1,
            'weekly' => 7,
            default => 30,
        };

        return $latestFullScan->scanned_at->lte(now()->subDays($intervalDays));
    }

    private function recordFingerprintDecision(Pa11yUrlFingerprint $fingerprint, array $decision): void
    {
        $context = $fingerprint->decision_context ?? [];
        $context['decision'] = [
            'action' => $decision['action'] ?? 'scan',
            'reason' => $decision['reason'] ?? 'no_reason',
            'matched_rule' => $decision['matched_rule'] ?? null,
        ];

        $fingerprint->update([
            'decision_action' => $decision['action'] ?? 'scan',
            'decision_reason' => $decision['reason'] ?? 'no_reason',
            'decision_context' => $context,
        ]);
    }
}
