@php
    /** @var \App\Models\User|null $record */
    $record = $getRecord();
@endphp

@if ($record && $record->companies && $record->companies->count())
    <ul class="list-disc pl-5 space-y-1">
        @foreach ($record->companies as $c)
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

                @if ((int) ($c->is_agency ?? 0) === 1)
                    <span class="inline-flex items-center rounded-md bg-amber-100 px-2 py-0.5 text-xs font-medium text-amber-800">
                        Agentur
                    </span>
                @elseif ((int) ($c->billing_via_agency ?? 0) === 1 || !empty($c->agency_company_id))
                    <span class="inline-flex items-center rounded-md bg-gray-100 px-2 py-0.5 text-xs font-medium text-gray-700">
                        Mandant
                    </span>
                @endif
            </li>
        @endforeach
    </ul>
@else
    —
@endif
