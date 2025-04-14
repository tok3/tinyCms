<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class UpdateInvoicesAddContractIdColumn extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Neues Feld "contract_id" zur Tabelle "invoices" hinzufügen
        Schema::table('invoices', function (Blueprint $table) {
            $table->unsignedBigInteger('contract_id')->nullable()->default(null)->after('company_id');
        });

        // Alle Invoice-Datensätze durchgehen und den entsprechenden Vertrag zuordnen.
        $invoices = DB::table('invoices')->get();

        foreach ($invoices as $invoice) {
            // Hole den ersten Vertrag der Firma,
            // wobei angenommen wird, dass contractable_type für Firmen 'App\Models\Company' ist.
            $contract = DB::table('contracts')
                ->where('contractable_id', $invoice->company_id)
                ->where('contractable_type', 'App\\Models\\Company')
                ->orderBy('id', 'asc')
                ->first();

            if ($contract) {
                DB::table('invoices')
                    ->where('id', $invoice->id)
                    ->update(['contract_id' => $contract->id]);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->dropColumn('contract_id');
        });
    }
}
