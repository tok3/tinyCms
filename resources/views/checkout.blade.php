<x-page-layout>
    <section class="position-relative border-top">
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
                                    <p class="text-success mb-0 pe-lg-11 aos-init aos-animate small">{!!  $paymentModality[$product->interval]!!}</p>
                                </div>
                                <div class="col-lg-2 col-md-12 text-center text-md-end">
                                    <!--Action-->
                                    <div data-aos="fade-left" data-aos-delay="200" class="aos-init aos-animate">
                                        <a href="#!" class="btn btn-primary btn-lg">
                                            <span>Jetzt Starten ...</span>
                                        </a>
                                    </div>
                                </div>
                            </div> <!-- / .row -->
                        </div>
                    </div>
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
