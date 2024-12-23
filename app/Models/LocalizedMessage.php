<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class LocalizedMessage extends Model
{
    protected $fillable = ['hash', 'original_message', 'translated_de_DE', 'translated_fr_FR', 'translated_es_ES', 'translated_it_IT'];

    public static function translate($message, $language = 'de_DE')
    {
        $hash = Hash::make($message);

        $localizedMessage = self::where('hash', $hash)->first();

        if ($localizedMessage) {
            $field = "translated_{$language}";
            return $localizedMessage->$field ?? $message;
        }

        // Übersetzung abrufen
        $translated = self::fetchTranslation($message, $language);

        self::create([
            'hash' => $hash,
            'original_message' => $message,
            "translated_{$language}" => $translated,
        ]);

        return $translated;
    }

    private static function fetchTranslation($message, $language)
    {
        // Pseudocode für API-Aufruf
        return "Übersetzte Nachricht für: {$language}";
    }
}
