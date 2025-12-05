<?php

namespace App\Filament\Resources\Shared\AccessibilityFeedbackResource\Pages;

use App\Filament\Resources\Shared\AccessibilityFeedbackResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAccessibilityFeedback extends ListRecords
{
    protected static string $resource = AccessibilityFeedbackResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
