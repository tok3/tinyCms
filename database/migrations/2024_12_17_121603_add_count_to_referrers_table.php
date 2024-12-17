<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('referrers', function (Blueprint $table) {
            $table->integer('count')->default(1)->after('referrer'); // Neues Feld 'count'
        });
    }

    public function down()
    {
        Schema::table('referrers', function (Blueprint $table) {
            $table->dropColumn('count');
        });
    }
};
