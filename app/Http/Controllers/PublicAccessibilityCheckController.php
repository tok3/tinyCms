<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicAccessibilityCheckController extends Controller
{
    public function check(Request $request)
    {


        $request->validate(['url' => 'required|url']);

        $url = $request->input('url');

        // Eigenes Logfile (z. B. storage/logs/url-checks.log)
        $logFile = storage_path('logs/url-checks.log');
        $logEntry = sprintf("[%s] Checked URL: %s%s", now()->toDateTimeString(), $url, PHP_EOL);

        // Anhängen an Logfile
        file_put_contents($logFile, $logEntry, FILE_APPEND);

        $summary = [
            'errors' => 0,
            'warnings' => 0,
            'notices' => 0,
        ];

        $includeNotices = true; // Standardmäßig Notices scannen

        // Response als Streaming starten
        return response()->stream(function () use ($url, &$summary, $includeNotices) {
            // Initialisiere Fortschritt
            echo json_encode(['step' => 'Initializing', 'progress' => 10]) . "\n";
            ob_flush();
            flush();

            try
            {
                // **Step 1:** Hauptscan mit WCAG 2.1 (axe)
                echo json_encode(['step' => 'Scanning WCAG 2.1 (axe)', 'progress' => 50]) . "\n";
                ob_flush();
                flush();

                $processArgs = [
                    'pa11y',
                    $url,
                    '--runner', 'axe',
                    '--reporter', 'json',
                    '--include-warnings',
                ];

                $command = implode(' ', $processArgs);
                $output = shell_exec($command . ' 2>&1');

                if (empty($output)) {
                    throw new \Exception("Kein Output von pa11y. Die Webseite existiert vermutlich nicht oder ist nicht erreichbar.");
                }

                $wcag21Results = json_decode($output, true);
                if (json_last_error() !== JSON_ERROR_NONE) {
                    throw new \Exception("Ungültige JSON-Daten von pa11y: " . $output);
                }

                if (!empty($wcag21Results)) {
                    foreach ($wcag21Results as $result) {
                        if (isset($result['type']) && $result['type'] === 'error') {
                            $summary['errors']++;
                        } elseif (isset($result['type']) && $result['type'] === 'warning') {
                            $summary['warnings']++;
                        }
                    }
                }


                // **Step 2:** Zusätzlicher Scan für Notices mit WCAG 2.0 AAA (htmlcs)
                if ($includeNotices) {
                    echo json_encode(['step' => 'Scanning WCAG 2.0 AAA for Notices', 'progress' => 75]) . "\n";
                    ob_flush();
                    flush();

                    $processArgs = [
                        'pa11y',
                        $url,
                        '--runner', 'htmlcs',
                        '--reporter', 'json',
                        '--standard', 'WCAG2AAA',
                        '--include-notices',
                    ];

                    $command = implode(' ', $processArgs);
                    $output = shell_exec($command . ' 2>&1');

                    // Prüfe, ob der Output leer ist
                    if (empty($output)) {
                        throw new \Exception("Kein Output vom zusätzlichen pa11y-Scan. Die Webseite ist möglicherweise nicht erreichbar.");
                    }

                    // Versuche, den Output als JSON zu decodieren
                    $wcag20NoticesResults = json_decode($output, true);
                    if (json_last_error() !== JSON_ERROR_NONE) {
                        throw new \Exception("Ungültige JSON-Daten vom zusätzlichen pa11y-Scan: " . $output);
                    }

                    if (!empty($wcag20NoticesResults)) {
                        foreach ($wcag20NoticesResults as $result) {
                            if (isset($result['type']) && $result['type'] === 'notice') {
                                $summary['notices']++;
                            }
                        }
                    }
                }

                // Fortschritt abschließen
                echo json_encode(['step' => 'Completed', 'progress' => 100, 'summary' => $summary]) . "\n";
                ob_flush();
                flush();
            }
            catch (\Exception $e)
            {
                echo json_encode(['step' => 'Error', 'message' => $e->getMessage(), 'progress' => 100]) . "\n";
                ob_flush();
                flush();
            }
        }, 200, [
            'Content-Type' => 'text/event-stream',
            'Cache-Control' => 'no-cache',
            'Connection' => 'keep-alive',
        ]);
    }

    public function getProgress()
    {
        return response()->json(session('progress', ['step' => 'Not started', 'progress' => 0]));
    }
}
