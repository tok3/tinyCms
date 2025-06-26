<?php

namespace App\Filament\Dashboard\Widgets;

use Filament\Widgets\Widget;
use Filament\Facades\Filament;

class ImageTagsIntegrationWidget extends Widget
{
    protected int|string|array $columnSpan = 2;
    protected static string $view = 'filament.dashboard.widgets.image-tags-integration-widget';

    /**
     * Filament blendet dieses Widget nur ein, wenn hier true rück­gabt wird.
     */
    public static function canView(): bool
    {
        $company = Filament::getTenant();

        // true = Widget wird registriert, false = komplett ausgelassen
        return $company?->hasFeature('image-alt-tags') ?? false;
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        $ulid = Filament::getTenant()->ulid;

        return view(static::$view, [
            'fixsternLink' => "service/{$ulid}/altstar.js",
            'ulid'         => $ulid,
        ]);
    }
}
