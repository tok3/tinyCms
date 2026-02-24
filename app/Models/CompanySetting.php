<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanySetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'default_standard',
        'contrast_errors',
        'max_urls',
        'auto_add_urls',
        'valid_domains',
        'exclude_query_string_urls',
        'full_scan_interval',
        'widget_features',
        'a11y_feedback_receivers',
        'altstar_type',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }



}
