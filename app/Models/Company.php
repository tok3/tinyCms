<?php
namespace App\Models;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Helpers\QrPromoHelper;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Laravel\Cashier\Billable;
class Company extends Model
{
    use HasFactory, Sluggable, Billable;

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
    ];

    protected static function boot()
    {
        parent::boot();


        // Beim Erstellen
        static::creating(function ($item) {

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
/*    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }*/

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
        return $this->name.' '.$this->name_2;
    }


    public function company()
    {
        return $this->belongsTo(Company::class,'id');
    }

    /**
     * Get the receiver information for the invoice.
     * Typically includes the name and some sort of (E-mail/physical) address.
     *
     * @return array An array of strings
     */
    public function getInvoiceInformation()
    {
        return [$this->name, $this->email];
    }

    /**
     * Get additional information to be displayed on the invoice. Typically a note provided by the customer.
     *
     * @return string|null
     */
    public function getExtraBillingInformation()
    {
        return null;
    }
}
