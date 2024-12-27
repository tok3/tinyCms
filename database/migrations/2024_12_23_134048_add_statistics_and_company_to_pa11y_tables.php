<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Tabelle pa11y_urls erweitern
        // Tabelle `pa11y_urls` erweitern
        Schema::table('pa11y_urls', function (Blueprint $table) {
            $table->unsignedBigInteger('company_id')->nullable()->after('id'); // Verweis auf Company
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });

        // Tabelle `pa11y_statistics` erstellen
        Schema::create('pa11y_statistics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('url_id')->nullable(); // Optional: Bezug zur spezifischen URL
            $table->string('wcag_level'); // A, AA, AAA
            $table->integer('error_count')->default(0);
            $table->integer('warning_count')->default(0);
            $table->integer('notice_count')->default(0);
            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('url_id')->references('id')->on('pa11y_urls')->onDelete('cascade');
        });
    }
};
