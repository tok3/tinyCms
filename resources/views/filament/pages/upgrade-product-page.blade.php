<x-filament::page>
    @php
        $paymentInterval['annual'] = "jährlich";
        $paymentInterval['monthly'] = "monatlich";
        $paymentInterval['one_time'] = "Einmalzahlung";
    @endphp

    <section class="py-0 bg-white md:py-16 dark:bg-gray-900 antialiased">
        <div class="bg-white">

            <!-- Conversion Hint -->
            <div class="mb-6 p-4 bg-blue-50 border border-blue-100 rounded-lg text-sm text-blue-900">
                Sie sehen aktuell nur einen Teil Ihrer Analyse.
                Mit einem Paket prüfen Sie Ihre gesamte Website und erhalten vollständige Ergebnisse.
            </div>

            <div class="mt-8 grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">

                @foreach ($products as $product)
                    <div class="p-5 border border-gray-200 rounded-xl bg-white shadow-sm hover:shadow-lg transition duration-200">

                        <!-- Produktname -->
                        <h3 class="text-xl font-bold text-gray-800">{{ $product->name }}</h3>

                        <!-- Beschreibung als Liste -->
                        <ul class="mt-3 text-sm text-gray-700 space-y-1">
                            @foreach(explode("\n", strip_tags($product->description)) as $line)
                                @if(trim($line))
                                    <li>✔ {{ $line }}</li>
                                @endif
                            @endforeach
                        </ul>

                        @php
                            $company = \App\Helpers\CompanyHelper::currentCompany();
                        @endphp

                        @if ($company && $company->contracts()->forProduct($product->id)->active()->exists())
                            <span class="inline-block mt-4 py-2 px-4 bg-green-600 text-white rounded">
                                Bereits aktiv
                            </span>
                        @else

                            <div class="mt-4">
                                <form action="{{ url('upgrade/' . $product->id) }}" method="GET">

                                    <!-- Modal -->
                                    @if(!empty($product->info))
                                        <div class="mb-2">
                                            <x-filament::modal width="xl">
                                                <x-slot name="heading">
                                                    {{ $product->name }} – Details
                                                </x-slot>

                                                <x-slot name="description">
                                                    {!! $product->info !!}
                                                </x-slot>

                                                <x-slot name="trigger">
                                                    <span class="text-blue-600 text-sm cursor-pointer hover:underline">
                                                        Details anzeigen
                                                    </span>
                                                </x-slot>
                                            </x-filament::modal>
                                        </div>
                                    @endif

                                    <!-- Preise -->
                                    <div class="mt-4 space-y-2">
                                        @foreach ($product->prices as $price)
                                            @php
                                                $trialHint = $product->trial_period_days > 0
                                                    ? $product->trial_period_days . ' Tage kostenlos testen'
                                                    : null;
                                            @endphp

                                            <label class="flex items-center justify-between border rounded-lg px-3 py-2 cursor-pointer hover:border-blue-500">
                                                <div class="flex items-center">
                                                    <input type="radio"
                                                           name="interval"
                                                           value="{{ $price->interval }}"
                                                           {{ $loop->first ? 'checked' : '' }}
                                                           class="mr-2">

                                                    <span class="text-sm">
                                                        {{ $paymentInterval[$price->interval] }}
                                                    </span>
                                                </div>

                                                <div class="text-lg font-bold text-gray-900">
                                                    {{ number_format($price->price / 100, 2, ',', '.') }} €
                                                </div>
                                            </label>
                                        @endforeach
                                    </div>

                                    <!-- Trial Hinweis -->
                                    @if(!empty($trialHint))
                                        <div class="mt-2 text-xs text-green-600 font-medium">
                                            {{ $trialHint }}
                                        </div>
                                    @endif

                                    <!-- CTA -->
                                    <button type="submit"
                                            class="w-full mt-4 py-2 px-4 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                                        Jetzt starten
                                    </button>

                                </form>
                            </div>

                        @endif
                    </div>
                @endforeach

                <!-- Gutschein -->
                <div class="p-5 border border-gray-200 rounded-xl bg-white shadow-sm">
                    <h3 class="text-xl font-bold text-gray-800">Aktionscode einlösen</h3>
                    <p class="mt-2 text-gray-600">
                        Sie haben einen Aktionscode und möchten diesen nutzen?
                    </p>

                    <a href="{{url('code/einloesen')}}"
                       class="inline-block mt-4 py-2 px-4 bg-pink-500 text-white rounded-lg hover:bg-pink-600 transition">
                        Code einlösen
                    </a>
                </div>

            </div>
        </div>
    </section>
</x-filament::page>
