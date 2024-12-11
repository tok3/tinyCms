<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Support\Str;

class Domainurl extends Model
{
    use HasFactory, HasUlids, SoftDeletes;

    protected $fillable = [
        'domain_id',
        'company_id',
        'url',
        'overall_stats',
        'metadata',
    ];


    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function domain()
    {
        return $this->belongsTo(Domain::class);
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }

}
