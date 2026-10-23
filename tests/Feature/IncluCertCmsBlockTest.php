<?php

namespace Tests\Feature;

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\File;
use Tests\TestCase;

class IncluCertCmsBlockTest extends TestCase
{
    private const ULID = '01JER4830K1Y3QDGRFDJ7ZN160';

    public function test_feature_mode_renders_one_real_h1(): void
    {
        $html = $this->renderComponent([
            'mode' => 'feature',
            'heading' => 'IncluCert sichtbar machen',
        ]);

        self::assertSame(1, substr_count($html, '<h1'));
        self::assertStringContainsString('<h1', $html);
        self::assertStringContainsString('IncluCert sichtbar machen', $html);
        self::assertStringContainsString('inclucert-presentation--feature', $html);
        self::assertStringContainsString('bg-gradient-dark-night', $html);
        self::assertStringContainsString('text-white-75', $html);
    }

    public function test_teaser_mode_renders_an_h2_without_an_h1(): void
    {
        $html = $this->renderComponent([
            'mode' => 'teaser',
            'heading' => 'Fortschritt öffentlich zeigen',
        ]);

        self::assertSame(0, substr_count($html, '<h1'));
        self::assertSame(1, substr_count($html, '<h2'));
        self::assertStringContainsString('inclucert-presentation--teaser', $html);
    }

    public function test_invalid_mode_and_badge_options_use_safe_defaults(): void
    {
        $html = $this->renderComponent([
            'mode' => 'riesig',
            'badgeAppearance' => 'unknown',
            'badgeTheme' => 'neon',
        ]);

        self::assertStringContainsString('inclucert-presentation--teaser', $html);
        self::assertStringContainsString('data-appearance="compact"', $html);
        self::assertStringContainsString('data-theme="auto"', $html);
    }

    public function test_missing_or_invalid_ulid_keeps_the_content_but_omits_badge_and_script(): void
    {
        $html = $this->renderComponent([
            'body' => '<p>Die regelmäßige Prüfung bleibt verständlich erklärt.</p>',
            'badgeUlid' => 'kein-ulid',
        ]);

        self::assertStringContainsString('Die regelmäßige Prüfung bleibt verständlich erklärt.', $html);
        self::assertStringNotContainsString('<inclucert-badge', $html);
        self::assertStringNotContainsString('inclucert-badge.js', $html);
    }

    public function test_two_blocks_load_the_badge_script_only_once(): void
    {
        $html = Blade::render(<<<'BLADE'
            <x-inclucert-presentation
                mode="feature"
                heading="Erste Darstellung"
                badge-ulid="01JER4830K1Y3QDGRFDJ7ZN160"
            />
            <x-inclucert-presentation
                mode="teaser"
                heading="Zweite Darstellung"
                badge-ulid="01JER4830K1Y3QDGRFDJ7ZN160"
            />
            @stack('scripts')
        BLADE);

        self::assertSame(2, substr_count($html, '<inclucert-badge'));
        self::assertSame(1, substr_count($html, 'src="'.asset('js/inclucert-badge.js').'"'));
    }

    public function test_optional_badge_theme_cycle_is_rendered_only_when_enabled(): void
    {
        $static = $this->renderComponent();
        $cycling = $this->renderComponent([
            'badgeTheme' => 'stealth',
            'badgeThemeCycle' => true,
        ]);

        self::assertStringNotContainsString('data-theme-cycle', $static);
        self::assertStringContainsString('data-theme="stealth"', $cycling);
        self::assertStringContainsString('data-theme-cycle="stealth,light,mono"', $cycling);
    }

    public function test_button_requires_text_and_a_safe_internal_or_https_url(): void
    {
        $unsafe = $this->renderComponent([
            'buttonText' => 'Mehr erfahren',
            'buttonUrl' => 'javascript:alert(1)',
        ]);
        $safe = $this->renderComponent([
            'buttonText' => 'Mehr erfahren',
            'buttonUrl' => '/produkte/inclucert',
        ]);

        self::assertStringNotContainsString('javascript:', $unsafe);
        self::assertStringNotContainsString('class="btn', $unsafe);
        self::assertStringContainsString('href="/produkte/inclucert"', $safe);
    }

    public function test_cms_section_adapter_and_builder_definition_are_available(): void
    {
        $html = app(PageController::class)->getSections([[
            'type' => 'inclucert-teaser',
            'data' => [
                'mode' => 'teaser',
                'heading' => 'Im CMS gepflegt',
                'body' => '<p>Ein erklärender Text.</p>',
                'badge_ulid' => self::ULID,
                'badge_appearance' => 'micro',
                'badge_theme' => 'light',
                'badge_theme_cycle' => true,
                'button_text' => 'Details',
                'button_url' => '/produkte/inclucert',
            ],
        ]]);

        self::assertStringContainsString('Im CMS gepflegt', $html);
        self::assertStringContainsString('data-appearance="micro"', $html);
        self::assertStringContainsString('data-theme="light"', $html);
        self::assertStringContainsString('data-theme-cycle="stealth,light,mono"', $html);
        self::assertStringContainsString("Block::make('inclucert-teaser')", File::get(app_path('Filament/Resources/Admin/PageResource.php')));
    }

    private function renderComponent(array $overrides = []): string
    {
        return view('components.inclucert-presentation', array_replace([
            'mode' => 'teaser',
            'heading' => 'IncluCert',
            'body' => '<p>Fortschritt wird verständlich dokumentiert.</p>',
            'badgeUlid' => self::ULID,
            'badgeAppearance' => 'compact',
            'badgeTheme' => 'auto',
            'badgeThemeCycle' => false,
            'buttonText' => null,
            'buttonUrl' => null,
        ], $overrides))->render();
    }
}
