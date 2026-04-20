<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\A11yDeclaration;
use App\Models\Pa11yAccessibilityIssue;
use App\Models\Pa11yUrl;
use App\Enums\FederalState;
use App\Models\AccEnforcementAgency;

class A11yDeclarationController extends Controller
{
    /*
    CSV-Export aller Issues für eine Company (analog zum alten getAccessabilityDeclarationJson)
    */
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function getAccessabilityDeclarationJson(Request $request)
    {
        $company = Company::where('slug', $request->slug)->first();
        //\Log::info();
        $domain  = $request->domain; // TODO: später für mehrere Domains pro Company nutzbar machen

        if (! $company) {
            return response()->json([
                'status'  => 404,
                'message' => 'Company not found',
            ], 404);
        }

        if (! $company->hasFeature('barrierefreiheitserklaerung')) {
            return response()->json([
                'status'  => 404,
                'message' => 'Company has no accessibility declaration',
            ], 404);
        }

        // Sicherstellen, dass es eine veröffentlichte Erklärung gibt
        $declaration = A11yDeclaration::where('company_id', $company->id)->first();

        if (! $declaration || ! $declaration->published) {
            return response()->json([
                'status'  => 404,
                'message' => 'Accessibility declaration not found or not published',
            ], 404);
        }

        // Alle Issues pro URL einsammeln (CSV-Export)
        $records = [];
        $urls    = Pa11yUrl::where('company_id', '=', $company->id)->get();

        foreach ($urls as $url) {
            $issues = Pa11yAccessibilityIssue::where('url_id', '=', $url->id)->get();

            foreach ($issues as $issue) {
                $records[] = [
                    'url'        => $url->url,
                    'issue'      => $issue->issue,
                    'selector'   => $issue->selector,
                    'code'       => $issue->code,
                    'type'       => $issue->type,
                    'typeCode'   => $issue->typeCode,
                    'context'    => $issue->context,
                    'standard'   => $issue->standard,
                    'wcag_level' => $issue->wcag_level,
                ];
            }
        }

        $headers = [
            'Content-Type'        => 'text/csv',
            'Content-Disposition' => 'attachment; filename="all_issues_export.csv"',
        ];

        $callback = function () use ($records, $company) {
            $handle = fopen('php://output', 'w');

            $columns = 9;

            $title = ['CSV - Issues - Export für Firma ' . $company->name . ' vom ' . date('d.m.Y H:i:s')];
            for ($i = 1; $i < $columns; $i++) {
                $title[] = ''; // leere Spalten auffüllen
            }

            // Titelzeile schreiben
            fputcsv($handle, $title, ';');
            fputcsv($handle, ['URL', 'Fehler', 'Selector', 'Code', 'Type', 'Type code', 'Context', 'Standard', 'WCAG Level'], ';');

            foreach ($records as $record) {
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

    /**
     * Normale Erklärung (volltext), neue einheitliche View
     */
    public function showAccessibilityDeclaration(Request $request)
    {
        $company = Company::where('slug', $request->slug)->first();
        $domain  = $request->domain; // für später

        if (! $company) {
            abort(404);
        }

        if (! $company->hasFeature('barrierefreiheitserklaerung')) {
            abort(404);
        }

        $data = $this->getDeclarationData($company->id);

        if ($data['published'] === 0) {
            abort(404);
        }

        //$data = $this->getBoardData($company->id);

/*// Bundesland für die Ausgabe in Klartext bringen – wie früher
        if (! empty($data['declaration']->federal_state)) {
            $value = (int) $data['declaration']->federal_state;

            if ($enum = FederalState::tryFrom($value)) {
                // EXAKT wie der alte Code: das Feld selbst mit dem Label überschreiben
                $data['declaration']->federal_state = $enum->label();
            } else {
                // Falls irgendwas schief ist, Rohwert lassen
                $data['declaration']->federal_state = $data['declaration']->federal_state;
            }
        }*/


        $data = $this->getDeclarationData($company->id);

        $declaration = $data['declaration'];

        if ($declaration && $declaration->federal_state) {
            $stateId = (int) $declaration->federal_state;

            $declaration->federal_state_label =
                FederalState::tryFrom($stateId)?->label();
        }

        return view('accessibility.accessibility-declaration', $data);
    }

    /**
     * Erklärung in Leichter Sprache, neue einheitliche View
     */
    public function showAccessibilityDeclarationEz(Request $request)
    {
        $company = Company::where('slug', $request->slug)->first();
        $domain  = $request->domain; // für später

        if (! $company) {
            abort(404);
        }

        if (! $company->hasFeature('barrierefreiheitserklaerung')) {
            abort(404);
        }

        $data = $this->getDeclarationData($company->id);

        if ($data['published'] === 0) {
            abort(404);
        }

        if (! empty($data['declaration']->federal_state)) {
            try {
                $data['declaration']->federal_state_label = FederalState::from($data['declaration']->federal_state)->label();
            } catch (\Throwable $e) {
                $data['declaration']->federal_state_label = $data['declaration']->federal_state;
            }
        }

        return view('accessibility.accessibility-declaration-ez', $data);
    }

    /**
     * JSON-API für Fixstern / externe Nutzung (analog zum alten getAccessibilityDeclaration)
     */
    public function getAccessibilityDeclaration(Request $request)
    {


        //$company = Company::where('ulid', $request->ulid)->first();
        $company = Company::where('slug', $request->slug)->first();

        $domain  = $request->domain; // später für Multi-Domain

        if (! $company) {
            return response()->json([
                'error' => 'Company not found',
            ], 404);
        }

        if (! $company->hasFeature('barrierefreiheitserklaerung')) {
            return response()->json([
                'error' => 'Method not allowed',
            ], 403);
        }

        $data = $this->getDeclarationData($company->id);

        if ($data['published'] === 0) {
            return response()->json([
                'error' => 'Method not allowed',
            ], 403);
        }



        if($data['declaration']->federal_or_state_law === 0){
            $data['declaration']->federal_or_state_law_name = 'Bundesrecht';
        } else {
            $data['declaration']->federal_or_state_law_name = 'Landesrecht';
        }
        unset($data['declaration']->federal_or_state_law);
        if (! empty($data['declaration']->federal_state) && $data['declaration']->federal_state !== 0) {
            try {
                $stateId = (int) $data['declaration']->federal_state;
                $data['declaration']->federal_state_name = FederalState::tryFrom($stateId)?->label();
                unset($data['declaration']->federal_state);
            } catch (\Throwable $e) {
                //unset($data['declaration']->federal_state); (do nothing)
            }
        } else {
            unset($data['declaration']->federal_state);
        }
        if($data['declaration']->declaration_type === 0){
            unset($data['declaration']->federal_or_state_law);
            unset($data['declaration']->federal_state_name);
            unset($data['declaration']->federal_or_state_law_name);
        }

        //unset unwanted data:
        unset($data['company']->ulid);
        unset($data['company']->id);
        unset($data['company']->slug);
        unset($data['company']->kd_nr);
        unset($data['company']->leitweg_id);
        unset($data['company']->source);
        unset($data['company']->converted_at);
        unset($data['company']->is_agency);
        unset($data['company']->agency_discount_percent);
        unset($data['company']->agency_company_id);
        unset($data['company']->billing_via_agency);
        unset($data['company']->billing_email_override);
        unset($data['company']->vat_id);
        unset($data['company']->logo_image);
        unset($data['company']->logo_orig_filename);
        unset($data['company']->extra_billing_information);
        unset($data['company']->created_at);
        unset($data['company']->updated_at);
        unset($data['company']->deleted_at);
        unset($data['company']->type);
        unset($data['declaration']->id);
        unset($data['declaration']->company_id);
        unset($data['declaration']->declaration_type);
        unset($data['declaration']->status);
        unset($data['declaration']->category);

        return response()->json($data);
    }




    /**
     * Gemeinsame Datenbeschaffung für alle Varianten (statt getCompanyData / getBoardData)
     *
     * @param int $company_id
     * @return array
     */
    private function getDeclarationData(int $company_id): array
    {
        $company     = Company::find($company_id);
        $declaration = A11yDeclaration::where('company_id', $company_id)->first();

        if (! $company || ! $declaration) {
            return [
                'company'     => $company,
                'declaration' => $declaration,
                'issues'      => [],
                'published'   => 0,
            ];
        }

        $issues = $this->exportAllIssuesGrouped($company_id);
        if($declaration->acc_enforcement_agencies){
            $agencyData = AccEnforcementAgency::find($declaration->acc_enforcement_agencies);
            $declaration->acc_enforcement_name = $agencyData->name;
            $declaration->acc_enforcement_email = $agencyData->email;
            $declaration->acc_enforcement_link = $agencyData->link;
        }
        //$declaration->acc_enforcement_data = AccEnforcementAgency::find($declaration->acc_enforcement_agencies);
        return [
            'company'     => $company,
            'declaration' => $declaration,
            'issues'      => $issues,
            'published'   => (int) $declaration->published,
        ];
    }

    /**
     * Gruppierte Issues (wie im alten exportAllIssuesGrouped)
     *
     * @param int $id
     * @return array
     */
    public function exportAllIssuesGrouped(int $companyId): array
    {
        $urlIds = Pa11yUrl::where('company_id', $companyId)->pluck('id');

        $issues = Pa11yAccessibilityIssue::query()
            ->whereIn('url_id', $urlIds)
            ->whereNotNull('runnerExtras')
            ->where('runnerExtras', '!=', '[]')
            ->selectRaw('code, issue, runnerExtras, type, typeCode, COUNT(*) as issue_count')
            ->groupBy('code', 'issue', 'runnerExtras', 'type', 'typeCode')
            ->with(['accessibilityRule']) // wichtig, sonst N+1
            ->get();

        $records = [];

        foreach ($issues as $issue) {
            $rule = $issue->accessibilityRule;

            $records[] = [
                'issue'                  => $issue->issue,
                'desc'                   => data_get(json_decode($issue->runnerExtras, true), 'description'),
                'code'                   => $issue->code,
                'rule[merged_html]'      => $rule?->merged_html,
                'rule[standards_badges]' => $rule?->standards_badges,
                'rule[standard_logos]'   => $rule?->standards,
                'type'                   => $issue->type,
                'typeCode'               => $issue->typeCode,
                'count'                  => (int) $issue->issue_count,
                'translated'             => $issue->translated_message,
            ];
        }

        return collect($records)->unique()->values()->all();
    }
}
