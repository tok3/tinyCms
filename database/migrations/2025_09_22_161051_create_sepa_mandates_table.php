<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('sepa_mandates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->cascadeOnDelete();
            $table->string('mandate_reference');   // z. B. „M-30321“
            $table->string('account_holder');      // Kontoinhaber
            $table->string('iban');                // ggf. später per ->casts('encrypted')
            $table->string('bic')->nullable();     // optional
            $table->boolean('is_default')->default(false); // optional, praktisch
            $table->timestamps();
            $table->unique(['company_id','mandate_reference']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sepa_mandates');
    }
};
