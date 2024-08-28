<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'price', 'currency', 'payment_type', 'interval', 'active'
    ];

    // Accessor to get the price in a formatted way
    public function getPriceAttribute($value)
    {
        return number_format($value / 100, 2); // Convert integer price to float with 2 decimal places
    }

    // Mutator to set the price in integer format
    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = $value * 100; // Convert float price to integer (cents)
    }

    // Accessor to get the formatted price with currency
    public function getFormattedPriceAttribute()
    {
        return number_format($this->price / 100, 2);
    }
}
