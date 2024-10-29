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

// CustomizationID und ProfileID (für XRechnung ab Version 3.0)
        $xml->addChild('cbc:CustomizationID', 'urn:cen.eu:en16931:2017#compliant#urn:xeinkauf.de:kosit:xrechnung_3.0');
        $xml->addChild('cbc:ProfileID', 'urn:fdc:peppol.eu:2017:poacc:billing:01:1.0');

// Rechnungsnummer
        $xml->addChild('cbc:ID', $invoiceData['invoice_number']);

// Rechnungsdatum (nur Datum, kein Zeitstempel)
        $xml->addChild('cbc:IssueDate', date('Y-m-d', strtotime($invoiceData['issue_date'])));

// Lieferantendaten
        $cacSupplierParty = $xml->addChild('cac:AccountingSupplierParty')->addChild('cac:Party');
        $cacSupplierPartyName = $cacSupplierParty->addChild('cac:PartyName');
        $cacSupplierPartyName->addChild('cbc:Name', env('INVOICE_SUPPLIER_NAME'));
        $cacSupplierParty->addChild('cbc:CompanyID', env('INVOICE_SUPPLIER_VAT_ID'));

// Kundendaten
        $cacCustomerParty = $xml->addChild('cac:AccountingCustomerParty')->addChild('cac:Party');
        $cacCustomerPartyName = $cacCustomerParty->addChild('cac:PartyName');
        $cacCustomerPartyName->addChild('cbc:Name', $company->name);
        $cacCustomerParty->addChild('cbc:CompanyID', $company->vat_id);

// Zahlungsinformationen
        $paymentMeans = $xml->addChild('cac:PaymentMeans');
        $paymentMeans->addChild('cbc:PaymentMeansCode', '30'); // Code für Überweisung oder Mollie als Payment Processor
        $paymentMeans->addChild('cbc:PaymentID', $invoiceData['payment_id'] ?? $invoiceData['invoice_number']);

// Mollie spezifische Daten (wenn vorhanden)
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

// Gesamtbetrag (vor den Rechnungspositionen hinzufügen)
        $monetaryTotal = $xml->addChild('cac:LegalMonetaryTotal');
        $monetaryTotal->addChild('cbc:PayableAmount', $invoiceData['total_gross'])->addAttribute('currencyID', $invoiceData['currency']);

// XML formatieren
        $dom = new \DOMDocument('1.0', 'UTF-8');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($xml->asXML());
        $formattedXml = $dom->saveXML();


        // test


        // Erstelle ein DOMDocument-Objekt
        $dom = new \DOMDocument;
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($formattedXml);




// Ausgabe des formatierten XML
//echo $dom->saveXML();
// Initialisiere das XML-Dokument mit den entsprechenden Namespaces
        // XML-Dokument mit den richtigen Namespaces erzeugen
        // SimpleXML-Objekt erstellen
        $xml = new \SimpleXMLElement('<ubl:Invoice xmlns:ubl="urn:oasis:names:specification:ubl:schema:xsd:Invoice-2" xmlns:cac="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2" xmlns:cbc="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2"/>');

