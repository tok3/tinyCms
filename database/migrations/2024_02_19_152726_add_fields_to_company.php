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
        Schema::table('companies', function (Blueprint $table) {
            $table->string('web')->nullable()->after('slug');
            $table->string('email')->nullable()->after('slug');
            $table->string('fon')->nullable()->after('slug');
            $table->string('mobile')->nullable()->after('slug');
            $table->string('ort')->nullable()->after('slug');
            $table->string('plz')->nullable()->after('slug');
            $table->string('str')->nullable()->after('slug');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            Schema::table('companies', function (Blueprint $table) {
                $table->dropColumn('web');
                $table->dropColumn('email');
                $table->dropColumn('fon');
                $table->dropColumn('mobile');
                $table->dropColumn('ort');
                $table->dropColumn('plz');
                $table->dropColumn('str');
            });
        });
    }
};
