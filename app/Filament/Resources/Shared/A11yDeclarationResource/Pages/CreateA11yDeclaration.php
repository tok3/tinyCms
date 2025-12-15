<?php

namespace App\Filament\Resources\Shared\A11yDeclarationResource\Pages;

use App\Filament\Resources\Shared\A11yDeclarationResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateA11yDeclaration extends CreateRecord
{
    protected static string $resource = A11yDeclarationResource::class;

    protected function afterCreate(): void
    {
        $state = $this->form->getState();

        if (isset($state['company_type']) && $this->record?->company) {
            $this->record->company->type = (int) $state['company_type'];
            $this->record->company->save();
        }
    }
}
