<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyScanLog extends Model
{
    use HasFactory;

    protected $table = 'company_scan_logs';

    protected $fillable = [
        'company_id',
        'scanned_at',
        'scan_type', // e.g., 'full', 'manual'
    ];

    protected $casts = [
        'scanned_at' => 'datetime',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }


}
