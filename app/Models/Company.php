<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use App\Helpers\QrPromoHelper;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'name',
        'name_2',
        'str',
        'plz',
        'ort',
        'email',
        'fon',
        'mobile',
        'web',
        'logo_image',
        'logo_orig_filename',
        'kd_nr',
    ];

    protected static function boot()
    {
        parent::boot();


        // Beim Erstellen
        static::creating(function ($item) {
            // Finde den höchsten Wert der kd_nr in der Datenbank
            $latestKdNr = Company::max('kd_nr');

            // Inkrementiere um 1 oder starte bei 1000, falls kein Wert existiert
            $item->kd_nr = $latestKdNr ? $latestKdNr + 1 : 1000;
        });

        static::created(function ($item) {

        });
        // Beim Aktualisieren eines Menüeintrags
        static::updating(function ($item) {
            // Prüfe, ob die parent_id geändert wurde
            if ($item->isDirty('slug'))
            {


            }
        });


    }

    // Polymorphe Beziehung zu Contracts
    public function contracts()
    {
        return $this->morphMany(Contract::class, 'contractable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function mollieCustomer()
    {
        return $this->hasOne(MollieCustomer::class, 'model_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */

    public function subscription()
    {
        return $this->hasOneThrough(
            MollieSubscription::class,
            MollieCustomer::class,
            'model_id',       // Foreign key on MollieCustomer table
            'customer_id',    // Foreign key on MollieSubscription table
            'id',             // Local key on Company table
            'mollie_customer_id'  // Local key on MollieCustomer table
        )->where('mollie_customers.model_type', Company::class);
    }

    // In Company.php (Company Model)
    public function subscriptions()
    {
        return $this->hasManyThrough(
            MollieSubscription::class,
            MollieCustomer::class,
            'model_id',         // Foreign key on MollieCustomer table
            'customer_id',      // Foreign key on MollieSubscription table
            'id',               // Local key on Company table
            'mollie_customer_id' // Local key on MollieCustomer table
        )->where('mollie_customers.model_type', Company::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'company_user');
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function getFullnameAttribute()
    {
        return $this->name . ' ' . $this->name_2;
    }


    public function company()
    {
        return $this->belongsTo(Company::class, 'id');
    }


}
