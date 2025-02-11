@php
    $queryES = request()->except(['standard']); // Alle Parameter außer `standard`
    $currentStandard = request()->route('standard', '2.1'); // Aktueller Standard

    if(Route::currentRouteName() === 'filament.admin.resources.firmament-issues.grouped'){
        $grouped='grouped/' ;
    }
        else{
             $grouped = '';
        }
@endphp
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
    <!-- Linke Spalte -->
    <div class="flex flex-col space-y-4">
        <h2 class="text-lg font-bold">
            Scan Ergebnisse für {{ $this->fetchUrl()->url }}
        </h2>

        @livewire('pa11y-rescan-button', ['urlId' => $this->fetchUrl()->id, 'standard' => $currentStandard])
        <!-- -->
        <div class="flex items-start mb-2">
            <!-- Datum oben -->
            <table>
                <tr>
                    <td>
                        <p class="text-sm text-gray-600 font-bold">

                            Letzter Scan: {{ \Illuminate\Support\Carbon::parse($this->fetchUrl()->last_checked)->locale(app()->getLocale())->isoFormat('LLL') }}


                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="mt-3" role="group">

                            @php
                                $query = request()->getQueryString() ? '?' . request()->getQueryString() : '';
                                $currentRoute = Route::currentRouteName(); // Aktuelle Route

                            @endphp

                                <!-- Link zur gruppierten Ansicht -->
                            <a href="{{ $slugGrouped .'/'.$currentStandard. $query }}"
                               class="text-xs font-medium inline-flex items-center px-4 py-2 text-sm font-medium border border-gray-200 rounded-s-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white  {{ $currentRoute === 'filament.admin.resources.firmament-issues.grouped' ? 'bg-gray-200 text-gray-900 dark:text-gray-400' : 'bg-white dark:text-white'  }}">
                                Anzeige: Gruppiert
                            </a>

                            <!-- Link zur einzelnen Ansicht -->
                            <a disabled href="{{ $slugIndex .'/'.$currentStandard . $query }}"
                               class="text-xs font-medium inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900  border border-gray-200 rounded-e-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700  dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white {{ $currentRoute === 'filament.admin.resources.firmament-issues.index' ? 'bg-gray-200 text-gray-900 dark:text-gray-400' : 'bg-white dark:text-white' }}">
                                Anzeige: Einzeln
                            </a>

                        </div>
                    </td>
                </tr>
            </table>
            <!-- Dynamische Zählung -->
            <span class="ml-auto text-gray-500 dark:text-gray-400 text-xs">
        <div class="space-y-2">
             <p class="text-sm text-red-600">Errors: {{ $this->fetchUrlWithCounts()->error_count }}</p>
                    <p class="text-sm text-yellow-600">Warnings: {{ $this->fetchUrlWithCounts()->warning_count }}</p>
            @if($currentStandard == "2.0")
            <p class="text-sm text-blue-600">Notices: {{ $this->fetchUrlWithCounts()->notice_count }}</p>
                @endif
        </div>
    </span>
        </div>


        <!-- -->

        <!-- wcag filter -->
        <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">WCAG Level</h3>
        <div class="inline-flex rounded-md shadow-sm" role="group">

            <!-- WCAG 2.1 Tab -->

            <a href="{{ \App\Filament\Resources\Shared\Pa11yAccessibilityIssueResource::getUrl('index', [
        'standard' => '2.1',
    ]) . '?' . http_build_query($queryES) }}"
               class="text-xs inline-flex items-center px-4 py-2 text-sm border border-dark rounded-s-lg font-medium {{ $currentStandard === '2.1' ? 'bg-blue-200' : 'bg-white dark:text-gray-700' }}">
                WCAG 2.1
            </a>

            <!-- WCAG 2.0 Tab -->
            <a href="{{ \App\Filament\Resources\Shared\Pa11yAccessibilityIssueResource::getUrl('index', [
        'standard' => '2.0',
    ]) . '?' . http_build_query($queryES) }}"
               class="text-xs inline-flex items-center px-4 py-2 text-sm border border-dark rounded-e-lg font-medium {{ $currentStandard === '2.0' ? 'bg-blue-200' : 'bg-white dark:text-gray-700' }}">
                WCAG 2.0
            </a>
        </div>

        @if(request()->route('standard', '2.1') === '2.0')
            @include('filament.resources.pa11y-accessibility-issues.partials.level_filters')
        @endif

        <div class="flex space-x-4">
            @php
                // Aktuelle URL-Basis
                $baseUrl = url()->current();

                // WCAG-Level-Verarbeitung (als Array sicherstellen)
                $levels = request()->input('levels', '123');
                if (!is_array($levels)) {
                $levels = str_split($levels); // Konvertiere Zeichenkette in Array
                }
                $wcagLevels = implode('', $levels); // WCAG-Level als String

                // Aktuelle Filterparameter
                $currentFilters = request()->except(['type']); // Entferne nur 'type', um den Rest zu behalten
            @endphp

                <!-- All -->
            <a href="{{ $baseUrl . '?' . http_build_query(array_merge($currentFilters, ['type' => '', 'levels' => $wcagLevels])) }}"
               class="px-4 py-2 rounded shadow hover:bg-gray-300 text-black {{ request('type') === null ? 'bg-gray-200' : 'bg-gray-100' }}">
                All ({{ $this->fetchUrlWithCounts()->all_count}})
            </a>
            @if($currentStandard == "2.0")
                <!-- Notices -->
                <a href="{{ $baseUrl . '?' . http_build_query(array_merge($currentFilters, ['type' => 'notice', 'levels' => $wcagLevels])) }}"
                   class="px-4 py-2 rounded shadow hover:bg-blue-300 text-blue-800 {{ request('type') === 'notice' ? 'bg-blue-200' : 'bg-blue-100' }}">
                    Notices ({{ $this->fetchUrlWithCounts()->notice_count }})
                </a>
            @endif

            <!-- Warnings -->
            <a href="{{ $baseUrl . '?' . http_build_query(array_merge($currentFilters, ['type' => 'warning', 'levels' => $wcagLevels])) }}"
               class="px-4 py-2 rounded shadow hover:bg-yellow-300 text-yellow-800 {{ request('type') === 'warning' ? 'bg-yellow-200' : 'bg-yellow-100' }}">
                Warnings ({{ $this->fetchUrlWithCounts()->warning_count }})
            </a>
            <!-- Errors -->
            <a href="{{ $baseUrl . '?' . http_build_query(array_merge($currentFilters, ['type' => 'error', 'levels' => $wcagLevels])) }}"
               class="px-4 py-2 rounded shadow hover:bg-red-300 text-red-800 {{ request('type') === 'error' ? 'bg-red-200' : 'bg-red-100' }}">
                Errors ({{ $this->fetchUrlWithCounts()->error_count }})
            </a>

        </div>


    </div>
    <!-- Rechte Spalte -->
    <div class="hidden md:block flex flex-col space-y-4">
        <div>
            @if($currentStandard == "2.0")
                @livewire('pa11y-chart-widget', ['urlId' => $this->fetchUrl()->id])
            @else
                @livewire('pa11y-chart-widget-21', ['urlId' => $this->fetchUrl()->id])
            @endif
        </div>
    </div>
</div>

