<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoicesSent extends Model
{
    use HasFactory;
    protected $table = 'invoices_sent';
    protected $fillable = [
        'invoice_id',
        'company_id',
        'invoice_number',
        'receiver',
        'status',
    ];


    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
