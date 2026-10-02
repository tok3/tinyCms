<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class AccessibilityAtlasContributionTest extends TestCase
{
    use DatabaseTransactions;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutVite();
    }

    public function test_public_accessibility_atlas_contribution_page_is_available(): void
    {
        $this->get('/barrierefreiheitsatlas/beitrag')
            ->assertOk()
            ->assertSee('Hilf uns, das Web zugänglicher zu machen.')
            ->assertSee('Barrierefreiheitsatlas im Web');
    }

    public function test_atlas_tab_is_only_visible_on_the_homepage(): void
    {
        $this->createPage('/', 'Startseite', '00000000-0000-0000-0000-000000000101');
        $this->createPage('test-unterseite', 'Test-Unterseite', '00000000-0000-0000-0000-000000000102');

        $this->get('/')
            ->assertOk()
            ->assertSee('Ich bin betroffen');

        $this->get('/test-unterseite')
            ->assertOk()
            ->assertDontSee('Ich bin betroffen');
    }

    private function createPage(string $slug, string $title, string $externalId): void
    {
        DB::table('pages')->insert([
            'external_id' => $externalId,
            'title' => $title,
            'slug' => $slug,
            'published' => true,
            'navbar_type' => 1,
            'blocks' => '[]',
            'meta' => json_encode(['description' => $title]),
            'meta_og' => json_encode(['description' => $title]),
            'meta_twitter' => json_encode(['description' => $title]),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
