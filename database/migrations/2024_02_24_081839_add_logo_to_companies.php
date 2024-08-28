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
            $table->string('logo_image')->nullable()->after('web'); // Pfad zum Logo-Bild
            $table->string('logo_orig_filename')->nullable()->after('logo_image'); // Ursprünglicher Dateiname des Logos
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->dropColumn(['logo_image', 'logo_orig_filename']);
        });
    }
};
