<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use App\Models\Company;
use App\Models\CompanyFeature;
use App\Services\WidgetScriptProfileResolver;

class ScriptController extends Controller
{
    private const WIDGET_CACHE_MAX_AGE = 86400;
    private const WIDGET_CACHE_STALE_WHILE_REVALIDATE = 604800;
    private const WIDGET_CSS_CACHE_MAX_AGE = 31536000;
    private const WIDGET_CSS_CACHE_STALE_WHILE_REVALIDATE = 604800;
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



        // The access middleware owns customer lookup and authorization.
        $company = $request->attributes->get('widget_company');
        if (! $company instanceof Company || $company->ulid !== $ulid) {
            return response('Unauthorized', 403);
        }

        if (in_array($tool, ['fixstern', 'altstar'], true)) {
            // Keep the relationship's deleted-pivot filtering and existence semantics.
            $features = array_fill_keys($company->features()->pluck('slug')->all(), true);

            if ($tool === 'fixstern') {
                $tool = app(WidgetScriptProfileResolver::class)->fixstern($ulid, $features);
            } elseif (isset($features['image-alt-tags-all']) || isset($features['image-alt-tags'])) {
                $setting = $company->settings;
                $tool = $setting->altstar_type == 0 ? 'img.min' : 'imgAlltags.min';
            } else {
                // Legacy exception applies only when there are NO assignments, including deleted ones.
                $hasAssignments = CompanyFeature::where('company_id', $company->id)->exists();
                if ($hasAssignments || $ulid !== '01JE6A5H2NQZCT4P9N3FEZG2CX') {
                    return response('Feature not available', $hasAssignments ? 404 : 403);
                }
                $tool = 'img.min';
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

        return $this->withWidgetCacheHeaders(
            $request,
            $response,
            $mergedCss,
            filemtime($cssPath) ?: null,
            self::WIDGET_CSS_CACHE_MAX_AGE,
            self::WIDGET_CSS_CACHE_STALE_WHILE_REVALIDATE,
            true
        );
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

    private function withWidgetCacheHeaders(
        Request $request,
        $response,
        string $content,
        ?int $lastModified = null,
        ?int $maxAge = null,
        ?int $staleWhileRevalidate = null,
        bool $immutable = false
    )
    {
        $maxAge ??= self::WIDGET_CACHE_MAX_AGE;
        $staleWhileRevalidate ??= self::WIDGET_CACHE_STALE_WHILE_REVALIDATE;

        $response->setPublic();
        $response->setMaxAge($maxAge);
        $response->setSharedMaxAge($maxAge);
        $response->setEtag(hash('sha256', $content));
        $response->headers->addCacheControlDirective('stale-while-revalidate', $staleWhileRevalidate);
        if ($immutable) {
            $response->headers->addCacheControlDirective('immutable');
        }
        $response->headers->set('Vary', 'Accept-Encoding');

        if ($lastModified !== null) {
            $response->setLastModified(new \DateTimeImmutable('@' . $lastModified));
        }

        $response->isNotModified($request);

        return $response;
    }
}
