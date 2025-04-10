<x-page-layout>
    @section('add-head')
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <style>[x-cloak] { display: none !important; }</style>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

        <link href="{{ URL::asset('js/jquery-smartwizard/dist/css/smart_wizard_all.min.css') }}" rel="stylesheet" type="text/css"/>
    @endsection

    @php
        $paymentModality['daily'] = "pro Tag </br>bei Monatlicher Zahlung";
        $paymentModality['annual'] = "pro Jahr </br>bei jährlicher Zahlung";
        $paymentModality['monthly'] = "pro Monat </br>bei Monatlicher Zahlung";
        $paymentModality['one_time'] = "";
    @endphp
    <div x-data="checkoutAlpine()"  class="container py-12 max-w-4xl mx-auto">
        <!-- Navigation -->
        <div  x-show="step !== 3" x-cloak class="flex justify-between mb-8">

            <template x-for="(title, index) in steps" :key="index">
                <button
                    class="flex-1 py-2 border-b-4"
                    :class="{
                        'border-blue-600 font-bold': step === index,
                        'border-gray-300 text-gray-500': step !== index
                    }"
                    @click.prevent="goToStep(index)"
                >
                    <span x-text="title"></span>
                </button>
            </template>
        </div>

        <div x-data="checkoutAlpine()"  x-init="init()" id="checkout">
        <span class="text-danger" x-text="errors.product_id" x-show="errors.product_id"></span>

        <form id="checkoutForm" action="{{ route('checkout.plan') }}" method="POST">
            @csrf
            @if (session()->has('coupon_code'))
                <input type="hidden" name="coupon_code" value="{{ session('coupon_code') }}">
            @endif
            @if (session()->has('product_id'))
                <input type="hidden" name="product_id" value="{{ session('product_id') }}">
            @endif
            <!-- STEP 1 -->
            <div x-show="step === 0" x-cloak>
                <x-site-partials.checkout.products :products="$products" />
            </div>

            <!-- STEP 2 -->
            <div x-show="step === 1" x-cloak>
                <x-site-partials.checkout.user-register :products="$products" />
            </div>

            <!-- STEP 3 -->
            <div x-show="step === 2" x-cloak>
                <x-site-partials.checkout.summary :products="$products" :paymentModality="$paymentModality" />
            </div>

            <!-- STEP 4 -->
            <div x-show="step === 3" x-cloak>
                <x-site-partials.checkout.complete :products="$products" :paymentModality="$paymentModality" />
            </div>


           {{-- <div id="smartwizard" class="sw sw-theme-arrows sw-justified">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#step-1">
                            <div class="num">1</div>
                            Plan wählen
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#step-2">
                            <span class="num">2</span> Zugangsdaten
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#step-3">
                            <span class="num">3</span> Zahlung
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#step-4">
                            <span class="num">4</span> Fertig
                        </a>
                    </li>
                </ul>
            </div>--}}
            <!-- Bottom navigation -->
            <div  x-show="step !== 3" x-cloak class="flex justify-between mt-8">
                <button
                    type="button"
                    class="btn btn-secondary"
                    :disabled="step === 0"
                    @click="prevStep"
                >Zurück</button>

                <template x-if="step < 2">
                    <button
                        type="button"
                        class="btn btn-primary"
                        @click="nextStep"
                    >
                        Weiter
                    </button>
                </template>

                <template x-if="step === 2">
                    <button
                        type="button"
                        class="btn btn-success"
                        @click="validateAndSubmit"
                    >
                        Kostenpflichtig bestellen
                    </button>
                </template>
            </div>
        </form>
        </div>
    </div>

    @push('scripts')



            <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js?v1.1.9"></script>
            <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js?v1.1.9"></script>
            <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/localization/messages_de.js"></script>
            <script src="{{ URL::asset('js/jquery-smartwizard/dist/js/jquery.smartWizard.min.js') }}"></script>
           {{-- <script src="{{ URL::asset('assets/js/checkout.js') }}"></script>--}}
            <script src="{{ URL::asset('assets/js/checkout-alpine.js') }}"></script>
            <script>
                document.addEventListener('alpine:init', () => {
                    Alpine.data('checkoutWizard', checkoutAlpine);
                });
            </script>
        @endpush



</x-page-layout>
