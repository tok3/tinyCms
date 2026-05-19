<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class RedirectToCentralLoginController extends Controller
{
    public function __invoke(): RedirectResponse
    {
        return new RedirectResponse(url('/login'));
    }
}
