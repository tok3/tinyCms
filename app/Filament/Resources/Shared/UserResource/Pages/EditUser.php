<?php
namespace App\Filament\Resources\Shared\UserResource\Pages;

use App\Filament\Resources\Shared\UserResource;
use Filament\Resources\Pages\EditRecord;
use Filament\Pages\Actions\Action;
use Filament\Notifications\Notification;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getActions(): array
    {
        return [
            Action::make('resendVerification')
                ->label('Verifikationslink senden')
                ->action(function () {
                    $user = $this->record;

                    if ($user->hasVerifiedEmail()) {
                        Notification::make()
                            ->title('Warnung')
                            ->body('Dieser Benutzer hat seine E-Mail bereits verifiziert.')
                            ->warning()
                            ->send();

                        return;
                    }

                    $user->email_verified_at = null;
                    $user->save();

                    $user->sendEmailVerificationNotification();

                    Notification::make()
                        ->title('Erfolg')
                        ->body('Der Verifikationslink wurde erfolgreich gesendet.')
                        ->success()
                        ->send();
                })
                ->requiresConfirmation()
                ->icon('heroicon-o-envelope')
                ->visible(fn () => !$this->record->hasVerifiedEmail()),

        ];
    }
}
