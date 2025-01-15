<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStandardToPa11yAccessibilityIssuesTable extends Migration
{
    public function up()
    {
        Schema::table('pa11y_accessibility_issues', function (Blueprint $table) {
            $table->string('standard')->after('runnerExtras')->default('2.0');
        });
    }

    public function down()
    {
        Schema::table('pa11y_accessibility_issues', function (Blueprint $table) {
            $table->dropColumn('standard');
        });
    }
}
