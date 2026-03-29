<?php

namespace App\Filament\Dashboard\Pages;

use App\Models\Company;
use Filament\Pages\Page;
use App\Models\Product;
use App\Helpers\CompanyHelper;

class UpgradeProductPage extends Page
{
    protected static ?string $navigationIcon = 'upgrade';
    protected static string $view = 'filament.pages.upgrade-product-page';
    protected static ?string $slug = 'upgrade-page';


    // Optional: Navigationslabel auf null, wenn die Seite nicht in der Sidebar erscheinen soll
    protected static ?string $navigationLabel = null;

    public static function getNavigationLabel(): string
    {
        if (CompanyHelper::currentCompany()->contracts()->count() == 0)
        {


            return 'Produkte buchen';
        }

        return 'Produkte & Upgrade';
    }

    // Öffentliche Variable, damit sie in der View verfügbar ist
    public $products;

    public function mount(): void
    {
        //   if (\Auth::check() && !session()->has('cached_user')) {
        $user = \Auth::user();
        //$company = $user->companies->first(); // oder [0], je nachdem

        $company = CompanyHelper::currentCompany();

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
            'tenant' => $company,
        ]);
        // }


        if ($company && !$company->contracts()->exists())
        {
            // Trial: alle regulären Pakete anzeigen (aktiv + sichtbar)
            $this->products = Product::query()
                ->where('active', 1)
                ->where(function ($query) {
                    $query->where(function ($q) {
                        $q->whereIn('type', ['package', 'product'])
                          ->where('visible', 1);
                    })
                    ->orWhereIn('id', [24, 30,27]);
                })
                ->orderByRaw("
        CASE
            WHEN type = 'package' THEN 1
            WHEN type = 'product' THEN 2
            ELSE 3
        END
    ")
                ->orderBy('sequence')
                ->get();
        }
        else
        {
            // Bisheriges Verhalten (Upgrade-Produkte + Visibility-Check)
            $this->products = Product::where('upgrade', 1)
                ->get()
                ->filter(fn($product) => $product->isVisibleForCompany($company));
        }
    }

    public function getTitle(): string
    {

        return __('Produkte und Erweiterungen');
    }

}
