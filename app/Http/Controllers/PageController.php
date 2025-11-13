<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Page;
use Facades\App\Domain\Render\RenderContent;
use App\Models\Product;

use App\Models\MenuItem;
use Spatie\Menu\Laravel\Menu;
use Spatie\Menu\Link;
use Carbon\Carbon;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Spatie\Sitemap\SitemapGenerator;

/**
 * Class PageController
 *
 * @package App\Http\Controllers
 */
class PageController extends Controller
{
    //


    /**
     * @param Request $request
     * @param $segment1
     * @param $segment2
     * @param $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function getIndex(Request $request, $segment1 = null, $segment2 = null, $slug = null)
    {


        if (is_null($slug))
        {
            if (!is_null($segment2))
            {
                $slug = $segment2;
            }
            elseif (!is_null($segment1))
            {
                $slug = $segment1;
            }
            elseif ($segment1 == '')
            {
                $slug = '/';
            }
            else
            {
                abort(404);
            }
        }

        if (auth()->check())
        {
            $page = Page::whereSlug($slug)->first();
        }
        else
        {
            $page = Page::whereSlug($slug)->wherePublished(true)->first();

        }


        if (!$page)
        {
            abort(404);
        }

        $content = $this->getSections($page->blocks);

        return view('page')
            ->with('content', $content)
            ->with('page', $page);


    }


    /**
     * @param $blocks
     * @return string
     */
    public function getSections($blocks)
    {
        $cblocks = collect($blocks);
        $siteContent = [];


        foreach ($cblocks as $key => $block)
        {
            $prevElem = "";
            $nextElem = "";
            if ($key > 0)
            {
                $prevElem = $cblocks[$key - 1]['type'];

            }
            if ($key < (count($cblocks) - 1))
            {
                $nextElem = $cblocks[$key + 1]['type'];
            }

            //echo $block['data']['teaser'].'<br>';
            $renderedView = view('content-sections.' . $block['type'])
                ->with('data', $block['data'])
                ->with('prevElem', $prevElem)
                ->with('nextElem', $nextElem)
                ->with('blockIndex', $key)
                ->with('pageSlug', optional($this->page ?? null)->slug ?? ($this->page->slug ?? null))
                ->render();


            // Hinzufügen des gerenderten Strings zum Array
            $siteContent[] = $renderedView;
        }

        $html = implode('', $siteContent);
        $html = $this->replaceProductPlaceholders($html);

        return $html;

    }


    /**
     * @param $type
     * @return Menu
     */
    public function createMenuFromDatabase($type = 'header')
    {
        $menuItems = MenuItem::where('type', $type)
            ->whereNull('parent_id') // Wähle nur Top-Level-Menüpunkte
            ->with('children') // Eager Load der Kinder
            ->orderBy('order', 'asc')
            ->get();

        $menu = Menu::new()->addClass('menu-class'); // Füge hier zusätzliche Klassen hinzu

        foreach ($menuItems as $menuItem)
        {
            if ($menuItem->children->isEmpty())
            {
                $menu->add(Link::to($menuItem->url, $menuItem->name));
            }
            else
            {
                $submenu = Menu::new();
                foreach ($menuItem->children as $child)
                {
                    $submenu->add(Link::to($child->url, $child->name));
                }
                $menu->submenu(Link::to($menuItem->url, $menuItem->name), $submenu);
            }
        }

        return $menu;
    }


    public function sitemap()
    {
        $path = public_path('sitemap.xml');
        SitemapGenerator::create('https://aktion-barrierefrei.org')->writeToFile($path);

        // Redirect back to the previous page with a success message
        return redirect()->back()->with('success', 'Sitemap generated successfully!');
    }

