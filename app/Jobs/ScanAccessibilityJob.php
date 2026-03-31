<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Pa11yUrl;
use App\Models\Pa11yAccessibilityIssue;
use App\Models\Pa11yStatistic;
use App\Models\CompanySetting;

class ScanAccessibilityJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $tries = 3;           // Retry up to 3 times if it fails
    public $timeout = 300;

    protected int $pa11yUrlId;

    /**
     * Create a new job instance.
     */
    public function __construct(int $pa11yUrlId)
    {
        $this->pa11yUrlId = $pa11yUrlId;
        $this->onQueue('accessibility');   // put it on a dedicated queue
    }



    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $pa11yUrl = Pa11yUrl::findOrFail($this->pa11yUrlId);

        \Log::info("Starting accessibility scan for URL: {$pa11yUrl->url}");
        //$includeWarnings = $this->option('warnings') !== null;
        $includeWarnings = true;



        \Log::info("Scanning {$pa11yUrl->url} with WCAG 2.1 standard...");

        $this->deleteOldIssues($pa11yUrl->id);
        $results = $this->scanWithAxe($pa11yUrl, $includeWarnings);

        if ($results !== null) {

            $this->storeResults($pa11yUrl, $results);
        }
        $this->updateStats($pa11yUrl, $results);

        $pa11yUrl->update(['last_checked' => now()]);
        \Log::info("Finished scanning {$pa11yUrl->url} with WCAG 2.1.");
    }

      private function scanWithAxe($url, $includeWarnings)
    {
        /*
        $processArgs = [
            'pa11y',
            $url->url,
            '--runner',
            'axe',
            '--reporter',
            'json',
        ];
        */

        $processArgs = [
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

        \Log::info("Executing: $command");

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

        \Log::info("Results stored for {$url->url} (Standard: WCAG 2.1).");
    }

    private function deleteOldIssues($urlId)
    {
        Pa11yAccessibilityIssue::where('url_id', $urlId)
            ->where('standard', '2.1')
            ->delete();

        \Log::info("Deleted old issues for URL ID: {$urlId} (Standard: WCAG 2.1).");
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
