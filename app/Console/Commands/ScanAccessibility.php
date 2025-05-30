<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Pa11yUrl;
use App\Models\Pa11yAccessibilityIssue;
use App\Models\Pa11yStatistic;
use Symfony\Component\Process\Process;
use App\Models\CompanySetting;
class ScanAccessibility extends Command
{

    // Signature mit den zusätzlichen Optionen: URLs, Levels, Notices und Warnings
    protected $signature = 'scan:accessibility {urls?*} {--levels=A,AA,AAA} {--notices} {--no-notices} {--warnings} {--no-warnings}';
    protected $description = 'Scan URLs for accessibility issues';

    public function handle()
    {
        \Log::info('Received URLs:', [$this->argument('urls')]);
        \Log::info('Received Levels:', [$this->option('levels')]);

        // URLs holen, falls übergeben, ansonsten alle URLs
        $urls = $this->argument('urls') ? Pa11yUrl::whereIn('id', (array)$this->argument('urls'))->get() : Pa11yUrl::all();

        // Levels holen (Option: z.B. A, AA, AAA)
        $levels = explode(',', $this->option('levels'));

        // Standardmäßig Notices und Warnings sind an, aber sie können über die Optionen ausgeschaltet werden
        $includeNotices = $this->option('notices') !== null;
        $includeWarnings = $this->option('warnings') !== null;

        // Wenn --no-notices oder --no-warnings übergeben wird, die entsprechenden Optionen deaktivieren
        if ($this->option('no-notices'))
        {
            $includeNotices = false;
        }

        if ($this->option('no-warnings'))
        {
            $includeWarnings = false;
        }

        // Scannen der URLs und Levels
        foreach ($urls as $url)
        {
            $this->info("Scanning -> {$url->url}...");

            foreach ($levels as $level)
            {
                $this->info("Scanning {$url->url} for Level {$level}...");

                // Befehl zusammenstellen
                $processArgs = [
                    'pa11y', // Pa11y-Befehl mit dem absoluten Pfad
                    $url->url, // Die zu scannende URL
                    '--reporter', 'json', // JSON-Ausgabe
                    '--standard', "WCAG2{$level}"  // WCAG Level (z.B. A, AA, AAA)
                ];

                if ($includeNotices)
                {
                    $processArgs[] = '--include-notices';
                }

                if ($includeWarnings)
                {
                    $processArgs[] = '--include-warnings';
                }

                $command = implode(' ', $processArgs);
//               $command = 'PATH=/usr/bin:' . getenv('PATH') . ' /usr/bin/pa11y ' . $url->url . ' --reporter json --standard WCAG2' . $level;
//                $output = shell_exec($command . ' 2>&1'); // Fehler und Standardausgabe zusammen
//                \Log::info('pa11y output: ' . $output);
                $output = shell_exec($command);
                // Ergebnisse parsen
                $results = json_decode($output, true);

                $jsonLength = strlen($output);
                \Log::info('JSON result length:', [$jsonLength]);


                if (empty($results))
                {
                    $this->error("No results for {$url->url} (Level: {$level})");
                    continue;
                }

                // Alte Probleme für dieses Level löschen
                $url->accessibilityIssues()
                    ->where('wcag_level', $level)
                    ->delete();

                // Speichern der neuen Probleme
                foreach ($results as $result)
                {
                    Pa11yAccessibilityIssue::create([
                        'url_id' => $url->id,
                        'issue' => $result['message'] ?? null,
                        'selector' => $result['selector'] ?? null,
                        'wcag_level' => $level,
                        'code' => $result['code'] ?? null,
                        'type' => $result['type'] ?? null,
                        'typeCode' => $result['typeCode'] ?? null,
                        'context' => $result['context'] ?? null,
                        'runner' => $result['runner'] ?? null,
                        'runnerExtras' => json_encode($result['runnerExtras'] ?? []),
                    ]);
                }

                // Statistik berechnen und speichern
                $this->updateStats($url, $level, $results);
            }

            // Letztes Prüfdatum aktualisieren
            $url->update(['last_checked' => now()]);
            $this->info("Finished scanning {$url->url}");
        }

        $this->info('All URLs have been scanned.');

        return $jsonLength;
    }

    /**
     * Statistik für den aktuellen Scan berechnen und speichern.
     */
    private function updateStats(Pa11yUrl $url, string $level, array $results)
    {
        $urlinfo = Pa11yUrl::where('id', $url->id)->first();
        $showContrastErrors = CompanySetting::where('company_id', $urlinfo->company_id)->first();
        $totalErrors = $totalWarnings = $totalNotices = 0;

        if(isset($showContrastErrors) && !empty($showContrastErrors) && $showContrastErrors->contrast_errors == 1){
            $totalErrors = count(array_filter($results, fn($r) => $r['type'] === 'error'));
            $totalWarnings = count(array_filter($results, fn($r) => $r['type'] === 'warning'));
            $totalNotices = count(array_filter($results, fn($r) => $r['type'] === 'notice'));
        } else {
            $totalErrors = collect($results)
                ->filter(fn($r) => $r['type'] === 'error' && $r['code'] !== 'color-contrast' && $r['code'] !== 'color-contrast-enhanced')
                ->count();
            $totalWarnings = collect($results)
                ->filter(fn($r) => $r['type'] === 'warning' && $r['code'] !== 'color-contrast' && $r['code'] !== 'color-contrast-enhanced')
                ->count();
            $totalNotices = collect($results)
                ->filter(fn($r) => $r['type'] === 'notice' && $r['code'] !== 'color-contrast' && $r['code'] !== 'color-contrast-enhanced')
                ->count();
        }
        // Prüfen, ob ein Snapshot für heute existiert
        $existingSnapshot = Pa11yStatistic::where('url_id', $url->id)
            ->where('wcag_level', $level)
            ->whereDate('scanned_at', now()->toDateString())
            ->first();

        // Wenn sich die Werte nicht geändert haben, überspringen
        if ($existingSnapshot &&
            $existingSnapshot->error_count == $totalErrors &&
            $existingSnapshot->warning_count == $totalWarnings &&
            $existingSnapshot->notice_count == $totalNotices)
        {
            $this->info("No changes detected for {$url->url} (Level: {$level}).");

            return;
        }

        // Neuer Snapshot erstellen
        Pa11yStatistic::create([
            'company_id' => $url->company_id,
            'url_id' => $url->id,
            'wcag_level' => $level,
            'standard' => '2.0',
            'error_count' => $totalErrors,
            'warning_count' => $totalWarnings,
            'notice_count' => $totalNotices,
            'scanned_at' => now(),
        ]);

        $this->info("New snapshot created for {$url->url} (Level: {$level}).");
    }
}
