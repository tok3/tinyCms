<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AccessibilityAtlasContributionMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public readonly array $contribution)
    {
    }

    public function envelope(): Envelope
    {
        $email = $this->contribution['email'] ?? null;

        return new Envelope(
            replyTo: $email ? [new Address($email)] : [],
            subject: 'Neuer Beitrag zum Barrierefreiheitsatlas',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.accessibility-atlas-contribution',
            text: 'emails.accessibility-atlas-contribution-text',
            with: ['contribution' => $this->contribution],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
