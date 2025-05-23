<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Promotion extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'discount_type',
        'discount_value',
        'valid_from',
        'valid_till',
        'is_active',
        'product_id',
    ];

    // Relation zu Product
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function getFormattedDiscountAttribute($locale = "DE")
    {
        // Tausendertrennzeichen: '.', Dezimaltrennzeichen: ','
        return number_format($this->discount_value, 2, ',', '.');
    }

    public function coupons()
    {
        return $this->hasMany(Coupon::class);
    }
}
