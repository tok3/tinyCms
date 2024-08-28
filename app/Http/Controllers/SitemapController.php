<?php
namespace App\Http\Controllers;

use Spatie\Sitemap\SitemapGenerator;
use Illuminate\Support\Facades\Storage;
use App\Models\MenuItem;
use App\Models\Page;
use Spatie\Url\Url;

class SitemapController extends Controller
{
    public function index()
    {
        die();
        $sitemap = SitemapGenerator::create(config('app.url'))
            ->getSitemap();

        // Füge Menüpunkte zur Sitemap hinzu
        MenuItem::all()->each(function ($menuItem) use ($sitemap) {
            if ($menuItem->page_id && $page = Page::find($menuItem->page_id)) {
                $sitemap->add(Url::create('/' . $menuItem->getFullPathAttribute())
                   /* ->setLastModificationDate($page->updated_at)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)*/
                    ->setPriority(0.8));
            }
        });

        // Speichern der Sitemap
        $sitemap->writeToFile(public_path('sitemap.xml'));

        return response()->json(['message' => 'Sitemap successfully created.']);
    }
}
