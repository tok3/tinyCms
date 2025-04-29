<?php

namespace App\Services;

use App\Models\Invoice;
use App\Models\Company;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use App\Models\InvoiceCounter;
use horstoeko\zugferd\ZugferdDocumentBuilder;
use horstoeko\zugferd\ZugferdProfiles;
use horstoeko\zugferd\ZugferdDocumentPdfBuilder;
use horstoeko\zugferd\ZugferdDocumentPdfMerger;
use TCPDF;
use App\Mail\InvoiceMail;
use Illuminate\Support\Facades\Mail;
class InvoiceService
{
    /**
     * Erstelle eine neue Rechnung und speichere sie in der Datenbank.
     *
     * @param array $data
     * @return Invoice
     */

    protected $invoiceId;
    protected string $invoiceNumberPrefix = 'RG';
    public function createInvoice(array $data): Invoice
    {
        // Prüfe, ob bereits eine Rechnung für die gegebene mollie_payment_id existiert
        $existingInvoice = Invoice::where('mollie_payment_id', $data['mollie_payment_id'])->first();

        // Falls bereits eine Rechnung existiert, gib sie zurück und überspringe die Erstellung
        if (($data['mollie_payment_id'] !== null) && $existingInvoice) {
            return $existingInvoice;
        }

        $invoice = new Invoice();
        $invoice->invoice_number = $this->generateInvoiceNumber();
        $invoice->company_id = $data['company_id'];
        $invoice->ref_to_id = $data['ref_to_id'] ?? null;
        $invoice->type = $this->invoiceNumberPrefix;
        $invoice->mollie_payment_id = $data['mollie_payment_id'] ?? null;
        $invoice->contract_id = $data['contract_id'];

        // Fix: Verwende das mitgegebene issue_date, wenn vorhanden
        $invoice->issue_date = isset($data['issue_date']) ? Carbon::parse($data['issue_date']) : Carbon::now();
        $invoice->due_date = isset($data['due_date']) ? Carbon::parse($data['due_date']) : Carbon::now();
        $invoice->payment_date = isset($data['payment_date']) ? Carbon::parse($data['payment_date']) : null;

        $invoice->total_net = $data['total_net'];
        $invoice->total_gross = $data['total_gross'];
        $invoice->tax_rate = $data['tax_rate'];
        $invoice->tax = $data['tax'];
        $invoice->currency = $data['currency'] ?? 'EUR';
        $invoice->status = $data['status'];

        // Fix: KEIN json_encode mehr → wir haben Casts auf array im Model
        $invoice->data = $data['data'];

        // XRechnung erzeugen
        $data['xrechnung_data'] = $this->generateXRechnungData($invoice);
        $invoice->xrechnung_data = $data['xrechnung_data'];

        $invoice->save();

        // PDF generieren (TMP)
        $pdfInvoicePath = $this->generatePDF($invoice->id);

        // Merge: PDF + XML zu finalem PDF
        $existingXml = $data['xrechnung_data'];
        $existingPdf = storage_path('app/' . $pdfInvoicePath);
        $mergeToPdf = storage_path('app/' . str_replace('-tmp', '', $pdfInvoicePath));

        (new ZugferdDocumentPdfMerger($existingXml, $existingPdf))
            ->generateDocument()
            ->saveDocument($mergeToPdf);

        // Temporäre Datei löschen
        unlink($existingPdf);

        $this->invoiceId = $invoice->id;

        return $invoice;
    }


    /**
     * @param $id
     * @return string
     */
    public function generatePDF($id)
    {

        // Daten für die Rechnung abrufen
        $invoice = Invoice::with('company')->findOrFail($id);

        $additionalData = [];
        if($invoice['mollie_payment_id'] != "")
        {
        $additionalData['hint'] = 'Die Rechnung ist bereits Bezahlt über unseren Zahlungsdienstleister Mollie Transaktions-ID <strong>' . $invoice['mollie_payment_id'] . '</strong>';
        }


        // PDF mit Blade-Template generieren
        $pdf = Pdf::loadView('accounting.invoice-pdf', compact('invoice', 'additionalData'))
            ->setPaper('a4', 'portrait');

        // PDF anzeigen oder herunterladen
        //return $pdf->stream("Rechnung-{$invoice->invoice_number}.pdf");


        // PDF-Inhalt als String abrufen und im Storage speichern

        /*header('Content-Type: application/pdf');
        echo $pdf->stream();*/
        $pdfContent = $pdf->output();
        $pdfPath = "invoices/{$invoice->invoice_number}-tmp.pdf";


        \Storage::put("$pdfPath", $pdfContent);


        // Optional: Rückgabe oder weitere Aktionen
        return $pdfPath;

    }

