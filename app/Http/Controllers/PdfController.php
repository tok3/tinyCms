<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Company;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\Auth;

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


    public function generateCertificate(string $ulid)
    {
        $company = Company::where('ulid', $ulid)->firstOrFail();

        // Beispielwerte – später aus deiner DB/Statistiken holen
        $score = 86;
        $totalScans = 42;
        $issuesResolved = 123;
        $issuesOpen = 17;

        // Falls du später ein Chart-Bild als Base64 einbindest:
        $chartImage = null; // vorerst leer

        $data = compact(
            'company',
            'score',
            'totalScans',
            'issuesResolved',
            'issuesOpen',
            'chartImage'
        );

        $pdf = Pdf::loadView('pdf.certificate', $data)
            ->setPaper('a4', 'portrait');

        return $pdf->stream("zertifikat_{$company->name}.pdf");
    }


}
