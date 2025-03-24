<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Pa11yAccessibilityIssue;
use App\Models\Pa11yUrl;
use App\Models\Pa11yStatistic;

use Symfony\Component\HttpFoundation\StreamedResponse;


class PublishStatsController extends Controller
{
    public function exportIssuesCsv($id): StreamedResponse
    {

        $records = Pa11yAccessibilityIssue::where('url_id' , '=', $id)->get();
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
            fputcsv($handle, ['Fehler', 'Selector', 'Code', 'Type', 'Type code', 'Context', 'Standard', 'WCAG Level']);

            foreach($records as $record){
                fputcsv($handle, [
                    $record->issue,
                    $record->selector,
                    $record->code,
                    $record->type,
                    $record->typeCode,
                    $record->context,
                    $record->standard,
                    $record->wcag_level,

                ]);
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
            fputcsv($handle, ['Datum', 'Standard', 'Level', 'Errors', 'Warnings', 'Notices']);

            foreach($records as $record){
                fputcsv($handle, [
                    $record->scanned_at,
                    $record->standard,
                    $record->wcag_level,
                    $record->error_count,
                    $record->warning_count,
                    $record->notice_count,
                ]);
            }
            fclose($handle);
        };

        return response()->stream($callback, 200, $headers);
    }



}
