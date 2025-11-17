<?php

namespace App\Filament\Resources\Shared\AccCompDeclarationResource\Pages;

use App\Filament\Resources\Shared\AccCompDeclarationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Facades\Filament;

class ListAccCompDeclarations extends ListRecords
{
    protected static string $resource = AccCompDeclarationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }


     public function mount(): void
    {
        parent::mount();

        if($tenant = Filament::getTenant()){


            // Optional: if user already has one, jump straight to edit
            if ($record = \App\Models\AccDeclaration::where('company_id', $tenant->id)->first()) {
                $this->redirect(\App\Filament\Resources\Shared\AccDeclarationResource::getUrl('edit', ['record' => $record]));
            }
        }
    }
}
