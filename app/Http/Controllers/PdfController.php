<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Company;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\Auth;
use App\Services\AccessibilityScoreService;
use App\Services\ScoreChartService;

class PdfController extends Controller
{
    public function generateInstruction($ulid)
    {

        // Hole die Firmendaten basierend auf der ID
        $company = Company::where('ulid',$ulid)->first();

        // Individuelle Daten für das PDF
        $data = [
            'companyName' => $company->name,
            'company' => $company,

        ];

        // PDF mit Blade-Template generieren
        $pdf = Pdf::loadView('pdf.fixstern-instructions', $data)->setPaper('a4', 'landscape');

        // PDF als Download zurückgeben
        return $pdf->stream("anleitung_{$company->name}.pdf");
    }


    public function generateCertificate(
        string $ulid,
        AccessibilityScoreService $scoreService,
        ScoreChartService $chartService
    ) {
        $company = Company::where('ulid', $ulid)->firstOrFail();

        $metrics = $scoreService->getCompanyMetrics($company);

        if (!$metrics) {
            // Hier explizit machen, dass es um 2.1 geht
            abort(404, 'Für diese Company liegen noch keine WCAG 2.1-Scans vor.');
        }

        $chartImage = $chartService->createScoreChartBase64($company, $metrics['daily']);

        $data = [
            'company'                  => $company,
            'score'                    => $metrics['current_score'],
            'observationStart'         => $metrics['observation_start'],
            'observationEnd'           => $metrics['observation_end'],
            'trendLabel'               => $metrics['trend_label'],
            'trendDiff'                => $metrics['trend_diff'],
            'currentErrors'            => $metrics['current_errors'],
            'resolvedTotal'            => $metrics['resolved_total'],
            'newTotal'                 => $metrics['new_total'],
            'currentUrls'              => $metrics['current_urls'],
            'activityFixedTotal'       => $metrics['activity_fixed_total'],
            'activityIntroducedTotal'  => $metrics['activity_introduced_total'],
            'activityValue'            => $metrics['activity_value'],
            'chartImage'               => $chartImage,
            'standard'                 => 'WCAG 2.1',
        ];

        $pdf = Pdf::loadView('pdf.certificate', $data)
            ->setPaper('a4', 'portrait');

        return $pdf->stream('zertifikat_'.$company->name.'.pdf');
    }


}
