<?php

namespace App\Filament\Resources\Admin\ContractResource\Pages;

use App\Filament\Resources\Admin\ContractResource;
use App\Models\Contract;
use App\Services\Contracts\ContractLifecycleService;
use Carbon\CarbonImmutable;
use Filament\Actions;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Get;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Auth;

class EditContract extends EditRecord
{
    protected static string $resource = ContractResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('scheduleCancellation')
                ->label('Kündigung vormerken')
                ->color('danger')
                ->visible(fn (): bool => $this->record->status === Contract::STATUS_ACTIVE
                    && $this->record->isRecurring())
                ->form([
                    DatePicker::make('received_on')
                        ->label('Kündigung eingegangen am')
                        ->default(today())
                        ->required(),
                    Placeholder::make('normal_effective_preview')
                        ->label('Normales Vertragsende')
                        ->content(function (Get $get): string {
                            $receivedOn = $get('received_on') ?: today()->toDateString();

                            return app(ContractLifecycleService::class)
                                ->normalEffectiveDate($this->record, CarbonImmutable::parse($receivedOn))
                                ->format('d.m.Y');
                        }),
                    Toggle::make('is_goodwill')
                        ->label('Vorzeitiges Ende aus Kulanz')
                        ->live(),
                    DatePicker::make('goodwill_end')
                        ->label('Kulanz-Ende')
                        ->minDate(today())
                        ->visible(fn (Get $get): bool => (bool) $get('is_goodwill'))
                        ->required(fn (Get $get): bool => (bool) $get('is_goodwill')),
                    Textarea::make('reason')
                        ->label('Grund / Notiz')
                        ->required(fn (Get $get): bool => (bool) $get('is_goodwill')),
                ])
                ->action(function (array $data): void {
                    app(ContractLifecycleService::class)->scheduleCancellation(
                        $this->record->id,
                        CarbonImmutable::parse($data['received_on']),
                        ($data['is_goodwill'] ?? false)
                            ? CarbonImmutable::parse($data['goodwill_end'])
                            : null,
                        $data['reason'] ?? null,
                        Auth::id()
                    );

                    $this->record->refresh();
                    $this->refreshFormData([
                        'end_date',
                        'iteration',
                        'notice_period_months',
                        'renewal_period_months',
                    ]);

                    Notification::make()
                        ->title('Kündigung wurde vorgemerkt')
                        ->success()
                        ->send();
                }),
            Actions\Action::make('revokeCancellation')
                ->label('Kündigung zurücknehmen')
                ->color('warning')
                ->visible(fn (): bool => in_array($this->record->status, [
                    Contract::STATUS_CANCELLATION_PENDING,
                    Contract::STATUS_ENDED,
                ], true) && $this->record->cancellation_effective_at !== null)
                ->form([
                    Textarea::make('reason')
                        ->label('Grund der Rücknahme')
                        ->required(),
                    Checkbox::make('confirm_invoice_fallback')
                        ->label('Auf normale Rechnung umstellen')
                        ->helperText('Das gekündigte Mollie-Abo kann nicht reaktiviert werden.')
                        ->visible(fn (): bool => $this->requiresInvoiceFallback())
                        ->accepted(fn (): bool => $this->requiresInvoiceFallback()),
                ])
                ->action(function (array $data): void {
                    app(ContractLifecycleService::class)->revokeCancellation(
                        $this->record->id,
                        $data['reason'],
                        (bool) ($data['confirm_invoice_fallback'] ?? false),
                        Auth::id()
                    );

                    $this->record->refresh();
                    $this->refreshFormData([
                        'end_date',
                        'iteration',
                        'notice_period_months',
                        'renewal_period_months',
                    ]);

                    Notification::make()
                        ->title('Kündigung wurde zurückgenommen')
                        ->success()
                        ->send();
                }),
        ];
    }

    private function requiresInvoiceFallback(): bool
    {
        return $this->record->subscription_id !== null
            && ($this->record->mollie_canceled_at !== null
                || $this->record->mollieSubscription?->status === 'canceled');
    }
}
