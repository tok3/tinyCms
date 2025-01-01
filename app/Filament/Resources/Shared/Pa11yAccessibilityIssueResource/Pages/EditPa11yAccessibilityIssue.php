<?php

namespace App\Filament\Resources\Shared\Pa11yAccessibilityIssueResource\Pages;

use App\Filament\Resources\Shared\Pa11yAccessibilityIssueResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPa11yAccessibilityIssue extends EditRecord
{
    protected static string $resource = Pa11yAccessibilityIssueResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
