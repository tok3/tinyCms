<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Contract extends Model
{
    use SoftDeletes;

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'order_date' => 'date',
        'subscription_start_date' => 'date',
        'data' => 'array',
    ];

    protected $fillable = [
        'contractable_type',
        'contractable_id',
        'product_id',
        'product_name',
        'product_description',
        'invoice_text',
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

    public function company(){
        return $this->contractable();
    }

    // invoces
    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function features()
    {
        return $this->belongsToMany(
            \App\Models\Feature::class,
            'company_feature',   // Pivot-Tabelle
            'contract_id',       // Fremdschlüssel auf diese Tabelle
            'feature_id'         // Fremdschlüssel zur Feature-Tabelle
        )
            ->withPivot('value')
            ->withTimestamps();
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
                    'contract_id' => $this->id,
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

    protected function priceGross(): Attribute
    {
        return Attribute::make(
            get: fn () => round($this->price * (1 + config('accounting.tax_rate') / 100), 2),
        );
    }

    protected function priceGrossFormatted(): Attribute
    {
        return Attribute::make(
            get: fn () => number_format($this->price * (1 + config('accounting.tax_rate') / 100), 2, ',', '.') . ' €',
        );
    }
}
