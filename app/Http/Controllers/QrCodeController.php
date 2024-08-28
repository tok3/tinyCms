<?php

namespace App\Http\Controllers;

use App\Helpers\QrPromoHelper;
use App\Models\Company;
use App\Models\PromoContent;
use App\Models\PromoAccess;
use Illuminate\Support\Facades\Storage;

class QrCodeController extends Controller
{
    public function streamPromoImg($ulid)
    {
        $promo = PromoContent::where(['id' => $ulid])->first();

        if (!$promo) {
            abort(404, 'Promo content not found');
        }

        // Log the access
        PromoAccess::logAccess(
            $promo->company_id,
            $promo->type, // Assuming 'type' is the promo_type
            request()->header('referer'),
            $_SERVER
        );

        $file = 'public/qr_images/' . basename($promo->data['image_path']);

        if (!Storage::disk('local')->exists($file)) {
            abort(404, 'File not found');
        }

        $contents = Storage::disk('local')->get($file);
        $mimeType = Storage::disk('local')->mimeType($file);

        return response($contents)
            ->header('Content-Type', $mimeType);
    }

    function show(){

        $promo = new QrPromoHelper(Company::where('id',119)->first());

        return        $promo->createPdf();

    }
    function findLogoUrl($url)
    {
        // Den HTML-Inhalt der URL abrufen
        $html = file_get_contents($url);

        // Nach einem <img>-Tag mit "logo" im Dateinamen, in der ID oder Klasse suchen
        $pattern = '/<img.*?src=["\']([^"\']*logo[^"\']*)["\'].*?>/i';

        // Regex anwenden
        if (preg_match($pattern, $html, $matches))
        {
            // Das erste Vorkommen zurückgeben
            return $matches[1];
        }

        return null; // Kein Logo gefunden
    }


}
