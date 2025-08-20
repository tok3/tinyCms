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
             $table->bigIncrements('id'); // bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT
            $table->unsignedBigInteger('company_id'); // bigint(20) UNSIGNED NOT NULL
            $table->string('url'); // varchar(255) NOT NULL
            $table->string('hash', 64); // varchar(64) NOT NULL
            $table->string('encoded_id')->nullable(); // varchar(255) DEFAULT NULL
            $table->timestamps(); // created_at and updated_at timestamp NULL DEFAULT NULL
            $table->softDeletes(); // deleted_at timestamp NULL DEFAULT NULL

            // Composite index
            $table->index(['company_id', 'url', 'hash', 'encoded_id'], 'search_index');

            // Foreign key constraint
            $table->foreign('company_id')
                  ->references('id')
                  ->on('companies')
                  ->onDelete('cascade');
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
