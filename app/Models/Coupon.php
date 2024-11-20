<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Coupon extends Model
{
    use HasFactory;


    public function promotion()
    {
        return $this->belongsTo(Promotion::class);
    }

    /**
     * Markiere den Gutschein als eingelöst.
     *
     * @return bool
     */
    public function redeem()
    {
        if ($this->redeemed_at) {
            return false; // Gutschein wurde bereits eingelöst
        }

        $this->redeemed_at = Carbon::now();
        return $this->save();
    }

    /**
     * @param string $code
     * @return bool
     */
    public static function redeemByCode(string $code): bool
    {
        $coupon = self::where('code', $code)->first();

        if ($coupon && !$coupon->redeemed_at) {
            $coupon->redeemed_at = Carbon::now();
            return $coupon->save();
        }

        return false;
    }

}
