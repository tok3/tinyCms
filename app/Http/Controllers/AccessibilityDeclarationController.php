<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\AccCompDeclaration;
use App\Models\AccDeclaration;
use App\Models\Pa11yAccessibilityIssue;
use App\Models\Pa11yUrl;
use Illuminate\Support\Str;


class AccessibilityDeclarationController extends Controller
{
    /*
    TODO ausfuellen fuer csv/json download
    */
    public function getAccessabilityDeclarationJson(Request $request)
    {

        $company = Company::where('slug', $request->slug)->first();
        $domain = $request->domain; //TODO for later use when more than one domain per company

        if (!$company)
        {
            return response()->json([
                'status' => 404,
                'message' => 'Company not found',
            ], 404);

        }
        if (!$company->hasFeature('barrierefreiheitserklaerung'))
        {
            return response()->json([
                'status' => 404,
                'message' => 'Company has no accessibility declaration',
            ], 404);

        }

        if ($company->type === 0)
        {
            $data = $this->getCompanyData($company->id);

        }
        else
        {
            $data = $this->getBoardData($company->id);
            $data['declaration']['federal_state'] = \App\Enums\FederalState::from($data['declaration']['federal_state'])->label();
        }


        foreach ($urls as $url)
        {
            $issues = Pa11yAccessibilityIssue::where('url_id', '=', $url->id)->get();
            foreach ($issues as $issue)
            {
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


        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="all_issues_export.csv"',
        ];

        $callback = function () use ($records, $company) {
            $handle = fopen('php://output', 'w');

            $columns = 9;


            $title = ['CSV - Issues - Export für  Firma ' . $company->name . ' vom ' . date('d.m.Y H:i:s')];
            for ($i = 1; $i < $columns; $i++)
            {
                $title[] = ''; // empty columns
            }

            // Write the "merged" title row
            fputcsv($handle, $title);
            fputcsv($handle, ['URL', 'Fehler', 'Selector', 'Code', 'Type', 'Type code', 'Context', 'Standard', 'WCAG Level'], ';');

            foreach ($records as $record)
            {
                fputcsv($handle, [
                    $record['url'],
                    $record['issue'],
                    $record['selector'],
                    $record['code'],
                    $record['type'],
                    $record['typeCode'],
                    $record['context'],
                    '="' . $record['standard'] . '"',  // verhindert Konvertierung in Datum in Excel
                    $record['wcag_level'],
                ], ';');
            }
            fclose($handle);
        };

        return response()->stream($callback, 200, $headers);

    }

    public function showAccessibilityDeclaration(Request $request)
    {

        $company = Company::where('slug', $request->slug)->first();

        $domain = $request->domain; //TODO for later use when more than one domain per company

        if (!$company)
        {
            abort(404);
        }
        if (!$company->hasFeature('barrierefreiheitserklaerung'))
        {
            abort(404);
        }

        if ($company->type === 0)
        {
            $data = $this->getCompanyData($company->id);
            \Log::info($company->id . " pub:" . $data['published']);
            if ($data['published'] === 0)
            {

                //$data = array('error' => 'Method not allowed');
                abort(404);
            }

            return view('accessibility-declaration-company', $data);
        }
        else
        {
            $data = $this->getBoardData($company->id);
            $data['declaration']['federal_state'] = \App\Enums\FederalState::from($data['declaration']['federal_state'])->label();
            if ($data['published'] === 0)
            {
                \Log::error('not published amt');
                abort(404);
            }

            return view('accessibility-declaration', $data);
        }
    }

    public function showAccessibilityDeclarationEz(Request $request)
    {
        $company = Company::where('slug', $request->slug)->first();
        $domain = $request->domain; //TODO for later use when more than one domain per company

        if (!$company)
        {
            abort(404);
        }
        if (!$company->hasFeature('barrierefreiheitserklaerung'))
        {
            abort(404);
        }

        if ($company->type === 0)
        {
            $data = $this->getCompanyData($company->id);

            if ($data['published'] === 0)
            {
                //$data = array('error' => 'Method not allowed');
                abort(404);
            }

            return view('accessibility-declaration-company-ez', $data);
        }
        else
        {
            $data = $this->getBoardData($company->id);
            $data['declaration']['federal_state'] = \App\Enums\FederalState::from($data['declaration']['federal_state'])->label();
            if ($data['published'] === 0)
            {
                abort(404);
            }

            return view('accessibility-declaration-ez', $data);
        }
    }

    /*    public function showAccessibilityDeclarationEz(Request $request)
        {
            $company = Company::where('slug', $request->slug)->first();
            $domain = $request->domain; //TODO for later use when more than one domain per company

            if (!$company) {
                abort(404);
            }
            if (!$company->hasFeature('barrierefreiheitserklaerung')) {
                abort(404);
            }
            if($company->type === 0){
                $data = $this->getCompanyData($company->id);
                if($data['published'] === 0){
                    //$data = array('error' => 'Method not allowed');
                    abort(404);
                }
                return view('accessibility-declaration-company-ez', $data);
            } else {
                $data = $this->getBoardData($company->id);
                $data['declaration']['federal_state'] = \App\Enums\FederalState::from($data['declaration']['federal_state'])->label();
                if($data['published'] === 0){
                    abort(404);
                }
                return view('accessibility-declaration-ez', $data);
            }
        }

    */
    public function getAccessibilityDeclaration(Request $request)
    {

        $company = Company::where('ulid', $request->ulid)->first();
        $domain = $request->domain; //TODO for later use when more than one domain per company

        if (!$company)
        {
            //abort(404);
            $data = array('error' => 'Company not found');

            return response()->json($data);
        }
        if (!$company->hasFeature('barrierefreiheitserklaerung'))
        {
            //abort(404);
            $data = array('error' => 'Method not allowed');

            return response()->json($data);
        }

        if ($company->type === 0)
        {
            $data = $this->getCompanyData($company->id);
            if ($data['published'] === 0)
            {
                $data = array('error' => 'Method not allowed');
            }

            //return view('accessibility-declaration-company', $data);
            return response()->json($data);

        }
        else
        {
            $data = $this->getBoardData($company->id);
            if ($data['published'] === 0)
            {
                $data = array('error' => 'Method not allowed');
            }

            //return view('accessibilityDeclaration', $data);
            return response()->json($data);
        }
    }


    private function getCompanyData($company_id)
    {
        $company = Company::find($company_id);
        $declaration = AccCompDeclaration::where('company_id', $company_id)->first();
        $issues = $this->exportAllIssuesGrouped($company_id);
        $data = [
            'company' => $company,
            'declaration' => $declaration,
            'issues' => $issues,
            'published' => $declaration->published,
        ];

        return $data;
    }


    private function getBoardData($company_id)
    {
        $company = Company::find($company_id);
        $declaration = AccDeclaration::where('company_id', $company_id)->first();
        $issues = $this->exportAllIssuesGrouped($company_id);
        $data = [
            'company' => $company,
            'declaration' => $declaration,
            'issues' => $issues,
            'published' => $declaration->published,
        ];

        return $data;
    }


    public function exportAllIssuesGrouped($id): array
    {
        //always include contrast errors
        //$showContrastErrors = CompanySetting::where('company_id', $id)->first();
        $records = [];
        $urls = Pa11yUrl::where('company_id', '=', $id)->get();
        foreach ($urls as $url)
        {
            //$issues = Pa11yAccessibilityIssue::where('url_id' , '=', $url->id)->where('type', 'warning')->groupBy('code')->get();
            //$issues = Pa11yAccessibilityIssue::where('url_id' , '=', $url->id)->groupBy('code')->get();
            $issues = Pa11yAccessibilityIssue::where('url_id', '=', $url->id)
                ->groupBy('code')
                ->selectRaw('code, issue, runnerExtras, type, typeCode, COUNT(*) as issue_count')
                ->get();
            foreach ($issues as $issue)
            {
                if (isset($issue->runnerExtras) && $issue->runnerExtras != '[]')
                {

                    $records[] = [
                        //'url' => $url->url,
                        'issue' => $issue->issue,
                        'desc' => json_decode($issue->runnerExtras)->description,
                        //'selector' => $issue->selector,
                        'code' => $issue->code,
                        'rule[merged_html]' => $issue->accessibilityRule->merged_html,
                        'rule[standards_badges]' => $issue->accessibilityRule->standards_badges,
                        'rule[standard_logos]' => $issue->accessibilityRule->standards,
                        'type' => $issue->type,
                        'typeCode' => $issue->typeCode,
                        'count' => $issue->issue_count, // Add the count to the records array
                        'translated' => $issue->translated_message,
                        //'context' => $issue->context,
                        //'standard' => $issue->standard,
                        //'wcag_level' => $issue->wcag_level,
                    ];

                }

            }
        }

        $uniqueArray = collect($records)->unique()->values()->all();

        //var_dump($uniqueArray); die();
        return $uniqueArray;

    }


}
