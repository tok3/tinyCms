<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'default_price',
        'unit',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_feature')
            ->withPivot('value')
            ->withTimestamps();
    }

    public function companies()
    {
        return $this->belongsToMany(Company::class, 'company_feature')
            ->withPivot('value')
            ->withTimestamps();
    }
}
