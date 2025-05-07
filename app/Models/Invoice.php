<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\Contract;
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
        'ref_to_id',
        'type',
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

    protected $casts = [
        'data' => 'array',
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


    protected static function booted()
    {
        static::saving(function ($invoice) {
            if (!empty($invoice->payment_date)) {
                $invoice->status = 'paid';
            }
        });
    }
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

    /**
     * @param $value
     * @return void
     */
    public function setPaymentDateAttribute($value)
    {
        $this->attributes['payment_date'] = $value;

        if ($value && $this->status !== 'paid') {
            $this->attributes['status'] = 'paid';
        }
    }
    // belongs to contract
    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }
    /**
     * Die Rechnung, auf die sich diese Korrekturrechnung bezieht.
     */
    public function refTo()
    {
        return $this->belongsTo(self::class, 'ref_to_id');
    }

    /**
     * Alle Korrekturrechnungen, die auf diese Original-Rechnung verweisen.
     */
    public function corrections()
    {
        return $this->hasMany(self::class, 'ref_to_id');
    }
    public function correctionInvoice()
    {
        return $this->hasOne(Invoice::class, 'ref_to_id');
    }

    public function originalInvoice()
    {
        return $this->belongsTo(Invoice::class, 'ref_to_id');
    }

    public function correction()
    {
        return $this->hasOne(Invoice::class, 'ref_to_id');
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

        // 1. Wenn es eine Zahlung mit Abo gibt → Zeitraum aus subscription
        if (
            $this->payment &&
            $this->payment->subscription &&
            $this->payment->subscription->next_payment_date
        ) {
            $paymentDate = $this->payment_date;
            $nextPaymentDate = $this->payment->subscription->next_payment_date;
            $lz = "$paymentDate bis $nextPaymentDate";
        }

        // 2. Falls $lz leer ist, berechne Zeitraum anhand Vertragsintervall
        if (empty($lz)) {
            $start = Carbon::parse($this->issue_date ?? now());

            // Schutz gegen null-Zugriff
            $interval = $this->contract->interval ?? 'monthly';

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
            }

            $lz = $start->locale('de')->isoFormat('L') . " bis " . $end->locale('de')->isoFormat('L');
        }

        return $lz;
    }

    // Optional: enum-like helper
    public function isCorrection(): bool
    {
        return $this->type === 'KR';
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

    public function sendLogs()
    {
        return $this->hasMany(\App\Models\InvoicesSent::class);
    }
}
