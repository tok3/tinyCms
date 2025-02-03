<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAccessibilityRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accessibility_rules', function (Blueprint $table) {
            // Neue Felder hinzufügen
            $table->json('standards')->nullable()->after('act_rule'); // Standards als JSON
            $table->json('disabilities')->nullable()->after('act_rule'); // Betroffene Behinderungen als JSON
            $table->longText('how_to_fix_html')->nullable()->after('act_rule'); // HTML für "How to Fix"
            $table->json('how_to_fix_text_vars')->nullable()->after('act_rule'); // Platzhalter und Texte für "How to Fix"
            $table->longText('why_important_html')->nullable()->after('act_rule'); // HTML für "Why it Matters"
            $table->json('why_important_text_vars')->nullable()->after('act_rule'); // Platzhalter und Texte für "Why it Matters"
            $table->longText('description_html')->nullable()->after('act_rule'); // HTML für "Description"
            $table->json('description_text_vars')->nullable()->after('act_rule'); // Platzhalter und Texte für "Description"
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('accessibility_rules', function (Blueprint $table) {
            // Neue Felder entfernen
            $table->dropColumn('standards');
            $table->dropColumn('disabilities');
            $table->dropColumn('how_to_fix_html');
            $table->dropColumn('how_to_fix_text_vars');
            $table->dropColumn('why_important_html');
            $table->dropColumn('why_important_text_vars');
            $table->dropColumn('description_html');
            $table->dropColumn('description_text_vars');
        });
    }
}
