<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Services\MessageTranslationService;

class Pa11yAccessibilityIssue extends Model
{
    protected $fillable = [
        'url_id',
        'issue',
        'selector',
        'wcag_level',
        'code',
        'type',
        'typeCode',
        'context',
        'runner',
        'runnerExtras',
        'standard',
    ];

    public function url()
    {
        return $this->belongsTo(Pa11yUrl::class);
    }

    public function getTranslatedMessageAttribute()
    {
        $msg = $this->issue;
        if ($this->standard == '2.1')
        {
            $axeExtra = json_decode($this->runnerExtras);

            $msg = $axeExtra->help;
        }

        return MessageTranslationService::translate($msg, 'de_DE');
    }


    // Relation zu AccessibilityRule
    public function accessibilityRule()
    {
        return $this->belongsTo(AccessibilityRule::class, 'code', 'rule_id');
    }

    /**
     * Liefert die Links zur W3C-Dokumentation basierend auf den WCAG-Codes.
     *
     * @return array
     */
    public function getWcagLinksAttribute(): array
    {
        $baseUrl = 'https://www.w3.org/WAI/WCAG21/Techniques/';
        $prefixes = [
            'F' => 'failures/',
            'H' => 'html/',
            'G' => 'general/',
            'C' => 'css/',
            'SCR' => 'scripts/',
            'ARIA' => 'aria/',
        ];

        // Suche nach dem relevanten Teil des Codes
        if (preg_match_all('/(?:WCAG2AA\.[^\.]+\.[^\.]+\.([A-Z]+[0-9]+(?:\.[0-9]+)?))|([A-Z]+[0-9]+)/', $this->code, $matches))
        {
            $codes = array_merge($matches[1], $matches[2]);
            $codes = array_filter($codes); // Entferne leere Elemente
        }
        else
        {
            return ["Kein gültiger WCAG-Code gefunden."];
        }

        // Generiere Links für jeden Code
        $links = [];
        foreach ($codes as $code)
        {
            foreach ($prefixes as $prefix => $path)
            {
                if (strpos($code, $prefix) === 0)
                {
                    $links[] = $baseUrl . $path . $code;
                    continue 2;
                }
            }

            // Erfolgskriterien (z. B. 2.4.6)
            if (preg_match('/^\d+\.\d+\.\d+$/', $code))
            {
                $links[] = "https://www.w3.org/WAI/WCAG21/Understanding/" . str_replace('.', '-', $code) . ".html";
            }
            else
            {
                //$links[] = "Kein gültiger WCAG-Code für {$code} gefunden.";
            }
        }

        return $links;
    }


}
