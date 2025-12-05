<x-layouts.blank>
    <section class="position-relative d-flex justify-content-center h-100">
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

                    <p>{{ $declaration->declaration_intro_text_ez }}</p>

                    @if(!empty($company->company_offer_ez))
                        <h3>Beschreibung der Dienstleistung</h3>
                        <p>{{ $company->company_offer_ez }}</p>
                    @endif

                    <h3>Erfüllung der Barrierefreiheitsanforderungen</h3>

                    <h5>Vereinbarkeit</h5>
                    <p> <!-- TODO auch noch in Form reinmachen? -->
                        {{ $declaration->consistency }}
                    </p>

                    <x-declaration-issues
                        :full-text="$declaration->bfsg_full_ez"
                        :partial-text="$declaration->bfsg_partial_ez"
                        :non-conform-text="$declaration->non_conform_content_ez"
                        :issues="$issues"
                    />

                    <p class="mt-5">
                        Diese Erklärung wurde am {{ $declaration->updated_at->format('d.m.Y H:i') }} erstellt.
                        Die Erklärung wurde mithilfe der Aktion-Barrierefrei Software erstellt.
                    </p>

                    @if($declaration->feedback_url)
                        <div>
                            {{ $declaration->feedback_text_ez }}
                            <ul>
                                <li><a href="{{ $declaration->feedback_url }}">{{ $declaration->feedback_url }}</a></li>
                                <li><a href="mailto:{{ $declaration->feedback_email }}">{{ $declaration->feedback_email }}</a></li>
                                <li>{{ $declaration->feedback_phone }}</li>
                                <li>{{ $declaration->feedback_address }}</li>
                            </ul>
                        </div>
                    @endif

                    @if($declaration->market_surveillance_board_address)
                        <h5 class="mt-3">Marktüberwachungsbehörde</h5>
                        <p>{{ $declaration->market_surveillance_board_address_text_ez }}</p>
                        <p>{{ $declaration->market_surveillance_board_address }}</p>
                    @endif

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
