<x-blank-layout>
    @section('add-head')
        <link rel="stylesheet" href="{{url('js/repeating-countdown-timer/css/style.css')}}">
    @endsection


    <section class="position-relative d-flex justify-content-center h-100">
        <div class="bg-gradient-primary _bg-dark-subtle d-none d-md-flex position-fixed end-0 top-0 w-md-50 w-lg-60 h-100">
            <!--Divider shape-->
            <svg class="position-absolute start-0 top-0 h-100 z-1" style="color: var(--bs-body-bg);" width="80" height="1096" preserveAspectRatio="none" viewBox="0 0 58 1096" fill="none"
                 xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.24" fill-rule="evenodd" clip-rule="evenodd"
                      d="M58 1096L53.2727 1034.97C48.3636 973.947 38.7273 852.719 39.8182 730.667C41.0909 608.614 53.2727 487.386 52 365.333C50.7273 243.281 36.3636 122.053 29.0909 61.0263L21.8182 2.02656e-06H-1.72853e-06L-1.72853e-06 61.0263C-1.72853e-06 122.053 -1.72853e-06 243.281 -1.72853e-06 365.333C-1.72853e-06 487.386 -1.72853e-06 608.614 -1.72853e-06 730.667C-1.72853e-06 852.719 -1.72853e-06 973.947 -1.72853e-06 1034.97L-1.72853e-06 1096H58Z"
                      fill="currentColor"></path>

                <path clip-rule="evenodd"
                      d="M37 1096L33.9843 1034.97C30.8527 973.947 24.7053 852.719 25.4013 730.667C26.2132 608.614 33.9843 487.386 33.1724 365.333C32.3605 243.281 23.1975 122.053 18.558 61.0263L13.9185 2.02656e-06H1.11014e-06L1.11014e-06 61.0263C1.11014e-06 122.053 1.11014e-06 243.281 1.11014e-06 365.333C1.11014e-06 487.386 1.11014e-06 608.614 1.11014e-06 730.667C1.11014e-06 852.719 1.11014e-06 973.947 1.11014e-06 1034.97L1.11014e-06 1096H37Z"
                      fill="currentColor"></path>
            </svg>

            <!--Image-->

            <img src="{{url('assets/img/backgrounds/inclusion-7304412_1280.png')}}" alt="" class="bg-image">

        </div>
        <div class="container z-2 position-relative">
            <div class="row align-items-center vh-100">
                <div class="col-lg-4 pt-3 pb-4 pb-lg-5 pt-lg-5 me-auto col-md-6 z-2">
                    <div>
                        <!--:Logo:-->
                        <a class="navbar-brand" href="{{url('/')}}">
                            <img src="{{url('assets/img/logo/logo.svg')}}" alt="logo" class="width-10x navbar-brand-light mb-5">
                            <img src="{{url('assets/img/logo/logo-white.svg')}}" alt="logo" class="width-10x navbar-brand-dark mb-5">
                        </a>

                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                <h5>Fehler:</h5>
                                @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                                <br>
                                <strong>Bei Fragen und Problemen können Sie sich einfach mit uns in Verbindung setzen!</strong>
                            </div>

                        @endif
                        @if(isset($product))
                            <h2 class="mb-2">
                                Gültiges Angebot gefunden!
                            </h2>
                            <p class="mb-4 text-body-secondary">
                                Zum Aktionscode <strong>#{{$coupon->code}}</strong> wurde folgendes Angebot gefunden:
                            </p>





                            <table class="table table-bordered">
                                <!--Table header-->
                                <thead>
                                <tr>
                                    <th scope="col" style="min-width: 290px;">
                                        <h6 class="mb-2"> {{$product->name}}</h6>
                                        <small class="mb-0 d-block text-body-secondary"> {{$product->description}}</small>
                                    </th>
                                </tr>
                                </thead>
                                <!--Table body-->
                                <tbody>
                                @if(is_array($subtotalAll))

                                    @foreach($subtotalAll as $interval => $price)
                                        <tr data-interval="{{ $interval }}">
                                            <th scope="row">
                                                <div class="d-flex justify-content-between flex-nowrap">
                                                    <small class="mb-0 d-block text-body-secondary"> </small>
                                                    <span class="h6 mb-0"> {{ $product->priceFor($interval, true) }} &euro;</span>
                                                </div>
                                            </th>

                                        </tr>

                                        <tr data-interval="{{ $interval }}">
                                            <th scope="row">
                                                <div class="d-flex justify-content-between flex-nowrap">
                                                    <h6 class="mb-0"> {{$promotion->description}}</h6>
                                                    <span class="h6 mb-0"></span>
                                                </div>
                                            </th>

                                        </tr>
                                        <tr data-interval="{{ $interval }}">
                                            <th scope="row">
                                                <div class="d-flex justify-content-between flex-nowrap">
                                                    <small class="mb-0 d-block text-body-secondary"></small>
                                                    <span
                                                        class="h6 mb-0">&minus; {{ $promotion->discount_type === 'fixed' ? $promotion->formatted_discount . ' €' : $promotion->formatted_discount . ' %' }}</span>
                                                </div>
                                            </th>

                                        </tr>
                                        <tr data-interval="{{ $interval }}">
                                            <th scope="row">
                                                <div class="d-flex justify-content-between flex-nowrap">
                                                    <small class="mb-0 d-block text-body-secondary">Preis (inkl. MwSt.)</small>
                                                    <span class="h6 mb-0">{{$price}}&nbsp; &euro;</span>
                                                </div>
                                            </th>
                                        </tr>

                                @endforeach

                                @endif

                            </table>
                            <fieldset class="p-2 mb-3">
                                <legend class="h6">Zahlungsintervall:</legend>
                                @php
                                    $paymentInterval['annual'] = "jährlich";
                                    $paymentInterval['monthly'] = "monatlich";
                                    $paymentInterval['one_time'] = "Einmalzahlung";
                                @endphp
                                @foreach($subtotalAll as $interval => $price)
                                    <div class="form-check form-check-inline">
                                        <input
                                            class="form-check-input"
                                            type="radio"
                                            name="offer_interval"
                                            id="offer_interval_{{ $interval }}"
                                            value="{{ $interval }}"
                                            {{ $loop->first ? 'checked' : '' }}
                                        >
                                        <label class="form-check-label" for="offer_interval_{{ $interval }}">
                                            {{ $paymentInterval[$interval]}}
                                        </label>
                                    </div>
                                @endforeach
                            </fieldset>

                            <div>


                                <div class="mb-3">
                                    <input type="hidden" id="code" value="{{$coupon->code}}">
                                    <input type="hidden" name="productId" value="{{$product->id}}">
                                </div>

                                <div class="d-grid">

                                    <button class="btn btn-primary" id="offerAccept" value="{{$product->id}}" type="submit">
                                        Angebot annehmen
                                    </button>
                                </div>
                            </div>

                        @else

                            <h2 class="mb-2">
                                Code Einlösen ?
                            </h2>
                            <p class="mb-4 text-body-secondary">
                                Geben Sie hier Ihren Aktionscode ein ...
                            </p>
                            <div>

                                <form action="{{ route('coupon.redeem')}}" id="checkout" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <input type="text" name="code" value="18CDB32D" required="" class="form-control" id="coupon" autofocus="" placeholder="Aktionscode hier eingeben">
                                    </div>

                                    <div class="d-grid">
                                        <button class="btn btn-primary" type="submit">
                                            Aktionscode Prüfen
                                        </button>
                                    </div>
                                </form>
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </section>


    @push('scripts')
        <script>
            function updateOfferDetails() {
                const sel = document.querySelector('input[name="offer_interval"]:checked').value;
                document.querySelectorAll('tbody tr[data-interval]').forEach(tr => {
                    tr.style.display = (tr.dataset.interval === sel) ? '' : 'none';
                });
            }

            document.addEventListener('DOMContentLoaded', () => {
                // Event-Handler auf alle Radios
                document.querySelectorAll('input[name="offer_interval"]').forEach(radio => {
                    radio.addEventListener('change', updateOfferDetails);
                });
                // Initial
                updateOfferDetails();
            });
        </script>
        <script>
            const appUrl = "{{ config('app.url') }}";
            @if(auth()->check() && (isset($product)))
            // Falls der User eingeloggt ist und eine Company hat:
            const redirectUrl = `${appUrl}/upgrade/{{$product->id}}`;
            @else
            // Falls nicht:
            const redirectUrl = `${appUrl}/preise#step-2`;
            @endif

            // Beispiel: redirectUrl ausgeben
            console.log(redirectUrl);
        </script>

        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js?v1.1.9"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js?v1.1.9"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/localization/messages_de.js"></script>
        <script src="{{ URL::asset('js/jquery-smartwizard/dist/js/jquery.smartWizard.min.js') }}"></script>
        <script src="{{ URL::asset('assets/js/checkout.js') }}"></script>

    @endpush
</x-blank-layout>
