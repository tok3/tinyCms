<?php

namespace App\Services;

use App\Models\LocalizedMessage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;

class MessageTranslationService
{
    public static function translate($message, $language = 'de_DE')
    {
        $hash = self::generateHash($message);

        // Prüfen, ob die Übersetzung bereits existiert
        $localizedMessage = LocalizedMessage::where('hash', $hash)->first();

        if ($localizedMessage) {
            $field = "translated_{$language}";

            // Rückgabe der gespeicherten Übersetzung, falls vorhanden
            return $localizedMessage->$field ?? $message;
        }

        // Übersetzung per DeepL-API anfordern
        $translated = self::fetchTranslation($message, $language);

        // Neue Übersetzung in der Datenbank speichern
        LocalizedMessage::create([
            'hash' => $hash,
            'original_message' => $message,
            "translated_{$language}" => $translated,
        ]);

        return $translated;
    }

    private static function fetchTranslation($message, $language)
    {
        $apiKey = config('services.deepl.api_key');
        $url = 'https://api-free.deepl.com/v2/translate';

        // Konvertiere `de_DE` oder andere Formate in gültige Werte
        $language = strtoupper(substr($language, 0, 2)); // Nur die ersten 2 Zeichen, z. B. DE

        $payload = [
            'auth_key' => $apiKey,
            'text' => $message,
            'target_lang' => $language,
        ];

        Log::info('DeepL API request payload', [
            'message' => $message,
            'language' => $language,
        ]);

        try {
            $response = Http::asForm()->post($url, $payload);

            if ($response->successful()) {
                $data = $response->json();
                return $data['translations'][0]['text'] ?? $message;
            }

            Log::error('DeepL API error', [
                'message' => $message,
                'language' => $language,
                'response' => $response->body(),
                'status' => $response->status(),
            ]);

        } catch (\Exception $e) {
            Log::error('DeepL API request failed', [
                'message' => $message,
                'language' => $language,
                'error' => $e->getMessage(),
            ]);
        }

        // Fallback auf die Originalnachricht
        return $message;
    }

    private static function generateHash($message)
    {
        return hash('sha256', $message); // Generiere einen konsistenten Hash (SHA-256)
    }
}
