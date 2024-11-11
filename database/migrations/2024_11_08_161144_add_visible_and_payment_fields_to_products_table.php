<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Füge das Feld 'visible' nach 'active' hinzu
            $table->integer('visible')->nullable()->default(1)->after('active');

            // Füge das Feld 'months_to_first_payment' hinzu
            $table->integer('months_to_first_payment')->nullable()->after('visible');

            // Füge das Feld 'first_payment_date' hinzu
            $table->date('first_payment_date')->nullable()->after('months_to_first_payment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Entferne die Felder beim Rollback
            $table->dropColumn('visible');
            $table->dropColumn('months_to_first_payment');
            $table->dropColumn('first_payment_date');
        });
    }
};
