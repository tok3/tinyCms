<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Referrer;
use App\Models\Pa11yUrl;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
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
            // Settings holen
            $settings     = $customer->settings; // relationship('settings', CompanySetting::class)
            $validDomains = $this->explodeValidDomains($settings->valid_domains ?? null); // -> array normalisierter Root-Domains
            $excludeQuery = (bool) ($settings->exclude_query_string_urls ?? true);

            // Root-Domain des Referrers bestimmen (z. B. example.com)
            $refRoot = $this->parseRootDomain($httpReferrer);
            if($customer->id == 503){

                \Log::info($httpReferrer);
                \Log::info($request->headers->all());
            }

            if ($refRoot) {
                // Wenn valid_domains gesetzt sind → Whitelist erzwingen
                $isAllowed = empty($validDomains) || in_array($refRoot, $validDomains, true);

                if ($isAllowed) {
                    // URL für DB normalisieren (https, Host lower, path, Query je nach Setting; #fragment wird verworfen)
                    $refForDb = $this->normalizeUrl($httpReferrer, $excludeQuery);

                    if ($refForDb) {
                        // Lock pro (ulid, url) → verhindert Race-Conditions
                        $lockKey = 'ref:'.$company_id.':'.sha1($refForDb);
                        Cache::lock($lockKey, 5)->block(5, function () use ($company_id, $refForDb, $customer) {

                            // Idempotent speichern
                            $ref = Referrer::firstOrCreate(
                                ['ulid' => $company_id, 'referrer' => $refForDb],
                                ['count' => 0]
                            );

                            if ($ref->wasRecentlyCreated) {
                                // Erstanlage → Scan anstoßen
                                $this->createPa11yUrlAndScan($customer, $refForDb);
                            } else {
                                // Bereits vorhanden → nur Count erhöhen
                                $ref->increment('count');
                            }
                        });
                    }
                }
                // else: Domain nicht auf Whitelist → nichts speichern/scannen
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

    private function createPa11yUrlAndScan($company, string $referrer): void
    {


        // Prüfen, wie viele URLs die Firma bereits hat
        $urlCount = Pa11yUrl::where('company_id', $company->id)->count();

        // Falls die Firma bereits max URLs hat, keine weitere speichern
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

    private function parseRootDomain(?string $input): ?string
    {
        if (empty($input)) return null;

        // Scheme sicherstellen, damit parse_url stabil ist
        if (!preg_match('~^https?://~i', $input)) {
            $input = 'https://' . ltrim($input);
        }

        $parts = parse_url($input);
        if (!isset($parts['host'])) return null;

        // IDN → ASCII (falls intl vorhanden), lowercase
        $host = mb_strtolower($parts['host']);
        if (function_exists('idn_to_ascii')) {
            $ascii = idn_to_ascii($host, IDNA_DEFAULT, INTL_IDNA_VARIANT_UTS46);
            if ($ascii) $host = $ascii;
        }

        // "www." weg
        $host = preg_replace('~^www\.~i', '', $host);

        // sehr einfache Root-Domain (letzte 2 Labels). Achtung: co.uk & Co. → später ggf. Domain-Parser nutzen.
        $labels = explode('.', $host);
        if (count($labels) >= 2) {
            $root = implode('.', array_slice($labels, -2));
        } else {
            $root = $host;
        }

        return $root;
    }

    private function normalizeUrl(string $url, bool $excludeQuery): ?string
    {
        if (!preg_match('~^https?://~i', $url)) {
            $url = 'https://' . ltrim($url);
        }
        $parts = parse_url($url);
        if (!isset($parts['host'])) return null;

        $scheme = 'https';
        $host   = mb_strtolower($parts['host']);
        $path   = $parts['path'] ?? '/';

        // Query ggf. verwerfen
        $query  = ($excludeQuery ? '' : (isset($parts['query']) ? '?' . $parts['query'] : ''));
        // Fragmente ignorieren
        return $scheme . '://' . $host . $path . $query;
    }

    private function explodeValidDomains(?string $raw): array
    {
        if (!$raw) return [];
        // Komma ODER Zeilenumbrüche
        $items = preg_split('/[\s,]+/', $raw, -1, PREG_SPLIT_NO_EMPTY);
        $roots = [];
        foreach ($items as $i) {
            $root = $this->parseRootDomain($i);
            if ($root) $roots[$root] = true; // unique via key
        }
        return array_keys($roots);
    }

}
