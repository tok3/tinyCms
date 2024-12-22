<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccessibilityIssuesTable extends Migration
{
    public function up()
    {
        Schema::create('pa11y_accessibility_issues', function (Blueprint $table) {
            $table->id(); // Primärschlüssel
            $table->foreignId('url_id')->constrained('pa11y_urls')->onDelete('cascade'); // Automatisches Löschen bei verbundenem URL-Datensatz
            $table->text('issue'); // Beschreibung des Problems
            $table->text('selector')->nullable(); // Betroffenes Element, als Text falls länger
            $table->string('code', 100)->nullable(); // Kürzere Begrenzung, da Codes meist kompakt sind
            $table->string('type', 50)->nullable(); // Typ, z. B. "error", "notice"
            $table->string('typeCode', 10)->nullable(); // Code für den Typ, kompakt
            $table->text('context')->nullable(); // Kontext, in dem das Problem auftritt, als Text
            $table->string('runner', 100)->nullable(); // Runner-Information, als kompakter String
            $table->json('runnerExtras')->nullable(); // JSON-Feld für zusätzliche Details
            $table->string('wcag_level', 10)->nullable(); // WCAG-Stufe, als kompakter String
            $table->timestamps(); // Zeitstempel für Erstellung und Aktualisierung
        });
    }

    public function down()
    {
       Schema::dropIfExists('pa11y_accessibility_issues');
    }
}
