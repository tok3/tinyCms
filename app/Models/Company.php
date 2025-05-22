<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use App\Helpers\QrPromoHelper;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;

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

        static::creating(function ($item) {
            $latestKdNr = Company::withTrashed()->max('kd_nr');
            $item->kd_nr = $latestKdNr ? $latestKdNr + 1 : 1000;

            if (empty($item->ulid)) {
                $item->ulid = (string) Str::ulid();
            }
        });

        static::deleting(function ($company) {
            \App\Models\Contract::where('contractable_id', $company->id)
                ->where('contractable_type', 'App\\Models\\Company')
                ->delete();
            \DB::table('company_user')->where('company_id', $company->id)->delete();
            $userIdsToDelete = \DB::table('users')
                ->select('users.id')
                ->leftJoin('company_user', 'users.id', '=', 'company_user.user_id')
                ->whereNull('company_user.company_id')
                ->where('users.is_admin', '!=', 1)
                ->pluck('id');
            \App\Models\User::whereIn('id', $userIdsToDelete)->delete();
        });

        // Prüfen, ob Laravel im Test-Modus läuft
        if (App::runningUnitTests())
        {
            static::flushEventListeners(); // Entfernt alle Eloquent-Event-Listener
            static::unsetEventDispatcher(); // Entfernt den Event-Dispatcher
        }
        else
        {
            static::observe(\Cviebrock\EloquentSluggable\SluggableObserver::class);
        }
    }

    protected static function booted()
    {
        static::created(function (Company $company) {
            $company->settings()->create([
                'contrast_errors'   => 0,
                'default_standard'  => '2.1',
                'full_scan_interval'=> 'weekly',
                'max_urls'          => 10,
                'auto_add_urls'     => 1,
                'widget_features'   => 'standard',
            ]);
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
    public function settings()
    {
        return $this->hasOne(CompanySetting::class);
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function scanLogs()
    {
        return $this->hasMany(CompanyScanLog::class);
    }

    /**
     * @return int
     *
     * maximale url für firma
     */
    public function getMaxUrlsAttribute(): int
    {
        $features = [
            'max-url-10' => 10,
            'max-url-50' => 50,
            'max-url-100' => 100,
            'max-url-1500' => 1500,
            'max-url-10k' => 10000,
            'max-url-15k' => 15000,
            'max-url-100k' => 100000,
        ];

        $maxLimit = 10; // Fallback-Wert (Standard)

        foreach ($features as $feature => $limit) {
            if ($this->hasFeature($feature) && $limit > $maxLimit) {
                $maxLimit = $limit;
            }
        }

        return $maxLimit;
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function features()
    {
        return $this->belongsToMany(
            Feature::class,
            'company_feature'
        )
            ->withPivot('value', 'deleted_at')   // deleted_at mitladen
            ->wherePivotNull('deleted_at')       // nur nicht-gelöschte Pivots
            ->withTimestamps();
    }

    /**
     * @param $features
     * @return bool
     */
    public function hasFeature($features): bool
    {
        $features = is_array($features) ? $features : [$features];

        return $this->features()
            ->whereIn('slug', $features)
            ->exists();  // true nur wenn ein aktiver Pivot existiert
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


    public function imagetags(){
        return $this->hasMany(Imagetag::class);
    }

    public function pdfexports(){
        return $this->hasMany(PdfExport::class);
    }

    public function eztexts(){
        return $this->hasMany(Eztext::class);
    }

}
