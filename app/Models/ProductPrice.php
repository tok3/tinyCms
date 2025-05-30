<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductPrice extends Model
{
    protected $table = 'product_prices';

    protected $fillable = [
        'product_id',
        'interval',
        'price',
        'sort',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
