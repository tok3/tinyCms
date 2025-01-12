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

        // Hauptscan für WCAG 2.1
        if ($runner === 'axe') {
            $this->info("Running WCAG 2.1 scan...");
            $results = $this->runScan($url, 'axe', null, $includeNotices, $includeWarnings);

            // Zusätzlicher Notices-Scan für WCAG 2.1
            if ($includeNotices) {
                $highestLevel = $this->getHighestLevel($levels);
                $this->info("Performing additional WCAG2AAA scan for Notices...");
                $noticeResults = $this->runScan($url, 'htmlcs', $highestLevel, true, $includeWarnings);
                $results = array_merge($results, $noticeResults);
            }
        }
        // Hauptscan für WCAG 2.0
        else {
            foreach ($levels as $level) {
                $this->info("Running WCAG 2.0 $level scan...");
                $results = array_merge($results, $this->runScan($url, 'htmlcs', $level, $includeNotices, $includeWarnings));
            }
        }

        // Ergebnisse anzeigen
        if (empty($results)) {
            $this->warn('No issues found or invalid response.');
            return 0;
        }

        $this->info("Accessibility issues detected:\n");
        foreach ($results as $issue) {
            $this->line("- " . ($issue['message'] ?? 'Unknown issue'));
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
                $results = json_decode($output, true);

                return $results ?: [];
            }

            // Falls anderer Exit-Code
            throw new \Exception("Unexpected exit code: " . $process->getExitCode());
        } catch (\Exception $e) {
            $this->error("An error occurred during scan: " . $e->getMessage());
            return [];
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
}
