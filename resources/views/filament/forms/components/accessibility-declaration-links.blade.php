@php
    use App\Models\Company;
    use Filament\Facades\Filament;

    // Aktuelles Record aus dem Formular holen
    $record = $getRecord();

    $company = null;

    if ($record && $record->company_id) {
        $company = Company::find($record->company_id);
    } else {
        $tenant = Filament::getTenant();
        $company = $tenant instanceof Company ? $tenant : null;
    }

    if ($company && $company->slug) {
    $url = route('a11y.declaration.show', [
        'slug' => $company->slug,
    ]);

    $urlEz = route('a11y.declaration-ez.show', [
        'slug' => $company->slug,
    ]);
    }

    // Publish-Status aus dem Record holen
    $published = (bool) ($record->published ?? false);
@endphp

@if (! isset($url))
    <p class="text-sm text-gray-500">
        Kein Unternehmen oder Slug verfügbar.
    </p>
@else
    <div class="p-5 border border-gray-200 rounded-xl bg-gray-50 space-y-4 text-sm shadow-sm">

        <div class="flex items-center justify-between mb-1">
            <h3 class="text-sm font-semibold text-gray-800">
                Öffentliche Erklärungs-Seiten
            </h3>

            <div class="flex items-center gap-2">
                <span class="text-xs text-gray-500">Status:</span>

                @if($published)
                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                        <span class="w-1.5 h-1.5 rounded-full bg-green-500 mr-1"></span>
                        Veröffentlicht
                    </span>
                @else
                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-600">
                        <span class="w-1.5 h-1.5 rounded-full bg-gray-400 mr-1"></span>
                        Nicht veröffentlicht
                    </span>
                @endif
            </div>
        </div>

        @unless($published)
            <p class="text-xs text-gray-500">
                Die Links sind erst aktiv, wenn die Barrierefreiheitserklärung veröffentlicht ist.
            </p>
        @endunless

        {{-- Standard-Version --}}
        <div x-data="{ copied: false }" class="flex flex-wrap items-center gap-3">
            <span class="font-medium w-40 text-gray-700 flex items-center gap-1">
                <x-filament::icon name="heroicon-o-globe-alt" class="w-4 h-4 text-gray-600"/>
                Standard
            </span>

            <x-filament::button
                    tag="a"
                    :href="$url"
                    target="_blank"
                    size="xs"
                    color="primary"
                    icon="heroicon-m-eye"
                    :disabled="! $published"
            >
                Seite anzeigen
            </x-filament::button>

            <x-filament::button
                    size="xs"
                    color="gray"
                    icon="heroicon-m-clipboard"
                    :disabled="! $published"
                    x-on:click="
                    navigator.clipboard.writeText('{{ $url }}');
                    copied = true;
                    setTimeout(() => copied = false, 2000);
                "
            >
                Link kopieren
            </x-filament::button>

            <span x-show="copied" x-cloak class="text-xs text-green-600">
                Kopiert
            </span>
        </div>

        {{-- Leichte Sprache --}}
        <div x-data="{ copied: false }" class="flex flex-wrap items-start gap-3">
            <span class="font-medium w-40 text-gray-700 flex items-center gap-1">
                <x-filament::icon name="heroicon-o-sparkles" class="w-4 h-4 text-gray-600"/>
                Leichte Sprache
            </span>

            <div class="flex flex-wrap items-center gap-3">
                <x-filament::button
                        tag="a"
                        :href="$urlEz"
                        target="_blank"
                        size="xs"
                        color="primary"
                        icon="heroicon-m-eye"
                        :disabled="! $published"
                >
                    Seite anzeigen
                </x-filament::button>

                <x-filament::button
                        size="xs"
                        color="gray"
                        icon="heroicon-m-clipboard"
                        :disabled="! $published"
                        x-on:click="
                        navigator.clipboard.writeText('{{ $urlEz }}');
                        copied = true;
                        setTimeout(() => copied = false, 2000);
                    "
                >
                    Link kopieren
                </x-filament::button>

                <span x-show="copied" x-cloak class="text-xs text-green-600">
                    Kopiert
                </span>
            </div>
        </div>

        <p class="mt-1 text-xs text-gray-600">
            Hinweis: Inhalte in Leichter Sprache werden nach dem Speichern automatisch generiert und können anschließend frei angepasst werden.
        </p>

    </div>
@endif
