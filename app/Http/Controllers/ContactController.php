<?php namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{


    public function show()
    {
        return view('contact');
    }

    public function send(Request $request)
    {


        $data = $request->validate([
            'name' => ['required', 'string', 'max:150', 'not_regex:/[\r\n\x00-\x1F\x7F]/'],
            'email' => ['required', 'string', 'max:254', 'email:rfc', 'not_regex:/[\r\n\x00-\x1F\x7F]/'],
            'message' => ['required', 'string', 'max:5000'],
            'terms' => ['required'],
        ]);

/*        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => env('RECAPTCHA_SECRET_KEY'),
            'response' => $request->input('g-recaptcha-response'),
        ]);

        if (!$response->json()['success']) {
            return back()->with('error', 'CAPTCHA-Überprüfung fehlgeschlagen. Bitte versuchen Sie es erneut.');
        }*/

        $fromAddress = config('mail.from.address');
        $fromName = config('mail.from.name', config('app.name'));
        $body = "Name: {$data['name']}\n"
            . "E-Mail: {$data['email']}\n\n"
            . "Nachricht:\n{$data['message']}";

        Mail::raw($body, function ($mail) use ($data, $fromAddress, $fromName) {
            $mail->to('maildropr@eq3w.de') // Setzen Sie die Ziel-E-Mail-Adresse
                ->from($fromAddress, $fromName)
                ->replyTo($data['email'], $data['name'])
                ->subject('Kontaktformular Nachricht');
        });



        return back()->with('success', 1);
    }
}
