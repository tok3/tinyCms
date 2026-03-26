<x-filament::page>

    @php
        $paymentInterval = [
            'annual' => 'jährlich',
            'monthly' => 'monatlich',
            'one_time' => 'Einmalzahlung',
        ];
    @endphp

    <style>

        .product-description-text h3 {
            font-size: 0.95rem;
            font-weight: 600;
            margin-bottom: 6px;
            line-height: 1.3;
        }
        .product-description-text ul {
            list-style: none;
            padding-left: 0;
            margin: 0;
        }

        .product-description-text li {
            display: flex;
            align-items: flex-start;
            gap: 8px;
            margin-bottom: 6px;
            font-size: 0.9rem;
            line-height: 1.4;
        }

        .product-description-text li::before {
            content: "✔";
            font-size: 0.8rem;
            margin-top: 2px;
            opacity: 0.7;
        }

        .product-description-text {
            color: #374151; /* text-gray-700 */
            margin-right: 2em; /* 🔥 wichtig für Harmonie */
        margin-left:2em;
        }
        .product-description-text h3 + ul {
            margin-top: 4px;
        }
    </style>
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
