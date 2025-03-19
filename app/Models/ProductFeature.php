<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductFeature extends Pivot
{
    use HasFactory;

    protected $table = 'product_feature';

    protected $fillable = [
        'product_id',
        'feature_id',
        'value',
    ];
}
