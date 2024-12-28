<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artisan;

class TestController extends Controller
{
    public function testArtisanCommand($id = 65, Request $request)
    {


        // Beispielwert für die URL
        $record = (object) ['id' => $id, 'url' => 'https://example.com'];  // Verwendung der ID aus der URL oder Standardwert

        // Levels (A, AA, AAA) als durch Kommata getrennte Werte
        $levels = 'A,AA,AAA';

        \Log::info('Testing Artisan call for URL', ['url_id' => $record->id]);

        // Starte das Artisan Kommando mit den übergebenen Werten
        $result = Artisan::call('scan:accessibility', [
            'urls' => [$record->id],  // URL-ID übergeben
            '--levels' => $levels,    // Levels übergeben
        ]);

        // Logge das Ergebnis und die Ausgabe
        \Log::info('Artisan Command Output', ['result' => $result]);

        return response()->json([
            'success' => $result > 0, // Erfolgreich, wenn das Resultat größer als 0 ist
            'result' => $result,
            'log' => 'check the logs for the full output',
        ]);
    }
}
