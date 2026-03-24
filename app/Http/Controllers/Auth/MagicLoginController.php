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
                ->with('error', 'Der Login-Link ist ungültig oder abgelaufen.');
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

            if ($url = $company->pa11yUrls()->first()) {
                return redirect("/dashboard/{$company->id}/firmament-issues/grouped/2.1?url_id={$url->id}")
                    ->with('success', 'Eingeloggt – deine Ergebnisse');
            }

            return redirect($user->getPanelUri() . '?magic=1&no_url=1')
                ->with('success', 'Eingeloggt – kein Scan vorhanden');
        }

        return redirect($user->getPanelUri() . '?magic=1')
            ->with('success', 'Willkommen zurück!');
    }
}
