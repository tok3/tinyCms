<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contract extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'contractable_type',
        'contractable_id',
        'product_id',
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

    public static function boot()
    {
        parent::boot();

        static::created(function ($contract) {
            $contract->assignFeaturesToCompany();
        });

        static::creating(function ($contract) {
            $product = Product::find($contract->product_id);

            if ($product) {
                $contract->product_name = $product->name;
                $contract->product_description = $product->description;
            }
        });

        static::created(function ($contract) {
            $contract->assignFeaturesToCompany();
        });

    }

    // Polymorphic relation to Company
    public function contractable()
    {
        return $this->morphTo();
    }

    public function assignFeaturesToCompany()
    {
        \Log::info("Triggered Contract ID {$this->id}, Product ID: {$this->product_id}");

        $company = $this->contractable;
        $product = Product::find($this->product_id);

        if (!$company || !$product) {
            \Log::warning("Company oder Product nicht gefunden für Contract ID {$this->id}");
            return;
        }

        foreach ($product->features as $feature) {
            CompanyFeature::updateOrCreate(
                [
                    'company_id' => $company->id,
                    'feature_id' => $feature->id,
                ],
                [
                    'value' => $feature->pivot->value ?? 1,
                ]
            );
        }

        \Log::info("Features für Company ID {$company->id} aus Product ID {$product->id} gespeichert.");
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
