<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Symfony\Component\DomCrawler\Crawler;
    use App\Models\AccessibilityRule;

class AccessibilityRuleScraperController extends Controller
{

    /*
    php artisan tinker
    $controller = app(\App\Http\Controllers\AccessibilityRuleScraperController::class);
    $controller->updateAllAdditionalData();
    */
    public function updateAllAdditionalData()
    {
        $rules = AccessibilityRule::all();

        foreach ($rules as $rule)
        {

            $this->fetchAdditionalData($rule->rule_id);
        }

    }

    public function fetchAdditionalData($ruleId)
    {
        // URL der Regel, die basierend auf der Rule-ID erstellt wird
        $url = "https://dequeuniversity.com/rules/axe/4.8/{$ruleId}?application=axeAPI";

        // Anfrage an die URL
        $response = Http::get($url);

        if ($response->successful())
        {
            $crawler = new Crawler($response->body());

            // Standards extrahieren
            $standards = $crawler->filter('.wcagSc span')->last()->text();

            // Disability Types extrahieren
            $disabilities = $crawler->filter('.disabilityTypesAffectedData ul li')->each(function ($node) {
                return trim($node->text());
            });

            // HTML-Abschnitte extrahieren
            $howToFixHtml = $crawler->filter('section.howToFix .howToFixData')->count() > 0
                ? $crawler->filter('section.howToFix .howToFixData')->html()
                : null;

            $whyImportantHtml = $crawler->filter('section.whyImportant .howToFixData')->count() > 0
                ? $crawler->filter('section.whyImportant .howToFixData')->html()
                : null;

            $descriptionHtml = $crawler->filter('section.description .howToFixData')->count() > 0
                ? $crawler->filter('section.description .howToFixData')->html()
                : null;



            // Verarbeitung der Abschnitte zu Texten mit Platzhaltern
            $howToFixHtmlClean = $howToFixHtml ? $howToFixHtml : null;
            $whyImportantHtmlClean = $whyImportantHtml ? $whyImportantHtml : null;
            $descriptionHtmlClean = $descriptionHtml ? $descriptionHtml: null;



            $howToFixResult = $howToFixHtmlClean ? $this->extractTextWithPlaceholders($howToFixHtmlClean) : ['html' => null, 'texts' => []];
            $whyImportantResult = $whyImportantHtmlClean ? $this->extractTextWithPlaceholders($whyImportantHtmlClean) : ['html' => null, 'texts' => []];
            $descriptionResult = $descriptionHtmlClean ? $this->extractTextWithPlaceholders($descriptionHtmlClean) : ['html' => null, 'texts' => []];




            // Datenbankeintrag aktualisieren oder erstellen
            $rule = AccessibilityRule::updateOrCreate(
                ['rule_id' => $ruleId], // Kriterium zur Identifikation
                [
                    'standards' => json_encode(explode(',', $standards)), // Standards als JSON speichern
                    'disabilities' => json_encode($disabilities), // Behinderungen als JSON speichern
                    'how_to_fix_html' => $this->replaceTags($howToFixResult['html']),
                    'how_to_fix_text_vars' => json_encode($howToFixResult['texts']),
                    'why_important_html' =>  $this->replaceTags($whyImportantResult['html']),
                    'why_important_text_vars' => json_encode($whyImportantResult['texts']),
                    'description_html' =>  $this->replaceTags($descriptionResult['html']),
                    'description_text_vars' => json_encode($descriptionResult['texts']),
                ]
            );

            return response()->json([
                'success' => true,
                'message' => 'Data fetched and stored successfully.',
                'rule' => $rule,
            ]);
        }

        return response()->json(['error' => 'Unable to fetch the page'], 500);
    }
    private function replaceTags($html)
    {

        $search  = ["<body>", "</body>"];
        $replace = ['', ''];

        return str_replace($search, $replace, $html);
    }
    private function extractTextWithPlaceholders($html)
    {
        $crawler = new Crawler($html);
        $textNodes = [];
        $placeholders = [];

        $crawler->filterXPath('//text()')->each(function ($node, $index) use (&$textNodes, &$placeholders) {
            $text = trim($node->text());
            if (!empty($text))
            {
                $placeholder = "{{text_$index}}";
                $placeholders[$placeholder] = $text;
                $node->getNode(0)->nodeValue = $placeholder; // Platzhalter im HTML ersetzen
            }
        });

        return [
            'html' => $crawler->html(),
            'texts' => $placeholders,
        ];
    }



    public function _fetchAdditionalData()
    {
        // Beispiel-Logik: URL einlesen und Daten parsen
        $url = 'https://dequeuniversity.com/rules/axe/4.8/aria-progressbar-name?application=axeAPI';

        $response = Http::get($url);

        if ($response->successful())
        {
            $crawler = new Crawler($response->body());

            // Standards extrahieren
            $standards = $crawler->filter('.wcagSc span')->last()->text();

            // Disability Types extrahieren
            $disabilities = $crawler->filter('.disabilityTypesAffectedData ul li')->each(function ($node) {
                return trim($node->text());
            });

            return response()->json([
                'standards' => $standards,
                'disabilities' => $disabilities,
            ]);
        }

        return response()->json(['error' => 'Unable to fetch the page'], 500);
    }


    public function testOutput($ruleId)
    {
        // Lade die Regel aus der Datenbank
        $rule = AccessibilityRule::where('rule_id', $ruleId)->first();

        if (!$rule)
        {
            return response()->json(['error' => 'Rule not found'], 404);
        }

        // Verarbeite die Texte mit Platzhaltern
        $howToFixHtml = $this->replacePlaceholders($rule->how_to_fix_html, $rule->how_to_fix_text_vars);
        $whyImportantHtml = $this->replacePlaceholders($rule->why_important_html, $rule->why_important_text_vars);
        $description = $this->replacePlaceholders($rule->description_html, $rule->description_text_vars);

        // Testausgabe
        return view('test-output', compact('rule', 'howToFixHtml', 'whyImportantHtml', 'description'));
    }

    private function replacePlaceholders($html, $textVars)
    {
        $textVars = json_decode($textVars, true) ?? [];

        foreach ($textVars as $placeholder => $text)
        {
            $html = str_replace($placeholder, $text, $html);
        }

        return $html;
    }


}
