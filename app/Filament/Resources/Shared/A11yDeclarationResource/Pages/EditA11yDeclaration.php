<?php

namespace App\Filament\Resources\Shared\A11yDeclarationResource\Pages;

use App\Filament\Resources\Shared\A11yDeclarationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\HtmlString;


class EditA11yDeclaration extends EditRecord
{
    protected static string $resource = A11yDeclarationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    public function getHeading(): string|Htmlable
    {
        return new HtmlString(
            '<div class="flex items-center gap-3" style="margin-top:0.8em;width:50%;">'
            . file_get_contents(public_path('assets/icons/be.svg'))
            . '</div><div style="font-size:0.5em;font-weight:lighter;margin-top:-2.3em;margin-left:4.3em" class="text-gray-500">Die Barrierefreiheitserklärung</div>'
        );
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
