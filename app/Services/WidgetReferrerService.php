<?php

namespace App\Services;

use App\Models\Company;
use Illuminate\Support\Facades\Log;

class WidgetReferrerService
{
    public function __construct(private readonly ReferrerRecordingService $referrerRecordingService)
    {
    }

    public function process(string $eventUuid, string $companyUlid, string $httpReferrer): void
    {
        $company = Company::where('ulid', $companyUlid)->first();

        if (! $company) {
            Log::warning('Widget referrer skipped because company was not found.', [
                'event_uuid' => $eventUuid,
                'company_ulid' => $companyUlid,
            ]);

            return;
        }

        $settings = $company->settings;
        $validDomains = $this->explodeValidDomains($settings->valid_domains ?? null);
        $excludeQuery = (bool) ($settings->exclude_query_string_urls ?? true);
        $refRoot = $this->parseRootDomain($httpReferrer);

        if (! $refRoot) {
            Log::debug('Widget referrer skipped because no root domain could be parsed.', [
                'event_uuid' => $eventUuid,
                'company_id' => $company->id,
                'referrer' => $httpReferrer,
            ]);

            return;
        }

        if ($validDomains !== [] && ! in_array($refRoot, $validDomains, true)) {
            Log::debug('Widget referrer skipped because domain is not allowed.', [
                'event_uuid' => $eventUuid,
                'company_id' => $company->id,
                'referrer_root' => $refRoot,
            ]);

            return;
        }

        $refForDb = $this->normalizeUrl($httpReferrer, $excludeQuery);

        if (! $refForDb) {
            Log::debug('Widget referrer skipped because URL could not be normalized.', [
                'event_uuid' => $eventUuid,
                'company_id' => $company->id,
                'referrer' => $httpReferrer,
            ]);

            return;
        }

        $this->referrerRecordingService->record($eventUuid, $company, $refForDb);
    }

    public function parseRootDomain(?string $input): ?string
    {
        if (empty($input)) return null;

        if (! preg_match('~^https?://~i', $input)) {
            $input = 'https://' . ltrim($input);
        }

        $parts = parse_url($input);
        if (! isset($parts['host'])) return null;

        $host = mb_strtolower($parts['host']);
        if (function_exists('idn_to_ascii')) {
            $ascii = idn_to_ascii($host, IDNA_DEFAULT, INTL_IDNA_VARIANT_UTS46);
            if ($ascii) $host = $ascii;
        }

        $host = preg_replace('~^www\.~i', '', $host);

        $labels = explode('.', $host);
        if (count($labels) >= 2) {
            return implode('.', array_slice($labels, -2));
        }

        return $host;
    }

    public function normalizeUrl(string $url, bool $excludeQuery): ?string
    {
        if (! preg_match('~^https?://~i', $url)) {
            $url = 'https://' . ltrim($url);
        }

        $parts = parse_url($url);
        if (! isset($parts['host'])) return null;

        $scheme = 'https';
        $host = mb_strtolower($parts['host']);
        $path = $parts['path'] ?? '/';
        $query = $excludeQuery ? '' : (isset($parts['query']) ? '?' . $parts['query'] : '');

        return $scheme . '://' . $host . $path . $query;
    }

    public function explodeValidDomains(?string $raw): array
    {
        if (! $raw) return [];

        $items = preg_split('/[\s,]+/', $raw, -1, PREG_SPLIT_NO_EMPTY);
        $roots = [];

        foreach ($items as $item) {
            $root = $this->parseRootDomain($item);
            if ($root) $roots[$root] = true;
        }

        return array_keys($roots);
    }
}
