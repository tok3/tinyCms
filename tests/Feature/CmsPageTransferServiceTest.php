<?php

namespace Tests\Feature;

use App\Models\Page;
use App\Models\User;
use App\Services\CmsPageTransferService;
use App\Support\CmsPageSnapshot;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Events\Dispatcher;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Str;
use Tests\TestCase;

class CmsPageTransferServiceTest extends TestCase
{
    use DatabaseTransactions;

    private CmsPageTransferService $service;

    private User $author;

    private string $directory;

    protected function setUp(): void
    {
        parent::setUp();

        // The shared base test fakes application events. These tests need Eloquent's
        // model hooks so Spatie can generate valid translated tag slugs.
        Model::setEventDispatcher(new Dispatcher(app()));

        $this->service = app(CmsPageTransferService::class);
        $this->author = User::factory()->create();
        $this->directory = storage_path('framework/testing/cms-page-transfer-'.Str::uuid());
    }

    protected function tearDown(): void
    {
        if (is_dir($this->directory)) {
            foreach (glob($this->directory.'/*') ?: [] as $file) {
                unlink($file);
            }
            rmdir($this->directory);
        }

        parent::tearDown();
    }

    public function test_export_writes_utf8_json_with_a_stable_filename(): void
    {
        $page = $this->makePage(title: 'Erklärung für alle');
        $page->syncTags(['Zukunft', 'Barrierefreiheit']);

        $path = $this->service->export($page->fresh('tags'), 'test-source', $this->directory);
        $payload = json_decode(file_get_contents($path), true, 512, JSON_THROW_ON_ERROR);

        self::assertSame($this->directory.'/'.$page->external_id.'-erklaerung-fuer-alle.json', $path);
        self::assertSame('Erklärung für alle', $payload['page']['title']);
        self::assertSame(['Barrierefreiheit', 'Zukunft'], $payload['page']['tags']);
        self::assertStringEndsWith("}\n", file_get_contents($path));
    }

    public function test_preview_reports_update_without_changing_the_page(): void
    {
        $page = $this->makePage();
        $incoming = $this->changedSnapshot($page, ['title' => 'Neuer Titel']);

        $result = $this->service->import($incoming, apply: false);

        self::assertSame('update', $result->comparison->status);
        self::assertFalse($result->applied);
        self::assertSame('Ausgangstitel', $page->fresh()->title);
    }

    public function test_unchanged_target_is_updated_and_a_second_import_is_idempotent(): void
    {
        $page = $this->makePage();
        $incoming = $this->changedSnapshot($page, [
            'title' => 'Neuer Titel',
            'tags' => ['Neu', 'Geprüft'],
        ]);

        $first = $this->service->import($incoming, apply: true);
        $second = $this->service->import($incoming, apply: true);

        self::assertTrue($first->applied);
        self::assertSame('Neuer Titel', $page->fresh()->title);
        self::assertSame(['Geprüft', 'Neu'], $page->fresh('tags')->tags->pluck('name')->sort()->values()->all());
        self::assertSame('unchanged', $second->comparison->status);
        self::assertFalse($second->applied);
    }

    public function test_parallel_change_is_reported_as_conflict_and_is_not_overwritten(): void
    {
        $page = $this->makePage();
        $incoming = $this->changedSnapshot($page, ['title' => 'Unser neuer Titel']);
        $page->update(['title' => 'Thomas neuer Titel']);

        $result = $this->service->import($incoming, apply: true);

        self::assertSame('conflict', $result->comparison->status);
        self::assertFalse($result->applied);
        self::assertSame('Thomas neuer Titel', $page->fresh()->title);
    }

    public function test_missing_target_is_reported_as_create(): void
    {
        $snapshot = $this->newPageSnapshot();

        $comparison = $this->service->compare($snapshot);

        self::assertSame('create', $comparison->status);
        self::assertNull($comparison->currentFingerprint);
    }

    public function test_duplicate_external_id_is_reported_as_ambiguous(): void
    {
        $externalId = (string) Str::uuid();
        $first = $this->makePage(externalId: $externalId);
        $this->makePage(externalId: $externalId);
        $snapshot = CmsPageSnapshot::fromPage($first->fresh('tags'), 'test-source');

        $comparison = $this->service->compare($snapshot);

        self::assertSame('ambiguous', $comparison->status);
        self::assertSame(2, $comparison->matchingPages);
    }

    public function test_new_page_requires_an_existing_author_and_is_always_unpublished(): void
    {
        $snapshot = $this->newPageSnapshot();

        $missingAuthor = $this->service->import($snapshot, apply: true);
        $unknownAuthor = $this->service->import($snapshot, apply: true, authorId: 999999999);
        $created = $this->service->import($snapshot, apply: true, authorId: $this->author->id);

        self::assertSame('author_required', $missingAuthor->error);
        self::assertSame('author_not_found', $unknownAuthor->error);
        self::assertFalse($missingAuthor->applied);
        self::assertFalse($unknownAuthor->applied);
        self::assertTrue($created->applied);
        self::assertFalse($created->page->published);
        self::assertSame($snapshot->pageData()['external_id'], $created->page->external_id);
    }

    private function makePage(?string $externalId = null, string $title = 'Ausgangstitel'): Page
    {
        return Page::withoutEvents(fn (): Page => Page::query()->create([
            'external_id' => $externalId ?? (string) Str::uuid(),
            'title' => $title,
            'slug' => Str::slug($title).'-'.Str::lower(Str::random(6)),
            'author_id' => $this->author->id,
            'published' => true,
            'navbar_type' => 1,
            'blocks' => [[
                'type' => 'text',
                'data' => ['heading' => 'Überschrift', 'text' => '<p>Ausgangstext</p>'],
            ]],
            'meta' => ['description' => 'Beschreibung'],
        ]));
    }

    private function changedSnapshot(Page $page, array $changes): CmsPageSnapshot
    {
        $payload = CmsPageSnapshot::fromPage($page->fresh('tags'), 'test-source')->toArray();
        $payload['page'] = array_replace($payload['page'], $changes);

        return CmsPageSnapshot::fromArray($payload);
    }

    private function newPageSnapshot(): CmsPageSnapshot
    {
        $page = $this->makePage();
        $payload = CmsPageSnapshot::fromPage($page->fresh('tags'), 'test-source')->toArray();
        $page->forceDelete();
        $payload['page']['external_id'] = (string) Str::uuid();
        $payload['page']['slug'] = 'neue-seite';
        $payload['page']['published'] = true;
        $payload['base_fingerprint'] = null;

        return CmsPageSnapshot::fromArray($payload);
    }
}
