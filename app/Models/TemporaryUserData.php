<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemporaryUserData extends Model
{
    use HasFactory;

    protected $table = 'temporary_user_data';

    // Mass-assignable attributes
    protected $fillable = [
        'mollie_customer_id',
        'user_data',
        'company_data',
    ];

    // Optional: Wenn du die JSON-Felder beim Abrufen automatisch als Arrays haben möchtest
    protected $casts = [
        'user_data' => 'array',
        'company_data' => 'array',
    ];
}
