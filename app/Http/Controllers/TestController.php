<?php
namespace App\Http\Controllers;

use App\Models\Pa11yStatistic;
use Illuminate\Http\Request;
use Artisan;
use Symfony\Component\Process\Process;
use App\Services\OpenAIService;
class TestController extends Controller
{

    public function testCommand()
    {



        $openAIService = new OpenAIService();

        $errorCode = 'WCAG2A.Principle4.Guideline4_1.4_1_2.H91.Button.Name';
        $description = $openAIService->generateErrorDescription($errorCode,'de');

        $page = 'https://aktion-barrierefrei.de/';
        $description = $openAIService->checkPage($page,'de');

        dd($description);


    }
    public function testArtisanCommand($id = 65, Request $request)
    {


        $companyId = auth()->user()->company_id; // Hier kannst du je nach User die richtige CompanyID verwenden

        // Hier holen wir die Werte für Fehler, Warnungen und Notices
        // Holen der Daten für die letzten 14 Tage
        $statistics = Pa11yStatistic::where('scanned_at', '>=', now()->subDays(14))
            ->select('scanned_at', 'error_count', 'warning_count', 'notice_count')
            ->orderBy('scanned_at')
            ->get();

        // Extrahieren der Labels und der Daten
        $labels = $statistics->pluck('scanned_at')->map(function ($date) {
            return $date; // Formatieren des Datums
        });

        $errors = $statistics->pluck('error_count');
        $warnings = $statistics->pluck('warning_count');
        $notices = $statistics->pluck('notice_count');

        return [
            'labels' => $labels, // Labels (Datum)
            'datasets' => [
                [
                    'label' => 'Errors',
                    'data' => $errors, // Fehlerdaten
                    'borderColor' => 'red',
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                    'fill' => false,
                ],
                [
                    'label' => 'Warnings',
                    'data' => $warnings, // Warnungsdaten
                    'borderColor' => 'yellow',
                    'backgroundColor' => 'rgba(255, 159, 64, 0.2)',
                    'fill' => false,
                ],
                [
                    'label' => 'Notices',
                    'data' => $notices, // Hinweisdaten
                    'borderColor' => 'blue',
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                    'fill' => false,
                ],
            ],
        ];
        die();
// Artisan-Befehl im Hintergrund ausführen (ohne den Webserver zu blockieren)
        // Artisan-Befehl im Hintergrund ausführen (ohne den Webserver zu blockieren)
        // Artisan-Befehl im Hintergrund ausführen
        $command = "php ".base_path('artisan')." scan:accessibility 81 > /dev/null 2>&1 &";

        // Befehl ausführen
        shell_exec($command);

        die();
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
