<style>

    .issue {
        padding-left: 2em;
        padding-right: 2em;
        padding-top: 1.5em;


    }

    div.accIssues code,
    div.accIssues strong {
        margin-left: 0.25em;
        margin-right: 0.25em;
    }

    div.standardLogos {
        margin-top: 1em;
        border-bottom: 1px solid #E0DFEA;
    }

    div.standardLogos a {

        margin-left: 0.25em;
        margin-right: 0.25em;

    }

    .why-important {
        margin-top: -20px;

    }

    .why-toggle {
        background: none;
        border: 0;
        padding: 0;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 0.4rem;
        font: inherit;
    }

    .why-arrow {
        font-size: 1.0rem; /* Größe wie im Screenshot */
        display: inline-block;
        transition: transform 0.2s ease;
        color: #535353;
    }

    .why-arrow.open {
        transform: rotate(90deg); /* ▶ wird zu ► oder ▼ */
    }

    .why-content {
        margin-top: 0.6rem;
        padding-left: 1.6rem;
        padding-right: 1.6rem;
        font-size: 1.05rem;
    }
</style>

@if(empty($issues))
    <p>
        {{ $fullText }}
    </p>
@else
    <p>
        {{ $partialText }}
    </p>

    @if($nonConformText)
        <p><strong>{{ $nonConformText }}</strong></p>
    @endif

    <hr class="my-2">

    <div class="accIssues">
        @foreach($issues as $issue)
            <div class="issue">
                <div class="h6">{{ $issue['translated'] }}</div>

                <div>{!! $issue['rule[merged_html]']['description'] !!}</div>

                <div class="why-important" x-data="{ open: false }">
                    <button
                        class="why-toggle"
                        @click="open = !open"
                        type="button"
                    >
                        <span class="why-arrow" :class="{ 'open': open }">▶</span>
                        <span class="why-toggle-label small">
                            Warum das wichtig ist
                        </span>
                    </button>

                    <div
                        class="why-content"
                        x-show="open"
                        x-collapse
                    >
                        {!! $issue['rule[merged_html]']['why_important'] !!}
                    </div>

                    <div class="standardLogos">
                        <x-standard-logos :standards="json_decode($issue['rule[standard_logos]'])"/>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
