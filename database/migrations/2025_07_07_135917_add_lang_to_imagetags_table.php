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
        Schema::table('imagetags', function (Blueprint $table) {
            $table->char('lang', 2)
                  ->default('de')
                  ->after('description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('imagetags', function (Blueprint $table) {
            $table->dropColumn('lang');
        });
    }
};
