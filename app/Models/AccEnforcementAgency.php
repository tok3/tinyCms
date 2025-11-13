<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccEnforcementAgency extends Model
{
    use HasFactory;

    public function accDeclarations()
    {
        return $this->belongsTo(AccDeclaration::class);
    }
}
