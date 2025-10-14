<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InvoiceMail extends Mailable  implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected $invoiceData;
    protected $pdfPath;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($invoiceData, $pdfPath)
    {
        $this->invoiceData = $invoiceData;
        $this->pdfPath = $pdfPath;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        // Versende die E-Mail mit der angehängten PDF
        return $this->subject('Ihre Rechnung ' . $this->invoiceData->invoice_number)
            ->view('emails.invoice') // Die E-Mail-Ansicht
            ->attach($this->pdfPath, [
                'as' => $this->invoiceData->invoice_number . '.pdf', // Name der PDF im Anhang
                'mime' => 'application/pdf', // MIME-Type für PDF
            ]);
    }
}
