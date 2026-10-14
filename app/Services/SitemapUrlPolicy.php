<?php

namespace App\Services;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriInterface;
use Spatie\Sitemap\Tags\Url;

class SitemapUrlPolicy
{
    private const EXCLUDED_FIRST_SEGMENTS = [
        'admin',
        'dash',
        'dashboard',
        'forgot-password',
        'login',
        'logout',
        'magic-login',
        'profile',
        'register',
        'reset-password',
    ];

    public function shouldCrawl(UriInterface $url): bool
    {
        if ($url->getQuery() !== '' || $url->getFragment() !== '') {
            return false;
        }

        $path = strtolower($url->getPath());

        if (str_starts_with($path, '/barrierefrei-imweb/')) {
            return false;
        }

        $firstSegment = explode('/', trim($path, '/'))[0] ?? '';

        return ! in_array($firstSegment, self::EXCLUDED_FIRST_SEGMENTS, true);
    }

    public function toSitemapUrl(Url $url, ?ResponseInterface $response): ?Url
    {
        if ($response?->getStatusCode() !== 200) {
            return null;
        }

        $contentType = strtolower($response->getHeaderLine('Content-Type'));

        if (! str_starts_with($contentType, 'text/html')) {
            return null;
        }

        if ((parse_url($url->url, PHP_URL_PATH) ?? '') === '') {
            $url->setUrl(rtrim($url->url, '/').'/');
        }

        return $url;
    }
}
