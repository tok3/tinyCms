<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Observers\Pa11yUrlObserver;
class Pa11yUrl extends Model
{
    protected $fillable = ['company_id','url', 'last_checked'];

    use HasFactory , SoftDeletes;

    protected static function boot()
    {

        parent::boot();

        Pa11yUrl::observe(Pa11yUrlObserver::class);

    }

    protected static function booted()
    {
        static::deleting(function ($pa11yUrl) {
            // Company laden
            $company = $pa11yUrl->company;
            if (! $company) {
                return;
            }

            // ULID des Unternehmens (entspricht in Referrer der 'ulid'-Spalte)
            $ulid = $company->ulid;

            // Entsprechende Referrer löschen
            \App\Models\Referrer::where('ulid', $ulid)
                ->where('referrer', $pa11yUrl->url)
                ->delete();
        });
    }
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

        public function pa11yAccessibilityIssues()
    {
        return $this->hasMany(Pa11yAccessibilityIssue::class, 'url_id');
    }



}
