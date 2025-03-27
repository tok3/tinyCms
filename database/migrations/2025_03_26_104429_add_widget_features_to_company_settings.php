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
        Schema::table('company_settings', function (Blueprint $table) {
            $table->enum('widget_features', ['standard', 'tts', 'eztext', 'ezspeak', 'tts_eztext', 'tts_ezspeak', 'eztext_ezspeak', 'tts_eztext_ezspeak'])->after('auto_add_urls')->default('standard')->comment("standard, tts, eztext, ezspeak, tts_eztext, tts_ezspeak, eztext_ezspeak, tts_eztext_easyspeak");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('company_settings', function (Blueprint $table) {
            $table->dropColumn('widget_features');
        });
    }
};
