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
                                                <li class="breadcrumb-item active" aria-current="page">Embed videos
                                                </li>
                                            </ol>
                                        </div>
                                    </nav>
                                    <h1 class="mb-0 display-4">
                                        Videos Player
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="position-relative" id="next">
                <div class="container py-9 py-lg-11">
                    <div class="row">
                        <div class="col col-lg-10 col-xl-8 mx-lg-auto">
                            <!--HTML5 Video Player-->
                            <div class="card mb-7 card-body overflow-hidden">
                                <h5 class="mb-4">HTML5 Video Player</h5>
                                <div class="rounded-3 mb-3 overflow-hidden shadow-lg position-relative">
                                    <video poster="./assets/videos/officeloop-cover.jpg"
                                        class="player w-100 h-100 d-block" playsinline controls preload="none">
                                        <source src="{{ URL::asset('./assets/videos/officeloop.mp4') }}" type="video/mp4">
                                    </video>
                                </div>
                                <!--Clipboard-->
                                <div class="position-relative" style="max-height: 80vh; overflow-y: auto;">
                                    <button
                                        class="btn btn-sm position-absolute end-0 top-0 me-2 mt-3 z-1 btn-primary copy-link"
                                        data-clipboard-target="#copyHTML51" data-clipboard-action="copy"
                                        id="copyHTML51-1">Copy code</button>
<pre id="copyHTML51" class="language-markup bg-secondary text-white-50 rounded-3" data-lang="html">
<code
&lt;!--HTML5 video player-->
&lt;div class="rounded-3 mb-5 overflow-hidden shadow-lg position-relative">
  &lt;video poster="./assets/videos/officeloop-cover.jpg" class="player w-100 h-100 d-block" playsinline controls preload="none">
   &lt;source src="{{ URL::asset('./assets/videos/officeloop.mp4') }}" type="video/mp4">
  &lt;/video>
&lt;/div>
</code>
</pre>
                                </div>
                            </div>

                            <!--Youtube Video player-->
                            <div class="mb-7 card card-body overflow-hidden">
                                <h5 class="mb-4">Youtube video player</h5>
                                <div class="rounded-3 mb-3 overflow-hidden shadow-lg position-relative">
                                    <div class="player" data-plyr-provider="youtube" data-plyr-embed-id="bTqVqk7FSmY">
                                    </div>
                                </div>

                                <!--Clipboard-->
                                <div class="position-relative" style="max-height: 80vh; overflow-y: auto;">
                                    <button
                                        class="btn btn-sm position-absolute end-0 top-0 me-2 mt-3 z-1 btn-primary copy-link"
                                        data-clipboard-target="#copyYTP1" data-clipboard-action="copy" id="copyYTP1-1">Copy
                                        code</button>
                                    <pre id="copyYTP1" class="language-markup bg-secondary text-white-50 rounded-3" data-lang="html">
<code>
&lt;!--Youtube video player-->
&lt;div class="rounded-3 mb-5 overflow-hidden shadow-lg position-relative">
 &lt;div class="player" data-plyr-provider="youtube" data-plyr-embed-id="bTqVqk7FSmY">&lt;/div>
&lt;/div>
</code>
</pre>
                                </div>
                            </div>
                            <!--Vimeo Video player-->
                            <div class="card mb-7 card-body overflow-hidden">
                                <h5 class="mb-4">Vimeo Video Player</h5>
                                <div class="rounded-3 mb-3 overflow-hidden shadow-lg position-relative">
                                    <div class="player" data-plyr-provider="vimeo" data-plyr-embed-id="76979871"></div>
                                </div>
                                <!--Clipboard-->
                                <div class="position-relative" style="max-height: 80vh; overflow-y: auto;">
                                    <button
                                        class="btn btn-sm position-absolute end-0 top-0 me-2 mt-3 z-1 btn-primary copy-link"
                                        data-clipboard-target="#copyVimeo1" data-clipboard-action="copy"
                                        id="copyVimeo">Copy code</button>
                                    <pre id="copyVimeo1" class="language-markup bg-secondary text-white-50 rounded-3" data-lang="html">
<code>
&lt;!--Vimeo video player-->
&lt;div class="rounded-3 mb-5 overflow-hidden shadow-lg position-relative">
 &lt;div class="player" data-plyr-provider="vimeo" data-plyr-embed-id="76979871">&lt;/div>
&lt;/div>
</code>
</pre>
                                </div>
                            </div>
                            <!--Vimeo Video player-->
                            <div class="card card-body overflow-hidden">
                                <h5 class="mb-4">Required Css and Js for Plyr</h5>
                                <small><strong class="text-primary">CSS</strong> - Copy code and paste into page
                                    <code>head</code> tag</small>
                                <!--Clipboard-->
                                <div class="position-relative mb-4" style="max-height: 80vh; overflow-y: auto;">
                                    <button
                                        class="btn btn-sm position-absolute end-0 top-0 me-2 mt-3 z-1 btn-primary copy-link"
                                        data-clipboard-target="#copyCSS1" data-clipboard-action="copy" id="copyCSS">Copy
                                        code</button>
                                    <pre id="copyCSS1" class="language-markup bg-secondary text-white-50 rounded-3" data-lang="html">
<code>
&lt;!--Plyr Css-->
&lt;link rel="stylesheet" href="{{ URL::asset('assets/vendor/node_modules/css/plyr.css') }}">
&lt;!--Theme Css (Includes plyr custom css (_plyr.scss))-->
&lt;link href="{{ URL::asset('assets/css/theme.min.css') }}" rel="stylesheet">
</code>
</pre>
                                </div>
                                <small><strong class="text-primary">JS</strong> - Copy code and paste into page before
                                    end of <code>body</code> tag</small>
                                <!--Clipboard-->
                                <div class="position-relative " style="max-height: 80vh; overflow-y: auto;">
                                    <button
                                        class="btn btn-sm position-absolute end-0 top-0 me-2 mt-3 z-1 btn-primary copy-link"
                                        data-clipboard-target="#copyJS1" data-clipboard-action="copy" id="copyJS">Copy
                                        code</button>
                                    <pre id="copyJS1" class="language-markup bg-secondary text-white-50 rounded-3" data-lang="html">
<code>
&lt;!--Plyr JS-->
&lt;script src="{{ URL::asset('assets/vendor/node_modules/js/plyr.min.js') }}">&lt;/script>
&lt;!--Init Plyr JS-->
&lt;script>
    var player = document.querySelectorAll('.player')
    player.forEach(function (el) {
        new Plyr(el);
    })
&lt;/script>
</code>
</pre>
                                </div>
                            </div>
                            <div class="mt-7 text-center">
                                <p class="mb-0">Learn More about <a class="link-primary" href="{{ URL::asset('https://plyr.io/#video') }}"
                                        target="_blank">Plyr</a></p>
                            </div>
                        </div>
                    </div>

                </div>
                <!--/.container-full-width-->
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
