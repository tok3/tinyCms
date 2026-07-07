<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use App\Models\CompanySetting;
use App\Models\Company;
use App\Models\CompanyFeature;

class ScriptController extends Controller
{
    private const WIDGET_CACHE_MAX_AGE = 86400;
    private const WIDGET_CACHE_STALE_WHILE_REVALIDATE = 604800;
    private const WIDGET_ICON_NAMES = [
        'help',
        'hide-help',
        'scroll-down',
        'scroll-up',
        'go-to-top',
        'go-to-bottom',
        'tab',
        'tab-back',
        'show-numbers',
        'number',
        'hide-numbers',
        'clear-input',
        'enter',
        'reload',
        'stop',
        'exit',
    ];

    public function serveScript(Request $request, $ulid, $tool)
    {



        if ($tool == 'fixstern')
        {
            $company = Company::where('ulid', $ulid)->first();
            /*
            $companyFeatures = CompanyFeature::where('company_id', $company->id)
                ->whereNull('deleted_at')
                ->get();
                */

            //$companyFeatures = $company->hasFeature('leichte-sprache');
            /*$tool = 'standard'; // Default value
            if($company->hasFeature('leichte-sprache') == 1){
                $tool = 'tts_eztext_ezspeak';
            } elseif($company->hasFeature('leichte-sprache') == 0 && $company->hasFeature('screen-reader') == 1){
                $tool =  'tts';
            }
            */

            $tool = 'standard'; // Default value
            if($company->hasFeature('leichte-sprache') == 1){
                $tool = 'tts_eztext_ezspeak';
            //} elseif($company->hasFeature('leichte-sprache') == 0 && $company->hasFeature('screen-reader') == 1){
            } elseif($company->hasFeature('leichte-sprache') == 0 && $company->hasFeature('eztext') == 0 && $company->hasFeature('ezspeak') == 0 && $company->hasFeature('screen-reader') == 1  ){
                $tool =  'tts';
            } elseif($company->hasFeature('leichte-sprache') == 0 && $company->hasFeature('eztext') == 1 && $company->hasFeature('ezspeak') == 0 && $company->hasFeature('screen-reader') == 0  ){
                $tool = 'eztext';
            } elseif($company->hasFeature('leichte-sprache') == 0 && $company->hasFeature('eztext') == 1 && $company->hasFeature('ezspeak') == 1 && $company->hasFeature('screen-reader') == 0  ){
                $tool = 'eztext_ezspeak';
            } elseif($company->hasFeature('leichte-sprache') == 0 && $company->hasFeature('eztext') == 1 && $company->hasFeature('ezspeak') == 1 && $company->hasFeature('screen-reader') == 1  ){
                $tool = 'tts_eztext_ezspeak';
            } elseif($company->hasFeature('leichte-sprache') == 0 && $company->hasFeature('eztext') == 0 && $company->hasFeature('ezspeak') == 1 && $company->hasFeature('screen-reader') == 0  ){
                $tool = 'ezspeak';
            } elseif($company->hasFeature('leichte-sprache') == 0 && $company->hasFeature('eztext') == 0 && $company->hasFeature('ezspeak') == 1 && $company->hasFeature('screen-reader') == 1  ){
                $tool = 'tts_ezspeak';
            } elseif($company->hasFeature('leichte-sprache') == 0 && $company->hasFeature('eztext') == 1 && $company->hasFeature('ezspeak') == 0 && $company->hasFeature('screen-reader') == 1  ){
                $tool = 'tts_eztext';
            } elseif($company->hasFeature('eztext-only') == 1){
                $tool = 'eztext_only';
            } elseif($company->hasFeature('ezspeak-only') == 1){
                $tool = 'ezspeak_only';
            } elseif($company->hasFeature('eztext-ezspeak-only') == 1){
                $tool = 'eztext_ezspeak_only';
            }
            //\Log::info($tool);
            if($ulid == '01JRT7ABK98TYXEXM62N11NHGR'){
                $tool = 'tts_eztext_ezspeak';
            }
            if($ulid == '01JRSPY9VYFFM60FCSXX52BP8T'){
                $tool = 'tts_eztext_ezspeak';
            }
            if($ulid == '01JWXJ42G8GZVCMEN1CQMPSD49'){
                //\Log::info('01JE6A5H2NQZCT4P9N3FEZG2CX');
                $tool = 'futtermedicus';
            }
        //\Log::info($tool);
            /*
            if($ulid == '01JSPJB7M8358WNYBYKEF8E4B3' || $ulid == '01JSNNXB5HEDE3D26N51PQQ11A'){
                $tool = 'pyr';
            }
            */
        } elseif ($tool == 'altstar') {
            $company = Company::where('ulid', $ulid)->first();
            $companyFeatures = CompanyFeature::where('company_id', $company->id)->get();
            $specialUlid = '01JE6A5H2NQZCT4P9N3FEZG2CX';


            if ($companyFeatures->count() >= 1) {
                //if ($companyFeatures->contains(fn($feature) => $feature->feature_id == 4)) {
                /*
                if($company->hasFeature('image-alt-tags-all') == 1) {
                    $tool = 'imgAlltags.min';
                } elseif($company->hasFeature('image-alt-tags') == 1) {
                    $tool = 'img.min';
                } else {
                    return response('Feature not available', 404);
                }
                */
                //rewrite: if any feature containing alt-tag is enabled let the user choose in the settings
                if($company->hasFeature('image-alt-tags-all') == 1 || $company->hasFeature('image-alt-tags') == 1) {
                    $setting = CompanySetting::where('company_id', $company->id)->first();
                    if($setting->altstar_type == 0){
                        $tool = 'img.min';
                        //\Log::info('tool: ' . $tool);
                    } else {
                        $tool = 'imgAlltags.min';
                        //\Log::info('tool: ' . $tool);
                    }
                } else {
                    return response('Feature not available', 404);
                }



            } else {
                if ($ulid === $specialUlid) {
                    $tool = 'img.min';
                } else {
                    return response('Feature not available', $companyFeatures->isEmpty() ? 403 : 404);
                }
            }
        }



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
        $customScript = $this->injectWidgetIconSpriteLoader($customScript);
        $lastModified = Storage::lastModified($scriptPath);

        // Header setzen und das JavaScript ausliefern
        $response = response($customScript, 200)
            ->header('Content-Type', 'application/javascript');

        return $this->withWidgetCacheHeaders($request, $response, $customScript, $lastModified ?: null);
    }

