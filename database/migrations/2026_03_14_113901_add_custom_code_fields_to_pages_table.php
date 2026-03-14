<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pages', function (Blueprint $table) {

            $table->longText('custom_head_code')
                ->nullable()
                ->after('blocks');

            $table->longText('custom_footer_code')
                ->nullable()
                ->after('custom_head_code');

            $table->longText('schema_json')
                ->nullable()
                ->after('custom_footer_code');

        });
    }

    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {

            $table->dropColumn([
                'custom_head_code',
                'custom_footer_code',
                'schema_json'
            ]);

        });
    }
};
