<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Page;
use Facades\App\Domain\Render\RenderContent;

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


        if (is_null($slug)) {
            if (!is_null($segment2)) {
                $slug = $segment2;
            } elseif (!is_null($segment1)) {
                $slug = $segment1;
            } elseif($segment1 == '')
            {
                $slug = '/';
            }else{
                abort(404);
            }
        }

        $page = Page::whereSlug($slug)->wherePublished(true)->first();

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
                ->render();


            // Hinzufügen des gerenderten Strings zum Array
            $siteContent[] = $renderedView;
        }

        return implode('', $siteContent);

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

        foreach ($menuItems as $menuItem) {
            if ($menuItem->children->isEmpty()) {
                $menu->add(Link::to($menuItem->url, $menuItem->name));
            } else {
                $submenu = Menu::new();
                foreach ($menuItem->children as $child) {
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
        SitemapGenerator::create('https://aktion-barrierefrei.de')->writeToFile($path);

        // Redirect back to the previous page with a success message
        return redirect()->back()->with('success', 'Sitemap generated successfully!');
    }
}
