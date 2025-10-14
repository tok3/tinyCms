<x-filament::page>
    @php
        $paymentInterval['annual'] = "jährlich";
        $paymentInterval['monthly'] = "monatlich";
        $paymentInterval['one_time'] = "Einmalzahlung";
    @endphp


    <style>
        .ibtn {

            height: 10px;
            position: relative;
            width: 100%;
            margin-bottom: 15px;
        }
    </style>
    <section class="py-0 bg-white md:py-16 dark:bg-gray-900 antialiased">
        <div class="bg-white">
            <div class="mt-8 grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">


                @foreach ($products as $product)
                    <div class="p-4 border border-gray-200 rounded-lg bg-white shadow">
                        <h3 class="text-xl font-bold text-gray-800">{{ $product->name }}</h3>
                        <p class="mt-2 text-gray-600">{!! $product->description !!}</p>
                        @php
                            $company = \App\Helpers\CompanyHelper::currentCompany();
                        @endphp


                        @if ($company && $company->contracts()->forProduct($product->id)->active()->exists())
                            <span class="inline-block mt-4 py-2 px-4 bg-green-600 text-white rounded">Gebucht</span>
                        @else

                            <div class="mt-4">
                                <form action="{{ url('upgrade/' . $product->id) }}" method="GET" onsubmit="return this.interval.value !== '';">

                                    @if(!empty($product->info))
                                        <!-- modal info -->
                                        <div class="ibtn">

                                            <x-filament::modal width="xl">
                                                <x-slot name="heading">
                                                    Produktinformation
                                                </x-slot>

                                                <x-slot name="description" style="text-align: left !important;">
                                                    {!! $product->info !!}
                                                </x-slot>

                                                <x-slot name="trigger">

                                                    <small color="gray" size="xs" class="btn btn-xs mb-2">
                                                        [Weitere Infos ...]
                                                    </small>

                                                </x-slot>
                                            </x-filament::modal>
                                        </div>
                                    @endif

                                    <hr>
                                    <table style="width:100%;">
                                        <tr>
                                            <td>
                                                <h5 class="font-semibold m-1">Zahlungsinterval</h5>
                                                @foreach ($product->prices as $price)
                                                    @php
                                                        $plan = $price->interval;
                                                        $formattedPrice = number_format($price->price / 100, 2, ',', '.');
                                                        $trialHint = '';
                                                        if($product->trial_period_days > 0) {
                                                            $trialHint = $product->trial_period_days . ' Tage kostenlos Testen';
                                                        }
                                                    @endphp
                                                    <div>
                                                        <label class="inline-flex items-center">
                                                            <input type="radio" name="interval" value="{{ $price->interval }}" {{ $loop->first ? 'checked' : '' }} class="mr-2">
                                                            {{ $paymentInterval[$price->interval]}}
                                                            <strong class="ml-1">
                                                                {{ number_format($price->price / 100, 2, ',', '.') }} {{ $product->currency }} &euro;
                                                            </strong>&nbsp;<small>(inkl. MwSt)</small>
                                                        </label>

                                                    </div>
                                                @endforeach

                                            </td>
                                            <td class="text-right">
                                                <button type="submit" class="inline-block mt-4 py-2 px-4 bg-blue-600 text-white rounded">
                                                    Bestellen ...
                                                </button>
                                                <div class="">
                                                    <sub>{{ $trialHint }}</sub>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
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
