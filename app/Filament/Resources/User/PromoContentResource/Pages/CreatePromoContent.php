<?php

namespace App\Filament\Resources\User\PromoContentResource\Pages;

use App\Filament\Resources\User\PromoContentResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePromoContent extends CreateRecord
{
    protected static string $resource = PromoContentResource::class;
    protected static bool $canCreateAnother = true;
}
