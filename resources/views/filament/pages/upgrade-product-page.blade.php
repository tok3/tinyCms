<x-filament::page>

    @php
        $paymentInterval = [
            'annual' => 'jährlich',
            'monthly' => 'monatlich',
            'one_time' => 'Einmalzahlung',
        ];


        @endphp
    <script>
        function startTour() {

            const tour = new Shepherd.Tour({
                useModalOverlay: true,
                defaultStepOptions: {
                    cancelIcon: { enabled: true },
                    classes: 'shadow-lg bg-white ab-tour',
                    cancelIcon: { enabled: true },
                    scrollTo: true
                }
            });

            tour.addStep({
                title: 'Willkommen 👋',
                text: 'Das ist dein Dashboard.',
                attachTo: { element: 'body', on: 'center' },
                buttons: [{ text: 'Weiter', action: tour.next }]
            });

            tour.addStep({
                title: 'Hier passiert Magie ✨',
                text: 'Hier siehst du deine Daten.',
                attachTo: { element: '.fi-main', on: 'bottom' },
                buttons: [
                    { text: 'Zurück', action: tour.back },
                    { text: 'Weiter', action: tour.next }
                ]
            });

            tour.addStep({
                title: 'Mehr rausholen 🚀',
                text: 'Mit Upgrade bekommst du deutlich mehr Möglichkeiten.',
                attachTo: { element: '.fi-sidebar', on: 'right' },
                buttons: [{ text: 'Fertig', action: tour.complete }]
            });

            tour.start();
        }
    </script>
    <button onclick="startTour()" class="btn btn-primary">
        Tour starten
    </button>
    <section class="py-0 bg-white md:py-16 dark:bg-gray-900">
        <div class="bg-white">
            <!-- Gutschein -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-5 ">

                <div class="p-5 border border-gray-200 rounded-xl bg-white shadow-sm">

                    <div class="flex items-center gap-4 mb-3">
                        <h3 class="text-xl font-bold text-gray-800">Aktionscode einlösen</h3>


                        <div>

                            <div class="text-2xl font-bold">

                                <img src="{{ asset('assets/img/produkte/coupon-svgrepo-com.svg') }}" class="h-12">
                            </div>
                        </div>
                    </div>




                    <p class="mt-2 text-gray-600">
                        Sie haben einen Aktionscode und möchten diesen nutzen?
                    </p>

                    <a href="{{ url('code/einloesen') }}"
                       class="inline-block mt-4 py-2 px-4 bg-pink-500 text-white rounded-lg hover:bg-pink-600 transition">
                        Code einlösen ...
                    </a>
                </div>


            </div>


            @php
                $packages = $products->where('is_package', true);
                $singleProducts = $products->where('is_package', false);
            @endphp

            {{-- PACKAGES FIRST --}}
            @if($packages->count())
                <h2 class="text-xl font-bold mb-4">Kombi-Pakete</h2>

                <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
                    @foreach ($packages as $product)
                        <x-product-card :product="$product" :paymentInterval="$paymentInterval"/>
                    @endforeach
                </div>
            @endif

            {{-- SINGLE PRODUCTS --}}
            @if($singleProducts->count())
                <h2 class="text-xl font-bold mb-5 mt-5">Empfohlene Produkte</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($singleProducts as $product)
                        <x-product-card :product="$product" :paymentInterval="$paymentInterval"/>
                    @endforeach
                </div>
            @endif

        </div>
    </section>

</x-filament::page>
