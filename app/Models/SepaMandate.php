<?php
// App\Models\SepaMandate.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SepaMandate extends Model
{
    protected $fillable = [
        'company_id',
        'mandate_reference',
        'account_holder',
        'iban',
        'bic',
        'bank_name',
        'is_default',
        'is_default',
        'is_active',
        'signature_date',
    ];

    protected $casts = [
        'is_default' => 'bool',
        'is_active' => 'bool',
        'signature_date' => 'date',
    ];
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    // optional: nur ein Default pro Company erzwingen
    protected static function booted(): void
    {
        static::saving(function (SepaMandate $mandate) {
            if ($mandate->is_default) {
                static::where('company_id', $mandate->company_id)
                    ->where('id', '!=', $mandate->id)
                    ->update(['is_default' => false]);
            }

            // Mandatsreferenz automatisch setzen, wenn leer
            if (empty($mandate->mandate_reference) && $mandate->company && $mandate->company->kd_nr) {
                $baseRef = $mandate->company->kd_nr;

                // Prüfen, ob die Basisnummer schon existiert
                $existingRefs = static::where('company_id', $mandate->company_id)
                    ->pluck('mandate_reference')
                    ->toArray();

                $newRef = $baseRef;
                $i = 2;
                while (in_array($newRef, $existingRefs)) {
                    $newRef = $baseRef . '-' . $i;
                    $i++;
                }

                $mandate->mandate_reference = $newRef;
            }
        });



        // Nach dem Speichern: wenn Default, automatisch Contracts zuordnen
        static::saved(function (SepaMandate $mandate) {
            if ($mandate->is_default) {
                // Bulk-Update aller wiederkehrenden Verträge der Firma
                Contract::bulkAssignSepaMandateForCompany($mandate->company_id, $mandate->id);
            }
        });

    }
}
