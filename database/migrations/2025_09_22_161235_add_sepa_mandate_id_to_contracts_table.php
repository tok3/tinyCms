<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('contracts', function (Blueprint $table) {
            $table->foreignId('sepa_mandate_id')
                ->nullable()
                ->after('invoice_text')
                ->constrained('sepa_mandates')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('contracts', function (Blueprint $table) {
            $table->dropForeign(['sepa_mandate_id']);
            $table->dropColumn('sepa_mandate_id');
        });
    }
};
