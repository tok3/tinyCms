<x-assan-layout layout-type="{{$layoutType}}">
            <!--::Start Hero Pricing::-->
            <section class="position-relative bg-dark">
                 <!--:Gradient background vector:-->
                 <svg class="position-absolute opacity-75 satrt-0 top-0 w-100 h-100" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 700 700" width="700" height="700" opacity="1"><defs><linearGradient gradientTransform="rotate(136, 0.5, 0.5)" x1="50%" y1="0%" x2="50%" y2="100%" id="ffflux-gradient"><stop stop-color="hsl(347, 100%, 72%)" stop-opacity="1" offset="0%"></stop><stop stop-color="hsl(227, 100%, 50%)" stop-opacity="1" offset="100%"></stop></linearGradient><filter id="ffflux-filter" x="-20%" y="-20%" width="140%" height="140%" filterUnits="objectBoundingBox" primitiveUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feTurbulence type="fractalNoise" baseFrequency="0.006 0.004" numOctaves="2" seed="2" stitchTiles="stitch" x="0%" y="0%" width="100%" height="100%" result="turbulence"></feTurbulence>
                    <feGaussianBlur stdDeviation="0 0" x="0%" y="0%" width="100%" height="100%" in="turbulence" edgeMode="duplicate" result="blur"></feGaussianBlur>
                    <feBlend mode="hard-light" x="0%" y="0%" width="100%" height="100%" in="SourceGraphic" in2="blur" result="blend"></feBlend>
                    <feColorMatrix type="saturate" values="3" x="0%" y="0%" width="100%" height="100%" in="blend" result="colormatrix"></feColorMatrix>
                  </filter></defs>
                  <rect width="700" height="700" fill="url(#ffflux-gradient)" filter="url(#ffflux-filter)"></rect>
                </svg>
                
                <div class="container pt-12 pb-9 pb-lg-11 pt-lg-14 position-relative z-1">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-md-7 mb-md-0 mb-7 text-white text-center text-lg-start">
                            <!--:Heading:-->
                            <h1 class="display-3 mb-4">An exceptional service at the valid price</h1>
                            <!--:Subheading:-->
                            <p class="col-lg-10 lead mb-5">
                                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                mollit anim id est laborum.
                            </p>
                            <!--:Scroll down animated button:-->
                            <a href="{{ URL::asset('#next') }}"
                                class="width-7x height-7x flex-center btn p-0 btn-outline-white btn-circle-ripple mx-auto mx-lg-0 rounded-circle">
                                <div class="link-arrow-bounce">
                                    <i class="bx bx-chevron-down"></i>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-5 col-xl-4">
                            <div class="p-4 p-lg-5 rounded-3 bg-dark bg-opacity-10 text-white shadow-lg z-1 position-relative">
                                <!--:Pricing card background:-->
                                <div
                                    class="position-absolute start-0 top-0 w-100 h-100 bg-gradient-dark opacity-50 rounded-3">
                                </div>
                                <div class="position-relative z-1">
                                    <!--Plan type-->
                                    <h5>Free</h5>
                                    <!--Plan price-->
                                    <h1 class="display-2 mb-0"><small>$</small>0</h1>
                                    <!--Plan features list-->
                                    <ul class="list-unstyled py-4 mb-0">
                                        <li class=" mb-3"><i class="bx bx-check-circle me-2 text-white-50"></i>
                                            30 Days free trail
                                        </li>
                                        <li class=" mb-3"><i class="bx bx-check-circle me-2 text-white-50"></i>
                                            No credit card require
                                        </li>
                                        <li class=" mb-3"><i class="bx bx-check-circle me-2 text-white-50"></i>
                                            Cancel anytime
                                        </li>
                                    </ul>
                                    <!--Plan action button-->
                                    <div class="d-grid mb-3">
                                        <a href="{{ URL::asset('#') }}" class="btn btn-lg btn-primary">Start 30 days trail</a>
                                    </div>
                                    <!--Plan info text-->
                                    <p class="mb-0 small text-white-50"><strong>$9 Per month</strong> after the end
                                        of 30 days free trail
                                        <a href="{{ URL::asset('#') }}" class="link-decoration">More about pricing</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/.content-->
            </section>
            <!--::/end Hero Pricing::-->
            <section class="border-bottom" id="next">
                <div class="container pt-9 pt-lg-11">

                    <!--//////////////////SNIPPETS:BEGIN////////////////-->
                    <nav class="nav-tabs nav">
                        <a href="{{ URL::asset('#tabMain') }}" data-bs-toggle="tab" class="nav-link active">HTML</a>
                        <a href="{{ URL::asset('#tabCss') }}" data-bs-toggle="tab" class="nav-link">Css</a>
                        <a href="{{ URL::asset('#tabJs') }}" data-bs-toggle="tab" class="nav-link">Js</a>
                    </nav>
                    <div class="tab-content">
                        <!--Element Main code-->
                        <div class="tab-pane fade show active" id="tabMain">
                            <div class="position-relative" style="max-height: 75vh; overflow-y: auto;">
                                <button
                                    class="btn btn-sm position-absolute end-0 top-0 me-3 mt-3 z-1 btn-primary copy-link"
                                    data-clipboard-target="#copyHTML1" data-clipboard-action="copy"
                                    id="copyHTML1-1">Copy code</button>
