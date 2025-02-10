<?php

namespace App\Observers;

use App\Models\Pa11yUrl;
use App\Models\Pa11yStatistic;
class Pa11yUrlObserver
{

    /**
     * Falls eine URL gelöscht wird, lösche auch die zugehörigen Statistiken.
     */
    public function deleting(Pa11yUrl $url)
    {
        Pa11yStatistic::where('url_id', $url->id)->delete();
    }

    /**
     * Falls eine URL geändert wird, lösche die Statistiken der alten URL.
     */
    public function updating(Pa11yUrl $url)
    {
        if ($url->isDirty('url')) {
            Pa11yStatistic::where('url_id', $url->id)->delete();
        }
    }

    /**
     * Handle the Pa11yUrl "created" event.
     */
    public function created(Pa11yUrl $pa11yUrl): void
    {
        //
    }

    /**
     * Handle the Pa11yUrl "updated" event.
     */
    public function updated(Pa11yUrl $pa11yUrl): void
    {
        //
    }

    /**
     * Handle the Pa11yUrl "deleted" event.
     */
    public function deleted(Pa11yUrl $pa11yUrl): void
    {
        //
    }

    /**
     * Handle the Pa11yUrl "restored" event.
     */
    public function restored(Pa11yUrl $pa11yUrl): void
    {
        //
    }

    /**
     * Handle the Pa11yUrl "force deleted" event.
     */
    public function forceDeleted(Pa11yUrl $pa11yUrl): void
    {
        //
    }
}
