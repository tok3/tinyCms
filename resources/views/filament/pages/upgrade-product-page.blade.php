<x-filament::page>
    @php
        $paymentInterval['annual'] = "jährlich";
        $paymentInterval['monthly'] = "monatlich";
        $paymentInterval['one_time'] = "Einmalzahlung";
    @endphp
    <section class="py-0 bg-white md:py-16 dark:bg-gray-900 antialiased">
        <div class="bg-white">
            <div class="mt-8 grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($products as $product)
                    <div class="p-4 border border-gray-200 rounded-lg bg-white shadow">
                        <h3 class="text-xl font-bold text-gray-800">{{ $product->name }}</h3>
                        <p class="mt-2 text-gray-600">{{ $product->description }}</p>
                        <div class="mt-4">
                            <span class="font-bold text-gray-800">{{ $product->formatted_price }} {{ $product->currency }}</span>
                        </div>

                        @if(
       auth()->check() &&
       auth()->user()->companies->isNotEmpty() &&
       auth()->user()->companies->first()->contracts()
           ->where('product_id', $product->id)
           ->where('end_date', '>', now())
           ->exists()
   )
                            <span class="inline-block mt-4 py-2 px-4 bg-green-600 text-white rounded">
        Gebucht
    </span>
                        @else

                            <div class="mt-4">
                                <form action="{{ url('upgrade/' . $product->id) }}" method="GET" onsubmit="return this.interval.value !== '';">
                                    @foreach ($product->prices as $price)
                                        <div>
                                            <label class="inline-flex items-center">
                                                <input type="radio" name="interval" value="{{ $price->interval }}" {{ $loop->first ? 'checked' : '' }} class="mr-2">
                                                {{ $paymentInterval[$price->interval]}}
                                                <strong class="ml-1">
                                                    {{ number_format($price->price / 100, 2, ',', '.') }} {{ $product->currency }}
                                                </strong>
                                            </label>
                                        </div>
                                    @endforeach

                                    <button type="submit" class="inline-block mt-4 py-2 px-4 bg-blue-600 text-white rounded">
                                        Kaufen
                                    </button>
                                </form>
                            </div>

                        @endif

                    </div>
                @endforeach
                <div class="p-4 border border-gray-200 rounded-lg bg-white shadow">
                    <h3 class="text-xl font-bold text-gray-800">Aktionscode Einlosen</h3>
                    <p class="mt-2 text-gray-600">Sie haben einen Aktionscode und möchten diesen einlösen ?</p>
                    <div class="mt-4">

                    </div>

                    <!--[if BLOCK]><![endif]--> <a href="{{url('code/einloesen')}}" class="inline-block mt-4 py-2 px-4 bg-pink-500 text-white rounded">
                        Aktionscode hier einlösen ...
                    </a>
                    <!--[if ENDBLOCK]><![endif]-->

                </div>
            </div>
        </div>
    </section>
</x-filament::page>
