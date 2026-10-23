<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contract_lifecycle_events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contract_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('type')->index();
            $table->timestamp('occurred_at');
            $table->string('idempotency_key')->nullable()->unique();
            $table->json('context');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contract_lifecycle_events');
    }
};
