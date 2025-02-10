<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use App\Helpers\QrPromoHelper;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory, Sluggable, SoftDeletes;

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

            if (empty($item->ulid)) {
                $item->ulid = (string) Str::ulid();
            }

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

        static::deleting(function ($company) {
            // Lösche verknüpfte Contracts
            \App\Models\Contract::where('contractable_id', $company->id)
                ->where('contractable_type', 'App\\Models\\Company')
                ->delete();

            // Lösche Einträge aus company_user
            \DB::table('company_user')->where('company_id', $company->id)->delete();

            // Finde Benutzer, die nur mit dieser Company verknüpft sind und KEINE Admins sind
            $userIdsToDelete = \DB::table('users')
                ->select('users.id')
                ->leftJoin('company_user', 'users.id', '=', 'company_user.user_id')
                ->whereNull('company_user.company_id')
                ->where('users.is_admin', '!=', 1) // Admins auslassen
                ->pluck('id');

            // Lösche diese Benutzer
            \App\Models\User::whereIn('id', $userIdsToDelete)->delete();
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

    public function hasAccessToTool()
    {


        return true;
    }

    public function referrers()
    {
        return $this->hasMany(Referrer::class, 'ulid', 'ulid');
    }

    public function pa11yUrls()
    {
        return $this->hasMany(Pa11yUrl::class);
    }

}
