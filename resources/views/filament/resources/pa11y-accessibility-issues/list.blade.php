<x-filament::page>
@php
    $currentStandard = request()->route('standard', '2.1'); // Aktueller Standard
@endphp
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
                @if( $currentStandard == "2.0")
                @include('filament.resources.pa11y-accessibility-issues.issue-card', ['issue' => $issue])
                @else

                    @include('filament.resources.pa11y-accessibility-issues.issue-card-21', ['issue' => $issue])

                @endif
            @endforeach
        </div>

        <!-- Pagination -->
        <div>

            {{ $this->getRecords()->appends(request()->query())->links() }}
        </div>

    </div>
</x-filament::page>
