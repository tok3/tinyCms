<x-page-layout>

    @section('add-head')

        <link href="{{ URL::asset('js/jquery-smartwizard/dist/css/smart_wizard_all.min.css') }}" rel="stylesheet" type="text/css"/>
        <meta name="csrf-token" content="{{ csrf_token() }}">

    @endsection

    @php
        $paymentModality['daily'] ="pro Tag </br>bei Monatlicher Zahlung";
        $paymentModality['annual'] ="pro Jahr </br>bei jährlicher Zahlung";
        $paymentModality['monthly'] ="pro Monat </br>bei Monatlicher Zahlung";
        $paymentModality['one_time'] ="";
    @endphp
    <script>


    </script>

    <section class="mt-40 jarallax text-white position-relative overflow-hidden bg-gradient-blue-dark" data-speed=".2">
        <!--Section background image parallax-->
        <!--Overlay-->
        <div class="position-absolute w-100 h-100 start-0 top-0 bg-gradient-blue-dark opacity-75"></div>

        <!--begin:Divider shape-->
        <svg class="w-100 position-absolute start-0 bottom-0 z-1 flip-y" style="color: var(--bs-body-bg);" height="64" fill="currentColor" preserveaspectratio="none" viewbox="0 0 1200 120"
             xmlns="http://www.w3.org/2000/svg">
            <path
                d="M0 0v46.29c47.79 22.2 103.59 32.17 158 28 70.36-5.37 136.33-33.31 206.8-37.5 73.84-4.36 147.54 16.88 218.2 35.26 69.27 18 138.3 24.88 209.4 13.08 36.15-6 69.85-17.84 104.45-29.34C989.49 25 1113-14.29 1200 52.47V0z"
                opacity=".25"></path>
            <path
                d="M0 0v15.81c13 21.11 27.64 41.05 47.69 56.24C99.41 111.27 165 111 224.58 91.58c31.15-10.15 60.09-26.07 89.67-39.8 40.92-19 84.73-46 130.83-49.67 36.26-2.85 70.9 9.42 98.6 31.56 31.77 25.39 62.32 62 103.63 73 40.44 10.79 81.35-6.69 119.13-24.28s75.16-39 116.92-43.05c59.73-5.85 113.28 22.88 168.9 38.84 30.2 8.66 59 6.17 87.09-7.5 22.43-10.89 48-26.93 60.65-49.24V0z"
                opacity=".5"></path>
            <path
                d="M0 0v5.63C149.93 59 314.09 71.32 475.83 42.57c43-7.64 84.23-20.12 127.61-26.46 59-8.63 112.48 12.24 165.56 35.4C827.93 77.22 886 95.24 951.2 90c86.53-7 172.46-45.71 248.8-84.81V0z"></path>
        </svg>
        <!--/end:Divider shape-->

        <div class="container py-9 py-lg-11 position-relative">
            <div class="row pb-9">
                <div class="col-lg-10 mx-auto">
                    <div class="position-relative z-1 aos-init aos-animate" data-aos-duration="400" data-aos="fade-up">
                        <!--Subtitle-->
                        <h6 class="mb-5 text-center text-warning">Ihr Weg zur Barrierefreiheit</h6>
                        <!--Quote text-->
                        <h2 class="display-4 fw-medium text-center mb-5">Wählen Sie Ihren Plan – und legen Sie direkt los!</h2>
                    </div>
                </div>
            </div>
        </div>
        <!--Parallax element circle-->
        <div class="jarallax-container" id="jarallax-container-0"
             style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; z-index: -100; clip-path: polygon(0px 0px, 100% 0px, 100% 100%, 0px 100%);"></div>
    </section>

    <section class="py-5 overflow-hidden">
        <div class="container py-9 py-lg-11 position-relative z-1" id="smartWizzardContainer">
            <div class="row pb-5 align-items-start">

                <form action="{{ route('checkout.plan')}}" id="checkout" method="POST">
                    @csrf

                    @if (session()->has('coupon_code'))
                        <input type="hidden" name="coupon_code" value="{{ session('coupon_code') }}">
                    @endif


                    @if (session()->has('product_id'))
                        <input type="hidden" name="product_id" value="{{ session('product_id') }}">
                    @endif
                    <input type="hidden" name="company[name]" value="{{Auth::user()->companies[0]->name}}">
                    {{Auth::user()->companies[0]->mollieCustomer}}

                    <x-site-partials.checkout.summary :products="$products" :paymentModality="$paymentModality"/>

                    <button type="button" id="upgrade" class="btn btn-primary mb-2 me-1 " style="float:right;">Jetzt kostenpflichtig bestellen</button>
                </form>
            </div>
        </div>

    </section>

    <section class="bg-blend-lighten position-relative">


        <!--Divider-->
        <svg class="position-absolute bottom-0 start-0" style="color: var(--bs-dark);" width="100%" height="32" preserveaspectratio="none" viewbox="0 0 1200 96" fill="none"
             xmlns="http://www.w3.org/2000/svg">
            <path d="M1200 96H0L1200 0V96Z" fill="currentColor"></path>
        </svg>


        <div class="container py-9 py-lg-11 position-relative z-1">
            <div class="row pb-5 align-items-start">
                <div class="col-lg-5 mb-7 mb-lg-0 aos-init aos-animate" data-aos="fade-down" data-aos-delay="100">
                    <h6 class="mb-4 text-body-secondary">Profitieren Sie von unserem Rundum-Service für Barrierefreiheit</h6>
                    <h2 class="display-6">Machen Sie Ihre Website barrierefrei – stressfrei und pünktlich!</h2>
                </div>
                <div class="col-lg-7 col-xl-6 ms-xl-auto aos-init aos-animate" data-aos="fade-up" data-aos-delay="150">
                    <p class="mb-5">Ab dem 27. Juni 2025 müssen alle Webseiten den Barrierefreiheitsanforderungen entsprechen. Jetzt ist der perfekte Zeitpunkt, um den nächsten Schritt zu machen und
                        Ihre Seite für alle zugänglich zu gestalten.</p>
                    <p class="mb-5">Unser erfahrenes Team begleitet Sie dabei, Ihre Webseite nicht nur gesetzeskonform, sondern auch benutzerfreundlicher für eine breitere Zielgruppe zu gestalten –
                        und das mit minimalem Aufwand für Sie.</p>
                </div>
            </div>
        </div>
    </section>
    @push('scripts')

        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js?v1.1.9"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js?v1.1.9"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/localization/messages_de.js"></script>
        <script src="{{ URL::asset('js/jquery-smartwizard/dist/js/jquery.smartWizard.min.js') }}"></script>
        <script src="{{ URL::asset('assets/js/checkout.js') }}"></script>


        <script>

            $(document).ready(function () {
                updateProductDetails({{session('product_id')}});

                $('#customer-name').text("{{Auth::user()->name}}");
                $('#company-name').text("{{Auth::user()->companies[0]->name}}");
                $('#customer-address').text("{{Auth::user()->companies[0]->str}}");
                $('#customer-plz-ort').text("{{Auth::user()->companies[0]->plz}}" + ' ' + "{{Auth::user()->companies[0]->ort}}");
                $('#company-email').text("{{Auth::user()->companies[0]->email}}");

            });


        </script>
    @endpush

</x-page-layout>
