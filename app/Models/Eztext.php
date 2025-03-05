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
}
