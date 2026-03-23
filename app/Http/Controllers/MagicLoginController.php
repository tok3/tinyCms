<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Filament\Facades\Filament;
use Illuminate\Http\Request;
class MagicLoginController extends Controller
{


    public function login(Request $request, $token)
    {
        $user = User::where('login_token', $token)
            ->where('login_token_expires_at', '>=', now())
            ->firstOrFail();

        Auth::login($user);

        $request->session()->regenerate();
        $request->session()->save();

        return redirect('/' . $user->getPanelUri());
    }
}
