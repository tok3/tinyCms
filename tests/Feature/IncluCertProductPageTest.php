<?php

namespace Tests\Feature;

use App\Models\Page;
use App\Models\User;
use App\Services\CmsPageTransferService;
use App\Support\CmsPageSnapshot;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Events\Dispatcher;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\File;
use Tests\TestCase;

class IncluCertProductPageTest extends TestCase
{
    use DatabaseTransactions;

    private const EXTERNAL_ID = 'bfd71c27-dc08-41f3-bf54-d2b25bff7e56';

    protected function setUp(): void
    {
        parent::setUp();

        Model::setEventDispatcher(new Dispatcher(app()));
    }

    public function test_snapshot_creates_an_unpublished_but_authenticated_preview_page(): void
    {
        $path = base_path('content/pages/'.self::EXTERNAL_ID.'-inclucert.json');
        self::assertFileExists($path);

        Page::withTrashed()
            ->where(fn ($query) => $query
                ->where('external_id', self::EXTERNAL_ID)
                ->orWhere('slug', 'inclucert'))
            ->get()
            ->each->forceDelete();

        $snapshot = CmsPageSnapshot::fromArray(json_decode(
            File::get($path),
            true,
            512,
            JSON_THROW_ON_ERROR,
        ));
        $author = User::factory()->create();
        $result = app(CmsPageTransferService::class)->import($snapshot, apply: true, authorId: $author->id);

        self::assertTrue($result->applied);
        self::assertFalse($result->page->published);
        self::assertSame('inclucert', $result->page->slug);

        $this->get('/produkte/inclucert')->assertNotFound();

        $response = $this->actingAs($author)->get('/produkte/inclucert');

        $response
            ->assertOk()
            ->assertSee('Ein sichtbares Zeichen für kontinuierliche Verbesserung')
            ->assertSee('Was im Hintergrund passiert')
            ->assertSee('Was IncluCert zeigt – und was nicht')
            ->assertSee('IncluCert kennenlernen')
            ->assertSee('<inclucert-badge', false);

        self::assertSame(1, substr_count($response->getContent(), '<h1'));
    }
}
