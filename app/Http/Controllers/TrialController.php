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
        // 🔥 BLOCKLIST (quick & dirty)
        $blockedDomains = [
            '10minutemail.com',
            '10minemail.com',
            'wegwerfemail.com',
            'mailinator.com',
            'guerrillamail.com',
            'trashmail.com',
            'fakemailgenerator.com',
            'tempmail.com',
            'byom.de',
            'fakeinbox.com',
            'getnada.com',
            'maildrop.cc',
            'dispostable.com',
            'yopmail.com',
            'sharklasers.com',
            'throwawaymail.com',
            'emailondeck.com',
            'mintemail.com',
            'spamgourmet.com',
            'mailnesia.com',
            'mailnull.com',
            'mytemp.email',
            'inboxkitten.com',
            'anonymbox.com',
        ];

        // 1) Validate + Honeypot
        $data = $request->validate([
            'url'        => ['required', 'url', 'max:2048'],
            'first_name' => ['required', 'string', 'max:100'],
            'last_name'  => ['required', 'string', 'max:100'],
            'email'      => ['required', 'email', 'max:255'],
            'consent'    => ['accepted'],
            'website'    => ['nullable', 'max:0'], // Honeypot
        ]);

        // 🔥 EMAIL DOMAIN CHECK (JETZT GREIFT ES)
        $email = strtolower($data['email']);
        $domain = substr(strrchr($email, "@"), 1);

        foreach ($blockedDomains as $blocked) {
            if (str_ends_with($domain, $blocked)) {
                return response()->json([
                    'errors' => [
                        'email' => ['Bitte verwenden Sie eine echte E-Mail-Adresse.']
                    ]
                ], 422);
            }
        }

        if (RateLimiter::tooManyAttempts('trial:' . $request->ip(), 5)) {

            if ($request->expectsJson()) {
                return response()->json([
                    'errors' => [
                        'email' => ['Bitte später erneut versuchen.']
                    ]
                ], 429);
            }

            return back()
                ->withErrors(['email' => 'Bitte später erneut versuchen.'])
                ->withInput();
        }
        RateLimiter::hit('trial:' . $request->ip(), 60);

        $fullName = trim($data['first_name'] . ' ' . $data['last_name']);

        // 3) User anlegen/holen
        $user = User::firstOrCreate(
            ['email' => $email],
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
            ['slug' => Str::slug('trial-' . $user->id)]
        );

        // 7) User <-> Company verknüpfen
        $user->companies()->syncWithoutDetaching([$company->id]);

        // 8) Pa11y-URL anlegen
        $pa11y = Pa11yUrl::firstOrCreate([
            'company_id' => $company->id,
            'url'        => $data['url'],
        ]);

        // 9) Scan sofort im Hintergrund starten
        $cmd = "php " . base_path('artisan') . " scan:accessibility-21 {$pa11y->id} > /dev/null 2>&1 &";
        shell_exec($cmd);

        // 10) Verify-Link
        $verifyUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addHours(48),
            [
                'id'   => $user->getKey(),
                'hash' => sha1($user->getEmailForVerification()),
            ]
        );

        // 11) Mail senden
        Mail::to($user->email)->send(new TrialVerifyMail(
            verifyUrl: $verifyUrl,
            scannedUrl: $pa11y->url,
            plainPassword: $plainPassword ?? '• • • • • • • •',
            userEmail: $user->email,
        ));

        // JSON
        if ($request->expectsJson()) {
            return response()->json([
                'ok'         => true,
                'message'    => 'Verification mail sent.',
                'user_id'    => $user->id,
                'company_id' => $company->id,
                'url_id'     => $pa11y->id,
            ], 201);
        }

        return response()->json([
            'ok' => true
        ]);
    }
}
