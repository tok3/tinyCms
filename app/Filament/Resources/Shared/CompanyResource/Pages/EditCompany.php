<?php

namespace App\Filament\Resources\Shared\CompanyResource\Pages;

use App\Filament\Resources\Shared\CompanyResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCompany extends EditRecord
{
    protected static string $resource = CompanyResource::class;

    public function getTitle(): string
    {
        return 'Firmendaten bearbeiten ';
    }
    protected function getHeaderActions(): array
    {
        if (auth()->user()->is_admin != 1)
        {

            return []; // no actions when user not is admin to prevent tenants from deleting itself

        }

        return [


            Actions\DeleteAction::make(),

            ];
    }
}
