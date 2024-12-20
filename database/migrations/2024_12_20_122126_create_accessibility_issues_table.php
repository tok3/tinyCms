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
            $table->foreignId('url_id')->constrained('pa11y_urls')->onDelete('cascade'); // Automatisches Löschen
            $table->text('issue'); // Beschreibung des Problems
            $table->string('selector')->nullable(); // Betroffenes Element
            $table->string('wcag_level')->nullable(); // WCAG-Level (AA, AAA)
            $table->string('severity')->nullable(); // Fehler-Schweregrad
            $table->timestamps(); // Zeitstempel
        });
    }

    public function down()
    {
        Schema::dropIfExists('pa11y_accessibility_issues');
    }
}
