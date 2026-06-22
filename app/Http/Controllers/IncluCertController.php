<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Pa11yUrl;
use App\Services\AccessibilityScoreService;
use App\Services\ScoreChartService;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Barryvdh\DomPDF\Facade\Pdf;

class IncluCertController extends Controller
{
    public function show(
        $ulid,
        AccessibilityScoreService $scoreService,
        ScoreChartService $chartService
    )
    {
        $company = Company::where('ulid', $ulid)->first();

        if (!$company)
        {
            if (request()->is('api/*') || request()->query('format') === 'json')
            {
                return response()->json(['status' => 'invalid'], 404);
            }
            abort(404);
        }

        $metrics = $scoreService->getCompanyMetrics($company);

        if (!$metrics)
        {
            if (request()->is('api/*') || request()->query('format') === 'json')
            {
                return response()->json(['status' => 'inactive']);
            }
            abort(404);
        }

        $incluCertUrl = url('/inclucert/' . $company->ulid);

        $qrSvg = base64_encode(
            QrCode::format('svg')
                ->size(120)
                ->margin(0)
                ->generate($incluCertUrl)
        );

        $daysSinceLastScan = $metrics['observation_end']->diffInDays(now());
        $monitoringStatus = $daysSinceLastScan <= 8 ? 'active' : ($daysSinceLastScan <= 14 ? 'overdue' : 'inactive');
        // JSON → Badge-Script
        if (request()->is('api/*') || request()->query('format') === 'json')
        {
            return response()->json([
                'status' => 'active',
                'score' => $metrics['current_score'],
                'trend' => $metrics['trend_diff'],
                'trend_label' => $metrics['trend_label'],
                'last_scan' => $metrics['observation_end']->format('d.m.Y'),
                'errors' => $metrics['current_errors'],
                'url' => $incluCertUrl,
                'qr' => 'data:image/svg+xml;base64,' . $qrSvg,
                'monitoring_status' => $monitoringStatus,
            ]);
        }

        // HTML → öffentliche Nachweis-Seite
        $chart = $chartService->createScoreChartBase64($company, $metrics['daily']);

        return view('inclucert.show', [
            'company' => $company,
            'metrics' => $metrics,
            'chart' => $chart,
            'certUrl' => $incluCertUrl,
            'qr' => 'data:image/svg+xml;base64,' . $qrSvg,
        ]);
    }


    public function certificateImage(string $ulid, AccessibilityScoreService $scoreService, ScoreChartService $chartService)
    {
        $company = Company::where('ulid', $ulid)->firstOrFail();

        $metrics = $scoreService->getCompanyMetrics($company);
        if (!$metrics)
        {
            abort(404);
        }

        $chartImage = $chartService->createScoreChartBase64($company, $metrics['daily']);

        $data = [
            'company' => $company,
            'score' => $metrics['current_score'],
            'observationStart' => $metrics['observation_start'],
            'observationEnd' => $metrics['observation_end'],
            'trendLabel' => $metrics['trend_label'],
            'trendDiff' => $metrics['trend_diff'],
            'currentErrors' => $metrics['current_errors'],
            'resolvedTotal' => $metrics['resolved_total'],
            'newTotal' => $metrics['new_total'],
            'currentUrls' => $metrics['current_urls'],
            'activityFixedTotal' => $metrics['activity_fixed_total'],
            'activityIntroducedTotal' => $metrics['activity_introduced_total'],
            'activityValue' => $metrics['activity_value'],
            'chartImage' => $chartImage,
            'standard' => getWcagStandardLabel(getCurrentWcagStandard($company)),
        ];

        // PDF temporär generieren
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.certificate', $data)
            ->setPaper('a4', 'portrait');

        $tmpPath = storage_path('app/tmp_cert_' . $ulid . '.pdf');
        file_put_contents($tmpPath, $pdf->output());

        // Als Bild rendern
        $image = new \Spatie\PdfToImage\Pdf($tmpPath);
        $imgPath = storage_path('app/tmp_cert_' . $ulid . '.jpg');
        $image->save($imgPath);

        $imageData = 'data:image/jpeg;base64,' . base64_encode(file_get_contents($imgPath));

        // Temp-Dateien aufräumen
        unlink($tmpPath);
        unlink($imgPath);

        return response()->json(['image' => $imageData]);
    }

