<x-assan-layout layout-type="{{$layoutType}}">
            <!--Hero-->
            <section class="position-relative bg-dark overflow-hidden">
                <!-- Swiper slider -->
                <div class="swiper-container swiper-classic">
                    <!-- Swiper wrapper -->
                    <div class="swiper-wrapper">
                        <!-- slide item -->
                        <div class="swiper-slide" style="background-image:url('assets/img/backgrounds/bg7.jpg')">
                            <div class="bg-dark position-absolute start-0 top-0 w-100 h-100 opacity-75"></div>
                            <div class="container-fluid text-white d-flex align-items-center h-100">
                                <div class="row pt-5 w-100">
                                    <div class="col-xl-8 col-lg-10 mx-auto text-center">
                                        <ul class="carousel-layers list-unstyled mb-0">
                                            <!--Slide heading-->
                                            <li data-carousel-layer="fade-start">
                                                <h2 class="display-1 mb-3">
                                                    Accelerate your business
                                                </h2>
                                            </li>
                                            <li data-carousel-layer="fade-end">
                                                <!--Slide subheading-->
                                                <p class="lead mb-4 mb-lg-5">
                                                    We build relationships
                                                    that connect brands to peoples
                                                </p>
                                            </li>
                                            <li data-carousel-layer="fade-start">
                                                <!--Slide action-->
                                                <a href="{{ URL::asset('#') }}" class="btn btn-primary btn-lg">
                                                    How it works
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Slide 2-->
                        <div class="swiper-slide" style="background-image:url('assets/img/backgrounds/bg3.jpg')">
                            <div class="bg-dark position-absolute start-0 top-0 w-100 h-100 opacity-75"></div>
                            <div class="container-fluid text-white d-flex align-items-center h-100">
                                <div class="row pt-5 w-100">
                                    <div class="col-xl-8 col-lg-10 mx-auto text-center">
                                        <ul class="carousel-layers list-unstyled mb-0">
                                            <!--Slide heading-->
                                            <li data-carousel-layer="fade-start">
                                                <h2 class="display-1 mb-3">
                                                    Grow your business
                                                </h2>
                                            </li>
                                            <li data-carousel-layer="fade-end">
                                                <!--Slide subheading-->
                                                <p class="lead mb-4 mb-lg-5">
                                                    We build relationships
                                                    that connect brands to peoples
                                                </p>
                                            </li>
                                            <li data-carousel-layer="fade-start">
                                                <!--Slide action-->
                                                <a href="{{ URL::asset('#') }}" class="btn btn-primary btn-lg">
                                                    Purchase now
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Slide 3-->
                        <div class="swiper-slide" style="background-image:url('assets/img/backgrounds/bg2.jpg')">
                            <div class="bg-dark position-absolute start-0 top-0 w-100 h-100 opacity-75"></div>
                            <div class="container-fluid text-white d-flex align-items-center h-100">
                                <div class="row pt-5 w-100">
                                    <div class="col-xl-8 col-lg-10 mx-auto text-center">
                                        <ul class="carousel-layers list-unstyled mb-0">
                                            <li data-carousel-layer="fade-start">
                                                <!--Slide heading-->
                                                <h2 class="display-1 mb-3">
                                                    Build your business
                                                </h2>
                                            </li>
                                            <li data-carousel-layer="fade-end">
                                                <!--Slide subheading-->
                                                <p class="lead mb-4 mb-lg-5">
                                                    We build relationships
                                                    that connect brands to peoples
                                                </p>
                                            </li>
                                            <li data-carousel-layer="fade-start">
                                                <!--Slide action-->
                                                <a href="{{ URL::asset('#') }}" class="btn btn-primary btn-lg">
                                                    Try it Now!
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Slider pagination -->
                    <div class="swiper-pagination swiperClassic-pagination text-white"></div>
                    <!-- Slider Arrow -->
                    <div class="swiper-button-prev swiperClassic-button-prev bg-transparent width-5x height-5x text-white">
                    </div>
                    <!-- Slider Arrow -->
                    <div class="swiper-button-next swiperClassic-button-next bg-transparent width-5x height-5x text-white">
                    </div>
                </div>
            </section>
            <!--/.Slider end-->
            <section class="border-bottom">
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
                            <div class="position-relative" style="max-height:75vh;overflow-y:auto">
                                <button
                                    class="btn btn-sm position-absolute end-0 top-0 me-3 mt-3 z-1 btn-primary copy-link"
                                    data-clipboard-target="#copyHTML1" data-clipboard-action="copy"
                                    id="copyHTML1-1">Copy code</button>
                                <pre id="copyHTML1" class="language-markup bg-secondary text-white-50 mt-0" data-lang="html">
                <code>
    &lt;!--Hero-->
    &lt;section class="position-relative bg-dark overflow-hidden">
        &lt;!-- Swiper slider -->
        &lt;div class="swiper-container swiper-classic">
            &lt;!-- Swiper wrapper -->
            &lt;div class="swiper-wrapper">
                &lt;!-- slide item -->
                &lt;div class="swiper-slide" style="background-image:url('assets/img/backgrounds/bg7.jpg')">
                    &lt;div class="bg-dark position-absolute start-0 top-0 w-100 h-100 opacity-75">&lt;/div>
                    &lt;div class="container-fluid text-white d-flex align-items-center h-100">
                        &lt;div class="row pt-5 w-100">
                            &lt;div class="col-xl-8 col-lg-10 mx-auto text-center">
                                &lt;ul class="carousel-layers list-unstyled mb-0">
                                    &lt;!--Slide heading-->
                                    &lt;li data-carousel-layer="fade-start">
                                        &lt;h2 class="display-1 mb-3">
                                            Accelerate your business
                                        &lt;/h2>
                                    &lt;/li>
                                    &lt;li data-carousel-layer="fade-end">
                                        &lt;!--Slide subheading-->
                                        &lt;p class="lead mb-4 mb-lg-5">
                                            We build relationships
                                            that connect brands to peoples
                                        &lt;/p>
                                    &lt;/li>
                                    &lt;li data-carousel-layer="fade-start">
                                        &lt;!--Slide action-->
                                        &lt;a href="{{ URL::asset('#') }}" class="btn btn-primary btn-lg">
                                            How it works
                                        &lt;/a>
                                    &lt;/li>
                                &lt;/ul>
                            &lt;/div>
                        &lt;/div>
                    &lt;/div>
                &lt;/div>
                &lt;!--Slide 2-->
                &lt;div class="swiper-slide" style="background-image:url('assets/img/backgrounds/bg3.jpg')">
                    &lt;div class="bg-dark position-absolute start-0 top-0 w-100 h-100 opacity-75">&lt;/div>
                    &lt;div class="container-fluid text-white d-flex align-items-center h-100">
                        &lt;div class="row pt-5 w-100">
                            &lt;div class="col-xl-8 col-lg-10 mx-auto text-center">
                                &lt;ul class="carousel-layers list-unstyled mb-0">
                                    &lt;!--Slide heading-->
                                    &lt;li data-carousel-layer="fade-start">
                                        &lt;h2 class="display-1 mb-3">
                                            Grow your business
                                        &lt;/h2>
                                    &lt;/li>
                                    &lt;li data-carousel-layer="fade-end">
                                        &lt;!--Slide subheading-->
                                        &lt;p class="lead mb-4 mb-lg-5">
                                            We build relationships
                                            that connect brands to peoples
                                        &lt;/p>
                                    &lt;/li>
                                    &lt;li data-carousel-layer="fade-start">
                                        &lt;!--Slide action-->
                                        &lt;a href="{{ URL::asset('#') }}" class="btn btn-primary btn-lg">
                                            Purchase now
                                        &lt;/a>
                                    &lt;/li>
                                &lt;/ul>
                            &lt;/div>
                        &lt;/div>
                    &lt;/div>
                &lt;/div>
                &lt;!--Slide 3-->
                &lt;div class="swiper-slide" style="background-image:url('assets/img/backgrounds/bg2.jpg')">
                    &lt;div class="bg-dark position-absolute start-0 top-0 w-100 h-100 opacity-75">&lt;/div>
                    &lt;div class="container-fluid text-white d-flex align-items-center h-100">
                        &lt;div class="row pt-5 w-100">
                            &lt;div class="col-xl-8 col-lg-10 mx-auto text-center">
                                &lt;ul class="carousel-layers list-unstyled mb-0">
                                    &lt;li data-carousel-layer="fade-start">
                                        &lt;!--Slide heading-->
                                        &lt;h2 class="display-1 mb-3">
                                            Build your business
                                        &lt;/h2>
                                    &lt;/li>
                                    &lt;li data-carousel-layer="fade-end">
                                        &lt;!--Slide subheading-->
                                        &lt;p class="lead mb-4 mb-lg-5">
                                            We build relationships
                                            that connect brands to peoples
                                        &lt;/p>
                                    &lt;/li>
                                    &lt;li data-carousel-layer="fade-start">
                                        &lt;!--Slide action-->
                                        &lt;a href="{{ URL::asset('#') }}" class="btn btn-primary btn-lg">
                                            Try it Now!
                                        &lt;/a>
                                    &lt;/li>
                                &lt;/ul>
                            &lt;/div>
                        &lt;/div>
                    &lt;/div>
                &lt;/div>
            &lt;/div>
            &lt;!-- Slider pagination -->
            &lt;div class="swiper-pagination swiperClassic-pagination text-white">&lt;/div>
            &lt;!-- Slider Arrow -->
            &lt;div class="swiper-button-prev swiperClassic-button-prev bg-transparent width-5x height-5x text-white">
            &lt;/div>
            &lt;!-- Slider Arrow -->
            &lt;div class="swiper-button-next swiperClassic-button-next bg-transparent width-5x height-5x text-white">
            &lt;/div>
        &lt;/div>
    &lt;/section>
&lt;!--/.Slider end-->
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
&lt;!--Swiper slider-->
&lt;link rel="stylesheet" href="{{ URL::asset('assets/vendor/node_modules/css/swiper-bundle.min.css') }}">
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
&lt;!--Swiper slider-->
&lt;script src="{{ URL::asset('assets/vendor/node_modules/js/swiper-bundle.min.js') }}">&lt;/script>
&lt;script>
var swiperClassic = new Swiper(".swiper-classic", {
    slidesPerView: 1, spaceBetween: 0,
    loop: true, autoplay: { delay: 2500 },
    effect: "creative",
    creativeEffect: {
        prev: {
            shadow: true,
            translate: ["-20%", 0, -1],
        },
        next: {
            translate: ["100%", 0, 0],
        },
    },
    pagination: {
        el: ".swiperClassic-pagination",
        clickable:true
    },
    navigation: { nextEl: ".swiperClassic-button-next", prevEl: ".swiperClassic-button-prev" }
});
&lt;/script>
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
