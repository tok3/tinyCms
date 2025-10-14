@php
    /** @var \App\Models\Company|null $record */
    $record = $getRecord();
    $tenants = $record
        ? \App\Models\Company::query()
            ->where('agency_company_id', $record->id)
            ->orderBy('name')
            ->get()
        : collect();
@endphp

@if ($record && $tenants->count())
    <div class="space-y-2">
        <div class="text-sm text-gray-600">
            {{ $tenants->count() }} Mandant{{ $tenants->count() === 1 ? '' : 'en' }}
        </div>
        <ul class="list-disc pl-5 space-y-1">
            @foreach ($tenants as $c)
                @php
                    $url = \App\Filament\Resources\Shared\CompanyResource::getUrl('edit', ['record' => $c]);
                @endphp
                <li class="flex items-center gap-2">
                    <a href="{{ $url }}" target="_blank" rel="noopener noreferrer"
                       class="text-primary-600 hover:underline">
                        {{ $c->name }}
                    </a>

                    @if ($c->kd_nr)
                        <span class="text-gray-500">KD-{{ $c->kd_nr }}</span>
                    @endif

                    <span class="inline-flex items-center rounded-md bg-gray-100 px-2 py-0.5 text-xs font-medium text-gray-700">
                        Mandant
                    </span>
                </li>
            @endforeach
        </ul>
    </div>
@else
    <div class="text-gray-500">Keine Mandanten vorhanden.</div>
@endif
