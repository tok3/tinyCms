<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromoContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promo_contents', function (Blueprint $table) {
            $table->char('id', 26)->primary(); // ULID als Primärschlüssel
            $table->unsignedBigInteger('company_id');
            $table->string('type'); // arte des promos
            $table->char('code_id', 26); // ULID als Fremdschlüssel
            $table->json('data'); // JSON-Datenfeld
            $table->timestamps();

            // Optional: Add foreign key constraint if code_id references id in codes table
            $table->foreign('code_id')->references('id')->on('codes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promo_contents');
    }
}
