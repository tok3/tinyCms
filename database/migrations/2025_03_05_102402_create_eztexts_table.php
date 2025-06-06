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

        if (!Schema::hasTable('eztexts')) {
            Schema::create('eztexts', function (Blueprint $table) {
                $table->id();
                $table->ulid('ulid');
                $table->string('hash');
                $table->text('text');
                $table->index(['ulid', 'hash']);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eztexts');
    }
};
