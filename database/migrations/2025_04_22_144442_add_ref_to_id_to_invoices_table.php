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
        Schema::table('invoices', function (Blueprint $table) {
            $table->unsignedBigInteger('ref_to_id')
                ->nullable()
                ->default(null)
                ->after('contract_id');

            $table->string('type')
                ->default('RG') // Standard: normale Rechnung
                ->after('ref_to_id');
        });
    }

    public function down(): void
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->dropColumn('ref_to_id');
            $table->dropColumn('type');
        });
    }
};
