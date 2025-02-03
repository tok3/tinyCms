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
    <style>
        CODE {
            margin-right: 3px;
            margin-left: 3px;
        }

        .float-box {
            float: right; /* Position the box on the right */
            width: 20%; /* Set the box width to 20% */
            background-color: #f0f0f0;
            border: 1px solid #dadada;
            padding: 10px;
            margin-left: 15px; /* Add space between the box and the text */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            font-family: Arial, sans-serif;
            text-align: center;
        }

        .content {
            overflow: hidden; /* Clears the float and ensures text flows correctly */
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }

    </style>
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


                    </div>


                    <!-- Beschreibung -->
                    <h2 class="font-bold text-xl mb-4">{{ $code }}</h2>

                    <p class="text-sm text-gray-600 dark:text-gray-300 mb-4">
                    <h2 class="mt-5 mb-3 text-xl font-medium text-gray-900 dark:text-white">{{ $issues->first()->translated_message }}</h2>
                    </p>

                    <!-- Grid für Beschreibung und Sidebar -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Hauptinhalt: Beschreibung -->
                        <div class="col-span-2">
                            <!-- Überschrift und Beschreibung -->
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Beschreibung</h3>
                            <p class="mb-4 text-sm font-medium text-gray-800 dark:text-gray-300">
                                {!!  $issues->first()->accessibilityRule->merged_html['description'] ?? 'Not specified'  !!}
                            </p>

                            <!-- Warum ist das Wichtig -->
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Warum ist das Wichtig</h3>
                            <p class="mb-4 text-sm font-medium text-gray-800 dark:text-gray-300">
                                {!!  $issues->first()->accessibilityRule->merged_html['why_important'] ?? 'Not specified'  !!}
                            </p>
                        </div>

                        <!-- Seitenleiste -->
                        <div class="col-span-1">

                            <x-summary-data :accessibility-rule="$issues->first()->accessibilityRule"/>

                        </div>
                    </div>


                    <!-- Aufklappbare Details -->
                    <details class="mt-4">
                        <summary class="cursor-pointer text-md font-bold text-gray-700 dark:text-gray-400">
                            {{ $issues->count() }} {{ $issues->count() === 1 ? 'Vorkommnis' : 'Vorkommnisse' }} anzeigen
                        </summary>


                                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-4 mt-4">

                                @foreach ($issues as $issue)

                                @include('filament.resources.pa11y-accessibility-issues.issue-card-grouped-21', ['issue' => $issue])
                            @endforeach
                        </div>

                    </details>

                    @if (!empty($issue->accessibilityRule->actRuleLinks))
                        <p class="text-sm text-gray-600 dark:text-gray-300 mt-2"><strong>Info:</strong></p>
                        @foreach($issue->accessibilityRule->actRuleLinks as $link)
                            <a href="{{ $link }}" class="text-blue-500 dark:text-blue-300 underline" target="_blank">{{ $link }}</a><br>
                        @endforeach

                    @endif


                </div>
            @endforeach
        </div>


        <!-- Pagination -->
        <div>
            {{ $this->getRecords()->appends(request()->query())->links() }}
        </div>

    </div>
</x-filament::page>
