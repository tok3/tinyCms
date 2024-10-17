<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('temporary_user_data', function (Blueprint $table) {
            $table->id();
            $table->string('mollie_customer_id')->unique(); // Mollie Customer ID zur Zuordnung
            $table->json('user_data'); // Benutzerdaten als JSON
            $table->json('company_data'); // Firmendaten als JSON
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('temporary_user_data');
    }
};
