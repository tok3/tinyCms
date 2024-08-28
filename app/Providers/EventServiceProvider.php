<?php
namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Laravel\Cashier\Events\FirstPaymentPaid;
use Laravel\Cashier\Events\FirstPaymentFailed;
use Laravel\Cashier\Events\OrderPaymentPaid;
use Laravel\Cashier\Events\OrderPaymentFailed;
use App\Listeners\HandleFirstPaymentPaid;
use App\Listeners\HandleFirstPaymentFailed;
use App\Listeners\HandleOrderPaymentPaid;
use App\Listeners\HandleOrderPaymentFailed;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        FirstPaymentPaid::class => [
            HandleFirstPaymentPaid::class,
        ],
        FirstPaymentFailed::class => [
            HandleFirstPaymentFailed::class,
        ],
        OrderPaymentPaid::class => [
            HandleOrderPaymentPaid::class,
        ],
        OrderPaymentFailed::class => [
            HandleOrderPaymentFailed::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
