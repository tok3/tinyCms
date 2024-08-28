<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): RedirectResponse
    {
        $user = User::where('id', $request->input('id'))->first();

        if (!hash_equals((string)$user->getKey(), (string) $request->input('id')))
        {

            return back()->with('error', 'no-match');

            return false;

        }

        if (!hash_equals(sha1($user->getEmailForVerification()), (string) $request->input('token')))
        {
            return back()->with('error', 'no-match');

            return false;
        }


        if ($user->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProvider::HOME);
        }

        $user->sendEmailVerificationNotification();


        return back()->with('status', 'verification-link-sent');
    }
}
