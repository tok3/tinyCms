<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Contract;
use App\Models\Product;
use App\Models\CompanyFeature;

class BackfillCompanyFeatures extends Command
{
    protected $signature   = 'company_features:backfill';
    protected $description = 'Backfill missing company_feature entries from product_feature via contracts';

    public function handle()
    {
        // 1) Fix: contract_id nachtragen, wo noch NULL
        $entries = \DB::table('company_feature')
            ->whereNull('contract_id')
            ->get();

        $fixed = 0;
        foreach ($entries as $entry) {
            $contract = \App\Models\Contract::where('contractable_type', \App\Models\Company::class)
                ->where('contractable_id', $entry->company_id)
                ->first();

            if (! $contract) {
                $this->warn("Kein Contract für company_feature ID {$entry->id} (company_id {$entry->company_id}). Übersprungen.");
                continue;
            }

            \DB::table('company_feature')
                ->where('id', $entry->id)
                ->update(['contract_id' => $contract->id]);

            $fixed++;
        }
        $this->info("✅ Gefixt: {$fixed}/".count($entries)." company_feature-Einträge mit fehlendem contract_id.");

        // 2) Backfill: Fehlende Features für jeden Contract anlegen
        $contracts = \App\Models\Contract::where('contractable_type', \App\Models\Company::class)->get();
        $created   = 0;

        foreach ($contracts as $contract) {
            $companyId = $contract->contractable_id;
            $productId = $contract->product_id;

            // Alle Features, die das Produkt hat
            $productFeatures = \App\Models\ProductFeature::where('product_id', $productId)->get();

            foreach ($productFeatures as $pf) {
                $exists = \DB::table('company_feature')
                    ->where('company_id', $companyId)
                    ->where('contract_id', $contract->id)
                    ->where('feature_id', $pf->feature_id)
                    ->exists();

                if (! $exists) {
                    \DB::table('company_feature')->insert([
                        'company_id'  => $companyId,
                        'contract_id' => $contract->id,
                        'feature_id'  => $pf->feature_id,
                        'value'       => $pf->value,
                        'created_at'  => now(),
                        'updated_at'  => now(),
                    ]);
                    $created++;
                }
            }
        }
        $this->info("✅ Angelegt: {$created} neue company_feature-Einträge basierend auf product_feature.");

        // 3) Soft-delete: Einträge für abgelaufene oder gelöschte Contracts
        $now = now()->toDateTimeString();

        $affected = \DB::table('company_feature')
            ->join('contracts', 'company_feature.contract_id', '=', 'contracts.id')
            ->where(function ($query) use ($now) {
                $query->whereNotNull('contracts.deleted_at')
                    ->orWhere('contracts.end_date', '<', $now);
            })
            ->whereNull('company_feature.deleted_at')
            ->update(['company_feature.deleted_at' => $now]);

        $this->info("✅ Soft-deleted {$affected} Feature-Einträge für abgelaufene oder gelöschte Contracts.");
    }
}
