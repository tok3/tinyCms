<?php

namespace App\Enums;

enum FederalState: int
{
    case BADEN_WUERTTEMBERG = 1;
    case BAYERN = 2;
    case BERLIN = 3;
    case BRANDENBURG = 4;
    case BREMEN = 5;
    case HAMBURG = 6;
    case HESSEN = 7;
    case MECKLENBURG_VORPOMMERN = 8;
    case NIEDERSACHSEN = 9;
    case NORDRHEIN_WESTFALEN = 10;
    case RHEINLAND_PFALZ = 11;
    case SAARLAND = 12;
    case SACHSEN_ANHALT = 13;
    case SACHSEN = 14;
    case SCHLESWIG_HOLSTEIN = 15;
    case THUERINGEN = 16;

    public function label(): string
    {
        return match($this) {
            self::BADEN_WUERTTEMBERG => 'Baden-Württemberg',
            self::BAYERN => 'Bayern',
            self::BERLIN => 'Berlin',
            self::BRANDENBURG => 'Brandenburg',
            self::BREMEN => 'Bremen',
            self::HAMBURG => 'Hamburg',
            self::HESSEN => 'Hessen',
            self::MECKLENBURG_VORPOMMERN => 'Mecklenburg-Vorpommern',
            self::NIEDERSACHSEN => 'Niedersachsen',
            self::NORDRHEIN_WESTFALEN => 'Nordrhein-Westfalen',
            self::RHEINLAND_PFALZ => 'Rheinland-Pfalz',
            self::SAARLAND => 'Saarland',
            self::SACHSEN_ANHALT => 'Sachsen-Anhalt',
            self::SACHSEN => 'Sachsen',
            self::SCHLESWIG_HOLSTEIN => 'Schleswig-Holstein',
            self::THUERINGEN => 'Thüringen',
        };
    }

    public static function options(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn ($case) => [$case->value => $case->label()])
            ->toArray();
    }
}
