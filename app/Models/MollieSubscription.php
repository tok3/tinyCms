<?php
// app/Models/Subscription.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MollieSubscription extends Model
{
    protected $fillable = [
        'subscription_id',
        'customer_id',
        'amount_value',
        'amount_currency',
        'interval',
        'status',
        'start_date',
        'next_payment_date',
        'metadata',
        'description',
    ];


    public function payments()
    {
        return $this->hasMany(MolliePayment::class, 'subscription_id');
    }

    public function company()
    {
        return $this->hasManyThrough(
            Company::class,
            MollieCustomer::class,
            'mollie_customer_id', // Foreign key on MollieCustomer table
            'id',                 // Foreign key on Company table
            'customer_id',        // Local key on MollieSubscription table
            'model_id'            // Local key on MollieCustomer table
        )->where('mollie_customers.model_type', Company::class);
    }
}
