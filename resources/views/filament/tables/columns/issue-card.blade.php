<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    <div class="issue-card bg-white dark:bg-gray-800 border-l-4 shadow p-4 rounded
        @if ($getRecord()->type === 'error') border-red-500 dark:border-red-700 error
        @elseif ($getRecord()->type === 'warning') border-yellow-500 dark:border-yellow-600 warning
        @else border-blue-500 dark:border-blue-600 notice
        @endif">
        <div class="flex items-center mb-2">
            <span class="text-sm font-bold uppercase flex items-center
                @if ($getRecord()->type === 'error') text-red-500 dark:text-red-300
                @elseif ($getRecord()->type === 'warning') text-yellow-500 dark:text-yellow-300
                @else text-blue-500 dark:text-blue-300
                @endif">
                @if ($getRecord()->type === 'notice')
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
                {{ ucfirst($getRecord()->type) }}
            </span>
            <span class="ml-auto text-gray-500 dark:text-gray-400 text-xs">WCAG Level: {{ $getRecord()->wcag_level ?? 'Not specified' }}</span>
        </div>
        <h3 class="font-bold text-lg">{{ $getRecord()->translated_message }}</h3>
        <p class="text-sm text-gray-600 dark:text-gray-300 mt-2"><strong>Selector:</strong></p>
        <pre><code class="language-html">{{ $getRecord()->selector }}</code></pre>
        @if ($getRecord()->context)
            <p class="text-sm text-gray-600 dark:text-gray-300 mt-2 "><strong>Context:</strong></p>
            <pre><code class="language-html">{{ $getRecord()->context }}</code></pre>
        @endif
        <p class="text-sm text-gray-600 dark:text-gray-300 mt-2"><strong>Code:</strong> {{ $getRecord()->code }}</p>
        @if (!empty($getRecord()->wcag_links))
            <p class="text-sm text-gray-600 dark:text-gray-300 mt-2"><strong>Info:</strong></p>
            @foreach ($getRecord()->wcag_links as $link)
                <a href="{{ $link }}" class="text-blue-500 dark:text-blue-300 underline" target="_blank">{{ $link }}</a><br>
            @endforeach
        @endif
    </div>
</div>
