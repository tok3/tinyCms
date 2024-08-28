<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Subscriber extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'company_id',
        'activation_code',
        'activated_ip',
        'activated_at'
    ];


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($subscriber) {
            // Setze den Aktivierungscode nur, wenn er noch nicht gesetzt ist
            if (empty($subscriber->activation_code))
            {
                $subscriber->activation_code = Str::random(64) . $subscriber->email;
            }

            // Generiere einen eindeutigen Token, wenn eine neue Subscription erstellt wird
            $subscriber->unsubscribe_token = Str::random(40);

        });
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }


}
