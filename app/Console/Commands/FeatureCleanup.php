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
        /*
        *
        * Cleanup by company: get all features of a company of undeleted contracts;
        * delete all remaining features from company_features
        *
        */
        $companies = Company::all();
        foreach($companies as $company){
            $featureIds = DB::table('contracts')
                ->join('product_feature', 'contracts.product_id', '=', 'product_feature.product_id')
                ->where('contracts.contractable_id', $company->id)
                ->where('contracts.deleted_at', null)
                ->pluck('product_feature.feature_id')
                ->unique()
                ->values()
                ->toArray();
            /* testing
                if($company->id == '108'){
                var_dump($featureIds); //die();
            }
                */
            // Delete unmatched features
            DB::table('company_feature')
                ->where('company_id', $company->id)
                ->whereNotIn('feature_id', $featureIds)
                ->delete();
        }

    }

}
