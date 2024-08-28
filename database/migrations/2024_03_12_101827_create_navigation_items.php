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
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->nullable();
            $table->string('type');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->integer('order')->default(0);
            $table->string('page_id')->nullable();
            $table->string('lang')->default('de_DE');
            $table->timestamps();

            $table->foreign('parent_id')->references('id')->on('menu_items')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('menu_items');
    }

};
