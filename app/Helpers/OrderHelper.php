<?php

namespace App\Helpers;

use App\Models\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use InvalidArgumentException;

class OrderHelper
{
    /**
     * Liefert das bestellte Produkt als Eloquent-Model zurück
     * und überschreibt nur price/interval, sowie formatted_price.
     *
     * @param  string|array  $selection   "2:annual" oder [2,'annual']
     * @param  string|null   $couponCode  optional
     * @return Product
     *
     * @throws InvalidArgumentException
     * @throws ModelNotFoundException
     */
    public static function buildOrderedProductModel($selection, ?string $couponCode = null): Product
    {
        // 1) Auswahl normalisieren
        if (is_string($selection)) {
            if (! str_contains($selection, ':')) {
                throw new InvalidArgumentException('Ungültige Produktauswahl.');
            }
            [$id, $interval] = explode(':', $selection, 2);
        } elseif (is_array($selection) && count($selection) === 2) {
            [$id, $interval] = $selection;
        } else {
            throw new InvalidArgumentException('Ungültiges Auswahl-Format. Erwartet "id:interval" oder [id, interval].');
        }
        $id       = (int) $id;
        $interval = (string) $interval;

        // 2) Produkt mit allen Relations holen (z.B. promotion, features, …)
        $product = Product::with([
            // falls Du eine relation promotion, prices, features, … brauchst:
            'prices',
            'promotion',
            'features',
        ])->findOrFail($id);

        // 3) Den richtigen Preis holen (aus prices table oder fallback auf products.price)
        if (method_exists($product, 'prices')) {
            $priceModel = $product->prices()->where('interval', $interval)->first();
            if (! $priceModel) {
                throw new ModelNotFoundException("Kein Preis für Interval „{$interval}“ gefunden.");
            }
            $cents = $priceModel->price;
        } else {
            $cents = $product->price;
        }

        // 4) Attribute überschreiben (nur im Speicher, nicht in DB schreiben!)
        $product->setAttribute('price', $cents);
        $product->setAttribute('interval', $interval);
        // für die Darstellungs-UI direkt ein extra Feld einfügen:
        $product->setAttribute('formatted_price', number_format($cents / 100, 2, ',', '.'));

        // 5) Coupon-Felder ergänzen, falls Du sie brauchst
        if ($couponCode) {
            $product->setAttribute('coupon_code', $couponCode);
            // und hier ggf. weitere Rabatt-Infos …
        }

        return $product;
    }
}
