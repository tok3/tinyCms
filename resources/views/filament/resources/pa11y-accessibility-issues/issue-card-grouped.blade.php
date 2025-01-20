<div class="issue-card bg-dark dark:bg-gray-900 border-l-4 shadow p-4 rounded
       {{-- @if ($issue->type === 'error') border-red-500 dark:border-red-700 error
        @elseif ($issue->type === 'warning') border-yellow-500 dark:border-yellow-600 warning
        @else border-blue-500 dark:border-blue-600 notice
        @endif--}}">
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

            </span><span class="text-gray-500 dark:text-gray-400 text-xs">#{{$issue->id}}</span>
        <span class="ml-auto text-gray-500 dark:text-gray-400 text-xs">WCAG Level: {{ $issue->wcag_level ?? 'Not specified' }}</span>

    </div>

{{$issue->accessibilityRule->rule_id}}
    <p class="text-sm text-gray-600 dark:text-gray-300 mt-2"><strong>Selector:</strong></p>
    @if ($issue->selector)
    <pre><code class="language-html">{{ $issue->selector }}</code></pre>
    @endif
    @if ($issue->context)
        <p class="text-sm text-gray-600 dark:text-gray-300 mt-2"><strong>Context:</strong></p>
        <pre><code class="language-html">{{ $issue->context }}</code></pre>
    @endif

    <p class="text-sm text-gray-600 dark:text-gray-300 mt-2">

        <strong>Code:</strong> {{ $issue->code }}</p>
    <!-- -->
    {{--  <div class="flex items-center mb-2">
              <span class="text-sm font-bold uppercase flex items-center">
                      <p class="text-sm text-gray-600 dark:text-gray-300 mt-2"><strong>Info:</strong></p>
                 </span>
          <span class="ml-auto text-gray-500 dark:text-gray-400 text-xs">@if($issue->wcag_level == 'A')
                  <a class="ml-auto" href="https://www.w3.org/WAI/WCAG2A-Conformance"
                     title="Explanation of WCAG 2 Level A Conformance">
                  <img height="32" width="88"
                       src="https://www.w3.org/WAI/wcag2A-blue"
                       alt="Level A conformance,
              W3C WAI Web Content Accessibility Guidelines 2.0">
              </a>
              @endif
              @if($issue->wcag_level == 'AA')
                  <a class="ml-auto" href="https://www.w3.org/WAI/WCAG2AA-Conformance"
                     title="Explanation of WCAG 2 Level AA conformance">
                  <img height="32" width="88"
                       src="{{asset('assets/img/wcag2AA-blue')}}"
                       alt="Level AA conformance,
              W3C WAI Web Content Accessibility Guidelines 2.0">
              </a>
              @endif
              @if($issue->wcag_level == 'AAA')

                  <a href="https://www.w3.org/WAI/WCAG2AAA-Conformance"
                     title="Explanation of WCAG 2 Level AAA conformance">
                  <img class="" height="32" width="88"
                       src="https://www.w3.org/WAI/wcag2AAA-blue"
                       alt="Level AAA conformance,
              W3C WAI Web Content Accessibility Guidelines 2.0">
              </a>
              @endif</span>

      </div>--}}
    <!-- -->

  {{--  @if (!empty($issue->wcag_links))
        <p class="text-sm text-gray-600 dark:text-gray-300 mt-2"><strong>Info:</strong></p>
        @foreach ($issue->wcag_links as $link)
            <a href="{{ $link }}" class="text-blue-500 dark:text-blue-300 underline" target="_blank">{{ $link }}</a><br>
        @endforeach
    @endif--}}
</div>
