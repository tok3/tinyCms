<?php

namespace App\Http\Middleware;

use App\Jobs\ProcessWidgetReferrerJob;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class VerifyCustomerAccess
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next)
    {
        $company_id = $request->route('ulid');
        $tool = $request->route('tool'); // Tool-Name oder Typ aus der URL

        // Prüfe, ob der Kunde existiert
        //$customer = \App\Models\Customer::where('uuid', $company_id)->first();
        $customer = \App\Models\Company::where('ulid', $company_id)->first();


        if (!$customer || !$customer->hasAccessToTool($tool))
        {
            // Zugriff verweigern, wenn der Kunde keinen Zugang hat
            return response('Unauthorized', 403);
        }


        // HTTP-Referer aus dem Request
        $httpReferrer = $request->header('referer');

        if ($httpReferrer) {
            $this->dispatchReferrerProcessingAfterResponse(
                companyUlid: $company_id,
                httpReferrer: $httpReferrer,
                tool: $tool,
                ip: $request->ip(),
            );
        }

        return $next($request);
    }

    private function dispatchReferrerProcessingAfterResponse(
        string $companyUlid,
        string $httpReferrer,
        ?string $tool,
        ?string $ip,
    ): void
    {
        $connection = config('queue.default');
        $driver = config("queue.connections.{$connection}.driver");

        if (in_array($driver, ['sync', 'null'], true)) {
            Log::warning('Widget referrer processing skipped because queue driver is not asynchronous.', [
                'queue_connection' => $connection,
                'queue_driver' => $driver,
                'company_ulid' => $companyUlid,
                'tool' => $tool,
                'ip' => $ip,
            ]);

            return;
        }

        $eventUuid = (string) Str::uuid();

        app()->terminating(function () use ($eventUuid, $companyUlid, $httpReferrer, $tool, $ip) {
            try {
                ProcessWidgetReferrerJob::dispatch(
                    $eventUuid,
                    $companyUlid,
                    $httpReferrer,
                    $tool,
                    $ip,
                );
            } catch (\Throwable $exception) {
                Log::error('Widget referrer processing could not be queued.', [
                    'event_uuid' => $eventUuid,
                    'company_ulid' => $companyUlid,
                    'tool' => $tool,
                    'ip' => $ip,
                    'exception' => $exception::class,
                    'message' => $exception->getMessage(),
                ]);
            }
        });
    }
}
