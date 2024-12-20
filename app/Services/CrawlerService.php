<?php
namespace App\Services;


use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use App\Models\Domain;
use App\Models\Domainurl;
use Illuminate\Support\Facades\DB;

class CrawlerService
{

    public function crawlRefresh():void
    {

    }
    public function crawlDomain($domain_id, $name)
    {
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
        $result = file_get_contents('http://127.0.0.1:4000/start-crawl', false, $context);

        if ($result === FALSE) {
            //die('Error calling crawler');
            Log::info('Error calling crawler');
        }
        //TODO: Add error handling

        if ($result === FALSE) {
            return "{'status': 1}"; // erronious
        }

        return "{'status': 0}";

    }

    public function storeCrawled():void
    {
        $folderPath = storage_path('app/crawled_sites');

        $files = File::files($folderPath);

        foreach ($files as $file) {

            $filename = pathinfo($file->getFilename(), PATHINFO_FILENAME);


            $content = File::get($file->getPathname());
            $data = json_decode($content, true);

            if (json_last_error() !== JSON_ERROR_NONE) {
                // Handle JSON decoding error, skip this file
                continue;
            }


            $currentUrls = Domainurl::where('domain_id', $filename)->pluck('url')->toArray();
            $domain = Domain::where('id', $filename)->first();

            $urlsToDelete = array_diff($currentUrls, $data);
            $urlsToAdd = array_diff($data, $currentUrls);

            Domainurl::whereIn('url', $urlsToDelete)
                ->delete();


            $newRecords = array_map(fn($url) => ['url' => $url, 'domain_id' => $filename, 'company_id' => $domain->company_id, 'created_at' => now(), 'updated_at' => now()], $urlsToAdd);

            //DB::table('domainurls')->insert($newRecords);
            foreach($newRecords as $record){
                Domainurl::create($record);
            }


            /*
            var_dump( [
                'deleted' => count($urlsToDelete),
                'added' => count($urlsToAdd),
            ]);
            */


            //TODO reinnehmen
            File::delete($file->getPathname());


        //return response()->json(['status' => 'Files processed and removed successfully']);
        }
        return;
    }

}
