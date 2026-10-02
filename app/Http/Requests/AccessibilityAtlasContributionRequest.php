<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccessibilityAtlasContributionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function getRedirectUrl(): string
    {
        return route('accessibility-atlas.contribute');
    }

    public function rules(): array
    {
        return [
            'page_url' => ['required', 'url:http,https', 'max:2048'],
            'body' => ['required', 'string', 'min:10', 'max:5000'],
            'expected_help' => ['nullable', 'string', 'max:3000'],
            'email' => [
                'nullable',
                'string',
                'max:254',
                'email:rfc',
                'not_regex:/[\r\n\x00-\x1F\x7F]/',
            ],
            'privacy_accepted' => ['accepted'],
            'website' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function attributes(): array
    {
        return [
            'page_url' => 'Webadresse',
            'body' => 'Beschreibung der Barriere',
            'expected_help' => 'Hilfreiche Verbesserung',
            'email' => 'E-Mail für Rückfragen',
            'privacy_accepted' => 'Datenschutz',
        ];
    }

    public function messages(): array
    {
        return [
            'page_url.required' => 'Bitte gib die Webadresse an.',
            'page_url.url' => 'Bitte gib eine vollständige Adresse mit http:// oder https:// an.',
            'page_url.max' => 'Die Webadresse ist zu lang.',
            'body.required' => 'Bitte beschreibe kurz, was nicht funktioniert hat.',
            'body.min' => 'Bitte beschreibe die Barriere mit mindestens 10 Zeichen.',
            'body.max' => 'Die Beschreibung darf höchstens 5000 Zeichen lang sein.',
            'expected_help.max' => 'Der ergänzende Hinweis darf höchstens 3000 Zeichen lang sein.',
            'email.email' => 'Bitte gib eine gültige E-Mail-Adresse an.',
            'email.max' => 'Die E-Mail-Adresse ist zu lang.',
            'email.not_regex' => 'Bitte gib eine gültige E-Mail-Adresse ohne Steuerzeichen an.',
            'privacy_accepted.accepted' => 'Bitte bestätige, dass wir deine Angaben bearbeiten dürfen.',
        ];
    }
}
