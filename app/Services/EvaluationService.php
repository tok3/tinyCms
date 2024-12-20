<?php

namespace App\Services;


use Illuminate\Support\Facades\Log;
use App\Models\Evaluation;
use App\Models\Domainurl;
use GuzzleHttp\Client;
use Illuminate\Support\Str;


class EvaluationService
{
    public function evaluateUrl($domainurl_id)
    {

       $domainurl = Domainurl::where('id', '=', $domainurl_id)->first();


        $client = new Client();
        $res = null;
        try {
            // Send GET request to the program on port 3000
            $response = $client->get('http://127.0.0.1:3000/evaluate', [
                'query' => ['url' => $domainurl->url], // Add the parameter to the query string
            ]);

            // Get the response body and status code
            $responseBody = $response->getBody()->getContents();
            $statusCode = $response->getStatusCode();

            $res = response()->json([
                'status' => $statusCode,
                'data' => $responseBody,
            ], $statusCode);
        } catch (\Exception $e) {
            // Handle exceptions
            $res = response()->json([
                'error' => $e->getMessage(),
            ], 500);
        }

        $responseArray = json_decode($res->getContent(), true);

        Evaluation::create(
            [
                'id' => (string) Str::ulid(),
                'domainurl_id' => $domainurl->id,
                'company_id' => $domainurl->company_id,
                'domain_id' => $domainurl->domain_id,
                'evaluation' => $responseArray['data'],
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );
        //TODO: Add error handling



        return;
    }

    public function  evaluateUrls():void
    {

        $domainurls = Domainurl::all();
        foreach($domainurls as $domainurl) {
            $evaluation = Evaluation::where('domainurl_id', $domainurl->id)->latest()->first();
            if($evaluation == null || $evaluation->created_at < now()->subDays(2)) {
                $this->evaluateUrl($domainurl->id);
            }
        }

    }

}
