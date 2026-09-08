<?php

namespace App\Services;

use App\Jobs\ScanAccessibilityJob;
use App\Models\Company;
use App\Models\Pa11yUrl;
use App\Models\Referrer;
use Illuminate\Contracts\Cache\LockTimeoutException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class WidgetReferrerService
{
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

        $this->storeReferrerAndMaybeCreateUrl($eventUuid, $company, $refForDb);
    }

    /**
     * @throws LockTimeoutException
     */
    private function storeReferrerAndMaybeCreateUrl(string $eventUuid, Company $company, string $refForDb): void
    {
        $lockKey = 'widget-referrer-company:' . $company->ulid;

        Cache::lock($lockKey, 10)->block(1, function () use ($eventUuid, $company, $refForDb) {
            DB::transaction(function () use ($eventUuid, $company, $refForDb) {
                $event = DB::table('referrer_events')
                    ->where('event_uuid', $eventUuid)
                    ->lockForUpdate()
                    ->first();

                if ($event && $event->processed_at !== null) {
                    return;
                }

                if (! $event) {
                    DB::table('referrer_events')->insert([
                        'event_uuid' => $eventUuid,
                        'company_id' => $company->id,
                        'ulid' => $company->ulid,
                        'referrer' => $refForDb,
                        'status' => 'processing',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }

                $ref = $this->firstOrCreateReferrer($company->ulid, $refForDb);

                if ($ref->wasRecentlyCreated) {
                    $pa11yUrlId = $this->createPa11yUrlIfAllowed($company, $refForDb);
                } else {
                    Referrer::whereKey($ref->id)->increment('count');
                    $pa11yUrlId = null;
                }

                if ($pa11yUrlId) {
                    ScanAccessibilityJob::dispatch($pa11yUrlId, getCurrentWcagStandard($company));
                }

                DB::table('referrer_events')
                    ->where('event_uuid', $eventUuid)
                    ->update([
                        'status' => 'processed',
                        'processed_at' => now(),
                        'updated_at' => now(),
                    ]);
            }, 3);
        });
    }

    private function firstOrCreateReferrer(string $companyUlid, string $refForDb): Referrer
    {
        try {
            return Referrer::firstOrCreate(
                ['ulid' => $companyUlid, 'referrer' => $refForDb],
                ['count' => 0]
            );
        } catch (QueryException $exception) {
            if (! $this->isUniqueConstraintViolation($exception)) {
                throw $exception;
            }

            return Referrer::where('ulid', $companyUlid)
                ->where('referrer', $refForDb)
                ->firstOrFail();
        }
    }

    private function createPa11yUrlIfAllowed(Company $company, string $refForDb): ?int
    {
        $urlForMonitoring = Pa11yUrl::normalizeUrl($refForDb);

        $existingUrl = Pa11yUrl::where('company_id', $company->id)
            ->where('url', $urlForMonitoring)
            ->first();

        if ($existingUrl) {
            return null;
        }

        $urlCount = Pa11yUrl::where('company_id', $company->id)->count();

        if ($urlCount >= $company->max_urls) {
            return null;
        }

        try {
            $url = Pa11yUrl::create([
                'company_id' => $company->id,
                'url' => $urlForMonitoring,
            ]);
        } catch (QueryException $exception) {
            if (! $this->isUniqueConstraintViolation($exception)) {
                throw $exception;
            }

            return null;
        }

        return $url->id;
    }

    private function isUniqueConstraintViolation(QueryException $exception): bool
    {
        return in_array((string) $exception->getCode(), ['23000', '23505'], true);
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
