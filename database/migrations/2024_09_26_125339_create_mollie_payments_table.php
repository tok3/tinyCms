<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMolliePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mollie_payments', function (Blueprint $table) {
            $table->id();
            $table->string('payment_id'); // Mollie payment ID (e.g. "tr_S2e52djvrP")
            $table->string('mode'); // test or live mode
            $table->decimal('amount_value', 10, 2); // Amount of the payment
            $table->string('amount_currency', 3); // Currency (e.g. EUR)
            $table->decimal('settlement_amount_value', 10, 2); // Settlement amount
            $table->string('settlement_amount_currency', 3); // Settlement currency
            $table->decimal('amount_refunded_value', 10, 2)->nullable(); // Refunded amount
            $table->decimal('amount_remaining_value', 10, 2); // Remaining amount
            $table->decimal('amount_charged_back_value', 10, 2)->nullable(); // Charged back amount
            $table->string('description'); // Description of the payment
            $table->string('method')->nullable(); // Payment method (e.g. creditcard)
            $table->string('status'); // Payment status (e.g. paid, failed)
            $table->timestamp('paid_at')->nullable(); // Payment paid at
            $table->timestamp('canceled_at')->nullable(); // Payment canceled at
            $table->timestamp('expires_at')->nullable(); // Payment expiration date
            $table->timestamp('failed_at')->nullable(); // Failed at
            $table->date('due_date')->nullable(); // Payment due date
            $table->string('billing_email')->nullable(); // Billing email
            $table->string('profile_id')->nullable(); // Mollie profile ID
            $table->string('sequence_type'); // Payment sequence type (e.g. first, recurring)
            $table->string('redirect_url')->nullable(); // Redirect URL after payment
            $table->string('cancel_url')->nullable(); // Cancel URL if payment is canceled
            $table->string('webhook_url')->nullable(); // Webhook URL
            $table->string('mandate_id')->nullable(); // Mandate ID for recurring payments
            $table->string('subscription_id')->nullable(); // Subscription ID, if applicable
            $table->string('order_id')->nullable(); // Order ID, if applicable
            $table->json('lines')->nullable(); // Payment lines, if applicable
            $table->json('billing_address')->nullable(); // Billing address details
            $table->json('shipping_address')->nullable(); // Shipping address details
            $table->string('settlement_id')->nullable(); // Settlement ID
            $table->string('locale', 5)->nullable(); // Locale (e.g. de_DE)
            $table->json('metadata')->nullable(); // Metadata (product_id, customer_id, etc.)
            $table->json('details')->nullable(); // Payment details (e.g. card details)
            $table->string('customer_id')->nullable(); // Mollie customer ID
            $table->string('country_code', 2)->nullable(); // Country code
            $table->json('_links')->nullable(); // Mollie API links
            $table->timestamps(); // Laravel default timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mollie_payments');
    }
}
