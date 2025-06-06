<?php

namespace App\Filament\Dashboard\Pages;

use Filament\Pages\Page;
use App\Models\Product;


class UpgradeProductPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-credit-card';
    protected static string $view = 'filament.pages.upgrade-product-page';
    protected static ?string $slug = 'upgrade-page';

    // Optional: Navigationslabel auf null, wenn die Seite nicht in der Sidebar erscheinen soll
    protected static ?string $navigationLabel = null;

    // Öffentliche Variable, damit sie in der View verfügbar ist
    public $products;

    public function mount(): void
    {
        // 1.1. Auth-User und zugehörige Firma ermitteln
        $user = auth()->user();
        $company = $user->companies()->first();
     echo $company->name;
        $company = filament()->getTenant();
        // (Passe das an, falls dein User mehrere Firmen hat.)

        // 1.2. Alle Feature-IDs, die diese Firma aktuell hat
        //      (Tabelle: company_feature)
        $companyFeatureIds = $company
            ->features()                  // Relation im Company-Model
            ->pluck('features.id')        // nur die IDs herausziehen
            ->toArray();

        echo "<pre>";
        print_r($companyFeatureIds);
        echo "</pre>";
        die();
        // Speichere die Array-Liste vorerst in einer Property,
        // damit sie im nächsten Schritt zur Produktfilterung bereitliegt.
        $this->companyFeatureIds = $companyFeatureIds;

        // (Den Upgradewert 1 lassen wir weiterhin, die finale Filterung kommt in Schritt 2.)
        $this->products = Product::where('upgrade', 1)->get();
    }

    public function getTitle(): string
    {
        return __('Produkterweiterungen');
    }

}
