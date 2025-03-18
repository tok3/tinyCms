<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tts extends Model
{
    use HasFactory;


    protected $fillable = ['ulid', 'count'];

    public function company()
    {
        return $this->belongsTo(Company::class, 'ulid', 'ulid');
    }
}
