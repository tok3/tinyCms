<?php

namespace App\Jobs;

use App\Services\WidgetReferrerService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Cache\LockTimeoutException;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Throwable;

class ProcessWidgetReferrerJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 4;
    public int $timeout = 30;

    public function __construct(
        public readonly string $eventUuid,
        public readonly string $companyUlid,
        public readonly string $referrer,
        public readonly ?string $tool = null,
        public readonly ?string $ip = null,
    ) {
        $this->onQueue('referrers');
    }

    public function backoff(): array
    {
        return [2, 5, 15];
    }

    public function handle(WidgetReferrerService $service): void
    {
        try {
            $service->process($this->eventUuid, $this->companyUlid, $this->referrer);
        } catch (LockTimeoutException $exception) {
            Log::warning('Widget referrer processing lock is busy; retrying in background.', [
                'event_uuid' => $this->eventUuid,
                'company_ulid' => $this->companyUlid,
                'tool' => $this->tool,
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
        Log::error('Widget referrer processing failed.', [
            'event_uuid' => $this->eventUuid,
            'company_ulid' => $this->companyUlid,
            'tool' => $this->tool,
            'ip' => $this->ip,
            'exception' => $exception::class,
            'message' => $exception->getMessage(),
        ]);
    }
}
