<?php

namespace App\Filament\Resources\Shared\AccessibilityFeedbackResource\Pages;

use App\Filament\Resources\Shared\AccessibilityFeedbackResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAccessibilityFeedback extends EditRecord
{
    protected static string $resource = AccessibilityFeedbackResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
