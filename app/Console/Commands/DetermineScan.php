<?php

namespace App\Console\Commands;

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

            // Each command checks the fingerprint under its per-URL lock immediately
            // before scanning. Planning must never make an unfinished scan reusable.
            $plannedUrlIds = $urls->pluck('id')->all();
            $arguments = ['urls' => $plannedUrlIds];

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

}
