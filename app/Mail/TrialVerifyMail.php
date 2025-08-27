<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TrialVerifyMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $verifyUrl;
    public string $scannedUrl;
    public string $plainPassword;

    /**
     * Create a new message instance.
     */
    public function __construct(string $verifyUrl, string $scannedUrl, string $plainPassword)
    {
        $this->verifyUrl = $verifyUrl;
        $this->scannedUrl = $scannedUrl;
        $this->plainPassword = $plainPassword;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Ihre erweiterte Analyse steht bereit',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.trial-verify',
            with: [
                'verifyUrl'     => $this->verifyUrl,
                'scannedUrl'    => $this->scannedUrl,
                'plainPassword' => $this->plainPassword,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
