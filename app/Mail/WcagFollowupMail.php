<?php

namespace App\Mail;

use App\Models\Company;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class WcagFollowupMail extends Mailable
{
    use Queueable, SerializesModels;

    public Company $company;
    public User $user;
    public string $token;

    public function __construct(Company $company, User $user, string $token)
    {
        $this->company = $company;
        $this->user = $user;
        $this->token = $token;
    }

    public function build()
    {
        $magicLink = route('magic.login', $this->token);

        return $this->subject('Ihre Analyse – nächster Schritt')
            ->view('emails.wcag-followup')
            ->with([
                'magicLoginUrl' => $magicLink,
            ]);
    }
}
