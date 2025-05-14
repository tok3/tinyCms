<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CompanyFeature extends Pivot
{
    use HasFactory;

    protected $table = 'company_feature';

    protected $fillable = [
        'company_id',
        'feature_id',
        'contract_id',
        'value',
    ];


}