    /**
     * Rechnnung neu erzeugen wenn vom file system gelöscht
     *
     * @param string $invoiceNumber
     * @return string|null
     */
    public function regenerateMergedPDF(string $invoiceNumber): ?string
    {
        $invoice = Invoice::where('invoice_number', $invoiceNumber)->first();

        if (! $invoice) {
            return null;
        }

        // PDF (TMP) neu generieren
        $tmpPath = $this->generatePDF($invoice->id);

        // Vorhandene XML-Daten abrufen
        $xmlData = $invoice->xrechnung_data;
        if (! $xmlData) {
            $xmlData = $this->generateXRechnungData($invoice);
        }

        // Merge durchführen
        $existingPdf = storage_path('app/' . $tmpPath);
        $mergedPdf = storage_path('app/' . str_replace('-tmp', '', $tmpPath));

        (new \horstoeko\zugferd\ZugferdDocumentPdfMerger($xmlData, $existingPdf))
            ->generateDocument()
            ->saveDocument($mergedPdf);

        unlink($existingPdf);

        return $mergedPdf;
    }
    /**
     * Generiere eine Rechnungsnummer (einfache Implementierung, anpassbar).
     *
     * @return string
     */
    public function generateInvoiceNumber(): string
    {
        return \DB::transaction(function () {
            $counter = InvoiceCounter::firstOrCreate([], ['current_value' => 0]);
            $counter->increment('current_value');
            $year = date('y');
            $week = date('W');
            $seq = str_pad($counter->current_value, 4, '0', STR_PAD_LEFT);
            return "{$this->invoiceNumberPrefix}{$week}{$year}{$seq}";
        });
    }

    public function createCorrectionInvoice(int $originalInvoiceId, string $reason): Invoice
    {
        $original = Invoice::findOrFail($originalInvoiceId);

        $data = [
            'company_id'        => $original->company_id,
            'contract_id'       => $original->contract_id,
            'ref_to_id'         => $original->id,
            'issue_date'        => now()->format('Y-m-d'),
            'mollie_payment_id' => null,
            'due_date'          => now()->format('Y-m-d'),
            'payment_date'      => now()->format('Y-m-d'),
            'total_net'         => -1 * $original->total_net,
            'total_gross'       => -1 * $original->total_gross,
            'tax_rate'          => $original->tax_rate,
            'tax'               => -1 * $original->tax,
            'status'            => 'sent',
            'currency'          => $original->currency,
            'data'              => [
                'items' => collect($original->data['items'])
                    ->map(function ($item) {
                        $item['line_total_amount'] *= -1;
                        return $item;
                    })->values()->all(),
                'correction_reason' => $reason,
            ],
        ];

        $oldPrefix = $this->invoiceNumberPrefix ?? 'RG';
        $this->invoiceNumberPrefix = 'KR';

        $correction = $this->createInvoice($data);

        $this->invoiceNumberPrefix = $oldPrefix;

        $original->status = 'paid';
        $original->save();

        return $correction;
    }

    /**
     * Aktualisiere eine bestehende Rechnung.
     *
     * @param Invoice $invoice
     * @param array $data
     * @return Invoice
     */
    public function updateInvoice(Invoice $invoice, array $data): Invoice
    {
        $invoice->total_net = $data['total_net'] ?? $invoice->total_net;
        $invoice->total_gross = $data['total_gross'] ?? $invoice->total_gross;
        $invoice->tax_rate = $data['tax_rate'] ?? $invoice->tax_rate;
        $invoice->due_date = isset($data['due_date']) ? Carbon::parse($data['due_date']) : $invoice->due_date;

        // Rechnungspositionen aktualisieren
        if (isset($data['items']))
        {
            $invoice->data = ['items' => $data['items']];
        }

        // Zugferd- und XRechnung-Daten aktualisieren
        $invoice->xrechnung_data = $data['xrechnung_data'] ?? $invoice->xrechnung_data;

        $invoice->save();

        return $invoice;
    }


