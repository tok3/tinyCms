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
        /*
        $schedule->call(function () {
            // Call the service directly
            app(\App\Services\CrawlerService::class)->storeCrawled();
        })->everyFiveMinutes();
        */
        $schedule->job(new \App\Jobs\RunCrawlerServiceJob)->everyFiveMinutes();
        $schedule->call(function () {
            // Call the service directly
            app(\App\Services\EvaluationService::class)->EvaluateUrls();
        })->everyThreeMinutes();
        $schedule->call(function () {
            // Call the service directly
            app(\App\Services\EvaluationService::class)->storeEvaluated();
        })->everyThreeMinutes();
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
