<x-filament::page>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/styles/default.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/highlight.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            document.querySelectorAll('code').forEach((block) => {
                hljs.highlightElement(block);
            });

            // Filter functionality
            document.querySelectorAll('.filter-button').forEach(button => {
                button.addEventListener('click', () => {
                    const type = button.getAttribute('data-type');
                    document.querySelectorAll('.issue-card').forEach(card => {
                        if (type === 'all' || card.classList.contains(type)) {
                            card.style.display = 'block';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                });
            });
        });
    </script>



    {{--<!-- Rescan Button für spezifische URL -->
    <form action="{{ route('pa11y.url.rescan', $url->id) }}" method="POST">
        @csrf
        <button type="submit" class="filament-button filament-button-primary">
            Rescan URL
        </button>
    </form>

    <form action="{{ route('pa11y.urls.rescan.all') }}" method="POST">
        @csrf
        <button type="submit" class="filament-button filament-button-primary">
            Rescan All URLs
        </button>
    </form>--}}
    <h2 class="text-lg font-bold mb-4">{{ \App\Services\MessageTranslationService::translate('Scan Results for', 'de_DE') }}</p> {{ $url->url }}</h2>
    <p class="text-sm text-gray-600">Last Checked: {{ $url->last_checked }}</p>

    @php
        $notices = $url->accessibilityIssues->where('type', 'notice')->count();
        $warnings = $url->accessibilityIssues->where('type', 'warning')->count();
        $errors = $url->accessibilityIssues->where('type', 'error')->count();
    @endphp

    @if ($url->accessibilityIssues->isEmpty())
        <div class="bg-green-100 text-green-800 p-4 rounded shadow">
            <p>No accessibility issues found.</p>
        </div>
    @else
        {{-- Filter Summary --}}
        <div class="flex space-x-4 mb-6">
            <button data-type="all" class="filter-button bg-gray-200 px-4 py-2 rounded shadow hover:bg-gray-300" style="color:black !important">
               All ({{ $notices + $warnings + $errors }})
            </button>
            <button data-type="notice" class="filter-button bg-blue-100 text-blue-800 px-4 py-2 rounded shadow hover:bg-blue-200">
                Notices ({{ $notices }})
            </button>
            <button data-type="warning" class="filter-button bg-yellow-100 text-yellow-800 px-4 py-2 rounded shadow hover:bg-yellow-200">
                Warnings ({{ $warnings }})
            </button>
            <button data-type="error" class="filter-button bg-red-100 text-red-800 px-4 py-2 rounded shadow hover:bg-red-200">
                Errors ({{ $errors }})
            </button>
        </div>
was geht hier ?
        {{-- Issues Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-4">

            {{--<p class="text-[clamp(0.7rem,_3vw,_1rem)]">
                This text will have a dynamic font size that adjusts based on the viewport width.
            </p>
           --}}
            @foreach ($url->accessibilityIssues as $issue)

                <div class="issue-card bg-white dark:bg-gray-800 border-l-4 shadow p-4 rounded
                    @if($issue->type === 'error') border-red-500 dark:border-red-700 error
                    @elseif($issue->type === 'warning') border-yellow-500 dark:border-yellow-600 warning
                    @else border-blue-500 dark:border-blue-600 notice
                    @endif">
                    <div class="flex items-center mb-2">
                    <span class="text-sm font-bold uppercase flex items-center
                        @if($issue->type === 'error') text-red-500 dark:text-red-300
                        @elseif($issue->type === 'warning') text-yellow-500 dark:text-yellow-300
                        @else text-blue-500 dark:text-blue-300
                        @endif">
                        @if($issue->type === 'notice')
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" fill="currentColor"/><text x="12" y="16"
                                                                                                                                                                                           text-anchor="middle"
                                                                                                                                                                                           fill="white"
                                                                                                                                                                                           font-size="12"
                                                                                                                                                                                           font-weight="bold">i</text></svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L22 20H2L12 2Z" stroke="currentColor" stroke-width="2" fill="none"/><text
                                        x="12" y="16" text-anchor="middle" fill="currentColor" font-size="12" font-weight="bold">!</text></svg>
                        @endif
                        {{ ucfirst($issue->type) }}
                    </span>
                        <span class="ml-auto text-gray-500 dark:text-gray-400 text-xs">WCAG Level: {{ $issue->wcag_level ?? 'Not specified' }}</span>
                    </div>
                    <h3 class="font-bold text-lg">{{ $issue->translated_message }}</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300 mt-2"><strong>Selector:</strong></p>
                    <pre><code class="language-html">{{ $issue->selector }}</code></pre>
                    @if($issue->context)
                        <p class="text-sm text-gray-600 dark:text-gray-300 mt-2 "><strong>Context:</strong></p>
                        <pre><code class="language-html">{{ $issue->context }}</code></pre>
                    @endif
                    <p class="text-sm text-gray-600 dark:text-gray-300 mt-2"><strong>Code:</strong> {{ $issue->code }}</p>
                    @if(!empty($issue->wcag_links))
                        <p class="text-sm text-gray-600 dark:text-gray-300 mt-2"><strong>Info:</strong></p>
                        @foreach($issue->wcag_links as $link)
                            <a href="{{ $link }}" class="text-blue-500 dark:text-blue-300 underline" target="_blank">{{ $link }}</a><br>
                        @endforeach
                    @endif
                </div>

            @endforeach
        </div>
    @endif
</x-filament::page>
