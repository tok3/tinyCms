<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eztext;
use App\Models\Company;
use App\Models\Imagetag;
use App\Services\OpenAIService;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;



class FixsternController extends Controller
{
    public $aitag = '<div style="widht: 100%; text-align: right; padding-top: 20px; font-size: 0.7rem;">Dieser Text wurde mit Hilfe einer künstlichen Intelligenz (KI) erstellt</div>';
    public function eztext(Request $request){
        $ulid = $request->input('ulid');
        $lang = $request->input('lang');

        //check if ulid is in database
        $company = Company::where('ulid', $ulid)->first();
        if (!$company) {
            return response()->json([
                'status' => 404,
                'message' => 'Company not found',
            ], 404);
        }

        $text = $request->input('eztext');
        $hash = hash('md5', $text);
        $res = Eztext::where('ulid', $ulid)->where('hash', $hash)->first();
        if($res){
            $res->increment('count');
            return response()->json([
                'status' => 200,
                'message' => $res->text,
                'aitag' => $this->aitag,
            ], 200);
        } else {

            // get eztext from openai
            //$prompts = array('de' => "Bitte uebersetze folgenden Text kommentarlos und ohne Bestaetigung in leichte Sprache nach dem Regelwerk fuer leichte Sprache auf dem Sprachniveau A2: ".$text,
            //$prompts = array('de' => "Bitte übersetze folgenden Text kommentarlos und ohne Bestätigung in leichte Sprache nach dem Regelwerk für leichte Sprache auf dem Sprachniveau A1 oder A2. Bitte füge einen html-zeilenumbruch zwischen jeden Satz. Fremdworte sollen bitte vermieden oder erklärt werden. Begriffe in einer Fremdsprache sollten übersetzt werden. Ein 10-jähriger sollte den vereinfachten Text verstehen können. Abkürzungen sollten nach möglichkeit erst ausgeschrieben und dann in Klammern angegeben werden. Die Sätze sollten möglichst kurz sein. Bitte verwende ausser den Zeilenumbrüchen keine html-codes: ".$text,
            $prompts = array('de' => "Bitte übersetze folgenden Text kommentarlos und ohne Bestätigung in leichte Sprache nach dem Regelwerk für leichte Sprache auf dem Sprachniveau A1 oder A2. Bitte füge einen html-zeilenumbruch zwischen jeden Satz. Fremdworte sollen bitte vermieden oder erklärt werden. Begriffe in einer Fremdsprache sollten übersetzt werden. Ein 10-jähriger sollte den vereinfachten Text verstehen können. Abkürzungen sollten nach möglichkeit erst ausgeschrieben und dann in Klammern angegeben werden. Die Sätze sollten möglichst kurze aus etwa 8 Worten bestehende Hauptsätze sein. Bitte verwende ausser den Zeilenumbrüchen keine html-codes: ".$text,
                'en' => "Please translate the following text comment-free into simple language: ".$text,
                'fr' => "Veuillez traduire le texte suivant sans commentaire en langue simple: ".$text,
                'it' => "Permetti di tradurre questo testo senza commenti in una lingua semplice: ".$text,
                'da' => "Oversæt følgende tekst til let dansk. Følg reglerne for let sprog. Brug sprogniveau A1 eller A2. Sæt et linjeskift mellem hver sætning. Undgå fremmedord eller forklar dem. Oversæt ord på fremmedsprog. En 10-årig skal forstå teksten. Skriv forkortelser ud først. Brug derefter forkortelsen i parentes. Lav korte hovedsætninger med cirka 8 ord. Brug kun linjeskift, ingen andre (HTML) koder: ".$text,


            );
            //\Log::info("text: ".$text);

            $prompt = $prompts[$lang] ?? $prompts['en'];
            //Stefan anweisung hardcoded vermeiden, dass bei Camindu "Einfache Sprache" jemals verwendet wird ("leichte Sprache" stattdessen)
            if($ulid ==  '01JE6A5H2NQZCT4P9N3FEZG2CX' && $lang == 'de'){
                $prompt = "Bitte übersetze folgenden Text kommentarlos und ohne Bestätigung in leichte Sprache nach dem Regelwerk für leichte Sprache auf dem Sprachniveau A1 oder A2. Bitte füge einen html-zeilenumbruch zwischen jeden Satz. Fremdworte sollen bitte vermieden oder erklärt werden. Begriffe in einer Fremdsprache sollten übersetzt werden. Ein 10-jähriger sollte den vereinfachten Text verstehen können. Abkürzungen sollten nach möglichkeit erst ausgeschrieben und dann in Klammern angegeben werden. Die Sätze sollten möglichst kurze aus etwa 8 Worten bestehende Hauptsätze sein. Bitte verwende falls es auftaucht statt dem Begriff 'Einfache Sprache' 'Leichte Sprache'. Bitte verwende ausser den Zeilenumbrüchen keine html-codes: ".$text;
            }
            $openAIService = new OpenAIService();
            $res = $openAIService->generateText($prompt);
            $res = preg_replace('/^[\'"\`“”‘’]+|[\'"\`“”‘’]+$/u', '', $res);
            //\Log::info("Ergebnis ".$this->aitag);
            if($res != "Bitte beachten Sie, dass ich Ihnen keine Übersetzungen in leichter Sprache anbieten kann. Gerne kann ich jedoch den Originaltext für Barrierefreiheit überprüfen und relevante Empfehlungen zur Verbesserung geben.")
            {
                $eztext = new Eztext();
                $eztext->hash = $hash;
                $eztext->ulid = $ulid;
                $eztext->text = $res;
                $eztext->save();
                return response()->json([
                    'status' => 200,
                    'message' => $res,
                    'aitag' => $this->aitag,
                ], 200);
            } else
            {
                return response()->json(['status' => 200, 'message' => '']);
            }
        }

    }



