<?php

namespace App\Services;

use App\Models\Invoice;
use App\Models\Company;
use App\Models\InvoicesSent;

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
    public string $invoiceNumberPrefix = 'RG';
    public function createInvoice(array $data): Invoice
    {
        $existingInvoice = null;


        if (array_key_exists('mollie_payment_id', $data) && $data['mollie_payment_id'] !== null) {
            $existingInvoice = Invoice::where('mollie_payment_id', $data['mollie_payment_id'])->first();

            if ($existingInvoice) {
                return $existingInvoice;
            }
        }

        // Tenant holen (ursprüngliche Firma aus $data['company_id'])
        $tenant = \App\Models\Company::find($data['company_id'] ?? null);

        if ($tenant && (int)($tenant->billing_via_agency ?? 0) === 1 && !empty($tenant->agency_company_id)) {
            // Rechnung soll über die Agency laufen
            $data['company_id'] = (int) $tenant->agency_company_id;

            // Merke im Invoice-Data, für wen die Rechnung ist (für PDF-Hinweis)
            $data['data']['meta']['billed_for_company_name'] = $tenant->name;
            $data['data']['meta']['billed_for_company_id']   = $tenant->id;
        }

        $invoice = new Invoice();
        $invoice->invoice_number = $this->generateInvoiceNumber();
        $invoice->company_id = $data['company_id'];
        $invoice->ref_to_id = $data['ref_to_id'] ?? null;
        $invoice->type = $this->invoiceNumberPrefix;
        $invoice->mollie_payment_id = $data['mollie_payment_id'] ?? null;
        $invoice->contract_id = $data['contract_id'] ?? null;

        // Falls Contract vorhanden: Company ggf. auf Agency umbiegen
        if (!empty($data['contract_id'])) {
            $contract = \App\Models\Contract::find($data['contract_id']);
            if ($contract) {
                // Mandanten-Firma (der eigentliche Kunde am Vertrag)
                $tenantCompany = $contract->contractable; // polymorph zu Company
                if ($tenantCompany instanceof \App\Models\Company
                    && (int)($tenantCompany->billing_by_agency ?? 0) === 1
                    && !empty($tenantCompany->agency_company_id)
                ) {
                    // Rechnung an die Agency adressieren
                    $data['company_id'] = (int)$tenantCompany->agency_company_id;
                }
            }
        }


        $invoice->company_id = $data['company_id'];

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

        // Hinweis, wenn über Agency fakturiert wird
        $billedFor = $invoice->data['meta']['billed_for_company_name'] ?? null;
        if ($billedFor) {
            $note = 'Rechnung für Kunde/Projekt: <strong>' . e($billedFor) . '</strong>';
            $additionalData['agency_hint'] = $note;
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
    public function generateInvoiceNumber(string $prefix = null): string
    {
        $prefix ??= $this->invoiceNumberPrefix;

        return \DB::transaction(function () use ($prefix) {
            $counter = InvoiceCounter::firstOrCreate([], ['current_value' => 0]);
            $counter->increment('current_value');
            $year = date('y');
            $week = date('W');
            $seq = str_pad($counter->current_value, 4, '0', STR_PAD_LEFT);
            return "{$prefix}{$week}{$year}{$seq}";
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
        $cfg      = config('accounting');
        $seller   = $cfg['company_details'] ?? [];
        $currency = $cfg['currency'] ?? 'EUR';

        $ibanRaw  = (string)($seller['bank']['iban'] ?? '');
        $iban     = strtoupper(preg_replace('/\s+/', '', $ibanRaw));
        $bic      = (string)($seller['bank']['bic'] ?? '');

        // Zugriffe für Array/Eloquent-Objekt
        $get = fn($k,$d=null)=> is_array($invoiceData)?($invoiceData[$k]??$d):($invoiceData->$k??$d);

        $company    = Company::find($get('company_id'));
        $issueDate  = Carbon::parse($get('issue_date'))->startOfDay()->toDateTime();
        $dueDate    = $get('due_date') ? Carbon::parse($get('due_date'))->startOfDay()->toDateTime() : null;

        // Items robust holen
        $data       = $get('data', []);
        $items      = is_array($data) ? ($data['items'] ?? []) : ((array)$data->items ?? []);
        $taxRate    = (float)$get('tax_rate', (float)($cfg['tax_rate'] ?? 19));

        // --- Profil & Typ ---
        $profile = defined(\horstoeko\zugferd\ZugferdProfiles::class.'::PROFILE_XRECHNUNG_3')
            ? \horstoeko\zugferd\ZugferdProfiles::PROFILE_XRECHNUNG_3
            : \horstoeko\zugferd\ZugferdProfiles::PROFILE_XRECHNUNG;

        $isCredit   = ((float)$get('total_gross', 0)) < 0;
        $invType    = class_exists(\horstoeko\zugferd\codelists\ZugferdInvoiceType::class)
            ? ($isCredit ? \horstoeko\zugferd\codelists\ZugferdInvoiceType::CREDIT_NOTE
                : \horstoeko\zugferd\codelists\ZugferdInvoiceType::INVOICE)
            : ($isCredit ? "381" : "380");

        $doc = \horstoeko\zugferd\ZugferdDocumentBuilder::CreateNew($profile);
        $doc->setDocumentInformation((string)$get('invoice_number'), $invType, $issueDate, $currency);

        if (!empty($seller['business_process']) && method_exists($doc,'setDocumentBusinessProcess')) {
            $doc->setDocumentBusinessProcess($seller['business_process']);
        }

        // --- SELLER (inkl. BT-29/31/32 + BG-6) ---
        $sellerName = (string)($seller['name'] ?? 'Unbekannter Verkäufer');
        $doc->setDocumentSeller($sellerName, null);
        $doc->setDocumentSellerAddress(
            (string)($seller['address']['street'] ?? ''), "", "",
            (string)($seller['address']['postal_code'] ?? ''),
            (string)($seller['address']['city'] ?? ''),
            (string)($seller['address']['country'] ?? 'DE')
        );

        // BT-29: Seller identifier (z.B. DUNS 0060)
        if (!empty($seller['global_id']['id']) && !empty($seller['global_id']['scheme'])) {
            $doc->addDocumentSellerGlobalId($seller['global_id']['id'], $seller['global_id']['scheme']);
        }

        // BT-31 / BT-32 — unbedingt setzen (BR-S-02 / BR-DE-16)
        $vatId  = (string)($seller['tax_registration']['vat_id'] ?? '');
        $taxNo  = (string)($seller['tax_registration']['tax_number'] ?? '');

        // Die horstoeko-API bietet mehrere Varianten je Version – wir setzen beides:
        if (method_exists($doc, 'addDocumentSellerVATRegistrationNumber') && !empty($vatId)) {
            $doc->addDocumentSellerVATRegistrationNumber($vatId);          // BT-31
        }
        if (method_exists($doc, 'addDocumentSellerTaxNumber') && !empty($taxNo)) {
            $doc->addDocumentSellerTaxNumber($taxNo);                      // BT-32
        }
        // Zusätzlich klassisch über TaxRegistration (ältere Versionen):
        if (!empty($vatId)) { $doc->addDocumentSellerTaxRegistration("VA", $vatId); }
        if (!empty($taxNo)) { $doc->addDocumentSellerTaxRegistration("FC", $taxNo); }

        // Kommunikation + BG-6 Seller Contact (BR-DE-2)
        $sellerEmail = (string)($seller['contact']['email'] ?? 'info@example.org');
        $doc->setDocumentSellerCommunication('EM', $sellerEmail);
        if (method_exists($doc, 'setDocumentSellerContact')) {
            $doc->setDocumentSellerContact(
                'Rechnungsstelle',      // Name
                null,                   // Dept
                (string)($seller['contact']['phone'] ?? '000'), // Phone
                null,                   // Fax
                $sellerEmail            // Email
            );
        }

        // --- BUYER ---
        $buyerName = trim(($company->name ?? '').' '.($company->name2 ?? ''));
        $doc->setDocumentBuyer($buyerName !== '' ? $buyerName : 'Kunde', (string)($company->id ?? ''));
        $doc->setDocumentBuyerAddress(
            (string)($company->str ?? ''), "", "",
            (string)($company->plz ?? ''), (string)($company->ort ?? ''), 'DE'
        );
        $doc->setDocumentBuyerCommunication('EM', (string)($company->email ?? 'kundenrechnung@example.com'));

        // BT-10 Leitweg-ID
        $leitweg = (string)($company->leitweg_id ?? '');
        if ($leitweg !== '') {
            $doc->setDocumentBuyerReference($leitweg);
        }
        // BT-49 elektronische Adresse Buyer (0204 bei Leitweg, sonst EM)
        if (method_exists($doc, 'setDocumentBuyerElectronicAddress')) {
            $doc->setDocumentBuyerElectronicAddress(
                $leitweg !== '' ? $leitweg : (string)($company->email ?? 'kundenrechnung@example.com'),
                $leitweg !== '' ? '0204' : 'EM'
            );
        }

        // --- PAYMENT (BG-16/BG-17) ---
        $mollieId = (string)($get('mollie_payment_id') ?? '');
        if ($mollieId !== '') {
            $doc->addDocumentPaymentMean("59", "Mollie Payment ID: ".$mollieId);
        } else {
            if (method_exists($doc,'addDocumentPaymentMeanToBankAccount')) {
                $doc->addDocumentPaymentMeanToBankAccount('42', $iban ?: null, $bic ?: null, null, $sellerName);
            } else {
                $doc->addDocumentPaymentMean("31", "Zahlung per Überweisung an IBAN {$iban}".($bic ? ", BIC {$bic}" : ""));
            }
        }
        if ($dueDate) {
            $doc->addDocumentPaymentTerm('Zahlbar bis '.$dueDate->format('d.m.Y'), $dueDate, null);
        }

        // --- Gutschrift-Referenz (BT-25)
        if ($isCredit && $get('ref_to_id')) {
            $orig = Invoice::find($get('ref_to_id'));
            if ($orig) {
                $origDate = $orig->issue_date ? Carbon::parse($orig->issue_date)->startOfDay()->toDateTime() : null;
                if (method_exists($doc, 'addDocumentReference')) {
                    $doc->addDocumentReference($orig->invoice_number, $origDate);
                }
                $doc->addDocumentNote("Dies ist eine Korrekturrechnung zu {$orig->invoice_number} – keine Zahlung erforderlich.");
            }
        }

        // ========== POSITIONEN sauber berechnen (schließt BR-CO-10 / BR-S-08) ==========
        $sumLineNet = 0.0;

        foreach ((array)$items as $i => $item) {
            $desc       = (string)($item['description'] ?? 'Leistung');
            $qtyRaw     = (float)($item['quantity'] ?? 1);
            $qty        = $qtyRaw == 0.0 ? 1.0 : $qtyRaw;

            // Nettogesamt der Zeile aus deinen Daten (kann negativ sein bei Rabatt)
            $lineNetIn  = (float)($item['line_total_amount'] ?? 0.0);

            // Einheitspreis immer positiv (BR-27), Vorzeichen über die Menge steuern
            $unitNet    = round(abs($lineNetIn) / abs($qty), 4);

            // Wenn der Zeilenbetrag negativ ist => negative Menge
            $effQty     = $lineNetIn < 0 ? -abs($qty) : abs($qty);

            // Zeilensumme mit korrektem Vorzeichen
            $lineNet    = round($effQty * $unitNet, 2);

            $doc->addNewPosition((string)($i + 1))
                ->setDocumentPositionProductDetails($desc, ($lineNetIn < 0 ? 'Rabatt' : ''), null, null, '0160', null)
                ->setDocumentPositionNetPrice($unitNet)
                ->setDocumentPositionQuantity($effQty, 'H87')
                ->addDocumentPositionTax('S', 'VAT', $taxRate)
                ->setDocumentPositionLineSummation($lineNet);

            $sumLineNet = round($sumLineNet + $lineNet, 2);
        }
        $sumLineNet    = round($sumLineNet, 2);
        $taxFromLines  = round($sumLineNet * ($taxRate / 100), 2);
        $grossFromCalc = round($sumLineNet + $taxFromLines, 2);

        // (Optional) DB-Werte nur zum Logging verwenden
        $dbNet   = round((float)$get('total_net', 0), 2);
        $dbTax   = round((float)$get('tax', 0), 2);
        $dbGross = round((float)$get('total_gross', 0), 2);

        if ($dbNet !== 0.0 || $dbTax !== 0.0 || $dbGross !== 0.0) {
            if (abs($dbNet - $sumLineNet) > 0.01 || abs($dbTax - $taxFromLines) > 0.01 || abs($dbGross - $grossFromCalc) > 0.01) {
                \Log::warning('XRechnung: DB-Totals != berechnete Totals', [
                    'db'   => compact('dbNet','dbTax','dbGross'),
                    'calc' => ['net'=>$sumLineNet,'tax'=>$taxFromLines,'gross'=>$grossFromCalc],
                ]);
            }
        }

        // VAT breakdown (ein Steuersatz)
        $doc->addDocumentTax('S', 'VAT', $sumLineNet, $taxFromLines, $taxRate);

        // Header-Summation **zwingend konsistent**:
        $doc->setDocumentSummation(
            $grossFromCalc,  // BT-112 = with VAT
            $grossFromCalc,  // DuePayable
            $sumLineNet,     // BT-106 = Sum line net
            0.0,             // Allowances at doc level
            0.0,             // Charges at doc level
            $sumLineNet,     // Tax basis total (BT-109)
            $taxFromLines,   // BT-110
            null,
            0.0
        );

        // --- XML zurückgeben ---
        return method_exists($doc, 'getContent') ? $doc->getContent() : (string)$doc;
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


    public function sendInvoiceEmail($invoiceId = false, ?string $customReceiver = null)
    {
        if ($invoiceId == false && $this->invoiceId > 0) {
            $invoiceId = $this->invoiceId;
        }
        if ($invoiceId == false && empty($this->invoiceId)) {
            return false;
        }

        // Beispiel-Invoice-Daten
        $invoice = Invoice::where('id', $invoiceId)->first();
        $receiver = $customReceiver ?? $invoice->company->email;

        $tenantId = $invoice->data['meta']['billed_for_company_id'] ?? null;
        if ($tenantId) {
            $tenant = \App\Models\Company::find($tenantId);
            if ($tenant && (int)($tenant->billing_email_override ?? 0) === 1 && !empty($tenant->agency_company_id)) {
                $agency = \App\Models\Company::find($tenant->agency_company_id);
                if ($agency && !empty($agency->email)) {
                    $receiver = $agency->email;
                }
            }
        }

        storage_path('app/invoices/');
        // Pfad zur gespeicherten PDF-Rechnung
        $pdfPath = storage_path('app/invoices/' . $invoice->invoice_number . '.pdf');


        /* Mail::raw('Dies ist eine Testnachricht.', function ($message) use ($invoice) {
             $message->to($invoice->company->email)
                 ->subject('Test-Mail');
         });*/

        // echo (new \App\Mail\InvoiceMail($invoice, $pdfPath))->render();


        try {

            // Sende die E-Mail mit dem PDF-Anhang
            Mail::to($receiver)->send(new InvoiceMail($invoice, $pdfPath));


            // mail mit 5 min versatz senden
            //Mail::to($receiver)->later(now()->addMinutes(5), new InvoiceMail($invoice, $pdfPath));

            // Logge Erfolg
            InvoicesSent::create([
                'invoice_id' => $invoice->id,
                'company_id' => $invoice->company_id,
                'invoice_number' => $invoice->invoice_number,
                'receiver' => $receiver,
                'status' => 'ok',
            ]);

            return 'Rechnung wurde an '.$receiver.' versendet!';

        } catch (\Throwable $e) {
            // Logge Fehlerfall
            InvoicesSent::create([
                'invoice_id' => $invoice->id,
                'company_id' => $invoice->company_id,
                'invoice_number' => $invoice->invoice_number,
                'receiver' => $receiver,
                'status' => 'failed',
            ]);

            report($e);

            return 'Fehler beim Versand der Rechnung: ' . $e->getMessage();
        }

    }


}
