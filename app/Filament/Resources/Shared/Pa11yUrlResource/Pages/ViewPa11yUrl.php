<?php
namespace App\Filament\Resources\Shared\Pa11yUrlResource\Pages;

use App\Filament\Resources\Shared\Pa11yUrlResource;
use Filament\Resources\Pages\Page;
use App\Models\Pa11yUrl;

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
}
