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
        Schema::table('evaluations', function (Blueprint $table) {
            $table->integer('passed')->after('metadata')->nullable();
            $table->integer('warning')->after('passed')->nullable();
            $table->integer('failed')->after('warning')->nullable();
            $table->integer('inapplicable')->after('failed')->nullable();
            $table->index(['passed', 'warning', 'failed', 'inapplicable']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('evaluations', function (Blueprint $table) {
            $table->dropColumn(['passed', 'warning', 'failed', 'inapplicable']);
        });
    }
};
