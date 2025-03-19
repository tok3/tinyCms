<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Soft Deletes zu pa11y_statistics hinzufügen
        Schema::table('pa11y_statistics', function (Blueprint $table) {
            $table->softDeletes()->after('updated_at');
        });

        // Soft Deletes zu users hinzufügen
        Schema::table('users', function (Blueprint $table) {
            $table->softDeletes()->after('updated_at');
        });

        // Soft Deletes zu companies hinzufügen
        Schema::table('companies', function (Blueprint $table) {
            $table->softDeletes()->after('updated_at');
        });

        // Soft Deletes zu contracts hinzufügen
        Schema::table('contracts', function (Blueprint $table) {
            $table->softDeletes()->after('updated_at');
        });

        // Soft Deletes zu contracts hinzufügen
        Schema::table('pa11y_urls', function (Blueprint $table) {
            $table->softDeletes()->after('updated_at');
        });
    }

    public function down(): void
    {
        // Soft Deletes aus pa11y_statistics entfernen
        Schema::table('pa11y_statistics', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        // Soft Deletes aus users entfernen
        Schema::table('users', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        // Soft Deletes aus companies entfernen
        Schema::table('companies', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        // Soft Deletes aus contracts entfernen
        Schema::table('contracts', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        // Soft Deletes aus contracts entfernen
        Schema::table('pa11y_urls', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
