<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStandardToPa11yStatisticsTable extends Migration
{
    public function up()
    {
        Schema::table('pa11y_statistics', function (Blueprint $table) {
            $table->string('standard')->after('wcag_level')->default('2.0');
            $table->string('wcag_level')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('pa11y_statistics', function (Blueprint $table) {
            $table->dropColumn('standard');
            $table->string('wcag_level')->nullable(false)->change();
        });
    }
}
