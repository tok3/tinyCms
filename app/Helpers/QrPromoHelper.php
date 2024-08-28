<?php

namespace App\Helpers;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as ImageManagerStatic;
use Intervention\Image\ImageManager;
use Intervention\Image\Geometry\Factories\LineFactory;

use ColorThief\ColorThief;
use Spatie\Browsershot\Browsershot;

use Intervention\Image\Drivers\Imagick\Driver;
use Spatie\PdfToImage\Pdf as PdfToImage;
use App\Models\Code;
use App\Models\PromoContent;

class QrPromoHelper
{


    var $qrCodeDir = "codes/";
    var $pdfDir = "pdfs/";
    var $screenshot = false;
    var $company;

    public function __construct($company = '')
    {

        if ($company == '')
        {

            $company = \Auth::user()->companies[0];
        }

        $this->company = $company;
        $this->code_id = '';

    }

    /**
     * @return mixed
     * @throws \Spatie\Browsershot\Exceptions\CouldNotTakeBrowsershot
     */
    public function createPdf()
    {
        $contents = PromoContent::where(['company_id' => $this->company->id, 'type' => 'nl.subscribe.pdf'])->first();

        // Standardwerte initialisieren
        $text = [
            'heading' => 'scan mich !',
            'small_top' => '',
            'hintBottom' => 'Einfach QR-Code scannen und Instruktionen folgen.',
        ];

        $settings = [
            "h1"=> "Lobster-Regular",
            'gradientColorTop' => '#778899',
            'gradientColorBottom' => $this->pastellizeHex('#778899', 0.3),
            "colorSelectMode"=>"color_picker",

        ];

        // Daten aus der Datenbank überschreiben die Standardwerte, falls vorhanden
        if ($contents) {
            if (isset($contents['data']['text'])) {
                $text = array_merge($text, $contents['data']['text']);
            }
            if (isset($contents['data']['settings'])) {
                $settings = array_merge($settings, $contents['data']['settings']);
            }
        }

        // Farben und Texte zuweisen
        $pdfData['h1Col'] = $settings['gradientColorTop'];
        $pdfData['h2Col'] = $settings['gradientColorBottom'];
        $topCol = $pdfData['h1Col'];
        $bottomCol = $settings['gradientColorBottom'];

        if ($this->screenshot != false) {
            $site = $this->screenshot;
            $colors = $this->colorsFromScreenshot($site);

            $pdfData['h1Col'] = $this->rgbToHex($colors[0]);
            $pdfData['h2Col'] = $this->rgbToHex($colors[0]);

            $settings['gradientColorTop'] = $colors[0];
            $settings['gradientColorBottom'] = $colors[1];

            $topCol = $this->rgbToHex($colors[0]);
            $bottomCol = $this->rgbToHex($colors[1]);
        }

        $pdfData['hintCol'] = '#ffffff';
        $pdfData['imprintCol'] = '#000000';

        $pdfData['company'] = $this->company;
        $pdfData['qrCode'] = $this->createCode($pdfData['h1Col'], url('subscribe/' . $this->company->slug));

        $gradientPath = $this->createGradientImage(800, 500, $topCol, $bottomCol, storage_path('app/public/' . $this->company->id . 'gradient.png'));
        $bgGradientImg = $this->composeBackground($gradientPath);

        $attributes = ['company_id' => $this->company->id, 'code_id' => $this->code_id, 'type' => 'nl.subscribe.pdf'];
        $pdfData['text'] = $text;
        $data = $attributes;
        $data['data']['text'] = $text;
        $data['data']['image_path'] = 'storage/' . $this->pdfDir . $this->code_id . '_nl_subscribe.jpg';
        $data['data']['settings'] = $settings;

        $pdfData['bgGradientImg'] = $bgGradientImg;
        $pdfData['settings'] = $settings;

        // Insert or Update
        if (\Route::currentRouteName() !== 'testQrHelper') {
            PromoContent::updateOrCreate($attributes, $data);
        }

        // View rendern und als PDF zurückgeben
        $pdf = \PDF::loadView('pdf.qr-template-3', $pdfData);

        // Speicherpfad in Storage
        $filePath = $this->pdfDir . $this->code_id . '_nl_subscribe.pdf';

        // PDF im Storage-Verzeichnis speichern
        $pdf->save(storage_path('app/public/' . $filePath));

        // PDF als Bild zu Vorschau speichern
        $pdfI = new PdfToImage(storage_path('app/public/' . $filePath));
        $pdfI->saveImage(str_replace('.pdf', '.jpg', storage_path('app/public/' . $filePath)));

        return $pdf->stream(storage_path('app/public/' . $filePath));
    }

