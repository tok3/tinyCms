<x-declaration-layout>
    <section class="position-relative d-flex justify-content-center h-100">
        <div class=" _bg-dark-subtle d-none d-md-flex position-fixed end-0 top-0 w-md-50 w-lg-60 h-100">
            <!--Divider shape-->
            <!--
            <svg class="position-absolute start-0 top-0 h-100 z-1" style="color: var(--bs-body-bg);" width="80" height="1096" preserveAspectRatio="none" viewBox="0 0 58 1096" fill="none"
                 xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.24" fill-rule="evenodd" clip-rule="evenodd"
                      d="M58 1096L53.2727 1034.97C48.3636 973.947 38.7273 852.719 39.8182 730.667C41.0909 608.614 53.2727 487.386 52 365.333C50.7273 243.281 36.3636 122.053 29.0909 61.0263L21.8182 2.02656e-06H-1.72853e-06L-1.72853e-06 61.0263C-1.72853e-06 122.053 -1.72853e-06 243.281 -1.72853e-06 365.333C-1.72853e-06 487.386 -1.72853e-06 608.614 -1.72853e-06 730.667C-1.72853e-06 852.719 -1.72853e-06 973.947 -1.72853e-06 1034.97L-1.72853e-06 1096H58Z"
                      fill="currentColor"></path>

                <path clip-rule="evenodd"
                      d="M37 1096L33.9843 1034.97C30.8527 973.947 24.7053 852.719 25.4013 730.667C26.2132 608.614 33.9843 487.386 33.1724 365.333C32.3605 243.281 23.1975 122.053 18.558 61.0263L13.9185 2.02656e-06H1.11014e-06L1.11014e-06 61.0263C1.11014e-06 122.053 1.11014e-06 243.281 1.11014e-06 365.333C1.11014e-06 487.386 1.11014e-06 608.614 1.11014e-06 730.667C1.11014e-06 852.719 1.11014e-06 973.947 1.11014e-06 1034.97L1.11014e-06 1096H37Z"
                      fill="currentColor"></path>
            </svg>
        -->
            <!--Image-->
           <!-- <img src="{{url('assets/img/backgrounds/inclusion-7304412_1280.png')}}" alt="" class="bg-image">-->
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

    <h4>Bundesland</h4>

    <p>
        {{ $declaration->federal_state }} nach
        @if($declaration->federal_or_state_law == 0)
            Bundesrecht
        @else
            Landesrecht
        @endif
    </p>



    <h4>Geltungsbereich</h4>
    <p>
        {{ $declaration->scope }}
    </p>

    <h3>Erf&uuml;llung der Barrierefreiheitsanforderungen</h3>

    <h5>Vereinbarkeit</h5>
    <p>
        {{ $declaration->consistency }}.
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
    <div>
        {{ $declaration->feedback_text }}
        <ul>
            <li><a href="{{ $declaration->feedback_url }}">{{ $declaration->feedback_url }}</a></li>
            <li><a href="mailto:{{ $declaration->feedback_email }}">{{ $declaration->feedback_email }}</a></li>
            <li>{{ $declaration->feedback_phone }}</li>
            <li>{{ $declaration->feedback_address }}</li>
        </ul>
    </div>
    @endif


    @if($declaration->acc_enforcement_agencies !== null && $declaration->acc_enforcement_agencies !== ''    )
        <h5>Durchsetzungsstelle</h5>
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
        <!--</div>-->
    </section>


    @push('scripts')

        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js?v1.1.9"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js?v1.1.9"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/localization/messages_de.js"></script>
        <script src="{{ URL::asset('js/jquery-smartwizard/dist/js/jquery.smartWizard.min.js') }}"></script>


    @endpush
</x-declaration-layout>










