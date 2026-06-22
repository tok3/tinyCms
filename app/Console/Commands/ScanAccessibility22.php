<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Pa11yUrl;
use App\Models\Pa11yAccessibilityIssue;
use App\Models\Pa11yStatistic;
use App\Models\CompanySetting;

/**
 * Accessibility Scan Command
 *
 * php artisan scan:accessibility {urls?*} --standard=21|22
 */
class ScanAccessibility22 extends Command
{
    protected $signature = 'scan:accessibility-22
        {urls?*}
        {--standard=21 : WCAG Version (21 oder 22)}
        {--warnings : Warnings bei WCAG 2.1 einbeziehen}';

    protected $description = 'Scan URLs for accessibility issues (WCAG 2.1 mit pa11y | WCAG 2.2 mit axe CLI)';

    public function handle()
    {
        $standard = (string) $this->option('standard');
        $standard = in_array($standard, ['21', '22'], true) ? $standard : '21';
        $urls = $this->argument('urls')
            ? Pa11yUrl::whereIn('id', (array) $this->argument('urls'))->get()
            : Pa11yUrl::all();

        if (!in_array($standard, ['21', '22'])) {
            $this->error("Ungültiger Standard. Nur 21 oder 22 erlaubt.");
            return 1;
        }

        foreach ($urls as $url) {
            $this->info("Scanning {$url->url} with WCAG {$standard}...");

            $this->deleteOldIssues($url->id, $standard);

            if ($standard === '22') {
                // Kombinierter Scan für WCAG 2.2
                $results1 = $this->scanWithAxeCliCombined($url) ?? [];

                $includeWarnings = $this->option('warnings') !== null;
                $results2 = $this->scanWithPa11y($url, $includeWarnings) ?? [];
                $results = array_merge($results1, $results2);

                if (empty($results1) && empty($results2)) {
                    $results = null;
                }

            } else {
                // WCAG 2.1 bleibt bei pa11y
                $includeWarnings = $this->option('warnings') !== null;
                $results = $this->scanWithPa11y($url, $includeWarnings);
            }

            if ($results !== null) {
                $this->storeResults($url, $results, $standard);
            }

            $this->updateStats($url, $results, $standard);

            $url->update(['last_checked' => now()]);
            $this->info("Finished scanning {$url->url} with WCAG {$standard}.");
        }

        $this->info('All URLs have been scanned.');
    }

    // ====================== WCAG 2.2 – Kombinierter axe Scan ======================
    private function scanWithAxeCliCombined($url)
    {
        $this->info("Scanning {$url->url} with axe CLI (wcag21aa + wcag22aa)...");

        $command = sprintf(
            "axe '%s' --tags wcag22aa --stdout --timeout 180",
            addslashes($url->url)
        );

        $this->info("Executing: $command");

        try {
            $output = shell_exec($command . ' 2>&1');

            if (empty($output) || !$this->isValidJson($output)) {
                $this->error("Axe Output: " . substr($output ?? '', 0, 700));
                throw new \Exception("Axe CLI hat keine gültige JSON-Ausgabe geliefert");
            }

            $fullResults = json_decode($output, true);
            $violations = $fullResults[0]['violations'] ?? $fullResults['violations'] ?? [];

            return $this->normalizeAxeResults($violations);
        } catch (\Exception $e) {
            \Log::error("Axe CLI Scan-Fehler bei {$url->url}: " . $e->getMessage());
            return null;
        }
    }

    /**
     * Normalisiert axe Violations für WCAG 2.2
     */
    private function normalizeAxeResults(array $violations): array
    {
        $normalized = [];
        $seen = [];

        foreach ($violations as $violation) {
            foreach ($violation['nodes'] as $node) {
                $selector = $node['selector'][0] ?? $node['selector'] ?? '';

                // Einfache Deduplizierung
                $key = $violation['id'] . '|' . $selector;
                if (isset($seen[$key])) {
                    continue;
                }
                $seen[$key] = true;

                $normalized[] = [
                    'message'      => $violation['help'] ?? $violation['description'],
                    'selector'     => $selector,
                    'code'         => $violation['id'],
                    'type'         => 'error',
                    'typeCode'     => 1,
                    'context'      => $node['html'] ?? null,
                    'runnerExtras' => [
                        'impact'      => $violation['impact'],
                        'description' => $violation['description'],
                        'helpUrl'     => $violation['helpUrl'] ?? null,
                        'tags'        => $violation['tags'] ?? [],
                    ],
                ];
            }
        }

        return $normalized;
    }

