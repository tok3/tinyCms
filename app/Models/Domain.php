<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Domain extends Model
{
    use HasFactory, SoftDeletes, HasUlids;

    protected $fillable = [
        'id',
        'name',
        'company_id',
        'overall_stats',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function domainurls(){
        return $this->hasMany(Domainurl::class);
    }

    public function evaluations(){
        return $this->hasManyThrough(Evaluation::class, Domainurl::class);
    }
}

