<?php

namespace App\Filament\Resources\Shared\EvaluationResource\Pages;

use App\Filament\Resources\Shared\EvaluationResource;
use Filament\Resources\Pages\Page;
use \App\Models\Evaluation;
use \App\Models\Domainurl;
use \App\Services\EvaluationService;

class ViewEvaluation extends Page
{
    protected static string $resource = EvaluationResource::class;

    protected static string $view = 'filament.resources.shared.evaluation-resource.pages.view-evaluation';


    protected function getViewData(): array
    {
        $latest = Evaluation::where('domainurl_id', request()->route('record'))->latest()->first();

        if($latest == null){
            /*return [
                'evaluation' => '',
                'url' => '',
                'created_at' => '',
                'passed' => '',
                'warning' => '',
                'failed' => '',
                'inapplicable' => '',
            ];*/
            $service = new EvaluationService();
            $service->evaluateUrl(request()->route('record'));
            $latest = Evaluation::where('domainurl_id', request()->route('record'))->latest()->first();
        }

            $domurl = Domainurl::where('id', $latest->domainurl_id)->first();
            return [
                'evaluation' => json_decode($latest->evaluation, false, 2147483647),
                'url' => $domurl->url,
                'created_at' => $latest->created_at,
                'passed' => $latest->passed,
                'warning' => $latest->warning,
                'failed' => $latest->failed,
                'inapplicable' => $latest->inapplicable,
            ];

        /*
        $tmp = json_decode($latest->evaluation, null, 2147483647);
        foreach($tmp->{$domurl->url}->modules as $modulekey => $module) {
            foreach($module->assertions as $assertionkey => $assertion) {
                var_dump($assertion->metadata->url);
            }
        }
        die();
        */

    }


}
