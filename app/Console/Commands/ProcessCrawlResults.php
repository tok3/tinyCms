<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Models\Pa11yUrl;
use App\Models\Company;

class ProcessCrawlResults extends Command
{
    /*
    protected $signature = 'crawl:process
                           {--output-dir=/Users/tommel/Sites/adHocTesting/qualcrawl/crawled_sites/ : Directory containing crawl JSON files}
                           {--history-dir=/Users/tommel/Sites/adHocTesting/qualcrawl/crawled_sites/history/ : Directory to move processed files}';
                           */
    protected $signature = 'crawl:process
                           {--output-dir=/home/admintfc/crawler/crawled_sites/ : Directory containing crawl JSON files}
                           {--history-dir=/home/admintfc/crawler/crawled_sites/history/ : Directory to move processed files}';
    protected $description = 'Process crawled JSON files, save URLs to MySQL, and move files to history directory';

    public function handle()
    {
        $outputDir = rtrim($this->option('output-dir'), '/');
        $historyDir = rtrim($this->option('history-dir'), '/');
        /* testing
        $crawlId = 1;
        $freeUrls = Pa11yUrl::where('company_id', $crawlId)->where('deleted_at', null)->pluck('url')->toArray();
                \Log::info($freeUrls);
                die();
        */
        // Validate directories
        if (!is_dir($outputDir)) {
            $this->error("Output directory does not exist: {$outputDir}");
            Log::error("Output directory does not exist: {$outputDir}");
            return 1;
        }

        // Create history directory if it doesn't exist
        if (!is_dir($historyDir)) {
            mkdir($historyDir, 0755, true);
            $this->info("Created history directory: {$historyDir}");
        }

        // Scan for JSON files
        $files = glob("{$outputDir}/*.json");
        if (empty($files)) {
            $this->info("No JSON files found in {$outputDir}");
            return 0;
        }

        $this->info("Found " . count($files) . " JSON files to process");

        foreach ($files as $file) {
            $filename = basename($file);
            $crawlId = pathinfo($filename, PATHINFO_FILENAME); // e.g., 'crawl_123'

            $company = Company::where('id', $crawlId)->first();
            // Check Url quota for the company
            $max_urls = $company->max_urls;

            try {
                // Read JSON file
                $contents = file_get_contents($file);
                $urls = array_unique(json_decode($contents, true));

                // Check free Urls
                //$freeUrls = Pa11yUrl::where('company_id', $crawlId)->where('deleted_at', null)->count();
                $usedUrls = Pa11yUrl::where('company_id', $crawlId)->where('deleted_at', null)->pluck('url')->toArray();
                $toBeInserted = array_diff($urls, $usedUrls);
                //$urlsavailable = count($usedUrls)+count($toBeInserted);
                if(count($toBeInserted) > $max_urls-count($usedUrls)){
                    // shorten url array
                    $free = $max_urls - count($usedUrls);
                    //$toBeInserted = array_slice($toBeInserted, 0, count($toBeInserted) - $free);
                    $toBeInserted = array_slice($toBeInserted, 0, $free);
                }
                if (json_last_error() !== JSON_ERROR_NONE) {
                    $this->error("Invalid JSON in {$filename}: " . json_last_error_msg());
                    Log::error("Invalid JSON in {$filename}: " . json_last_error_msg());
                    continue;
                }

                if (!is_array($urls)) {
                    $this->error("JSON in {$filename} is not an array");
                    Log::error("JSON in {$filename} is not an array");
                    continue;
                }

                // Prepare data for batch insert
                $data = array_map(function ($url) use ($crawlId) {
                    return [
                        'company_id' => $crawlId,
                        'url' => $url,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }, array_filter($toBeInserted, 'is_string')); // Ensure only valid strings

                if (empty($data)) {
                    $this->warn("No valid URLs found in {$filename}");
                    Log::warning("No valid URLs found in {$filename}");
                } else {
                    // Insert URLs into MySQL
                    DB::table('pa11y_urls')->insert($data);
                    $this->info("Saved " . count($data) . " URLs for crawl_id: {$crawlId}");
                    Log::info("Saved " . count($data) . " URLs for crawl_id: {$crawlId}");
                }

                // Move file to history directory
                $historyPath = "{$historyDir}/".bin2hex(random_bytes(16))."_{$filename}";
                if (rename($file, $historyPath)) {
                    $this->info("Moved {$filename} to history directory");
                    Log::info("Moved {$filename} to {$historyPath}");
                } else {
                    $this->error("Failed to move {$filename} to history directory");
                    Log::error("Failed to move {$filename} to {$historyDir}");
                }
            } catch (\Exception $e) {
                $this->error("Error processing {$filename}: " . $e->getMessage());
                Log::error("Error processing {$filename}: " . $e->getMessage());
            }
        }

        $this->info("Processing complete");
        return 0;
    }
}
