<?php

namespace App\Filament\Dashboard\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Pa11yStatistic;
use Carbon\Carbon;
class Pa11yStatChart extends ChartWidget
{
    protected static ?string $heading = 'Firmament Scan Result Chart';


    protected function getData(): array
    {


        // Holen der Daten für die letzten 14 Tage
        $statistics = Pa11yStatistic::where('scanned_at', '>=', now()->subDays(14))
            ->select('scanned_at', 'error_count', 'warning_count', 'notice_count')
            ->orderBy('scanned_at')
            ->get();

        // Extrahieren der Labels und der Daten
        $labels = $statistics->pluck('scanned_at')->map(function ($date) {
            return Carbon::parse($date)->format('d.m.Y H:i:s');
        });

        $errors = $statistics->pluck('error_count');
        $warnings = $statistics->pluck('warning_count');
        $notices = $statistics->pluck('notice_count');

        // Rückgabe der Daten im gewünschten Format
        return [
            'labels' => $labels->toArray(), // Labels (Datum)
            'datasets' => [
                [
                    'label' => 'Errors',
                    'borderColor' => 'red',
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                    'fill' => false,
                    'data' => $errors->toArray(), // Fehlerdaten
                ],
                [
                    'label' => 'Warnings',
                    'borderColor' => 'orange',
                    'backgroundColor' => 'rgba(255, 159, 64, 0.2)',
                    'fill' => false,
                    'data' => $warnings->toArray(), // Warnungsdaten
                ],
                [
                    'label' => 'Notices',
                    'borderColor' => 'blue',
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                    'fill' => false,
                    'data' => $notices->toArray(), // Hinweisdaten
                ]
            ],
        ];



        return [
            'datasets' => [
                [
                    'label' => 'Errors',
                    'borderColor' => 'red',
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                    'fill' => 'false',
                    'data' => [
                        60,
                        58,
                        65,
                        62,
                        67,
                        72,
                        80,
                        85,
                        90,
                        110,
                        120,
                        115,
                        130,
                        6,
                        14,
                        38,
                        12,
                        126,
                        139,
                        25,
                        37,
                        55,
                        7,
                        7,
                        23,
                        5,
                        5,
                        22,
                        5,
                        9,
                        5,
                        20,
                        60,
                        1,
                        1,
                        18,
                        21,
                        33,
                        51
                    ],
                ],
                [
                    'label' => 'Warnings',
                    'borderColor' => 'orange',
                    'backgroundColor' => 'rgba(255, 159, 64, 0.2)',
                    'fill' => 'false',
                    'data' => [
                        55,
                        50,
                        55,
                        60,
                        63,
                        68,
                        75,
                        80,
                        85,
                        100,
                        110,
                        110,
                        120,
                        5,
                        26,
                        3,
                        46,
                        91,
                        176,
                        8,
                        30,
                        15,
                        12,
                        60,
                        45,
                        16,
                        45,
                        29,
                        14,
                        4,
                        41,
                        27,
                        50,
                        20,
                        49,
                        33,
                        12,
                        34,
                        19
                    ],
                ],
                [
                    'label' => 'Notices',
                    'borderColor' => 'blue',
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                    'fill' => 'false',
                    'data' => [
                        130,
                        120,
                        110,
                        100,
                        95,
                        90,
                        85,
                        80,
                        75,
                        70,
                        65,
                        60,
                        55,
                        49,
                        63,
                        78,
                        240,
                        260,
                        275,
                        88,
                        136,
                        152,
                        59,
                        73,
                        88,
                        60,
                        74,
                        89,
                        60,
                        64,
                        74,
                        89,
                        50,
                        60,
                        74,
                        89,
                        88,
                        136,
                        152
                    ],
                ]
            ],
            'labels' => [
                "2024-12-17 15:00:00",
                "2024-12-18 15:00:00",
                "2024-12-19 15:00:00",
                "2024-12-20 15:00:00",
                "2024-12-21 15:00:00",
                "2024-12-22 15:00:00",
                "2024-12-23 15:00:00",
                "2024-12-24 15:00:00",
                "2024-12-25 15:00:00",
                "2024-12-26 15:00:00",
                "2024-12-27 15:00:00",
                "2024-12-28 15:00:00",
                "2024-12-29 15:00:00",
                "2024-12-29 16:45:34",
                "2024-12-29 16:45:36",
                "2024-12-29 16:47:29",
                "2024-12-29 16:47:54",
                "2024-12-29 16:47:57",
                "2024-12-29 16:47:59",
                "2024-12-29 16:48:24",
                "2024-12-29 16:48:26",
                "2024-12-29 16:48:28",
                "2024-12-29 17:54:04",
                "2024-12-29 17:54:06",
                "2024-12-29 17:54:08",
                "2024-12-29 17:54:10",
                "2024-12-29 17:54:12",
                "2024-12-29 17:54:15",
                "2024-12-30 14:59:45",
                "2024-12-30 14:59:47",
                "2024-12-30 14:59:48",
                "2024-12-30 14:59:50",
                "2024-12-30 15:00:00",
                "2024-12-30 16:39:29",
                "2024-12-30 16:39:30",
                "2024-12-30 16:39:32",
                "2024-12-30 17:06:19",
                "2024-12-30 17:06:21",
                "2024-12-30 17:06:23"
            ],
        ];

    }

    protected function getType(): string
    {
        return 'line';
    }
}
