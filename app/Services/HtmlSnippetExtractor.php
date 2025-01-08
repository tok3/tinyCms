<?php
namespace App\Services;

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

class HtmlSnippetExtractor
{
    public function extractSnippet(string $url, string $selector): ?string
    {
        try {
            // Lade die HTML-Seite
            $client = new Client();
            $response = $client->get($url);
            $html = (string) $response->getBody();

            // Parste das HTML
            $crawler = new Crawler($html);

            // Finde das Element anhand des Selectors
            $element = $crawler->filter($selector);

            // Gibt das HTML-Snippet zurück, falls gefunden
            if ($element->count() > 0) {
                return $element->html(); // Extrahiert das HTML des Elements
            } else {
                return null; // Kein Element gefunden
            }
        } catch (\Exception $e) {
            return null; // Fehler behandeln
        }
    }
}
