<?php

namespace Tests\Feature;

use App\Models\Page;
use App\Models\User;
use App\Support\CmsPageSnapshot;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Tests\TestCase;

class CmsPageTransferCommandTest extends TestCase
{
    use DatabaseTransactions;

    private User $author;

    private array $temporaryFiles = [];

    protected function setUp(): void
    {
        parent::setUp();

        $this->author = User::factory()->create();
    }

    protected function tearDown(): void
    {
        foreach ($this->temporaryFiles as $file) {
            File::delete($file);
        }

        parent::tearDown();
    }

    public function test_export_rejects_an_unknown_slug(): void
    {
        $this->artisan('cms:page-export', ['slug' => 'gibt-es-nicht-'.Str::random(8)])
            ->expectsOutputToContain('Keine CMS-Seite gefunden')
            ->assertFailed();
    }

    public function test_export_writes_a_snapshot_for_a_unique_slug(): void
    {
        $page = $this->makePage();
        Page::withoutEvents(fn () => $page->update(['slug' => '/'.$page->slug]));
        $page->refresh();
        $path = base_path('content/pages/'.$page->external_id.'-'.Str::slug($page->title, '-', 'de').'.json');
        $this->temporaryFiles[] = $path;

        $this->artisan('cms:page-export', ['slug' => ltrim($page->slug, '/'), '--source' => 'command-test'])
            ->expectsOutputToContain('Snapshot exportiert')
            ->expectsOutputToContain($page->external_id)
            ->assertSuccessful();

        self::assertFileExists($path);
        self::assertSame('command-test', json_decode(File::get($path), true, 512, JSON_THROW_ON_ERROR)['source']);
    }

    public function test_diff_reports_unchanged_and_update_states(): void
    {
        $page = $this->makePage();
        $unchanged = CmsPageSnapshot::fromPage($page, 'command-test');
        $unchangedPath = $this->writeSnapshot($unchanged);

        $this->artisan('cms:page-diff', ['file' => $unchangedPath])
            ->expectsOutputToContain('Status: unchanged')
            ->assertSuccessful();

        $payload = $unchanged->toArray();
        $payload['page']['title'] = 'Geänderter Titel';
        $changedPath = $this->writeSnapshot(CmsPageSnapshot::fromArray($payload));

        $this->artisan('cms:page-diff', ['file' => $changedPath])
            ->expectsOutputToContain('Status: update')
            ->assertSuccessful();
    }

    public function test_import_is_a_preview_by_default_and_does_not_mutate(): void
    {
        $page = $this->makePage();
        $payload = CmsPageSnapshot::fromPage($page, 'command-test')->toArray();
        $payload['page']['title'] = 'Nur Vorschau';
        $path = $this->writeSnapshot(CmsPageSnapshot::fromArray($payload));

        $this->artisan('cms:page-import', ['file' => $path])
            ->expectsOutputToContain('Status: update')
            ->expectsOutputToContain('Vorschau: keine Datenbankänderung')
            ->assertSuccessful();

        self::assertSame('Ausgangstitel', $page->fresh()->title);
    }

    public function test_import_rejects_a_parallel_change(): void
    {
        $page = $this->makePage();
        $payload = CmsPageSnapshot::fromPage($page, 'command-test')->toArray();
        $payload['page']['title'] = 'Unser Titel';
        $path = $this->writeSnapshot(CmsPageSnapshot::fromArray($payload));
        $page->update(['title' => 'Paralleler Titel']);

        $this->artisan('cms:page-import', ['file' => $path, '--apply' => true])
            ->expectsOutputToContain('Status: conflict')
            ->expectsOutputToContain('nicht importiert')
            ->assertFailed();

        self::assertSame('Paralleler Titel', $page->fresh()->title);
    }

    public function test_new_page_import_requires_an_author(): void
    {
        $path = $this->writeSnapshot($this->newPageSnapshot());

        $this->artisan('cms:page-import', ['file' => $path, '--apply' => true])
            ->expectsOutputToContain('author-id')
            ->assertFailed();
    }

    public function test_new_page_import_creates_an_unpublished_page_with_a_valid_author(): void
    {
        $snapshot = $this->newPageSnapshot();
        $path = $this->writeSnapshot($snapshot);

        $this->artisan('cms:page-import', [
            'file' => $path,
            '--apply' => true,
            '--author-id' => $this->author->id,
        ])
            ->expectsOutputToContain('Import angewendet')
            ->assertSuccessful();

        $created = Page::query()->where('external_id', $snapshot->pageData()['external_id'])->sole();
        self::assertFalse($created->published);
        self::assertSame($this->author->id, $created->author_id);
    }

    private function makePage(): Page
    {
        return Page::withoutEvents(fn (): Page => Page::query()->create([
            'external_id' => (string) Str::uuid(),
            'title' => 'Ausgangstitel',
            'slug' => 'transfer-command-'.Str::lower(Str::random(8)),
            'author_id' => $this->author->id,
            'published' => true,
            'navbar_type' => 1,
            'blocks' => [],
            'meta' => ['description' => 'Beschreibung'],
        ]));
    }

    private function newPageSnapshot(): CmsPageSnapshot
    {
        $page = $this->makePage();
        $payload = CmsPageSnapshot::fromPage($page, 'command-test')->toArray();
        $page->forceDelete();
        $payload['base_fingerprint'] = null;
        $payload['page']['external_id'] = (string) Str::uuid();
        $payload['page']['slug'] = 'neue-command-seite-'.Str::lower(Str::random(8));
        $payload['page']['published'] = true;

        return CmsPageSnapshot::fromArray($payload);
    }

    private function writeSnapshot(CmsPageSnapshot $snapshot): string
    {
        $directory = storage_path('framework/testing/cms-page-commands');
        File::ensureDirectoryExists($directory);
        $path = $directory.'/'.Str::uuid().'.json';
        File::put($path, json_encode(
            $snapshot->toArray(),
            JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE,
        ));
        $this->temporaryFiles[] = $path;

        return $path;
    }
}
