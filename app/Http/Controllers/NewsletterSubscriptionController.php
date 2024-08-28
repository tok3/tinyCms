<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Subscriber;
use App\Mail\ConfirmSubscription;
use Illuminate\Support\Str;

use App\Models\QRLog;
use App\Models\Code;

class NewsletterSubscriptionController extends Controller
{

    /**
     * Display the subscription form for a specific company.
     *
     * @param int $company_id The ID of the company.
     * @return \Illuminate\View\View The view that displays the subscription form.
     */
    public function showForm($company_id, Request $request)
    {
        // Überprüfe, ob das Unternehmen existiert
        if (is_numeric($company_id))
        {
            $company = Company::find($company_id);
        }
        else
        {
            $company = Company::where('slug', $company_id)->first();

        }
        if (!$company)
        {
            abort(404);
        }


        // Find the code based on the company ID (assuming you have a way to find it)
        $code = Code::where(['company_id'=> $company->id, 'type'=>'newsletter.subscribe'])->firstOrFail();

                // Erfassen der QR-Logs
                QRLog::logAccess(
                    $company->id,
                    $code->id,
                    $code->type,
                    $request->header('referer'),
                    $_SERVER
                );


        return view('subscribe.subscribe')->with('company', $company);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeGeolocation(Request $request)
    {
        $geoData = $request->only(['latitude', 'longitude']);
        session(['geo_data' => $geoData]);
        return response()->json(['status' => 'success']);
    }
    /**
     * @param Request $request
     * @param $company_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request, $company_id)
    {
        // Überprüfe, ob das Unternehmen existiert
        $company = Company::find($company_id);
        if (!$company)
        {
            abort(404);
        }

        $request->validate([
            'email' => 'required|email',
            // Weitere Validierungsregeln nach Bedarf
        ]);

        $subscriber = Subscriber::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'company_id' => $request->company_id,
            // Weitere Felder nach Bedarf
        ]);

        // Sende Bestätigungs-E-Mail
        \Mail::to($subscriber->email)->send(new ConfirmSubscription($subscriber));

        return redirect()->back()->with('info', 'Bitte bestätige deine E-Mail-Adresse.');
    }

    /**
     * Confirm the email address of a subscriber.
     *
     * @param Request $request The HTTP request object.
     * @param int $company_id The ID of the company.
     * @param string $token The activation token.
     * @return \Illuminate\Http\RedirectResponse The redirect response.
     */
    public function confirm(Request $request, $company_id, $token)
    {


        // Überprüfe, ob das Unternehmen existiert
        $company = Company::find($company_id);
        if (!$company)
        {
            abort(404);
        }

        $subscriber = Subscriber::where('activation_code', $token)->where('company_id', $company_id)->first();

        if (!$subscriber)
        {
            return redirect()->route('subscribe.show', $company_id)->with('error', 'Ungültiger Token.');
        }

        $subscriber->update([
            'activation_code' => 'NULL',
            'activated_at' => now(),
            'activated_ip' => $request->ip(),
            // Setze weitere Felder nach Bedarf
        ]);

        return redirect()->route('subscribe.show', $company_id)->with('success', 'Deine E-Mail-Adresse wurde bestätigt.');
    }


    public function unsubscribe(Subscriber $subscription, $_token)
    {


        $toDelete = $subscription->where('unsubscribe_token', $_token)->first();

        $company_id = $toDelete->company_id;
        $toDelete->delete();
        if ($toDelete == true)
        {
            return redirect()->route('subscribe.show', $company_id)->with('unsubscribe_success', '1');
        }
        else
        {
//            return redirect()->route('subscribe.show',0)->with('unsubscribe_success', '0');
        }

    }
}
