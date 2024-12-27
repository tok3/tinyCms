<?php
namespace App\Http\Controllers;

use App\Models\Pa11yUrl;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;

class Pa11yUrlController extends Controller
{
    /**
     * Startet den Scan für eine bestimmte URL
     */
    public function rescan(Pa11yUrl $url)
    {
        // Übergebe die URL-ID als Argument
        Artisan::call('scan:accessibility', [
            'url' => $url->id
        ]);

        // Optional: Ausgabe des Kommando-Outputs zur Fehlersuche oder zum Debugging
        $output = Artisan::output();
        \Log::info('Scan output', ['output' => $output]);

        // Weiterleitung mit einer Nachricht
        return redirect()->back()->with('message', "Scan completed for {$url->url}");
    }

    /**
     * Startet den Scan für alle URLs der Firma des angemeldeten Nutzers
     */
    public function rescanAllUrls()
    {
        // Hole den angemeldeten Nutzer
        $user = auth()->user();

        // Hole alle URLs, die der Firma des Nutzers zugeordnet sind
        $urls = $user->company->pa11yUrls;

        // Starte den Scan für jede URL
        foreach ($urls as $url) {
            Artisan::call('scan:accessibility', [
                'url' => $url->id
            ]);
        }

        // Optional: Ausgabe des Kommando-Outputs an den Benutzer
        $output = Artisan::output();

        return redirect()->route('pa11y.urls.index')->with('message', 'All URLs have been rescanned!');
    }
}
