<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class CouponController extends Controller
{
    // Zeigt das Einlöseformular
    public function showRedeemForm()
    {
        return view('redeem-code');
    }

    // Bearbeitet die Einlösung des Gutscheincodes
    public function redeem(Request $request)
    {


        $request->validate([
            'code' => 'required|string',
        ]);
        $coupon = Coupon::where('code', $request->input('code'))
            ->whereNull('redeemed_at')
            ->first();

        if (!$coupon)
        {
            return redirect()->back()->withErrors(['code' => 'Ungültiger oder bereits eingelöster Gutscheincode.']);
        }


        // Hol das zugehörige Produkt (falls vorhanden)
        $promotion = $coupon->promotion;

        $product = $promotion->product ?? null;
        $subtotal = $this->calculateTotalPrice($promotion, $product) ?? null;

        if ($promotion->product->active != 1 || $promotion->is_active != 1)
        {
            return redirect()->back()->withErrors(['code' => 'Das Angebot scheint nicht mehr gültig zu sein.']);
        }
        if (Carbon::parse($promotion->valid_till)->isPast())
        {
            return redirect()->back()->withErrors(['code' => 'Das Angebot war leider nur bis ' .Carbon::parse($promotion->valid_till)->format('d.m.Y') . ' gültig.']);
        }


        // Speichere den Gutscheincode in der Session
        Session::put('coupon_code', $coupon->code);
        Session::put('product_id', $coupon->promotion->product_id);


        return view('redeem-code', [
            'coupon' => $coupon,
            'product' => $product,
            'promotion' => $promotion,
            'subtotal' => $subtotal,
        ]);
    }

    /**
     * Berechnet den Endpreis basierend auf der Promotion.
     *
     * @param Promotion $promotion
     * @param Product $product
     * @return float
     */
    public function calculateTotalPrice($promotion, $product, $formatOutput = true): mixed
    {
        $originalPrice = $product->price / 100;

        if ($originalPrice < 1)
        {
            $totalPrice = 0.00;
        }
        else
        {
            // Überprüfe den Rabatt-Typ und berechne den Endpreis
            if ($promotion->discount_type === 'percent')
            {
                // Prozentrabatt berechnen
                $discountAmount = ($originalPrice * $promotion->discount_value) / 100;
                $totalPrice = $originalPrice - $discountAmount;
            }
            elseif ($promotion->discount_type === 'fixed')
            {
                // Festbetrag-Rabatt abziehen
                $totalPrice = $originalPrice - $promotion->discount_value;
            }
            else
            {
                // Wenn kein Rabatt angewendet werden soll, bleibt der Originalpreis
                $totalPrice = $originalPrice;
            }
        }
        // Stelle sicher, dass der Preis nicht negativ ist

        if ($formatOutput == true)
        {
            return number_format($totalPrice, 2, ',', '.');
        }

        return max($totalPrice, 0);
    }

}
