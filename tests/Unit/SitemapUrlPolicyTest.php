<?php

namespace Tests\Unit;

use App\Services\SitemapUrlPolicy;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Uri;
use PHPUnit\Framework\TestCase;
use Spatie\Sitemap\Tags\Url;

class SitemapUrlPolicyTest extends TestCase
{
    public function test_it_allows_public_pages_without_query_or_fragment(): void
    {
        $policy = new SitemapUrlPolicy;

        self::assertTrue($policy->shouldCrawl(new Uri(
            'https://aktion-barrierefrei.org/handlungsfelder/barrierefreie-websites-fuer-soziale-traeger'
        )));
    }

    /**
     * @dataProvider excludedUrlProvider
     */
    public function test_it_rejects_non_indexable_urls(string $url): void
    {
        $policy = new SitemapUrlPolicy;

        self::assertFalse($policy->shouldCrawl(new Uri($url)));
    }

    public static function excludedUrlProvider(): array
    {
        return [
            'query string' => ['https://aktion-barrierefrei.org/preise?interval=monthly&product=2'],
            'fragment' => ['https://aktion-barrierefrei.org/preise#pakete'],
            'login' => ['https://aktion-barrierefrei.org/login'],
            'password reset' => ['https://aktion-barrierefrei.org/forgot-password'],
            'password confirmation' => ['https://aktion-barrierefrei.org/confirm-password'],
            'email verification' => ['https://aktion-barrierefrei.org/verify-email/1/hash'],
            'expired verification token' => ['https://aktion-barrierefrei.org/verify-token-expired/1/hash'],
            'verification notification' => ['https://aktion-barrierefrei.org/email/verification-notification'],
            'admin child path' => ['https://aktion-barrierefrei.org/admin/admin/pages/55/edit'],
            'dashboard' => ['https://aktion-barrierefrei.org/dashboard'],
            'account profile' => ['https://aktion-barrierefrei.org/profile'],
            'malformed public path' => [
                'https://aktion-barrierefrei.org/Barrierefrei-imWeb/uebersicht-barrierefreiheitsstaerkungsgesetz-bfsg',
            ],
        ];
    }

    public function test_it_keeps_successful_html_pages(): void
    {
        $policy = new SitemapUrlPolicy;
        $url = Url::create('https://aktion-barrierefrei.org/preise');

        $result = $policy->toSitemapUrl(
            $url,
            new Response(200, ['Content-Type' => 'text/html; charset=UTF-8'])
        );

        self::assertSame($url, $result);
        self::assertSame('https://aktion-barrierefrei.org/preise', $result->url);
    }

    public function test_it_normalizes_the_root_url_with_a_trailing_slash(): void
    {
        $policy = new SitemapUrlPolicy;

        $result = $policy->toSitemapUrl(
            Url::create('https://aktion-barrierefrei.org'),
            new Response(200, ['Content-Type' => 'text/html'])
        );

        self::assertSame('https://aktion-barrierefrei.org/', $result->url);
    }

    /**
     * @dataProvider excludedResponseProvider
     */
    public function test_it_rejects_unsuccessful_or_non_html_responses(?Response $response): void
    {
        $policy = new SitemapUrlPolicy;

        self::assertNull($policy->toSitemapUrl(
            Url::create('https://aktion-barrierefrei.org/example'),
            $response
        ));
    }

    public static function excludedResponseProvider(): array
    {
        return [
            'missing response' => [null],
            'redirect' => [new Response(301, ['Content-Type' => 'text/html'])],
            'not found' => [new Response(404, ['Content-Type' => 'text/html'])],
            'non HTML' => [new Response(200, ['Content-Type' => 'application/pdf'])],
        ];
    }
}
