<?php

namespace App\Mail;

use App\Models\AccessibilityFeedback;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AccessibilityFeedbackNotification extends Mailable
{
    use Queueable, SerializesModels;

    public AccessibilityFeedback $feedback;

    /**
     * Create a new message instance.
     */
    public function __construct(AccessibilityFeedback $feedback)
    {
        $this->feedback = $feedback;
    }

    /**
     * Envelope definition.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Neue Rückmeldung zur Barrierefreiheit',
        );
    }

    /**
     * Email content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.accessibility.feedback-notification',
            with: [
                'feedback' => $this->feedback,
            ]
        );
    }

    /**
     * Attachments.
     */
    public function attachments(): array
    {
        return [];
    }
}
