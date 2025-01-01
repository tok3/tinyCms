<?php
namespace App\Filament\Resources\Shared\Pa11yUrlResource\Pages;

use App\Filament\Resources\Shared\Pa11yUrlResource;
use Filament\Resources\Pages\Page;
use App\Models\Pa11yUrl;
use Filament\Resources\Pages\ViewRecord;

class ViewPa11yUrl extends Page
{
    protected static string $resource = Pa11yUrlResource::class;

    protected static string $view = 'accessibility-results';

    public Pa11yUrl $url;

    public function mount($record)
    {
        $this->url = Pa11yUrl::with('accessibilityIssues')->findOrFail($record);
    }

    public function getData(): array
    {

        return [
            'url' => $this->url,
        ];
    }

    public function getColumnSpan(): int
    {
        return 2; // Gibt die Anzahl der Spalten zurück, die das Widget einnehmen soll
    }

    // Diese Methode gibt den Startwert für die Spalte an
    public function getColumnStart(): int
    {
        return 1; // Gibt die Spalte zurück, in der das Layout beginnen soll
    }
}
