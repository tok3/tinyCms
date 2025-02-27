<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Company;
use App\Models\CompanyScanLog;
use App\Models\CompanySetting;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Artisan;
class DetermineScan extends Command
{
    protected $signature = 'determine:scan';
    protected $description = 'Determine which companies need a full scan based on their last scan logs';

    public function handle()
    {
        // Get companies that have URLs and need a scan
        $companiesToScan = Company::whereHas('pa11yUrls')
            ->where(function ($query) {
                $query->whereDoesntHave('scanLogs') // Nie zuvor gescannt
                ->orWhereHas('scanLogs', function ($subQuery) {
                    $subQuery->where('scan_type', 'full')
                        ->whereRaw('scanned_at = (SELECT MAX(scanned_at) FROM company_scan_logs WHERE company_id = companies.id)')
                        ->whereHas('company', function ($companyQuery) {
                            $companyQuery->whereHas('settings', function ($settingsQuery) {
                                $settingsQuery->whereRaw('scanned_at <= NOW() - INTERVAL
                                CASE
                                    WHEN full_scan_interval = "daily" THEN 1
                                    WHEN full_scan_interval = "weekly" THEN 7
                                    ELSE 30
                                END DAY');
                            });
                        });
                });
            })
            ->get();

        if ($companiesToScan->isEmpty()) {
            $this->info("✅ No companies need a full scan today.");
            return;
        }

        $this->info("📢 Scanning " . count($companiesToScan) . " companies.");

        // Start scanning & log results
        foreach ($companiesToScan as $company) {
            // Get the company's scan standard setting
            $defaultStandard = $company->settings->default_standard ?? '2.1';

            // Get all URL IDs belonging to this company
            $urlIds = $company->pa11yUrls()->pluck('id')->toArray();

            if (empty($urlIds)) {
                $this->info("Skipping Company ID {$company->id} - No URLs found.");
                continue;
            }

            // Determine which scan command to use
            $scanCommand = $defaultStandard === '2.0' ? 'scan:accessibility' : 'scan:accessibility-21';

            // Trigger the correct scan command
            Artisan::call($scanCommand, ['urls' => $urlIds]);

            // Update or Create Scan Log
            CompanyScanLog::updateOrCreate(
                ['company_id' => $company->id, 'scan_type' => 'full'],
                ['scanned_at' => now()]
            );

            $this->info("✅ Company ID {$company->id} scanned successfully using WCAG {$defaultStandard}.");
        }

        $this->info("✅ Full scan process completed.");
    }
}
