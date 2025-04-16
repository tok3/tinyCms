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
}
