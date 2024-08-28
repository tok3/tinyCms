<x-page-layout navbarType="2">

    @section('add-head')
        <meta name="captcha-key" content="{{ env('RECAPTCHA_SITE_KEY') }}">
        <script src="https://www.google.com/recaptcha/enterprise.js?render={{ env('RECAPTCHA_SITE_KEY') }}"></script>
        <!-- Your code -->
    @endsection



    <!--::Start Hero Mail::-->
    <section class="position-relative bg-dark">

        <!--:Gradient background vector:-->
        <svg class="position-absolute opacity-75 satrt-0 top-0 w-100 h-100" xmlns="http://www.w3.org/2000/svg"
             preserveAspectRatio="none" viewBox="0 0 700 700" width="700" height="700" opacity="1">
            <defs>
                <linearGradient gradientTransform="rotate(136, 0.5, 0.5)" x1="50%" y1="0%" x2="50%" y2="100%"
                                id="ffflux-gradient">
                    <stop stop-color="hsl(347, 100%, 72%)" stop-opacity="1" offset="0%"></stop>
                    <stop stop-color="hsl(227, 100%, 50%)" stop-opacity="1" offset="100%"></stop>
                </linearGradient>
                <filter id="ffflux-filter" x="-20%" y="-20%" width="140%" height="140%" filterUnits="objectBoundingBox"
                        primitiveUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feTurbulence type="fractalNoise" baseFrequency="0.006 0.004" numOctaves="2" seed="2"
                                  stitchTiles="stitch" x="0%" y="0%" width="100%" height="100%" result="turbulence"></feTurbulence>
                    <feGaussianBlur stdDeviation="0 0" x="0%" y="0%" width="100%" height="100%" in="turbulence"
                                    edgeMode="duplicate" result="blur"></feGaussianBlur>
                    <feBlend mode="hard-light" x="0%" y="0%" width="100%" height="100%" in="SourceGraphic" in2="blur"
                             result="blend"></feBlend>
                    <feColorMatrix type="saturate" values="3" x="0%" y="0%" width="100%" height="100%" in="blend"
                                   result="colormatrix"></feColorMatrix>
                </filter>
            </defs>
            <rect width="700" height="700" fill="url(#ffflux-gradient)" filter="url(#ffflux-filter)"></rect>
        </svg>
        @if(!session()->has('success'))
        <div class="container pt-12 pb-9 pb-lg-11 pt-lg-14 position-relative z-1">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-5 mb-md-0 mb-7 text-white text-center text-lg-start">
                    <!--:Heading:-->
                    <h1 class="display-3 mb-4">Einfach integriert, großer Nutzen</h1>
                    <h1 class="display-3 mb-4">Einfach integriert, großer Nutzen</h1>
                    <!--:Subheading:-->
                    <p class="col-lg-10 lead mb-5">
                        Unsere Tools sind einfach einzusetzen und zu nutzen und garantieren Ihnen sowie Ihren Kunden maximalen Mehrwert bei minimalem Aufwand und höchsten Ansprüchen an Sicherheit und Komfort.
                    </p>
                    <!--:Scroll down animated button:-->
                    <a href="#next"
                       class="width-7x height-7x flex-center btn p-0 btn-outline-white btn-circle-ripple mx-auto mx-lg-0 rounded-circle">
                        <div class="link-arrow-bounce">
                            <i class="bx bx-chevron-down"></i>
                        </div>
                    </a>
                </div>
                <div class="col-md-9 col-xl-6">
                    <div class="p-4 p-lg-6 rounded-3 bg-dark bg-opacity-10 text-white shadow-lg z-1 position-relative">
                        <!--:Mail card background:-->
                        <div class="position-absolute start-0 top-0 w-100 h-100 bg-gradient-dark opacity-50 rounded-3">
                        </div>
                        <div class="position-relative z-1">
                            <form method="POST" action="{{ route('contact.send') }}" novalidate>
                                @csrf
                                <h5>... noch Fragen ?</h5>
                                <!--Plan price-->
                                <h1 class="display-5 mb-0"><small>wir sind jederzeit für Sie da</small></h1>
                                <!--Plan features list-->
                                <ul class="list-unstyled py-4 mb-0">
                                    <li class=" mb-3">
                                        <div class="input-icon-group mb-3">
                                    <span class="input-icon">
                                          <i class="bx bx-user"></i>
                                        </span>

                                            <input type="text" name="name" placeholder="Ihr Name" class="form-control text-white" required>
                                        </div>
                                        <x-input-error :messages="$errors->get('name')" class="pt-2 pb-0 badge bg-warning text-dark"/>
                                    </li>
                                    <li class=" mb-3">
                                        <div class="input-icon-group mb-3">
                                    <span class="input-icon">
                                          <i class="bx bx-envelope"></i>
                                        </span>

                                            <input type="email" name="email" placeholder="Ihre E-Mail-Adresse" class="form-control text-white" required email>
                                        </div>
                                        <x-input-error :messages="$errors->get('email')" class="pt-2 pb-0 badge bg-warning text-dark"/>
                                    <li class=" mb-3">
                                        <div class="input-icon-group mb-3">
                                    <span class="input-icon">
                                          <i class="bx bx-message"></i>
                                        </span>

                                            <textarea name="message" placeholder="Ihre Nachricht" class="form-control text-white" required></textarea>
                                        </div>
                                        <x-input-error :messages="$errors->get('message')" class="pt-2 pb-0 badge bg-warning text-dark"/>
                                    </li>
                                </ul>
                                <!--Plan action button-->
                                <div class="d-grid mb-3">
                                    {{-- <a href="#" class="btn btn-lg btn-primary">Nachricht senden</a>--}}
                                    <button class="btn btn-lg btn-primary g-recaptcha"
                                            data-sitekey="6LcPkaopAAAAAH3sKHo1yHIjzIq-g-WTt_o8SLf7"
                                            data-callback='onSubmit'
                                            data-action='submit'>
                                        Nachricht Senden
                                    </button>
                                </div>
                                <!--Plan info text-->
                                <p class="mb-0 small text-white-50">
                                    <input class="form-check-input me-1" id="terms" name="terms" type="checkbox" value="1" required> Ich stimme den <a href="#"><strong>Datenschutzbestimmungen</strong></a>
                                    zu.
                                    <x-input-error :messages="$errors->get('terms')" style="margin-left:2em;" class="mt-2 pt-2 pb-0 badge bg-warning text-dark"/>
                                </p>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endif

        <!--/.content-->
        @if(session()->has('success'))
            <div class="container pt-14 pb-9 pb-lg-11 position-relative z-1 text-white">
                <div class="row pt-lg-7 justify-content-center text-center">
                    <div class="col-xl-8">
                        <div class="width-10x height-10x rounded-circle position-relative bg-success text-white flex-center mb-4">
                            <i class="bx bx-check lh-1 display-4 fw-normal"></i>
                        </div>
                        <h1 class="display-2 mb-3">
                            Vielen Dank für Ihre Nachricht!
                        </h1>
                        <p class="mb-5 lead mx-auto">
                            Wir haben Ihre Nachricht erhalten und werden uns so schnell wie möglich bei Ihnen melden.
                        </p>


                    </div>
                </div>
            </div>
        @endif

    </section>
    <!--::/end Hero Mail::-->

</x-page-layout>
