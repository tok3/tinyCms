<?php
// app/Http/Controllers/ProductCardContactController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ProductCardContactController extends Controller
{
    public function send(Request $request)
    {
        // Honeypot: Bots füllen oft versteckte Felder
        if ($request->filled('website')) {
            return back()->with('success', 'Danke!'); // silently drop
        }

        $data = $request->validate([
            'name'        => ['required','string','max:150'],
            'company'     => ['nullable','string','max:150'],
            'contact'     => ['required','string','max:150'], // E-Mail ODER Telefon
            'message'     => ['nullable','string','max:5000'],
            'mail_to'     => ['required','email'],
            'subject'     => ['nullable','string','max:200'],
            'page_slug'   => ['nullable','string','max:200'],
            'block_index' => ['nullable','integer'],
        ]);

        try {
            $subject = $data['subject'] ?: 'Kontaktanfrage';
            $to      = $data['mail_to'];

            // HTML + Plain-Text senden (Plain-Text hilft beim Spam-Score)
            \Mail::send(
                ['html' => 'emails.productcard-contact', 'text' => 'emails.productcard-contact_plain'],
                ['data' => $data],
                function (\Illuminate\Mail\Message $m) use ($to, $subject, $data) {
                    // From zwingend aus eigener Domain (SPF/DKIM/DMARC)
                    $m->from(config('mail.from.address'), config('mail.from.name', config('app.name')));

                    // Optionaler Bounce-Return-Path (setzt MAIL_RETURN_PATH in .env)
                    if (config('mail.return_path')) {
                        $m->returnPath(config('mail.return_path'));
                    }

                    $m->to($to)->subject($subject);

                    // Reply-To nur, wenn 'contact' eine gültige E-Mail ist
                    if (filter_var($data['contact'], FILTER_VALIDATE_EMAIL)) {
                        $m->replyTo($data['contact'], $data['name']);
                    }

                    // Kleiner Fingerabdruck – unkritisch, aber nützlich
                    $m->getHeaders()->addTextHeader('X-Source', 'ProductCard');
                }
            );

            \Log::info('ProductCard contact sent', [
                'to' => $to,
                'page' => $data['page_slug'] ?? null,
                'block' => $data['block_index'] ?? null,
            ]);

            return back()->with('success', '<strong>Vielen Dank für Ihre Nachricht.</strong><br> Wir setzen uns zeitnah mit Ihnen in Verbindung');
        } catch (\Throwable $e) {
            \Log::error('ProductCard contact failed', ['error' => $e->getMessage()]);
            return back()->with('error', 'Senden fehlgeschlagen. Bitte später erneut versuchen.');
        }
    }
}
