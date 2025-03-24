<?php

namespace App\Filament\Resources\Admin\PromotionResource\Pages;

use App\Filament\Resources\Admin\PromotionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;
use App\Models\Coupon;

class EditPromotion extends EditRecord
{
    protected static string $resource = PromotionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\Action::make('generateCoupons')
                ->label('Codes generieren')
                ->modalHeading('Gutscheincodes generieren')
                ->form([
                    \Filament\Forms\Components\TextInput::make('quantity')
                        ->label('Anzahl der Codes')
                        ->numeric()
                        ->minValue(1)
                        ->required(),
                    \Filament\Forms\Components\Checkbox::make('infinite')
                        ->label('Unbegrenzt einlösbar')
                        ->helperText('Wird beim einlösen nicht entwertet, kann somit an unzählige Personen/Organisationen ausgehändigt werden.')
                        ->required(),

                ])
                ->action(function (array $data, $record) {
                    $this->generateCoupons($data,$record);
                }),
        ];
    }


    protected function getActions(): array
    {
        /*return [
            Actions\DeleteAction::make(),
            Actions\Action::make('generateCoupons')
                ->label('Codes generieren')
                ->modalHeading('Gutscheincodes generieren')
                ->form([
                    \Filament\Forms\Components\TextInput::make('quantity')
                        ->label('Anzahl der Codes')
                        ->numeric()
                        ->minValue(1)
                        ->required(),
                    \Filament\Forms\Components\DatePicker::make('valid_till')
                        ->label('Gültig bis')
                        ->required(),
                ])
                ->action(function (array $data, $record) {
                    $this->generateCoupons($data['quantity'], $data['valid_till'], $record);
                }),
        ];*/
    }

    protected function generateCoupons(array $data,  $promotion)
    {
        $coupons = [];

        for ($i = 0; $i < $data['quantity']; $i++) {
            $code = $this->generateUniqueCode();
            $coupons[] = [
                'promotion_id' => $promotion->id,
                'code' => $code,
                'infinite' => $data['infinite'],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        Coupon::insert($coupons);

        Notification::make()
            ->title('Gutscheincodes erfolgreich generiert')
            ->success()
            ->send();
    }

    protected function generateUniqueCode(): string
    {
        do {
            // Erzeuge einen einzigartigen 8-stelligen Code
            $code = strtoupper(bin2hex(random_bytes(4)));
        } while (Coupon::where('code', $code)->exists());

        return $code;
    }
}