    /**
     * @param $ss
     * @return $this
     */
    function screenshot($ss)
    {
        $this->screenshot = $ss;

        return $this;
    }

    /**
     * @param $color
     * @param $target
     * @return string
     */
    public
    function createCode($color = '#778899', $target = '')
    {

        $vCard = "BEGIN:VCARD\n"
            . "VERSION:3.0\n"
            . "N:Smith;John;\n"
            . "TEL;TYPE=work,VOICE:(111) 555-1212\n"
            . "TEL;TYPE=home,VOICE:(404) 386-1017\n"
            . "TEL;TYPE=fax:(866) 408-1212\n"
            . "EMAIL:smith.j@smithdesigns.com\n"
            . "ORG:Smith Designs LLC\n"
            . "TITLE:Lead Designer\n"
            . "ADR;TYPE=WORK,PREF:;;151 Moore Avenue;Grand Rapids;MI;49503;United States of America\n"
            . "URL:https://www.smithdesigns.com\n"
            . "END:VCARD";


        /*$col = implode(',', $this->hexToRgb('#1b74aa'));
    echo $col;*/

        $colArr = $this->hexToRgb($color);

        $qrCode = QrCode::format('png')
            ->size(2000)
            ->eye('square')
            ->color($colArr[0], $colArr[1], $colArr[2])
            ->margin(1)
            ->generate($target);


        $attributes = ['company_id' => $this->company->id, 'type' => 'newsletter.subscribe'];
        $data = $attributes;

        $data['data'] = array('target' => $target);

        // Insert or Update
        $code = Code::updateOrCreate($attributes, $data);
        $this->code_id = $code->id;

        // Speichere den QR-Code temporär, um ihn später im Image einbinden zu können
        $qrCodePath = 'public/' . $this->qrCodeDir . 'QR-NL-' . $code->id . '.png';
        Storage::disk('local')->put($qrCodePath, $qrCode);

        return $qrCodePath;
    }


    /**
     * @param $bgImg
     * @return string
     */
    public
    function composeBackground($bgImg = 'app/public/#262625gradient.png')
    {
        $image = \Image::read($bgImg);


        $image->resize(2210, 2750);

        $notch = \Image::read(storage_path('app/public/qr_images/cover-white.png'));

        // Setze die Hintergrundfarbe auf Weiß und mache sie transparent

        $notch->scale(1400);
        $image->place($notch, 'top-center', 0, -160); // Position anpassen

        $image->place($notch, 'bottom-center', 0, -220); // Position anpassen


        // Speichere das fertige Image
        $finalImagePath = 'qr_images/' . $this->code_id . '_bg.png';

        $image->save(storage_path('app/public/' . $finalImagePath));


        return $finalImagePath;
    }

    /**
     * @param $company_id
     * @param $promoType
     * @return false
     */
    static function getPromoId($company_id, $promoType)
    {
        $promoNL = \App\Models\PromoContent::where(['type' => $promoType, 'company_id' => $company_id])->first();

        if (!empty($promoNL))
        {
            return $promoNL->id;
        }

        return False;
    }


