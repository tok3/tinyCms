<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Company;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\Auth;
use App\Services\AccessibilityScoreService;

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


    public function generateCertificate(string $ulid, AccessibilityScoreService $scoreService)
    {
        $company = Company::where('ulid', $ulid)->firstOrFail();

        $metrics = $scoreService->getCompanyMetrics($company);

        if (!$metrics) {
            abort(404, 'Für diese Company liegen noch keine Pa11y-Daten vor.');
        }

        $data = [
            'company'             => $company,
            'score'               => $metrics['current_score'],
            'observationStart'    => $metrics['observation_start'],
            'observationEnd'      => $metrics['observation_end'],
            'trendLabel'          => $metrics['trend_label'],
            'trendDiff'           => $metrics['trend_diff'],
            'currentErrors'       => $metrics['current_errors'],
            'resolvedErrors'      => $metrics['resolved_errors'],
            'currentUrls'         => $metrics['current_urls'],
            // optional: 'daily' für Chart
            'chartImage'          => null,
        ];

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.certificate', $data)
            ->setPaper('a4', 'landscape');

        return $pdf->stream('zertifikat_'.$company->name.'.pdf');
    }


}
