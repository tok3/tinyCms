<?php
namespace App\Filament\Resources\Shared\UserResource\Pages;

use App\Filament\Resources\Shared\UserResource;
use Filament\Resources\Pages\EditRecord;
use Filament\Pages\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\URL;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getActions(): array
    {
        return [
            Action::make('impersonate')
                ->label('Als Kunde anmelden')
                ->url(fn () => URL::temporarySignedRoute(
                        'impersonation.start',
                        now()->addMinute(),
                        ['user' => $this->record],
                        false,
                    ))
                ->icon('heroicon-o-arrow-right-on-rectangle')
                ->color('warning')
                ->visible(fn () => auth()->user()?->isAdmin()
                    && ! $this->record->isAdmin()
                    && ! $this->record->is(auth()->user())
                    && $this->record->companies()->exists()),
            Action::make('resendVerification')
                ->label(fn () => $this->record->hasVerifiedEmail()
                    ? 'Verifikationslink erneut senden'
                    : 'Verifikationslink senden') // Dynamische Beschriftung
                ->action(function () {
                    $user = $this->record;

                    // Setze die Verifizierung zurück, falls bereits verifiziert
                    if ($user->hasVerifiedEmail()) {
                        $user->email_verified_at = null;
                        $user->save();
                    }

                    // Sende den Verifikationslink
                    $user->sendEmailVerificationNotification();

                    Notification::make()
                        ->title('Erfolg')
                        ->body('Der Verifikationslink wurde erfolgreich gesendet.')
                        ->success()
                        ->send();
                })
                ->requiresConfirmation()
                ->icon('heroicon-o-envelope'),
        ];
    }
}
