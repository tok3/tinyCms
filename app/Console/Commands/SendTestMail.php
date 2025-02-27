<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendTestMail extends Command
{
    protected $signature = 'mail:test {to}';
    protected $description = 'Send a test email using SMTP settings from .env';

    public function handle()
    {
        $recipient = $this->argument('to');

        if (!filter_var($recipient, FILTER_VALIDATE_EMAIL)) {
            $this->error("Invalid email address: $recipient");
            return;
        }

        Mail::raw('Dies ist eine Test-E-Mail über SMTP.', function ($message) use ($recipient) {
            $message->to($recipient)
                ->subject('SMTP Test Mail')
                ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
        });

        $this->info("Test-E-Mail erfolgreich an $recipient gesendet.");
    }
}
