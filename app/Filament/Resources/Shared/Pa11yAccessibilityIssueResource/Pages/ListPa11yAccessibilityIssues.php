<?php

namespace App\Filament\Resources\Shared\Pa11yAccessibilityIssueResource\Pages;

use App\Filament\Resources\Shared\Pa11yAccessibilityIssueResource;
use App\Filament\Resources\Shared\Pa11yUrlResource;
use App\Models\Pa11yAccessibilityIssue;
use Filament\Resources\Pages\Page;
use App\Models\Pa11yUrl;
use App\Models\CompanySetting;
class ListPa11yAccessibilityIssues extends Page
{
    protected static string $resource = Pa11yAccessibilityIssueResource::class;

    protected static string $view = 'filament.resources.pa11y-accessibility-issues.list';


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
    /**
     * Liefert die Basisabfrage mit Filterung nach `url_id`.
     */
    private function getBaseQuery()
    {
        $standard = $this->getStandard(); // Aktuellen Standard bestimmen
        $levelMap = ['1' => 'A', '2' => 'AA', '3' => 'AAA'];
        $selectedLevels = str_split(request()->get('levels', '123'));
        $wcagLevels = array_map(fn($level) => $levelMap[$level], $selectedLevels);



        $urlinfo = Pa11yUrl::where('id', request('url_id'))->first();
        $showContrastErrors = CompanySetting::where('company_id', $urlinfo->company_id)->first();

        if($showContrastErrors->contrast_errors == 1){
            return Pa11yAccessibilityIssue::query()
                ->when(request('url_id'), fn($query) => $query->where('url_id', request('url_id')))
                ->when($standard === '2.0', fn($query) => $query->whereIn('wcag_level', $wcagLevels)) // Filter für 2.0
                ->when($standard === '2.1', fn($query) => $query->where('standard', '2.1')) // Filter für 2.1
                ->when(in_array(request('type'), ['error', 'warning', 'notice']), fn($query) => $query->where('type', request('type')));
        } else {
            return Pa11yAccessibilityIssue::query()
                ->where('code', '<>', 'color-contrast')
                ->where('code', '<>', 'color-contrast-enhanced')
                ->when(request('url_id'), fn($query) => $query->where('url_id', request('url_id')))
                ->when($standard === '2.0', fn($query) => $query->whereIn('wcag_level', $wcagLevels)) // Filter für 2.0
                ->when($standard === '2.1', fn($query) => $query->where('standard', '2.1')) // Filter für 2.1
                ->when(in_array(request('type'), ['error', 'warning', 'notice']), fn($query) => $query->where('type', request('type')));
        }
    }

    /**
     * Holen der Datensätze für die Kartenanzeige.
     */
    public function getRecords()
    {

        $perPage = request('perPage', 30); // Standard: 50 Einträge pro Seite
        if(request('perPage') == 'all'){
            $perPage = $this->getBaseQuery()->count();
        }

        return $this->getBaseQuery()->paginate($perPage);
    }


    public function fetchUrl()
    {
        $url = Pa11yUrl::with('accessibilityIssues')->findOrFail(request('url_id'));
        $urlinfo = Pa11yUrl::where('id', request('url_id'))->first();
        $showContrastErrors = CompanySetting::where('company_id', $urlinfo->company_id)->first();
        if($showContrastErrors->contrast_errors == 1){
            // Zähle die verschiedenen Typen
            $url->error_count = $url->accessibilityIssues->where('type', 'error')->count();
            $url->warning_count = $url->accessibilityIssues->where('type', 'warning')->count();
            $url->notice_count = $url->accessibilityIssues->where('type', 'notice')->count();
        } else {
            $url->error_count = $url->accessibilityIssues->where('type', 'error')->where('code', '<>', 'color-contrast')->where('code', '<>', 'color-contrast-enhanced')->count();
            $url->warning_count = $url->accessibilityIssues->where('type', 'warning')->where('code', '<>', 'color-contrast')->where('code', '<>', 'color-contrast-enhanced')->count();
            $url->notice_count = $url->accessibilityIssues->where('type', 'notice')->where('code', '<>', 'color-contrast')->where('code', '<>', 'color-contrast-enhanced')->count();
        }

        return $url;
    }

