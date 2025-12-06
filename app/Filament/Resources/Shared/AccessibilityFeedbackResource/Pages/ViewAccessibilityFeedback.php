<?php

namespace App\Filament\Resources\Shared\AccessibilityFeedbackResource\Pages;

use App\Filament\Resources\Shared\AccessibilityFeedbackResource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Actions;
use Filament\Notifications\Notification;
class ViewAccessibilityFeedback extends ViewRecord
{
    protected static string $resource = AccessibilityFeedbackResource::class;


    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('mark_read')
                ->label('Als gelesen markieren')
                ->color('success')
                ->visible(fn () => ! $this->record->is_read)
                ->action(function () {
                    $this->record->update(['is_read' => true]);
                    Notification::make()
                        ->title('Nachricht als gelesen markiert')
                        ->success()
                        ->send();
                }),
        ];
    }

}
