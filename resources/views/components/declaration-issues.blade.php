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
        margin-top: 0.5em;
      /*  border-bottom: 1px solid #E0DFEA;*/
    }

    div.standardLogos a {

        margin-left: 0.25em;
        margin-right: 0.25em;

    }

    .why-important {
        margin-top: -0.5rem;
        padding-bottom:1em;
        border-bottom: 1px solid #E0DFEA;
    }

    .why-toggle {
        width: 100%;
        background: #f6f7f9;
        border: 1px solid #e2e5ea;
        border-radius: 6px;
        padding: 8px 12px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: space-between;
        font-size: 0.95rem;
        transition: background 0.15s ease, border-color 0.15s ease;
    }

    .why-toggle:hover {
        background: #eef1f4;
        border-color: #d6dae0;
    }

    .why-toggle-label {
        display: flex;
        align-items: center;
        gap: 0.4rem;
        font-weight: 500;
        color: #2c2c2c;
    }

    .why-arrow {
        font-size: 0.9rem;
        transition: transform 0.2s ease;
        color: #666;
    }

    .why-arrow.open {
        transform: rotate(90deg);
    }

    .why-content {
        margin-top: 0.6rem;
        padding: 12px;
        background: #fafbfc;
        border-left: 3px solid #d1d5db;
        border-radius: 4px;
        font-size: 1rem;
    }

    .mb-5{

        margin-bottom:0.8em !important;
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

    <div class="accIssues" >
        @foreach($issues as $issue)
            <div class="issue" >
                <div class="h6">{{ $issue['translated'] }}</div>

                <div class="mb-0">{!! $issue['rule[merged_html]']['description'] !!}</div>
                <div class="standardLogos">
                    <x-standard-logos :standards="json_decode($issue['rule[standard_logos]'])"/>
                </div>

                <div class="why-important" x-data="{ open: false }">

                    <button
                        class="why-toggle"
                        @click="open = !open"
                        type="button"
                    >


        <span class="why-toggle-label">
            <span class="why-arrow" :class="{ 'open': open }">▶</span>
            Warum das wichtig ist
        </span>

                        <span class="small text-muted" x-text="open ? 'Weniger anzeigen' : 'Mehr anzeigen'"></span>
                    </button>

                    <div
                        class="why-content"
                        x-show="open"
                        x-collapse
                    >
                        {!! $issue['rule[merged_html]']['why_important'] !!}
                    </div>



                </div>
            </div>
        @endforeach
    </div>
@endif
