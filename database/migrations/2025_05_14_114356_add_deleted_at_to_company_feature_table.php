<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeletedAtToCompanyFeatureTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('company_feature', function (Blueprint $table) {
            $table->softDeletes(); // Adds a nullable deleted_at TIMESTAMP column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('company_feature', function (Blueprint $table) {
            $table->dropSoftDeletes(); // Drops the deleted_at column
        });
    }
}
