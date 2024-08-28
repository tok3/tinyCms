<?php

namespace App\Filament\Dashboard\Widgets;

use App\Models\Company;
use Filament\Widgets\Widget;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Helpers\QrPromoHelper;
use App\Models\PromoContent;
use App\Models\Code;


use App\Filament\Resources\User\PromoContentResource;
class SubscribeQrCode extends Widget
{

    protected static ?int $sort = 0;

    protected static bool $isLazy = false;
    protected int|string|array $columnSpan = 'full';


    protected static string $view = 'filament.dashboard.widgets.subscribe-qr-code';

    public $pdfUrl = 'zert-bg-immobilienbewerter-acadevo-alban.pdf';


    public function render(): \Illuminate\Contracts\View\View
    {



        $data['img'] = '';

        $tenantId = \Request::segment(2);
        $company = Company::where('id',$tenantId)->first();

        $subscribeCode = Code::where(['company_id' => $tenantId, 'type' => 'newsletter.subscribe'])->first();

        $promo = new QrPromoHelper();

        //$promo->portraitBW();
        $promo->createPostcard();
        //$promo->createPdf();

        if($subscribeCode == '')
        {
            $promo = new QrPromoHelper();

            $promo->portraitBW();
            $promo->createPostcard();
            $promo->createPdf();

            $subscribeCode = Code::where(['company_id' => $tenantId, 'type' => 'newsletter.subscribe'])->first();
        }


            $promoNL =  PromoContent::where('code_id',  $subscribeCode->id)
                ->where('type', 'LIKE', 'nl.subscribe%')
                ->get();



        // ---------------------------------------------------------------------------------

        $subscribeUrl = url('subscribe/' . $tenantId);
        $embedCode = '&lt;a href="' . $subscribeUrl . '"&gt;' . "<br>" . '
        &nbsp;&nbsp;&nbsp;&nbsp;&lt;img src="'.url($subscribeCode->id).'" alt="newsletter abonnieren"&gt;<br>
        &lt;/a&gt;';

        // ---------------------------------------------------------------------------------

        //$subscribeCode =  url('storage/pdfs/' . $subscribeCode->id . '_nl_subscribe.jpg');
        $pdfImg =  url('storage/pdfs/' . $subscribeCode->id . '_nl_subscribe.jpg');
        $codeImg =  url('storage/codes/QR-NL-' . $subscribeCode->id . '.png');
        $postcard =  url('storage/qr_images/' . $subscribeCode->id . '_pc_landscape.png');
        $portrait =  url('storage/qr_images/' . $subscribeCode->id . '_portrait_bw.png');

        // ---------------------------------------------------------------------------------

        return view(static::$view, [
            'promos' => $promoNL,
            'code' => $codeImg,
            'pdf' => $pdfImg,
            'portrait' => $portrait,
            'postcard' => $postcard,
            'embedCode' => $embedCode,
            'company' => $company,
        ]);
    }

}