<pre id="copyHTML1" class="language-markup bg-secondary text-white-50 mt-0" data-lang="html">
<code>
    &lt;!--::Start Hero Pricing::-->
    &lt;section class="position-relative bg-dark">
        &lt;!--:Gradient background vector:-->
        &lt;svg class="position-absolute opacity-75 satrt-0 top-0 w-100 h-100" xmlns="http://www.w3.org/2000/svg"
            preserveAspectRatio="none" viewBox="0 0 700 700" width="700" height="700" opacity="1">
            &lt;defs>
                &lt;linearGradient gradientTransform="rotate(136, 0.5, 0.5)" x1="50%" y1="0%" x2="50%" y2="100%"
                    id="ffflux-gradient">
                    &lt;stop stop-color="hsl(347, 100%, 72%)" stop-opacity="1" offset="0%">&lt;/stop>
                    &lt;stop stop-color="hsl(227, 100%, 50%)" stop-opacity="1" offset="100%">&lt;/stop>
                &lt;/linearGradient>
                &lt;filter id="ffflux-filter" x="-20%" y="-20%" width="140%" height="140%" filterUnits="objectBoundingBox"
                    primitiveUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    &lt;feTurbulence type="fractalNoise" baseFrequency="0.006 0.004" numOctaves="2" seed="2"
                        stitchTiles="stitch" x="0%" y="0%" width="100%" height="100%" result="turbulence">&lt;/feTurbulence>
                    &lt;feGaussianBlur stdDeviation="0 0" x="0%" y="0%" width="100%" height="100%" in="turbulence"
                        edgeMode="duplicate" result="blur">&lt;/feGaussianBlur>
                    &lt;feBlend mode="hard-light" x="0%" y="0%" width="100%" height="100%" in="SourceGraphic" in2="blur"
                        result="blend">&lt;/feBlend>
                    &lt;feColorMatrix type="saturate" values="3" x="0%" y="0%" width="100%" height="100%" in="blend"
                        result="colormatrix">&lt;/feColorMatrix>
                &lt;/filter>
            &lt;/defs>
            &lt;rect width="700" height="700" fill="url(#ffflux-gradient)" filter="url(#ffflux-filter)">&lt;/rect>
        &lt;/svg>
    
        &lt;div class="container pt-12 pb-9 pb-lg-11 pt-lg-14 position-relative z-1">
            &lt;div class="row align-items-center justify-content-between">
                &lt;div class="col-md-7 mb-md-0 mb-7 text-white text-center text-lg-start">
                    &lt;!--:Heading:-->
                    &lt;h1 class="display-3 mb-4">An exceptional service at the valid price&lt;/h1>
                    &lt;!--:Subheading:-->
                    &lt;p class="col-lg-10 lead mb-5">
                        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                        mollit anim id est laborum.
                    &lt;/p>
                    &lt;!--:Scroll down animated button:-->
                    &lt;a href="{{ URL::asset('#next') }}"
                        class="width-7x height-7x flex-center btn p-0 btn-outline-white btn-circle-ripple mx-auto mx-lg-0 rounded-circle">
                        &lt;div class="link-arrow-bounce">
                            &lt;i class="bx bx-chevron-down">&lt;/i>
                        &lt;/div>
                    &lt;/a>
                &lt;/div>
                &lt;div class="col-md-5 col-xl-4">
                    &lt;div class="p-4 p-lg-5 rounded-3 bg-dark bg-opacity-10 text-white shadow-lg z-1 position-relative">
                        &lt;!--:Pricing card background:-->
                        &lt;div class="position-absolute start-0 top-0 w-100 h-100 bg-gradient-dark opacity-50 rounded-3">
                        &lt;/div>
                        &lt;div class="position-relative z-1">
                            &lt;!--Plan type-->
                            &lt;h5>Free&lt;/h5>
                            &lt;!--Plan price-->
                            &lt;h1 class="display-2 mb-0">&lt;small>$&lt;/small>0&lt;/h1>
                            &lt;!--Plan features list-->
                            &lt;ul class="list-unstyled py-4 mb-0">
                                &lt;li class=" mb-3">&lt;i class="bx bx-check-circle me-2 text-white-50">&lt;/i>
                                    30 Days free trail
                                &lt;/li>
                                &lt;li class=" mb-3">&lt;i class="bx bx-check-circle me-2 text-white-50">&lt;/i>
                                    No credit card require
                                &lt;/li>
                                &lt;li class=" mb-3">&lt;i class="bx bx-check-circle me-2 text-white-50">&lt;/i>
                                    Cancel anytime
                                &lt;/li>
                            &lt;/ul>
                            &lt;!--Plan action button-->
                            &lt;div class="d-grid mb-3">
                                &lt;a href="{{ URL::asset('#') }}" class="btn btn-lg btn-primary">Start 30 days trail&lt;/a>
                            &lt;/div>
                            &lt;!--Plan info text-->
                            &lt;p class="mb-0 small text-white-50">&lt;strong>$9 Per month&lt;/strong> after the end
                                of 30 days free trail
                                &lt;a href="{{ URL::asset('#') }}" class="link-decoration">More about pricing&lt;/a>
                            &lt;/p>
                        &lt;/div>
                    &lt;/div>
                &lt;/div>
            &lt;/div>
        &lt;/div>
        &lt;!--/.content-->
    &lt;/section>
    &lt;!--::/end Hero Pricing::-->    
