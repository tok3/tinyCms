<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\CompanyUser;
use Symfony\Component\HttpFoundation\Response;

class CheckCompanyUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $user = CompanyUser::where('user_id', '=', auth()->user()->id)->first();
        if($user->company_id != $request->id && !auth()->user()->is_admin){
            abort(403);
        }
        return $next($request);
    }
}