    /**
     * @return string
     */
    public function portraitBW()
    {


        /*  $contents = PromoContent::where(['company_id' => $this->company->id, 'type' => 'nl.subscribe.portrait_bw'])->first();

          if (isset($contents['data']['text']))
          {
              $text = $contents['data']['text'];
          }
          if (isset($contents['data']['settings']))
          {
              $settings = $contents['data']['settings'];
          }

          $fontColor = '#000000';
          if (isset($settings['fontColor']))
          {
              $fontColor = $settings['fontColor'];
          }

          $codeColor = '#000000';
          if (isset($settings['codeColor']))
          {
              $codeColor = $settings['codeColor'];
          }

          $lineColor = '#a1a1a1';
          if (isset($settings['lineColor']))
          {
              $lineColor = $settings['lineColor'];
          }

          if (!isset($text['heading']))
          {
              $text['heading'] = "Welcome to our Services";
          }
          if (!isset($text['sub']))

          {
              $text['sub'] = "Dsicover more from what we offer !";
          }
          if (!isset($text['bottom_left']))
          {
              $text['bottom_left'] = "Your Company\nyour slogan";
          }
          if (!isset($text['copy_flank']))

          {
              $text['bottom_right'] = "+49123456
          info@camindu.de";
          }

          $text['footer'] = "www.tools-for-creators.com";

          if (!isset($text['copy_flank']))
          {
              $text['copy_flank'] = '© www.tools-4-creators.com (' . date('Y', time()) . ')';
          }


          $fontHeading = 'fonts/Baloo_2/static/Baloo2-Bold.ttf';
          if (isset($settings['fontHeading']))
          {
              $fontHeading = FontHelper::getFontPath(storage_path('userfonts'), $settings['fontHeading']);
          }

          $fontText = 'fonts/Unbounded/static/Unbounded-Regular.ttf';
          if (isset($settings['fontText']))
          {
              $fontText = FontHelper::getFontPath(storage_path('userfonts'), $settings['fontText']);
          }*/

        $contents = PromoContent::where(['company_id' => $this->company->id, 'type' => 'nl.subscribe.portrait_bw'])->first();

        $text = [
            'heading' => 'Welcome to our Services',
            'sub' => 'Discover more from what we offer!',
            'bottom_left' => 'Your Company\nyour slogan',
            'bottom_right' => '+49123456\ninfo@camindu.de',
            'footer' => 'www.tools-for-creators.com',
            'copy_flank' => '© www.tools-4-creators.com (' . date('Y') . ')',
        ];

        $settings = [
            'fontColor' => '#000000',
            'codeColor' => '#000000',
            'lineColor' => '#a1a1a1',
            'fontHeading' => 'Baloo2-SemiBold',
            'fontText' => 'Unbounded-Regular',
        ];

        if ($contents)
        {
            if (isset($contents['data']['text']))
            {
                $text = array_merge($text, $contents['data']['text']);
            }
            if (isset($contents['data']['settings']))
            {
                $settings = array_merge($settings, $contents['data']['settings']);
            }
        }

        $fontColor = $settings['fontColor'];
        $codeColor = $settings['codeColor'];
        $lineColor = $settings['lineColor'];

        $fontHeading = FontHelper::getFontPath(storage_path('userfonts'), $settings['fontHeading']);
        $fontText = FontHelper::getFontPath(storage_path('userfonts'), $settings['fontText']);

        // --------------------------------------------------

        $width = 400;  // breite
        $height = 600; // höhe

        $qrWidth = 250;
        $qrHeight = $qrWidth;
        $qrBG_width = $qrWidth + 70;  // breite
        $qrBG_height = $qrWidth + 80; // höhe

        // --------------------------------------------------

        $data['qrCode'] = $this->createCode($codeColor, url('subscribe/' . $this->company->slug));

        $manager = new ImageManager(Driver::class);


        $image = $manager->create($width, $height);
        $image->fill('#ffffff');

        $qrCodeImage = $manager->read(storage_path('app/' . $data['qrCode']));
        $qrCodeImage->resize($qrWidth, $qrHeight);

        $qrBG = $manager->create($qrBG_width, $qrBG_height);

        // Zeichnen der Ecken um den Code
        $cornerColor = $lineColor;
        $vLength = 50;
        $hLength = 30;
        $thickness = 5;

        $this->drawCorners($qrBG, $cornerColor, $qrBG_width, $qrBG_height, $thickness, $vLength, $hLength);

        $qrBG->place($qrCodeImage, 'center', 0, 0);
        $image->place($qrBG, 'center', 0, 0);

        // --------------------------------------------------
        // Text und Position
        $positionX = 30;
        $positionY = $height / 2;

        // Schrift zeichnen vertical
        $fontPath = storage_path('fonts/Lato/Lato-Regular.ttf');
        $image->text($text['copy_flank'], $positionX, $positionY, function ($font) use ($fontPath) {
            $font->file($fontPath);
            $font->size(10);
            $font->color('#a1a1a1');
            $font->align('center');
            $font->valign('center'); // Vertikale Ausrichtung oben
            $font->angle(-90); // Vertikaler Winkel
        });

        $positionX = 370;
        $positionY = $height / 2;

        $image->text($text['copy_flank'], $positionX, $positionY, function ($font) use ($fontPath) {
            $font->file($fontPath);
            $font->size(10);
            $font->color('#a1a1a1');
            $font->align('center');
            $font->valign('center'); // Vertikale Ausrichtung oben
            $font->angle(90); // Vertikaler Winkel
        });

        // --------------------------------------------------

        //$this->multilineText($image, $text,20,$width / 2, 17,40, 50,'#000000',storage_path('fonts/Unbounded/static/Unbounded-Regular.ttf'));
        $this->multilineText($image, $text['heading'], 25, $width / 2, 17, 45, 50, $fontColor, storage_path($fontHeading));


        $this->multilineText($image, $text['sub'], 470, $width / 2, 40, 10, 16, $fontColor, storage_path($fontText));


        $image->drawLine(function (LineFactory $line) use ($lineColor) {

            $top = 510;

            $line->from(80, $top); // starting point of line
            $line->to(320, $top); // ending point
            $line->color($lineColor); // color of line
            $line->width(1); // line width in pixels

        });


        $this->multilineText($image, $text['bottom_left'], 530, $width / 2 - 10, 40, 10, 16, $fontColor, storage_path($fontText), 'right');


        $this->multilineText($image, $text['bottom_right'], 530, $width / 2 + 10, 40, 10, 16, $fontColor, storage_path($fontText), 'left');

        $image->drawLine(function (LineFactory $line) use ($lineColor) {

            $top = 515;
            $pos = 200;
            $line->from($pos, $top); // starting point of line
            $line->to($pos, $top + 50); // ending point
            $line->color($lineColor); // color of line
            $line->width(1); // line width in pixels

        });


        $image->drawLine(function (LineFactory $line) use ($lineColor) {

            $top = 570;

            $line->from(50, $top); // starting point of line
            $line->to(350, $top); // ending point
            $line->color($lineColor); // color of line
            $line->width(1); // line width in pixels

        });


        $this->multilineText($image, $text['footer'], 582, $width / 2, 40, 10, 16, $fontColor, storage_path($fontText));


        $attributes = ['company_id' => $this->company->id, 'code_id' => $this->code_id, 'type' => 'nl.subscribe.portrait_bw'];
        $data = $attributes;

        $data['data']['text'] = $text;
        $data['data']['settings'] = $settings;

        // Speichere das fertige Image
        $finalImagePath = 'qr_images/' . $this->code_id . '_portrait_bw.png';
        $image->save(storage_path('app/public/' . $finalImagePath));

        $data['data']['image_path'] = 'storage/' . $finalImagePath;
        // Insert or Update
        PromoContent::updateOrCreate($attributes, $data);

        return '<a><img style="border:1px dashed black; cursor:pointer;" src="http://localhost:8003/storage/' . $finalImagePath . '"></a>';
    }


