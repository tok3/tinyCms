<?php

namespace App\Helpers;

use App\Models\Company;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Filament\Facades\Filament;

class CompanyHelper
{
    public const SESSION_KEY = 'current_company_id';

    public static function setCurrentCompany(Company $company): void
    {
        if ($company?->id) {
            Session::put(self::SESSION_KEY, $company->id);
        }
    }

    public static function currentCompany(): ?Company
    {
        // 1) Tenant aus Filament (höchste Prio, wenn im Panel)
        try {
            if (app()->bound('filament')) {
                $tenant = Filament::getTenant();
                if ($tenant instanceof Company) {
                    self::setCurrentCompany($tenant);
                    return $tenant;
                }
            }
        } catch (\Throwable $e) {
            // ignore
        }

        // 2) Explizite Route-Parameter
        foreach (['company', 'company_id', 'tenant'] as $param) {
            $bound = Request::route($param);
            if ($bound) {
                $company = $bound instanceof Company ? $bound : Company::find($bound);
                if ($company) {
                    self::setCurrentCompany($company);
                    return $company;
                }
            }
        }

        // 3) ?company_id=123
        if ($id = Request::query('company_id')) {
            if ($company = Company::find($id)) {
                self::setCurrentCompany($company);
                return $company;
            }
        }

        // 4) Session
        if ($id = Session::get(self::SESSION_KEY)) {
            if ($company = Company::find($id)) {
                return $company;
            }
        }

        // 5) Fallback: erste Firma des Users (falls vorhanden)
        if (auth()->check()) {
            $company = auth()->user()->companies()->first();
            if ($company) {
                self::setCurrentCompany($company);
                return $company;
            }
        }

        return null;
    }

    public static function currentCompanyId(): ?int
    {
        return self::currentCompany()?->id;
    }

    /**
     * Gibt das *Mollie-Customer-ID String* der aktuellen Company zurück (oder null).
     * Falls du lieber das ganze Relation-Model willst, ändere den Rückgabetyp zu ?\App\Models\MollieCustomer
     */
    public static function currentCompanyMollieCustomerId(): ?string
    {
        $company = self::currentCompany();
        // Beziehung heißt vermutlich 'mollieCustomer' (hasOne). Sicherstellen, dass wir eine ID (string) liefern:
        return optional($company?->mollieCustomer)->mollie_customer_id;
    }
}
