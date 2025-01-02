<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pa11yUrl extends Model
{
    protected $fillable = ['company_id','url', 'last_checked'];

    use HasFactory;


    public function accessibilityIssues()
    {
        return $this->hasMany(Pa11yAccessibilityIssue::class, 'url_id', 'id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function statistics()
    {
        return $this->hasMany(Pa11yStatistic::class, 'url_id');
    }

    /**
     * @return array
     */
    public function getAggregatedStatistics()
    {
        \Log::info('getAggregatedStatistics called', ['url_id' => $this->id]);

        $issues = $this->accessibilityIssues;

        \Log::info('Accessibility Issues', ['count' => $issues->count()]);

        return [
            'errors' => $issues->where('type', 'error')->count(),
            'warnings' => $issues->where('type', 'warning')->count(),
            'notices' => $issues->where('type', 'notice')->count(),
        ];
    }

    /**
     * @return mixed
     */
    public function getStatistics()
    {
        $issues = $this->accessibilityIssues;

        $stats = $issues->groupBy('wcag_level')->map(function ($group, $level) {
            return [
                'level' => $level,
                'errors' => $group->where('type', 'error')->count(),
                'warnings' => $group->where('type', 'warning')->count(),
                'notices' => $group->where('type', 'notice')->count(),
            ];
        });

        return $stats;
    }



}
