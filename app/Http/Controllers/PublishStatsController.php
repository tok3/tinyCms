<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Pa11yAccessibilityIssue;
use App\Models\Pa11yUrl;
use App\Models\Pa11yStatistic;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use App\Models\CompanySetting;


class PublishStatsController extends Controller
{
    public function exportIssuesCsv($id): StreamedResponse
    {

        $urlinfo = Pa11yUrl::where('id', $id)->first();
        $showContrastErrors = CompanySetting::where('company_id', $urlinfo->company_id)->first();
        $records = collect();
        if($showContrastErrors->contrast_errors == 1){
            $records = Pa11yAccessibilityIssue::where('url_id' , '=', $id)->get();
        } else {
            $records = Pa11yAccessibilityIssue::where('url_id' , '=', $id)
                ->where('code', '<>', 'color-contrast')
                ->where('code', '<>', 'color-contrast-enhanced')
                ->get();
        }

        $url = Pa11yUrl::where('id', '=', $id)->first();
        $company = Company::where('id', '=', $url->company_id)->first();

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="issues_export.csv"',
        ];

        $callback = function () use ($records, $url, $company) {
            $handle = fopen('php://output', 'w');

            $columns = 8;


            $title = ['CSV - Issues - Export für '.$url->url.' Firma '.$company->name.' vom '.date('d.m.Y H:i:s')];
            for ($i = 1; $i < $columns; $i++) {
                $title[] = ''; // empty columns
            }

            // Write the "merged" title row
            fputcsv($handle, $title);
            fputcsv($handle, ['Fehler', 'Selector', 'Code', 'Type', 'Type code', 'Context', 'Standard', 'WCAG Level'],';');

            foreach($records as $record){
                fputcsv($handle, [
                    $record->issue,
                    $record->selector,
                    $record->code,
                    $record->type,
                    $record->typeCode,
                    $record->context,
                    '="' . $record->standard . '"',  // verhindert Konvertierung in Datum in Excel
                    $record->wcag_level,

                ],';');
            }
            fclose($handle);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function exportStatsCsv($id): StreamedResponse
    {

        $records = Pa11yStatistic::where('url_id' , '=', $id)
        ->orderBy('standard', 'asc')
        ->orderBy('wcag_level', 'asc')
        ->orderBy('created_at', 'asc')
            ->get();
        $url = Pa11yUrl::where('id', '=', $id)->first();
        $company = Company::where('id', '=', $url->company_id)->first();

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="stats_export.csv"',
        ];

        $callback = function () use ($records, $url, $company) {
            $handle = fopen('php://output', 'w');

            $columns = 6;


            $title = ['CSV - Statistik - Export für '.$url->url.' Firma '.$company->name.' vom '.date('d.m.Y H:i:s')];
            for ($i = 1; $i < $columns; $i++) {
                $title[] = ''; // empty columns
            }

            // Write the "merged" title row
            fputcsv($handle, $title);
            fputcsv($handle, ['Datum', 'Standard', 'Level', 'Errors', 'Warnings', 'Notices'],';');

            foreach($records as $record){
                fputcsv($handle, [
                    $record->scanned_at,
                    '="' . $record->standard . '"',  // verhindert Konvertierung in Datum in Excel
                    $record->wcag_level,
                    $record->error_count,
                    $record->warning_count,
                    $record->notice_count,
                ], ';');
            }
            fclose($handle);
        };

        return response()->stream($callback, 200, $headers);
    }

