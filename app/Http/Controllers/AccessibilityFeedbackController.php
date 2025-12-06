<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccessibilityFeedbackRequest;
use App\Mail\AccessibilityFeedbackNotification;
use App\Models\AccessibilityFeedback;
use Illuminate\Support\Facades\Mail;
use App\Models\Company;

class AccessibilityFeedbackController extends Controller
{
    public function store(AccessibilityFeedbackRequest $request, Company $company)
    {
        // 1. Honeypot: wenn "website" gefüllt ist → tun so, als wäre alles ok,
        // aber speichern und mailen NICHT.
        if ($request->filled('website')) {
            return redirect()
                ->to(url()->previous() . '#a11y-feedback')
                ->with('a11y_feedback_sent', true);
        }

        $feedback = AccessibilityFeedback::create([
            'company_id'       => $company->id,
            'first_name'       => $request->input('first_name'),
            'last_name'        => $request->input('last_name'),
            'email'            => $request->input('email'),
            'page_url'         => $request->input('page_url'),
            'body'             => $request->input('body'),
            'privacy_accepted' => $request->boolean('privacy_accepted'),
        ]);

        // Empfänger bestimmen (CompanySettings / Fallback)
        $settings = $company->settings;
        $raw = $settings->a11y_feedback_receivers ?? $company->email;

        $recipients = collect(explode(',', (string) $raw))
            ->map(fn ($mail) => trim($mail))
            ->filter()
            ->unique()
            ->values();

        foreach ($recipients as $email) {
            Mail::to($email)->queue(new AccessibilityFeedbackNotification($feedback));
        }

        $feedback->update(['notified_at' => now()]);

        // 2. Redirect mit Anker, damit die Seite gleich zur Box scrollt
        return redirect()
            ->to(url()->previous() . '#a11y-feedback')
            ->with('a11y_feedback_sent', true);
    }
}