    /**
     * @param $mode string landscape or portrait
     * @return void
     */
    public
    function createPostcard($mode = 'landscape')
    {

        $width = 675;  // breite
        $height = 400; // höhe

        if ($mode == 'portrait')
        {
            $width = 400;  // breite
            $height = 675; // höhe
        }


        /*   $contents = PromoContent::where(['company_id' => $this->company->id, 'type' => 'nl.subscribe.pc_' . $mode])->first();


           if (isset($contents['data']['settings']))
           {
               $settings = $contents['data']['settings'];
           }
           if (isset($contents['data']['text']))
           {
               $text = $contents['data']['text'];
           }
           if (!isset($text['heading']))
           {
               $text['heading'] = 'Zum Newsletter Anmelden';
           }

           if (!isset($text['description']))
           {
               $text['description'] = 'Möchten Sie exklusive Einblicke, Tipps und die neuesten Trends direkt in Ihrem Posteingang erhalten?

      Verpassen Sie keine Neuigkeiten mehr – melden Sie sich jetzt an und seien Sie immer einen Schritt voraus!';
           }
           if (!isset($text['code_heading']))
           {
               $text['code_heading'] = 'Code scanen ...';
           }
           if (!isset($text['codesub']))
           {
               $text['codesub'] = 'oder klicken ...';
           }
           if (!isset($text['copyright']))
           {
               $text['copyright'] = '© usergeilesprodukt.com (' . date('Y', time()) . ')';
           }

           // ------------------------------------------------------

           $fontColor = '#000000';
           if (isset($settings['fontColor']))
           {
               $fontColor = $settings['fontColor'];
           }

           $gradientColor = '#a1a1a1';
           if (isset($settings['gradientColorTop']))
           {
               $gradientColor = $settings['gradientColorTop'];
           }

           $bottomCol = $this->pastellizeHex($gradientColor, 0.3);
           if (isset($settings['gradientColorBottom']))
           {
               $bottomCol = $settings['gradientColorBottom'];
           }

           $codeColor = $fontColor;
           if (isset($settings['codeColor']))
           {
               $codeColor = $settings['codeColor'];
           }


           $fontfileCodeUb = 'fonts/Lato/Lato-Regular.ttf';
           if (isset($settings['fontCode']))
           {
               $fontfileCodeUb = FontHelper::getFontPath(storage_path('userfonts'), $settings['fontCode']);
           }

           $fontHeading = 'fonts/Lato/Lato-Regular.ttf';
           if (isset($settings['fontHeading']))
           {
               $fontHeading = FontHelper::getFontPath(storage_path('userfonts'), $settings['fontHeading']);
           }

           $fontText = 'fonts/Lato/Lato-Regular.ttf';
           if (isset($settings['fontText']))
           {
               $fontText = FontHelper::getFontPath(storage_path('userfonts'), $settings['fontText']);
           }*/

        $contents = PromoContent::where(['company_id' => $this->company->id, 'type' => 'nl.subscribe.pc_' . $mode])->first();

        // Standardwerte initialisieren
        $text = [
            'heading' => 'Zum Newsletter Anmelden',
            'description' => 'Möchten Sie exklusive Einblicke, Tipps und die neuesten Trends direkt in Ihrem Posteingang erhalten? Verpassen Sie keine Neuigkeiten mehr – melden Sie sich jetzt an und seien Sie immer einen Schritt voraus!',
            'code_heading' => 'Code scannen ...',
            'codesub' => 'oder klicken ...',
            'copyright' => '© usergeilesprodukt.com (' . date('Y') . ')',
        ];

        $settings = [
            'fontColor' => '#000000',
            'gradientColorTop' => '#a1a1a1',
            'gradientColorBottom' => $this->pastellizeHex('#a1a1a1', 0.3),
            'codeColor' => '#000000',
            'fontCode' => 'Lato-Regular',
            'fontHeading' => 'Lato-Regular',
            'fontText' => 'Lato-Regular',
            'backgroundType' => 'single',
        ];

        // Daten aus der Datenbank überschreiben die Standardwerte, falls vorhanden
        if ($contents)
        {
            if (isset($contents['data']['settings']))
            {
                $settings = array_merge($settings, $contents['data']['settings']);
            }
            if (isset($contents['data']['text']))
            {
                $text = array_merge($text, $contents['data']['text']);
            }
        }

        // Werte aus den Einstellungen zuweisen
        $fontColor = $settings['fontColor'];
        $gradientColorTop = $settings['gradientColorTop'];
        $backgroundType = $settings['backgroundType'];
        $bottomCol = $settings['gradientColorBottom'];
        $codeColor = $settings['codeColor'];
        $fontfileCodeUb = FontHelper::getFontPath(storage_path('userfonts'), $settings['fontCode']);
        $fontHeading = FontHelper::getFontPath(storage_path('userfonts'), $settings['fontHeading']);
        $fontText = FontHelper::getFontPath(storage_path('userfonts'), $settings['fontText']);

        if($backgroundType == 'single'){
            $bottomCol = $this->pastellizeHex($gradientColorTop, 0.3);
        }

        // -----

        $data['qrCode'] = $this->createCode($codeColor, url('subscribe/' . $this->company->slug));

        $gradiendPath = $this->createGradientImage(800, 500, $gradientColorTop, $bottomCol, storage_path('app/public/' . $this->company->id . 'gradient.png'));

        $this->composeBackground($gradiendPath);

        // create an image
        $manager = new ImageManager(Driver::class);

        //$image = $manager->create($width, $height);

        $image = $manager->create($width, $height);
        $image->fill('#ffffff');

        $qrBG = $manager->read(storage_path('app/public/qr_images/' . $this->code_id . '_bg.png'));
        //$qrBG->resize(250, 300);
        $qrBG->resize(250, 300);

        $qrCodeImage = $manager->read(storage_path('app/' . $data['qrCode']));
        $qrCodeImage->resize(200, 200);


        $qrBG->place($qrCodeImage, 'center', 0, 0); // Position anpassen


        if ($mode == 'portrait')
        {
            $fit4mode = 0; // y offset fix for landscape/Portrait

            $image->place($qrBG, 'center', 0, 135); // Position anpassen

            // Füge zusätzlichen Text hinzu
            $image->text('scan mich ...', 200, 310, function ($font) use ($fontColor, $fontfileCodeUb) {
                $font->file(storage_path($fontfileCodeUb));
                $font->size(22);
                $font->color($fontColor);
                $font->align('center');
                $font->valign('top');
            });
            // Füge zusätzlichen Text hinzu
            $image->text('oder klick mich', 200, 625, function ($font) use ($fontColor, $fontfileCodeUb) {
                $font->file(storage_path($fontfileCodeUb));
                $font->size(22);
                $font->color($fontColor);
                $font->align('center');
                $font->valign('top');
            });

            // Füge zusätzlichen Text hinzu
            $image->text($text['copyright'], 70, 669, function ($font) use ($fontColor) {
                $font->file(storage_path('fonts/Lato/Lato-Regular.ttf'));
                $font->size(10);
                $font->color($fontColor);
                $font->align('left');
                $font->valign('bottom');
            });
        }
        else
        {
            $fit4mode = 10; // y offset fix for landscape/Portrait

            $image->place($qrBG, 'right-center', 25, -10);

            // Überschrift Code
            $image->text($text['code_heading'], 527, 30, function ($font) use ($fontColor, $fontfileCodeUb) {
                $font->file(storage_path($fontfileCodeUb));
                $font->size(22);
                $font->color($fontColor);
                $font->align('center');
                $font->valign('top');
            });
            // schrift unter code
            $image->text($text['codesub'], 527, 340, function ($font) use ($fontColor, $fontfileCodeUb) {
                $font->file(storage_path($fontfileCodeUb));
                $font->size(22);
                $font->color($fontColor);
                $font->align('center');
                $font->valign('top');
            });

            // Füge zusätzlichen Text hinzu
            $image->text($text['copyright'], 70, 392, function ($font) use ($fontColor) {
                $font->file(storage_path('fonts/Lato/Lato-Regular.ttf'));
                $font->size(10);
                $font->color($fontColor);
                $font->align('left');
                $font->valign('bottom');
            });
        }
        // Position anpassen

        // Füge zusätzlichen Text hinzu
        $image->text($text['heading'], 200, 40 + $fit4mode, function ($font) use ($fontColor, $fontHeading) {
            $font->file(storage_path($fontHeading));
            $font->size(26);
            $font->color($fontColor);
            $font->align('center');
            $font->valign('top');
        });

        $description = $text['description'];

        $lines = explode("\n", wordwrap($description, 40)); // break line after 120 charecters

        for ($i = 0; $i < count($lines); $i++)
        {
            $offset = 100 + ($i * 25); // 50 is line height
            $image->text($lines[$i], 200, $offset + $fit4mode, function ($font) use ($fontColor, $fontText) {
                $font->file(storage_path($fontText));
                $font->size(18);
                $font->color($fontColor);
                $font->align('center');
                $font->valign('top');
            });
        }


        $image->drawLine(function (LineFactory $line) use ($fontColor, $fit4mode) {

            $top = 80 + $fit4mode;

            $line->from(80, $top); // starting point of line
            $line->to(305, $top); // ending point
            $line->color($fontColor); // color of line
            $line->width(1); // line width in pixels

        });


        // Zeichnen der Ecken
        $this->drawCorners($image, $fontColor, $width, $height);


        $attributes = ['company_id' => $this->company->id, 'code_id' => $this->code_id, 'type' => 'nl.subscribe.pc_' . $mode];
        $data = $attributes;

        $data['data']['text'] = $text;
        $data['data']['settings'] = $settings;

        // Speichere das fertige Image
        $finalImagePath = 'qr_images/' . $this->code_id . '_pc_' . $mode . '.png';

        $data['data']['image_path'] = 'storage/' . $finalImagePath;

        // Insert or Update
        PromoContent::updateOrCreate($attributes, $data);

        $image->save(storage_path('app/public/' . $finalImagePath));


        return '<a><img style="border:0px dashed black; cursor:pointer;" src="http://localhost:8003/storage/' . $finalImagePath . '"></a>';


    }


