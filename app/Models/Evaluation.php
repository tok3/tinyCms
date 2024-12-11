<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Evaluation extends Model
{
    use HasFactory, SoftDeletes, HasUlids;

    protected $fillable = [
        'company_id',
        'domain_id',
        'domainurl_id',
        'evaluation',
        'evaluation_text',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::ulid();
            }
        });
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function domain()
    {
        return $this->belongsTo(Domain::class);
    }

    public function domainurl()
    {
        return $this->belongsTo(Domainurl::class);
    }
}
