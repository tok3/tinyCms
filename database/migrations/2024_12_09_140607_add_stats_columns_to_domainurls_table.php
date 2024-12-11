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
        Schema::table('domainurls', function (Blueprint $table) {
            $table->integer('passed_latest')->after('metadata')->nullable();
            $table->integer('warning_latest')->after('passed_latest')->nullable();
            $table->integer('failed_latest')->after('warning_latest')->nullable();
            $table->integer('inapplicable_latest')->after('failed_latest')->nullable();
            $table->integer('passed_oldest')->after('failed_latest')->nullable();
            $table->integer('warning_oldest')->after('passed_oldest')->nullable();
            $table->integer('failed_oldest')->after('warning_oldest')->nullable();
            $table->integer('inapplicable_oldest')->after('failed_oldest')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('domainurls', function (Blueprint $table) {
            $table->dropColumn(['passed_latest', 'warning_latest', 'failed_latest', 'inapplicable_latest', 'passed_oldest', 'warning_oldest', 'failed_oldest', 'inapplicable_oldest']);
        });
    }
};
