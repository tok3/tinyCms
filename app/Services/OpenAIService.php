<?php

namespace App\Services;

use OpenAI;

class OpenAIService
{
    protected $client;

    public function __construct()
    {
        // Initialisierung des Clients mit der Factory-Methode
        $this->client = OpenAI::factory()->withApiKey(env('OPENAI_API_KEY'))->make();
    }


    /**
     * Generiere eine Antwort basierend auf einem Prompt.
     *
     * @param string $prompt Der vollständige Prompt, der an OpenAI gesendet wird.
     * @param string $model Das Modell, das verwendet werden soll (z. B. "gpt-4").
     * @param int $maxTokens Maximale Token-Anzahl für die Ausgabe.
     * @return string
     */
    //public function generateText(string $prompt, string $model = 'gpt-3.5-turbo', int $maxTokens = 500): string
    public function generateText(string $prompt, string $model = 'gpt-4', int $maxTokens = 500): string
    {
        try {
            $response = $this->client->chat()->create([
                'model' => $model,
                'messages' => [
                    ['role' => 'system', 'content' => 'You are an expert in web accessibility and HTML fixes.'],
                    ['role' => 'user', 'content' => $prompt],
                ],
                'max_tokens' => $maxTokens,
            ]);

            // Rückgabe der generierten Antwort
            return $response['choices'][0]['message']['content'] ?? 'No response generated.';
        } catch (\Exception $e) {
            // Fehlerbehandlung und Logging
            return 'Error: ' . $e->getMessage();
        }
    }

    public function generateErrorDescription($errorCode, $language = 'en')
    {
        $prompt = "Gib mir ein Titel für den Wcag Fehlercode: {$errorCode}. Gebe mir noch einer Kurzbeschreibung der Fehlerart und schritte zur lösung und vermeidung. gibt mir ein array zurück in dem die ein title die techique ein teaser und ein text steht !";

        $response = $this->client->chat()->create([
            'model' => 'gpt-3.5-turbo', // Verwende GPT-4 oder 'gpt-3.5-turbo'
            'messages' => [
                ['role' => 'system', 'content' => 'You are an expert in web accessibility.'],
                ['role' => 'user', 'content' => $prompt],
            ],
            'max_tokens' => 500,
        ]);

        return $response['choices'][0]['message']['content'] ?? 'No response generated.';
    }


    public function checkPage($url, $language = 'en')
    {
        $prompt = "Analyze the accessibility of the website at {$url} based on WCAG guidelines. Identify all errors, warnings, and notices related to accessibility. For each issue:
	•	Provide a detailed description of the problem.
	•	Include a link to the corresponding W3C documentation or techniques for resolving the issue (e.g., https://www.w3.org/WAI/WCAG21/Techniques/).
	•	Summarize the potential impact on users with disabilities and suggest actionable solutions. Return output in the following language:".$language;

        $response = $this->client->chat()->create([
            'model' => 'gpt-3.5-turbo', // Verwende GPT-4 oder 'gpt-3.5-turbo'
            'messages' => [
                ['role' => 'system', 'content' => 'You are an expert in web accessibility.'],
                ['role' => 'user', 'content' => $prompt],
            ],
            'max_tokens' => 500,
        ]);

        return $response['choices'][0]['message']['content'] ?? 'No response generated.';
    }


    public function generateCorrectionSnippet($selector, $page, $errorCode)
    {
        $prompt = "On the page {$page}, the selector '{$selector}' has the following WCAG issue: {$errorCode}.
    Please provide a corrected HTML snippet that resolves this issue while adhering to WCAG standards.
    Ensure the snippet can be directly copied and pasted into the existing HTML.";

        // API-Aufruf
        $response = $this->client->chat()->create([
            'model' => 'gpt-4', // Oder 'gpt-3.5-turbo' für kostengünstigere Anfragen
            'messages' => [
                ['role' => 'system', 'content' => 'You are an expert in web accessibility and HTML.'],
                ['role' => 'user', 'content' => $prompt],
            ],
            'max_tokens' => 500,
        ]);

        return $response['choices'][0]['message']['content'] ?? 'No response generated.';
    }
    public function _generateErrorDescription($errorCode, $language = 'en')
    {
        $prompt = "Provide a detailed and accessible description for WCAG error code: {$errorCode} in {$language}. Include a title, description, and solution.";

        $response = $this->client->chat()->create([
            'model' => 'gpt-3.5-turbo', // Verwende GPT-4 oder 'gpt-3.5-turbo'
            'messages' => [
                ['role' => 'system', 'content' => 'You are an expert in web accessibility.'],
                ['role' => 'user', 'content' => $prompt],
            ],
            'max_tokens' => 500,
        ]);

        return $response['choices'][0]['message']['content'] ?? 'No response generated.';
    }
}

