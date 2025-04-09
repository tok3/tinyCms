<x-page-layout>
    @section('add-head')
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <style>[x-cloak] { display: none !important; }</style>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @endsection

    @php
        $paymentModality['daily'] = "pro Tag </br>bei Monatlicher Zahlung";
        $paymentModality['annual'] = "pro Jahr </br>bei jährlicher Zahlung";
        $paymentModality['monthly'] = "pro Monat </br>bei Monatlicher Zahlung";
        $paymentModality['one_time'] = "";
    @endphp

    <div x-data="checkoutWizard()"  x-init="init()" class="container py-12 max-w-4xl mx-auto">
        <!-- Navigation -->
        <div class="flex justify-between mb-8">
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

        <form id="checkout" action="{{ route('checkout.plan') }}" method="POST">
            @csrf

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

            <!-- Bottom navigation -->
            <div class="flex justify-between mt-8">
                <button type="button" class="btn btn-secondary" :disabled="step === 0" @click="prevStep">Zurück</button>

                <button type="button" class="btn btn-primary" x-show="step < steps.length - 1" @click="nextStep">Weiter</button>

                <button type="submit" class="btn btn-success" x-show="step === steps.length - 1" @click.prevent="submitForm">Kostenpflichtig bestellen</button>
            </div>
        </form>
    </div>

    @push('scripts')
        <script>
            function checkoutWizard() {
                return {
                    step: 0,
                    steps: ['Plan wählen', 'Zugangsdaten', 'Zahlung', 'Fertig'],
                    init() {
                        const hash = window.location.hash;
                        if (hash === '#step-4') {
                            this.step = 3;
                        }
                    },
                    goToStep(index) {
                        if (index > this.step) return; // verhindert manuelles Springen nach vorn
                        this.step = index;
                    },

                    nextStep() {
                        if (this.step === 0 && !sessionStorage.getItem('selectedProductId')) {
                            alert('Bitte Produkt auswählen.');
                            return;
                        }

                        if (this.step === 1) {
                            const form = document.getElementById('checkout');
                            if (!form.checkValidity()) {
                                form.reportValidity();
                                return;
                            }
                        }

                        if (this.step === 2) {
                            const agb = document.getElementById('agb').checked;
                            const privacy = document.getElementById('privacy').checked;

                            if (!agb || !privacy) {
                                alert('Bitte AGB und Datenschutz akzeptieren.');
                                return;
                            }
                        }

                        this.step++;
                    },

                    prevStep() {
                        if (this.step > 0) this.step--;
                    },

                    submitForm() {
                        const selectedProductId = sessionStorage.getItem('selectedProductId');
                        if (selectedProductId && !document.querySelector('input[name="product_id"]')) {
                            const input = document.createElement('input');
                            input.type = 'hidden';
                            input.name = 'product_id';
                            input.value = selectedProductId;
                            document.getElementById('checkout').appendChild(input);
                        }

                        document.getElementById('checkout').submit();
                    }
                }
            }
        </script>
    @endpush
</x-page-layout>
