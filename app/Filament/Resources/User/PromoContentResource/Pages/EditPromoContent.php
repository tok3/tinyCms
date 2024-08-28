<?php

namespace App\Filament\Resources\User\PromoContentResource\Pages;

use App\Filament\Resources\User\PromoContentResource;
use App\Models\Company;
use Filament\Resources\Pages\EditRecord;
use App\Helpers\QrPromoHelper;
use App\Models\PromoContent;
use Spatie\Browsershot\Browsershot;

class EditPromoContent extends EditRecord
{
    protected static string $resource = PromoContentResource::class;


    protected function afterSave()
    {
        // Rufe hier deine Funktion zum Generieren des Vorschau-Images auf
        $this->generatePreviewImage($this->record);

        // Lade die Resource neu, um die aktualisierten Daten zu ziehen
        $this->fillForm();
    }

    protected function generatePreviewImage($record)
    {
        // Implementiere hier deine Logik zum Generieren des Vorschau-Images

        $promo = new QrPromoHelper(Company::where('id',$record->company_id)->first());

        if ($record->type == 'nl.subscribe.portrait_bw')
        {
            $promo->portraitBW();
            $record->data = array_merge($record->data, ['image_path' => 'storage/qr_images/' . $record->code_id . '_portrait_bw.png']); // pfad
            $record->save();
        }

        if ($record->type == 'nl.subscribe.pc_landscape')
        {
            $promo->createPostcard();
            $record->data = array_merge($record->data, ['image_path' => 'storage/qr_images/' . $record->code_id . '_pc_landscape.png']); // pfad
            $record->save();
        }
        if ($record->type == 'nl.subscribe.pdf')
        {
            if(isset($record->data['settings']['websiteScreenshot'])  && $record->data['settings']['colorSelectMode'] == 'screenshot')
            {
                $promo->screenshot($record->data['settings']['websiteScreenshot']);


            }


            $record->data = array_merge($record->data, ['image_path' => 'storage/pdfs/' . $record->code_id . '_nl_subscribe.jpg']); // pfad
            $record->save();


            $promo->createPdf();

        }


    }
}
