<?php

namespace App\Filament\Resources\Shared\Pa11yAccessibilityIssueResource\Pages;

use App\Filament\Resources\Shared\Pa11yAccessibilityIssueResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPa11yAccessibilityIssues extends ListRecords
{
    protected static string $resource = Pa11yAccessibilityIssueResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
