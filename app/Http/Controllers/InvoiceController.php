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
        /* noch keine manuelle rechnungserstellung implentiert */

        $invoiceService = new InvoiceService();

        $invoiceService->sendInvoiceEmail();

    }


    public function showInvoice($invoice_number)
    {
        $pdfPath = storage_path('app/invoices/' . $invoice_number . '.pdf');

        if (!file_exists($pdfPath)) {
            $generatedPath = app(\App\Services\InvoiceService::class)->regenerateMergedPDF($invoice_number);

            if (! $generatedPath || ! file_exists($generatedPath)) {
                abort(404, 'Die angeforderte Rechnung konnte nicht erstellt werden.');
            }

            $pdfPath = $generatedPath;
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
     * Anzeige einer einzelnen Rechnung im Backend
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

    // App\Http\Controllers\InvoiceController.php
    public function downloadXRechnung(int $id, \App\Services\InvoiceService $service)
    {
        $invoice = \App\Models\Invoice::findOrFail($id);
        $xml = (new \ReflectionMethod($service, 'generateXRechnungData'))
            ->invoke($service, $invoice);

        return response($xml, 200, [
            'Content-Type'        => 'application/xml; charset=utf-8',
            'Content-Disposition' => 'attachment; filename="xrechnung-'.$invoice->invoice_number.'.xml"',
        ]);
    }

}
