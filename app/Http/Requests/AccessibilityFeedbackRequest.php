<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccessibilityFeedbackRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // öffentliches Formular
    }

    public function rules(): array
    {
        return [
            'first_name'        => ['required', 'string', 'max:100'],
            'last_name'         => ['nullable', 'string', 'max:100'],
            'email'             => ['required', 'email', 'max:255'],
            'page_url'          => ['nullable', 'string', 'max:2048'],
            'body'              => ['required', 'string', 'min:10'],
            'privacy_accepted'  => ['accepted'],
            // Captcha-Integration kannst du später ergänzen (Google reCAPTCHA etc.)
            'captcha'           => ['nullable', 'string', 'max:255'],
        ];
    }

    public function attributes(): array
    {
        return [
            'first_name'       => 'Vorname',
            'last_name'        => 'Nachname',
            'email'            => 'E-Mail',
            'page_url'         => 'Link der beanstandeten Seite',
            'body'             => 'Beanstandung / Nachricht',
            'privacy_accepted' => 'Datenschutz',
            'captcha'          => 'Captcha',
        ];
    }
}
