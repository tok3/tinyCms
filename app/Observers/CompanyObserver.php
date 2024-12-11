<?php

namespace App\Observers;

use App\Models\Company;
use  App\Models\Domain;
use App\Models\Domainurl;
use App\Models\Evaluation;
use Illuminate\Support\Facades\Log;
class CompanyObserver
{
    public function created(Company $company)
    {
        $domid = Domain::updateOrCreate(
            ['company_id' => $company->id],
            ['name' => $company->web]
        );
        $this->triggerCrawler($domid->id, $company->web);
    }

    public function updated(Company $company){
        //check if domain name has really changed
        $dom = Domain::where('company_id', $company->id)->first();
        if($dom->name == $company->web){
            return;
        }

        Domainurl::where('domain_id', $dom->id)->delete();
        Evaluation::where('domain_id', $dom->id)->delete();
        $domid = Domain::updateOrCreate(
            ['company_id' => $company->id],
            ['name' => $company->web]
        );

        $this->triggerCrawler($domid->id, $company->web);

    }

    private function triggerCrawler($domain_id, $name){

        $data = [
            'domain' => $name,
            'id' => $domain_id,
        ];

        $options = [
            'http' => [
                'header'  => "Content-Type: application/json\r\n",
                'method'  => 'POST',
                'content' => json_encode($data),
            ],
        ];

        $context  = stream_context_create($options);
        $result = file_get_contents('http://localhost:4000/start-crawl', false, $context);

        if ($result === FALSE) {
            //die('Error calling crawler');
            Log::info('Error calling evaluator');
        }
        //TODO: Add error handling

        return;
    }
}
