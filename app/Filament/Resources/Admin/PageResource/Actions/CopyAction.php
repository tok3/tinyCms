<?php
namespace App\Filament\Resources\Admin\PageResource\Actions;

use Filament\Notifications\Notification;
use Filament\Tables\Actions\Action;
use Illuminate\Support\Str;

class CopyAction extends Action
{
    protected function setUp(): void
    {
        $this->label('Copy')
            ->icon('heroicon-m-document-duplicate')
            ->action(function ($record) {
                $newRecord = $record->replicate();
                // Passen Sie hier eindeutige Felder an

                $title = $newRecord->title;
                // Suche das erste Vorkommen von "( Copy"
                $position = strpos($title, "( Copy");

                // Wenn "( Copy" gefunden wurde, lösche alles danach
                if ($position !== false) {
                    $title = substr($title, 0, $position);
                }


                $newRecord->title = $title.' ( Copy '.date('Y-m-d H:i:s',time()).' )';
                $newRecord->slug =  Str::uuid(); // Beispiel: Slug zurücksetzen
                $newRecord->save();

                Notification::make()
                    ->title('Page successfully copied!')
                    ->icon('heroicon-o-check-circle')
                    ->iconColor('success')
                    ->send();

            });
    }
}

