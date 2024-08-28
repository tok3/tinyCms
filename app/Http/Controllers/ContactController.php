<?php namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{


    public function show()
    {
        return view('contact');
    }

    public function send(Request $request)
    {


        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            'terms' => 'required',
        ]);

/*        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => env('RECAPTCHA_SECRET_KEY'),
            'response' => $request->input('g-recaptcha-response'),
        ]);

        if (!$response->json()['success']) {
            return back()->with('error', 'CAPTCHA-Überprüfung fehlgeschlagen. Bitte versuchen Sie es erneut.');
        }*/

        // Hier E-Mail senden
        Mail::raw('Nachricht: ' . $request->message, function ($mail) use ($request) {
            $mail->to('maildropr@eq3w.de') // Setzen Sie die Ziel-E-Mail-Adresse
            ->from($request->email)
                ->subject('Kontaktformular Nachricht');
        });



        return back()->with('success', 1);
    }
}
