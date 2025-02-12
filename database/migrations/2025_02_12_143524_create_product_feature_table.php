<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('product_feature', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->foreignId('feature_id')->constrained()->cascadeOnDelete();
            $table->integer('value')->default(1); // Wert des Features innerhalb des Produkts
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_feature');
    }
};
