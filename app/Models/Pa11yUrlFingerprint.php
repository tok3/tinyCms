<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pa11yUrlFingerprint extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'company_id',
        'url_id',
        'standard',
        'fingerprint',
        'fingerprint_state',
        'fingerprint_source',
        'fingerprint_scan_date',
        'scan_window_start_at',
        'scan_window_end_at',
        'decision_action',
        'decision_reason',
        'decision_context',
    ];

    protected $casts = [
        'fingerprint_scan_date' => 'datetime',
        'scan_window_start_at' => 'datetime',
        'scan_window_end_at' => 'datetime',
        'decision_context' => 'array',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function url()
    {
        return $this->belongsTo(Pa11yUrl::class, 'url_id');
    }
}
