<?php

namespace App\Observers;

use \App\Models\Evaluation;
use \App\Models\Domainurl;
use Illuminate\Support\Facades\Log;
class EvaluationObserver
{
    /*
    public function created(Evaluation $evaluation)
    {
        $url = Domainurl::where('id', $evaluation->domainurl_id)->first();
        $json = json_decode($evaluation->evaluation);
        Evaluation::where('id' , $evaluation->id)->update(
            [
                'passed' => $json->{$url->url}->metadata->passed,
                'warning' => $json->{$url->url}->metadata->warning,
                'failed' => $json->{$url->url}->metadata->failed,
                'inapplicable' => $json->{$url->url}->metadata->inapplicable,
                'metadata' => json_encode($json->{$url->url}->metadata),
            ]
        );


        // find oldest an latest value and update domainurl
        $oldest = Evaluation::where('domainurl_id', $evaluation->domainurl_id)->oldest()->first();
        Domainurl::where('id', $evaluation->domainurl_id)->update(
            [
                'passed_oldest' => $oldest->passed,
                'warning_oldest' => $oldest->warning,
                'failed_oldest' => $oldest->failed,
                'inapplicable_oldest' => $oldest->inapplicable,
                'passed_latest' => $json->{$url->url}->metadata->passed,
                'warning_latest' => $json->{$url->url}->metadata->warning,
                'failed_latest' => $json->{$url->url}->metadata->failed,
                'inapplicable_latest' => $json->{$url->url}->metadata->inapplicable,
            ]
        );


    }
    */
    public function updated(Evaluation $evaluation)
    {
        $url = Domainurl::where('id', $evaluation->domainurl_id)->first();
        $json = json_decode($evaluation->evaluation);
        Evaluation::where('id' , $evaluation->id)->update(
            [
                'passed' => $json->{$url->url}->metadata->passed,
                'warning' => $json->{$url->url}->metadata->warning,
                'failed' => $json->{$url->url}->metadata->failed,
                'inapplicable' => $json->{$url->url}->metadata->inapplicable,
                'metadata' => json_encode($json->{$url->url}->metadata),
            ]
        );

        // find oldest an latest value and update domainurl
        //$latest = Evaluation::where('domainurl_id', $evaluation->domainurl_id)->latest()->first();

        $oldest = Evaluation::where('domainurl_id', $evaluation->domainurl_id)->oldest()->first();
        Domainurl::where('id', $evaluation->domainurl_id)->update(
            [
                'passed_oldest' => $oldest->passed,
                'warning_oldest' => $oldest->warning,
                'failed_oldest' => $oldest->failed,
                'inapplicable_oldest' => $oldest->inapplicable,
                'passed_latest' => $json->{$url->url}->metadata->passed,
                'warning_latest' => $json->{$url->url}->metadata->warning,
                'failed_latest' => $json->{$url->url}->metadata->failed,
                'inapplicable_latest' => $json->{$url->url}->metadata->inapplicable,
            ]
        );


    }
}
