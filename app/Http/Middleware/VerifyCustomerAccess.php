<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Referrer;
class VerifyCustomerAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $customerUuid = $request->route('ulid');
        $tool = $request->route('tool'); // Tool-Name oder Typ aus der URL

        // Prüfe, ob der Kunde existiert
        //$customer = \App\Models\Customer::where('uuid', $customerUuid)->first();
        $customer = \App\Models\Company::where('ulid', $customerUuid)->first();

        if (!$customer || !$customer->hasAccessToTool($tool)) {
            // Zugriff verweigern, wenn der Kunde keinen Zugang hat
            return response('Unauthorized', 403);
        }


        // HTTP-Referer aus dem Request
        $httpReferrer = $request->header('referer');

        if ($httpReferrer) {
            // Benutze updateOrCreate, um count hochzuzählen
            Referrer::updateOrInsert(
                ['referrer' => $httpReferrer, 'ulid' => $customerUuid], // Suchkriterien
                [
                    'count' => \DB::raw('count + 1'), // Inkrementiere count
                    'updated_at' => now(), // Aktualisiere updated_at
                    'created_at' => now(), // Setze created_at beim Insert
                ]
            );
        }

        return $next($request);
    }

}
