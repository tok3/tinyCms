<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referrer extends Model
{
    use HasFactory;

    protected $fillable = ['referrer', 'ulid', 'count'];

    /**
     * Referrer gehört zu einer Company.
     */
    public function company()
    {
        return $this->belongsTo(Company::class, 'ulid', 'ulid');
    }
}
