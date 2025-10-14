@php
    /** @var \App\Models\Company|null $record */
    $record = $getRecord();
    $agency = $record?->agency_company_id
        ? \App\Models\Company::find($record->agency_company_id)
        : null;

    $agencyUrl = $agency
        ? \App\Filament\Resources\Shared\CompanyResource::getUrl('edit', ['record' => $agency->id])
        : null;
@endphp

@if ($agency)
    <div class="rounded-lg border border-primary-200 bg-primary-50 p-3 text-sm flex items-center gap-3">
        <x-filament::badge color="primary" icon="heroicon-o-building-office-2">
            Mandant
        </x-filament::badge>

        <div>
           Agentur:
            <a href="{{ $agencyUrl }}" target="_blank" rel="noopener"
               class="text-primary-700 hover:underline font-medium">
                {{ $agency->name }}
            </a>
            @if($agency->kd_nr)
                <span class="text-gray-500">· KD-{{ $agency->kd_nr }}</span>
            @endif
        </div>
    </div>
@endif
