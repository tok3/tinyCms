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
        Schema::create('domainurls', function (Blueprint $table) {
            $table->ulid('id')->primary()->nullable();
            $table->foreignUlid('domain_id')->nullable()->default(null)->constrained()->cascadeOnDelete();
            $table->foreignId('company_id')->nullable()->default(null)->constrained()->cascadeOnDelete();
            $table->string('url')->nullable()->index();
            $table->json('overall_stats')->nullable();
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
        Schema::dropIfExists('domainurls');
    }
};
