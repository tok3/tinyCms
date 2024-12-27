<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Referrer;
use App\Models\Pa11yUrl;
use Illuminate\Support\Facades\Artisan;

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
            $referrer =  Referrer::updateOrInsert(
                ['referrer' => $httpReferrer, 'ulid' => $customerUuid], // Suchkriterien
                [
                    'count' => \DB::raw('count + 1'), // Inkrementiere count
                    'updated_at' => now(), // Aktualisiere updated_at
                ]
            );


            // Wenn ein neuer Referrer erstellt wurde, die URL speichern und den Scan starten
            if ($referrer && $referrer->wasRecentlyCreated) {
                $this->createPa11yUrlAndScan($customerUuid, $httpReferrer);
            }

        }

        return $next($request);
    }

    /**
     * Speichert die URL und startet den Scan für die neue URL.
     *
     * @param string $customerUuid
     * @param string $httpReferrer
     * @return void
     */
    protected function createPa11yUrlAndScan(string $customerUuid, string $httpReferrer)
    {
        // Speichern der URL in der Pa11yUrl-Tabelle
        $pa11yUrl = Pa11yUrl::create([
            'url' => $httpReferrer,
            'company_id' => $customerUuid, // Die ID der Company, die dem Referrer zugeordnet ist
        ]);

        // Logge die URL-ID und starte den Scan für diese URL
        \Log::info('Starting scan for newly added Pa11yUrl', ['url_id' => $pa11yUrl->id]);

        // Starte den Artisan-Befehl für diese URL
        Artisan::call('scan:accessibility', [
            'urls' => [$pa11yUrl->id],  // Nur die neu erstellte URL-ID übergeben
            '--levels' => 'A,AA,AAA'   // Alle Levels scannen
        ]);
    }

}
