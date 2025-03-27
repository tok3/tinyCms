<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use App\Models\CompanySetting;
use App\Models\Company;

class ScriptController extends Controller
{
    public function serveScript(Request $request, $ulid, $tool)
    {



        if ($tool == 'fixstern')
        {
            //$tool = 'aktion-bf';
            $company = Company::where('ulid', $ulid)->first();
            $script = CompanySetting::where('company_id', $company->id)->first();
            $tool = $script->widget_features;
        }
        /*
        if($ulid == '01JE6A5H2NQZCT4P9N3FEZG2CX'){
            $tool = 'aktion-bf-full';
        }*/



        // Bestimme den Dateipfad für das gewünschte Tool
        $scriptPath = "scripts/{$tool}.js";

        // Prüfen, ob das Skript existiert
        if (!Storage::exists($scriptPath))
        {

            return response('Script not found', 404);
        }

        // Lade das Skript
        $scriptTemplate = Storage::get($scriptPath);
        // UUID einfügen, falls nötig
        $customScript = str_replace('{{ulid}}', $ulid, $scriptTemplate);

        // Header setzen und das JavaScript ausliefern
        return response($customScript, 200)
            ->header('Content-Type', 'application/javascript');
    }

    // Liefert das CSS aus
    public function serveCss(Request $request, $tool)
    {
        if ($tool == 'fixstern')
        {
            $tool = 'aktion-bf';
        }

        // Bestimme den Dateipfad für das Tool-spezifische CSS
        $cssPath = public_path("assets/css/{$tool}.min.css");

        // Prüfen, ob die Datei existiert
        if (!file_exists($cssPath))
        {
            return response('CSS file not found', 404);
        }

        // Lade die Basis-CSS-Datei
        $baseCss = file_get_contents($cssPath);

        // Verarbeite GET-Parameter für dynamische CSS-Werte
        $defaultUnit = 'px';
        $styles = [
            'margin-top' => $request->get('mt'),
            'margin-right' => $request->get('mr'),
            'margin-bottom' => $request->get('mb'),
            'margin-left' => $request->get('ml'),
        ];

        $unit = $request->get('unit', $defaultUnit);
        $customCss = '';

        // Dynamische CSS-Regeln für #ini-bf-trigger-button generieren
        $customCss .= "#ini-bf-trigger-button {\n";
        foreach ($styles as $property => $value)
        {
            if ($value !== null)
            {
                $customCss .= "    {$property}: {$value}{$unit};\n";
            }
        }
        $customCss .= "}\n";

        // Füge die dynamischen CSS-Werte zur Basis-CSS hinzu
        $mergedCss = $baseCss . "\n\n/* Custom Styles */\n" . $customCss;

        // Liefere das CSS aus
        return Response::make($mergedCss, 200, ['Content-Type' => 'text/css']);
    }
}
