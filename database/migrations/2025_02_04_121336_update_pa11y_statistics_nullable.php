<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('pa11y_statistics', function (Blueprint $table) {
            $table->integer('error_count')->nullable()->change();
            $table->integer('notice_count')->nullable()->change();
            $table->integer('warning_count')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('pa11y_statistics', function (Blueprint $table) {
            $table->integer('error_count')->nullable(false)->default(0)->change();
            $table->integer('notice_count')->nullable(false)->default(0)->change();
            $table->integer('warning_count')->nullable(false)->default(0)->change();
        });
    }
};
