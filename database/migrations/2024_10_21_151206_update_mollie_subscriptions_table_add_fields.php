<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMollieSubscriptionsTableAddFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mollie_subscriptions', function (Blueprint $table) {
            $table->string('method')->nullable()->after('description');
            $table->integer('times')->nullable()->after('method');
            $table->integer('times_remaining')->nullable()->after('times');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mollie_subscriptions', function (Blueprint $table) {
            $table->dropColumn(['method', 'times', 'times_remaining']);
        });
    }
}
