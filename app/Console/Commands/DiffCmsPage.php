<?php

namespace App\Console\Commands;

use App\Services\CmsPageTransferService;
use App\Support\CmsPageComparison;
use App\Support\CmsPageSnapshot;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Throwable;

class DiffCmsPage extends Command
{
    protected $signature = 'cms:page-diff {file : JSON-Snapshot, absolut oder relativ zum Projekt}';

    protected $description = 'Vergleicht einen CMS-Seiten-Snapshot ohne Datenbankänderung';

    public function handle(CmsPageTransferService $transfer): int
    {
        try {
            $snapshot = $this->readSnapshot((string) $this->argument('file'));
        } catch (Throwable $throwable) {
            $this->error('Snapshot konnte nicht gelesen werden: '.$throwable->getMessage());

            return self::FAILURE;
        }

        $comparison = $transfer->compare($snapshot);
        $this->renderComparison($comparison, $snapshot);

        return in_array($comparison->status, ['conflict', 'ambiguous'], true)
            ? self::FAILURE
            : self::SUCCESS;
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
