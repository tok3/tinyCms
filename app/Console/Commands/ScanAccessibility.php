<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use App\Models\Pa11yUrl;
use App\Models\Pa11yAccessibilityIssue;
use Symfony\Component\Process\Process;

class ScanAccessibility extends Command
{
    // php artisan scan:accessibility

    protected $signature = 'scan:accessibility';
    protected $description = 'Scan URLs for accessibility issues';

    public function handle()
    {
        $urls = Pa11yUrl::all();

        foreach ($urls as $url) {
            $this->info("Scanning -> {$url->url}...");

            // Pa11y ausführen

            $process = new Process([
                'pa11y',
                $url->url,
                '--reporter', 'json',
                '--include-notices',
                '--include-warnings',
                '--standard', 'WCAG2AAA',
            ]);
            $process->run();

            // Ergebnisse parsen
            $results = json_decode($process->getOutput(), true);

            if (empty($results)) {
                Log::warning("No results returned for {$url->url}");
                $this->error("No results for {$url->url}");
                continue;
            }

            Log::info("Pa11y succeeded for {$url->url}", [
                'output' => $results
            ]);

            // Alte Probleme löschen
            $url->accessibilityIssues()->delete();

            // Neue Probleme speichern
            foreach ($results as $result) {
                Pa11yAccessibilityIssue::create([
                    'url_id' => $url->id,
                    'issue' => $result['message'] ?? null,
                    'selector' => $result['selector'] ?? null,
                    'wcag_level' => $this->extractWcagLevel($result['code'] ?? null),
                    'code' => $result['code'] ?? null,
                    'type' => $result['type'] ?? null,
                    'typeCode' => $result['typeCode'] ?? null,
                    'context' => $result['context'] ?? null,
                    'runner' => $result['runner'] ?? null,
                    'runnerExtras' => json_encode($result['runnerExtras'] ?? []), // Speichert Extras als JSON
                ]);
            }

            // Letzter Check aktualisieren
            $url->update(['last_checked' => now()]);

            $this->info("Finished scanning {$url->url}");
        }

        $this->info('All URLs have been scanned.');
    }

    private function extractWcagLevel($code)
    {
        if (str_contains($code, 'WCAG2A.')) {
            return 'A';
        } elseif (str_contains($code, 'WCAG2AA.')) {
            return 'AA';
        } elseif (str_contains($code, 'WCAG2AAA.')) {
            return 'AAA';
        }
        return null;
    }

}
