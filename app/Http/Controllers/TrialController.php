<?php

namespace App\Http\Controllers;

use App\Mail\TrialVerifyMail;
use App\Models\Company;
use App\Models\Pa11yUrl;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class TrialController extends Controller
{
    public function create()
    {
        return view('trial.form');
    }

    public function info()
    {
        return view('trial.info');
    }
    public function store(Request $request)
    {
        // 1) Validate + Honeypot
        $data = $request->validate([
            'url'        => ['required', 'url', 'max:2048'],
            'first_name' => ['required', 'string', 'max:100'],
            'last_name'  => ['required', 'string', 'max:100'],
            'email'      => ['required', 'email', 'max:255'],
            'consent'    => ['accepted'],
            'website'    => ['nullable', 'max:0'], // Honeypot
        ]);

        // ── NEU: Disposable / Wegwerf-Email Blacklist ───────────────────────────────
        $email = strtolower(trim($data['email']));
        $domain = explode('@', $email)[1] ?? '';  // Sicher: falls keine @ → leer

        $blockedDomains = [
            '10minutemail.com', '10minemail.com', 'temp-mail.org', 'tempmail.org',
            'guerrillamail.com', 'grr.la', 'sharklasers.com', 'mailinator.com',
            'yopmail.com', 'yopmail.fr', 'yopmail.net', 'trashmail.com',
            'throwawaymail.com', 'emailondeck.com', 'fakeinbox.com',
            'getnada.com', 'maildrop.cc', 'dispostable.com',
            'tempmail.com', 'tempemail.cc', 'tempail.com',
            'byom.de', 'mailnesia.com', 'mailnull.com', 'mytemp.email',
            'inboxkitten.com', 'anonymbox.com', 'mail7.io', 'tempmail.plus',
            // ── 2025/2026 Ergänzungen (aus gängigen Listen) ──
            'gufum.com', 'kekemail.me', 'moakt.com', '33mail.com',
            'dropmail.me', '33m.co', 'airmail.cc', 'generator.email',
            'mail.tm', 'proton.me', 'tuta.io', // ← manchmal missbraucht, aber Vorsicht: Proton & Tuta sind eigentlich seriös → nur wenn du sehr streng filtern willst
        ];

        if (in_array($domain, $blockedDomains)) {
            if ($request->expectsJson()) {
                return response()->json([
                    'errors' => [
                        'email' => ['Bitte verwenden Sie eine echte, permanente E-Mail-Adresse (keine temporären Dienste).']
                    ]
                ], 422);
            }

            return back()
                ->withErrors(['email' => 'Bitte verwenden Sie eine echte, permanente E-Mail-Adresse (keine temporären Dienste).'])
                ->withInput();
        }

        // Optional: noch robuster – Subdomain-Check (z. B. xyz.temp-mail.org)
        foreach ($blockedDomains as $bad) {
            if (str_ends_with($domain, $bad)) {
                // gleiche Fehlerbehandlung wie oben
                if ($request->expectsJson()) {
                    return response()->json([
                        'errors' => ['email' => ['Bitte verwenden Sie eine echte E-Mail-Adresse – temporäre Adressen sind nicht erlaubt.']]
                    ], 422);
                }
                return back()
                    ->withErrors(['email' => 'Bitte verwenden Sie eine echte E-Mail-Adresse – temporäre Adressen sind nicht erlaubt.'])
                    ->withInput();
            }
        }
        // ──────────────────────────────────────────────────────────────────────────────

        // 2) Rate limit ...
        if (RateLimiter::tooManyAttempts('trial:' . $request->ip(), 5)) {
            return back()->withErrors(['email' => 'Bitte später erneut versuchen.'])->withInput();
        }
        RateLimiter::hit('trial:' . $request->ip(), 60);

        $fullName = trim($data['first_name'] . ' ' . $data['last_name']);
        // 3) User anlegen/holen
        $user = User::firstOrCreate(
            ['email' => strtolower($data['email'])],
            ['name'  => $fullName]
        );

        // 4) Zufälliges Passwort setzen (nur falls der User noch keines hat)
        $plainPassword = null;
        if (empty($user->password)) {
            $plainPassword = Str::random(8);
            $user->password = Hash::make($plainPassword);
        }

        // 5) Consent-Felder setzen
        $user->consented_at    = now();
        $user->consent_version = config('legal.privacy_policy_version', 'v1.0');
        $user->consent_ip      = $request->ip();
        $user->save();

        // 6) Trial-Company minimal anlegen
        $company = Company::firstOrCreate(
            ['name' => 'Trial-' . $user->id],
            [
                'slug' => Str::slug('trial-' . $user->id),
            ]
        );

        $company->update([
            'source' => 'wcag_tool',
        ]);

        // 7) User <-> Company verknüpfen (Relation ggf. anpassen)
        $user->companies()->syncWithoutDetaching([$company->id]);

        // 8) Pa11y-URL anlegen
        $pa11y = Pa11yUrl::firstOrCreate([
            'company_id' => $company->id,
            'url'        => $data['url'],
        ]);

        // 9) Scan sofort im Hintergrund starten
        $cmd = "php " . base_path('artisan') . " scan:accessibility-21 {$pa11y->id} > /dev/null 2>&1 &";
        shell_exec($cmd);

        // 10) Breeze-Verify-Link signiert erstellen (48h gültig)
        // Achtung: Standard-Route 'verification.verify' hat 'auth' + 'signed' Middleware.
        // Der Nutzer muss beim Klick eingeloggt sein (ansonsten wird er zum Login geleitet).
        $verifyUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addHours(48),
            [
                'id'   => $user->getKey(),
                'hash' => sha1($user->getEmailForVerification()),
            ]
        );

        // 11) Eigene Trial-Mail mit Verify-Link + (falls frisch vergeben) Passwort senden
        // Falls der User bereits existierte und schon ein Passwort hatte, senden wir kein Plaintext-Passwort mit.
        Mail::to($user->email)->send(new TrialVerifyMail(
            verifyUrl: $verifyUrl,
            scannedUrl: $pa11y->url,
            plainPassword: $plainPassword ?? '• • • • • • • •',
            userEmail: $user->email,
        ));

        // === JSON-Antwort für AJAX ===
        if ($request->expectsJson()) {
            return response()->json([
                'ok'         => true,
                'message'    => 'Verification mail sent.',
                'user_id'    => $user->id,
                'company_id' => $company->id,
                'url_id'     => $pa11y->id,
            ], 201);
        }
        // Optional: aktuellen Request-User einloggen (für direkten Zugriff auf /dashboard etc.)
        //Auth::login($user);

        // 12) Info-Seite
        return redirect()->route('trial.info');
    }
}
