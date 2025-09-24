<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SepaDebitsCsvMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        protected string $path,
        protected string $filename,
        protected int $count
    ) {}

    public function build()
    {
        return $this->subject("SEPA – Heute faellige Einzuege ({$this->count})")
            ->view('emails.sepa-debits-csv')
            ->attach($this->path, [
                'as' => $this->filename,
                'mime' => 'text/csv',
            ]);
    }
}
