<?php

namespace Tests\Unit;

use App\Models\Page;
use App\Support\CmsPageSnapshot;
use Carbon\CarbonImmutable;
use InvalidArgumentException;
use Tests\TestCase;

class CmsPageSnapshotTest extends TestCase
{
    public function test_snapshot_excludes_database_identity_and_sorts_tags(): void
    {
        $page = $this->page();
        $page->id = 51;
        $page->author_id = 7;
        $page->setRelation('tags', collect([
            (object) ['name' => 'Zukunft'],
            (object) ['name' => 'Barrierefreiheit'],
        ]));

        $payload = CmsPageSnapshot::fromPage($page, 'local-live-mirror')->toArray();

        self::assertSame(1, $payload['schema_version']);
        self::assertSame('local-live-mirror', $payload['source']);
        self::assertSame('2026-10-16T06:30:00+00:00', $payload['exported_at']);
        self::assertSame(['Barrierefreiheit', 'Zukunft'], $payload['page']['tags']);
        self::assertSame('50f1c192-72f4-41d6-8792-1726ac2b0c81', $payload['page']['external_id']);
        self::assertArrayNotHasKey('id', $payload['page']);
        self::assertArrayNotHasKey('author_id', $payload['page']);
        self::assertArrayNotHasKey('created_at', $payload['page']);
        self::assertSame($payload['base_fingerprint'], CmsPageSnapshot::fromArray($payload)->contentFingerprint());
    }

    public function test_same_page_content_has_same_fingerprint(): void
    {
        $first = $this->page();
        $first->setRelation('tags', collect([
            (object) ['name' => 'Zukunft'],
            (object) ['name' => 'Barrierefreiheit'],
        ]));

        $second = $this->page();
        $second->blocks = [[
            'data' => ['text' => '<p>Inhalt</p>', 'heading' => 'Ein Titel'],
            'type' => 'text',
        ]];
        $second->setRelation('tags', collect([
            (object) ['name' => 'Barrierefreiheit'],
            (object) ['name' => 'Zukunft'],
        ]));

        self::assertSame(
            CmsPageSnapshot::fromPage($first, 'first-source')->contentFingerprint(),
            CmsPageSnapshot::fromPage($second, 'second-source')->contentFingerprint(),
        );
    }

    public function test_content_change_changes_fingerprint(): void
    {
        $original = CmsPageSnapshot::fromPage($this->page(), 'local-live-mirror');
        $changedPayload = $original->toArray();
        $changedPayload['page']['title'] = 'Ein anderer Titel';

        self::assertNotSame(
            $original->contentFingerprint(),
            CmsPageSnapshot::fromArray($changedPayload)->contentFingerprint(),
        );
        self::assertSame($original->baseFingerprint(), CmsPageSnapshot::fromArray($changedPayload)->baseFingerprint());
    }

    public function test_invalid_schema_version_is_rejected(): void
    {
        $payload = CmsPageSnapshot::fromPage($this->page(), 'local-live-mirror')->toArray();
        $payload['schema_version'] = 2;

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Unsupported CMS page snapshot schema version');

        CmsPageSnapshot::fromArray($payload);
    }

    private function page(): Page
    {
        $page = new Page;
        $page->forceFill([
            'external_id' => '50f1c192-72f4-41d6-8792-1726ac2b0c81',
            'title' => 'Barrierefreiheitserklärung',
            'slug' => 'barrierefreiheitserklaerung',
            'published' => true,
            'navbar_type' => 1,
            'blocks' => [[
                'type' => 'text',
                'data' => ['heading' => 'Ein Titel', 'text' => '<p>Inhalt</p>'],
            ]],
            'custom_head_code' => null,
            'custom_footer_code' => null,
            'schema_json' => ['@type' => 'WebPage'],
            'meta' => ['description' => 'Beschreibung'],
            'meta_og' => ['title' => 'Titel'],
            'meta_twitter' => null,
            'created_at' => CarbonImmutable::parse('2026-01-01T00:00:00Z'),
            'updated_at' => CarbonImmutable::parse('2026-10-16T08:30:00+02:00'),
        ]);
        $page->setRelation('tags', collect());

        return $page;
    }
}
