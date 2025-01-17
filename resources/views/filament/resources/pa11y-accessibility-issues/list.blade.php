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



        <!-- Karten-Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-4">
            @foreach ($records as $issue)
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
