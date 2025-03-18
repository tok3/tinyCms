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


        if ($httpReferrer)
        {
            $referrer = Referrer::where('referrer', $httpReferrer)
                ->where('ulid', $company_id)
                ->first();
            if (!$referrer)
            {
                // Referrer nicht vorhanden, also neu erstellen
                Referrer::create([
                    'referrer' => $httpReferrer,
                    'ulid' => $company_id,
                    'count' => 1,
                ]);

                $this->createPa11yUrlAndScan($customer, $httpReferrer);

            }
            else
            {
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
    private function createPa11yUrlAndScan($company, string $referrer): void
    {


        // Prüfen, wie viele URLs die Firma bereits hat
        $urlCount = Pa11yUrl::where('company_id', $company->id)->count();

        // Falls die Firma bereits 10 URLs hat, keine weitere speichern
        if ($urlCount >= $company->max_urls) {
            \Log::info("Company {$company->id} hat bereits {$company->max_urls} URLs. Keine weitere URL wird gespeichert.");
            return;
        }

        // Überprüfen, ob die URL bereits existiert
        $existingUrl = Pa11yUrl::where('company_id', $company->id)
            ->where('url', $referrer)
            ->first();

        // Wenn die URL nicht existiert, erstelle sie
        if (!$existingUrl) {
            // Pa11yUrl erstellen
            $url = Pa11yUrl::create([
                'company_id' => $company->id,
                'url' => $referrer,
            ]);

            // Artisan-Befehl im Hintergrund ausführen
            $command = "php " . base_path('artisan') . " scan:accessibility-21 {$url->id} > /dev/null 2>&1 &";
            shell_exec($command);
        }
    }

}
