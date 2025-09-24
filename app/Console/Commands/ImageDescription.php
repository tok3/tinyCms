<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Spatie\Image\Image;
use Spatie\Image\Enums\Fit;
use Imagick;
use Carbon\Carbon;

class ImageDescription extends Command
{
    protected $signature = 'app:image-description';
    protected $description = 'Get Image Description from OpenAI, converting SVGs to PNG';

    public function handle()
    {
        // Ensure temp directory exists
        Storage::disk('local')->makeDirectory('temp');

        $images = DB::table('imagetags')
            ->whereNull('description')
            ->whereNotNull('hash')
            ->whereNull('deleted_at')
            ->limit(10)
            ->get();

        if ($images->isEmpty()) {
            $this->info('No images to process.');
            return 0;
        }

        $this->info("Processing {$images->count()} images...");

        foreach ($images as $image) {
            try {
                $imagePath = storage_path('app/images/' . $image->lang . '_' . $image->hash);
                if (!File::exists($imagePath)) {

                    $existingImage = DB::table('imagetags')
                    ->where('hash', $image->hash)
                    ->whereNotNull('description')
                    //->whereRaw('created_at = updated_at')
                    ->where('lang', $image->lang)
                    ->where('ulid', $image->ulid)
                    ->first();

                    if($existingImage){
                        // Copy description from existing entry and update hash

                        DB::table('imagetags')
                            ->where('id', $image->id)
                            ->update([
                                //'hash' => $image->hash,
                                'description' => $existingImage->description
                            ]);

                        Log::info("Image description copied: {$image->lang}_{$image->hash}");
                    } else {
                        Log::info("Image not found: {$image->lang}_{$image->hash}");
                    }


                    continue;
                }

                $mimeType = File::mimeType($imagePath);
                if (!str_starts_with($mimeType, 'image/')) {
                    Log::info("Invalid image file type: {$mimeType}");
                    continue;
                }

                $extension = pathinfo($imagePath, PATHINFO_EXTENSION);
                $tempImagePath = $imagePath;

                // Handle SVG conversion to PNG
                if ($mimeType === 'image/svg+xml' || strtolower($extension) === 'svg') {
                    $tempPngPath = storage_path("app/temp/{$image->lang}_{$image->hash}_converted.png");
                    $imagick = new Imagick();
                    $imagick->readImage($imagePath);
                    $imagick->setImageFormat('png');
                    $imagick->writeImage($tempPngPath);
                    $imagick->clear();
                    $imagick->destroy();

                    // Resize the converted PNG to 512x512
                    $resizedPngPath = storage_path("app/temp/{$image->lang}_{$image->hash}_resized.png");
                    Image::load($tempPngPath)
                        ->fit(Fit::Contain, 512, 512)
                        ->quality(85)
                        ->save($resizedPngPath);

                    $tempImagePath = $resizedPngPath;
                    $mimeType = 'image/png'; // Update MIME type for PNG
                } else {
                    // For non-SVG images, resize directly to 512x512
                    $tempResizedPath = storage_path("app/temp/{$image->hash}_resized.{$extension}");
                    Image::load($imagePath)
                        ->fit(Fit::Contain, 512, 512)
                        ->quality(85)
                        ->save($tempResizedPath);
                    $tempImagePath = $tempResizedPath;
                }

                // Read the processed image (either converted PNG or resized original)
                $imageContent = base64_encode(File::get($tempImagePath));
                if (empty($imageContent)) {
                    Log::warning("Empty image content for {$image->lang}_{$image->hash}");
                    // Clean up temporary files
                    Storage::disk('local')->delete([
                        "temp/{$image->lang}_{$image->hash}_converted.png",
                        "temp/{$image->lang}_{$image->hash}_resized.{$extension}",
                        "temp/{$image->lang}_{$image->hash}_resized.png",
                    ]);
                    continue;
                }
                $prompt = '';
                switch($image->lang){
                    case 'en':
                        $prompt = 'Produce a concise, factual image description in English (no "image of..", no emojis, max 125 characters incl. spaces).';
                        break;
                    case 'fr':
                        $prompt = "Produisez une description d'image concise et factuelle en français (pas de 'image de..', pas d'emojis, max 125 caractères incl. espaces). Utilisez l'unicode pour les caractères spéciaux.";
                        break;
                    case 'it':
                        $prompt = "Produci una descrizione dell'immagine concisa e fattuale in italiano (no 'immagine di..', no emoji, max 125 caratteri incl. spazi). Usa unicode per i caratteri speciali.";
                        break;
                    case 'dk':
                        $prompt = 'Udarbejd en kortfattet, faktuel billedbeskrivelse på dansk (ingen "billede af..", ingen emojis, max 125 tegn inkl. mellemrum). Brug unicode til specialtegn.';
                        break;
                    case 'pl':
                        $prompt = 'Stwórz zwięzły, rzeczowy opis obrazu po polsku (bez "obraz..", bez emotikonów, maks. 125 znaków z przerwami). Użyj unikodu dla znaków specjalnych.';
                        break;
                    default:
                        $prompt = 'Produziere eine prägnante, sachliche Bildbeschreibung auf Deutsch (kein "Bild von..", keine Emojis, maximal 125 Zeichen inkl. Leerzeichen)';
                        break;
                }

                // Prepare OpenAI payload
                $payload = [
                    'model' => 'gpt-4o',
                    'messages' => [
                        [
                            'role' => 'user',
                            'content' => [
                                [
                                    'type' => 'text',
                                    'text' => $prompt,
                                ],
                                [
                                    'type' => 'image_url',
                                    'image_url' => [
                                        'url' => 'data:' . $mimeType . ';base64,' . $imageContent,
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'max_tokens' => 100,
                ];

                // Send request to OpenAI
                $response = Http::withToken(env('OPENAI_API_KEY'))
                    ->post('https://api.openai.com/v1/chat/completions', $payload);

                if (!$response->successful()) {
                    Log::error('OpenAI request failed', [
                        'status' => $response->status(),
                        'body' => $response->body(),
                    ]);
                    // Clean up temporary files
                    Storage::disk('local')->delete([
                        "temp/{$image->lang}_{$image->hash}_converted.png",
                        "temp/{$image->lang}_{$image->hash}_resized.{$extension}",
                        "temp/{$image->lang}_{$image->hash}_resized.png",
                    ]);
                    continue;
                }

                $desc = $response->json()['choices'][0]['message']['content'] ?? 'No description received.';
                Log::info('OpenAI API raw response', $response->json());

                // Update database with description
                DB::table('imagetags')
                    ->where('id', $image->id)
                    ->update(['description' => $desc]);

                // Log OpenAI usage
                $json = $response->json();
                $usage = $json['usage'] ?? null;

                if ($usage) {
                    $promptTokens = $usage['prompt_tokens'];
                    $completionTokens = $usage['completion_tokens'];
                    $totalTokens = $usage['total_tokens'];

                    $costPerPromptToken = 0.03 / 1000;
                    $costPerCompletionToken = 0.06 / 1000;
                    $totalCost = ($promptTokens * $costPerPromptToken) + ($completionTokens * $costPerCompletionToken);

                    DB::table('openai_logs')->insert([
                        'type' => 'image-description',
                        'prompt_tokens' => $promptTokens,
                        'completion_tokens' => $completionTokens,
                        'total_tokens' => $totalTokens,
                        'estimated_cost_usd' => round($totalCost, 6),
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                }

                // Delete original and temporary files
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
                Storage::disk('local')->delete([
                    "temp/{$image->lang}_{$image->hash}_converted.png",
                    "temp/{$image->lang}_{$image->hash}_resized.{$extension}",
                    "temp/{$image->lang}_{$image->hash}_resized.png",
                ]);

                $this->info("Processed and deleted image: {$image->lang}_{$image->hash} (Description: {$desc})");

            } catch (\Exception $e) {
                Log::error("Error processing image ID {$image->id}: {$e->getMessage()}");
                // Clean up temporary files on error
                Storage::disk('local')->delete([
                    "temp/{$image->lang}_{$image->hash}_converted.png",
                    "temp/{$image->lang}_{$image->hash}_resized.{$extension}",
                    "temp/{$image->lang}_{$image->hash}_resized.png",
                ]);
            }
        }

        $this->info('Image processing completed.');
        return 0;
    }
}

