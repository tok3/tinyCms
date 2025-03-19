<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('company_scan_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->timestamp('scanned_at'); // Time of full scan
            $table->string('scan_type')->default('full'); // full, manual, scheduled
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('company_scan_logs');
    }
};
