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
        Schema::create('mollie_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('subscription_id'); // Mollie subscription_id
            $table->string('customer_id'); // Mollie customer_id
            $table->decimal('amount_value', 8, 2); // Betrag
            $table->string('amount_currency'); // Währung
            $table->string('description')->nullable(); // Feld für die Beschreibung
            $table->string('interval'); // Zahlungsintervall
            $table->string('status'); // Status der Subscription
            $table->json('metadata')->nullable(); // Feld für die Metadaten im JSON-Format
            $table->timestamp('start_date'); // Startdatum der Subscription
            $table->timestamp('next_payment_date')->nullable(); // Datum der nächsten Zahlung
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mollie_subscriptions');
    }
};
