<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class MagicLoginController extends Controller
{
    public function __invoke(Request $request, string $token): RedirectResponse
    {

        $user = User::where('login_token', $token)
            ->where('login_token_expires_at', '>', now())
            ->first();


        if (!$user) {
            Log::warning('Ungültiger oder abgelaufener Magic-Login-Token', ['token' => $token]);
            return redirect()->route('login')
                ->with('error', 'Der Login-Link ist ungültig oder bereits abgelaufen.');
        }

        // Token sofort ungültig machen (One-Time-Use)
        $user->update([
            'login_token'          => null,
            'login_token_expires_at' => null,
        ]);

        Auth::login($user, remember: true);

        // Trial-Redirect-Logik (kopiert aus deinem VerifyEmailController)
        $company = $user->companies()->first();


        if ($company && !$company->contracts()->exists()) {

            session(['current_company_id' => $company->id]);

            return redirect("/dashboard/{$company->id}/firmament-urls?tour=1")
                ->with('success', 'Eingeloggt – Ihre Analyse wird geladen');
        }

        return redirect($user->getPanelUri())
            ->with('success', 'Willkommen zurück!');
    }
}
