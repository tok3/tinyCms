<?php

namespace App\Mail;

use App\Models\Company;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;

class WcagFollowupMail extends Mailable
{
    use Queueable, SerializesModels;

    public Company $company;
    public User $user;

    public function __construct(Company $company, User $user)
    {
        $this->company = $company;
        $this->user = $user;
    }

    public function build()
    {


        $this->user->login_token = \Str::random(64);
        $this->user->login_token_expires_at = now()->addMinutes(30);
        $this->user->save();



        $magicLoginUrl = url('/magic-login/' . $this->user->login_token);


        return $this->subject('Ihre Analyse – nächster Schritt')
            ->view('emails.wcag-followup')
            ->with([
                'magicLoginUrl' => $magicLoginUrl,
            ]);
    }
}
