<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Company;
use Illuminate\Support\Facades\DB;
//use Carbon\Carbon;

class FeatureCleanup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:cleanup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Service um z.B. Features je nach Contract-Laufzeit rauszuwerfen';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Soft-delete company_feature entries, wenn der zugehörige Vertrag abgelaufen oder gelöscht ist
        $now = now();

        $affected = \DB::table('company_feature')
            ->join('contracts', 'company_feature.contract_id', '=', 'contracts.id')
            ->where(function ($query) use ($now) {
                $query->whereNotNull('contracts.deleted_at')
                    ->orWhere('contracts.end_date', '<', $now->toDateString());
            })
            ->whereNull('company_feature.deleted_at')
            ->update([
                'company_feature.deleted_at' => $now,
            ]);

        $this->info("Soft-gedeleted {$affected} Feature-Einträge für abgelaufene oder gelöschte Contracts.");


        // Re-activate Features für laufende Contracts
        $today = now()->toDateString();

        $restored = \DB::table('company_feature')
            ->join('contracts', 'company_feature.contract_id', '=', 'contracts.id')
            ->whereNull('contracts.deleted_at')              // Vertrag ist nicht soft-gelöscht
            ->where('contracts.end_date', '>=', $today)      // Laufzeit noch nicht abgelaufen
            ->whereNotNull('company_feature.deleted_at')     // Feature war soft-gelöscht
            ->update(['company_feature.deleted_at' => null]); // restore

        $this->info("Re-activated {$restored} Feature-Einträge für laufende Verträge.");


    }

}
