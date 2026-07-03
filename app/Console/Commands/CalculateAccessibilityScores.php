<?php

namespace App\Console\Commands;

use App\Models\Company;
use App\Services\AccessibilityScoreService;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class CalculateAccessibilityScores extends Command
{
    protected $signature = 'accessibility:scores
                            {--json : Ausgabe als JSON}
                            {--limit= : Maximale Anzahl Firmen (zum Testen)}
                            {--only-active : Nur aktive Firmen}';

    protected $description = 'Berechnet den Accessibility Score für alle (oder ausgewählte) Firmen und gibt die Ergebnisse aus.';

    protected AccessibilityScoreService $scoreService;

    public function __construct(AccessibilityScoreService $scoreService)
    {
        parent::__construct();
        $this->scoreService = $scoreService;
    }

    public function handle()
    {
        $this->info('Starte Accessibility Score Berechnung für alle Firmen...');

        $query = Company::query();

        if ($this->option('only-active')) {
            $query->where('active', true); // Falls dein Feld anders heißt, hier anpassen
        }

        if ($limit = $this->option('limit')) {
            $query->limit((int)$limit);
        }

        $companies = $query->get();

        if ($companies->isEmpty()) {
            $this->warn('Keine Firmen gefunden.');
            return 1;
        }

        $results = [];
        $successful = 0;

        $this->output->progressStart($companies->count());

        foreach ($companies as $company) {
            try {
                $metrics = $this->scoreService->getCompanyMetrics($company);

                if ($metrics === null) {
                    $results[] = [
                        'company_id'    => $company->id,
                        'company_name'  => $company->name ?? 'Unbekannt',
                        'score'         => null,
                        'status'        => 'Keine Daten'
                    ];
                    continue;
                }

                // Letzten daily-Eintrag holen (daily ist ein Array)
                $lastDaily = !empty($metrics['daily'])
                    ? $metrics['daily'][array_key_last($metrics['daily'])]
                    : [];

                $results[] = [
                    'company_id'     => $company->id,
                    'company_name'   => $company->name ?? 'Unbekannt',
                    'current_score'  => $metrics['current_score'],
                    'trend'          => $metrics['trend_label'],
                    'trend_diff'     => $metrics['trend_diff'],
                    'unique_types'   => $lastDaily['unique_issue_types'] ?? null,
                    'errors_per_url' => $lastDaily['errors_per_url'] ?? null,
                    'status'         => 'OK'
                ];
                $successful++;

            } catch (\Exception $e) {
                $results[] = [
                    'company_id'   => $company->id,
                    'company_name' => $company->name ?? 'Unbekannt',
                    'score'        => null,
                    'status'       => 'Fehler: ' . $e->getMessage()
                ];
                $this->error("Fehler bei Firma {$company->id}: " . $e->getMessage());
            }

            $this->output->progressAdvance();
        }

        $this->output->progressFinish();

        // === Ausgabe ===
        if ($this->option('json')) {
            $this->line(json_encode($results, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        } else {
            $this->newLine();
            $this->table(
                ['ID', 'Firma', 'Score', 'Trend', 'Δ', 'Unique Types', 'Err/URL', 'Status'],
                $this->formatTableRows($results)
            );

            $this->newLine();
            $this->info("Berechnung abgeschlossen: {$successful} von {$companies->count()} Firmen erfolgreich.");
        }

        return 0;
    }

    /**
     * Formatiert die Ergebnisse für die Konsolenausgabe
     */
    private function formatTableRows(array $results): array
    {
        $rows = [];

        foreach ($results as $row) {
            $rows[] = [
                $row['company_id'],
                Str::limit($row['company_name'], 35, '...'),
                $row['current_score'] ?? '—',
                $row['trend'] ?? '—',
                $row['trend_diff'] ?? '—',
                $row['unique_types'] ?? '—',
                $row['errors_per_url'] ?? '—',
                $row['status'],
            ];
        }

        return $rows;
    }
}
