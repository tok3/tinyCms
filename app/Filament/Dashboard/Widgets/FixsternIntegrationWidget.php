<?php

namespace App\Filament\Dashboard\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Support\Facades\Auth;
use Filament\Facades\Filament;
use App\Models\Company;

class FixsternIntegrationWidget extends Widget
{
    protected int|string|array $columnSpan = 2;

    protected static string $view = 'filament.dashboard.widgets.fixstern-integration-widget';

    public static function canView(): bool
    {
        $company = Filament::getTenant();

        // true = Widget wird registriert, false = komplett ausgelassen
        return $company?->hasFeature('widget-support') ?? false;
    }
    public function render(): \Illuminate\Contracts\View\View
    {



        $ulid = Filament::getTenant()->ulid;

        return view(static::$view, [
            'fixsternLink'=>"service/".$ulid . '/fixstern.js',
            'ulid' => $ulid,


        ]);

    }

}
