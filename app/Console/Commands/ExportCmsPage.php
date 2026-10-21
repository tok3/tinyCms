<?php

namespace App\Console\Commands;

use App\Models\Page;
use App\Services\CmsPageTransferService;
use Illuminate\Console\Command;

class ExportCmsPage extends Command
{
    protected $signature = 'cms:page-export
                            {slug : Slug der CMS-Seite, mit oder ohne führenden Schrägstrich}
                            {--source=local-live-mirror : Bezeichnung des Ausgangssystems}';

    protected $description = 'Exportiert eine CMS-Seite als versionierten JSON-Snapshot';

    public function handle(CmsPageTransferService $transfer): int
    {
        $slug = ltrim((string) $this->argument('slug'), '/');
        $pages = Page::query()->whereIn('slug', [$slug, '/'.$slug])->get();

        if ($pages->isEmpty()) {
            $this->error("Keine CMS-Seite gefunden: {$slug}");

            return self::FAILURE;
        }

        if ($pages->count() > 1) {
            $this->error("Mehrere CMS-Seiten mit diesem Slug gefunden: {$slug}");

            return self::FAILURE;
        }

        $page = $pages->sole();
        $path = $transfer->export(
            $page->load('tags'),
            (string) $this->option('source'),
            base_path('content/pages'),
        );

        $this->info('Snapshot exportiert.');
        $this->line("external_id: {$page->external_id}");
        $this->line("Datei: {$path}");

        return self::SUCCESS;
    }
}