    private function multilineText($imgObj, $text, $startTop, $startLeft, $width = 40, $fontSize = 18, $lineHeight = 25, $fontColor, $fontPath, $align = 'center', $valign = 'top')
    {

        $lines = explode("\n", wordwrap($text, $width)); // break line after 120 charecters

        for ($i = 0; $i < count($lines); $i++)
        {
            $offset = $startTop + ($i * $lineHeight); // 50 is line height
            $imgObj->text($lines[$i], $startLeft, $offset, function ($font) use ($fontColor, $fontPath, $fontSize, $align, $valign) {
                $font->file($fontPath);
                $font->size($fontSize);
                $font->color($fontColor);
                $font->align($align);
                $font->valign($valign);
            });
        }
    }

    /**
     * @param $imgObj
     * @param $strokeColor
     * @param $width
     * @param $height
     * @param $lineThickness
     * @param $vLength
     * @param $hLength
     * @return void
     */
    private function drawCorners($imgObj, $strokeColor, $width, $height, $lineThickness = 1, $vLength = 50, $hLength = 50)
    {
        $this->drawCorner($imgObj, 'top-left', $strokeColor, $width, $height, $lineThickness, $vLength, $hLength);
        $this->drawCorner($imgObj, 'top-right', $strokeColor, $width, $height, $lineThickness, $vLength, $hLength);
        $this->drawCorner($imgObj, 'bottom-left', $strokeColor, $width, $height, $lineThickness, $vLength, $hLength);
        $this->drawCorner($imgObj, 'bottom-right', $strokeColor, $width, $height, $lineThickness, $vLength, $hLength);
    }

