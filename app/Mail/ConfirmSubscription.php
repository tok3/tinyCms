<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

use App\Models\Subscriber;

class ConfirmSubscription extends Mailable
{
    use Queueable, SerializesModels;

    public $subscriber;

    public function __construct(Subscriber $subscriber)
    {
        $this->subscriber = $subscriber;
    }

    public function build()
    {
        return $this->view('emails.confirm_subscription')
            ->with('company_id',$this->subscriber->company_id)
            ->with('activation_code',$this->subscriber->activation_code)
            ->subject('Bestätige deine Newsletter-Anmeldung');
    }
}
