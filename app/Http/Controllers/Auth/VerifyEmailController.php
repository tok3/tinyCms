<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\verified;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(Request $request): RedirectResponse
    {

        $id = \Request::segment(2);
        $token = \Request::segment(3);
        $expires = (int)\Request::input('expires');
        $user = User::where('id', $id)->first();


        if ($expires > time())
        {


            if (!$user->hasVerifiedEmail())
            {

                if (!hash_equals((string)$user->getKey(), (string)$id))
                {

                    return false;

                }

                if (!hash_equals(sha1($user->getEmailForVerification()), (string)$token))
                {
                    return false;
                }

                $user->markEmailAsVerified();

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
            else
            {

                //die('already verified');

                return redirect(url('/verify-token-expired/' . $id . '/' . $token . '?verified=1'));
            }

        }
        // expireddie();


        if ($user->hasVerifiedEmail())
        {
            return redirect(url('/verify-token-expired/' . $id . '/' . $token . '?verified=1'));
        }

        return redirect(url('/verify-token-expired/' . $id . '/' . $token . '?expired=1'));

        die('token expired');
    }


}
