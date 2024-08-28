<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QRLog extends Model
{
    use HasFactory;
protected $table = 'qr_logs';
    protected $fillable = [
        'company_id',
        'code_id',
        'code_type',
        'ip_address',
        'user_agent',
        'referer',
        'geolocation',
        'server_data',
    ];

    protected $casts = [
        'geolocation' => 'array',
        'server_data' => 'array',
    ];

    public static function logAccess($companyId, $codeId, $promoType, $httpReferer, $serverData)
    {
        // Setze Referer auf 'none' wenn keiner vorhanden ist
        $httpReferer = $httpReferer ?? 'none';

        // Erstellen eines neuen QR-Log-Eintrags
        self::create([
            'company_id' => $companyId,
            'code_id' => $codeId,
            'code_type' => $promoType,
            'ip_address' => request()->ip(),
            'user_agent' => request()->header('User-Agent'),
            'referer' => $httpReferer,
            'geolocation' => request()->session()->get('geo_data', []),
            'server_data' => $serverData,
        ]);
    }
}
