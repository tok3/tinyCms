<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eztext extends Model
{
    use HasFactory;

    protected $fillable = [
        'hash',
        'ulid',
        'text',
    ];

        public function company()
    {
        return $this->belongsTo(Company::class, 'ulid', 'ulid');
    }

}
