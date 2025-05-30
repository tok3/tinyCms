<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddContractIdToCompanyFeaturesTable extends Migration
{
    public function up()
    {
        Schema::table('company_feature', function (Blueprint $table) {
            $table->unsignedBigInteger('contract_id')
                ->nullable()
                ->after('company_id')
                ->comment('Verknüpft Feature mit einem Contract');
        });

        // Jetzt alle bestehenden Rows updaten
        DB::statement(<<<'SQL'
UPDATE company_features AS cf
JOIN contracts AS c
  ON c.company_id = cf.company_id
SET cf.contract_id = c.id
WHERE cf.company_id IS NOT NULL;
SQL
        );
    }

    public function down()
    {
        Schema::table('company_feature', function (Blueprint $table) {
            $table->dropColumn('contract_id');
        });
    }
}
