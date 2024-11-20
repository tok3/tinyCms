<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class VerifyEmail extends Notification
{
    use Queueable;

    /**
     * Erstelle eine neue Benachrichtigung.
     */
    public function __construct()
    {
        //
    }

    /**
     * Liefert die Kanäle, über die die Benachrichtigung gesendet wird.
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Erstelle die Benachrichtigungs-E-Mail.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $verificationUrl = $this->verificationUrl($notifiable);

        return (new MailMessage)
            ->greeting(__('Guten Tag,')) // Überschriebene Begrüßung
            ->subject(__('E-Mail-Adresse bestätigen'))
            ->line(__('Bitte klicken Sie auf die Schaltfläche unten, um Ihre E-Mail-Adresse zu bestätigen.'))
            ->action(__('E-Mail-Adresse bestätigen'), $verificationUrl)
            ->line(__('Wenn Sie kein Konto erstellt haben, sind keine weiteren Maßnahmen erforderlich.'))
            //->salutation(__('Mit freundlichen Grüßen'))
            ->line(__('Mit freundlichen Grüßen,')) // HTML im Text
            ->line(__( config('app.name') . ' - Team'))
            ; // Überschriebener Gruß
    }

    /**
     * Liefert die Verifizierungs-URL für die E-Mail-Adresse.
     */
    protected function verificationUrl($notifiable): string
    {
        return url(route('verification.verify', [
            'id' => $notifiable->getKey(),
            'hash' => sha1($notifiable->getEmailForVerification()),
        ], false));
    }

    /**
     * Liefert die array-basierte Repräsentation der Benachrichtigung.
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
