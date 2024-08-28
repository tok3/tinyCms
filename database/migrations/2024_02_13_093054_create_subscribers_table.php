<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() :void
    {
        Schema::create('subscribers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->unsignedBigInteger('company_id');
            $table->string('activation_code');
            $table->ipAddress('activated_ip')->nullable()->default('NULL'); // Für IP-Adressen
            $table->date('activated_at')->nullable();
            $table->softDeletes();
            $table->timestamps(); // Erstellt `created_at` und `updated_at`
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscribers');
    }
};
