<?php

namespace App\Services;

use App\Models\Invoice;
use App\Models\Company;
use Carbon\Carbon;
use App\Models\InvoiceCounter;

class InvoiceService
{
    /**
     * Erstelle eine neue Rechnung und speichere sie in der Datenbank.
     *
     * @param array $data
     * @return Invoice
     */
    public function createInvoice(array $data): Invoice
    {
        $invoice = new Invoice();
        $invoice->invoice_number = $this->generateInvoiceNumber();
        $invoice->company_id = $data['company_id'];
        $invoice->issue_date = Carbon::now();
        $invoice->due_date = isset($data['due_date']) ? Carbon::parse($data['due_date']) : Carbon::now()->addDays(30);
        $invoice->total_net = $data['total_net'];
        $invoice->total_gross = $data['total_gross'];
        $invoice->tax_rate = $data['tax_rate'];
        $invoice->tax = $data['tax'];
        $invoice->currency = $data['currency'] ?? 'EUR';
        $invoice->status = 'draft';

        // Speichere JSON-Daten für Rechnungspositionen
        $invoice->data = json_encode($data['data']);

        // Speichere Zugferd und XRechnung-Daten
        $invoice->zugferd_data = $data['zugferd_data'] ?? null;


       $data['xrechnung_data'] = $this->generateXRechnungData($invoice);

        $invoice->xrechnung_data = $data['xrechnung_data'] ?? null;

        // Speichere die Rechnung
        $invoice->save();

        return $invoice;
    }

    /**
     * Generiere eine Rechnungsnummer (einfache Implementierung, anpassbar).
     *
     * @return string
     */
    public function generateInvoiceNumber(): string
    {
        // Verwende eine Transaktion, um sicherzustellen, dass kein anderer Prozess die Nummer in der Zwischenzeit erhöht.
        return \DB::transaction(function () {
            $counter = InvoiceCounter::firstOrCreate([], ['current_value' => 0]);

            // Erhöhe den aktuellen Zählerstand
            $counter->current_value++;
            $counter->save();

            // Generiere die Rechnungsnummer (z.B. 'INV-2024-001')
            $year = date('y');
            $week = date('W');

            $invoiceNumber = 'RG-' . $week.$year . '-' . str_pad($counter->current_value, 4, '0', STR_PAD_LEFT);

            return $invoiceNumber;
        });
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
            $invoice->data = json_encode($data['items']);
        }

        // Zugferd- und XRechnung-Daten aktualisieren
        $invoice->zugferd_data = $data['zugferd_data'] ?? $invoice->zugferd_data;
        $invoice->xrechnung_data = $data['xrechnung_data'] ?? $invoice->xrechnung_data;

        $invoice->save();

        return $invoice;
    }

    // Methode zur Generierung der XRechnung-Daten
    private function generateXRechnungData(object $invoiceData): string
    {
       $company = Company::where('id',$invoiceData['company_id'])->first();

       $xml = new \SimpleXMLElement('<Invoice></Invoice>');

        // XML-Namespace für XRechnung definieren
        $xml->addAttribute('xmlns', 'urn:oasis:names:specification:ubl:schema:xsd:Invoice-2');
        $xml->addAttribute('xmlns:cac', 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
        $xml->addAttribute('xmlns:cbc', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');

        // Rechnungsnummer
        $xml->addChild('cbc:ID', $invoiceData['invoice_number']);

        // Rechnungsdatum
        $xml->addChild('cbc:IssueDate', $invoiceData['issue_date']);

        // Lieferantendaten
        $cacSupplierParty = $xml->addChild('cac:AccountingSupplierParty')->addChild('cac:Party');
        $cacSupplierParty->addChild('cbc:Name', env('INVOICE_SUPPLIER_NAME'));
        $cacSupplierParty->addChild('cbc:CompanyID', env('INVOICE_SUPPLIER_VAT_ID'));

        // Kundendaten
        $cacCustomerParty = $xml->addChild('cac:AccountingCustomerParty')->addChild('cac:Party');
        $cacCustomerParty->addChild('cbc:Name', $company->name);
        $cacCustomerParty->addChild('cbc:CompanyID', $company->vat_id);

        // Zahlungsinformationen
        $paymentMeans = $xml->addChild('cac:PaymentMeans');
        $paymentMeans->addChild('cbc:PaymentMeansCode', '30'); // Code für Überweisung oder Mollie als Payment Processor
        $paymentMeans->addChild('cbc:PaymentID', $invoiceData['payment_id'] ?? $invoiceData['invoice_number']);

        // Mollie spezifische Daten (wenn vorhanden)
        $paymentMeans->addChild('cbc:PaymentChannelCode', 'Mollie');
        $paymentMeans->addChild('cbc:InstructionNote', 'Paid via Mollie Payment Provider');
        if (isset($invoiceData['mollie_method'])) {
            $paymentMeans->addChild('cbc:InstructionNote', 'Payment Method: ' . $invoiceData['mollie_method']);
        }

        // Steuerinformationen
        $taxTotal = $xml->addChild('cac:TaxTotal');
        $taxTotal->addChild('cbc:TaxAmount', $invoiceData['total_tax'])->addAttribute('currencyID', $invoiceData['currency']);

        // Rechnungspositionen
        $items = json_decode($invoiceData['data'], true)['items'];
        foreach ($items as $item) {
            $line = $xml->addChild('cac:InvoiceLine');
            $line->addChild('cbc:ID', $item['id']);
            $line->addChild('cbc:InvoicedQuantity', $item['quantity']);
            $line->addChild('cbc:LineExtensionAmount', $item['line_amount'])->addAttribute('currencyID', $invoiceData['currency']);
            $itemNode = $line->addChild('cac:Item');
            $itemNode->addChild('cbc:Name', $item['description']);
        }

        // Gesamtbetrag
        $monetaryTotal = $xml->addChild('cac:LegalMonetaryTotal');
        $monetaryTotal->addChild('cbc:PayableAmount', $invoiceData['total_gross'])->addAttribute('currencyID', $invoiceData['currency']);

        // XML formatieren
        $formattedXml = $xml->asXML();

        echo $formattedXml;
        return $formattedXml;
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
}
