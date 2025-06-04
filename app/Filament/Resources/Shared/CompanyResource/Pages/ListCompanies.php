<?php

namespace App\Filament\Resources\Shared\CompanyResource\Pages;

use App\Filament\Resources\Shared\CompanyResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Facades\Filament;

class ListCompanies extends ListRecords
{
    protected static string $resource = CompanyResource::class;

    public function __construct(){

        if (\Auth::check() && \Auth::user()->is_admin != 1)
        {


         return $this->redirect('dashboard/'. \Request::segment(2).'/shared/companies/'.\Request::segment(2).'/edit');

            //return $this->redirect()->route('filament.dashboard.resources.companies.edit', ['record' => \Request::segment(2),'tenant' => \Auth::user()->companies[0]->id]);
        }
    }
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
