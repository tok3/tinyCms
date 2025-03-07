<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'price', 'currency', 'payment_type', 'interval', 'active', 'visible','trial_period_days'
    ];

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->updateIntervalBasedOnPaymentType();
        });
    }

    // Accessor to get the price in a formatted way
    public function getPriceAttribute($value)
    {
        return $value; // Convert integer price to float with 2 decimal places
    }

    // Mutator to set the price in integer format

    public function getFormattedPriceAttribute($locale = "DE")
    {
        // Tausendertrennzeichen: '.', Dezimaltrennzeichen: ','
        return number_format($this->price / 100, 2, ',', '.');
    }


    public function updateIntervalBasedOnPaymentType()
    {
        if ($this->payment_type === 'one_time') {
            $this->interval = 'one_time';
        }
    }
}
