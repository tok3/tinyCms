<?php
namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Contract;
use App\Models\Pa11yStatistic;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Artisan;
use App\Models\Product;
use Symfony\Component\Process\Process;
use App\Services\InvoiceService;
class TestController extends Controller
{
    public function testArtisanCommand($id = 65, Request $request)
    {

// Company und Product abrufen
        $company = Company::first();
        $product = Product::first();

        // Erstelle ein neues Contract-Objekt mit Testdaten
        $contract = new Contract();
        $contract->contractable_id = $company->id; // Beispiel-ID für das Unternehmen (Company)
        $contract->contractable_type = Company::class;
        $contract->product_id = $product->id;
        $contract->price = $product->price;
        $contract->setup_fee = 0; // Beispiel für Setup-Fee, falls vorhanden
        $contract->interval = 'monthly'; // Beispielwert für den Intervall
        $contract->subscription_id = "2342323cgergwc";
        $contract->iteration = 1;
        $contract->data = json_encode(['extra_info' => 'Beispiel-Informationen']); // Beispiel für das JSON-Datenfeld
        $contract->order_date = Carbon::now()->subDays(7); // Beispiel-Bestelldatum
        $contract->start_date = Carbon::now()->subDays(0);;
        $contract->duration = 24; // Dauer in Monaten
        $contract->start_date = Carbon::now();
        $contract->end_date = Carbon::now()->addMonths($contract->duration);

        $contract->save();

        die();

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



public function test ()
{
    $invServ = new InvoiceService();
    echo $invServ->sendInvoiceEmail(98);
    die ('yep');
}

}
