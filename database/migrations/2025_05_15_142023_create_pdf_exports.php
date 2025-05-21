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
        Schema::create('pdf_exports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->cascadeOnDelete();
            $table->string('url');
            $table->string('hash', 64); // For SHA-256 hash
            $table->string('encoded_id')->nullable(); // For base62 encoded ID
            $table->timestamps();
            $table->softDeletes();
            $table->index(['company_id', 'url', 'hash', 'encoded_id'], 'search_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pdf_exports');
    }
};
