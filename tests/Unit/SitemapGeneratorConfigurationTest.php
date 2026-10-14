<?php

namespace Tests\Unit;

use App\Http\Controllers\PageController;
use App\Services\SitemapUrlPolicy;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Uri;
use ReflectionClass;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;
use Tests\TestCase;

class SitemapGeneratorConfigurationTest extends TestCase
{
    public function test_the_cms_generator_uses_the_sitemap_url_policy(): void
    {
        $controller = new class extends PageController
        {
            public function configuredGenerator(SitemapUrlPolicy $policy): SitemapGenerator
            {
                return $this->sitemapGenerator($policy);
            }
        };

        $generator = $controller->configuredGenerator(new SitemapUrlPolicy);
        $reflection = new ReflectionClass($generator);

        $shouldCrawlProperty = $reflection->getProperty('shouldCrawl');
        $shouldCrawl = $shouldCrawlProperty->getValue($generator);

        self::assertFalse($shouldCrawl(new Uri('https://aktion-barrierefrei.org/login')));
        self::assertTrue($shouldCrawl(new Uri('https://aktion-barrierefrei.org/preise')));

        $hasCrawledProperty = $reflection->getProperty('hasCrawled');
        $hasCrawled = $hasCrawledProperty->getValue($generator);

        self::assertNull($hasCrawled(
            Url::create('https://aktion-barrierefrei.org/fehlt'),
            new Response(404, ['Content-Type' => 'text/html'])
        ));

        $included = $hasCrawled(
            Url::create('https://aktion-barrierefrei.org/preise'),
            new Response(200, ['Content-Type' => 'text/html'])
        );

        self::assertSame('https://aktion-barrierefrei.org/preise', $included->url);
    }
}
