<x-layouts.blank>
    <section class="position-relative d-flex justify-content-center h-100">
        <div class=" _bg-dark-subtle d-none d-md-flex position-fixed end-0 top-0 w-md-50 w-lg-60 h-100">

        </div>
        <div class="container z-2 position-relative">
            <div class="row align-items-center vh-100">
                <div class="col-lg-11 pt-3 pb-4 pb-lg-5 pt-lg-5 me-auto col-md-6 z-2">
                    <div>
                        <h3>Barrierefreiheitserklärung</h3>
                        <!--:Logo: TODO Link auf incluCert-->
                        <a class="navbar-brand" style="float: right;" href="{{url('/')}}">

                            @if($company->logo_image !== null)
                                <img src="{{ URL::asset('storage/' . $company->logo_image) }}" class="width-10x navbar-brand-light mb-5">
                            @endif
                        </a>
                        <h1>{{ $company->name }}</h1>


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
                            <ul>
                                @foreach($issues as $issue)
                                    <li>{{ $issue['desc'] }}</li>
                                    <li>{{ $issue['translated'] }}</li>
                                @endforeach
                            </ul>

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
        </div>
    </section>


    @push('scripts')

        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js?v1.1.9"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js?v1.1.9"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/localization/messages_de.js"></script>
        <script src="{{ URL::asset('js/jquery-smartwizard/dist/js/jquery.smartWizard.min.js') }}"></script>

    @endpush
</x-layouts.blank>





