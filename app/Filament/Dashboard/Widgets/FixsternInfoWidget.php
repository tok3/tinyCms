<?php

namespace App\Filament\Dashboard\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Support\Facades\Auth;
use Filament\Facades\Filament;

class FixsternInfoWidget extends Widget
{
    protected static ?int $sort = -2;

    protected static bool $isLazy = false;


    /**
     * @var view-string
     */
    protected static string $view = 'filament.dashboard.widgets.fixstern-info-widget';


    public function render(): \Illuminate\Contracts\View\View
    {


        $code = 'httpf:futtode-zum-einbinden';
        $embedCode = '&lt;a href="' . $code . '"&gt;' . "<br>" . '
        &nbsp;&nbsp;&nbsp;&nbsp;&lt;img src="'.$code .'" alt="newsletter abonnieren"&gt;<br>
        &lt;/a&gt;';

        $ulid = Filament::getTenant()->ulid;

        return view(static::$view, [
            'fixsternLink'=>"service/".$ulid . '/fixstern.js',
            'embedCode' => $embedCode,
            'ulid' => $ulid,


        ]);

    }

}
