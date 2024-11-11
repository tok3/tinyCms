<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteTablesAndRemoveFieldsFromCompanies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Tabellen löschen
        Schema::dropIfExists('payments');
        Schema::dropIfExists('subscribers');
        Schema::dropIfExists('subscriptions');
        Schema::dropIfExists('redeemed_coupons');
        Schema::dropIfExists('applied_coupons');
        Schema::dropIfExists('credits');
        Schema::dropIfExists('refunds');
        Schema::dropIfExists('refund_items');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('order_items');

        // Felder aus der Tabelle 'companies' entfernen
        Schema::table('companies', function (Blueprint $table) {
//            $table->dropColumn(['mollie_customer_id', 'mollie_mandate_id', 'tax_percentage', 'trial_ends_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Tabellen wiederherstellen
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            // Weitere Spalten je nach Bedarf hinzufügen
        });

        Schema::create('subscribers', function (Blueprint $table) {
            $table->id();
            // Weitere Spalten je nach Bedarf hinzufügen
        });

        Schema::create('subscription', function (Blueprint $table) {
            $table->id();
            // Weitere Spalten je nach Bedarf hinzufügen
        });

        Schema::create('redeemed_coupons', function (Blueprint $table) {
            $table->id();
            // Weitere Spalten je nach Bedarf hinzufügen
        });

        Schema::create('applied_coupons', function (Blueprint $table) {
            $table->id();
            // Weitere Spalten je nach Bedarf hinzufügen
        });

        Schema::create('credits', function (Blueprint $table) {
            $table->id();
            // Weitere Spalten je nach Bedarf hinzufügen
        });

        Schema::create('refunds', function (Blueprint $table) {
            $table->id();
            // Weitere Spalten je nach Bedarf hinzufügen
        });

        Schema::create('refund_items', function (Blueprint $table) {
            $table->id();
            // Weitere Spalten je nach Bedarf hinzufügen
        });

        // Gelöschte Felder in der Tabelle 'companies' wieder hinzufügen
        Schema::table('companies', function (Blueprint $table) {
            $table->string('mollie_customer_id')->nullable();
            $table->string('mollie_mandate_id')->nullable();
            $table->decimal('tax_percentage', 6, 4)->default(0.0000);
            $table->timestamp('trial_ends_at')->nullable();
        });
    }
}