    /**
     * @param $imgObj
     * @param $corner
     * @param $strokeColor
     * @param $width
     * @param $height
     * @param $lineThickness
     * @param $vLength = vertical line lenghth
     * @param $hLength = horizontal line length
     * @return void
     */
    private
    function drawCorner($imgObj, $corner, $strokeColor, $width, $height, $lineThickness = 1, $vLength = 50, $hLength = 50)
    {
        $lineLength = 50; // Länge der Eckenmarkierungen
        //  $lineThickness = 1;    // Breite der Linien in Pixeln

        switch ($corner)
        {
            case 'top-left':
                $startX = 10;
                $startY = 10;
                $endX = $startX + $hLength;
                $endY = $startY + $vLength;
                break;
            case 'top-right':
                $startX = $width - 10;
                $startY = 10;
                $endX = $startX - $hLength;
                $endY = $startY + $vLength;
                break;
            case 'bottom-left':
                $startX = 10;
                $startY = $height - 10;
                $endX = $startX + $hLength;
                $endY = $startY - $vLength;
                break;
            case 'bottom-right':
                $startX = $width - 10;
                $startY = $height - 10;
                $endX = $startX - $hLength;
                $endY = $startY - $vLength;
                break;
        }

        // Zeichnen der vertikalen Linie
        $imgObj->drawLine(function ($draw) use ($startX, $startY, $endY, $strokeColor, $lineThickness) {
            $draw->from($startX, $startY);
            $draw->to($startX, $endY);
            $draw->color($strokeColor);
            $draw->width($lineThickness);

        });

        // Zeichnen der horizontalen Linie
        $imgObj->drawLine(function ($draw) use ($startX, $startY, $endX, $strokeColor, $lineThickness) {
            $draw->from($startX, $startY);
            $draw->to($endX, $startY);
            $draw->color($strokeColor);
            $draw->width($lineThickness);
        });
    }

