<?php

namespace App\Filament\Dashboard\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Support\Facades\Auth;
use Filament\Facades\Filament;
use App\Models\Company;

class FixsternIntegrationWidget extends Widget
{
    protected int|string|array $columnSpan = 2;

    protected static string $view = 'filament.dashboard.widgets.fixstern-integration-widget';


    public function render(): \Illuminate\Contracts\View\View
    {


        $code = 'httpf:testcode-zum-einbinden';
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
