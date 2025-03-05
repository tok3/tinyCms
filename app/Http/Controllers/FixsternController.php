<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eztext;
use App\Models\Company;
use App\Services\OpenAIService;

class FixsternController extends Controller
{
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

            return response()->json([
                'status' => 200,
                'message' => $res->text,
            ], 200);
        } else {

            // get eztext from openai
            $prompts = array('de' => "Bitte uebersetze folgenden Text kommentarlos in einfache Sprache: ".$text,
                'en' => "Please translate the following text comment-free into simple language: ".$text,
                'fr' => "Veuillez traduire le texte suivant sans commentaire en langue simple: ".$text,
                'it' => "Permetti di tradurre questo testo senza commenti in una lingua semplice: ".$text,
            );
            $prompt = $prompts[$lang] ?? $prompts['en'];
            $openAIService = new OpenAIService();
            $res = $openAIService->generateText($prompt);

            $eztext = new Eztext();
            $eztext->hash = $hash;
            $eztext->ulid = $ulid;
            $eztext->text = $res;
            $eztext->save();
            return response()->json([
                'status' => 200,
                'message' => $res,
            ], 200);
        }

    }
}
