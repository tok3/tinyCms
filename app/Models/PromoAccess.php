<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromoAccess extends Model
{
    use HasFactory;

    protected $table = 'promo_access';

    protected $fillable = [
        'company_id',
        'promo_type',
        'total_acc',
        'HTTP_REFERER',
        'data',
    ];

    protected $casts = [
        'data' => 'array',
    ];

    public static function logAccess($companyId, $promoType, $httpReferer, $serverData)
    {
        // Update or create the promo access record
        self::updateOrCreate(
            ['company_id' => $companyId, 'promo_type' => $promoType, 'HTTP_REFERER' => $httpReferer],
            [
                'total_acc' => \DB::raw('total_acc + 1'),
                'HTTP_REFERER' => $httpReferer,
                'data' => $serverData,
            ]
        );
    }
}
