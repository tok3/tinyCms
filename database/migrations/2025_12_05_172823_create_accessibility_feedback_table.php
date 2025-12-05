<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('accessibility_feedback', function (Blueprint $table) {
            $table->id();

            // Zuordnung zur Company (Kunde)
            $table->foreignId('company_id')
                ->constrained()
                ->cascadeOnDelete();

            // keine Declaration-Relation mehr:
            // $table->foreignId('accessibility_declaration_id') ...

            $table->string('first_name', 100);
            $table->string('last_name', 100)->nullable();
            $table->string('email', 255);
            $table->string('page_url', 2048)->nullable();
            $table->text('body'); // Beanstandung / Nachricht

            $table->boolean('privacy_accepted')->default(false);
            $table->boolean('is_read')->default(false);

            $table->timestamp('notified_at')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('accessibility_feedback');
    }
};
