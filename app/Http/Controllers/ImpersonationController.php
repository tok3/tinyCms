<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Support\ImpersonationManager;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ImpersonationController extends Controller
{
    public function start(Request $request, User $user, ImpersonationManager $impersonation): RedirectResponse
    {
        return $impersonation->start($request, $user);
    }

    public function stop(Request $request, ImpersonationManager $impersonation): RedirectResponse
    {
        return $impersonation->stop($request);
    }
}
