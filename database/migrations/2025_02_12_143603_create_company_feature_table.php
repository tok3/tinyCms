<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('company_feature', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->cascadeOnDelete();
            $table->foreignId('feature_id')->constrained()->cascadeOnDelete();
            $table->integer('value')->default(0); // Tatsächlich erworbener Wert des Features
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('company_feature');
    }
};