    public function fetchUrlWithCounts()
    {
        $url = Pa11yUrl::findOrFail(request('url_id'));
        $standard = $this->getStandard();
        $urlinfo = Pa11yUrl::where('id', request('url_id'))->first();
        $showContrastErrors = CompanySetting::where('company_id', $urlinfo->company_id)->first();

        if ($standard === '2.1') {


            if($showContrastErrors->contrast_errors == 1){
                // Zählung für 2.1
                $url->error_count = $url->accessibilityIssues()
                    ->where('type', 'error')
                    ->where('standard', '2.1')
                    ->count();

                    $url->warning_count = $url->accessibilityIssues()
                    ->where('type', 'warning')
                    ->where('standard', '2.1')
                    ->count();
            } else {
                // Zählung für 2.1
                $url->error_count = $url->accessibilityIssues()
                    ->where('type', 'error')
                    ->where('code', '<>', 'color-contrast')
                    ->where('code', '<>', 'color-contrast-enhanced')
                    ->where('standard', '2.1')
                    ->count();

                $url->warning_count = $url->accessibilityIssues()
                    ->where('type', 'warning')
                    ->where('code', '<>', 'color-contrast')
                    ->where('code', '<>', 'color-contrast-enhanced')
                    ->where('standard', '2.1')
                    ->count();
            }



            // Notices gibt es in 2.1 nicht
            $url->notice_count = 0;
        } else {
            // Zählung für 2.0 mit Level-Filter
            $levelMap = ['1' => 'A', '2' => 'AA', '3' => 'AAA'];
            $selectedLevels = array_map(fn($level) => $levelMap[$level], str_split(request()->get('levels', '123')));

            if($showContrastErrors->contrast_errors == 1){
                $url->error_count = $url->accessibilityIssues()
                    ->where('type', 'error')
                    ->where('standard', '2.0')
                    ->whereIn('wcag_level', $selectedLevels)
                    ->count();

                $url->warning_count = $url->accessibilityIssues()
                    ->where('type', 'warning')
                    ->where('standard', '2.0')
                    ->whereIn('wcag_level', $selectedLevels)
                    ->count();

                $url->notice_count = $url->accessibilityIssues()
                    ->where('type', 'notice')
                    ->where('standard', '2.0')
                    ->whereIn('wcag_level', $selectedLevels)
                    ->count();
            } else {
                $url->error_count = $url->accessibilityIssues()
                    ->where('type', 'error')
                    ->where('code', '<>', 'color-contrast')
                    ->where('code', '<>', 'color-contrast-enhanced')
                    ->where('standard', '2.0')
                    ->whereIn('wcag_level', $selectedLevels)
                    ->count();

                $url->warning_count = $url->accessibilityIssues()
                    ->where('type', 'warning')
                    ->where('code', '<>', 'color-contrast')
                    ->where('code', '<>', 'color-contrast-enhanced')
                    ->where('standard', '2.0')
                    ->whereIn('wcag_level', $selectedLevels)
                    ->count();

                $url->notice_count = $url->accessibilityIssues()
                    ->where('type', 'notice')
                    ->where('code', '<>', 'color-contrast')
                    ->where('code', '<>', 'color-contrast-enhanced')
                    ->where('standard', '2.0')
                    ->whereIn('wcag_level', $selectedLevels)
                    ->count();
            }
        }

        $url->all_count = $url->error_count + $url->warning_count + $url->notice_count;
        return $url;
    }

    protected function getViewData(): array
    {

        return [
            'slugGrouped' => Pa11yAccessibilityIssueResource::getUrl('grouped'),
            'slugIndex' => Pa11yAccessibilityIssueResource::getUrl('index'),
            'standard' => $this->getStandard(),
            'records' => $this->prepedRecords(),
        ];
    }

    protected function prepedRecords()
    {
        $records = $this->getRecords();




        /*if($this->getStandard() == '2.1')
        {
$axeExtra = json_decode($this->)
            die();

        }*/

return $records;
    }

    protected function getStandard(): string
    {
        return request()->route('standard', '2.1'); // Standard ist 2.1
    }

}
