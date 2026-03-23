<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Filament\Facades\Filament;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\verified;
use Illuminate\Http\RedirectResponse;

class MagicLoginController extends Controller
{


    public function login(Request $request, $token)
    {
        $user = User::where('login_token', $token)
            ->where('login_token_expires_at', '>=', now())
            ->firstOrFail();

        Auth::login($user);


        // === Trial-Redirect auf Scan-Ergebnisseite ===
        // Annahmen:
        // - Trial = Company ohne Contracts
        // - Pro Trial-Company genau 1 URL
        $company = $user->companies()->first();

        if ($company && !$company->contracts()->exists())
        {
            session(['current_company_id' => $company->id]);
            if ($url = $company->pa11yUrls()->first())
            {
                return redirect("/dashboard/{$company->id}/firmament-issues/grouped/2.1?url_id={$url->id}");
            }

            // fallback für Trials ohne URL:
            return redirect($user->getPanelUri() . '?verified=1&no_url=1');
        }

        return redirect($user->getPanelUri() . '?verified=1');
    }
}
