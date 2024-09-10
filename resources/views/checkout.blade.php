<x-page-layout>
    <section class="mt-40 jarallax text-white position-relative overflow-hidden bg-gradient-blue-dark" data-speed=".2"><!--Section background image parallax--> <!--Overlay-->
        <div class="position-absolute w-100 h-100 start-0 top-0 bg-gradient-blue-dark opacity-75"></div>
        <!--begin:Divider shape--><svg class="w-100 position-absolute start-0 bottom-0 z-1 flip-y" style="color: var(--bs-body-bg);" height="64" fill="currentColor" preserveaspectratio="none" viewbox="0 0 1200 120" xmlns="http://www.w3.org/2000/svg"><path d="M0 0v46.29c47.79 22.2 103.59 32.17 158 28 70.36-5.37 136.33-33.31 206.8-37.5 73.84-4.36 147.54
     16.88 218.2 35.26 69.27 18 138.3 24.88 209.4
     13.08 36.15-6 69.85-17.84 104.45-29.34C989.49 25 1113-14.29 1200 52.47V0z" opacity=".25"></path> <path d="M0 0v15.81c13 21.11 27.64 41.05 47.69 56.24C99.41 111.27 165 111 224.58 91.58c31.15-10.15
      60.09-26.07 89.67-39.8 40.92-19 84.73-46 130.83-49.67 36.26-2.85 70.9 9.42 98.6 31.56 31.77 25.39
      62.32 62 103.63 73 40.44 10.79 81.35-6.69 119.13-24.28s75.16-39 116.92-43.05c59.73-5.85
      113.28 22.88 168.9 38.84 30.2 8.66 59 6.17 87.09-7.5 22.43-10.89 48-26.93 60.65-49.24V0z" opacity=".5"></path> <path d="M0 0v5.63C149.93 59 314.09 71.32 475.83 42.57c43-7.64 84.23-20.12 127.61-26.46 59-8.63
    112.48 12.24 165.56 35.4C827.93 77.22 886 95.24 951.2 90c86.53-7 172.46-45.71 248.8-84.81V0z"></path></svg><!--/end:Divider shape-->
        <div class="container py-9 py-lg-11 position-relative">
            <div class="row pb-9">
                <div class="col-lg-10 mx-auto">
                    <div class="position-relative z-1 aos-init aos-animate" data-aos-duration="400" data-aos="fade-up"><!--Subtitle-->
                        <h6 class="mb-5 text-center text-warning">Ihr Weg zur Barrierefreiheit</h6>
                        <!--Quote text-->
                        <h2 class="display-4 fw-medium text-center mb-5">Wählen Sie Ihren Plan – und legen Sie direkt los!</h2>

                    </div>
                </div>
            </div>
        </div>
        <!--Parallax element circle-->

        <div class="jarallax-container" id="jarallax-container-0" style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; z-index: -100; clip-path: polygon(0px 0px, 100% 0px, 100% 100%, 0px 100%);"></div>
    </section>
    <section class="position-relative">
        <div class="container pt-9 pt-lg-11">


            <!--Price Container-->
            <div class="container">
                <div class="row mb-4 justify-content-center text-center">
                    <div class="col-xl-9">
                        <h2 class="mb-4">Bitte wählen Sie Ihren Plan und Ihre bevorzugte Zahlungsoption</h2>
                       </div>
                </div>
                <div class="d-flex align-items-center justify-content-center mb-7 mb-lg-7">
                    <div class="price-annually fs-5 position-relative">
                        <strong>Monatlich</strong>
                    </div>
                    <!-- Switch -->
                    <div class="form-check form-pricing-switch form-switch mx-3">
                        <input class="form-check-input me-0" type="checkbox" id="planSwitch">
                        <label class="form-check-label" for="planSwitch"></label>
                    </div>
                    <div class="price-monthly fs-5">
                        <strong>Jährlich</strong>
                    </div>
                </div>
