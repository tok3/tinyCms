<?php
// app/Mail/TrialVerifyMail.php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TrialVerifyMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public string $verifyUrl,
        public string $scannedUrl,
        public string $plainPassword,
        public ?string $userEmail = null,
    ) {}

    public function build()
    {
        return $this->subject('Analyse freischalten')
            ->view('emails.trial-verify-html')   // HTML
            ->text('emails.trial-verify-text')   // Plaintext-Fallback
            ->with([
                'verifyUrl'     => $this->verifyUrl,
                'scannedUrl'    => $this->scannedUrl,
                'plainPassword' => $this->plainPassword,
                'userEmail'     => $this->userEmail,
            ]);
    }
}
