<?php

namespace App\Filament\Dashboard\Widgets;

use Carbon\Carbon;
use Filament\Widgets\Widget;
use Filament\Facades\Filament;
use App\Models\Pa11yStatistic;
use App\Filament\Resources\Shared\Pa11yUrlResource;

class CalendarAppointmentWidget extends Widget
{
    protected static ?int $sort = -10;
    protected int|string|array $columnSpan = 1;
    protected static bool $isLazy = false;
    protected static string $view = 'filament.dashboard.widgets.calendar-appointment-widget';

    public function render(): \Illuminate\Contracts\View\View
    {
        $companyId = Filament::getTenant()->id;



        return view(static::$view, [
            '$companyId' => $companyId,

        ]);
    }


}
