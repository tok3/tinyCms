<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Invoice extends Model
{
    use HasFactory;

    /**
     * Die Tabelle, die zu diesem Modell gehört.
     *
     * @var string
     */
    protected $table = 'invoices';

    /**
     * Die Attribute, die massenweise zugewiesen werden können.
     *
     * @var array
     */
    protected $fillable = [
        'invoice_number',
        'company_id',
        'contract_id',
        'mollie_payment_id', // Mollie Payment ID, wenn verwendet
        'issue_date',
        'due_date',
        'total_net',
        'total_gross',
        'tax_rate',
        'currency',
        'status',
        'data', // JSON-Daten für Rechnungspositionen
        'zugferd_data', // ZUGFeRD-XML-Daten
        'xrechnung_data', // XRechnung-XML-Daten
        'payment_date', // Zahlungseingangsdatum
    ];

    /**
     * Die Attribute, die als Datum gecastet werden sollen.
     *
     * @var array
     */
    protected $dates = [
        'issue_date',
        'due_date',
        'payment_date',
    ];

    /**
     * Standardwerte für Attribute.
     *
     * @var array
     */
    protected $attributes = [
        'status' => 'draft', // Standardstatus für neue Rechnungen
        'currency' => 'EUR', // Standardwährung
    ];

    /**
     * Beziehung zur Company (Firma), die die Rechnung erhalten hat.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function payment()
    {
        return $this->belongsTo(MolliePayment::class, 'mollie_payment_id', 'payment_id');
    }

    // belongs to contract
    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }
    /**
     * Gibt den Leistungszeitraum aus.
     *
     * Falls es ein Abonnement gibt, wird der Zeitraum aus `payment_date` und `next_payment_date` berechnet.
     * Falls kein `next_payment_date` vorhanden ist, wird ein leerer String zurückgegeben.
     */
    public function getLeistungszeitraumAttribute()
    {
        $lz = "";
        if ($this->payment && $this->payment->subscription && $this->payment->subscription->next_payment_date) {
            $paymentDate = $this->payment_date;
            $nextPaymentDate = $this->payment->subscription->next_payment_date;
            $lz =  "$paymentDate bis $nextPaymentDate";
        }

// Falls $lz leer ist, berechne den Zeitraum anhand des Vertragsintervalls:
        if (empty($lz)) {
            $start = Carbon::today();

            $interval = $this->contract->interval;

            switch ($interval) {
                case 'daily':
                    $end = $start->copy()->addDay();
                    break;
                case 'weekly':
                    $end = $start->copy()->addWeek();
                    break;
                case 'monthly':
                    $end = $start->copy()->addMonth();
                    break;
                case 'annual':
                    $end = $start->copy()->addYear();
                    break;
                default:
                    $end = $start;
                    break;
            }
            $lz = $start->locale('de')->isoFormat('L') . " bis " . $end->locale('de')->isoFormat('L');
        }

        return $lz;
    }
    /**
     * Rechnung hat viele Positionen (hier als JSON im data-Feld gespeichert).
     *
     * @return array
     */
    public function getItemsAttribute()
    {
        return json_decode($this->data, true) ?? [];
    }

    /**
     * Setze die Rechnungspositionen im JSON-Format.
     *
     * @param array $items
     */
    public function setItemsAttribute(array $items)
    {
        $this->data = json_encode($items);
    }

    /**
     * Berechne den Mehrwertsteuerbetrag basierend auf dem Nettobetrag und der Steuerquote.
     *
     * @return float
     */
    public function getTaxAmountAttribute()
    {
        return ($this->total_net * $this->tax_rate) / 100;
    }



    /**
     * Berechne den Gesamtbruttobetrag.
     *
     * @return float
     */
    public function getTotalGrossAttribute()
    {



        return $this->total_net + $this->tax_amount;
    }
}
