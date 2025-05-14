<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Imagetag extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'ulid',
        'url',
        'hash',
        'description',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'ulid', 'ulid');
    }

}
