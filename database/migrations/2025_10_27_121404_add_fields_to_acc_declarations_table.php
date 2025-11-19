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
        Schema::table('acc_declarations', function (Blueprint $table) {
            if (!Schema::hasColumn('acc_declarations', 'consistency')) {
                $table->string('consistency', 20000)->after('category')->nullable()->default('Unsere Produkte und Dienstleistungen sind für Menschen mit Behinderungen in der allgemein üblichen Weise, ohne besondere Erschwernis und grundsätzlich ohne fremde Hilfe auffindbar, zugänglich und nutzbar.');
            }
            if (!Schema::hasColumn('acc_declarations', 'consistency_ez')) {
                $table->string('consistency_ez', 20000)->after('consistency')->nullable()->default('Unsere Produkte und Dienstleistungen sind für Menschen mit Behinderungen in der allgemein üblichen Weise, ohne besondere Erschwernis und grundsätzlich ohne fremde Hilfe auffindbar, zugänglich und nutzbar.');
            }
            if (!Schema::hasColumn('acc_declarations', 'bfsg_full')) {
                $table->string('bfsg_full', 20000)->nullable()->default('Unsere Webseite ist mit dem BFSG und der BFSGV vereinbar; alle Anforderungen werden erfüllt.');
            }
            if (!Schema::hasColumn('acc_declarations', 'bfsg_full_ez')) {
                $table->string('bfsg_full_ez', 20000)->nullable()->default('Unsere Webseite ist mit dem BFSG und der BFSGV vereinbar; alle Anforderungen werden erfüllt.');
            }
            if (!Schema::hasColumn('acc_declarations', 'bfsg_partial')) {
                $table->string('bfsg_partial', 20000)->nullable()->default('Unsere Webseite ist in großen Teilen mit dem BFSG und der BFSGV vereinbar. Jedoch bestehen noch einige Barrieren auf unseren Seiten, an denen wir aktiv arbeiten und diese in Zukunft beseitigen wollen. Folgende Ausnahmen und Unvereinbarkeiten bestehen:');
            }
            if (!Schema::hasColumn('acc_declarations', 'bfsg_partial_ez')) {
                $table->string('bfsg_partial_ez', 20000)->nullable()->default('Unsere Webseite ist in großen Teilen mit dem BFSG und der BFSGV vereinbar. Jedoch bestehen noch einige Barrieren auf unseren Seiten, an denen wir aktiv arbeiten und diese in Zukunft beseitigen wollen. Folgende Ausnahmen und Unvereinbarkeiten bestehen:');
            }
            if (!Schema::hasColumn('acc_declarations', 'non_conform_content')) {
                $table->string('non_conform_content', 20000)->nullable()->default('Die folgenden Inhalte sind nicht barrierefrei, da Sie eine unverhältnismäßige Belastung gemäß § 12a Absatz 6 BGG darstellen:');
            }
            if (!Schema::hasColumn('acc_declarations', 'non_conform_content_ez')) {
                $table->string('non_conform_content_ez', 20000)->nullable()->default('Die folgenden Inhalte sind nicht barrierefrei, da Sie eine unverhältnismäßige Belastung gemäß § 12a Absatz 6 BGG darstellen:');
            }
            if (!Schema::hasColumn('acc_declarations', 'scope')) {
                $table->string('scope', 20000)->after('federal_state')->nullable()->default();
            }
            if (!Schema::hasColumn('acc_declarations', 'published')) {
                $table->tinyInteger('published')->after('json_eztext')->default(0);
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('acc_declarations', function (Blueprint $table) {
            $table->dropColumn('consistency');
            $table->dropColumn('consistency_ez');
            $table->dropColumn('bfsg_full');
            $table->dropColumn('bfsg_full_ez');
            $table->dropColumn('bfsg_partial');
            $table->dropColumn('bfsg_partial_ez');
            $table->dropColumn('non_conform_content');
            $table->dropColumn('non_conform_content_ez');
            $table->dropColumn('scope');
            $table->dropColumn('published');
        });
    }
};
