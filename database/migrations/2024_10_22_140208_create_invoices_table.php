<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number');
            $table->unsignedBigInteger('company_id'); // Verknüpfung zur Firma
            $table->string('mollie_payment_id')->nullable()->default(null); // Verknüpfung zu Mollie Payment, optional
            $table->date('issue_date'); // Rechnungsdatum
            $table->date('due_date'); // Fälligkeitsdatum
            $table->date('payment_date')->nullable()->default(null); // Zahlungsdatum, optional
            $table->decimal('total_net', 15, 2); // Nettobetrag
            $table->decimal('total_gross', 15, 2); // Bruttobetrag
            $table->decimal('tax', 15, 2); // Steuerbetrag
            $table->decimal('tax_rate', 5, 2)->default(19.00); // Steuersatz (z.B. 19.00 für 19%)
            $table->string('currency')->default('EUR'); // Währung, standardmäßig EUR
            $table->text('payment_terms')->nullable(); // Zahlungsbedingungen
            $table->enum('status', ['draft', 'sent', 'paid', 'canceled'])->default('draft'); // Status der Rechnung
            $table->text('data')->nullable(); // JSON-Daten für Rechnungspositionen
            $table->text('xrechnung_data')->nullable(); // XRechnung-XML-Daten
            $table->string('pdf_path')->nullable(); // Pfad zur PDF-Datei, optional
            $table->timestamps(); // Erstellt am und Aktualisiert am
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
