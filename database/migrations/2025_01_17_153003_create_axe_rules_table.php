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
        Schema::create('accessibility_rules', function (Blueprint $table) {
            $table->id();
            $table->string('rule_id')->unique(); // Eindeutige Regel-ID
            $table->string('description'); // Beschreibung der Regel
            $table->string('impact'); // Schweregrad
            $table->text('tags'); // Tags
            $table->string('issue_type'); // Problemtyp
            $table->string('act_rule')->nullable(); // ACT-Regel-Link
            $table->string('detail_link'); // Detailseite-Link
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accessibility_rules');
    }
};
