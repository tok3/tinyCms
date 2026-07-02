<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pa11y_url_fingerprints', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->cascadeOnDelete();
            $table->foreignId('url_id')->constrained('pa11y_urls')->cascadeOnDelete();
            $table->string('standard', 10)->default('2.1');
            $table->string('fingerprint', 128)->nullable();
            $table->string('fingerprint_state', 30)->nullable();
            $table->string('fingerprint_source', 30)->nullable();
            $table->timestamp('fingerprint_scan_date')->nullable();
            $table->timestamp('scan_window_start_at')->nullable();
            $table->timestamp('scan_window_end_at')->nullable();
            $table->string('decision_action', 20)->nullable();
            $table->text('decision_reason')->nullable();
            $table->json('decision_context')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['company_id', 'url_id', 'standard'], 'url_fingerprint_lookup_idx');
            $table->index(['url_id', 'standard', 'fingerprint_scan_date'], 'url_fingerprint_history_idx');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pa11y_url_fingerprints');
    }
};
