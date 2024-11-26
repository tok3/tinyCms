<?php

namespace App\Filament\Dashboard\Widgets;

use Filament\Widgets\Widget;

class FixsternIntegrationWidget extends Widget
{
    protected int|string|array $columnSpan = 2;

    protected static string $view = 'filament.dashboard.widgets.fixstern-integration-widget';


    public function render(): \Illuminate\Contracts\View\View
    {

        $code = 'httpf:futtode-zum-einbinden';
        $embedCode = '&lt;a href="' . $code . '"&gt;' . "<br>" . '
        &nbsp;&nbsp;&nbsp;&nbsp;&lt;img src="'.$code .'" alt="newsletter abonnieren"&gt;<br>
        &lt;/a&gt;';

        return view(static::$view, [

            'embedCode' => $embedCode,

        ]);

    }

}
