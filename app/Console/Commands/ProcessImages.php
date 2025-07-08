<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Spatie\Image\Image;
use Spatie\Image\Enums\Fit;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ProcessImages extends Command
{
    protected $signature = 'app:processImages';
    protected $description = 'Download, resize, hash, and store images from database URLs';

    public function handle()
    {
        // Ensure temp directory exists
        Storage::disk('local')->makeDirectory('temp');

        // Fetch images where hash is null
        $images = DB::table('imagetags')
            ->whereNull('hash')
            ->whereNull('deleted_at')
            ->limit(20)
            ->get(['id', 'url']);

        if ($images->isEmpty()) {
            $this->info('No images to process.');
            return 0;
        }

        $this->info("Processing {$images->count()} images...");

        foreach ($images as $image) {
            try {
                // Download the image
                $response = Http::timeout(10)->get($image->url);
                if ($response->failed()) {
                    /*DB::table('imagetags')
                        ->where('id', $image->id)
                        ->delete();
                        */

                $now = now()->toDateTimeString();
                DB::table('imagetags')
                    ->where('id', $image->id)
                    ->update(['deleted_at' => $now]);
                    throw new \Exception("Failed to download image from {$image->url}");
                }

                $imageContent = $response->body();

                // Calculate hash of the original image
                $hash = hash('sha256', $imageContent);

                // Get extension from URL as initial guess
                $urlExtension = strtolower(pathinfo($image->url, PATHINFO_EXTENSION)) ?: 'jpg';

                // Save original image to a temporary file with URL extension
                $originalTempPath = "temp/{$hash}_original.{$urlExtension}";
                Storage::disk('local')->put($originalTempPath, $imageContent);

                // Validate extension using MIME type
                $mime = mime_content_type(storage_path("app/{$originalTempPath}"));
                $validFormats = [
                    'image/jpeg' => 'jpg',
                    'image/png' => 'png',
                    'image/gif' => 'gif',
                    'image/webp' => 'webp', // Added WebP support
                    'image/svg+xml' => 'svg', // Added SVG support
                ];
                if (!isset($validFormats[$mime])) {
                    DB::table('imagetags')
                        ->where('id', $image->id)
                        ->delete();
                        Storage::disk('local')->delete($originalTempPath);
                    throw new \Exception("Unsupported image format: {$mime}");
                }
                $extension = $validFormats[$mime];

                // If URL extension was incorrect, rename the temporary file
                if ($extension !== $urlExtension) {
                    $newOriginalTempPath = "temp/{$hash}_original.{$extension}";
                    Storage::disk('local')->move($originalTempPath, $newOriginalTempPath);
                    $originalTempPath = $newOriginalTempPath;
                }

                // Prepare paths for the final image
                $filename = "{$hash}.{$extension}";
                $storagePath = "images/{$filename}";

                if ($extension === 'svg') {
                    // For SVG, skip resizing and store the original file directly
                    Storage::disk('local')->put($storagePath, $imageContent);
                } else {
                // Prepare paths for resized image
                    $resizedTempPath = "temp/{$hash}_resized.{$extension}";


                    // Resize the image to 512x512 while maintaining aspect ratio
                    Image::load(storage_path("app/{$originalTempPath}"))
                        ->fit(Fit::Contain, 512, 512)
                        ->quality(85)
                        ->save(storage_path("app/{$resizedTempPath}"));

                    // Read the resized image and store it in the final location
                    $resizedContent = Storage::disk('local')->get($resizedTempPath);
                    Storage::disk('local')->put($storagePath, $resizedContent);

                    // Delete the resized temporary file
                    Storage::disk('local')->delete($resizedTempPath);
                }


                // Update the database with the hash
                DB::table('imagetags')
                    ->where('id', $image->id)
                    ->update(['hash' => $filename]);

                 // Delete the original temporary file
                Storage::disk('local')->delete($originalTempPath);

                $this->info("Processed image ID {$image->id} (Hash: {$hash}, Format: {$extension})");

            } catch (\Exception $e) {
                Log::error("Error processing image ID {$image->id}: {$e->getMessage()}");
                $this->error("Failed to process image ID {$image->id}: {$e->getMessage()}");
                // Clean up database
                /*
                DB::table('imagetags')
                        ->where('id', $image->id)
                        ->delete();
                */
                $now = now()->toDateTimeString();
                DB::table('imagetags')
                    ->where('id', $image->id)
                    ->update(['deleted_at' => $now]);

                // Clean up temporary files if they exist
                if (isset($originalTempPath)) {
                    Storage::disk('local')->delete($originalTempPath);
                }
                if (isset($resizedTempPath)) {
                    Storage::disk('local')->delete($resizedTempPath);
                }
            }
        }

        $this->info('Image processing completed.');
        return 0;
    }
}
