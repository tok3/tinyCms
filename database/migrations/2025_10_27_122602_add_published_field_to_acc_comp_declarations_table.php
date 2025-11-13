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
        Schema::table('acc_comp_declarations', function (Blueprint $table) {
            $table->tinyInteger('published')->after('json_eztext')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('acc_comp_declarations', function (Blueprint $table) {
            $table->dropColumn('published');
        });
    }
};
