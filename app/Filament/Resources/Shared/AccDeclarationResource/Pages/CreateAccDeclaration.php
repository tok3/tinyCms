<?php

namespace App\Filament\Resources\Shared\AccDeclarationResource\Pages;

use App\Filament\Resources\Shared\AccDeclarationResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Facades\Filament;

class CreateAccDeclaration extends CreateRecord
{
    protected static string $resource = AccDeclarationResource::class;

/*
    public function authorize(): bool
    {
        return auth()->user()?->can('create', \App\Models\AccDeclaration::class);
    }
*/
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $tenant = Filament::getTenant();
        $data['company_id'] = $tenant->id;
        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('edit', ['record' => $this->record]);
    }

}
