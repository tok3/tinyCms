<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('sepa_mandates', function (Blueprint $table) {
            $table->boolean('is_active')->default(true)->after('is_default');
            $table->date('signature_date')->nullable()->after('is_active');
        });
    }

    public function down(): void
    {
        Schema::table('sepa_mandates', function (Blueprint $table) {
            $table->dropColumn(['is_active', 'signature_date']);
        });
    }
};
