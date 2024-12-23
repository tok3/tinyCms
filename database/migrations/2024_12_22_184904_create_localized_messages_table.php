<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalizedMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('localized_messages', function (Blueprint $table) {
            $table->id();
            $table->string('hash')->unique(); // Einzigartiger Hash der Originalnachricht
            $table->text('original_message'); // Original-Fehlermeldung
            $table->text('translated_de_DE')->nullable();
            $table->timestamps(); // Zeitstempel
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('localized_messages');
    }
}
