<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("
            ALTER TABLE company_settings
            MODIFY default_standard
            ENUM('2.0', '2.1', '2.2')
            DEFAULT '2.1'
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("
            ALTER TABLE company_settings
            MODIFY default_standard
            ENUM('2.0', '2.1')
            DEFAULT '2.1'
        ");
    }
};
