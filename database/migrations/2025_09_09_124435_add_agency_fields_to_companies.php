<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->boolean('is_agency')->default(false)->after('name');
            $table->decimal('agency_discount_percent', 5, 2)->nullable()->after('is_agency');

            $table->foreignId('agency_company_id')
                ->nullable()
                ->after('agency_discount_percent')
                ->constrained('companies')
                ->nullOnDelete();

            $table->boolean('billing_via_agency')->default(false)->after('agency_company_id');
            $table->string('billing_email_override')->nullable()->after('billing_via_agency');
        });
    }

    public function down(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->dropConstrainedForeignId('agency_company_id');
            $table->dropColumn([
                'is_agency',
                'agency_discount_percent',
                'billing_via_agency',
                'billing_email_override',
            ]);
        });
    }
};
