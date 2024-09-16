<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\MenuItem;
use App\Models\Page;
use Illuminate\Http\Request;
class TopNavigationComposer
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function compose(View $view)
    {
        $menuItems = MenuItem::whereNull('parent_id')
            ->orderBy('order')
            ->where('type','header')
            ->with('children')
            ->get();



        $menu = ''; // Initialisieren Sie die Menüvariable als leeren String

        $lastSegment = last($this->request->segments());

        foreach ($menuItems as $menuItem) {

            if ($menuItem->children->isEmpty()) {
                $menu .= view('components.menu-item', [
                    'name' => $menuItem->name,
                    'slug' => $menuItem->slug,
                    'lastSegment' => $lastSegment,
                    'url' => url($menuItem->full_path),
                    'hasChildren' => false
                ])->render();
            } else {
                $children = '';
                foreach ($menuItem->children as $child) {
                    $children .= view('components.sub-menu-item', [
                        'name' => $child->name,
                        'slug' => $child->slug,
                        'lastSegment' => $lastSegment,
                        'url' => str_replace('//','/', url($child->full_path)).'AA',
                    'hasChildren' => $child->children

                    ])->render();
                }
                $menu .= view('components.menu-item', [
                    'name' => $menuItem->name,
                    'slug' => $menuItem->slug,
                    'lastSegment' => $lastSegment,
                    'url' => url($menuItem->full_path).'BB',
                    'hasChildren' => true,
                    'slot' => $children
                ])->render();
            }
        }

        $view->with('navigationItems', $menu);
    }

    /**
     * Ermittelt den Menüpfad für eine gegebene Seite.
     *
     * @param Page $page Die Seite, für die der Menüpfad ermittelt werden soll.
     * @return array Ein Array, das den Pfad durch die Menüstruktur darstellt.
     */
    protected function getMenuPathForPage($page)
    {
        $path = [];
        $menuItem = MenuItem::where('page_id', $page->id)->first(); // Annahme: MenuItem hat eine Spalte page_id

        while ($menuItem !== null) {
            array_unshift($path, $menuItem->name); // Fügt den Namen des Menüpunkts am Anfang des Arrays ein
            $menuItem = $menuItem->parent; // Geht zum übergeordneten Menüpunkt über
        }

        return $path;
    }
}
