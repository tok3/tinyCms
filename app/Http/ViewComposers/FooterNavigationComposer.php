<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\MenuItem;
use Illuminate\Http\Request;

class FooterNavigationComposer
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function compose(View $view)
    {
        $menuItems = MenuItem::whereNull('parent_id')
            ->where('type','footer')
            ->orderBy('order')
            ->get();

        $menu = ''; // Initialisieren Sie die Menüvariable als leeren String

        foreach ($menuItems as $menuItem) {
            $menu .= view('components.footer-menu-item', [
                'name' => $menuItem->name,
                'slug' => $menuItem->slug,
                'url' => url($menuItem->full_path),
            ])->render();

            // Da es keine Verschachtelung gibt, fügen wir alle "Kinder" direkt unter dem "Elternteil" ein
            foreach ($menuItem->children as $child) {
                $menu .= view('components.footer-menu-item', [
                    'name' => $child->name,
                    'slug' => $child->slug,
                    'url' => url($child->full_path),
                ])->render();
            }
        }

        $view->with('footerNavigationItems', $menu);
    }
}
