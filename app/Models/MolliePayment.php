<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MolliePayment extends Model
{
    use HasFactory;

    // Weisen Sie die Tabelle explizit zu, falls sie vom Modellnamen abweicht
    protected $table = 'mollie_payments';

    // Erlaubte Felder für die Massen-Zuweisung
    protected $fillable = [
        'payment_id',
        'mode',
        'amount_value',
        'amount_currency',
        'settlement_amount_value',
        'settlement_amount_currency',
        'amount_refunded_value',
        'amount_remaining_value',
        'amount_charged_back_value',
        'description',
        'method',
        'status',
        'created_at',
        'paid_at',
        'canceled_at',
        'expires_at',
        'failed_at',
        'due_date',
        'billing_email',
        'profile_id',
        'sequence_type',
        'redirect_url',
        'cancel_url',
        'webhook_url',
        'mandate_id',
        'subscription_id',
        'order_id',
        'lines',
        'billing_address',
        'shipping_address',
        'settlement_id',
        'locale',
        'metadata',
        'details',
        'customer_id',
        'country_code',
        '_links'
    ];

    // Datenfelder, die als JSON gespeichert werden sollen
    protected $casts = [
        'lines' => 'array',
        'billing_address' => 'array',
        'shipping_address' => 'array',
        'metadata' => 'array',
        'details' => 'array',
        '_links' => 'array',
        'created_at' => 'datetime',
        'paid_at' => 'datetime',
        'canceled_at' => 'datetime',
        'expires_at' => 'datetime',
        'failed_at' => 'datetime',
        'due_date' => 'date',
    ];


    public function company()
    {
        return $this->hasOneThrough(
            Company::class,
            MollieCustomer::class,
            'mollie_customer_id', // Foreign key on MollieCustomer table
            'id',                 // Foreign key on Company table
            'customer_id',         // Local key on MollieSubscription table
            'model_id'            // Local key on MollieCustomer table
        )->where('mollie_customers.model_type', Company::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function invoice()
    {
        return $this->hasOne(Invoice::class, 'mollie_payment_id');
    }

    /**
     * Relation zu MollieSubscription über `subscription_id`.
     */
    public function subscription()
    {
        return $this->belongsTo(MollieSubscription::class, 'subscription_id', 'subscription_id');
    }

    /**
     * alle payments ohne invoice
     *
     * @return mixed
     */
    public static function withoutInvoice()
    {
        return self::doesntHave('invoice')->get();
    }


}
