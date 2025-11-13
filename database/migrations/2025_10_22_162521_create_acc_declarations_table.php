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
        if (!Schema::hasTable('acc_declarations')) {
            Schema::create('acc_declarations', function (Blueprint $table) {
                $table->id();
                $table->foreignId('company_id')->constrained()->cascadeOnDelete();
                $table->tinyInteger('status')->default(0); // 0: „vollständig vereinbar“, 1: „teilweise vereinbar“, 2 „nicht vereinbar“, 1: Kommune/Behoerde
                $table->tinyInteger('category')->default(0); // 0: 'unvereinbarkeit, 1: 'unverhaeltnismaessige belastung, 2: ausserhalb
                $table->tinyInteger('federal_state')->default(0)->nullable(); // Bundesland
                $table->tinyInteger('federal_or_state_law')->nullable(); // Bundesrecht oder Landesrecht
                $table->text('declaration_intro_text'); // blah ist behmueht...
                $table->text('declaration_intro_text_ez'); // blah ist behmueht...
                $table->text('market_supervision_board'); // Marktueberwachungsbehoerde (adressse)
                $table->string('feedback_url')->nullable(); // Feedback-URL
                $table->string('feedback_email')->nullable(); // Feedback-email
                $table->string('feedback_phone')->nullable(); // Feedback-tel
                $table->text('feedback_address')->nullable(); // postalische adresse
                $table->text('feedback_text')->nullable(); // zusatztext
                $table->text('feedback_text_ez')->nullable(); // zusatztext ez
                $table->foreignId('acc_enforcement_agencies'); // Verknüpfung zur acc_enforcement_agencies Tabelle (z.B. enforcement_link')->nullable();
                $table->text('enforcement_text')->nullable(); // zusaatztext enforcement
                $table->text('enforcement_text_ez')->nullable(); // zusatztext enforcement text ez
                $table->text('html')->nullable(); // foll HTML der Deklaration
                $table->text('html_eztext')->nullable(); // foll HTML der Deklaration in leichter Sprache
                $table->json('json_full')->nullable(); // json komplett
                $table->json('json_eztext')->nullable(); // json in leichter Sprache
                $table->timestamps();
                $table->softDeletes();
            });
    }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acc_declaration');
    }
};
