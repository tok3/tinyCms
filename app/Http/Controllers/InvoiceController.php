<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\MollieCustomer;
use App\Models\MolliePayment;
use App\Services\InvoiceService;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class InvoiceController extends Controller
{
    protected $invoiceService;

    /**
     * Constructor to inject InvoiceService
     */
    public function __construct(InvoiceService $invoiceService)
    {
        $this->invoiceService = $invoiceService;
    }

    /**
     * Anzeige aller Rechnungen
     */
    public function index()
    {
        $invoices = Invoice::all();

        return view('invoices.index', compact('invoices'));
    }

    /**
     * Zeige ein Formular zur Erstellung einer neuen Rechnung
     */
    public function create()
    {
        $invoiceService = new InvoiceService();

        $invoiceService->sendInvoiceEmail(94);
        die();


        $paymentsWithoutInvoice = MolliePayment::withoutInvoice();

        foreach ($paymentsWithoutInvoice as $payment)
        {

            if ($payment->status == 'paid' && $payment->amount_value > 0.00)
            {

                $customer = MollieCustomer::where('mollie_customer_id', $payment->customer_id)->first();


                $total_gross = $payment->amount_value; // Bruttobetrag
                $tax_rate = 19; // 19% Steuersatz

                // Berechnungen
                $total_net = round($total_gross / (1 + ($tax_rate / 100)), 2); // Nettobetrag
                $tax = $total_gross - $total_net; // Steuerbetrag


                $invoiceData = [
                    'company_id' => $customer->model_id, // Eine existierende company_id, um eine Firma zu verknüpfen
                    'issue_date' => now()->format('Y-m-d'),
                    'mollie_payment_id' => $payment->payment_id,
                    'due_date' => $payment->paid_at,
                    'payment_date' => $payment->paid_at,
                    'total_net' => $total_net,
                    'total_gross' => $total_gross, // Mit Mehrwertsteuer
                    'tax' => $tax, // Mit Mehrwertsteuer
                    'tax_rate' => $tax_rate, // 19% Mehrwertsteuer
                    'status' => 'paid', // 19% Mehrwertsteuer
                    'data' => [
                        // Position 1
                        'items' => [
                            [
                                'id' => '1', // Positionsnummer
                                'description' => $payment->description, // Beschreibung
                                'quantity' => 1, // Menge
                                'line_total_amount' => $total_net, // Gesamtbetrag für diese Position
                            ],
                            /*   [
                                   'id' => '2', // Positionsnummer
                                   'description' => 'description',
                                   'quantity' => 1,
                                   'line_amount' => '199.00',
                               ],*/
                        ],

                    ]
                ];
                $invoiceService = new InvoiceService();

                $invoiceService->createInvoice($invoiceData);
            }
        }

        die();

        $invoiceService = new InvoiceService();

        // Testdaten für die Rechnungspositionen
        $invoiceData = [
            'company_id' => 34, // Eine existierende company_id, um eine Firma zu verknüpfen
            'issue_date' => now()->format('Y-m-d'),
            'mollie_payment_id' => 'tr_poja9tpop',
            'due_date' => now()->addDays(30),
            'total_net' => 198.0,
            'total_gross' => 235.62, // Mit Mehrwertsteuer
            'tax' => 37.62, // Mit Mehrwertsteuer
            'tax_rate' => 19, // 19% Mehrwertsteuer
            'data' => [
                // Position 1
                'items' => [
                    [
                        'id' => '1', // Positionsnummer
                        'description' => 'Seminarreihe: Expert - Fortbildung gem. der Makler- und Bauträgerverordnung (MaBV)', // Beschreibung
                        'quantity' => 1, // Menge
                        'line_total_amount' => '198.0', // Gesamtbetrag für diese Position
                    ],
                    /*   [
                           'id' => '2', // Positionsnummer
                           'description' => 'Seminarreihe: BASIS - Fortbildung gem. der Makler- und Bauträgerverordnung (MaBV)',
                           'quantity' => 1,
                           'line_amount' => '199.00',
                       ],*/
                ],
                // Weitere Positionen können hier hinzugefügt werden
            ]
        ];

        // Verwende den InvoiceService, um eine Rechnung zu erstellen
        $invoiceService->createInvoice($invoiceData);


        die();

        return view('invoices.create');
    }


    public function showInvoice($invoice_number)
    {

        // Lade den Pfad der PDF-Datei (z. B. aus der Datenbank oder anhand des Namensschemas)
        $pdfPath = storage_path('app/invoices/' . $invoice_number . '.pdf');

        // Überprüfe, ob die Datei existiert
        if (!file_exists($pdfPath))
        {
            abort(404, 'Die angeforderte Datei existiert nicht.');
        }



        return response()->file($pdfPath, [
            'Content-Type' => 'application/pdf',
        ]);
    }

    /**
     * Speichert eine neu erstellte Rechnung in der Datenbank
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_id' => 'required|exists:companies,id',
            'issue_date' => 'required|date',
            'due_date' => 'required|date',
            'total_net' => 'required|numeric',
            'total_gross' => 'required|numeric',
            'tax_rate' => 'required|numeric',
            'data' => 'required|json',
        ]);

        $invoiceNumber = $this->invoiceService->generateInvoiceNumber();

        $invoice = Invoice::create([
            'company_id' => $request->input('company_id'),
            'invoice_number' => $invoiceNumber,
            'issue_date' => $request->input('issue_date'),
            'due_date' => $request->input('due_date'),
            'total_net' => $request->input('total_net'),
            'total_gross' => $request->input('total_gross'),
            'tax_rate' => $request->input('tax_rate'),
            'tax' => ($request->input('total_gross') - $request->input('total_net')),
            'data' => $request->input('data'), // JSON data for invoice positions
        ]);

        return redirect()->route('invoices.index')->with('success', 'Rechnung wurde erfolgreich erstellt.');
    }

    /**
     * Anzeige einer einzelnen Rechnung
     */
    public function show($id)
    {
        $invoice = Invoice::findOrFail($id);

        return view('invoices.show', compact('invoice'));
    }

    /**
     * Zeige das Formular zur Bearbeitung einer bestehenden Rechnung
     */
    public function edit($id)
    {
        $invoice = Invoice::findOrFail($id);

        return view('invoices.edit', compact('invoice'));
    }

    /**
     * Aktualisiere eine bestehende Rechnung in der Datenbank
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'company_id' => 'required|exists:companies,id',
            'issue_date' => 'required|date',
            'due_date' => 'required|date',
            'total_net' => 'required|numeric',
            'total_gross' => 'required|numeric',
            'tax_rate' => 'required|numeric',
            'data' => 'required|json',
        ]);

        $invoice = Invoice::findOrFail($id);
        $invoice->update([
            'company_id' => $request->input('company_id'),
            'issue_date' => $request->input('issue_date'),
            'due_date' => $request->input('due_date'),
            'total_net' => $request->input('total_net'),
            'total_gross' => $request->input('total_gross'),
            'tax_rate' => $request->input('tax_rate'),
            'tax' => ($request->input('total_gross') - $request->input('total_net')),
            'data' => $request->input('data'),
        ]);

        return redirect()->route('invoices.index')->with('success', 'Rechnung wurde erfolgreich aktualisiert.');
    }

    /**
     * Lösche eine Rechnung aus der Datenbank
     */
    public function destroy($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();

        return redirect()->route('invoices.index')->with('success', 'Rechnung wurde erfolgreich gelöscht.');
    }
}
