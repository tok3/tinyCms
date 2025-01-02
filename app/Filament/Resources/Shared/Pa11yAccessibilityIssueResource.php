<?php
namespace App\Filament\Resources\Shared;

use App\Filament\Resources\Shared\Pa11yAccessibilityIssueResource\Pages;
use App\Models\Pa11yAccessibilityIssue;
use Filament\Resources\Resource;

class Pa11yAccessibilityIssueResource extends Resource
{
    protected static ?string $model = Pa11yAccessibilityIssue::class;

    public static function shouldRegisterNavigation(): bool
    {
        return false; // Navigation nicht registrieren
    }
    public static function getSlug(): string
    {
        return 'firmament-issues';
    }
    public static function getBreadcrumb(): string
    {
        return __('Firmament'); // Text im Breadcrumb
    }

    public static function getModelLabel(): string
    {
        return __('Firmament'); // Einzahl: z. B. "Issue"
    }

    public static function getPluralModelLabel(): string
    {
        return __('Firmament'); // Mehrzahl: z. B. "Issues"
    }
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPa11yAccessibilityIssues::route('/'),
        ];
    }
}
