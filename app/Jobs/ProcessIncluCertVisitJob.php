<?php

namespace App\Jobs;

use App\Models\Company;
use App\Services\ReferrerRecordingService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Cache\LockTimeoutException;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Throwable;

class ProcessIncluCertVisitJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 4;
    public int $timeout = 30;

    public function __construct(
        public readonly string $eventUuid,
        public readonly string $companyUlid,
        public readonly string $normalizedUrl,
        public readonly ?string $ip = null,
    ) {
        $this->onQueue('referrers');
    }

    public function backoff(): array
    {
        return [2, 5, 15];
    }

    public function handle(ReferrerRecordingService $referrerRecordingService): void
    {
        $company = Company::where('ulid', $this->companyUlid)->first();

        if (! $company || ! $company->hasFeature('inclucert')) {
            Log::warning('IncluCert visit skipped because company is missing or has no access.', [
                'event_uuid' => $this->eventUuid,
                'company_ulid' => $this->companyUlid,
                'ip' => $this->ip,
            ]);

            return;
        }

        try {
            $referrerRecordingService->record($this->eventUuid, $company, $this->normalizedUrl);
        } catch (LockTimeoutException $exception) {
            Log::warning('IncluCert visit referrer lock is busy; retrying in background.', [
                'event_uuid' => $this->eventUuid,
                'company_ulid' => $this->companyUlid,
                'ip' => $this->ip,
                'attempt' => $this->attempts(),
            ]);

            if ($this->attempts() < $this->tries) {
                $this->release($this->backoff()[min($this->attempts() - 1, 2)]);

                return;
            }

            throw $exception;
        }
    }

    public function failed(Throwable $exception): void
    {
        Log::error('IncluCert visit referrer processing failed.', [
            'event_uuid' => $this->eventUuid,
            'company_ulid' => $this->companyUlid,
            'ip' => $this->ip,
            'exception' => $exception::class,
            'message' => $exception->getMessage(),
        ]);
    }
}
