<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();

            // Polymorphe Beziehung
            $table->morphs('contractable'); // Erstellt die Spalten `contractable_type` und `contractable_id`

            // Vertragsdaten
            $table->string('product_name');
            $table->text('product_description')->nullable();
            $table->integer('price');
            $table->integer('setup_fee')->nullable();
            $table->string('interval');
            $table->string('subscription_id')->nullable();
            $table->date('subscription_start_date')->nullable();
            $table->integer('iteration')->default(1); // Startet bei 1, wird bei Verlängerung erhöht
            $table->json('data')->nullable(); // JSON-Feld für zusätzliche Vertragsdaten

            // Vertragszeitraum
            $table->date('order_date')->nullable();
            $table->date('start_date')->nullable();
            $table->integer('duration')->nullable(); // Dauer in Tagen, Monaten, etc.
            $table->date('end_date')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contracts');
    }
}
