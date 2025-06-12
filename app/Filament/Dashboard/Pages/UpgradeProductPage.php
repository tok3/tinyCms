<?php

namespace App\Filament\Dashboard\Pages;

use Filament\Pages\Page;
use App\Models\Product;
use App\Helpers\CompanyHelper;

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
        $company = CompanyHelper::currentCompany();

        $this->products = Product::where('upgrade', 1)->get()->filter(
            fn($product) => $product->isVisibleForCompany($company)
        );
    }

    public function getTitle(): string
    {
        return __('Produkterweiterungen');
    }

}
