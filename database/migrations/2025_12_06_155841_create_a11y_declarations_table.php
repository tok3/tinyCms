<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('a11y_declarations', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('company_id');

            // 0 = allgemeine Erklärung (acc_declarations)
            // 1 = company-spezifische Erklärung (acc_comp_declarations)
            $table->tinyInteger('declaration_type')->default(0);

            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('category')->default(0);

            // Bundesland / Geltungsbereich / Rechtsgrundlage
            $table->tinyInteger('federal_state')->default(0)->nullable();
            $table->text('scope')->nullable();
            $table->tinyInteger('federal_or_state_law')->nullable();

            // Einleitungstexte
            $table->text('declaration_intro_text')->nullable();
            $table->text('declaration_intro_text_ez')->nullable();

            // Company-spezifische Beschreibung
            $table->text('company_offer')->nullable();
            $table->text('company_offer_ez')->nullable();

            // Vereinbarkeit
            $table->text('consistency')->nullable();
            $table->text('consistency_ez')->nullable();

            // BFSG-konform / teilweise / nicht konform
            $table->text('bfsg_full')->nullable();
            $table->text('bfsg_full_ez')->nullable();
            $table->text('bfsg_partial')->nullable();
            $table->text('bfsg_partial_ez')->nullable();
            $table->text('non_conform_content')->nullable();
            $table->text('non_conform_content_ez')->nullable();

            // Feedback-Kanal
            $table->string('feedback_url')->nullable();
            $table->string('feedback_email')->nullable();
            $table->string('feedback_phone')->nullable();
            $table->text('feedback_address')->nullable();
            $table->text('feedback_text')->nullable();
            $table->text('feedback_text_ez')->nullable();

            // Marktüberwachungsbehörde / Durchsetzungsstelle (alte und neue Variante)
            $table->text('market_supervision_board')->nullable(); // alt aus acc_declarations

            $table->text('market_surveillance_board_address')->nullable();          // aus acc_comp_declarations
            $table->text('market_surveillance_board_address_text')->nullable();
            $table->text('market_surveillance_board_address_text_ez')->nullable();

            // Enforcement / Durchsetzungsstelle Zusatztexte
            $table->string('acc_enforcement_agencies')->nullable();
            $table->text('enforcement_text')->nullable();
            $table->text('enforcement_text_ez')->nullable();

            // Gerenderte HTML/JSON-Repräsentationen (falls ihr das braucht)
            $table->text('html')->nullable();
            $table->text('html_eztext')->nullable();
            $table->json('json_full')->nullable();
            $table->json('json_eztext')->nullable();

            // Publish-Status
            $table->tinyInteger('published')->default(0);

            $table->timestamps();
            $table->softDeletes();

            $table->index('company_id');
            $table->index('declaration_type');

            // Optional FK, wenn companies-Tabelle existiert:
            // $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('a11y_declarations');
    }
};