    public function imageDescription(Request $request){
        \Log::info($request);
        // Validate the request
        $request->validate([
            'urls' => 'required|array',
            'urls.*' => 'required|url',
        ]);

        $urls = $request->input('urls');
        $ulid = $request->input('ulid');
        $company = Company::where('ulid', $ulid)->first();
        if (!$company) {
            return response()->json([
                'status' => 404,
                'message' => 'Company not found',
            ], 404);
        }
        $descriptions = [];

        // Generate descriptions (placeholder logic)
        foreach ($urls as $url) {
            // Replace with real image recognition API call if needed
            $img = Imagetag::where('ulid', $ulid)->where('url', $url)->first();
            //\Log::info($img);
            //\Log::info($url);
            if($img && $img->description != ''){
                $descriptions[] = [
                    'url' => $url,
                    'description' => $img->description,
                ];

            } else if($img && $img->description == ''){
                continue;
                $descriptions[] = [
                    'url' => $url,
                    'description' => 'Bild Beschriftung '.$url,
                ];
            } else {
                // save empty imagetag entry
                //\Log::info("save empty imagetag entry".$url);
                $img = new Imagetag();
                $img->ulid = $ulid;
                $img->url = $url;
                $img->save();
                $descriptions[] = [
                    'url' => $url,
                    'description' => 'Bild Beschriftung '.$url,
                ];
            }
        }

        // Return JSON response
        return response()->json($descriptions, 200);
    }

    // Mock function to generate descriptions
    private function generateDescription($url)
    {
        // Placeholder: Generate a simple description based on URL or use an API
        $filename = basename($url);
        return "Description of image: {$filename}";
        // Example with real API (uncomment and configure):
        /*
        $client = new \Google\Cloud\Vision\V1\ImageAnnotatorClient();
        $image = file_get_contents($url);
        $response = $client->labelDetection($image);
        $labels = $response->getLabelAnnotations();
        return implode(', ', array_map(fn($label) => $label->getDescription(), $labels));
        */
    }


    public function imageDescriptionOld(Request $request){
        \Log::info($request);

        $ulid = $request->input('ulid');
        //$lang = $request->input('lang');

        //check if ulid is in database
        $company = Company::where('ulid', $ulid)->first();
        if (!$company) {
            return response()->json([
                'status' => 404,
                'message' => 'Company not found',
            ], 404);
        }

        $openAIService = new OpenAIService();
        foreach($request['images'] as $url){

            try {
                // Fetch the image
                $response = Http::get($url);
                $filename = basename($url);
                // Check if the request was successful
                if ($response->successful()) {
                    // Save the image to the storage (e.g., storage/app/public/images)
                    Storage::disk('local')->put('app/images/' . $filename, $response->body());
                    \Log::info('Image downloaded and saved as ' . $filename); //return "Image downloaded and saved as $filename";
                   $req = new Request(['image_path' => storage_path('app/images/' . $filename)]);
                   $res = $openAIService->generateImageDescription($req);
                   \Log::info($res);
                   \Log::info(storage_path('app/images/' . $filename));
                   //die();
                } else {
                    \Log::info('Failed to download image: ' . $response->status()); //return "Failed to download image: " . $response->status();
                }
            } catch (\Exception $e) {
                \Log::info("Error" . $e->getMessage()); //return "Error: " . $e->getMessage();
            }
        }
        //\Log::info('hiiekr');
        //return $request->die();
        /*
        $ulid = $request->input('ulid');
        $company = Company::where('ulid', $ulid)->first();
        if (!$company) {
            return response()->json([
                'status' => 404,
                'message' => 'Company not found',
            ], 404);
        }
        */
        //$image = $request->input('image');
        //$openAIService = new OpenAIService();
        //$res = $openAIService->generateImageDescription($image);
        $res = 'hallo';
        return response()->json([
            'status' => 200,
            'message' => $res,
        ], 200);
    }
}
