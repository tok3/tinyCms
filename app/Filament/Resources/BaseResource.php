<?php

namespace App\Filament\Resources;

use Filament\Facades\Filament;
use Filament\Resources\Resource;

abstract class BaseResource extends Resource
{
    public static function getNavigationSort(): ?int
    {
        $panel = Filament::getCurrentPanel()?->getId();

        return match ($panel) {
            'admin' => static::getAdminSortFromMap(),
            'dashboard' => static::getDashboardSortFromMap(),
            default => 999,
        };
    }

    protected static function getAdminSortFromMap(): int
    {
        return static::getSortMap('admin');
    }

    protected static function getDashboardSortFromMap(): int
    {
        return static::getSortMap('dashboard');
    }

    protected static function getSortMap(string $panel): int
    {
        $map = [

            // ADMIN PANEL SORTIERUNG
            'admin' => [
                'CompanyResource' => 10,
                'ContractResource' => 20,
                'InvoiceResource' => 30,
                'MolliePaymentResource' => 40,
                'MollieSubscriptionResource' => 50,
                'ProductResource' => 60,
                'PromotionResource' => 70,
                'UserResource' => 80,
                'ImagetagResource' => 90,   // altStar
                'EztextResource' => 100,    // Leichte Sprache
            ],

            // DASHBOARD PANEL SORTIERUNG
            'dashboard' => [
                'CompanyResource' => 10,
                'ContractResource' => 20,
                'InvoiceResource' => 30,
                'EztextResource' => 40,
                'ImagetagResource' => 50,

            ],
        ];

        $class = class_basename(static::class);

        return $map[$panel][$class] ?? 999;
    }
}