    // ====================== WCAG 2.1 – pa11y ======================
    private function scanWithPa11y($url, bool $includeWarnings)
    {
        $processArgs = [
            'pa11y',
            "'" . $url->url . "'",
            '--runner', 'axe',
            '--reporter', 'json',
        ];

        if ($includeWarnings) {
            $processArgs[] = '--include-warnings';
        }

        $command = implode(' ', $processArgs);
        $this->info("Executing: $command");

        try {
            $output = shell_exec($command . ' 2>&1');

            if (empty($output) || !$this->isValidJson($output)) {
                throw new \Exception("pa11y hat keine gültige Ausgabe geliefert");
            }

            return json_decode($output, true);
        } catch (\Exception $e) {
            \Log::error("Pa11y Scan-Fehler bei {$url->url}: " . $e->getMessage());
            return null;
        }
    }

    private function isValidJson(string $string): bool
    {
        json_decode($string);
        return json_last_error() === JSON_ERROR_NONE;
    }

    // ====================== Speichern & Stats ======================
    private function deleteOldIssues($urlId, string $standard)
    {
        $std = $standard === '22' ? '2.2' : '2.1';

        Pa11yAccessibilityIssue::where('url_id', $urlId)
            ->where('standard', $std)
            ->delete();

        $this->info("Deleted old issues for URL ID: {$urlId} (WCAG {$standard}).");
    }

    private function storeResults($url, array $results, string $standard)
    {
        $std = $standard === '22' ? '2.2' : '2.1';

        foreach ($results as $result) {
            Pa11yAccessibilityIssue::create([
                'url_id'       => $url->id,
                'issue'        => $result['message'] ?? null,
                'selector'     => $result['selector'] ?? null,
                'code'         => $result['code'] ?? null,
                'type'         => $result['type'] ?? 'error',
                'typeCode'     => $result['typeCode'] ?? 1,
                'context'      => $result['context'] ?? null,
                'runner'       => 'axe',
                'runnerExtras' => json_encode($result['runnerExtras'] ?? []),
                'standard'     => $std,
            ]);
        }

        $this->info("Results stored for {$url->url} (WCAG {$standard}) – " . count($results) . " issues.");
    }

    private function updateStats(Pa11yUrl $url, ?array $results, string $standard)
    {
        $std = $standard === '22' ? '2.2' : '2.1';
        $currentTimestamp = now();

        if ($results === null) {
            $this->saveOrUpdateStat($url, $std, null, null, null, $currentTimestamp);
            return;
        }

        if (empty($results)) {
            $this->saveOrUpdateStat($url, $std, 0, 0, 0, $currentTimestamp);
            return;
        }

        $companySetting = CompanySetting::where('company_id', $url->company_id)->first();
        $showContrast = $companySetting?->contrast_errors == 1;

        if ($showContrast) {
            $errors   = count(array_filter($results, fn($r) => ($r['type'] ?? '') === 'error'));
            $warnings = count(array_filter($results, fn($r) => ($r['type'] ?? '') === 'warning'));
            $notices  = count(array_filter($results, fn($r) => ($r['type'] ?? '') === 'notice'));
        } else {
            $errors = collect($results)
                ->where('type', 'error')
                ->whereNotIn('code', ['color-contrast', 'color-contrast-enhanced'])
                ->count();

            $warnings = collect($results)
                ->where('type', 'warning')
                ->whereNotIn('code', ['color-contrast', 'color-contrast-enhanced'])
                ->count();

            $notices = collect($results)
                ->where('type', 'notice')
                ->whereNotIn('code', ['color-contrast', 'color-contrast-enhanced'])
                ->count();
        }

        $this->saveOrUpdateStat($url, $std, $errors, $warnings, $notices, $currentTimestamp);
    }

    private function saveOrUpdateStat(Pa11yUrl $url, string $std, $errorCount, $warningCount, $noticeCount, $timestamp)
    {
        $existing = Pa11yStatistic::where('url_id', $url->id)
            ->where('standard', $std)
            ->whereDate('scanned_at', now())
            ->first();

        if ($existing) {
            $existing->update([
                'error_count'   => $errorCount,
                'warning_count' => $warningCount,
                'notice_count'  => $noticeCount,
                'scanned_at'    => $timestamp,
            ]);
        } else {
            Pa11yStatistic::create([
                'url_id'        => $url->id,
                'standard'      => $std,
                'wcag_level'    => 'combined',
                'company_id'    => $url->company_id,
                'error_count'   => $errorCount,
                'warning_count' => $warningCount,
                'notice_count'  => $noticeCount,
                'scanned_at'    => $timestamp,
            ]);
        }
    }
}
