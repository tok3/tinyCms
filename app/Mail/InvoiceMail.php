<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class InvoiceMail extends Mailable
{
    protected $invoiceData;
    protected $pdfPath;

    public function __construct($invoiceData, $pdfPath)
    {
        $this->invoiceData = $invoiceData;
        $this->pdfPath = $pdfPath;
    }

    public function build()
    {
        return $this->subject('Ihre Rechnung ' . $this->invoiceData->invoice_number)
            ->view('emails.invoice'); // Nur das View, kein attach
    }
}
