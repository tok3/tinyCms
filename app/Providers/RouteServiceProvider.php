<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        RateLimiter::for('fixstern-image-description', function (Request $request) {
            $ulid = (string) $request->input('ulid', 'unknown');

            return [
                Limit::perMinute(240)->by($request->ip() . '|' . $ulid),
                Limit::perMinute(2000)->by($ulid),
            ];
        });

        RateLimiter::for('fixstern-eztext', function (Request $request) {
            $ulid = (string) $request->input('ulid', 'unknown');

            return [
                Limit::perMinute(100)->by($request->ip() . '|' . $ulid),
                Limit::perMinute(800)->by($ulid),
            ];
        });

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::group([], base_path('routes/service.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }
}
