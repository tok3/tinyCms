<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('promotion_id')->constrained('promotions')->onDelete('cascade'); // Verknüpfung zur promotions Tabelle
            $table->string('code')->unique();
            $table->boolean('redeemed')->default(0);
            $table->dateTime('redeemed_at')->nullable();
            $table->dateTime('valid_till')->nullable();
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
        Schema::dropIfExists('coupons');
    }
}
