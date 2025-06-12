<?php
// In CompanyHelper.php
namespace App\Helpers;

use App\Models\Company;

class CompanyHelper
{
    public static function currentCompany(): ?Company
    {
        $companyId = request()->segment(2);

        if (!$companyId || !is_numeric($companyId)) {
            return null;
        }

        return Company::find($companyId);
    }
}
