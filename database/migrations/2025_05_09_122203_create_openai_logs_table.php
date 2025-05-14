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
        Schema::create('openai_logs', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // e.g. 'image-description'
            $table->integer('prompt_tokens');
            $table->integer('total_tokens');
            $table->integer('completion_tokens');
            $table->float('estimated_cost_usd', 8, 6);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('openai_logs');
    }
};
