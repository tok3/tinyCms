<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('features', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // Eindeutiger Name des Features
            $table->text('description')->nullable(); // Optionale Beschreibung
            $table->decimal('default_price', 10, 2)->nullable(); // Standardpreis für Einzelkauf
            $table->string('unit')->nullable(); // Einheit (z. B. "URLs", "API Calls")
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('features');
    }
};
