<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccessibilityFeedbackRequest;
use App\Models\AccessibilityFeedback;
use App\Models\Company;

class AccessibilityFeedbackController extends Controller
{
    public function store(AccessibilityFeedbackRequest $request, Company $company)
    {
        AccessibilityFeedback::create([
            'company_id'       => $company->id,
            'first_name'       => $request->input('first_name'),
            'last_name'        => $request->input('last_name'),
            'email'            => $request->input('email'),
            'page_url'         => $request->input('page_url'),
            'body'             => $request->input('body'),
            'privacy_accepted' => $request->boolean('privacy_accepted'),
            // 'notified_at' => null, // später wenn du Mail an Kunden schickst
        ]);

        return back()->with('a11y_feedback_sent', true);
    }
}