    /*
    *
    * Data point for every scandate of any url ; for each scandate nearest results in the past are summed up
    *
    */
    public function exportAllStatsCsv($id)
    {

        $dates = Pa11yStatistic::select('scanned_at')
            ->where('company_id', $id)
            ->where('deleted_at', null)
            ->distinct()
            ->orderBy('scanned_at','asc')
            ->pluck('scanned_at');
            $dates->push(date('Y-m-d H:i:s'));

        $file = fopen('php://temp', 'w+');
        //csv - header
        fputcsv($file, ['date', 'total_error_count', 'total_warning_count', 'total_notice_count'],';');
        foreach($dates as $date){


            $latestIssues = DB::select("
            SELECT t1.*
            FROM pa11y_statistics t1
            JOIN (
                SELECT url_id,
                    MIN(ABS(TIMESTAMPDIFF(SECOND, scanned_at, ?))) AS closest_diff
                FROM pa11y_statistics
                where company_id = ?
                and scanned_at <= ?
                GROUP BY url_id
            ) t2 ON t2.url_id = t1.url_id
                AND ABS(TIMESTAMPDIFF(SECOND, t1.scanned_at, ?)) = t2.closest_diff
                and scanned_at <= ?
            ", [$date, $id, $date, $date, $date]);
                $totalErrors = 0;
                $totalWarnings = 0;
                $totalNotices = 0;
                $test = 0;
                foreach($latestIssues as $issues){
                    $totalErrors += $issues->error_count;
                    $totalWarnings += $issues->warning_count;
                    $totalNotices += $issues->notice_count;
                   /*
                   //TEST
                    if($date == '2025-03-04 11:02:06'){
                        var_dump($issues);
                        $test += $issues->error_count;
                        var_dump($test);
                    }
                        */
                }

                fputcsv($file, [
                    $date,
                    $totalErrors,
                    $totalWarnings,
                    $totalNotices,
                ],';');
            }
            rewind($file);
            $csvContent = stream_get_contents($file);
            fclose($file);

            // Return CSV response

            return Response::make($csvContent, 200, [
                'Content-Type' => 'text/csv',
                'Content-Disposition' => 'attachment; filename="all_stats_export.csv"',
            ]);

    }

    public function exportAllIssuesCsv($id): StreamedResponse
    {

        $company = Company::where('id', '=', $id)->first();
        $urls = Pa11yUrl::where('company_id', '=', $id)->get();
        $showContrastErrors = CompanySetting::where('company_id', $id)->first();

        $records = [];

        if($showContrastErrors->contrast_errors == 1){

            foreach($urls as $url){
                $issues = Pa11yAccessibilityIssue::where('url_id' , '=', $url->id)->get();
                foreach($issues as $issue){
                    $records[] = [
                        'url' => $url->url,
                        'issue' => $issue->issue,
                        'selector' => $issue->selector,
                        'code' => $issue->code,
                        'type' => $issue->type,
                        'typeCode' => $issue->typeCode,
                        'context' => $issue->context,
                        'standard' => $issue->standard,
                        'wcag_level' => $issue->wcag_level,
                    ];
                }
            }
        } else {

            foreach($urls as $url){
                $issues = Pa11yAccessibilityIssue::where('url_id' , '=', $url->id)->where('code', '<>', 'color-contrast')->where('code', '<>', 'color-contrast-enhanced')->get();
                foreach($issues as $issue){
                    $records[] = [
                        'url' => $url->url,
                        'issue' => $issue->issue,
                        'selector' => $issue->selector,
                        'code' => $issue->code,
                        'type' => $issue->type,
                        'typeCode' => $issue->typeCode,
                        'context' => $issue->context,
                        'standard' => $issue->standard,
                        'wcag_level' => $issue->wcag_level,
                    ];
                }
            }
        }



        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="all_issues_export.csv"',
        ];

        $callback = function () use ($records, $company) {
            $handle = fopen('php://output', 'w');

            $columns = 9;


            $title = ['CSV - Issues - Export für  Firma '.$company->name.' vom '.date('d.m.Y H:i:s')];
            for ($i = 1; $i < $columns; $i++) {
                $title[] = ''; // empty columns
            }

            // Write the "merged" title row
            fputcsv($handle, $title);
            fputcsv($handle, ['URL', 'Fehler', 'Selector', 'Code', 'Type', 'Type code', 'Context', 'Standard', 'WCAG Level'],';');

            foreach($records as $record){
                fputcsv($handle, [
                    $record['url'],
                    $record['issue'],
                    $record['selector'],
                    $record['code'],
                    $record['type'],
                    $record['typeCode'],
                    $record['context'],
                    '="' .  $record['standard'] . '"',  // verhindert Konvertierung in Datum in Excel
                    $record['wcag_level'],
                ],';');
            }
            fclose($handle);
        };

        return response()->stream($callback, 200, $headers);
    }

}
