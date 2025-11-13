<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Pa11yAccessibilityIssue;
use App\Models\Pa11yUrl;
use App\Models\Pa11yStatistic;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response as Resp;
use App\Models\CompanySetting;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Response;
use App\Models\PdfExport;


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


        public function exportIssuesPdfSingle($id): Response

    //public function exportIssuesPdf($id)
    {
        $urlinfo = Pa11yUrl::findOrFail($id);


        $statrecord = Pa11yStatistic::where('url_id' , '=', $id)
        ->orderBy('standard', 'desc')
        ->orderBy('wcag_level', 'desc')
        ->orderBy('created_at', 'desc')
            ->first();

        $showContrastErrors = CompanySetting::where('company_id', $urlinfo->company_id)->firstOrFail();

        $query = Pa11yAccessibilityIssue::where('url_id', '=', $id)->with('accessibilityRule');


        if (!$showContrastErrors->contrast_errors) {
            $query->whereNotIn('code', ['color-contrast', 'color-contrast-enhanced']);
        }

        $records = $query->get()->map(function ($record) {
            foreach (['description_html', 'issue', 'selector', 'code', 'type', 'typeCode', 'context', 'standard', 'wcag_level', ] as $field) {
                if (isset($record->$field)) {
                    $value = (string) $record->$field;
                    if (!mb_check_encoding($value, 'UTF-8')) {
                        $value = iconv('UTF-8', 'UTF-8//IGNORE', $value);
                    }
                    $record->$field = $value;
                }
            }




            return $record;
        });



        $url = Pa11yUrl::findOrFail($id);
        $company = Company::findOrFail($url->company_id);

        $url->url = mb_check_encoding($url->url, 'UTF-8') ? $url->url : iconv('UTF-8', 'UTF-8//IGNORE', $url->url);
        $company->name = mb_check_encoding($company->name, 'UTF-8') ? $company->name : iconv('UTF-8', 'UTF-8//IGNORE', $company->name);


        $pdfExport = PdfExport::create([
            'url' => $url->url,
            'company_id' => $company->id,
        ]);

        // Get the ID of the saved record
        $exportId = $pdfExport->id;
        // Encode the ID to base62 +
        $encodedId = $this->base62Encode($exportId .''. now()->timestamp);
        //\Log::info($records); die();
        // Generate the PDF content


        $statrecord->scanned_at = date('d.m.Y H:i:s', strtotime($statrecord->scanned_at));

        $pdf = Pdf::loadView('pdf.legal', [
            'records' => $records,
            'url' => $url,
            'company' => $company,
            'exportDate' => now()->format('d.m.Y H:i:s'),
            'encodedId' => $encodedId,
            'statrecord' => $statrecord,
            /*'standard' . $statrecord->standard, // verhindert Konvertierung in Datum in Excel
            'wcag_level' => $statrecord->wcag_level,
            'error_count' =>$statrecord->error_count,
            'warning_count' => $statrecord->warning_count,
            'notice_count' => $statrecord->notice_count,
            */
        ])->setPaper('a4', 'landscape');

        // Get the PDF binary content
        $pdfContent = $pdf->output();
        //$pdf->render();
        // Calculate the hash of the PDF content
        $hash = hash('sha256', $pdfContent);

        // Update the database record with the encoded ID
        $pdfExport->update([
            'encoded_id' => $encodedId,
            'hash' => $hash,
        ]);

        // Return the PDF for download
        return $pdf->download("issues_export_{$id}.pdf");
    }

    public function exportIssuesPdf($id): Response

    //public function exportIssuesPdf($id)
    {
        $urlinfo = Pa11yUrl::findOrFail($id);


        $statrecord = Pa11yStatistic::where('url_id' , '=', $id)
        ->orderBy('standard', 'desc')
        ->orderBy('wcag_level', 'desc')
        ->orderBy('created_at', 'desc')
            ->first();

        $showContrastErrors = CompanySetting::where('company_id', $urlinfo->company_id)->firstOrFail();

        $standard = '2.1';

        if($showContrastErrors->contrast_errors == 1){
            $query =  Pa11yAccessibilityIssue::query()
                ->when($standard === '2.1', fn($query) => $query->with('accessibilityRule')) // Eager Loading nur für 2.1
                ->when($id, fn($query) => $query->where('url_id', $id))
                ->when($standard, fn($query) => $query->where('standard', $standard)) // Filter für den Standard
                //->when($standard === '2.0', fn($query) => $query->whereIn('wcag_level', $selectedLevels)) // Nur für 2.0 Level berücksichtigen
                //->when($type, fn($query) => $query->where('type', $type));
                ->get()
                ->groupBy('code');
        } else {
            $query = Pa11yAccessibilityIssue::query()
                ->where('code', '<>', 'color-contrast')
                ->where('code', '<>', 'color-contrast-enhanced')
                ->when($standard === '2.1', fn($query) => $query->with('accessibilityRule')) // Eager Loading nur für 2.1
                ->when($id, fn($query) => $query->where('url_id', $id))
                ->when($standard, fn($query) => $query->where('standard', $standard)) // Filter für den Standard
                //->when($standard === '2.0', fn($query) => $query->whereIn('wcag_level', $selectedLevels)) // Nur für 2.0 Level berücksichtigen
                //->when($type, fn($query) => $query->where('type', $type));
                //->when($code, fn($query) => $query->whereNotLike('code' , 'color-contrast'))
                ->get()
                ->groupBy('code');


        }


        // Stats for not showing contrast errors
        if($showContrastErrors->contrast_errors == 0){
            $err = 0;
            $warning = 0;
            $notice = 0;
            foreach ($query as $code => $issues){
                foreach ($issues as $issue){
                    if($issue->type == 'error'){
                        $err++;
                    }
                    if($issue->type == 'warning'){
                        $warning++;
                    }
                    if($issue->type == 'notice'){
                        $notice++;
                    }
                }
            }
            $statrecord->error_count = $err;
            $statrecord->warning_count = $warning;
            $statrecord->notice_count = $notice;
        }


        //\Log::info($query); die();
/*
        $records = $query->map(function ($issues, $code) {
            return [
                'code' => $code,
                'issue_count' => $issues->count(),
                'description' => $issues->issue, // Verwende den Mutator hier
                'issues' => $issues, // Alle Issues der Gruppe
            ];
        });
*/


        $url = Pa11yUrl::findOrFail($id);
        $company = Company::findOrFail($url->company_id);

        $url->url = mb_check_encoding($url->url, 'UTF-8') ? $url->url : iconv('UTF-8', 'UTF-8//IGNORE', $url->url);
        $company->name = mb_check_encoding($company->name, 'UTF-8') ? $company->name : iconv('UTF-8', 'UTF-8//IGNORE', $company->name);


        $pdfExport = PdfExport::create([
            'url' => $url->url,
            'company_id' => $company->id,
        ]);

        // Get the ID of the saved record
        $exportId = $pdfExport->id;
        // Encode the ID to base62 +
        $encodedId = $this->base62Encode($exportId .''. now()->timestamp);
        //\Log::info($records); die();
        // Generate the PDF content




        $statrecord->scanned_at = date('d.m.Y H:i:s', strtotime($statrecord->scanned_at));
        /*
        foreach($query as $code => $issues) {
            echo $code."<br/><br/>";
            echo count($issues)."<br/><br/>";
        }
        die();

        return view('pdf.legalgrouped', [
            'records' => $query,
            'url' => $url,
            'company' => $company,
            'exportDate' => now()->format('d.m.Y H:i:s'),
            'encodedId' => $encodedId,
            'statrecord' => $statrecord,
            // ggf. weitere Variablen wie Trial-Ends, etc.
        ]);
*/

        //\Log::info($query); die();
        $pdf = Pdf::loadView('pdf.legalgrouped', [
            'records' => $query,
            'url' => $url,
            'company' => $company,
            'exportDate' => now()->format('d.m.Y H:i:s'),
            'encodedId' => $encodedId,
            'statrecord' => $statrecord,
            'showContrastErrors' => $showContrastErrors->contrast_errors,
            /*'standard' . $statrecord->standard, // verhindert Konvertierung in Datum in Excel
            'wcag_level' => $statrecord->wcag_level,
            'error_count' =>$statrecord->error_count,
            'warning_count' => $statrecord->warning_count,
            'notice_count' => $statrecord->notice_count,
            */
        ])->setPaper('a4', 'landscape');

        // Get the PDF binary content
        $pdfContent = $pdf->output();
        //$pdf->render();
        // Calculate the hash of the PDF content
        $hash = hash('sha256', $pdfContent);

        // Update the database record with the encoded ID
        $pdfExport->update([
            'encoded_id' => $encodedId,
            'hash' => $hash,
        ]);

        // Return the PDF for download
        return $pdf->download("issues_export_{$id}.pdf");
    }

    /**
     * Encode a number to base62
     *
     * @param int $num
     * @return string
     */
    private function base62Encode(int $num): string
    {
        $chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $base = 62;
        $result = '';

        if ($num === 0) {
            return '0';
        }

        while ($num > 0) {
            $remainder = $num % $base;
            $result = $chars[$remainder] . $result;
            $num = (int)($num / $base);
        }

        return $result;
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

            return Resp::make($csvContent, 200, [
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



    public function exportAllIssuesGrouped($id): array
    {
        //always include contrast errors
        //$showContrastErrors = CompanySetting::where('company_id', $id)->first();
        $records = [];



        $urls = Pa11yUrl::where('company_id', '=', $id)->get();
        foreach($urls as $url){
            $issues = Pa11yAccessibilityIssue::where('url_id' , '=', $url->id)->where('type', 'warning')->groupBy('code')->get();
            foreach($issues as $issue){
                $records[] = [
                    //'url' => $url->url,
                    'issue' => $issue->issue,
                    'desc' => json_decode($issue->runnerExtras)->description,
                    //'selector' => $issue->selector,
                    'code' => $issue->code,
                    'type' => $issue->type,
                    'typeCode' => $issue->typeCode,

                    //'context' => $issue->context,
                    //'standard' => $issue->standard,
                    //'wcag_level' => $issue->wcag_level,
                ];
            }
        }

        $uniqueArray = collect($records)->unique()->values()->all();

        return $uniqueArray;
        //var_dump($uniqueArray); die();

    }

}
