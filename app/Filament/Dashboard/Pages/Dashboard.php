<?php

namespace App\Filament\Dashboard\Pages;

use Filament\Pages\Page;

use Filament\Pages\Dashboard as BaseDashboard;
use App\Filament\Dashboard\Widgets\ToolIntegrationWidget;

class Dashboard extends BaseDashboard
{
    public function getWidgets(): array
    {
        return [

            FixsternIntegrationWidget::class,
            \App\Filament\Widgets\PdfHashWidget::class,
        ];
    }
}
