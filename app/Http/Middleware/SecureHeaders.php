<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecureHeaders
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {

        $response = $next($request);

        // Setze die Sicherheits-Header
        $response->headers->set('X-XSS-Protection', '1; mode=block');
        $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains; preload');
        $response->headers->set('X-Frame-Options', 'DENY');
        $response->headers->set('X-Content-Type-Options', 'nosniff');

        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Access-Control-Allow-Methods', 'GET, POST, OPTIONS');
        $response->headers->set('Access-Control-Allow-Headers', 'Origin, Content-Type, Accept, Authorization');

        // Content-Security-Policy anpassen
        $csp = "default-src 'self'; ";
        $csp .= "script-src 'self' https://cdn.jsdelivr.net https://tracking.hausverw.de 'unsafe-inline'; ";
        $csp .= "style-src 'self' https://fonts.googleapis.com 'unsafe-inline'; ";
        $csp .= "font-src 'self' https://fonts.gstatic.com https://aktion-barrierefrei.de/assets/fonts/ data:; ";
        $csp .= "img-src 'self' data: https:; ";
        $csp .= "connect-src 'self' https://tracking.hausverw.de https://aktion-barrierefrei.de; ";

        // Setze den aktualisierten CSP-Header
        $response->headers->set('Content-Security-Policy', $csp);

        // Referrer-Policy
        $response->headers->set('Referrer-Policy', 'no-referrer-when-downgrade');

        return $response;
    }
}
