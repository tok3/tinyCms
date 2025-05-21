<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PdfExport extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['hash',
        'company_id',
        'url',
        'encoded_id'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

}

