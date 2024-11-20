<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable = [
        'contractable_type',
        'contractable_id',
        'product_name',
        'product_description',
        'price',
        'setup_fee',
        'interval',
        'subscription_id',
        'iteration',
        'data',
        'order_date',
        'start_date',
        'duration',
        'end_date',
    ];

    // Polymorphic relation to Company
    public function contractable()
    {
        return $this->morphTo();
    }

    // Relationship to MollieSubscription using subscription_id
    public function mollieSubscription()
    {
        return $this->belongsTo(MollieSubscription::class, 'subscription_id', 'subscription_id');
    }

    public function getFormattedPriceAttribute($locale = "DE")
    {
        // Tausendertrennzeichen: '.', Dezimaltrennzeichen: ','
        return number_format($this->price / 100, 2, ',', '.');
    }

    public function getFormattedSetupFeeAttribute($locale = "DE")
    {
        // Tausendertrennzeichen: '.', Dezimaltrennzeichen: ','
        return number_format($this->setup_fee / 100, 2, ',', '.');
    }

}
