<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Pa11yUrl;
use App\Models\Pa11yAccessibilityIssue;
use App\Models\Pa11yStatistic;

class ScanAccessibility extends Command
{
    protected $signature = 'scan:accessibility {urls?*} {--levels=A,AA,AAA} {--standard=2.0} {--notices} {--no-notices} {--warnings} {--no-warnings}';
    protected $description = 'Scan URLs for accessibility issues';

    public function handle()
    {
        $urls = $this->argument('urls') ? Pa11yUrl::whereIn('id', (array)$this->argument('urls'))->get() : Pa11yUrl::all();
        $levels = explode(',', $this->option('levels'));
        $standard = $this->option('standard');
        $includeNotices = $this->option('notices') !== null;
        $includeWarnings = $this->option('warnings') !== null;

        if ($this->option('no-notices')) {
            $includeNotices = false;
        }

        if ($this->option('no-warnings')) {
            $includeWarnings = false;
        }

        foreach ($urls as $url) {
            $this->info("Scanning {$url->url} with standard WCAG {$standard}...");

            $this->deleteOldIssues($url->id,$standard);

            if ($standard == '2.1') {
                $this->scanWithAxe($url, $includeWarnings, $includeNotices);
            } else {
                $this->scanWithHtmlcs($url, $levels, $includeWarnings, $includeNotices);
            }

            $url->update(['last_checked' => now()]);
        }

        $this->info('All URLs have been scanned.');
    }

    private function scanWithAxe($url, $includeWarnings, $includeNotices)
    {
        $processArgs = [
            'pa11y', $url->url,
            '--runner', 'axe',
            '--reporter', 'json',
        ];

        if ($includeWarnings) {
            $processArgs[] = '--include-warnings';
        }

        $command = implode(' ', $processArgs);
        $this->info("Executing: $command");
        $output = shell_exec($command . ' 2>&1');
        $results = json_decode($output, true);

        if ($includeNotices) {
            $this->info("Performing additional scan for WCAG 2.0 AAA Notices...");
            $this->scanHtmlcsForNotices($url);
        }

        $this->storeResults($url, '2.1', 'axe', $results);
        $this->updateStats($url, '2.1', $results);
    }

    private function scanWithHtmlcs($url, $levels, $includeWarnings, $includeNotices)
    {
        foreach ($levels as $level) {
            $processArgs = [
                'pa11y', $url->url,
                '--reporter', 'json',
                '--standard', "WCAG2{$level}",
            ];

            if ($includeWarnings) {
                $processArgs[] = '--include-warnings';
            }
            if ($includeNotices) {
                $processArgs[] = '--include-notices';
            }

            $command = implode(' ', $processArgs);
            $this->info("Executing: $command");
            $output = shell_exec($command . ' 2>&1');
            $results = json_decode($output, true);

            $this->storeResults($url, "2.0", 'htmlcs', $results, $level);
            $this->updateStats($url, "2.0", $results, $level);
        }
    }

    private function scanHtmlcsForNotices($url)
    {
        $processArgs = [
            'pa11y', $url->url,
            '--runner', 'htmlcs',
            '--reporter', 'json',
            '--standard', 'WCAG2AAA',
            '--include-notices',
        ];

        $command = implode(' ', $processArgs);
        $this->info("Executing: $command");
        $output = shell_exec($command . ' 2>&1');
        $results = json_decode($output, true);

        if (empty($results)) {
            $this->warn("No notices found for {$url->url} (WCAG2AAA).");
        } else {
            $this->storeResults($url, "2.0", 'htmlcs', $results, 'AAA');
            $this->updateStats($url, "2.0", $results, 'AAA');
        }
    }

    private function storeResults($url, $standard, $runner, $results, $level = null)
    {
        $this->info("Storing results for {$url->url} (Standard: WCAG {$standard}, Level: {$level}).");

        foreach ($results as $result) {
            $wcagStandard = $standard;

            // Falls WCAG 2.1 und zusätzlicher Notice-Scan, die Notices als 2.1 simulieren
            if ($standard === '2.0' && $runner === 'htmlcs' && $level === 'AAA') {
                $wcagStandard = '2.1';
            }

            Pa11yAccessibilityIssue::create([
                'url_id' => $url->id,
                'issue' => $result['message'] ?? null,
                'selector' => $result['selector'] ?? null,
                'wcag_level' => $level,
                'code' => $result['code'] ?? null,
                'type' => $result['type'] ?? null,
                'typeCode' => $result['typeCode'] ?? null,
                'context' => $result['context'] ?? null,
                'runner' => $runner,
                'runnerExtras' => json_encode($result['runnerExtras'] ?? []),
                'standard' => $wcagStandard,
            ]);
        }

        $this->info("Results stored for {$url->url} (Standard: WCAG {$standard}, Level: {$level}).");
    }

    private function updateStats($url, $standard, $results, $level = null)
    {
        $totalErrors = count(array_filter($results, fn($r) => $r['type'] === 'error'));
        $totalWarnings = count(array_filter($results, fn($r) => $r['type'] === 'warning'));
        $totalNotices = count(array_filter($results, fn($r) => $r['type'] === 'notice'));

        // Falls WCAG 2.0 AAA-Durchlauf, füge Notices zu WCAG 2.1 hinzu
        if ($standard === '2.0' && $level === 'AAA') {
            $standard = '2.1';
            $level = 'combined';
        }

        Pa11yStatistic::updateOrCreate(
            [
                'company_id' => $url->company_id,
                'url_id' => $url->id,
                'standard' => $standard,
                'wcag_level' => $level,
            ],
            [
                'error_count' => $totalErrors,
                'warning_count' => $totalWarnings,
                'notice_count' => $totalNotices,
                'scanned_at' => now(),
            ]
        );

        $this->info("Statistics updated for {$url->url} (Standard: WCAG {$standard}, Level: {$level}).");
    }

    private function deleteOldIssues($urlId, $standard, $level = null)
    {
        $query = Pa11yAccessibilityIssue::where('url_id', $urlId)
            ->where('standard', $standard);

        if ($level) {
            $query->where('wcag_level', $level);
        }

        $this->info("Query: " . $query->toSql()); // Debugging der SQL-Query
        $this->info("Bindings: " . json_encode($query->getBindings())); // Debugging der Bindings

        $deletedCount = $query->delete();

        $this->info("Deleted $deletedCount old issues for URL ID: {$urlId}, Standard: {$standard}, Level: {$level}");
    }

}
