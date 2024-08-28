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
                                                <li class="breadcrumb-item active" aria-current="page">Typed Text</li>
                                            </ol>
                                        </div>
                                    </nav>
                                    <h1 class="mb-0 display-4">
                                        Typed Text
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section class="position-relative bg-body-tertiary">
                <div class="py-9 py-lg-11 container">
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                           <div class="card mb-7 card-body overflow-hidden">
                             <!--Typed text-->
                             <h2 class="mb-3 position-relative">I'm <span class="text-primary"
                                data-typed='{"strings": ["John Doe", "UI Designer", "Creative Designer", "Pet lover"]}'></span>
                        </h2>
                          <!--Clipboard-->
                <div class="position-relative" style="max-height: 80vh; overflow-y: auto;">
                    <button
                        class="btn btn-sm position-absolute end-0 top-0 me-3 mt-3 z-1 btn-primary copy-link"
                        data-clipboard-target="#copyTyped1" data-clipboard-action="copy" id="copyTyped">Copy
                        code</button>
<pre id="copyTyped1" class="language-markup bg-secondary text-white-50 rounded-3" data-lang="html">
<code>
&lt;!--Typed text-->
&lt;h2 class="mb-5 position-relative">I'm &lt;span class="text-primary"
data-typed='{"strings": ["John Doe", "UI Designer", "Creative Designer", "Pet lover"]}'>&lt;/span>
&lt;/h2>
</code>
</pre>
                </div>
                           </div>
                           <p class="mb-0 text-center">Learn more about <a href="{{ URL::asset('https://mattboldt.com/demos/typed-js/') }}" target="_blank">Typed.js</a></p>
                        </div>
                    </div>

                  
                </div>
            </section>
            <section class="position-relative overflow-hidden bg-primary text-white">
                <div class="container py-9 py-lg-11">
                    <div class="row align-items-end justify-content-around text-center text-md-start">
                        <div class="col-lg-8 col-md-7">
                            <p data-aos="zoom-in" class="mb-4 opacity-75">Are you interested?</p>
                            <h2 class="mb-4 mb-md-0 display-5 fw-lighter" data-aos="zoom-in-up" data-aos-delay="100">
                                Build <span class="text-warning font-serif"
                                    data-typed='{"strings": ["Stunning", "Amazing", "Responsive", "Working"]}'></span>
                                Website
                            </h2>
                        </div>
                        <!--End Col-->
                        <div class="col-lg-4 col-md-5 text-md-end">

                            <div data-aos="fade-left" data-aos-delay="200">
                                <a href="{{ URL::asset('#!') }}" class="btn btn-white rounded-pill">
                                    Get started

                                </a>
                            </div>
                        </div>
                    </div> <!-- / .row -->
                </div> <!-- / .container -->
            </section>
</x-assan-layout>
