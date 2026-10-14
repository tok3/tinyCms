<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class PublicPageRedirectTest extends TestCase
{
    public function test_legacy_social_provider_slug_redirects_permanently_to_the_canonical_slug(): void
    {
        $routes = file_get_contents(dirname(__DIR__, 2).'/routes/web.php');

        self::assertMatchesRegularExpression(
            <<<'REGEX'
            /Route::redirect\(\s*'\/barrierefreie-websites-fur-soziale-trager',\s*'\/barrierefreie-websites-fuer-soziale-trager',\s*301\s*\);/
            REGEX,
            $routes,
        );
    }
}
