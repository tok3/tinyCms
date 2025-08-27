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
            'email'      => ['required', 'email', 'max:255'],
            'accept_tos' => ['accepted'],
            'consent'    => ['accepted'],
            'website'    => ['nullable', 'max:0'], // Honeypot
        ]);

        // 2) Rate limit (z. B. 5/Minute pro IP)
        if (RateLimiter::tooManyAttempts('trial:' . $request->ip(), 5)) {
            return back()->withErrors(['email' => 'Bitte später erneut versuchen.'])->withInput();
        }
        RateLimiter::hit('trial:' . $request->ip(), 60);

        // 3) User anlegen/holen
        $user = User::firstOrCreate(
            ['email' => strtolower($data['email'])],
            ['name' => Str::before($data['email'], '@')]
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
            ['slug' => Str::slug('trial-' . $user->id)]
        );

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
            plainPassword: $plainPassword ?? '• • • • • • • •'
        ));

        // Optional: aktuellen Request-User einloggen (für direkten Zugriff auf /dashboard etc.)
        Auth::login($user);

        // 12) Info-Seite
        return redirect()->route('trial.info');
    }
}
