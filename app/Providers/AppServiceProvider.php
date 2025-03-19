<?php

namespace App\Providers;

use App\Http\Responses\LogoutResponse;
use Illuminate\Support\ServiceProvider;
use Filament\Http\Responses\Auth\Contracts\LogoutResponse as LogoutResponseContract;
use Filament\Support\Assets\Css;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use App\Http\ViewComposers\TopNavigationComposer;
use Filament\Forms\Components\Actions;
use App\Models\Company;
use Laravel\Cashier\Cashier;
use Illuminate\Support\Facades\URL;
use Cviebrock\EloquentSluggable\SluggableObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {



        $this->app->bind(LogoutResponseContract::class, LogoutResponse::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(\Illuminate\Http\Request $request): void
    {

        if (!\Illuminate\Support\Facades\App::runningUnitTests()) {
            Company::observe(SluggableObserver::class);
        }

        if (env(key: 'APP_ENV') === 'local' && request()->server(key: 'HTTP_X_FORWARDED_PROTO') === 'https') {
            Url::forceScheme(scheme: 'https');
        }

       // Cashier::useSubscriptionModel(Subscription::class);

        FilamentAsset::register([
           // Css::make('custom-stylesheet', __DIR__ . '/../../public/build/assets/custom.css'),
            Css::make('filament', __DIR__ . '/../../public/css/filament/filament/app.css'),
            Js::make('be-custom', asset('js/be-custom.js')),

        ]);



        View::composer('components.site-partials.headers.default-navbar', TopNavigationComposer::class);
        view()->composer('components.site-partials.footers.default-footer', \App\Http\ViewComposers\FooterNavigationComposer::class);

    }


    protected function resolveViteAssetPath(string $originalPath): ?string
    {
        $manifestPath = public_path('build/manifest.json');

        if (!File::exists($manifestPath)) {
            return null; // Manifest-Datei existiert nicht
        }

        $manifest = json_decode(File::get($manifestPath), true);
        $assetPath = $manifest[$originalPath]['file'] ?? null;

        if (!$assetPath) {
            return null; // Asset wurde im Manifest nicht gefunden
        }

        return asset("build/{$assetPath}");
    }

}
