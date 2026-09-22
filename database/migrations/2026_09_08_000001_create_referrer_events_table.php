<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('referrer_events', function (Blueprint $table) {
            $table->id();
            $table->uuid('event_uuid')->unique();
            $table->foreignId('company_id')->nullable()->constrained()->nullOnDelete();
            $table->string('ulid', 36);
            $table->string('referrer');
            $table->string('status', 30)->default('processing');
            $table->timestamp('processed_at')->nullable();
            $table->timestamps();

            $table->index(['ulid', 'referrer'], 'referrer_events_referrer_idx');
            $table->index(['status', 'created_at'], 'referrer_events_status_created_idx');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('referrer_events');
    }
};
