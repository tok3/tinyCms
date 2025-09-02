<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class PublicAccessibilityCheckController extends Controller
{
    public function check(Request $request): StreamedResponse
    {
        $validated = $request->validate(['url' => 'required|url']);
        $url = $validated['url'];

        // Debugbar bei Streaming sicherheitshalber ausschalten
        if (class_exists(\Debugbar::class)) {
            try { \Debugbar::disable(); } catch (\Throwable $e) {}
        }

        // Optional: eigenes Log — darf niemals den Stream stören
        try {
            @file_put_contents(
                storage_path('logs/url-checks.log'),
                sprintf("[%s] Checked URL: %s\n", now()->toDateTimeString(), $url),
                FILE_APPEND
            );
        } catch (\Throwable $e) {}

        return response()->stream(function () use ($url) {
            // Alle Output-Buffer schließen
            while (ob_get_level() > 0) { @ob_end_flush(); }
            @flush();

            $send = function (array $payload): void {
                echo json_encode($payload, JSON_UNESCAPED_UNICODE) . "\n";
                if (ob_get_level() > 0) { @ob_flush(); }
                @flush();
            };

            $send(['step' => 'Initializing', 'progress' => 10]);

            try {
                // Step 1: WCAG 2.1 (axe)
                $send(['step' => 'Scanning WCAG 2.1 (axe)', 'progress' => 50]);

                $args1 = [
                    'pa11y',
                    $url,
                    '--runner', 'axe',
                    '--reporter', 'json',
                    '--include-warnings',
                ];
                // Hinweis: escapeshellarg je nach Umgebung; hier simpel zusammenfügen:
                $cmd1   = implode(' ', array_map('escapeshellarg', $args1));
                $output = shell_exec($cmd1 . ' 2>&1');

                if ($output === null || $output === '') {
                    throw new \RuntimeException('Kein Output von pa11y (axe).');
                }
                $axe = json_decode($output, true, 512, JSON_THROW_ON_ERROR);

                $summary = ['errors' => 0, 'warnings' => 0, 'notices' => 0];
                if (is_array($axe)) {
                    foreach ($axe as $row) {
                        $type = $row['type'] ?? null;
                        if ($type === 'error')   $summary['errors']++;
                        if ($type === 'warning') $summary['warnings']++;
                    }
                }

                // Step 2: Notices (htmlcs, WCAG2AAA)
                $send(['step' => 'Scanning WCAG 2.0 AAA for Notices', 'progress' => 75]);

                $args2 = [
                    'pa11y',
                    $url,
                    '--runner', 'htmlcs',
                    '--reporter', 'json',
                    '--standard', 'WCAG2AAA',
                    '--include-notices',
                ];
                $cmd2    = implode(' ', array_map('escapeshellarg', $args2));
                $output2 = shell_exec($cmd2 . ' 2>&1');
                if ($output2 === null || $output2 === '') {
                    throw new \RuntimeException('Kein Output vom pa11y-Notices-Scan.');
                }
                $notices = json_decode($output2, true, 512, JSON_THROW_ON_ERROR);
                if (is_array($notices)) {
                    foreach ($notices as $row) {
                        if (($row['type'] ?? null) === 'notice') $summary['notices']++;
                    }
                }

                $send(['step' => 'Completed', 'progress' => 100, 'summary' => $summary]);
            } catch (\Throwable $e) {
                $send(['step' => 'Error', 'message' => $e->getMessage(), 'progress' => 100]);
            }
        }, 200, [
            'Content-Type'      => 'application/x-ndjson; charset=utf-8',
            'Cache-Control'     => 'no-cache, no-transform',
            'X-Accel-Buffering' => 'no',
            'Connection'        => 'keep-alive',
        ]);
    }

    public function getProgress()
    {
        return response()->json(session('progress', ['step' => 'Not started', 'progress' => 0]));
    }
}
