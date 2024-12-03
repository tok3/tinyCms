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
        Schema::table('companies', function (Blueprint $table) {
            // Schritt 1: Spalte ohne Unique-Constraint hinzufügen
            $table->ulid('ulid')->nullable()->after('id');
        });

        // Schritt 2: Bestehende Datensätze mit ULIDs aktualisieren
        DB::statement('UPDATE companies SET ulid = LEFT(UUID(), 26) WHERE ulid IS NULL');

        Schema::table('companies', function (Blueprint $table) {
            // Schritt 3: Unique-Constraint setzen
            $table->unique('ulid');
            $table->index('ulid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            // Unique-Constraint entfernen
            $table->dropUnique(['ulid']);
            $table->dropIndex(['ulid']);
            $table->dropColumn('ulid');
        });
    }
};
