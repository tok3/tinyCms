<x-layouts.blank>
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
    <section class="position-relative d-flex justify-content-center h-100">
        <div class=" _bg-dark-subtle d-none d-md-flex position-fixed end-0 top-0 w-md-50 w-lg-60 h-100">

        </div>
        <div class="container z-2 position-relative">
            <div class="row align-items-center vh-100">
                <div class="col-lg-11 pt-3 pb-4 pb-lg-5 pt-lg-5 me-auto col-md-11 z-2">

                    <div class="row align-items-center mb-4 declaration-head">

                        {{-- Logo rechts (aber auf Mobile oben) --}}
                        @if($company->logo_image)
                            <div class="col-12 col-md-4 col-lg-3 text-md-end order-md-2 mb-3 mb-md-0">
                                <a href="{{ url('/') }}" class="d-inline-block">
                                    <img
                                        src="{{ URL::asset('storage/' . $company->logo_image) }}"
                                        class="img-fluid"
                                        alt="{{ $company->name }} Logo"
                                        style="max-height: 80px;"
                                    >
                                </a>
                            </div>
                        @endif

                        {{-- Titel links --}}
                        <div class="col-12 col-md-8 col-lg-9 order-md-1">
                            <h3 class="mb-1">Barrierefreiheitserklärung</h3>
                            <h1 class="mt-0">{{ $company->name }}</h1>
                        </div>

                    </div>


                    <p>
                        {{ $declaration->declaration_intro_text }}
                    </p>

                    <h3>Beschreibung der Dienstleistung</h3>

                    <p>
                        {{ $company->offer }}
                    </p>

                    <h3>Erf&uuml;llung der Barrierefreiheitsanforderungen</h3>

                    <h5>Vereinbarkeit</h5>
                    <p> <!-- TODO auch ncoh in Form reinmachen? -->
                        {{ $declaration->consistency }}
                    </p>
                    {{--  @if($declaration->status === 0) --}}
                    @if(empty($issues))
                        <p>
                            {{ $declaration->bfsg_full }}
                        </p>
                    @else
                        <p>
                            {{ $declaration->bfsg_partial }}
                        </p>
                        <p><strong>{{ $declaration->non_conform_content }}</strong></p>
                        <hr class="my-2">
                        <div class="accIssues">

                            @foreach($issues as $issue)

                                <div class="issue">
                                    <div class="h6">{{ $issue['translated'] }}</div>
                                    <div>{!!  $issue['rule[merged_html]']['description']  !!}</div>

                                    {{-- Toggle-Bereich --}}
                                    <div class="why-important " x-data="{ open: false }">

                                        <button
                                            class="why-toggle"
                                            @click="open = !open"
                                            type="button"
                                        >
                                            <span class="why-arrow" :class="{ 'open': open }">▶</span>
                                            <span class="why-toggle-label small">Warum das wichtig ist <i class="bi bi-info-circle"></i></span>
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
                    <p>
                        Diese Erklärung wurde am {{ $declaration->updated_at->format('d.m.Y H:i')  }} erstellt. Die Erklärung wurde mithilfe der Aktion-Barrierefrei Software erstellt.
                    </p>

                    @if($declaration->feedback_url !== null && $declaration->feedback_url !== '' )
                        <p>
                        {{ $declaration->feedback_text }}
                        <ul>
                            <li><a href="{{ $declaration->feedback_url }}">{{ $declaration->feedback_url }}</a></li>
                            <li><a href="mailto:{{ $declaration->feedback_email }}">{{ $declaration->feedback_email }}</a></li>
                            <li>{{ $declaration->feedback_phone }}</li>
                            <li>{{ $declaration->feedback_address }}</li>
                        </ul>
                        </p>
                    @endif

                    {{ $declaration->market_surveillance_board_address }}
                    @if($declaration->market_surveillance_board_address !== null && $declaration->market_surveillance_board_address !== ''    )
                        <h5>Markt&uuml;berwachungsbeh&ouml;rde</h5>
                        <p>
                            {{ $declaration->market_surveillance_board_address_text }}


                        </p>
                        <p>
                            {{ $declaration->market_surveillance_board_address }}
                        </p>
                    @endif


                </div>

            </div>
        </div>
        </div>
    </section>


    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js?v1.1.9"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js?v1.1.9"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/localization/messages_de.js"></script>
        <script src="{{ URL::asset('js/jquery-smartwizard/dist/js/jquery.smartWizard.min.js') }}"></script>

    @endpush
</x-layouts.blank>





