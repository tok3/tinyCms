<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('automation_logs', function (Blueprint $table) {
            $table->id();

            $table->foreignId('company_id')->constrained()->cascadeOnDelete();

            $table->string('automation');
            // z.B.:
            // wcag_followup_24h
            // wcag_followup_3d

            $table->timestamp('sent_at');

            $table->timestamps();

            $table->unique(['company_id', 'automation']); // verhindert doppelte Mails
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('automation_logs');
    }
};
