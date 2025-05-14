<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpenaiLog extends Model
{
    use HasFactory;
    protected $table = 'openai_logs';

    protected $fillable = [
        'type',
        'prompt_tokens',
        'total_tokens',
        'completion_tokens',
        'estimated_cost_usd',
        'created_at',
        'updated_at',
    ];
}