@php
$paymentModality['annual'] ="pro Jahr </br>bei jährlicher Zahlung";
$paymentModality['monthly'] ="pro Monat </br>bei Monatlicher Zahlung";
@endphp
            @foreach($products as $product)
                    <form action="{{ route('checkout.plan') }}" method="POST">
                        @csrf  <!-- CSRF Protection -->
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="container py-3 py-lg-3 plan" data-plan="{{$product->interval}}">
                        <div class="bg-body overflow-hidden shadow-lg px-4 py-2 px-lg-5">
                            <div class="row align-items-center ">
                                <!-- On small screens (sm) we use a card layout -->
                                <div class="col-lg-1 col-md-1 col-12 mb-3 mb-md-0 text-center text-md-start">
                                    <i class="h1 bi bi-shield-shaded"></i>
                                </div>
                                <div class="col-lg-3 col-md-4 col-12 text-center text-md-start">
                                    <!--Heading-->
                                    <h3 class="mt-2 display-5 aos-init aos-animate" data-aos="zoom-in-up" data-aos-delay="100">
                                        {{$product->name}}
                                    </h3>
                                </div>
                                <div class="col-lg-3 col-md-4 col-12 text-center text-md-start" >
                                    <!--Text-->
                                    <p class="h4 mb-5 mb-md-0 aos-init aos-animate" data-aos="fade-up" data-aos-delay="150">
                                        {{$product->description}}
                                    </p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-12 text-center text-md-end">
                                    <!--Price-->
                                    <p class="h4 mb-0 pe-lg-11 aos-init aos-animate" data-aos="fade-up" data-aos-delay="150">
                                        {{$product->formattedPrice}} &euro;
                                    </p>
                                    <p class="text-success mb-0 pe-lg-11 p-sm-3 aos-init aos-animate small">{!!  $paymentModality[$product->interval]!!}</p>
                                </div>
                                <div class="col-lg-2 col-md-12 text-center text-md-end">
                                    <!--Action-->
                                    <div data-aos="fade-left" data-aos-delay="200" class="aos-init aos-animate">
                                        <button type="submit" class="btn btn-primary btn-lg m-sm-2">
                                            <span>buchen ...</span>
                                        </button>
                                    </div>
                                </div>
                            </div> <!-- / .row -->
                        </div>
                    </div>
                    </form>
                @endforeach

           {{--     <div class="row grid-separator">


                    @foreach($products as $product)
                        <div class="col-lg-4 py-9 py-lg-11 px-4 px-xl-5">
                            <!--Price card-->
                            <div class="card bg-transparent border-0 h-100">
                                <form action="{{ route('checkout.plan') }}" method="POST">
                                @csrf  <!-- CSRF Protection -->
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">


                                    <!--Badge-->
                                    <div class="mb-3">
                                        <span class="badge badge-pill bg-success px-3">{{$product->name}}</span>
                                    </div>

                                    <!--Title-->
                                    <h5 class="mb-4">{{$product->name}}</h5>
                                    <div class="mb-4">
                                        <h2 class="display-3 mb-0"><sup class="fs-6 align-top text-body-secondary lh-1 fw-normal">$</sup><span class="price">{{$product->price}}</span><sub
                                                class="fs-6 text-body-secondary lh-1 fw-normal align-bottom"> / Monthly</sub></h2>
                                    </div>

                                    <!--Description-->
                                    <p class="mb-4">
                                        {{$product->description}}
                                    </p>

                                    <!--Features-->
                                    <h6 class="mb-3">Included</h6>
                                    <ul class="list-unstyled mb-0 flex-grow-1">
                                        <li class="d-flex align-items-center mb-1">
                                            <i class="me-2 fs-4 bx bx-check lh-sm text-body-secondary"></i>
                                            <span>100GB Space</span>
                                        </li>
                                        <li class="d-flex align-items-center mb-1">
                                            <i class="me-2 fs-4 bx bx-check lh-sm text-body-secondary"></i>
                                            <span>Up to 5 users</span>
                                        </li>
                                        <li class="d-flex align-items-center mb-1">
                                            <i class="me-2 fs-4 bx bx-check lh-sm text-body-secondary"></i>
                                            <span>100K files upload</span>
                                        </li>
                                        <li class="d-flex align-items-center mb-1">
                                            <i class="me-2 fs-4 bx bx-check lh-sm text-body-secondary"></i>
                                            <span>12 Months support</span>
                                        </li>
                                        <li class="d-flex align-items-center">
                                            <i class="me-2 fs-4 bx bx-check lh-sm text-body-secondary"></i>
                                            <span>Basic tools</span>
                                        </li>
                                    </ul>

                                    <!--Action-->
                                    <div class="pt-4 d-grid">
                                        <button type="submit" class="btn btn-lg btn-primary">
                                            Sign up now
                                        </button>
                                    </div>

                                </form>
                            </div>
                        </div>


                @endforeach

            </div>--}}
            <!--End price container-->
        </div>
    </section>

    <section class="bg-blend-lighten position-relative"><!--Divider--><svg class="position-absolute bottom-0 start-0" style="color: var(--bs-dark);" width="100%" height="32" preserveaspectratio="none" viewbox="0 0 1200 96" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1200 96H0L1200 0V96Z" fill="currentColor"></path></svg>
        <div class="container py-9 py-lg-11 position-relative z-1">
            <div class="row pb-5 align-items-start">
                <div class="col-lg-5 mb-7 mb-lg-0 aos-init aos-animate" data-aos="fade-down" data-aos-delay="100">
                    <h6 class="mb-4 text-body-secondary">Profitieren Sie von unserem Rundum-Service für Barrierefreiheit</h6>
                    <h2 class="display-6">Machen Sie Ihre Website barrierefrei – stressfrei und pünktlich!</h2>
                </div>
                <div class="col-lg-7 col-xl-6 ms-xl-auto aos-init aos-animate" data-aos="fade-up" data-aos-delay="150">
                    <p class="mb-5">Ab dem 27. Juni 2025 müssen alle Webseiten den Barrierefreiheitsanforderungen entsprechen. Jetzt ist der perfekte Zeitpunkt, um den nächsten Schritt zu machen und Ihre Seite für alle zugänglich zu gestalten.</p>
                    <p class="mb-5">Unser erfahrenes Team begleitet Sie dabei, Ihre Webseite nicht nur gesetzeskonform, sondern auch benutzerfreundlicher für eine breitere Zielgruppe zu gestalten – und das mit minimalem Aufwand für Sie.</p>
                   </div>
            </div>
        </div>
    </section>
    @push('scripts')
        <script>

            function switchPlans(isAnnual) {
                const monthlyPlans = document.querySelectorAll('[data-plan="monthly"]');
                const annualPlans = document.querySelectorAll('[data-plan="annual"]');

                if (isAnnual) {
                    // Show annual plans, hide monthly plans
                    monthlyPlans.forEach(plan => plan.style.display = 'none');
                    annualPlans.forEach(plan => plan.style.display = 'block');
                } else {
                    // Show monthly plans, hide annual plans
                    monthlyPlans.forEach(plan => plan.style.display = 'block');
                    annualPlans.forEach(plan => plan.style.display = 'none');
                }
            }

            // Initialize to show annual plans by default
            function initPlanSwitcher() {
                const planSwitch = document.getElementById('planSwitch');
                planSwitch.checked = true; // Set the switch to annual by default
                switchPlans(true); // Show annual plans on page load

                // Add event listener for switching plans
                planSwitch.addEventListener('change', function() {
                    switchPlans(this.checked); // Switch based on toggle state
                });
            }

            // Call the initialization function on page load
            document.addEventListener('DOMContentLoaded', initPlanSwitcher);
        </script>
    @endpush

</x-page-layout>
