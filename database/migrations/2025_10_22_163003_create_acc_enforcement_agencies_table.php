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
        if (!Schema::hasTable('acc_enforcement_agencies')) {
            Schema::create('acc_enforcement_agencies', function (Blueprint $table) {
                $table->id();
                $table->string('state');
                $table->string('name');
                $table->string('email');
                $table->string('link');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enforcement_agencies');
    }
};
