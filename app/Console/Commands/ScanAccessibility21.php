<?php

namespace App\Console\Commands;

use App\Services\AccessibilityFingerprintService;
use App\Services\AccessibilitySnapshotReplicationService;
use Illuminate\Console\Command;
use App\Models\Pa11yUrl;
use App\Models\Pa11yAccessibilityIssue;
use App\Models\Pa11yStatistic;
use Symfony\Component\Process\Process;
use App\Models\CompanySetting;

/**
 * Einfacher Aufruf für alle URLs
 * php artisan scan:accessibility-21
 *
 * nur bestimmte URLs scannen
 * php artisan scan:accessibility-21 123 456 789
 *
 * mit der Option --warnings
 * php artisan scan:accessibility-21 --warnings
 */
class ScanAccessibility21 extends Command
{
    protected $signature = 'scan:accessibility-21 {urls?*} {--warnings} {--skip-fingerprint : Skip fingerprint gate because determine:scan already handled it}';
    protected $description = 'Scan URLs for accessibility issues using WCAG 2.1 (axe runner)';

    public function handle()
    {
        $urls = $this->argument('urls') ? Pa11yUrl::whereIn('id', (array)$this->argument('urls'))->get() : Pa11yUrl::all();
        $includeWarnings = $this->option('warnings') !== null;

        foreach ($urls as $url) {
            $this->info("Scanning {$url->url} with WCAG 2.1 standard...");
            if (! $this->option('skip-fingerprint')) {
                $fingerprint = app(AccessibilityFingerprintService::class)->captureForUrl($url, '2.1', [
                    'scanner' => 'scan:accessibility-21',
                    'scan_command' => 'scan:accessibility-21',
                    'decision_action' => 'scan',
                    'decision_reason' => 'manual_or_scheduled_scan',
                ]);

                if ($fingerprint->fingerprint_state === 'unchanged') {
                    $replication = app(AccessibilitySnapshotReplicationService::class)
                        ->replicateLatestSnapshot($url, '2.1');

                    if (($replication['stats_copied'] ?? 0) > 0 || ($replication['issues_copied'] ?? 0) > 0) {
                        $this->info("Fingerprint unchanged for {$url->url}; copied last snapshot instead of rescanning.");
                        $url->update(['last_checked' => now()]);
                        continue;
                    }

                    $this->warn("Fingerprint unchanged for {$url->url}, but no snapshot could be copied. Falling back to scan.");
                }
            }

            $this->deleteOldIssues($url->id);
            $results = $this->scanWithAxe($url, $includeWarnings);

            if ($results !== null) {

                $this->storeResults($url, $results);
            }
            $this->updateStats($url, $results);

            $url->update(['last_checked' => now()]);
            $this->info("Finished scanning {$url->url} with WCAG 2.1.");
        }

        $this->info('All URLs have been scanned.');
    }

