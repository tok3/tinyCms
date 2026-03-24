<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {

        $schedule->command('app:generate-recurring-invoices')->twiceDaily(8, 20);
        $schedule->command('sepa:mail-due')->dailyAt('06:00')->timezone('Europe/Berlin');

        $schedule->command('determine:scan')->hourly();
        $schedule->command('backup:clean')->daily()->at('13:00');
        $schedule->command('backup:run')->daily()->at('13:30');
        $schedule->command('app:cleanup')->daily()->at('9:30');
        $schedule->command('app:image-description')->everyThreeMinutes();
        $schedule->command('app:processImages')->everyThreeMinutes();
        $schedule->command('crawl:process')->everyThreeMinutes();

        // Verify Reminder (Aktivierung)
        $schedule->command('followup:verify')
            ->weekdays() // Mo–Fr
            ->when(fn() => in_array(now()->dayOfWeek, [2, 3, 4])) // Di–Do
            ->dailyAt('09:30')
            ->timezone('Europe/Berlin')
            ->withoutOverlapping()
            ->sendOutputTo(storage_path('logs/followup.log'));

        // Followup Mail (Conversion)
        $schedule->command('followup:wcag')
            ->weekdays()
            ->when(fn() => in_array(now()->dayOfWeek, [2, 3, 4])) // Di–Do
            ->dailyAt('10:30')
            ->timezone('Europe/Berlin')
            ->withoutOverlapping()
            ->sendOutputTo(storage_path('logs/followup.log'));

    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
