<x-filament::page>

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
                            <a href="{{ url('upgrade/' . $product->id) }}" class="inline-block mt-4 py-2 px-4 bg-blue-600 text-white rounded">
                                Kaufen
                            </a>
                        @endif

                    </div>
                @endforeach
                    <div class="p-4 border border-gray-200 rounded-lg bg-white shadow">
                        <h3 class="text-xl font-bold text-gray-800">Aktionscode Einlosen</h3>
                        <p class="mt-2 text-gray-600">Sie haben einen Aktionscode und möchten diesen einlösen ?</p>
                        <div class="mt-4">

                        </div>

                        <!--[if BLOCK]><![endif]-->                            <a href="{{url('code/einloesen')}}" class="inline-block mt-4 py-2 px-4 bg-pink-500 text-white rounded">
                            Aktionscode hier einlösen ...
                        </a>
                        <!--[if ENDBLOCK]><![endif]-->

                    </div>
            </div>
        </div>
    </section>
</x-filament::page>


{{--
<x-filament::page>
    <section class="py-8 bg-white md:py-16 dark:bg-gray-900 antialiased">
        <div class="bg-white">
            <div class="mx-auto max-w-7xl py-24 sm:px-6 sm:py-32 lg:px-8">
                <div class="relative isolate overflow-hidden bg-gray-900 px-6 pt-16 shadow-2xl sm:rounded-3xl sm:px-16 md:pt-24 lg:flex lg:gap-x-20 lg:px-24 lg:pt-0">
                    <svg viewBox="0 0 1024 1024" class="absolute top-1/2 left-1/2 -z-10 size-[64rem] -translate-y-1/2 [mask-image:radial-gradient(closest-side,white,transparent)] sm:left-full sm:-ml-80 lg:left-1/2 lg:ml-0 lg:-translate-x-1/2 lg:translate-y-0" aria-hidden="true">
                        <circle cx="512" cy="512" r="512" fill="url(#759c1415-0410-454c-8f7c-9a820de03641)" fill-opacity="0.7" />
                        <defs>
                            <radialGradient id="759c1415-0410-454c-8f7c-9a820de03641">
                                <stop stop-color="#7775D6" />
                                <stop offset="1" stop-color="#E935C1" />
                            </radialGradient>
                        </defs>
                    </svg>
                    <div class="mx-auto max-w-md text-center lg:mx-0 lg:flex-auto lg:py-32 lg:text-left">
                        <h2 class="text-3xl font-semibold tracking-tight text-balance text-white sm:text-4xl">Ihr Produkt erweitern ?!</h2>
                        <p class="mt-6 text-lg/8 text-pretty text-gray-300">
                            Unser Buchungssystem befindet sich in Überarbeitung.
                            Zum Buchen von Produkterweiterungen können Sie uns gerne per E-Mail unter info@aktion-barrierefrei.org oder telefonisch unter 06021-130 712-8 erreichen.
                        </p>
                        <div class="mt-10 flex items-center justify-center gap-x-6 lg:justify-start">
                        </div>
                    </div>
                    <div class="relative mt-16 h-80 lg:mt-8">
                        <img class="absolute top-0 left-0 w-[57rem] max-w-none rounded-md bg-white/5 ring-1 ring-white/10" src="https://tailwindcss.com/plus-assets/img/component-images/dark-project-app-screenshot.png" alt="App screenshot" width="1824" height="1080">
                    </div>
                </div>
            </div>
        </div>

    </section>
</x-filament::page>
--}}
