<?php

namespace App\Filament\Resources\Shared\A11yDeclarationResource\Pages;

use App\Filament\Resources\Shared\A11yDeclarationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;


class EditA11yDeclaration extends EditRecord
{
    protected static string $resource = A11yDeclarationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }


    protected function afterSave(): void
    {
        // Record wurde gespeichert, Model-Hooks haben EZ-Texte generiert

        $state = $this->form->getState();

        if (isset($state['company_type']) && $this->record?->company) {
            $this->record->company->type = (int) $state['company_type'];
            $this->record->company->save();
        }

        // Jetzt Form-State mit frischen Daten füllen:
        $this->fillForm();

    }
}
