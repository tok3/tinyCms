<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->unsignedInteger('kd_nr')->nullable()->after('id')->unique();
        });

        // Bestehende Einträge aktualisieren: kd_nr = 30000 + id
        DB::table('companies')->update(['kd_nr' => DB::raw('30000 + id')]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->dropColumn('kd_nr');
        });
    }
};
