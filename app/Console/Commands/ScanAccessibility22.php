<?php

namespace App\Console\Commands;

use App\Services\AccessibilityFingerprintService;
use App\Services\AccessibilitySnapshotReplicationService;
use Illuminate\Console\Command;
use App\Models\Pa11yUrl;
use App\Models\Pa11yAccessibilityIssue;
use App\Models\Pa11yStatistic;
use App\Models\CompanySetting;
use Illuminate\Support\Facades\File;

/**
 * Accessibility Scan Command
 *
 * php artisan scan:accessibility {urls?*} --standard=21|22
 */
class ScanAccessibility22 extends Command
{
    private array $pa11yTempProfiles = [];

    protected $signature = 'scan:accessibility-22
        {urls?*}
        {--standard=21 : WCAG Version (21 oder 22)}
        {--warnings : Warnings bei WCAG 2.1 einbeziehen}
        {--skip-fingerprint : Skip fingerprint gate because determine:scan already handled it}';

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
            $normalizedStandard = $standard === '22' ? '2.2' : '2.1';
            if (! $this->option('skip-fingerprint')) {
                $fingerprint = app(AccessibilityFingerprintService::class)->captureForUrl($url, $normalizedStandard, [
                    'scanner' => 'scan:accessibility-22',
                    'scan_command' => 'scan:accessibility-22',
                    'decision_action' => 'scan',
                    'decision_reason' => 'manual_or_scheduled_scan',
                    'notes' => 'Standard option: ' . $standard,
                ]);

                if ($fingerprint->fingerprint_state === 'unchanged') {
                    $replication = app(AccessibilitySnapshotReplicationService::class)
                        ->replicateLatestSnapshot($url, $normalizedStandard);

                    if (($replication['stats_copied'] ?? 0) > 0 || ($replication['issues_copied'] ?? 0) > 0) {
                        $this->info("Fingerprint unchanged for {$url->url}; copied last snapshot instead of rescanning.");
                        $url->update(['last_checked' => now()]);
                        continue;
                    }

                    $this->warn("Fingerprint unchanged for {$url->url}, but no snapshot could be copied. Falling back to scan.");
                }
            }

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

        $browserPath = $this->resolvePa11yBrowserPath();
        $chromeOptions = getenv('AXE_CHROME_OPTIONS');
        if ($chromeOptions === false || $chromeOptions === '') {
            $chromeOptions = implode(',', array_map(
                fn (string $arg) => ltrim($arg, '-'),
                $this->resolvePa11yChromeArgs()
            ));
        }

        $parts = [
            'axe',
            escapeshellarg($url->url),
            '--tags',
            'wcag22aa',
            '--stdout',
            '--timeout',
            '180',
            '--browser',
            'chrome',
        ];

        if ($chromeOptions !== '') {
            $parts[] = '--chrome-options=' . escapeshellarg($chromeOptions);
        }

        $command = implode(' ', $parts);
        $command = implode(' ', [
            'PUPPETEER_EXECUTABLE_PATH=' . escapeshellarg($browserPath),
            'CHROME_PATH=' . escapeshellarg($browserPath),
            $command,
        ]);

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
        $browserPath = $this->resolvePa11yBrowserPath();
        $chromeArgs = $this->resolvePa11yChromeArgs();
        $configPath = $this->buildPa11yConfigFile($browserPath, $chromeArgs);

        $processArgs = [
            'pa11y',
            "'" . $url->url . "'",
            '--runner', 'axe',
            '--reporter', 'json',
        ];

        if ($configPath) {
            $processArgs[] = '--config';
            $processArgs[] = escapeshellarg($configPath);
        }

        if ($includeWarnings) {
            $processArgs[] = '--include-warnings';
        }

        $command = implode(' ', [
            'PUPPETEER_EXECUTABLE_PATH=' . escapeshellarg($browserPath),
            'CHROME_PATH=' . escapeshellarg($browserPath),
            'PA11Y_CHROME_PATH=' . escapeshellarg($browserPath),
            'PA11Y_CHROME_ARGS=' . escapeshellarg(implode(',', $chromeArgs)),
            implode(' ', $processArgs),
        ]);
        $this->info("Executing: $command");

