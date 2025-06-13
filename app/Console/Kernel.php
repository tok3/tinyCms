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
        // $schedule->command('inspire')->hourly();
        //$schedule->command('scan:accessibility')->dailyAt('23:00');
        //$schedule->command('scan:accessibility-21')->dailyAt('23:00');

        $schedule->command('determine:scan')->hourly();
        $schedule->command('app:generate-recurring-invoices')->twiceDaily(8, 20);

        $schedule->command('backup:clean')->daily()->at('13:00');
        $schedule->command('backup:run')->daily()->at('13:30');
        $schedule->command('app:cleanup')->daily()->at('9:30');
        $schedule->command('app:image-description')->everyFiveMinutes();
        $schedule->command('app:processImages')->everyFiveMinutes();

    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
