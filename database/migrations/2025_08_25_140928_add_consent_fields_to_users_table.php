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
        Schema::table('users', function (Blueprint $t) {
            $t->timestamp('consented_at')->nullable()->after('email_verified_at');
            $t->string('consent_version', 20)->nullable()->after('consented_at');
            $t->string('consent_ip', 45)->nullable()->after('consent_version');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $t) {
            $t->dropColumn(['consented_at','consent_version','consent_ip']);
        });
    }
};
