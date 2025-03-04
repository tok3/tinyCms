<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Browsershot\Browsershot;
use Spatie\Browsershot\Enums\Polling;
use Illuminate\Support\Facades\Process;


class PubStatController extends Controller
{









    public function getPdf()
    {
        $urlid = request('urlid');
        $url = "http://localhost/dashboard/1/firmament-issues/grouped/2.1?url_id={$urlid}";

        try {
            $browsershot = Browsershot::url($url)
                ->setNodeBinary('/usr/bin/node')
                ->setChromeExecutablePath('/var/www/.cache/puppeteer/chrome/linux-133.0.6943.141/chrome-linux64/chrome')
                ->setOption('args', ['--no-sandbox', '--disable-setuid-sandbox'])
                ->timeout(60000)
                ->waitUntilNetworkIdle(false);

            $result = $browsershot->evaluate('() => { return JSON.stringify({ test: "Hello" }); }');
            $decodedResult = json_decode($result, true);
            var_dump($decodedResult); die();
        } catch (\Exception $e) {
            var_dump($e->getMessage()); die();
        }
    }


    public function getPdfM()
    {
        {
            $browsershot = new Browsershot();
            //$browsershot->setNodeBinary('/Users/tommel/.nvm/versions/node/v20.18.3/bin/node');
            $browsershot->setNodeBinary('/usr/bin/node');
            $urlid = request('urlid');

            $companyId = request('companyid');

            $headlineText = 'Kennung: rep-' . $urlid .  '-' . date("YmdHis") . '';
            // build "headline" string
            //rep-<url_id>-<datetime>.pdf

                    // Use the arm64 Node.js binary (adjust path based on your setup)
                    if (!$urlid || !is_numeric($urlid)) {
                        return response()->json(['error' => 'Invalid or missing url_id'], 400);
                    }

                    // Default headline if not provided
                    //$headlineText = $headlineText ?? 'Accessibility Issues Report';
                    $headlineText = 'Kennung: rep-' . $urlid .  '-' . date("YmdHis") . '';

                    // Construct the URL
                    $url = "http://localhost/dashboard/1/firmament-issues/grouped/2.1?url_id={$urlid}; //&perPage=all";


                    try {
                        // Initialize Browsershot
                        $browsershot = Browsershot::url($url)
                            //->setNodeBinary('/Users/tommel/.nvm/versions/node/v20.18.3/bin/node') // Ensure arm64 Node.js
                            ->setNodeBinary('/usr/bin/node') // Ensure arm64 Node.js
                            ->timeout(60) // 60 seconds timeout
                            ->waitUntilNetworkIdle(false) // Similar to 'domcontentloaded'
                            ->waitForFunction('document.querySelector(".fi-page") !== null', Polling::Mutation, 5000); // Use Polling::Mutation

                            $result = $browsershot->evaluate(<<<JS
                            () => {
                                return { test: 'Hello' };
                            }
                            JS);
                            var_dump($result); die();
/*
                        // Inject headline into the DOM
                        $browsershot->evaluate(<<<JS
                        () => {
                            const headline = document.createElement('h1');
                            headline.textContent = '{$headlineText}';
                            headline.style.cssText = `
                                font-size: 12px;
                                font-family: Arial, sans-serif;
                                color: #333333;
                                background-color: #f5f5f5;
                                margin: 0 0 20px 0;
                                padding: 10px;
                                text-align: center;
                                border-bottom: 2px solid #007bff;
                            `;
                            const targetElement = document.querySelector('.fi-page');
                            targetElement.parentNode.insertBefore(headline, targetElement);
                            return 'Headline added successfully'; // Explicitly return a string
                        }
                    JS);
*/
                        // Add print styles
                        $browsershot->addStyleTag([
                            '@media print' => [
                                '.fi-sidebar' => ['display' => 'none'],
                                'div.fi-page' => ['display' => 'block'],
                                'h1' => ['display' => 'block'],
                            ],
                        ]);



                        // Get bounding box of headline and content for clipping
                       // Inject dimensions into the DOM




                       $browsershot
                       ->waitUntilNetworkIdle() // Waits for network activity to stop
                       ->waitForFunction('document.querySelector("h1") && document.querySelector(".fi-page")')
                       ->evaluate(<<<JS
                       () => {
                           const headline = document.querySelector('h1');
                           const content = document.querySelector('.fi-page');

                           if (!headline || !content) {
                               throw new Error('Headline or content not found');
                           }

                           const result = {
                               x: Math.min(headline.getBoundingClientRect().x, content.getBoundingClientRect().x),
                               y: headline.getBoundingClientRect().y,
                               width: Math.max(headline.getBoundingClientRect().width, content.getBoundingClientRect().width),
                               height: headline.getBoundingClientRect().height + content.getBoundingClientRect().height + 20
                           };

                           const script = document.createElement('script');
                           script.id = 'dimensions-data';
                           script.type = 'application/json';
                           script.textContent = JSON.stringify(result);
                           document.body.appendChild(script);

                           return result; // Explicitly return something
                       }
                   JS);



// Ensure the page is fully loaded
$browsershot->waitUntilNetworkIdle();

// Get the HTML
$html = $browsershot->bodyHTML();

// Extract the JSON
preg_match('/<script id="dimensions-data" type="application\/json">(.*?)<\/script>/s', $html, $matches);
$dimensionsJson = $matches[1] ?? 'null';
$dimensions = json_decode($dimensionsJson, true);

if ($dimensions === null && json_last_error() !== JSON_ERROR_NONE) {
echo "JSON decoding failed: " . json_last_error_msg() . "\n";
} else {
var_dump($dimensions); die();
}
                        // Generate PDF with clipping
                        $pdfBinary = $browsershot
                            ->clip(
                                $dimensions['x'],
                                $dimensions['y'],
                                $dimensions['width'],
                                $dimensions['height']
                            )
                            ->setOption('printBackground', true)
                            ->setOption('landscape', true)
                            ->pdf();

                        // Generate filename
                        $timestamp = now()->format('Ymd-His');
                        $filename = "report-url-{$urlid}" . ($companyId ? "-company-{$companyId}" : "") . "-{$timestamp}.pdf";

                        return response($pdfBinary)
                            ->header('Content-Type', 'application/pdf')
                            ->header('Content-Disposition', "inline; filename={$filename}");
                    } catch (\Exception $e) {
                        return response()->json(['error' => "PDF generation failed: {$e->getMessage()}"], 500);

                    }
        }
    }


/*
    public function getPdf()
    {
        $id = request('urlid');
        $companyId = request('companyid');
        $headlineText = 'Kennung: rep-' . $id .  '-' . date("YmdHis") . '';
        $nodePath = '/opt/homebrew/bin/node';
        $scriptPath = '/Users/tommel/Sites/adHocTesting/qualcrawl/pdfsnap.js';


        if (!$id || !is_numeric($id)) {
            return response()->json(['error' => 'Invalid or missing url_id'], 400);
        }

        // Use default headline if not provided
        $headlineText = $headlineText ?? 'Accessibility Issues Report';

        // Define paths
        $nodePath = '/opt/homebrew/bin/node'; // Ensure arm64 Node.js
        $scriptPath = '/Users/tommel/Sites/adHocTesting/qualcrawl/pdfsnap.js'; // Path to your script

        // Validate paths
        if (!file_exists($nodePath)) {
            return response()->json(['error' => "Node.js not found at {$nodePath}"], 500);
        }
        if (!file_exists($scriptPath)) {
            return response()->json(['error' => "Script not found at {$scriptPath}"], 500);
        }

        // Build the command
        $command = "{$nodePath} {$scriptPath} {$id}";
        if ($headlineText) {
            $command .= " " . escapeshellarg($headlineText);
        }

        try {
            \Log::info("Executing command: {$command}");
            $result = Process::timeout(60)->run($command);

            if ($result->failed()) {
                \Log::error("Script execution failed: " . $result->errorOutput());
                return response()->json([
                    'error' => 'Script execution failed',
                    'output' => $result->output(),
                    'error_output' => $result->errorOutput(),
                    'exit_code' => $result->exitCode(),
                ], 500);
            }

            $output = $result->output();
            \Log::info("Raw output length: " . strlen($output) . " bytes");
            \Log::info("Raw output sample: " . substr($output, 0, 100));

            // Expecting base64, not comma-separated values
            $base64Pdf = trim($output);
            if (preg_match('/^\d+(,\d+)*$/', $base64Pdf)) {
                \Log::error("Output is comma-separated values, not base64: " . substr($base64Pdf, 0, 50));
                return response()->json(['error' => 'Unexpected output format (comma-separated values)', 'output' => $base64Pdf], 500);
            }

            $pdfBinary = base64_decode($base64Pdf);
            if (!$pdfBinary) {
                \Log::error("Failed to decode PDF buffer: " . $base64Pdf);
                return response()->json(['error' => 'Failed to decode PDF buffer', 'output' => $base64Pdf], 500);
            }

            $tempFile = storage_path("app/debug-pdf-{$id}.pdf");
            file_put_contents($tempFile, $pdfBinary);
            \Log::info("PDF saved to: {$tempFile}, size: " . strlen($pdfBinary) . " bytes");

            if (ob_get_length()) ob_end_clean();

            $timestamp = now()->format('Ymd-His');
            $filename = "report-url-{$id}" . ($companyId ? "-company-{$companyId}" : "") . "-{$timestamp}.pdf";

            return response($pdfBinary)
                ->header('Content-Type', 'application/pdf')
                ->header('Content-Length', strlen($pdfBinary))
                ->header('Content-Disposition', "inline; filename=\"{$filename}\"");
        } catch (\Exception $e) {
            \Log::error("PDF generation failed: {$e->getMessage()}");
            return response()->json(['error' => "PDF generation failed: {$e->getMessage()}"], 500);
        }



    }
*/

    public function checkPdf()
    {

    }

    public function getCsv()
    {
        return view('csv');
    }
}
