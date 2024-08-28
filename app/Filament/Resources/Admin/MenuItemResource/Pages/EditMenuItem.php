<?php

namespace App\Filament\Resources\Admin\MenuItemResource\Pages;

use App\Filament\Resources\Admin\MenuItemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Livewire\Attributes\On;

class EditMenuItem extends EditRecord
{
    protected static string $resource = MenuItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];

    }

    #[On('refreshMenuItems')]
    public function refresh(): void
    {

    }
}
