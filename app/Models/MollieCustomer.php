<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MollieCustomer extends Model
{
    use HasFactory;

    protected $fillable = [
        'model_id',         // Verknüpft mit dem ID der Company oder einem anderen Modell
        'model_type',       // Polymorpher Typ (z.B. Company, User etc.)
        'mollie_customer_id', // Mollie Customer ID
    ];

    /**
     * Erstelle die polymorphe Beziehung.
     * Dies erlaubt es, sich auf verschiedene Modelle zu beziehen, z.B. auf eine Company.
     */
    public function model()
    {
        return $this->morphTo();
    }
}
