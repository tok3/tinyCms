<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            if (!Schema::hasColumn('companies', 'type')) {
                $table->tinyInteger('type')->default(0)->after('extra_billing_information')->comment('0: Firma, 1: gemeinden/behoerden, 2: Vereine, 3: Verbaende');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('companies', function (Blueprint $table) {

                $table->dropColumn('type');

        });
    }
};
