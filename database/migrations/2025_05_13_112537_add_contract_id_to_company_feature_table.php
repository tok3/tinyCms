<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddContractIdToCompanyFeatureTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('company_feature', function (Blueprint $table) {
            $table->unsignedBigInteger('contract_id')
                ->nullable()
                ->after('company_id');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('company_feature', function (Blueprint $table) {
            $table->dropColumn('contract_id');
        });
    }
}
