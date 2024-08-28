<x-assan-layout layout-type="{{$layoutType}}">
            <!--page-hero-->
           <section class="bg-gradient-primary text-white position-relative">
            <div class="container pt-14 pb-9 pb-lg-12 position-relative z-1">
                <div class="row pt-lg-5 align-items-center justify-content-center text-center">
                        <div class="col-lg-10 col-xl-7 z-2">
                            <div class="position-relative">
                                <div>
                                    <nav class="d-flex justify-content-center" aria-label="breadcrumb">
                                        <div class="mb-4">
                                            <ol class="breadcrumb mb-0">
                                                <li class="breadcrumb-item"><a href="{{ URL::asset('#') }}">Home</a></li>
                                                <li class="breadcrumb-item active">Components</li>
                                                <li class="breadcrumb-item active" aria-current="page"> Scroll spy</li>
                                            </ol>
                                        </div>
                                    </nav>
                                    <h1 class="mb-0 display-4">
                                        Scroll spy
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section class="position-relative" data-bs-root-margin="0px" data-bs-spy="scroll" data-bs-target="#navbar-secondary">
                <div class="container py-9 py-lg-11">
                    <div class="row">

                        <div class="col-md-3 col-xl-2">
                            <div class="sticky-top top-0" id="navbar-secondary">
                                <ul class="nav bg-body-secondary shadow-lg border rounded-3 p-3 flex-column position-relative">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="{{ URL::asset('#about') }}">About</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ URL::asset('#mission') }}">Mission</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ URL::asset('#vision') }}">Vision</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ URL::asset('#wwd') }}">What we Do</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-9 col-xl-8 mx-auto">
                            <div id="about" class="pt-9">
                                <h4 class="mb-4">About us</h4>
                                <p class="lead">Placeholder content for the scrollspy example. Takes you miles high, so
                                    high, 'cause
                                    she’s got that one international smile. There's a stranger in my bed, there's a
                                    pounding in my
                                    head. Oh, no. In another life I would make you stay. ‘Cause I, I’m capable of
                                    anything. Suiting
                                    up for my crowning battle. Used to steal your parents' liquor and climb to the roof.
                                    Tone, tan
                                    fit and ready, turn it up cause its gettin' heavy. Her love is like a drug. I guess
                                    that I
                                    forgot I had a choice.</p>
                                <p class="lead">Placeholder content for the scrollspy example. Takes you miles high, so
                                    high, 'cause
                                    she’s got that one international smile. There's a stranger in my bed, there's a
                                    pounding in my
                                    head. Oh, no. In another life I would make you stay. ‘Cause I, I’m capable of
                                    anything. Suiting
                                    up for my crowning battle. Used to steal your parents' liquor and climb to the roof.
                                    Tone, tan
                                    fit and ready, turn it up cause its gettin' heavy. Her love is like a drug. I guess
                                    that I
                                    forgot I had a choice.</p>
                            </div>
                            <div id="mission" class="pt-9">
                                <h4 class="mb-4">Our mission</h4>
                                <p class="lead">Placeholder content for the scrollspy example. Takes you miles high, so
                                    high, 'cause
                                    she’s got that one international smile. There's a stranger in my bed, there's a
                                    pounding in my
                                    head. Oh, no. In another life I would make you stay. ‘Cause I, I’m capable of
                                    anything. Suiting
                                    up for my crowning battle. Used to steal your parents' liquor and climb to the roof.
                                    Tone, tan
                                    fit and ready, turn it up cause its gettin' heavy. Her love is like a drug. I guess
                                    that I
                                    forgot I had a choice.</p>
                                <p class="lead">Placeholder content for the scrollspy example. Takes you miles high, so
                                    high, 'cause
                                    she’s got that one international smile. There's a stranger in my bed, there's a
                                    pounding in my
                                    head. Oh, no. In another life I would make you stay. ‘Cause I, I’m capable of
                                    anything. Suiting
                                    up for my crowning battle. Used to steal your parents' liquor and climb to the roof.
                                    Tone, tan
                                    fit and ready, turn it up cause its gettin' heavy. Her love is like a drug. I guess
                                    that I
                                    forgot I had a choice.</p>
                            </div>
                            <div id="vision" class="pt-9">
                                <h4 class="mb-4">Our vision</h4>
                                <p class="lead">Placeholder content for the scrollspy example. Takes you miles high, so
                                    high, 'cause
                                    she’s got that one international smile. There's a stranger in my bed, there's a
                                    pounding in my
                                    head. Oh, no. In another life I would make you stay. ‘Cause I, I’m capable of
                                    anything. Suiting
                                    up for my crowning battle. Used to steal your parents' liquor and climb to the roof.
                                    Tone, tan
                                    fit and ready, turn it up cause its gettin' heavy. Her love is like a drug. I guess
                                    that I
                                    forgot I had a choice.</p>
                                <img src="{{ URL::asset('assets/img/1200x600/1.jpg') }}" class="my-4 img-fluid rounded-3" alt="">
                                <p class="lead">Placeholder content for the scrollspy example. Takes you miles high, so
                                    high, 'cause
                                    she’s got that one international smile. There's a stranger in my bed, there's a
                                    pounding in my
                                    head. Oh, no. In another life I would make you stay. ‘Cause I, I’m capable of
                                    anything. Suiting
                                    up for my crowning battle. Used to steal your parents' liquor and climb to the roof.
                                    Tone, tan
                                    fit and ready, turn it up cause its gettin' heavy. Her love is like a drug. I guess
                                    that I
                                    forgot I had a choice.</p>
                            </div>
                            <div id="wwd" class="pt-9">
                                <h4 class="mb-4">What We Do</h4>
                                <p class="lead">Placeholder content for the scrollspy example. Takes you miles high, so
                                    high, 'cause
                                    she’s got that one international smile. There's a stranger in my bed, there's a
                                    pounding in my
                                    head. Oh, no. In another life I would make you stay. ‘Cause I, I’m capable of
                                    anything. Suiting
                                    up for my crowning battle. Used to steal your parents' liquor and climb to the roof.
                                    Tone, tan
                                    fit and ready, turn it up cause its gettin' heavy. Her love is like a drug. I guess
                                    that I
                                    forgot I had a choice.</p>
                                <p class="lead">Placeholder content for the scrollspy example. Takes you miles high, so
                                    high, 'cause
                                    she’s got that one international smile. There's a stranger in my bed, there's a
                                    pounding in my
                                    head. Oh, no. In another life I would make you stay. ‘Cause I, I’m capable of
                                    anything. Suiting
                                    up for my crowning battle. Used to steal your parents' liquor and climb to the roof.
                                    Tone, tan
                                    fit and ready, turn it up cause its gettin' heavy. Her love is like a drug. I guess
                                    that I
                                    forgot I had a choice.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="bg-success-subtle position-relative">
                <svg class="position-absolute top-0 start-0 text-success w-50 h-auto w-lg-75" width="136" height="76"
                    viewBox="0 0 136 76" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-opacity=".1"
                        d="M136 -28C136 -14.3425 133.31 -0.818782 128.083 11.7991C122.857 24.4169 115.196 35.8818 105.539 45.5391C95.8818 55.1964 84.4169 62.857 71.7991 68.0835C59.1812 73.31 45.6575 76 32 76C18.3425 76 4.81878 73.31 -7.79908 68.0835C-20.4169 62.857 -31.8818 55.1964 -41.5391 45.5391C-51.1964 35.8818 -58.857 24.4169 -64.0835 11.7991C-69.31 -0.818789 -72 -14.3425 -72 -28L136 -28Z"
                        fill="currentColor" />
                </svg>
                <div class="container py-9 py-lg-11 position-relative z-1">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-10 col-lg-8 col-xl-7 text-center mx-auto">
                            <h2 class="mb-4 display-4" data-aos="fade-up">
                                Let's start building stunning websites
                            </h2>
                            <p class="mb-5 px-lg-5" data-aos="fade-up" data-aos-delay="100">
                                Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing
                                industries for previewing layouts and visual mockups.
                            </p>
                            <div data-aos="fade-up">
                                <a href="{{ URL::asset('#!') }}" class="btn btn-primary btn-lg">Purchase a
                                    license</a>
                            </div>
                        </div>
                        <!--End Col-->
                    </div> <!-- / .row -->
                </div> <!-- / .container -->
            </section>
</x-assan-layout>
