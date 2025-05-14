<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use OpenAI;
use Carbon\Carbon;

class ImageDescription extends Command
{

    protected $signature = 'app:image-description';
    protected $description = 'Get Image Description from Chat GPT';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $images = DB::table('imagetags')
        ->whereNull('description')
        ->whereNotNull('hash')
        ->limit(20)
        ->get();

        if ($images->isEmpty()) {
            $this->info('No images to process.');
            return 0;
        }
        $this->info("Processing {$images->count()} images...");
        foreach ($images as $image) {
            //var_dump(storage_path('app/images/' . $image->hash)); die();
            try {
                $imagePath = storage_path('app/images/' . $image->hash);
                if (!File::exists($imagePath)) {
                    Log::info("Image not found: {$image->hash}");
                    continue;
                }

                $mimeType = File::mimeType($imagePath);

                if (!str_starts_with($mimeType, 'image/')) {
                    Log::info("Invalid image file type: {$mimeType}"); //return response()->json(['error' => 'The file is not a valid image.'], 400);
                    continue;
                }

                $imageContent = base64_encode(File::get($imagePath));

                $payload = [
                    'model' => 'gpt-4o',
                    'messages' => [
                        [
                            'role' => 'user',
                            'content' => [
                                [
                                    'type' => 'text',
                                    //'text' => 'Kurzbeschreibung des Bildes für HTML aria-label or alt tag.',
                                    'text' => 'Produziere eine prägnante, sachliche Bildbeschreibung auf Deutsch (kein "Bild von..", keine Emojis,maximal 125 Zeichen inkl. Leerzeichen',
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

                $response = Http::withToken(env('OPENAI_API_KEY'))
                    ->post('https://api.openai.com/v1/chat/completions', $payload);
                $desc = $response->json()['choices'][0]['message']['content'] ?? 'No description received.';
                Log::info('OpenAI API raw response', $response->json());
                if (!$response->successful()) {
                    Log::error('OpenAI request failed', [
                        'status' => $response->status(),
                        'body' => $response->body(),
                    ]);
                }


                DB::table('imagetags')
                    ->where('id', $image->id)
                    ->update(['description' => $desc]);

                $json = $response->json();

                $usage = $json['usage'] ?? null;

                if ($usage) {
                    $promptTokens = $usage['prompt_tokens'];
                    $completionTokens = $usage['completion_tokens'];
                    $totalTokens = $usage['total_tokens'];

                    // Your custom cost estimation logic (example prices)
                    $costPerPromptToken = 0.03 / 1000;
                    $costPerCompletionToken = 0.06 / 1000;

                    $totalCost = ($promptTokens * $costPerPromptToken) + ($completionTokens * $costPerCompletionToken);

                    // Log it (to file or DB)
                    DB::table('openai_logs')->insert(['type' => 'image-description',
                        'prompt_tokens' => $promptTokens,
                        'completion_tokens' => $completionTokens,
                        'total_tokens' => $totalTokens,
                        'estimated_cost_usd' => round($totalCost, 6),
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                }

                // delete file
                //Storage::disk('local')->delete('app/images/' . $image->hash);
                $filePath = storage_path('app/images/' . $image->hash);

                if (File::exists($filePath)) {
                   // File::delete($filePath);
                }
                $this->info("Image deleted.".storage_path('app/images/' . $image->hash));



            } catch (\Exception $e) {
                Log::error($e->getMessage());
            }
        }

    }
}
