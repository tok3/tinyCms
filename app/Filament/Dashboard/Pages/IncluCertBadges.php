<?php

namespace App\Filament\Dashboard\Pages;

use Filament\Facades\Filament;
use Filament\Pages\Page;

class IncluCertBadges extends Page
{
    protected static ?string $navigationIcon = 'inclu-cert-shield';
    protected static string $view = 'filament.dashboard.pages.inclu-cert-badges';
    protected static ?string $slug = 'inclucert-badges';
    protected static ?string $navigationLabel = 'IncluCert & Badges';

    public string $ulid = '';
    public string $badgeScriptUrl = '';
    public bool $isDemo = false;

    public static function shouldRegisterNavigation(): bool
    {
        $tenant = Filament::getTenant();
        echo $tenant?->hasFeature('inclucert') ?? false;

        return $tenant?->hasFeature('inclucert') ?? false;
    }

    public static function getNavigationSort(): ?int
    {
        return 70;
    }



    public function mount(): void
    {
        $tenant = Filament::getTenant();

        if (!$tenant?->hasFeature('inclucert')) {
            abort(403);
        }

        $metrics = app(\App\Services\AccessibilityScoreService::class)
            ->getCompanyMetrics($tenant);

        if ($metrics) {
            $this->ulid   = $tenant->ulid;
            $this->isDemo = false;
        } else {
            $this->ulid   = env('INCLUCERT_DEMO_ULID', '01JJ3ZS11TPDPASST933Q0D8WY');
            $this->isDemo = true;
        }

        $this->badgeScriptUrl = url('/js/inclucert-badge.js');
    }

    public function getTitle(): string
    {

        return false;
    }
}
