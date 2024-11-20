<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Notifications\VerifyEmail;
use Illuminate\Auth\Notifications\VerifyEmail as BaseVerifyEmail;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
        $this->registerPolicies();

        \Gate::define('view-analytics', function ($user) {

            return $user->is_admin != 1;
        });

        BaseVerifyEmail::toMailUsing(function ($notifiable, $url) {
            return (new VerifyEmail)->toMail($notifiable);
        });

    }
}
