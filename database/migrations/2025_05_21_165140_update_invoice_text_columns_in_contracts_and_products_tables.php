<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('contracts', function (Blueprint $table) {
            $table->text('invoice_text')->nullable()->after('product_description');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->renameColumn('invoice_description', 'invoice_text');
            $table->string('currency')->default('EUR')->change();
        });
    }

    public function down(): void
    {
        Schema::table('contracts', function (Blueprint $table) {
            $table->dropColumn('invoice_text');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->renameColumn('invoice_text', 'invoice_description');
            $table->string('currency')->change(); // Default wieder entfernen
        });
    }
};