// CustomizationID und ProfileID
        $xml->addChild('cbc:CustomizationID', 'urn:cen.eu:en16931:2017#compliant#urn:xeinkauf.de:kosit:xrechnung_3.0', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
        $xml->addChild('cbc:ProfileID', 'urn:fdc:peppol.eu:2017:poacc:billing:01:1.0', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');

// Rechnungsnummer, Datum, und andere Angaben
        $xml->addChild('cbc:ID', '123456XX', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
        $xml->addChild('cbc:IssueDate', '2016-04-04', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
        $xml->addChild('cbc:InvoiceTypeCode', '380', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
        $xml->addChild('cbc:DocumentCurrencyCode', 'EUR', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
        $xml->addChild('cbc:BuyerReference', '04011000-12345-03', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');

// Lieferantendaten
        $cacSupplierParty = $xml->addChild('cac:AccountingSupplierParty', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
        $cacParty = $cacSupplierParty->addChild('cac:Party', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
        $cacParty->addChild('cbc:EndpointID', 'seller@email.de', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')->addAttribute('schemeID', 'EM');
        $partyName = $cacParty->addChild('cac:PartyName', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
        $partyName->addChild('cbc:Name', '[Seller trading name]', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
        $postalAddress = $cacParty->addChild('cac:PostalAddress', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
        $postalAddress->addChild('cbc:StreetName', '[Seller address line 1]', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
        $postalAddress->addChild('cbc:CityName', '[Seller city]', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
        $postalAddress->addChild('cbc:PostalZone', '12345', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
        $country = $postalAddress->addChild('cac:Country', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
        $country->addChild('cbc:IdentificationCode', 'DE', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');

// Steuerinformationen des Lieferanten
        $partyTaxScheme = $cacParty->addChild('cac:PartyTaxScheme', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
        $partyTaxScheme->addChild('cbc:CompanyID', 'DE123456789', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
        $taxScheme = $partyTaxScheme->addChild('cac:TaxScheme', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
        $taxScheme->addChild('cbc:ID', 'VAT', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');

// Rechtliche Angaben des Lieferanten
        $partyLegalEntity = $cacParty->addChild('cac:PartyLegalEntity', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
        $partyLegalEntity->addChild('cbc:RegistrationName', '[Seller name]', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
        $partyLegalEntity->addChild('cbc:CompanyID', '[HRA-Eintrag]', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
        $partyLegalEntity->addChild('cbc:CompanyLegalForm', '123/456/7890, HRA-Eintrag in [...]', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');

// Kontaktinformationen des Lieferanten
        $contact = $cacParty->addChild('cac:Contact', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
        $contact->addChild('cbc:Name', 'nicht vorhanden', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
        $contact->addChild('cbc:Telephone', '+49 1234-5678', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
        $contact->addChild('cbc:ElectronicMail', 'seller@email.de', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');

// Kundendaten
        $cacCustomerParty = $xml->addChild('cac:AccountingCustomerParty', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
        $cacParty = $cacCustomerParty->addChild('cac:Party', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
        $cacParty->addChild('cbc:EndpointID', 'buyer@info.de', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')->addAttribute('schemeID', 'EM');
        $partyIdentification = $cacParty->addChild('cac:PartyIdentification', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
        $partyIdentification->addChild('cbc:ID', '[Buyer identifier]', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
        $postalAddress = $cacParty->addChild('cac:PostalAddress', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
        $postalAddress->addChild('cbc:StreetName', '[Buyer address line 1]', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
        $postalAddress->addChild('cbc:CityName', '[Buyer city]', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
        $postalAddress->addChild('cbc:PostalZone', '12345', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
        $country = $postalAddress->addChild('cac:Country', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
        $country->addChild('cbc:IdentificationCode', 'DE', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
        $partyLegalEntity = $cacParty->addChild('cac:PartyLegalEntity', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
        $partyLegalEntity->addChild('cbc:RegistrationName', '[Buyer name]', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');

// Zahlungsinformationen
        $paymentMeans = $xml->addChild('cac:PaymentMeans', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
        $paymentMeans->addChild('cbc:PaymentMeansCode', '58', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
        $payeeFinancialAccount = $paymentMeans->addChild('cac:PayeeFinancialAccount', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
        $payeeFinancialAccount->addChild('cbc:ID', 'DE75512108001245126199', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');

// Zahlungsbedingungen
        $paymentTerms = $xml->addChild('cac:PaymentTerms', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
        $paymentTerms->addChild('cbc:Note', 'Zahlbar sofort ohne Abzug.', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');

        // Steuerinformationen
        $taxTotal = $xml->addChild('cac:TaxTotal', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
        $taxTotal->addChild('cbc:TaxAmount', '19.00', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')->addAttribute('currencyID', 'EUR');
        $taxSubtotal = $taxTotal->addChild('cac:TaxSubtotal', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
        $taxSubtotal->addChild('cbc:TaxableAmount', '100.00', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')->addAttribute('currencyID', 'EUR');
        $taxSubtotal->addChild('cbc:TaxAmount', '19.00', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')->addAttribute('currencyID', 'EUR');
        $taxCategory = $taxSubtotal->addChild('cac:TaxCategory', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
        $taxCategory->addChild('cbc:ID', 'S', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
        $taxCategory->addChild('cbc:Percent', '19', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
        $taxScheme = $taxCategory->addChild('cac:TaxScheme', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
        $taxScheme->addChild('cbc:ID', 'VAT', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');

        // Steuerinformationen
        $taxTotal = $xml->addChild('cac:TaxTotal', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
        $taxTotal->addChild('cbc:TaxAmount', '19.00', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')->addAttribute('currencyID', 'EUR');
        $taxSubtotal = $taxTotal->addChild('cac:TaxSubtotal', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
        $taxSubtotal->addChild('cbc:TaxableAmount', '100.00', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')->addAttribute('currencyID', 'EUR');
        $taxSubtotal->addChild('cbc:TaxAmount', '19.00', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')->addAttribute('currencyID', 'EUR');
        $taxCategory = $taxSubtotal->addChild('cac:TaxCategory', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
        $taxCategory->addChild('cbc:ID', 'S', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
        $taxCategory->addChild('cbc:Percent', '19', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
        $taxScheme = $taxCategory->addChild('cac:TaxScheme', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
        $taxScheme->addChild('cbc:ID', 'VAT', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');

// Gesamtbetrag (LegalMonetaryTotal)
        $legalMonetaryTotal = $xml->addChild('cac:LegalMonetaryTotal', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
        $legalMonetaryTotal->addChild('cbc:LineExtensionAmount', '100.00', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')->addAttribute('currencyID', 'EUR');
        $legalMonetaryTotal->addChild('cbc:TaxExclusiveAmount', '100.00', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')->addAttribute('currencyID', 'EUR');
        $legalMonetaryTotal->addChild('cbc:TaxInclusiveAmount', '119.00', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')->addAttribute('currencyID', 'EUR');
        $legalMonetaryTotal->addChild('cbc:PayableAmount', '119.00', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')->addAttribute('currencyID', 'EUR');

// Rechnungspositionen
        $invoiceLine = $xml->addChild('cac:InvoiceLine', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
        $invoiceLine->addChild('cbc:ID', '1', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
        $invoiceLine->addChild('cbc:InvoicedQuantity', '1', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')->addAttribute('unitCode', 'XPP');
        $invoiceLine->addChild('cbc:LineExtensionAmount', '100.00', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')->addAttribute('currencyID', 'EUR');
        $item = $invoiceLine->addChild('cac:Item', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
        $item->addChild('cbc:Name', 'Artikelname Beispiel', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
        $classifiedTaxCategory = $item->addChild('cac:ClassifiedTaxCategory', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
        $classifiedTaxCategory->addChild('cbc:ID', 'S', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
        $classifiedTaxCategory->addChild('cbc:Percent', '19', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');
        $taxScheme = $classifiedTaxCategory->addChild('cac:TaxScheme', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
        $taxScheme->addChild('cbc:ID', 'VAT', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');

// Artikelpreis
        $price = $invoiceLine->addChild('cac:Price', null, 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2');
        $price->addChild('cbc:PriceAmount', '100.00', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')->addAttribute('currencyID', 'EUR');

// Formatierte XML-Ausgabe
        $dom = new \DOMDocument('1.0', 'UTF-8');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($xml->asXML());
        echo $dom->saveXML();



        // ende test
        return 'yo';
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
