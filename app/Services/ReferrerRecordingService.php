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

class ReferrerRecordingService
{
    /**
     * @throws LockTimeoutException
     */
    public function record(string $eventUuid, Company $company, string $normalizedReferrer): void
    {
        $lockKey = 'referrer-recording-company:' . $company->ulid;

        Cache::lock($lockKey, 10)->block(1, function () use ($eventUuid, $company, $normalizedReferrer) {
            DB::transaction(function () use ($eventUuid, $company, $normalizedReferrer) {
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
                        'referrer' => $normalizedReferrer,
                        'status' => 'processing',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }

                $referrer = $this->firstOrCreateReferrer($company->ulid, $normalizedReferrer);

                if ($referrer->wasRecentlyCreated) {
                    $pa11yUrlId = $this->createPa11yUrlIfAllowed($company, $normalizedReferrer);
                } else {
                    Referrer::whereKey($referrer->id)->increment('count');
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

    private function firstOrCreateReferrer(string $companyUlid, string $normalizedReferrer): Referrer
    {
        try {
            return Referrer::firstOrCreate(
                ['ulid' => $companyUlid, 'referrer' => $normalizedReferrer],
                ['count' => 0]
            );
        } catch (QueryException $exception) {
            if (! $this->isUniqueConstraintViolation($exception)) {
                throw $exception;
            }

            return Referrer::where('ulid', $companyUlid)
                ->where('referrer', $normalizedReferrer)
                ->firstOrFail();
        }
    }

    private function createPa11yUrlIfAllowed(Company $company, string $normalizedReferrer): ?int
    {
        $urlForMonitoring = Pa11yUrl::normalizeUrl($normalizedReferrer);

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
}