    /**
     * Ersetzt Produkt-Platzhalter (Tokens) im HTML-Inhalt.
     * Unterstützt case-insensitive Tokens wie ##P123_MONTHLY_LINK##, ##p123_annual_price##,
     * sowie deutsche Aliase (monatlich/jährlich/jaehrlich/einmalig).
     */
    private function replaceProductPlaceholders(string $html): string
    {
        // Mapping der Intervall-Aliase (case-insensitive Normalisierung)
        $intervalMap = [
            'monthly'   => 'monthly',
            'monatlich' => 'monthly',
            'annual'    => 'annual',
            'yearly'    => 'annual',
            'jährlich'  => 'annual',
            'jaehrlich' => 'annual',
            'one_time'  => 'one_time',
            'einmalig'  => 'one_time',
        ];

        // Regexe für beide Token-Gruppen
        $patternMain  = '/##P(\d+)_([A-ZÄÖÜa-zäöü_]+)_(LINK|PRICE)##/u';
        $patternExtra = '/##P(\d+)_(DESCRIPTION|TRIAL_DAYS)##/i';

        // Alle Vorkommen suchen
        preg_match_all($patternMain,  $html, $mainMatches,  PREG_SET_ORDER);
        preg_match_all($patternExtra, $html, $extraMatches, PREG_SET_ORDER);

        // Wenn gar keine Tokens vorhanden sind → früh zurück
        if (empty($mainMatches) && empty($extraMatches)) {
            return $html;
        }

        // Produkt-IDs aus beiden Gruppen sammeln
        $productIds = collect($mainMatches)->pluck(1)
            ->merge(collect($extraMatches)->pluck(1))
            ->unique()->map(fn ($v) => (int) $v)->values()->all();

        // Relevante Produkte inkl. Preise laden
        $products = Product::with('prices')->whereIn('id', $productIds)->get()->keyBy('id');

        $replacements = [];

        // 1) LINK/PRICE Tokens verarbeiten
        foreach ($mainMatches as $m) {
            [$token, $idRaw, $intervalRaw, $typeRaw] = $m;
            $productId = (int) $idRaw;
            $intervalKey = strtolower($intervalRaw);
            $normalizedInterval = $intervalMap[$intervalKey] ?? null;
            $type = strtolower($typeRaw); // link | price

            if (!$normalizedInterval) {
                continue; // unbekanntes Intervall → Token stehen lassen
            }

            $product = $products->get($productId);
            if (!$product) {
                continue; // Produkt nicht gefunden
            }

            if ($type === 'link') {
                $replacements[$token] = $this->makeDirectBookingLink($productId, $normalizedInterval);
                continue;
            }

            if ($type === 'price') {
                $priceCents = optional($product->prices->firstWhere('interval', $normalizedInterval))->price;
                $replacements[$token] = $priceCents !== null
                    ? number_format($priceCents / 100, 2, ',', '.') . ' €'
                    : '';
            }
        }

        // 2) DESCRIPTION / TRIAL_DAYS Tokens verarbeiten (case-insensitive)
        foreach ($extraMatches as $mm) {
            [$token2, $idRaw2, $type2] = $mm;
            $pid = (int) $idRaw2;
            $prod = $products->get($pid);
            if (! $prod) {
                continue;
            }
            $t = strtoupper($type2);

            if ($t === 'DESCRIPTION') {
                // Beschreibung als Plaintext ohne HTML (bei Bedarf erlaubte Tags whitelisten)
                $replacements[$token2] = trim(strip_tags($prod->description ?? ''));
            } elseif ($t === 'TRIAL_DAYS') {
                $days = (int)($prod->trial_period_days ?? 0);
                $replacements[$token2] = $days > 0 ? ($days . ' Tage') : '';
            }
        }

        // Ersetzungen anwenden
        if (!empty($replacements)) {
            $html = strtr($html, $replacements);
        }

        return $html;
    }

    /**
     * Baut den Direktbuchungs-Link identisch zur Filament-Resource-Logik.
     */
    private function makeDirectBookingLink(int $productId, string $interval): string
    {
        $baseUrl = url('/preise');
        return $baseUrl . "?interval={$interval}&product={$productId}#step-2";
    }
}
