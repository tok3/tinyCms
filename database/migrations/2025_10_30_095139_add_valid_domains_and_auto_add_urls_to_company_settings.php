<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration {
    public function up(): void
    {
        Schema::table('company_settings', function (Blueprint $table) {
            $table->text('valid_domains')->nullable()->after('auto_add_urls');
            $table->integer('exclude_query_string_urls')->nullable()->default(1)->after('valid_domains');
        });
    }

    public function down(): void
    {
        Schema::table('company_settings', function (Blueprint $table) {
            $table->dropColumn('valid_domains');
            $table->dropColumn('exclude_query_string_urls');
        });
    }
};
