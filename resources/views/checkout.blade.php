<x-page-layout>
    @section('add-head')
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <style>[x-cloak] {
                display: none !important;
            }</style>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

        <link href="{{ URL::asset('js/jquery-smartwizard/dist/css/smart_wizard_all.min.css') }}" rel="stylesheet" type="text/css"/>
    @endsection

    @php
        $paymentModality['daily'] = "pro Tag </br>bei Monatlicher Zahlung";
        $paymentModality['annual'] = "pro Jahr </br>bei jährlicher Zahlung";
        $paymentModality['monthly'] = "pro Monat </br>bei Monatlicher Zahlung";
        $paymentModality['one_time'] = "";
    @endphp
    <style>
#checkoutForm
{

    padding:1em;
}
        .stepwizard {
            display: table;
            width: 100%;
            position: relative;

        }

        .sw-active,
        .sw-past,
        .sw-future {
            font-size: 35px;
            font-family: 'IBM Plex Sans', system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", "Noto Sans", "Liberation Sans", Arial, sans-serif;
            font-weight: bold;
        }

        .sw-past,
        .sw-future {

            background-color: white;
        }

        .toolbar-bottom {
            text-align: right;
            padding-right: 55px;
padding-bottom:15px;
            border-bottom: 2px solid #EEEEEE;
        }

        .stepwizard-row {
            display: table-row;
        }

        .stepwizard-step {
            display: table-cell;
            text-align: center;
            position: relative;

        }

        .stepwizard-step p {
            margin-top: 10px;
        }

        .btn-circle.bg-white {
            background-color: white !important;
            color: #333;
            border-color: #ccc;
        }

        /* Verbindungslinien */
        .stepwizard-row:before {

            content: "";
            position: absolute;
            top: 20px;
            left: 0;
            width: 100%;
            height: 0px;
            border-bottom: 10px dashed #EEEEEE;
            background-color: transparent;
            z-index: 0;

        }

        /* runde Buttons */
        .btn-circle {
            width: 50px;
            height: 50px;
            line-height: 45px;
            border-radius: 15px;
            text-align: center;
            padding: 0;

        }

        /* .btn-circle {
             width: 40px;
             height: 40px;
             border-radius: 50%;
             padding: 6px 0;
             text-align: center;
             font-size: 16px;
             line-height: 1.42857;
         }*/
    </style>

    <div x-data="checkoutAlpine()" x-init="init()" class="container py-12 max-w-4xl mx-auto">

        <!-- Navigation (SmartWizard-Stil) -->
        <div class="stepwizard text-center mb-4 " x-show="step !== 3" x-cloak>
            <div class="stepwizard-row setup-panel flex justify-center gap-4">
                <template x-for="(title, index) in steps" :key="index">
                    <div class="stepwizard-step text-center">
                        <a
                            href="javascript:void(0)"
                            :class="buttonClass(index)"
                            @click.prevent="goToStep(index)"
                            x-text="index + 1"
                        ></a>
                        <p class="text-sm mt-1" x-text="title"></p>
                    </div>
                </template>
            </div>
        </div>

        <!-- Das ganze Formular hier rein -->
        <form id="checkoutForm" class="_shadow-lg" action="{{ route('checkout.plan') }}" method="POST">

            @csrf
            @if(session()->has('product_id') && session()->has('interval'))
                <input
                    type="hidden"
                    name="product_selection"
                    value="{{ session('product_id') }}:{{ session('interval') }}"
                >
            @endif
            @if (session()->has('coupon_code'))
                <input type="hidden" name="coupon_code" value="{{ session('coupon_code') }}">
            @endif
            @if (session()->has('product_id'))
                <input type="hidden" name="product_id" value="{{ session('product_id') }}">
            @endif
            @if (session()->has('interval'))
                <input type="hidden" name="interval" value="{{ session('interval') }}">
            @endif
            <!-- STEP 1 -->
            <div x-show="step === 0" x-cloak>
                <x-site-partials.checkout.products :products="$products"/>
            </div>

            <!-- STEP 2 -->
            <div x-show="step === 1" x-cloak>
                <x-site-partials.checkout.user-register :products="$products"/>
            </div>

            <!-- STEP 3 -->
            <div x-show="step === 2" x-cloak>
                <x-site-partials.checkout.summary :products="$products" :paymentModality="$paymentModality"/>
            </div>

            <!-- STEP 4 -->
            <div x-show="step === 3" x-cloak>
                <x-site-partials.checkout.complete :products="$products" :paymentModality="$paymentModality"/>
            </div>

            <!-- Bottom navigation -->
            <div x-show="step !== 3" x-cloak class="flex justify-between mt-8 toolbar-bottom">
                <button
                    type="button"
                    class="btn btn-secondary"
                    x-show="step > 0"
                    @click="prevStep"
                >
                    Zurück
                </button>

                <!-- Weiter-Button nur bei Step 0, wenn Produkt gewählt -->
                <template style="border:1px solid black;" x-if="step === 0 && form.product_id">
                    <button
                        type="button"
                        class="btn btn-primary"
                        @click="nextStep"
                    >
                        Weiter
                    </button>
                </template>

                <!-- Weiter-Button auf Step 1 -->
                <template x-if="step === 1">
                    <button
                        type="button"
                        class="btn btn-primary"
                        @click="nextStep"
                    >
                        Weiter
                    </button>
                </template>

                <!-- Finaler Button auf Step 2 -->
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
