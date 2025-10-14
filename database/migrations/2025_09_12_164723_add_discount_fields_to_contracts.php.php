<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('contracts', function (Blueprint $table) {
            $table->decimal('discount_percent', 5, 2)->default(0)->after('setup_fee');
            $table->string('discount_label')->nullable()->after('discount_percent');
        });
    }

    public function down(): void
    {
        Schema::table('contracts', function (Blueprint $table) {
            $table->dropColumn(['discount_percent', 'discount_label']);
        });
    }
};
