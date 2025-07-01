@php($state = $getState())

<div {{ $attributes }}>
    {{-- kleines Vorschaubild in der Tabelle --}}
    <img
        src="{{ $state['url'] }}"
        alt="Vorschaubild"
        class="h-10 w-10 object-cover rounded cursor-help"
        x-data
        x-tooltip.html
        x-tooltip.raw="
            <div class='p-2 text-sm max-w-xs'>
                {{-- zentriertes Bild --}}
                <img
                    src='{{ $state['url'] }}'
                    alt='Vorschau'
                    class='block mx-auto mb-2 max-h-48 object-contain rounded'
                />
                <p><strong>URL:</strong> {{ $state['url'] }}</p>
                <p class='my-2 border-dotted border-gray-300' ><strong>Beschreibung:</strong> {{ $state['alt'] }}</p>

            </div>
        "
        x-tooltip.interactive
    />
</div>
