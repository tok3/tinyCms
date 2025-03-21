<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Pa11yUrl;
use App\Models\Company;
use Illuminate\Support\Facades\DB;


class CheckCompanyUrl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $url = Pa11yUrl::where('id', '=', $request->id)->first();
        $company = Company::where('id', '=', $url->company_id)->first();
        $compuser = DB::table('company_user')
            ->where('company_id', '=', $company->id)
            ->where('user_id', '=', auth()->user()->id)
            ->first();
        if(!$compuser && !auth()->user()->is_admin){
            abort(403);
        }

        return $next($request);
    }
}
