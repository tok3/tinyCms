<?php

namespace App\Filament\Dashboard\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Support\Facades\Auth;
use Filament\Facades\Filament;

class FixsternInfoWidget extends Widget
{
    protected static ?int $sort = -1;

    protected static bool $isLazy = false;


    /**
     * @var view-string
     */
    protected static string $view = 'filament.dashboard.widgets.fixstern-info-widget';


    public function render(): \Illuminate\Contracts\View\View
    {

        $ulid = Filament::getTenant()->ulid;

        return view(static::$view, [
            'fixsternLink'=>"service/".$ulid . '/fixstern.js',
            'ulid' => $ulid,


        ]);

    }

}
