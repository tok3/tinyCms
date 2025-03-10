<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
class AuthOrLocal
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // Allow requests from localhost.
        \Log::info($request->ip());
        if ($request->ip() === '92.205.28.21' || $request->ip() === '127.0.0.1' || $request->getHost() === 'localhost' || $request->ip() === '::1') {
            \Log::info(auth()->check());


            if (!auth()->check()) {
                if($request->query('url_id')){
                    $urlId = $request->query('url_id');

                    $userId = DB::table('company_user')
                    ->join('pa11y_urls', 'pa11y_urls.company_id', '=', 'company_user.company_id')
                    ->where('pa11y_urls.id', $urlId)
                    ->select('company_user.user_id')
                    ->first();
                    \Log::info('user id: ' . $userId->user_id);
                    auth()->loginUsingId($userId->user_id); // Replace 1 with a valid user ID.

                }
            }
            return $next($request);

        }


        // Otherwise, enforce authentication.
        if (auth()->check()) {
            \Log::info('user authenticated');
            return $next($request);
        }

        // Redirect unauthenticated users to the login page.
        return redirect()->guest(route('login'));

    }
}