</code>
</pre>
                            </div>
                        </div>
                        <!--Element Css-->
                        <div class="tab-pane fade" id="tabCss">
                            <div class="position-relative">
                                <button
                                    class="btn btn-sm position-absolute end-0 top-0 me-3 mt-3 z-1 btn-primary copy-link"
                                    data-clipboard-target="#copyCss1" data-clipboard-action="copy" id="copyCss1-2">Copy
                                    code</button>
                                <pre id="copyCss1" class="language-markup bg-secondary text-white-50 mt-0" data-lang="html">
                <code>
  &lt;!-- Bootstrap + Vendor + Theme -->
  &lt;link href="{{ URL::asset('assets/css/theme.min.css') }}" rel="stylesheet">
</code>
</pre>
                            </div>
                        </div>

                        <!--Element JS-->
                        <div class="tab-pane fade" id="tabJs">
                          
                            <div class="position-relative">
                                <button
                                    class="btn btn-sm position-absolute end-0 top-0 me-3 mt-3 z-1 btn-primary copy-link"
                                    data-clipboard-target="#copyJs1" data-clipboard-action="copy" id="copyJs1-3">Copy
                                    code</button>
                                <pre id="copyJs1" class="language-markup bg-secondary text-white-50 mt-0" data-lang="html">
                <code>
  &lt;!-- Bootstrap + Vendor + Theme -->
  &lt;script src="{{ URL::asset('assets/css/theme.bundle.js') }}">&lt;/script>
</code>
</pre>
                            </div>
                        </div>
                    </div>
                    <!--//////////////////SNIPPETS:END////////////////-->
                </div>
                <div class="container py-9 py-lg-11">
                    <div class="px-4 rounded-3 shadow-lg py-6 px-lg-5 py-lg-7 bg-gradient bg-secondary text-white position-relative overflow-hidden"
                        data-aos="fade-up" data-aos-duration="400">
                        <svg class="position-absolute end-0 bottom-0 mb-4 text-success" width="200" height="400"
                            preserveAspectRatio="none" viewBox="0 0 150 300" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M150 300C130.302 300 110.796 296.12 92.5975 288.582C74.3986 281.044 57.8628 269.995 43.934 256.066C30.0052 242.137 18.9563 225.601 11.4181 207.403C3.87986 189.204 -6.2614e-07 169.698 0 150C6.2614e-07 130.302 3.87987 110.796 11.4181 92.5975C18.9563 74.3987 30.0052 57.8628 43.934 43.934C57.8628 30.0052 74.3987 18.9563 92.5975 11.4181C110.796 3.87986 130.302 3.51961e-06 150 5.00679e-06L150 37.5C135.226 37.5 120.597 40.4099 106.948 46.0636C93.299 51.7172 80.8971 60.0039 70.4505 70.4505C60.0039 80.8971 51.7172 93.299 46.0636 106.948C40.4099 120.597 37.5 135.226 37.5 150C37.5 164.774 40.4099 179.403 46.0636 193.052C51.7172 206.701 60.0039 219.103 70.4505 229.55C80.8971 239.996 93.299 248.283 106.948 253.936C120.597 259.59 135.226 262.5 150 262.5V300Z"
                                fill="currentColor"></path>
                        </svg>

                        <div class="row align-items-end position-relative">
                            <div class="col-lg-6 col-xl-7">
                                <h5 class="text-white-50 mb-4">Let's start building</h5>
                                <h2 class="mb-5 mb-md-0 display-5">Stunning websites ease</h2>
                            </div>
                            <div class="col-lg-6 col-xl-5 text-lg-end">
                                <a href="{{ URL::asset('#!') }}" class="btn btn-primary btn-lg me-2 mb-2 mb-lg-0">Contact sales</a>
                                <a href="{{ URL::asset('#!') }}" class="btn btn-gray-200 btn-lg">Purchase Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
</x-assan-layout>
