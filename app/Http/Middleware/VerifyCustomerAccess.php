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
        $company_id = $request->route('ulid');
        $tool = $request->route('tool'); // Tool-Name oder Typ aus der URL

        // Prüfe, ob der Kunde existiert
        //$customer = \App\Models\Customer::where('uuid', $company_id)->first();
        $customer = \App\Models\Company::where('ulid', $company_id)->first();

        if (!$customer || !$customer->hasAccessToTool($tool)) {
            // Zugriff verweigern, wenn der Kunde keinen Zugang hat
            return response('Unauthorized', 403);
        }


        // HTTP-Referer aus dem Request
        $httpReferrer = $request->header('referer');


        if ($httpReferrer) {
            $referrer = Referrer::where('referrer', $httpReferrer)
                ->where('ulid', $company_id)
                ->first();


            // verschieben !
            $this->createPa11yUrlAndScan($customer->id, $httpReferrer);



            if (!$referrer) {
                // Referrer nicht vorhanden, also neu erstellen
                Referrer::create([
                    'referrer' => $httpReferrer,
                    'ulid' => $company_id,
                    'count' => 1,
                ]);


            } else {
                // Referrer existiert, also nur count aktualisieren
                $referrer->increment('count');
            }


        }

        return $next($request);
    }

    /**
     * Speichert die URL und startet den Scan für die neue URL.
     *
     * @param string $company_id
     * @param string $httpReferrer
     * @return void
     */
    /**
     * Erstelle einen neuen Pa11yUrl-Eintrag und starte den Scan.
     *
     * @param int $companyId
     * @param string $referrer
     * @return void
     */
    private function createPa11yUrlAndScan(int $companyId, string $referrer): void
    {
        // Pa11yUrl erstellen
        $url = Pa11yUrl::create([
            'company_id' => $companyId,
            'url' => $referrer,
        ]);

        // Artisan-Befehl im Hintergrund ausführen (ohne den Webserver zu blockieren)
        $command = "php ".base_path('artisan')." scan:accessibility --urls={$url->id} --levels=A,AA,AAA > /dev/null 2>&1 &";
        exec($command);
    }

}
