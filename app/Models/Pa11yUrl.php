<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pa11yUrl extends Model
{
    protected $fillable = ['url', 'last_checked'];

    use HasFactory;


    public function accessibilityIssues()
    {
        return $this->hasMany(Pa11yAccessibilityIssue::class, 'url_id');
    }

}
