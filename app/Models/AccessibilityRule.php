<?php

namespace App\Models;

use App\Services\MessageTranslationService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessibilityRule extends Model
{
    use HasFactory;

    /**
     * Die Tabelle, die mit dem Model verknüpft ist.
     *
     * @var string
     */
    protected $table = 'accessibility_rules';

    /**
     * Die Attribute, die massenweise zugewiesen werden können.
     *
     * @var array
     */
    protected $fillable = [
        'rule_id',              // Eindeutige Regel-ID
        'description',          // Beschreibung der Regel
        'impact',               // Schweregrad
        'tags',                 // Tags (als JSON gespeichert)
        'issue_type',           // Problemtyp
        'act_rule',             // ACT-Regel-Link
        'detail_link',          // Detailseite-Link
        'standards',            // Standards (als JSON gespeichert)
        'disabilities',         // Behinderungen (als JSON gespeichert)
        'how_to_fix_html',      // HTML-Inhalt für HowToFix
        'how_to_fix_text_vars', // Platzhalter-Texte für HowToFix
        'why_important_html',   // HTML-Inhalt für WhyImportant
        'why_important_text_vars', // Platzhalter-Texte für WhyImportant
        'description_html',     // HTML-Inhalt für Description
        'description_text_vars', // Platzhalter-Texte für Description
    ];

    /**
     * Die Attribute, die für Arrays sichtbar gemacht werden sollen.
     *
     * @var array
     */
    protected $casts = [
        //'tags' => 'json',
        'standards' => 'array',
        'disabilities' => 'array',
        'how_to_fix_text_vars' => 'array',
        'why_important_text_vars' => 'array',
        'description_text_vars' => 'array',
    ];

    // Relation zu Pa11yAccessibilityIssue
    public function issues()
    {
        return $this->hasMany(Pa11yAccessibilityIssue::class, 'rule_id', 'code');
    }

    /**
     * Accessor für gemergte HTML-Ausgabe.
     */
    public function getMergedHtmlAttribute()
    {
        return [
            //'how_to_fix' => $this->replacePlaceholders($this->how_to_fix_html, $this->how_to_fix_text_vars),
            'why_important' => $this->replacePlaceholders($this->why_important_html, $this->why_important_text_vars),
            'description' => $this->replacePlaceholders($this->description_html, $this->description_text_vars),
        ];
    }

    /**
     * Hilfsfunktion zum Ersetzen von Platzhaltern im HTML.
     */
    private function replacePlaceholders($html, $textVars)
    {
        // Falls $textVars ein JSON-String ist, dekodiere es zu einem Array
        $textVars = is_string($textVars) ? json_decode($textVars, true) : $textVars;

        // Sicherstellen, dass $textVars ein Array ist
        if (!is_array($textVars))
        {
            return $html; // Keine Platzhalter zu ersetzen
        }

        foreach ($textVars as $placeholder => $text)
        {

            $text = htmlentities($text, ENT_QUOTES, 'UTF-8');
            $text = MessageTranslationService::translate($text, 'de_DE');

            $html = str_replace($placeholder, $text, $html);

            $search = [
                '<p>',
                '<ul>'
            ];
            $replace = [
                '<p class="mb-5 text-sm font-medium text-gray-800 dark:text-gray-300">',
                '<ul class="max-w-md ml-4  text-sm space-y-1 list-none list-inside text-gray-800 dark:text-gray-300"">'
            ];
            $html = str_replace($search, $replace, $html);

        }

        return $html;

    }

    public function getStandardsBadgesAttribute()
    {
        $badges = '';

        foreach (json_decode($this->standards) as $standard)
        {
            $badges .= "<span class='bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-gray-700 dark:text-gray-300'>{$standard}</span>";
        }

        return $badges;
    }

    public function getStandardLogosAttribute()
    {
        $logos = '';

        // JSON-String zu einem Array dekodieren
        $standards = json_decode($this->standards);

        if (!is_array($standards))
        {
            return 'Keine Standards verfügbar';
        }

        // Mapping von Standards zu den entsprechenden HTML-Logos
        $logosMap = [
            'WCAG 2.2 (A)' => '<a href="https://www.w3.org/WAI/WCAG2A-Conformance" title="Explanation of WCAG 2.2 Level A Conformance">
                            <img height="32" width="88" src="https://www.w3.org/WAI/WCAG22/wcag2.2A-blue" alt="Level A conformance, W3C WAI Web Content Accessibility Guidelines 2.2">
                           </a>',
            'WCAG 2.2 (AA)' => '<a href="https://www.w3.org/WAI/WCAG2AA-Conformance" title="Explanation of WCAG 2.2 Level AA Conformance">
                             <img height="32" width="88" src="https://www.w3.org/WAI/WCAG22/wcag2.2AA-blue" alt="Level AA conformance, W3C WAI Web Content Accessibility Guidelines 2.2">
                            </a>',
            'WCAG 2.1 (A)' => '<a href="https://www.w3.org/WAI/WCAG2A-Conformance" title="Explanation of WCAG 2.1 Level A Conformance">
                            <img height="32" width="88" src="https://www.w3.org/WAI/WCAG21/wcag2.1AAA-blue-v.gif" alt="Level A conformance, W3C WAI Web Content Accessibility Guidelines 2.1">
                           </a>',
            'WCAG 2.1 (AA)' => '<a href="https://www.w3.org/WAI/WCAG2AA-Conformance" title="Explanation of WCAG 2.1 Level AA Conformance">
                             <img height="32" width="88" src="https://www.w3.org/WAI/WCAG21/wcag2.1AA-v-blue" alt="Level AA conformance, W3C WAI Web Content Accessibility Guidelines 2.1">
                            </a>',
            'EN 301 549' => '<span>EN 301 549 Compliance</span>', // Beispiel für EN 301 549
        ];

        foreach ($standards as $standard)
        {
            $standard = trim($standard); // Trimmen, falls Leerzeichen vorhanden sind
            if (isset($logosMap[$standard]))
            {
                $logos .= $logosMap[$standard] . ' ';
            }
            else
            {
                // Debuggen, wenn etwas fehlt
                logger("Standard fehlt im Mapping: " . $standard);
            }
        }

        return $logos;
    }

    public function getWcagTagsAttribute()
    {
        $tags = "";

        foreach (explode(',', $this->tags) as $tag)
        {
            $tags .= "<div class='inline-block bg-blue-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 mt-2 dark:bg-gray-700 dark:text-gray-300'>{$tag}</div>";
        }

        return $tags;
    }


    public function getActRuleLinksAttribute()
    {
        // Falls das Feld leer ist oder null, gib ein leeres Array zurück
        if (empty($this->act_rule))
        {
            return [];
        }

        // Trenne das Feld in einzelne Regeln, falls mehrere vorhanden sind
        $rules = array_filter(array_map('trim', explode(',', $this->act_rule)));

        // Falls nach der Filterung keine gültigen Regeln existieren, gib ein leeres Array zurück
        if (empty($rules))
        {
            return [];
        }

        // Erstelle für jede Regel den vollständigen Link
        return array_map(fn($rule) => "https://www.w3.org/WAI/standards-guidelines/act/rules/{$rule}/proposed", $rules);
    }
}
