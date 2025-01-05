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
