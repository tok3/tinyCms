<?php

namespace App\Mail;

use App\Models\Company;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyReminderMail extends Mailable
{
    use Queueable, SerializesModels;

    public Company $company;
    public User $user;
    public string $verifyUrl;
    public ?string $scannedUrl;

    public function __construct(Company $company, User $user, string $verifyUrl, ?string $scannedUrl = null)
    {
        $this->company = $company;
        $this->user = $user;
        $this->verifyUrl = $verifyUrl;
        $this->scannedUrl = $scannedUrl;
    }

    public function build()
    {
        return $this->subject('Ihre Analyse ist bereit – bitte bestätigen')
            ->view('emails.verify-reminder')
            ->with([
                'verifyUrl' => $this->verifyUrl,
                'scannedUrl' => $this->scannedUrl,
                'userEmail' => $this->user->email,
            ]);
    }
}