    /**
     * Generierung der XRechnung-Daten
     *
     * @param object $invoiceData
     * @return string
     */
    private function generateXRechnungData(object $invoiceData): string
    {
        // Aufruf der Funktion und Speicherort angeben
        $companyDetails = config('accounting.company_details');


        $company = Company::where('id', $invoiceData['company_id'])->first();

        // Erstelle ein DateTime-Objekt für das Dokumentdatum
        $issueDate = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $invoiceData['issue_date'])->toDateTime();

        $filePath = storage_path("XRechnung.xml");

        $data = $invoiceData['data'];


        $document = ZugferdDocumentBuilder::CreateNew(ZugferdProfiles::PROFILE_XRECHNUNG);

        // ----------------------------------------------------------
        // Add invoice and position information

        $document
            ->setDocumentInformation($invoiceData['invoice_number'], "380", $issueDate, config('accounting.currency'))
            ->setDocumentBusinessProcess($companyDetails['business_process'])
            ->setDocumentSupplyChainEvent(new \DateTime())
            ->setDocumentSeller($companyDetails['name'])
            ->addDocumentSellerGlobalId($companyDetails['global_id']['id'], $companyDetails['global_id']['scheme'])
            ->addDocumentSellerTaxRegistration("VA", $companyDetails['tax_registration']['vat_id'])
            ->addDocumentSellerTaxRegistration("FC", $companyDetails['tax_registration']['tax_number'])
            ->setDocumentSellerAddress(
                $companyDetails['address']['street'],
                "",
                "",
                $companyDetails['address']['postal_code'],
                $companyDetails['address']['city'],
                $companyDetails['address']['country']
            )
            ->setDocumentSellerCommunication('EM', $companyDetails['contact']['email'])
            ->setDocumentBuyer(trim($company->name . ' ' . $company->name2), $company->id)
            ->setDocumentBuyerAddress($company->str, "", "", $company->plz, $company->ort, "DE")
            ->setDocumentBuyerCommunication('EM', $company->email)
            ->addDocumentPaymentMean("59", "Mollie Payment ID: " . $invoiceData['mollie_payment_id']);


        foreach ($data['items'] as $item)
        {

            $document->addNewPosition($item['id'])
                ->setDocumentPositionProductDetails($item['description'], "", "", null, "0160", null)
                ->setDocumentPositionNetPrice($item['line_total_amount'])
                ->setDocumentPositionQuantity($item['quantity'], "H87")
                ->addDocumentPositionTax('S', 'VAT', $invoiceData['tax_rate'])
                ->setDocumentPositionLineSummation($item['line_total_amount']);

        }
        $document
            ->addDocumentTax("S", "VAT", $invoiceData['total_net'], $invoiceData['tax'], $invoiceData['tax_rate'])
            ->setDocumentSummation($invoiceData['total_gross'], $invoiceData['total_gross'], $invoiceData['total_net'], 0.0, 0.0, $invoiceData['total_net'], $invoiceData['tax'], null, 0.0)
            ->addDocumentPaymentTerm("", null, null);

        return $document;


    }

    /**
     * Storniere eine Rechnung (setzt den Status auf 'canceled').
     *
     * @param Invoice $invoice
     * @return Invoice
     */
    public function cancelInvoice(Invoice $invoice): Invoice
    {
        $invoice->status = 'canceled';
        $invoice->save();

        return $invoice;
    }


    public function sendInvoiceEmail($invoiceId = false)
    {
        if ($invoiceId == false && $this->invoiceId > 0)
        {
            $invoiceId = $this->invoiceId;
        }
        if ($invoiceId == false && empty($this->invoiceId))
        {
            return false;
        }
        // Beispiel-Invoice-Daten
        $invoice = Invoice::where('id', $invoiceId)->first();

        storage_path('app/invoices/');
        // Pfad zur gespeicherten PDF-Rechnung
        $pdfPath = storage_path('app/invoices/' . $invoice->invoice_number . '.pdf');

echo $invoiceId; die();


       /* Mail::raw('Dies ist eine Testnachricht.', function ($message) use ($invoice) {
            $message->to($invoice->company->email)
                ->subject('Test-Mail');
        });*/

       // echo (new \App\Mail\InvoiceMail($invoice, $pdfPath))->render();


        // Sende die E-Mail mit dem PDF-Anhang
        //Mail::to($invoice->company->email)->send(new InvoiceMail($invoice, $pdfPath));


        // mail mit 5 min versatz senden
        Mail::to($invoice->company->email)->later(now()->addMinutes(5), new InvoiceMail($invoice, $pdfPath));


        return 'Rechnung wurde an '.$invoice->company->email.' versendet!';
    }


}
