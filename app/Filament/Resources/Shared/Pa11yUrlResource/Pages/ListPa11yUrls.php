<?php

namespace App\Filament\Resources\Shared\Pa11yUrlResource\Pages;

use App\Filament\Resources\Shared\Pa11yUrlResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPa11yUrls extends ListRecords
{
    protected static string $resource = Pa11yUrlResource::class;

    public function getTitle(): string
    {
        return __('Firmament Urls'); // Angepasster Seitentitel
    }
//    public  function getBreadcrumb(): string
//    {
//        return 'Accessibility Issues'; // Neuer Name für die aktuelle Seite
//    }


    public function getBreadcrumbs(): array
    {
        return [
            // Überschreiben des ersten Breadcrumb-Elements
            Pa11yUrlResource::getUrl('index') => 'Zurück zur Übersicht',

            // Automatisch generiertes Breadcrumb für die aktuelle Seite
            static::getUrl() => static::getBreadcrumb(),
        ];
    }
  /*  function getBreadcrumbs(): array
    {
        return [
            // Link zur Index-Seite der Pa11yUrlResource
            Pa11yUrlResource::getUrl('index') => 'Firmament Urls / Übersicht',

            // Breadcrumb für die aktuelle Seite
            url()->current() => 'Firmament Urls / ',
        ];
    }*/
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }


}
