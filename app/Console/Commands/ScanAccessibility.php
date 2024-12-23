<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use App\Models\Pa11yUrl;
use App\Models\Pa11yAccessibilityIssue;
use App\Models\Pa11yStatistic;

// Statistiken
use Symfony\Component\Process\Process;

class ScanAccessibility extends Command
{
    protected $signature = 'scan:accessibility {url?}';
    protected $description = 'Scan URLs for accessibility issues';

    public function handle($urls = [])
    {
        if (empty($urls)) {
            // Wenn keine URLs übergeben wurden, alle URLs scannen
            $urls = Pa11yUrl::all();
        }


        foreach ($urls as $url)
        {
            $this->info("Scanning -> {$url->url}...");

            foreach (['A', 'AA', 'AAA'] as $level)
            {
                $this->info("Scanning {$url->url} for Level {$level}...");

                $process = new Process([
                    'pa11y',
                    $url->url,
                    '--reporter', 'json',
                    '--reporter', 'json',
                    '--include-notices',
                    '--include-warnings',
                    '--standard', "WCAG2{$level}"
                ]);
                $process->run();

                $results = json_decode($process->getOutput(), true);

                if (empty($results))
                {
                    Log::warning("No results returned for {$url->url} (Level: {$level})");
                    $this->error("No results for {$url->url} (Level: {$level})");
                    continue;
                }

                Log::info("Pa11y succeeded for {$url->url} (Level: {$level})", [
                    'output' => $results
                ]);

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

            $url->update(['last_checked' => now()]);
            $this->info("Finished scanning {$url->url}");
        }

        $this->info('All URLs have been scanned.');
    }

    private function updateStats(Pa11yUrl $url, string $level, array $results)
    {
        $totalErrors = count(array_filter($results, fn($r) => $r['type'] === 'error'));
        $totalWarnings = count(array_filter($results, fn($r) => $r['type'] === 'warning'));
        $totalNotices = count(array_filter($results, fn($r) => $r['type'] === 'notice'));

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
            'error_count' => $totalErrors,
            'warning_count' => $totalWarnings,
            'notice_count' => $totalNotices,
            'scanned_at' => now(),
        ]);

        $this->info("New snapshot created for {$url->url} (Level: {$level}).");
    }
}
