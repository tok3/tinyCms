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
        Schema::create('evaluations', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('domain_id')->nullable()->index();
            $table->foreignId('company_id')->constrained()->cascadeOnDelete();
            $table->foreignUlid('domainurl_id')->constrained()->cascadeOnDelete();
            $table->jsonb('evaluation')->nullable();
            $table->text('evaluation_text')->nullable();
            $table->text('metadata')->nullable();
            $table->timestamps();
            $table->softDeletes('deleted_at', precision: 0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluations');
    }
};
