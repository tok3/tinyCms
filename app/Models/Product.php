<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'description', 'info', 'invoice_text', 'price', 'currency', 'payment_type', 'lz', 'interval', 'sequence', 'active', 'visible', 'upgrade', 'trial_period_days'
    ];

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->updateIntervalBasedOnPaymentType();

            if (empty($model->invoice_text))
            {
                $model->invoice_text = $model->description;
            }

        });


    }

    /**
     * Liefert den Preis für ein Intervall.
     *
     * @param  string  $interval    Zahlungsintervall („monthly“, „annual“, …)
     * @param  bool    $formatted   Wenn true, formatierten Euro-String zurückgeben
     * @return int|string|null      Cent-Integer oder formatierter String oder null
     */
    public function priceFor(string $interval, bool $formatted = false)
    {
        $priceModel = $this->prices->firstWhere('interval', $interval);

        if (! $priceModel) {
            return null;
        }

        $cents = $priceModel->price; // z. B. 69000

        if (! $formatted) {
            return $cents;             // rohe Cent-Zahl
        }

        return number_format($cents / 100, 2, ',', '.');
    }

    public function prices()
    {
        return $this->hasMany(ProductPrice::class)->orderBy('sort');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function features()
    {
        return $this->belongsToMany(Feature::class, 'product_feature')
            ->withPivot('value')
            ->withTimestamps();
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
        if ($this->payment_type === 'one_time')
        {
            $this->interval = 'one_time';
        }
    }

    public function setUpgradeAttribute($value)
    {
        $this->attributes['upgrade'] = $value;
        if ($value)
        {
            $this->attributes['visible'] = 0;
        }
    }

}
