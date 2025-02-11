<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class PublicAccessibilityCheck extends Command
{
    protected $signature = 'public:check-accessibility {url} {--standard=WCAG2AA} {--level=A,AA,AAA} {--include-notices} {--include-warnings}';
    protected $description = 'Check a public URL for accessibility issues';

    public function handle()
    {
        $url = $this->argument('url');
        $standard = $this->option('standard'); // WCAG2AA oder WCAG2.1
        $levels = explode(',', $this->option('level')); // A, AA, AAA
        $includeNotices = $this->option('include-notices');
        $includeWarnings = $this->option('include-warnings');

        $runner = ($standard === 'WCAG2.1') ? 'axe' : 'htmlcs';
        $this->info("Checking URL: $url with standard $standard using runner $runner");

        $results = [];

        if ($runner === 'axe') {
            $this->info("Running WCAG 2.1 scan...");
            $resultsMain = $this->runScan($url, 'axe', null, $includeNotices, $includeWarnings);
            if ($resultsMain === null) {
                $this->warn("Der Scan war nicht möglich. Möglicherweise blockiert ein Popup (z. B. Cookie Consent) die Seite oder sie ist nicht erreichbar.");
                return 0;
            }
            $results = $resultsMain;

            if ($includeNotices) {
                $highestLevel = $this->getHighestLevel($levels);
                $this->info("Performing additional WCAG2AAA scan for Notices...");
                $noticeResults = $this->runScan($url, 'htmlcs', $highestLevel, true, $includeWarnings);
                if ($noticeResults === null) {
                    $this->warn("Der zusätzliche Notices-Scan war nicht möglich für $url.");
                    return 0;
                }
                $results = array_merge($results, $noticeResults);
            }
        } else {
            foreach ($levels as $level) {
                $this->info("Running WCAG 2.0 $level scan...");
                $scanResults = $this->runScan($url, 'htmlcs', $level, $includeNotices, $includeWarnings);
                if ($scanResults === null) {
                    $this->warn("Der Scan für WCAG2$level war nicht möglich für $url.");
                    return 0;
                }
                $results = array_merge($results, $scanResults);
            }
        }

        // Wenn keine Ergebnisse zurückkommen, aber der Scan nicht als Fehler erkannt wurde,
        // bedeutet das, dass die Seite fehlerfrei ist.
        if (empty($results)) {
            $this->info('Keine Probleme gefunden.');
            return 0;
        }

        // Ergebnisse anzeigen
        $this->info("Accessibility issues detected:\n");
        foreach ($results as $issue) {
            $this->line("- " . ($issue['message'] ?? 'Unbekanntes Problem'));
        }

        return 0;
    }

    /**
     * Führt den Scan durch und gibt die Ergebnisse zurück.
     */
    private function runScan($url, $runner, $level, $includeNotices, $includeWarnings)
    {
        $processArgs = [
            'pa11y', $url,
            '--runner', $runner,
            '--reporter', 'json',
        ];

        if ($runner === 'htmlcs' && $level) {
            $processArgs[] = '--standard';
            $processArgs[] = "WCAG2$level";
        }

        if ($includeNotices) {
            $processArgs[] = '--include-notices';
        }

        if ($includeWarnings) {
            $processArgs[] = '--include-warnings';
        }

        $process = new Process($processArgs);
        $process->setTimeout(120);

        try {
            $process->run();

            // Erfolg oder Exit-Code 2 (Fehler gefunden)
            if ($process->isSuccessful() || $process->getExitCode() === 2) {
                $output = $process->getOutput();

                // Wenn die Ausgabe leer ist oder kein gültiges JSON, behandeln wir das als Fehler
                if (empty($output) || !$this->isValidJson($output)) {
                    throw new \Exception("Scan fehlgeschlagen oder Website nicht erreichbar: $url");
                }

                $results = json_decode($output, true);
                return $results ?: [];
            }

            throw new \Exception("Unerwarteter Exit-Code: " . $process->getExitCode());
        } catch (\Exception $e) {
            $this->error("An error occurred during scan: " . $e->getMessage());
            // Wir geben null zurück, um anzuzeigen, dass der Scan fehlgeschlagen ist
            return null;
        }
    }

    /**
     * Bestimmt den höchsten Level aus der Liste.
     */
    private function getHighestLevel(array $levels)
    {
        $priority = ['A', 'AA', 'AAA'];
        foreach (array_reverse($priority) as $level) {
            if (in_array($level, $levels)) {
                return $level;
            }
        }
        return 'AAA'; // Standardmäßig AAA, falls nichts angegeben
    }

    private function isValidJson($string)
    {
        json_decode($string);
        return (json_last_error() === JSON_ERROR_NONE);
    }

}
