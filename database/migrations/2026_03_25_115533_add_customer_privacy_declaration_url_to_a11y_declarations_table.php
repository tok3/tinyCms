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
        Schema::table('a11y_declarations', function (Blueprint $table) {
            $table->text('customer_privacy_declaration_url')->nullable()->after('html_eztext');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('a11y_declarations', function (Blueprint $table) {
            $table->dropColumn('customer_privacy_declaration_url');
        });
    }
};
