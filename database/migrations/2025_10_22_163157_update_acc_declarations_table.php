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
            //$table->tinyInteger('status')->default(0)->nullable()->change();
            //$table->tinyInteger('category')->default(0)->nullable()->change();
            $table->text('declaration_intro_text')->nullable()->change();
            $table->text('declaration_intro_text_ez')->nullable()->change();
            $table->text('market_supervision_board')->nullable()->change();
            $table->string('acc_enforcement_agencies')->nullable()->change();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