    public function serveIconSprite(Request $request)
    {
        $sprite = $this->buildWidgetIconSprite();
        if ($sprite === null) {
            return response('Icon sprite not found', 404);
        }

        $lastModified = $this->getWidgetIconSpriteLastModified();
        $response = response($sprite, 200)
            ->header('Content-Type', 'image/svg+xml; charset=UTF-8')
            ->header('Access-Control-Allow-Origin', '*');

        return $this->withWidgetCacheHeaders($request, $response, $sprite, $lastModified);
    }

    private function injectWidgetIconSpriteLoader(string $script): string
    {
        if (!str_contains($script, 'ini-bf-voice-navigation-svg')) {
            return $script;
        }

        $loader = <<<'JS'
(()=>{if(window.__iniBfIconSpriteLoading)return;window.__iniBfIconSpriteLoading=!0;const s=document.currentScript,u=new URL("/service/fixstern-icons.svg",s&&s.src?s.src:window.location.href).href,i=t=>{if(!t||document.getElementById("ini-bf-icon-sprite"))return;const e=document.createElement("div");e.id="ini-bf-icon-sprite";e.setAttribute("aria-hidden","true");e.style.display="none";e.innerHTML=t;(document.body||document.documentElement).prepend(e)};fetch(u,{mode:"cors",credentials:"omit"}).then(t=>t.ok?t.text():null).then(t=>{document.body?i(t):document.addEventListener("DOMContentLoaded",()=>i(t),{once:!0})}).catch(()=>{})})();
JS;

        return $loader . $script;
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
        $response = Response::make($mergedCss, 200, ['Content-Type' => 'text/css']);

        return $this->withWidgetCacheHeaders($request, $response, $mergedCss, filemtime($cssPath) ?: null);
    }

    private function buildWidgetIconSprite(): ?string
    {
        $symbols = [];

        foreach (self::WIDGET_ICON_NAMES as $iconName) {
            $path = public_path("assets/css/svgs/{$iconName}.svg");
            if (!file_exists($path)) {
                continue;
            }

            $symbol = $this->svgFileToSymbol($path, $iconName);
            if ($symbol !== null) {
                $symbols[] = $symbol;
            }
        }

        if (empty($symbols)) {
            return null;
        }

        return '<svg xmlns="http://www.w3.org/2000/svg" style="display:none">' . "\n"
            . implode("\n", $symbols)
            . "\n</svg>\n";
    }

    private function svgFileToSymbol(string $path, string $iconName): ?string
    {
        $svg = file_get_contents($path);
        if ($svg === false) {
            return null;
        }

        $svg = preg_replace('/<\?xml.*?\?>/s', '', $svg);
        $svg = preg_replace('/<!--.*?-->/s', '', $svg);
        $viewBox = '0 0 512 512';

        if (preg_match('/<svg\b[^>]*\bviewBox=(["\'])(.*?)\1/is', $svg, $viewBoxMatch)) {
            $viewBox = trim($viewBoxMatch[2]);
        }

        if (!preg_match('/<svg\b[^>]*>(.*)<\/svg>/is', $svg, $contentMatch)) {
            return null;
        }

        $content = trim($contentMatch[1]);
        if ($content === '') {
            return null;
        }

        return sprintf(
            '<symbol id="%s" viewBox="%s">%s</symbol>',
            htmlspecialchars($iconName, ENT_QUOTES, 'UTF-8'),
            htmlspecialchars($viewBox, ENT_QUOTES, 'UTF-8'),
            $content
        );
    }

    private function getWidgetIconSpriteLastModified(): ?int
    {
        $lastModified = null;

        foreach (self::WIDGET_ICON_NAMES as $iconName) {
            $path = public_path("assets/css/svgs/{$iconName}.svg");
            if (!file_exists($path)) {
                continue;
            }

            $mtime = filemtime($path);
            if ($mtime !== false) {
                $lastModified = max($lastModified ?? $mtime, $mtime);
            }
        }

        return $lastModified;
    }

    private function withWidgetCacheHeaders(Request $request, $response, string $content, ?int $lastModified = null)
    {
        $response->setPublic();
        $response->setMaxAge(self::WIDGET_CACHE_MAX_AGE);
        $response->setSharedMaxAge(self::WIDGET_CACHE_MAX_AGE);
        $response->setEtag(hash('sha256', $content));
        $response->headers->addCacheControlDirective('stale-while-revalidate', self::WIDGET_CACHE_STALE_WHILE_REVALIDATE);
        $response->headers->set('Vary', 'Accept-Encoding');

        if ($lastModified !== null) {
            $response->setLastModified(new \DateTimeImmutable('@' . $lastModified));
        }

        $response->isNotModified($request);

        return $response;
    }
}
