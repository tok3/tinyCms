<?php

namespace App\Helpers;

use App\Models\Company;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class CompanyHelper
{
    public const SESSION_KEY = 'current_company_id';

    public static function currentCompany(): ?Company
    {
        // 1) Filament-Tenant (Panel-Kontext)
        try {
            if (function_exists('filament')) {
                $tenant = filament()->getTenant();
                if ($tenant instanceof Company) {
                    // Session immer aktualisieren, wenn Tenant da ist
                    Session::put(self::SESSION_KEY, $tenant->id);
                    return $tenant;
                }
            }
        } catch (\Throwable $e) {
            // nichts – wir fallen auf Route/Query/Session zurück
        }

        // 2) Route-Params bevorzugen (sauberste Quelle außerhalb des Panels)
        foreach (['company', 'company_id', 'tenant'] as $param) {
            $bound = Request::route($param);
            if ($bound) {
                $company = $bound instanceof Company ? $bound : Company::find($bound);
                if ($company) {
                    Session::put(self::SESSION_KEY, $company->id);
                    return $company;
                }
            }
        }

        // 3) Query-Param als Alternative (?company_id=123)
        if ($id = Request::query('company_id')) {
            if ($company = Company::find($id)) {
                Session::put(self::SESSION_KEY, $company->id);
                return $company;
            }
        }

        // 4) Session-Fallback (kommt z. B. aus Panel-Wechsel)
        if ($id = Session::get(self::SESSION_KEY)) {
            return Company::find($id);
        }

        // 5) Optionaler Notnagel (wenn du willst, sonst null zurückgeben)
        // return auth()->user()?->companies()->first();

        return null;
    }

    public static function currentCompanyId(): ?int
    {
        return optional(self::currentCompany())->id;
    }
}
