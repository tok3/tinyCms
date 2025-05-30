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
        // Alle Produkte laden
        $this->products = Product::where('upgrade',1)->get();
    }

    public function getTitle(): string
    {
        return __('Produkterweiterungen');
    }

}
