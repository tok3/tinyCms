<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AxeRule extends Model
{
    use HasFactory;

    protected $fillable = [
        'rule_id', 'description', 'impact', 'tags', 'issue_type', 'act_rule', 'detail_link',
    ];

    protected $casts = [
        'tags' => 'array',
    ];
}
