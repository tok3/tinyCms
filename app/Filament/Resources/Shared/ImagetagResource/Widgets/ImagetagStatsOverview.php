<?php

namespace App\Filament\Resources\Shared\ImagetagResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\OpenaiLog;

class ImagetagStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total images', OpenaiLog::count())
                ->description('Total amount of image-alt-tags generated')
                ->color('success'),
            Stat::make('Total cost', OpenaiLog::sum('estimated_cost_usd'))
                ->description('Estimated total cost in USD')
                ->color('warning'),
            Stat::make('Postproc', OpenaiLog::where('created_at', '<>', 'updated_at')->count())
                ->description('Total amount of image-alt-tags post processed')
                ->color('primary'),
        ];
    }


    public static function canView(): bool
    {
        if(auth()->user()->is_admin == 1){
            return true;
        }
        return false;

    }

}
