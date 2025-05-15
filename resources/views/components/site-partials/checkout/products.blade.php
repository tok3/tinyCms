
@php
    $paymentModality['daily'] ="pro Tag </br>bei Täglicher Abbuchung";
        $paymentModality['weekly'] ="pro Woche </br>bei Wöchentlicher Abbuchung";

        $paymentModality['annual'] ="pro Jahr </br>bei jährlicher Zahlung";
        $paymentModality['monthly'] ="pro Monat </br>bei Monatlicher Zahlung";
        $paymentModality['one_time'] ="Einmalzahlung";
@endphp

<div class="container">
    <div class="row mb-4 mt-50 justify-content-center text-center">
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


<style>
    /* Verhindert automatische Silbentrennung */
    .no-hyphens {
        -webkit-hyphens: none;   /* Chrome, Safari, iOS */
        -ms-hyphens: none;       /* alte IE */
        hyphens: none;           /* Standard */
    }
</style>

@foreach($products as $product)
    @foreach($product->prices as $price)
        @php
            $plan = $price->interval;
            $formattedPrice = number_format($price->price / 100, 2, ',', '.');
            $trialHint = '';
            if($product->trial_period_days > 0) {
                $trialHint = $product->trial_period_days . ' Tage kostenlos Testen';
            }
        @endphp
        <div class="container py-3 py-lg-3 plan" data-plan="{{ $plan }}">
            <div class="bg-body overflow-hidden shadow-lg px-4 py-2 px-lg-5">
                <div class="row align-items-center ">
                    <!-- On small screens (sm) we use a card layout -->
                    <div class="col-lg-1 col-md-1 col-12 mb-3 mb-md-0 text-center text-md-start">
                        <i class="h1 bi bi-shield-shaded"></i>
                    </div>
                    <div class="col-lg-3 col-md-4 col-12 text-center text-md-start">
                        <!--Heading-->
                        <h6>Kombi-Paket</h6>
                        <h3 class="mt-2 display-5 aos-init aos-animate" data-aos="zoom-in-up" data-aos-delay="100">
                            {{ $product->name }}
                        </h3>
                    </div>
                    <div class="col-lg-3 col-md-4 col-12
            d-flex align-items-center justify-content-center justify-content-md-start
            text-center text-md-start">
                        <p class="h6 mt-2 d-inline-flex align-items-center no-hyphens" style="line-height: 1.5;">
                            {!! $product->description !!}
                        </p>
                    </div>
                    <div class="col-lg-1 col-md-1 col-12">
                        @if($product->info)<br>
                        <button
                            type="button"
                            class="btn btn-link mt--20"
                            style="float: right;"
                            data-bs-toggle="modal"
                            data-bs-target="#infoModal-{{ $product->id }}"
                            aria-label="Weitere Informationen"
                        >
                            <i class="bi bi-info-circle h2 text-secondary"></i>
                        </button>
                        @endif
                    </div>
                    <div class="col-lg-2 col-md-2 col-12 text-center text-md-end">
                        <!--Price-->
                        <p class="h4 mb-0  aos-init aos-animate" data-aos="fade-up" data-aos-delay="150">
                            {{ $formattedPrice }} &euro;
                        </p>
                        <sub class="mb-0 pb-sm-3 small" style="position:relative;top:-5px;">inkl. MwSt.</sub>
                        <p class="text-success mb-0  aos-init aos-animate small" style="position:relative;top:-5px;">{!! $paymentModality[$plan] !!}</p>
                        <sup class="mb-0 aos-init aos-animate small" style="position:relative;top:-5px;">{!! $product->lz ?? 24 !!} Monate Laufzeit</sup>
                    </div>
                    <div class="col-lg-2 col-md-12 text-center text-md-end">
                        <p class="h4 mb-0 aos-init aos-animate" data-aos="fade-up" data-aos-delay="150">
                            <!--Action-->
                        <div data-aos="fade-left" data-aos-delay="200" class="aos-init aos-animate small">
                            {{ $trialHint }}
                            </p>
                            <input
                                type="radio"
                                class="btn-check"
                                id="plan-{{ $product->id }}-{{ $price->interval }}"
                                name="product_selection"
                                value="{{ $product->id }}:{{ $price->interval }}"
                                x-model="form.product_selection"
                                @change="saveProductToSession($event.target.value)"
                            >
                            <label class="btn btn-outline-primary" for="plan-{{ $product->id }}-{{ $price->interval }}">
                                Wählen
                            </label>
                        </div>
                    </div>
                </div> <!-- / .row -->
            </div>
        </div>
        <!-- Info Modal -->
        <div class="modal fade" id="infoModal-{{ $product->id }}" tabindex="-1" aria-labelledby="infoModalLabel-{{ $product->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="infoModalLabel-{{ $product->id }}">{{ $product->name }} – Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Schließen"></button>
                    </div>
                    <div class="modal-body">
                        {!! $product->info !!}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Schließen</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endforeach


    <!--End price container-->
</div>
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
        planSwitch.addEventListener('change', function () {
            switchPlans(this.checked); // Switch based on toggle state
        });

    }

    initPlanSwitcher();

</script>
@endpush
