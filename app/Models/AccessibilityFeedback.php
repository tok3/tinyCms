<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessibilityFeedback extends Model
{
    protected $table = 'accessibility_feedback';

    protected $fillable = [
        'company_id',
        'first_name',
        'last_name',
        'email',
        'page_url',
        'body',
        'privacy_accepted',
        'is_read',
        'notified_at',
    ];

    protected $casts = [
        'privacy_accepted' => 'boolean',
        'is_read' => 'boolean',
        'notified_at' => 'datetime',
    ];

    public function company()
    {
        return $this->belongsTo(\App\Models\Company::class);
    }
}
