<?php

namespace App\Jobs;

use App\Models\Pa11yUrl;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Artisan;

class ScanAccessibilityJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;
    public $timeout = 300;

    protected int $pa11yUrlId;

    public function __construct(int $pa11yUrlId)
    {
        $this->pa11yUrlId = $pa11yUrlId;
        $this->onQueue('accessibility');
    }

    public function handle(): void
    {
        $pa11yUrl = Pa11yUrl::findOrFail($this->pa11yUrlId);
        $standard = getCurrentWcagStandard($pa11yUrl);
        $command = getWcagScanCommand($standard);
        $arguments = [
            'urls' => [$pa11yUrl->id],
            '--warnings' => true,
        ];

        if ($command === 'scan:accessibility-22') {
            $arguments['--standard'] = getWcagScanStandardOption($standard);
        }

        \Log::info("Dispatching accessibility scan for {$pa11yUrl->url} using {$command} ({$standard}).");

        Artisan::call($command, $arguments);

        \Log::info("Finished accessibility scan for {$pa11yUrl->url} using {$command} ({$standard}).");
    }
}
