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
     //   if (\Auth::check() && !session()->has('cached_user')) {
            $user = \Auth::user();
            $company = $user->companies->first(); // oder [0], je nachdem

            session()->put('cached_user', [
                'name' => $user->name,
                'email' => $user->email,
                'company' => [
                    'id' => $company?->id,
                    'name' => $company?->name,
                    'str' => $company?->str,
                    'plz' => $company?->plz,
                    'ort' => $company?->ort,
                    'email' => $company?->email,
                ],
            ]);
       // }

        $company = CompanyHelper::currentCompany();

        if ($company && ! $company->contracts()->exists()) {
            // Trial: alle regulären Pakete anzeigen (aktiv + sichtbar)
            $this->products = Product::query()
                ->where('active', 1)   // passe ggf. Spaltennamen an: is_active
                ->where('visible', 1)  // ggf. is_visible
                ->orderBy('sequence')      // falls vorhanden
                ->get();
        } else {
            // Bisheriges Verhalten (Upgrade-Produkte + Visibility-Check)
            $this->products = Product::where('upgrade', 1)
                ->get()
                ->filter(fn ($product) => $product->isVisibleForCompany($company));
        }
    }

    public function getTitle(): string
    {
        return __('Produkterweiterungen');
    }

}
