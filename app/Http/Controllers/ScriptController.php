<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ScriptController extends Controller
{
    public function serveScript(Request $request, $ulid, $tool)
    {


        // Bestimme den Dateipfad für das gewünschte Tool
        $scriptPath = "scripts/{$tool}.js";

        // Prüfen, ob das Skript existiert
        if (!Storage::exists($scriptPath)) {

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

}
