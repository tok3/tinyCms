<x-filament::page>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/styles/default.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/highlight.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('code').forEach((block) => {
                hljs.highlightElement(block);
            });

        });
    </script>
    <div class="space-y-4">


        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <!-- Linke Spalte -->
            <div class="flex flex-col space-y-4">
                <h2 class="text-lg font-bold mb-4">
                    Scan Ergebnisse für {{ $this->fetchUrl()->url }}
                </h2>


                <!-- -->
                <div class="flex items-start mb-2">
                    <!-- Datum oben -->
                    <p class="text-sm text-gray-600 font-bold">
                        Letzter Scan: {{ \Illuminate\Support\Carbon::parse($this->fetchUrl()->last_checked)->locale(app()->getLocale())->isoFormat('LLL') }}

                    </p>

                    <!-- Dynamische Zählung -->
                    <span class="ml-auto text-gray-500 dark:text-gray-400 text-xs">
        <div class="space-y-2">
             <p class="text-sm text-red-600">Errors: {{ $this->fetchUrlWithCounts()->error_count }}</p>
                    <p class="text-sm text-yellow-600">Warnings: {{ $this->fetchUrlWithCounts()->warning_count }}</p>
                    <p class="text-sm text-blue-600">Notices: {{ $this->fetchUrlWithCounts()->notice_count }}</p>
        </div>
    </span>
                </div>


                <!-- -->

                <!-- wcag filter -->
                <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">WCAG Level</h3>
                <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    @php
                        // Standardmäßig sind alle aktiv (123)
                        $selectedLevels = str_split(request()->get('levels', '123'));
                        $levelMap = ['1' => 'A', '2' => 'AA', '3' => 'AAA'];
                    @endphp

                    @foreach ($levelMap as $key => $label)
                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                            <div class="flex items-center ps-3">
                                <input
                                    id="level-{{ $label }}"
                                    type="checkbox"
                                    name="levels[]"
                                    value="{{ $key }}"
                                    @checked(in_array($key, $selectedLevels))
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                    onchange="handleFilterChange(this)">
                                <label for="level-{{ $label }}" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    <span class="text-gray-500">WCAG2</span>{{ $label }}
                                </label>
                            </div>
                        </li>
                    @endforeach
                </ul>

                <script>
                    function handleFilterChange(checkbox) {
                        const url = new URL(window.location.href);
                        const selectedCheckboxes = document.querySelectorAll('input[name="levels[]"]:checked');

                        // Entferne alle bestehenden 'levels' Parameter
                        url.searchParams.delete('levels');

                        // Füge die neuen Level-Parameter basierend auf den ausgewählten Checkboxen hinzu
                        const selectedLevels = Array.from(selectedCheckboxes).map(cb => cb.value).join('');
                        if (selectedLevels) {
                            url.searchParams.set('levels', selectedLevels);
                        }

                        // Seite neu laden mit aktualisierten Parametern
                        window.location.href = url.toString();
                    }
                </script>
                <!-- ende filter -->
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

                    <!-- Notices -->
                    <a href="{{ $baseUrl . '?' . http_build_query(array_merge($currentFilters, ['type' => 'notice', 'levels' => $wcagLevels])) }}"
                       class="px-4 py-2 rounded shadow hover:bg-blue-300 text-blue-800 {{ request('type') === 'notice' ? 'bg-blue-200' : 'bg-blue-100' }}">
                        Notices ({{ $this->fetchUrlWithCounts()->notice_count }})
                    </a>


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
                    @livewire('pa11y-chart-widget', ['urlId' => $this->fetchUrl()->id])
                </div>
            </div>
        </div>


        <!-- Karten-Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-4">
            @foreach ($this->getRecords() as $issue)
                @include('filament.resources.pa11y-accessibility-issues.issue-card', ['issue' => $issue])
            @endforeach
        </div>
        {{--
                <!-- Dropdown für Kartenanzahl -->
                <div class="mb-4">
                    <label for="perPage" class="block text-sm font-medium text-gray-700">Karten pro Seite:</label>
                    <select id="perPage" name="perPage" class="mt-1 block w-32 pl-3 pr-10 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" onchange="updatePerPage(this.value)">
                        <option value="4" {{ request('perPage') == 4 ? 'selected' : '' }}>4</option>
                        <option value="6" {{ request('perPage') == 6 ? 'selected' : '' }}>6</option>
                        <option value="8" {{ request('perPage') == 8 ? 'selected' : '' }}>8</option>
                    </select>
                </div>

                <script>
                    function updatePerPage(perPage) {
                        const url = new URL(window.location.href);
                        url.searchParams.set('perPage', perPage);
                        window.location.href = url.toString();
                    }
                </script>--}}
        <!-- Pagination -->
        <div>
            {{ $this->getRecords()->appends(request()->query())->links() }}
        </div>

    </div>
</x-filament::page>
