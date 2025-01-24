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


        @include('filament.resources.pa11y-accessibility-issues.partials.head', ['slugGrouped' => $slugGrouped, 'slugIndex' => $slugIndex])


        <!-- -->

        <div class="space-y-8 ">



            @foreach ($this->getGroupedRecords() as $code => $issues)

                <!-- Hauptkarte für den Fehlertyp -->
                <div class="issue-group bg-white dark:bg-gray-800 border-l-4 shadow p-4 rounded mb-4
            @if ($issues->first()->type === 'error') border-red-500 dark:border-red-700
            @elseif ($issues->first()->type === 'warning') border-yellow-500 dark:border-yellow-600
            @else border-blue-500 dark:border-blue-600
            @endif">

                    <!-- Titel mit Icon -->
                    <div class="flex items-center mb-2">
                <span class="text-sm font-bold uppercase flex items-center
                    @if ($issues->first()->type === 'error') text-red-500 dark:text-red-300
                    @elseif ($issues->first()->type === 'warning') text-yellow-500 dark:text-yellow-300
                    @else text-blue-500 dark:text-blue-300
                    @endif">

                    <!-- Icon je nach Typ -->
                    @if ($issues->first()->type === 'notice')
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10" fill="currentColor"/>
                            <text x="12" y="16" text-anchor="middle" fill="white" font-size="12" font-weight="bold">i</text>
                        </svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2L22 20H2L12 2Z" stroke="currentColor" stroke-width="2" fill="none"/>
                            <text x="12" y="16" text-anchor="middle" fill="currentColor" font-size="12" font-weight="bold">!</text>
                        </svg>
                    @endif

                    {{ ucfirst($issues->first()->type) }}


                </span>

                        <!-- WCAG Level -->
                        <span class="ml-auto text-gray-500 dark:text-gray-400 text-xs">
                    WCAG Level: {{ $issues->first()->wcag_level ?? 'Not specified' }}


                </span>
                    </div>

                    <!-- Beschreibung -->
                    <h2 class="font-bold text-xl mb-4">{{ $code }}</h2>
                    <p class="text-sm text-gray-600 dark:text-gray-300 mb-4">
                    <h3 class="text-lg" style="padding:right 5em !important;">{{ $issues->first()->translated_message }}</h3>
                    </p>

                    <!-- Aufklappbare Details -->
                    <details class="mt-4">
                        <summary class="cursor-pointer text-md font-bold text-gray-700 dark:text-gray-400">
                            {{ $issues->count() }} {{ $issues->count() === 1 ? 'Vorkommnis' : 'Vorkommnisse' }} anzeigen
                        </summary>
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-4 mt-4">
                            @foreach ($issues as $issue)


                                @include('filament.resources.pa11y-accessibility-issues.issue-card-grouped', ['issue' => $issue])
                            @endforeach
                        </div>

                    </details>

                    @if (!empty($issues->first()->wcag_links))
                        <p class="text-sm text-gray-600 dark:text-gray-300 mt-2"><strong>Info:</strong></p>
                        @foreach ($issues->first()->wcag_links as $link)
                            <a href="{{ $link }}" class="text-blue-500 dark:text-blue-300 underline" target="_blank">{{ $link }}</a><br>
                        @endforeach
                    @endif


                </div>
            @endforeach
        </div>

        {{--<!-- Karten-Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-4">
            @foreach ($this->getRecords() as $issue)
            @include('filament.resources.pa11y-accessibility-issues.issue-card', ['issue' => $issue])
            @endforeach
        </div>
        --}}
        {{--
        <!-- Dropdown für Kartenanzahl -->
        <div class="mb-4">
            <label for="perPage" class="block text-sm font-medium text-gray-700">Karten pro Seite:</label>
            <select id="perPage" name="perPage"
                    class="mt-1 block w-32 pl-3 pr-10 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    onchange="updatePerPage(this.value)">
                <option value="4" {{ request(
                'perPage') == 4 ? 'selected' : '' }}>4</option>
                <option value="6" {{ request(
                'perPage') == 6 ? 'selected' : '' }}>6</option>
                <option value="8" {{ request(
                'perPage') == 8 ? 'selected' : '' }}>8</option>
            </select>
        </div>

        <script>
            function updatePerPage(perPage) {
                const url = new URL(window.location.href);
                url.searchParams.set('perPage', perPage);
                window.location.href = url.toString();
            }
        </script>
        --}}
        <!-- Pagination -->
        <div>
            {{ $this->getRecords()->appends(request()->query())->links() }}
        </div>

    </div>
</x-filament::page>
