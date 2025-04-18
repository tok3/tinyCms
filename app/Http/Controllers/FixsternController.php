<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eztext;
use App\Models\Company;
use App\Services\OpenAIService;


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
            );
            //\Log::info("text: ".$text);

            $prompt = $prompts[$lang] ?? $prompts['en'];

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
}
