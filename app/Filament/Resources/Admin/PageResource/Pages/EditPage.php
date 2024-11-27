<?php

namespace App\Filament\Resources\Admin\PageResource\Pages;

use App\Filament\Resources\Admin\PageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPage extends EditRecord
{
    protected static string $resource = PageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }


    public function getTitle(): string
    {
        return 'Produkt';
    }
}
