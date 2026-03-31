<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Models\Pa11yUrl;

class DemoUrlDiscoveryService
{
    public function discoverAndScan($company, string $domain, int $limit = 10): void
    {
        $urls = collect();

        //  1. Sitemap versuchen
        $urls = $urls->merge($this->fromSitemap($domain, $limit));

        //  2. Homepage parsen (wenn zu wenig gefunden)
        if ($urls->count() < 5) {
            $urls = $urls->merge($this->fromHomepage($domain, $limit));
        }

        //  3. Fallback (klassisch)
        if ($urls->count() < 5) {
            $urls = $urls->merge($this->fallbackUrls($domain));
        }

        //  4. FORCED FALLBACK (IMMER!)
        if ($urls->count() < 5) {
            $urls = $urls->merge($this->forcedUrls($domain));
        }

        $urls = $urls
            ->unique()
            ->take($limit);

        foreach ($urls as $url) {

            $exists = Pa11yUrl::where('company_id', $company->id)
                ->where('url', $url)
                ->exists();

            if ($exists) continue;

            $url = Pa11yUrl::normalizeUrl($url);

            $model = Pa11yUrl::firstOrCreate([
                'company_id' => $company->id,
                'url' => $url,
            ]);

            //  sofort scannen
            shell_exec("php " . base_path('artisan') . " scan:accessibility-21 {$model->id} > /dev/null 2>&1 &");
        }
    }


    private function fromSitemap(string $domain, int $limit)
    {
        $urls = collect();

        try {
            $response = Http::timeout(5)->get($domain . '/sitemap.xml');

            if (!$response->ok()) return $urls;

            $xml = simplexml_load_string($response->body());

            foreach ($xml->url as $url) {

                $loc = (string) $url->loc;

                if ($this->isValidUrl($loc)) {
                    $urls->push($loc);
                }

                if ($urls->count() >= $limit) break;
            }

        } catch (\Exception $e) {
            \Log::info('Sitemap fehlgeschlagen: ' . $e->getMessage());
        }

        return $urls;
    }


    private function fromHomepage(string $domain, int $limit)
    {
        $urls = collect();

        try {
            $response = Http::timeout(5)->get($domain);

            if (!$response->ok()) return $urls;

            $html = $response->body();

            //  nur BODY extrahieren
            if (preg_match('/<body.*?>(.*?)<\/body>/is', $html, $bodyMatch)) {
                $html = $bodyMatch[1];
            }

            preg_match_all('/href=["\'](.*?)["\']/', $html, $matches);

            foreach ($matches[1] as $link) {

                $link = preg_replace('/\?+$/', '', $link);
                //  Müll raus
                if (
                    str_starts_with($link, '#') ||
                    str_starts_with($link, 'mailto:') ||
                    str_starts_with($link, 'tel:') ||
                    str_starts_with($link, 'javascript:')
                ) continue;

                //  absolute URL bauen
                if (str_starts_with($link, 'http')) {
                    $full = $link;
                } else {
                    $full = rtrim($domain, '/') . '/' . ltrim($link, '/');
                }

                //  nur gleiche Domain
                if (parse_url($full, PHP_URL_HOST) !== parse_url($domain, PHP_URL_HOST)) {
                    continue;
                }

                //  ASSETS RAUSFILTERN
                if (preg_match('/\.(jpg|jpeg|png|gif|svg|webp|css|js|pdf|mp4|mp3|ico|woff|woff2|ttf)$/i', $full)) {
                    continue;
                }

                //  typische System-Pfade raus
                if (
                    str_contains($full, '/wp-content/') ||
                    str_contains($full, '/wp-json/') ||
                    str_contains($full, '/cdn/') ||
                    str_contains($full, '/assets/') ||
                    str_contains($full, '/fonts/')
                ) continue;

                //  VALIDIERUNG
                if ($this->isValidUrl($full)) {
                    $urls->push($full);
                }

                if ($urls->count() >= $limit) break;
            }

        } catch (\Exception $e) {
            \Log::info('Homepage parsing fehlgeschlagen: ' . $e->getMessage());
        }

        return $urls;
    }


    private function fallbackUrls(string $domain)
    {
        $paths = [
            '/',
            '/impressum',
            '/kontakt',
            '/datenschutz',
        ];

        $urls = collect();

        foreach ($paths as $path) {
            $full = rtrim($domain, '/') . $path;

            if ($this->isValidUrl($full)) {
                $urls->push($full);
            }
        }

        return $urls;
    }


    private function isValidUrl(string $url): bool
    {
        try {
            $response = Http::timeout(5)->get($url);
            return $response->status() < 400;

        } catch (\Exception $e) {
            return false;
        }
    }

    private function forcedUrls(string $domain)
    {
        return collect([
            rtrim($domain, '/'),
            rtrim($domain, '/') . '/impressum',
            rtrim($domain, '/') . '/kontakt',
            rtrim($domain, '/') . '/datenschutz',
            rtrim($domain, '/') . '/barrierefreiheit',
        ]);
    }


}
