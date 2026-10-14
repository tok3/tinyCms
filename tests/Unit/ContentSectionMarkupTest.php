<?php

namespace Tests\Unit;

use Illuminate\Filesystem\Filesystem;
use Illuminate\View\Compilers\BladeCompiler;
use PHPUnit\Framework\TestCase;

class ContentSectionMarkupTest extends TestCase
{
    public function test_text_section_renders_the_selected_heading_elements(): void
    {
        $html = $this->renderBlade('resources/views/content-sections/text.blade.php', [
            'data' => [
                'heading' => 'Primary heading',
                'levelHeading' => 'h1',
                'heading2' => 'Secondary heading',
                'levelHeading2' => 'h3',
                'teaser' => 'Introductory copy.',
                'text' => 'Body copy.',
            ],
            'prevElem' => 'swiper',
        ]);

        self::assertStringContainsString('<h1 class="mb-4">Primary heading</h1>', $html);
        self::assertStringContainsString('<p class="mb-4 h3">Secondary heading</p>', $html);
        self::assertStringNotContainsString('role="heading"', $html);
    }

    public function test_text_section_rejects_invalid_heading_elements(): void
    {
        $html = $this->renderBlade('resources/views/content-sections/text.blade.php', [
            'data' => [
                'heading' => 'Safe primary heading',
                'levelHeading' => 'script',
                'heading2' => 'Safe secondary heading',
                'levelHeading2' => 'iframe',
                'teaser' => 'Introductory copy.',
                'text' => 'Body copy.',
            ],
            'prevElem' => 'swiper',
        ]);

        self::assertStringContainsString('<h1 class="mb-4">Safe primary heading</h1>', $html);
        self::assertStringContainsString('<p class="mb-4 h2">Safe secondary heading</p>', $html);
        self::assertStringNotContainsString('<script', $html);
        self::assertStringNotContainsString('<iframe', $html);
    }

    public function test_swiper_slide_copy_is_not_part_of_the_heading_outline(): void
    {
        $template = file_get_contents(dirname(__DIR__, 2).'/resources/views/content-sections/swiper.blade.php');

        self::assertStringContainsString('<p class="swiper-hero-copy display-3 mb-4 mb-lg-7">', $template);
        self::assertStringNotContainsString('<h2 class="display-3 mb-4 mb-lg-7">', $template);
        self::assertStringContainsString('.swiper-container .swiper-hero-copy', $template);
    }

    public function test_blockquote_section_uses_a_container_and_typographic_quotes(): void
    {
        $html = $this->renderBlade('resources/views/content-sections/blockquote.blade.php', [
            'data' => [
                'quote' => 'Accessibility belongs in the concept.',
                'author' => '',
                'buttonText' => '',
                'buttonTarget' => '',
            ],
        ]);

        self::assertMatchesRegularExpression('/<div class="container">\s*<div class="row">/', $html);
        self::assertStringContainsString('„Accessibility belongs in the concept.”', $html);
        self::assertStringNotContainsString('"Accessibility belongs in the concept."', $html);
    }

    /**
     * @param  array<string, mixed>  $variables
     */
    private function renderBlade(string $template, array $variables): string
    {
        $compiler = new BladeCompiler(new Filesystem, sys_get_temp_dir());
        $projectRoot = dirname(__DIR__, 2);
        $compiled = $compiler->compileString(file_get_contents($projectRoot.'/'.$template));

        extract($variables, EXTR_SKIP);
        ob_start();
        eval('?>'.$compiled);

        return (string) ob_get_clean();
    }
}
