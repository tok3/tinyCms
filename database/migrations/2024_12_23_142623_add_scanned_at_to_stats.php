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
        Schema::table('pa11y_statistics', function (Blueprint $table) {
            $table->timestamp('scanned_at')->nullable()->after('notice_count'); // Zeitpunkt des Scans
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pa11y_statistics', function (Blueprint $table) {
            $table->dropColumn(['scanned_at']);
            //
        });
    }
};