    public function showUrls(string $ulid, AccessibilityScoreService $scoreService)
    {
        $company = Company::where('ulid', $ulid)->firstOrFail();

        $metrics = $scoreService->getCompanyMetrics($company);
        if (!$metrics)
        {
            abort(404);
        }

        // URLs mit Statistiken laden
        $urls = \DB::table('pa11y_urls as u')
            ->leftJoin('pa11y_statistics as s', function ($join) {
                $join->on('s.url_id', '=', 'u.id')
                    ->where('s.standard', '=', getCurrentWcagStandard($company));
            })
            ->where('u.company_id', $company->id)
            ->whereNull('u.deleted_at')
            ->selectRaw("
            u.id,
            u.url,
            u.created_at,
            MIN(s.scanned_at) as first_scan,
            MAX(s.scanned_at) as last_scan,
            COUNT(DISTINCT DATE(s.scanned_at)) as scan_days,
            (SELECT error_count FROM pa11y_statistics
             WHERE url_id = u.id AND standard = '" . getCurrentWcagStandard($company) . "'
             ORDER BY scanned_at DESC LIMIT 1) as current_errors,
            (SELECT error_count FROM pa11y_statistics
             WHERE url_id = u.id AND standard = '" . getCurrentWcagStandard($company) . "'
             ORDER BY scanned_at ASC LIMIT 1) as first_errors
        ")
            ->groupBy('u.id', 'u.url', 'u.created_at')
            ->orderByRaw('current_errors IS NULL ASC')
            ->orderBy('current_errors', 'asc')
            ->get()
            ->map(function ($row) {
                // Trend pro URL
                $trend = 'flat';
                if (!is_null($row->current_errors) && !is_null($row->first_errors))
                {
                    $diff = $row->first_errors - $row->current_errors; // positiv = verbessert
                    if ($diff > 2)
                    {
                        $trend = 'up';
                    }
                    if ($diff < -2)
                    {
                        $trend = 'down';
                    }
                }
                $row->trend = $trend;

                return $row;
            });

        return view('inclucert.urls', [
            'company' => $company,
            'metrics' => $metrics,
            'urls' => $urls,
            'certUrl' => url('/inclucert/' . $company->ulid),
        ]);
    }

    public function recordVisit(Request $request, string $ulid)
    {
        $company = Company::where('ulid', $ulid)->first();
        if (!$company || !$company->hasFeature('inclucert'))
        {
            return response()->json(['status' => 'skip'], 200);
        }

        $url = $request->input('url');
        if (!$url || !filter_var($url, FILTER_VALIDATE_URL))
        {
            return response()->json(['status' => 'invalid'], 200);
        }

        // Eigene Domain ausschließen
        $ownDomain = parse_url(config('app.url'), PHP_URL_HOST);
        $visitDomain = parse_url($url, PHP_URL_HOST);
        if ($ownDomain && $visitDomain && str_contains($visitDomain, $ownDomain))
        {
            return response()->json(['status' => 'skip_own'], 200);
        }

        // URL normalisieren (Schema https, lowercase host, kein Fragment, kein Query)
        $normalized = $this->normalizeUrl($url);
        if (!$normalized)
        {
            return response()->json(['status' => 'invalid'], 200);
        }

        // Lock gegen Race-Conditions
        $lockKey = 'inclucert_visit:' . $ulid . ':' . sha1($normalized);
        \Cache::lock($lockKey, 5)->block(5, function () use ($company, $normalized) {

            $ref = \App\Models\Referrer::firstOrCreate(
                ['ulid' => $company->ulid, 'referrer' => $normalized],
                ['count' => 0]
            );

            if ($ref->wasRecentlyCreated)
            {
                // Neue URL → ins Monitoring aufnehmen wenn Kontingent verfügbar
                $urlCount = \App\Models\Pa11yUrl::where('company_id', $company->id)->count();

                if ($urlCount < $company->max_urls)
                {
                    $existing = \App\Models\Pa11yUrl::where('company_id', $company->id)
                        ->where('url', $normalized)
                        ->first();

                    if (!$existing)
                    {
                        $pa11yUrl = \App\Models\Pa11yUrl::create([
                            'company_id' => $company->id,
                            'url' => $normalized,
                        ]);

                        // Initialen Scan anstoßen
                        shell_exec(getWcagScanShellCommand($pa11yUrl->id, getCurrentWcagStandard($company)));
                    }
                }
            }
            else
            {
                $ref->increment('count');
            }
        });

        return response()->json(['status' => 'ok'], 200);
    }

    private function normalizeUrl(string $url): ?string
    {
        if (!preg_match('~^https?://~i', $url))
        {
            $url = 'https://' . ltrim($url);
        }
        $parts = parse_url($url);
        if (!isset($parts['host']))
        {
            return null;
        }

        $scheme = 'https';
        $host = mb_strtolower($parts['host']);
        $path = rtrim($parts['path'] ?? '/', '/') ?: '/';

        return $scheme . '://' . $host . $path;
    }
}
