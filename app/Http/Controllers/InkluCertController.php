<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\PdfExport;
use Illuminate\Support\Facades\Log;

class InkluCertController extends Controller
{

    public function showInkluCertForm()
    {

        $pageinclucert = json_encode(['title' => 'IncluCert PDF']);

            $pageinclucert = ['title' => 'IncluCert PDF'];
            return view('inklu-cert', compact('pageinclucert'));

    }

    public function checkInkluCert(Request $request)
    {
        $request->validate([
            'input_type' => 'required|in:text,file',
        ]);

        if ($request->input_type === 'text') {
            $request->validate([
                'text_input' => 'required|string|max:100', // Max 1000 characters for text
            ]);
            $identifier = $request->text_input;
            $pdf = PdfExport::where('encoded_id', $identifier)->first();
            if (!$pdf) {
                Log::warning('No document found', ['identifier' => $identifier]);
                return redirect()->route('inklucert.form')
                            ->withErrors(['text_input' => 'Kein Dokument mit der ID: "' . e($identifier) . '" gefunden.']);
            } else {
                Log::info('Document found', ['identifier' => $identifier, 'hash' => $pdf->hash]);
                return redirect()->route('inklucert.form')
                            ->with('success', 'Document Hash: ' . e($pdf->hash));
            }
        } elseif ($request->input_type === 'file') {
            $request->validate([
                'file' => 'required|file|mimes:pdf|max:20480', // Allow pdf, max 20MB
            ]);

            if ($request->file('file')->isValid()) {
                $file = $request->file('file');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('inklucert-temp', $fileName, 'local');

                Log::info('File uploaded', ['file_name' => $fileName]);
                $filePath = storage_path('app/inklucert-temp/' . $fileName);
                $computedHash = hash_file('sha256', $filePath);
                $pdf = PdfExport::where('hash', $computedHash)->first();

                if ($pdf) {
                    Log::info('Matching document found', ['hash' => $computedHash, 'encoded_id' => $pdf->encoded_id]);
                    return redirect()->route('inklucert.form')
                                    //->with('success', "'{$fileName}'<br>ID: {$pdf->encoded_id}<br>Hash: {$computedHash}<br>wurde erfolgreich verifiziert! ");
                                    ->with('success', "'{$fileName}'<br>Dokument-ID: {$pdf->encoded_id}<br><br>wurde erfolgreich verifiziert! ");
                } else {
                    Log::warning('No matching document found', ['hash' => $computedHash]);
                    return redirect()->route('inklucert.form')
                                    ->withErrors(['file' => "'{$fileName}'<br>Kein Dokument mit hash: <br>{$computedHash}<br>gefunden."]);
                }

            }

            return redirect()->route('inklucert.form')
                            ->withErrors(['file' => 'Kein gültiges PDF hochgeladen.']);
        }

        return redirect()->route('upload.form')
                        ->withErrors(['input_type' => 'Invalid input type.']);
    }

}
