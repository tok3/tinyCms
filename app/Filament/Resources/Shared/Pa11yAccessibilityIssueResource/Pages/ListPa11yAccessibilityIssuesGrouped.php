<?php

namespace App\Filament\Resources\Shared\Pa11yAccessibilityIssueResource\Pages;

use App\Filament\Resources\Shared\Pa11yAccessibilityIssueResource;
use App\Filament\Resources\Shared\Pa11yUrlResource;
use App\Models\Pa11yAccessibilityIssue;
use Filament\Resources\Pages\Page;
use App\Models\Pa11yUrl;

class ListPa11yAccessibilityIssuesGrouped extends Page
{
    protected static string $resource = Pa11yAccessibilityIssueResource::class;

    protected static string $view = 'filament.resources.pa11y-accessibility-issues.list-grouped';

    public function getTitle(): string
    {
        return __('Observer Ergebnisse'); // Angepasster Seitentitel
    }

    public  function getBreadcrumb(): string
    {
        return 'Accessibility Issues'; // Neuer Name für die aktuelle Seite
    }

     function getBreadcrumbs(): array
    {
        return [
            // Link zur Index-Seite der Pa11yUrlResource
            Pa11yUrlResource::getUrl('index') => 'Firmament Urls',

            // Breadcrumb für die aktuelle Seite
            url()->current() => 'Scan-Results',
        ];
    }


    private function prepareQuery()
    {
        $standard = $this->getStandard(); // Standard aus der Route abrufen
        $levelMap = ['1' => 'A', '2' => 'AA', '3' => 'AAA'];
        $selectedLevels = array_map(fn($level) => $levelMap[$level], str_split(request()->get('levels', '123')));

        $type = in_array(request('type'), ['error', 'warning', 'notice']) ? request('type') : null;

        return Pa11yAccessibilityIssue::query()
            ->when(request('url_id'), fn($query) => $query->where('url_id', request('url_id')))
            ->when($standard, fn($query) => $query->where('standard', $standard)) // Filter für den Standard
            ->when($standard === '2.0', fn($query) => $query->whereIn('wcag_level', $selectedLevels)) // Nur für 2.0 Level berücksichtigen
            ->when($type, fn($query) => $query->where('type', $type));
    }
    /**
     * Liefert die Basisabfrage mit Filterung nach `url_id`.
     */
    private function getBaseQuery()
    {
        return $this->prepareQuery();
    }


    /**
     * Holen der Datensätze für die Kartenanzeige.
     */
    public function getRecords()
    {
        $perPage = request('perPage', 30);
        return $this->prepareQuery()->paginate($perPage);
    }

    public function getGroupedRecords()
    {
        return $this->prepareQuery()
            ->get()
            ->groupBy('code'); // Gruppierung auf Anwendungsebene
    }

    public function getProcessedGroupedRecords()
    {
        $groupedRecords = $this->getGroupedRecords();

        return $groupedRecords->map(function ($issues, $code) {
            return [
                'code' => $code,
                'issue_count' => $issues->count(),
                'description' => $issues->issue, // Verwende den Mutator hier
                'issues' => $issues, // Alle Issues der Gruppe
            ];
        });
    }

    public function fetchUrl()
    {
        $url = Pa11yUrl::with('accessibilityIssues')->findOrFail(request('url_id'));

        // Zähle die verschiedenen Typen
        $url->error_count = $url->accessibilityIssues->where('type', 'error')->count();
        $url->warning_count = $url->accessibilityIssues->where('type', 'warning')->count();
        $url->notice_count = $url->accessibilityIssues->where('type', 'notice')->count();

        return $url;
    }

    public function fetchUrlWithCounts()
    {
        $url = Pa11yUrl::findOrFail(request('url_id'));
        $levelMap = ['1' => 'A', '2' => 'AA', '3' => 'AAA'];
        $selectedLevels = array_map(fn($level) => $levelMap[$level], str_split(request()->get('levels', '123')));

        $url->error_count = $url->accessibilityIssues()
            ->where('type', 'error')
            ->whereIn('wcag_level', $selectedLevels)
            ->where('standard', $this->getStandard()) // Filter nach Standard
            ->count();

        $url->warning_count = $url->accessibilityIssues()
            ->where('type', 'warning')
            ->whereIn('wcag_level', $selectedLevels)
            ->where('standard', $this->getStandard()) // Filter nach Standard
            ->count();

        $url->notice_count = $url->accessibilityIssues()
            ->where('type', 'notice')
            ->whereIn('wcag_level', $selectedLevels)
            ->where('standard', $this->getStandard()) // Filter nach Standard
            ->count();

        $url->all_count = $url->error_count + $url->warning_count + $url->notice_count;
        return $url;
    }

    protected function getStandard(): string
    {
        return request()->route('standard', '2.1'); // Standard ist 2.1
    }

    protected function getViewData(): array
    {
        return [
            'slugGrouped' => Pa11yAccessibilityIssueResource::getUrl('grouped'),
            'slugIndex' => Pa11yAccessibilityIssueResource::getUrl('index'),
        ];
    }
}
