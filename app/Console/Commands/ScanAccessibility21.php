<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Pa11yUrl;
use App\Models\Pa11yAccessibilityIssue;

class ScanAccessibility21 extends Command
{
    protected $signature = 'scan:accessibility-21 {urls?*} {--warnings}';
    protected $description = 'Scan URLs for accessibility issues using WCAG 2.1 (axe runner)';

    public function handle()
    {
        // URLs holen
        $urls = $this->argument('urls') ? Pa11yUrl::whereIn('id', (array)$this->argument('urls'))->get() : Pa11yUrl::all();
        $includeWarnings = $this->option('warnings') !== null;

        foreach ($urls as $url) {
            $this->info("Scanning {$url->url} with WCAG 2.1 standard...");

            // Alte Ergebnisse für WCAG 2.1 löschen
            $this->deleteOldIssues($url->id);

            // Scan starten
            $results = $this->scanWithAxe($url, $includeWarnings);

            // Ergebnisse speichern
            $this->storeResults($url, $results);

            // Letztes Prüfdatum aktualisieren
            $url->update(['last_checked' => now()]);

            $this->info("Finished scanning {$url->url} with WCAG 2.1.");
        }

        $this->info('All URLs have been scanned.');
    }

    private function scanWithAxe($url, $includeWarnings)
    {
        // Kommandokonstruktion
        $processArgs = [
            'pa11y',
            $url->url,
            '--runner',
            'axe',
            '--reporter',
            'json',
        ];

        if ($includeWarnings) {
            $processArgs[] = '--include-warnings';
        }

        // Kommando zu String zusammensetzen
        $command = implode(' ', $processArgs);
        $this->info("Executing: $command");

        try {
            // Shell-Befehl ausführen
            $output = shell_exec($command . ' 2>&1');
            $results = json_decode($output, true);

            if ($results === null) {
                throw new \Exception("Invalid JSON response: $output");
            }

            return $results;
        } catch (\Exception $e) {
            $this->error("Error during scan: " . $e->getMessage());
            return [];
        }
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
}
