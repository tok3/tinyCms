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
        Schema::table('acc_comp_declarations', function (Blueprint $table) {
            if (!Schema::hasColumn('acc_comp_declarations', 'consistency')) {
                $table->string('consistency', 20000)->after('company_offer_ez')->nullable()->default('Unsere Produkte und Dienstleistungen sind für Menschen mit Behinderungen in der allgemein üblichen Weise, ohne besondere Erschwernis und grundsätzlich ohne fremde Hilfe auffindbar, zugänglich und nutzbar.');
            }
            if (!Schema::hasColumn('acc_comp_declarations', 'consistency_ez')) {
                $table->string('consistency_ez', 20000)->nullable()->default('Unsere Produkte und Dienstleistungen sind für Menschen mit Behinderungen in der allgemein üblichen Weise, ohne besondere Erschwernis und grundsätzlich ohne fremde Hilfe auffindbar, zugänglich und nutzbar.');
            }
            if (!Schema::hasColumn('acc_comp_declarations', 'bfsg_full')) {
                $table->string('bfsg_full', 20000)->nullable()->default('Unsere Webseite ist mit dem BFSG und der BFSGV vereinbar; alle Anforderungen werden erfüllt.');
            }
            if (!Schema::hasColumn('acc_comp_declarations', 'bfsg_full_ez')) {
                $table->string('bfsg_full_ez', 20000)->nullable()->default('Unsere Webseite ist mit dem BFSG und der BFSGV vereinbar; alle Anforderungen werden erfüllt.');
            }
            if (!Schema::hasColumn('acc_comp_declarations', 'bfsg_partial')) {
                $table->string('bfsg_partial', 20000)->nullable()->default('Unsere Webseite ist in großen Teilen mit dem BFSG und der BFSGV vereinbar. Jedoch bestehen noch einige Barrieren auf unseren Seiten, an denen wir aktiv arbeiten und diese in Zukunft beseitigen wollen. Folgende Ausnahmen und Unvereinbarkeiten bestehen:');
            }
            if (!Schema::hasColumn('acc_comp_declarations', 'bfsg_partial_ez')) {
                $table->string('bfsg_partial_ez', 20000)->nullable()->default('Unsere Webseite ist in großen Teilen mit dem BFSG und der BFSGV vereinbar. Jedoch bestehen noch einige Barrieren auf unseren Seiten, an denen wir aktiv arbeiten und diese in Zukunft beseitigen wollen. Folgende Ausnahmen und Unvereinbarkeiten bestehen:');
            }
            if (!Schema::hasColumn('acc_comp_declarations', 'non_conform_content')) {
                $table->string('non_conform_content', 20000)->nullable()->default('Die folgenden Inhalte sind nicht barrierefrei, da Sie eine unverhältnismäßige Belastung gemäß § 12a Absatz 6 BGG darstellen:');
            }
            if (!Schema::hasColumn('acc_comp_declarations', 'non_conform_content_ez')) {
                $table->string('non_conform_content_ez', 20000)->nullable()->default('Die folgenden Inhalte sind nicht barrierefrei, da Sie eine unverhältnismäßige Belastung gemäß § 12a Absatz 6 BGG darstellen:');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('acc_comp_declarations', function (Blueprint $table) {
            $table->dropColumn('consistency');
            $table->dropColumn('consistency_ez');
            $table->dropColumn('bfsg_full');
            $table->dropColumn('bfsg_full_ez');
            $table->dropColumn('bfsg_partial');
            $table->dropColumn('bfsg_partial_ez');
            $table->dropColumn('non_conform_content');
            $table->dropColumn('non_conform_content_ez');
        });
    }
};
