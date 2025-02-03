<div class="issue-card bg-white dark:bg-gray-800 border-l-4 shadow p-4 rounded
        @if ($issue->type === 'error') border-red-500 dark:border-red-700 error
        @elseif ($issue->type === 'warning') border-yellow-500 dark:border-yellow-600 warning
        @else border-blue-500 dark:border-blue-600 notice
        @endif">
    <div class="flex items-center mb-2">
            <span class="text-sm font-bold uppercase flex items-center
                @if ($issue->type === 'error') text-red-500 dark:text-red-300
                @elseif ($issue->type === 'warning') text-yellow-500 dark:text-yellow-300
                @else text-blue-500 dark:text-blue-300
                @endif">
                @if ($issue->type === 'notice')
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

                {{ ucfirst($issue->type) }}
            </span>

        <span class="ml-auto text-gray-500 dark:text-gray-400 text-xs">{{ $issue->accessibilityRule->issue_type }}</span>

    </div>
    <x-impact-bar :impact="$issue->accessibilityRule->impact" />
    <h3 class="font-bold text-lg">{{ $issue->translated_message }}</h3>
    <p class="text-sm text-gray-600 dark:text-gray-300 mt-2"><strong>Selector:</strong></p>
    <pre><code class="language-html">{{ $issue->selector }}</code></pre>

    @if ($issue->context)
        <p class="text-sm text-gray-600 dark:text-gray-300 mt-2"><strong>Context:</strong></p>
        <pre><code class="language-html">{{ $issue->context }}</code></pre>


    @endif

    <p class="text-sm text-gray-600 dark:text-gray-300 mt-2">
        <strong>Code:</strong> {{ $issue->code }}</p>

    <table style="width:100%">
        <tr>
            <td style="width:50%">
                <x-disabilities-list :disabilities="json_decode($issue->accessibilityRule->disabilities)"/>
            </td>
            <td style="text-align: right;">
                {!! $issue->accessibilityRule->wcag_tags !!}
            </td>
        </tr>
    </table>
   {{-- <p class="mt-4">
        <div style="width:50%;">
        {!! $issue->accessibilityRule->wcag_tags !!}
        <x-standard-logos :standards="json_decode($issue->accessibilityRule->standards)" />
    </div>
        <x-disabilities-list :disabilities="json_decode($issue->accessibilityRule->disabilities)"/>
    </p>--}}

    @if (!empty($issue->accessibilityRule->actRuleLinks))
        <p class="text-sm text-gray-600 dark:text-gray-300 mt-2"><strong>Info:</strong></p>
        @foreach($issue->accessibilityRule->actRuleLinks as $link)
            <a href="{{ $link }}" class="text-blue-500 dark:text-blue-300 underline" target="_blank">{{ $link }}</a><br>
        @endforeach

    @endif
</div>