    /**
     * @param $imgObj
     * @param $corner
     * @param $strokeColor
     * @param $width
     * @param $height
     * @return void
     */
    private
    function drawCornerCrosshair($imgObj, $corner, $strokeColor, $width, $height)
    {
        $lineLength = 100; // Länge der Eckenmarkierungen
        $lineThickness = 1;    // Breite der Linien in Pixeln

        switch ($corner)
        {
            case 'top-left':
                $startX = 10 + $lineLength;
                $startY = 10 + $lineLength;
                $endX = 10;
                $endY = 10;
                break;
            case 'top-right':
                $startX = $width - 10 - $lineLength;
                $startY = 10 + $lineLength;
                $endX = $width - 10;
                $endY = 10;
                break;
            case 'bottom-left':
                $startX = 10 + $lineLength;
                $startY = $height - 10 - $lineLength;
                $endX = 10;
                $endY = $height - 10;
                break;
            case 'bottom-right':
                $startX = $width - 10 - $lineLength;
                $startY = $height - 10 - $lineLength;
                $endX = $width - 10;
                $endY = $height - 10;
                break;
        }

        // Zeichnen der vertikalen Linie
        $imgObj->drawLine(function ($draw) use ($startX, $startY, $endY, $strokeColor, $lineThickness) {
            $draw->from($startX, $startY);
            $draw->to($startX, $endY);
            $draw->color($strokeColor);
            $draw->width($lineThickness);
        });

        // Zeichnen der horizontalen Linie
        $imgObj->drawLine(function ($draw) use ($startX, $startY, $endX, $strokeColor, $lineThickness) {
            $draw->from($startX, $startY);
            $draw->to($endX, $startY);
            $draw->color($strokeColor);
            $draw->width($lineThickness);
        });
    }


    /**
     * @param $_url
     * @param $_storagePath
     * @return void
     * @throws \Spatie\Browsershot\Exceptions\CouldNotTakeBrowsershot
     */
    function colorsFromScreenshot($_url, $_storagePath = '')
    {

        //screenshot

        $screenshotName = $this->getScreenshotName($_url) . '.jpg';

        $screenshot = 'app/public/screenshots/' . $screenshotName;

        Browsershot::url($_url)->save(storage_path($screenshot));

        $colors = ColorThief::getPalette(storage_path($screenshot), $colorCount = 5, $quality = 10, $area = null);

        return $colors;


    }

    /**
     * @param $url
     * @return array|string|string[]
     */
    function getScreenshotName($url)
    {
        // Den Hostnamen (Domain) aus der URL extrahieren
        $host = parse_url($url, PHP_URL_HOST);

        // Den Domainnamen ohne Subdomains extrahieren
        $domain = implode('.', array_slice(explode('.', $host), -2));

        return str_replace('.', '_', $domain);

        //return Str::slug($domain);
    }