    /*
    * before nice
    private function scanWithAxe($url, $includeWarnings)
    {


        $processArgs = [
            'nice', '-n', '15',
            'timeout', '240s',
            'cpulimit', '-l', '35', '--',
            'pa11y',
            "'".$url->url."'",
            '--runner',
            'axe',
            '--reporter',
            'json',
        ];

        if ($includeWarnings) {
            $processArgs[] = '--include-warnings';
        }

        $command = implode(' ', $processArgs);

        $this->info("Executing: $command");

        try {
            $output = shell_exec($command . ' 2>&1');

            // Überprüfe, ob die Antwort leer ist oder keine gültige JSON-Daten enthält
            if (empty($output) || !$this->isValidJson($output)) {
                throw new \Exception("⚠️ Scan fehlgeschlagen oder Seite nicht erreichbar: {$url->url}");
            }

            $results = json_decode($output, true);

            return $results;
        } catch (\Exception $e) {
            \Log::error("Scan-Fehler bei {$url->url}: " . $e->getMessage());
            return null; // Scan ist fehlgeschlagen
        }
    }
        */


private function scanWithAxe($url, $includeWarnings)
{
    $timeoutCommand = trim(shell_exec('command -v timeout')) ?: trim(shell_exec('command -v gtimeout'));
    $browserPath = $this->resolvePa11yBrowserPath();
    $chromeArgs = $this->resolvePa11yChromeArgs();
    $configPath = $this->buildPa11yConfigFile($browserPath, $chromeArgs);

    if (!$timeoutCommand) {
        throw new \Exception('Weder timeout noch gtimeout gefunden.');
    }

    $processArgs = [
        'nice',
        '-n',
        '15',
        escapeshellcmd($timeoutCommand),
        '240s',
        'cpulimit',
        '-q',
        '-l',
        '35',
        '--',
        'pa11y',
        escapeshellarg($url->url),
        '--runner',
        'axe',
        '--reporter',
        'json',
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
        exec($command . ' 2>/tmp/pa11y-error.log', $outputLines, $exitCode);
    } finally {
        if ($configPath && is_file($configPath)) {
            @unlink($configPath);
        }
    }

    $output = implode("\n", $outputLines);

    if ($exitCode === 124) {
        \Log::error("Timeout bei {$url->url}");
        return null;
    }

    if (empty($output) || !$this->isValidJson($output)) {
        $stderr = @file_get_contents('/tmp/pa11y-error.log');
        \Log::error("Scan fehlgeschlagen bei {$url->url}. ExitCode: {$exitCode}. STDOUT: " . substr($output, 0, 700) . " STDERR: " . substr((string) $stderr, 0, 700));
        return null;
    }

    return json_decode($output, true);
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


    /**
     * Prüft, ob eine Zeichenkette gültiges JSON ist
     */
    private function isValidJson($string)
    {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }
    private function storeResults($url, $results)
    {
        foreach ($results as $result) {
            Pa11yAccessibilityIssue::create([
                'url_id' => $url->id,
                'issue' => $result['message'] ?? null,
                'selector' => $result['selector'] ?? null,
                'code' => $result['code'] ?? null,
                'type' => $result['type'] ?? null,
                'typeCode' => $result['typeCode'] ?? null,
                'context' => $result['context'] ?? null,
                'runner' => 'axe',
                'runnerExtras' => json_encode($result['runnerExtras'] ?? []),
                'standard' => '2.1',
            ]);
        }

        $this->info("Results stored for {$url->url} (Standard: WCAG 2.1).");
    }

    private function deleteOldIssues($urlId)
    {
        Pa11yAccessibilityIssue::where('url_id', $urlId)
            ->where('standard', '2.1')
            ->delete();

        $this->info("Deleted old issues for URL ID: {$urlId} (Standard: WCAG 2.1).");
    }

    private function updateStats(Pa11yUrl $url, ?array $results)
    {
        $currentTimestamp = now(); // Speichert jetzt mit Uhrzeit

        // Fall 1: Scan fehlgeschlagen (z. B. Seite nicht erreichbar)
        if ($results === null) {
            \Log::warning("Scan für {$url->url} fehlgeschlagen. Statistik mit NULL gespeichert.");

            $existingStat = Pa11yStatistic::where('url_id', $url->id)
                ->where('standard', '2.1')
                ->whereDate('scanned_at', now()) // Prüft nur das Datum, ignoriert die Uhrzeit
                ->first();

            if ($existingStat) {
                $existingStat->update([
                    'error_count' => null,
                    'warning_count' => null,
                    'notice_count' => null,
                    'scanned_at' => $currentTimestamp, // Setzt den aktuellen Timestamp
                ]);
            } else {
                Pa11yStatistic::create([
                    'url_id' => $url->id,
                    'standard' => '2.1',
                    'wcag_level' => 'combined',
                    'company_id' => $url->company_id,
                    'error_count' => null,
                    'warning_count' => null,
                    'notice_count' => null,
                    'scanned_at' => $currentTimestamp,
                ]);
            }
            return;
        }

        // Fall 2: Scan erfolgreich, aber KEINE Fehler gefunden (leeres Array)
        if (empty($results)) {
            \Log::info("Perfekte Seite: {$url->url} ist fehlerfrei.");

            $existingStat = Pa11yStatistic::where('url_id', $url->id)
                ->where('standard', '2.1')
                ->whereDate('scanned_at', now())
                ->first();

            if ($existingStat) {
                $existingStat->update([
                    'error_count' => 0,
                    'warning_count' => 0,
                    'notice_count' => 0,
                    'scanned_at' => $currentTimestamp,
                ]);
            } else {
                Pa11yStatistic::create([
                    'url_id' => $url->id,
                    'standard' => '2.1',
                    'wcag_level' => 'combined',
                    'company_id' => $url->company_id,
                    'error_count' => 0,
                    'warning_count' => 0,
                    'notice_count' => 0,
                    'scanned_at' => $currentTimestamp,
                ]);
            }
            return;
        }
        $urlinfo = Pa11yUrl::where('id', $url->id)->first();
        $showContrastErrors = CompanySetting::where('company_id', $urlinfo->company_id)->first();
        $totalErrors = $totalWarnings = $totalNotices = 0;
        if(isset($showContrastErrors) && !empty($showContrastErrors) && $showContrastErrors->contrast_errors == 1){
            // Fall 3: Es gibt Fehler oder Warnungen
            $totalErrors = count(array_filter($results, fn($r) => isset($r['type']) && $r['type'] === 'error'));
            $totalWarnings = count(array_filter($results, fn($r) => isset($r['type']) && $r['type'] === 'warning'));
            $totalNotices = count(array_filter($results, fn($r) => isset($r['type']) && $r['type'] === 'notice'));
        } else {
            $totalErrors = collect($results)
                ->filter(fn($r) => isset($r['type']) && $r['type'] === 'error' && $r['code'] !== 'color-contrast' && $r['code'] !== 'color-contrast-enhanced')
                ->count();
            $totalWarnings = collect($results)
                ->filter(fn($r) => isset($r['type']) && $r['type'] === 'warning' && $r['code'] !== 'color-contrast' && $r['code'] !== 'color-contrast-enhanced')
                ->count();
            $totalNotices = collect($results)
                ->filter(fn($r) => isset($r['type']) && $r['type'] === 'notice' && $r['code'] !== 'color-contrast' && $r['code'] !== 'color-contrast-enhanced')
                ->count();
        }
        $existingStat = Pa11yStatistic::where('url_id', $url->id)
            ->where('standard', '2.1')
            ->whereDate('scanned_at', now())
            ->first();

        if ($existingStat) {
            $existingStat->update([
                'error_count' => $totalErrors,
                'warning_count' => $totalWarnings,
                'notice_count' => $totalNotices,
                'scanned_at' => $currentTimestamp,
            ]);
        } else {
            Pa11yStatistic::create([
                'url_id' => $url->id,
                'standard' => '2.1',
                'wcag_level' => 'combined',
                'company_id' => $url->company_id,
                'error_count' => $totalErrors,
                'warning_count' => $totalWarnings,
                'notice_count' => $totalNotices,
                'scanned_at' => $currentTimestamp,
            ]);
        }

        \Log::info("Scan für {$url->url} abgeschlossen. Fehler: {$totalErrors}, Warnungen: {$totalWarnings}");
    }
}