        try {
            $output = shell_exec($command . ' 2>&1');

            if (empty($output) || !$this->isValidJson($output)) {
                throw new \Exception("pa11y hat keine gültige Ausgabe geliefert: " . substr($output ?? '', 0, 700));
            }

            return json_decode($output, true);
        } catch (\Exception $e) {
            \Log::error("Pa11y Scan-Fehler bei {$url->url}: " . $e->getMessage());
            return null;
        } finally {
            if ($configPath && is_file($configPath)) {
                @unlink($configPath);
            }

            $this->cleanupPa11yTempProfiles();
        }
    }

    private function resolvePa11yBrowserPath(): string
    {
        $configPath = config('accessibility_scan.browser.path');
        if (is_string($configPath) && $configPath !== '' && is_file($configPath)) {
            return $configPath;
        }

        $envPath = getenv('PA11Y_CHROME_PATH');
        if (is_string($envPath) && $envPath !== '' && is_file($envPath)) {
            return $envPath;
        }

        $candidates = $this->browserCandidates((string) config('accessibility_scan.browser.preference', 'auto'));

        foreach ($candidates as $candidate) {
            if (str_starts_with($candidate, '/')) {
                if (is_file($candidate)) {
                    return $candidate;
                }
                continue;
            }

            $resolved = trim((string) shell_exec('command -v ' . escapeshellarg($candidate)));
            if ($resolved !== '') {
                return $resolved;
            }
        }

        return 'google-chrome';
    }

    private function browserCandidates(string $preference): array
    {
        $preference = strtolower(trim($preference));

        $chromeCandidates = [
            '/Applications/Google Chrome.app/Contents/MacOS/Google Chrome',
            '/Applications/Google Chrome Canary.app/Contents/MacOS/Google Chrome Canary',
            'google-chrome',
            'google-chrome-stable',
            '/usr/bin/google-chrome',
            '/usr/bin/google-chrome-stable',
        ];

        $chromiumCandidates = [
            'chromium-browser',
            'chromium',
            '/usr/bin/chromium-browser',
            '/usr/bin/chromium',
            '/snap/bin/chromium',
            '/opt/homebrew/bin/chromium',
        ];

        return match ($preference) {
            'chrome' => array_merge($chromeCandidates, $chromiumCandidates),
            'chromium' => array_merge($chromiumCandidates, $chromeCandidates),
            default => PHP_OS_FAMILY === 'Darwin'
                ? array_merge($chromeCandidates, $chromiumCandidates)
                : array_merge($chromiumCandidates, $chromeCandidates),
        };
    }

    private function resolvePa11yChromeArgs(): array
    {
        $envArgs = getenv('PA11Y_CHROME_ARGS');
        if (is_string($envArgs) && trim($envArgs) !== '') {
            return array_values(array_filter(array_map('trim', explode(',', $envArgs))));
        }

        return array_values(array_filter(config('accessibility_scan.browser.args', [])));
    }

    private function buildPa11yConfigFile(string $browserPath, array $chromeArgs): ?string
    {
        $userDataDir = false;
        if ((bool) config('accessibility_scan.browser.use_temp_profile', true)) {
            $userDataDir = tempnam(sys_get_temp_dir(), 'pa11y-profile-');
            if ($userDataDir !== false) {
                @unlink($userDataDir);
                @mkdir($userDataDir, 0700, true);
                $this->pa11yTempProfiles[] = $userDataDir;
            }
        }

        $config = [
            'chromeLaunchConfig' => [
                'executablePath' => $browserPath,
                'ignoreHTTPSErrors' => true,
            ],
        ];

        if ($userDataDir !== false && is_dir($userDataDir)) {
            $config['chromeLaunchConfig']['userDataDir'] = $userDataDir;
        }

        if (!empty($chromeArgs)) {
            $config['chromeLaunchConfig']['args'] = array_values($chromeArgs);
        }

        $path = tempnam(sys_get_temp_dir(), 'pa11y-config-');
        if ($path === false) {
            return null;
        }

        $json = json_encode($config, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
        $contents = $json === false ? false : 'module.exports = ' . $json . ';' . PHP_EOL;
        if ($contents === false || file_put_contents($path, $contents) === false) {
            @unlink($path);
            return null;
        }

        return $path;
    }

    private function cleanupPa11yTempProfiles(): void
    {
        foreach (array_unique($this->pa11yTempProfiles) as $profilePath) {
            if (! $this->isOwnPa11yTempProfile($profilePath)) {
                continue;
            }

            try {
                File::deleteDirectory($profilePath);
            } catch (\Throwable $exception) {
                \Log::warning('Could not delete pa11y temp profile.', [
                    'path' => $profilePath,
                    'message' => $exception->getMessage(),
                ]);
            }
        }

        $this->pa11yTempProfiles = [];
    }

    private function isOwnPa11yTempProfile(string $profilePath): bool
    {
        $tempDir = realpath(sys_get_temp_dir());
        $profileRealPath = realpath($profilePath);

        return $tempDir !== false
            && $profileRealPath !== false
            && dirname($profileRealPath) === $tempDir
            && str_starts_with(basename($profileRealPath), 'pa11y-profile-')
            && is_dir($profileRealPath);
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
