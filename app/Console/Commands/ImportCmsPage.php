<?php

namespace App\Console\Commands;

use App\Services\CmsPageTransferService;
use App\Support\CmsPageComparison;
use App\Support\CmsPageSnapshot;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Throwable;

class ImportCmsPage extends Command
{
    protected $signature = 'cms:page-import
                            {file : JSON-Snapshot, absolut oder relativ zum Projekt}
                            {--apply : Änderungen tatsächlich in die Datenbank schreiben}
                            {--author-id= : Bestehender Autor für eine neue Seite}';

    protected $description = 'Prüft oder importiert einen CMS-Seiten-Snapshot mit Konfliktschutz';

    public function handle(CmsPageTransferService $transfer): int
    {
        try {
            $snapshot = $this->readSnapshot((string) $this->argument('file'));
        } catch (Throwable $throwable) {
            $this->error('Snapshot konnte nicht gelesen werden: '.$throwable->getMessage());

            return self::FAILURE;
        }

        $preview = $transfer->compare($snapshot);
        $this->renderComparison($preview, $snapshot);

        if (in_array($preview->status, ['conflict', 'ambiguous'], true)) {
            $this->error('Snapshot wurde wegen eines Konflikts nicht importiert.');

            return self::FAILURE;
        }

        if (! $this->option('apply')) {
            $this->info('Vorschau: keine Datenbankänderung.');

            return self::SUCCESS;
        }

        if (app()->environment('production') && ! $this->confirm('Diesen CMS-Snapshot wirklich in Produktion importieren?', false)) {
            $this->warn('Import abgebrochen.');

            return self::FAILURE;
        }

        $authorId = $this->option('author-id');
        $result = $transfer->import(
            $snapshot,
            apply: true,
            authorId: $authorId === null ? null : (int) $authorId,
        );

        if ($result->error !== null) {
            $message = match ($result->error) {
                'author_required' => 'Für eine neue Seite ist --author-id erforderlich.',
                'author_not_found' => 'Die angegebene --author-id existiert nicht.',
                default => 'Import fehlgeschlagen: '.$result->error,
            };
            $this->error($message);

            return self::FAILURE;
        }

        if (! $result->applied) {
            $this->info('Keine Änderung erforderlich.');

            return self::SUCCESS;
        }

        $this->info('Import angewendet.');
        $this->line('Seiten-ID: '.$result->page?->id);
        $this->line('Veröffentlicht: '.($result->page?->published ? 'ja' : 'nein'));

        return self::SUCCESS;
    }

    private function readSnapshot(string $file): CmsPageSnapshot
    {
        $path = $this->absolutePath($file);

        if (! File::isFile($path)) {
            throw new \RuntimeException("Datei nicht gefunden: {$path}");
        }

        return CmsPageSnapshot::fromArray(json_decode(
            File::get($path),
            true,
            512,
            JSON_THROW_ON_ERROR,
        ));
    }

    private function absolutePath(string $file): string
    {
        if (str_starts_with($file, DIRECTORY_SEPARATOR) || preg_match('/^[A-Za-z]:[\\\\\/]/', $file) === 1) {
            return $file;
        }

        return base_path($file);
    }

    private function renderComparison(CmsPageComparison $comparison, CmsPageSnapshot $snapshot): void
    {
        $this->line("Status: {$comparison->status}");
        $this->line("external_id: {$comparison->externalId}");
        $this->line('Slug: '.$snapshot->pageData()['slug']);
        $this->line('Basis: '.($comparison->baseFingerprint ?? '—'));
        $this->line('Aktuell: '.($comparison->currentFingerprint ?? '—'));
        $this->line("Eingang: {$comparison->incomingFingerprint}");
    }
}
