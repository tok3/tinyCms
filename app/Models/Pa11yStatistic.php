<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pa11yStatistic extends Model
{
    use HasFactory;

    protected $fillable = ['company_id', 'url_id', 'wcag_level', 'standard','error_count', 'warning_count', 'notice_count','scanned_at'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function url()
    {
        return $this->belongsTo(Pa11yUrl::class);
    }
}
