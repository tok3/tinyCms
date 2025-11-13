<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\JsonResponse;
use App\Models\Company;
class CrawlController extends Controller
{
    public function startCrawl(Request $request): array
    {


       //\Log::info($request); die();
        // Validate input
        $validated = $request->validate([
            'domain' => 'required|url',
            //'id' => 'required|string|alpha_dash',
            'id' => 'required|integer|min:1', // Validate maxPages
            //'maxPages' => 'required|integer|min:1', // Validate maxPages
        ]);


        //\Log::info($validated);
        // Node.js server URL
        $nodeServerUrl = env('NODE_CRAWLER_URL', 'http://localhost:4000/start-crawl');
        $company = Company::where('id', $validated['id'])->first();
        $maxPages = $company->max_urls;
        try {

            // Send POST request to Node.js server
            $response = Http::timeout(10)->post($nodeServerUrl, [
                'domain' => $validated['domain'],
                'id' => $validated['id'],
                //'maxPages' => (int) $validated['maxPages'], // Ensure integer
                'maxPages' => (int) $maxPages, // Ensure integer
            ]);

            if ($response->successful()) {
                /*return response()->json([
                    'status' => 'Crawling started',
                    'id' => $validated['id'],
                    'data' => $response->json(),
                ], 200);*/
                return array('status' => 'ok', 'id' => $validated['id'], 'data' => $response->json());
            }
            /*
            return response()->json([
                'error' => 'Failed to start crawl: ' . $response->body(),
            ], $response->status());
            */
            return array('status' => 'error', 'id' => $validated['id'], 'data' => $response->json());
        } catch (\Exception $e) {
            /*
            return response()->json([
                'error' => 'Error contacting crawler: ' . $e->getMessage(),
            ], 500);
            */
            return array('status' => 'error', 'id' => $validated['id'], 'data' => $e->getMessage());
        }
    }
}