    /**
     * @param $hex
     * @return array|null
     */
    function hexToRgb($hex)
    {
        // Entferne # am Anfang, falls vorhanden
        $hex = ltrim($hex, '#');

        // Länge des verbleibenden Strings überprüfen
        $length = strlen($hex);

        if ($length == 3)
        {
            // Hex-Wert in RGB umwandeln für kurze Schreibweise
            $r = hexdec(str_repeat(substr($hex, 0, 1), 2));
            $g = hexdec(str_repeat(substr($hex, 1, 1), 2));
            $b = hexdec(str_repeat(substr($hex, 2, 1), 2));
        }
        elseif ($length == 6)
        {
            // Hex-Wert in RGB umwandeln für volle Schreibweise
            $r = hexdec(substr($hex, 0, 2));
            $g = hexdec(substr($hex, 2, 2));
            $b = hexdec(substr($hex, 4, 2));
        }
        else
        {
            // Ungültiger Hex-Wert
            return null;
        }

        return [$r, $g, $b];
    }

    /**
     * @param $r
     * @param $g
     * @param $b
     * @param $withHash
     * @return string
     */

    function rgbToHexArr($_colorsArr, $_saturation, $_hash = true)
    {
        $this->rgbToHex($_colorsArr, $g = null, $b = null, $_hash, $saturationFactor = $_saturation);
    }

    function rgbToHex($r, $g = null, $b = null, $withHash = true, $saturationFactor = 0.0)
    {
        // Überprüfe, ob $r ein Array ist und weise die Werte entsprechend zu
        if (is_array($r) && count($r) == 3)
        {
            list($r, $g, $b) = $r;
        }

        // Stelle sicher, dass die RGB-Werte im gültigen Bereich liegen
        $r = max(0, min(255, $r));
        $g = max(0, min(255, $g));
        $b = max(0, min(255, $b));

        //pastellieren
        if ($saturationFactor != null)
        {
            $pastelled = $this->pastellizeRGB($r, $g, $b, $saturationFactor);
            $r = $pastelled[0];
            $g = $pastelled[1];
            $b = $pastelled[2];
        }
        //ende pastell
        // RGB in Hex umwandeln und optional mit # beginnen
        $hex = sprintf("%02x%02x%02x", $r, $g, $b);

        return $withHash ? '#' . $hex : $hex;
    }

    /**
     * @param $color
     * @param $factor
     * @return array
     */
    function pastellizeHex($color, $factor = 0.5)
    {

        $colArr = $this->hexToRgb($color);

        $retCol = $this->pastellizeRGB($colArr[0], $colArr[1], $colArr[2], $factor);

        return $this->rgbToHex($retCol[0], $retCol[1], $retCol[2]);

    }

    function pastellizeRGB($r, $g, $b, $factor = 0.5)
    {
        // Ermittle die Weichheit; 0.5 ist ein guter Ausgangspunkt
        $softness = 255 * $factor;

        // Pastellisieren
        $nr = (1 - $factor) * $r + $softness;
        $ng = (1 - $factor) * $g + $softness;
        $nb = (1 - $factor) * $b + $softness;

        // Stelle sicher, dass die Werte im gültigen Bereich bleiben
        $nr = min(255, max(0, $nr));
        $ng = min(255, max(0, $ng));
        $nb = min(255, max(0, $nb));

        return [$nr, $ng, $nb];
    }

    /**
     * @param $width
     * @param $height
     * @param $topColorHex
     * @param $bottomColorHex
     * @param $filePath
     * @return void
     */
    function createGradientImage($width, $height, $topColorHex, $bottomColorHex, $filePath)
    {
        // Bild mit Transparenz erstellen
        $image = imagecreatetruecolor($width, $height);
        imagesavealpha($image, true);
        $transparent = imagecolorallocatealpha($image, 0, 0, 0, 127);
        imagefill($image, 0, 0, $transparent);

        // Hex-Farben in RGB umwandeln
        $topColor = $this->hexToRgb($topColorHex);
        $bottomColor = $this->hexToRgb($bottomColorHex);

        // Farbverlauf erstellen
        for ($y = 0; $y <= $height; $y++)
        {
            $r = ($bottomColor[0] - $topColor[0]) * ($y / $height) + $topColor[0];
            $g = ($bottomColor[1] - $topColor[1]) * ($y / $height) + $topColor[1];
            $b = ($bottomColor[2] - $topColor[2]) * ($y / $height) + $topColor[2];
            $color = imagecolorallocatealpha($image, $r, $g, $b, 0);
            imageline($image, 0, $y, $width, $y, $color);
        }


        // Bild speichern
        imagepng($image, $filePath);
        imagedestroy($image);

        return $filePath;
    }


}
