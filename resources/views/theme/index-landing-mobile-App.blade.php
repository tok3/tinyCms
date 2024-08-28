<x-assan-layout layout-type="{{$layoutType}}">
            <!--page-hero--->
            <section id="app-hero" class="position-relative bg-body overflow-hidden">

                <div class="container pt-11 pb-9 position-relative z-1">
                    <div class="row pt-lg-5 justify-content-between align-items-center">
                        <div class="col-lg-7 col-xl-6">
                            <h1 class="display-2 position-relative me-lg-n9 mb-4">TO-DO App to remind your important stuff</h1>

                            <p class="mb-4 lead mb-lg-5">
                                Simple task management mobile app
                            </p>
                            <form>
                                <div class="d-flex position-relative mb-4 align-items-center">
                                    <input type="text" placeholder="012-345-7890"
                                        class="ms-2 form-control form-control-lg pe-11">
                                    <button type="button"
                                        class="btn btn-primary btn-sm position-absolute me-2 top-50 translate-middle-y end-0">Send
                                        Link</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-5 col-xl-4 col-sm-8 col-11">
                            <div class="position-relative z-1">
                                <!--Parallax-element-->
                                <div class="position-absolute end-0 top-50 translate-middle-y width-7x h-auto">
                                    <div class="rellax" data-rellax-speed="2" data-rellax-percentage=".9">
                                        <img src="{{ URL::asset('assets/img/vectors/pattern-dots.svg') }}" alt=""
                                            class="fill-warning w-100 h-auto" data-inject-svg></div>
                                </div>
                                <div class="width-20x p-1 position-relative z-1">
                                    <img src="{{ URL::asset('assets/img/mobile-app/screen-1.png') }}" alt=""
                                        class="img-fluid shadow p-2 bg-secondary rounded-3">

                                </div>
                                <img src="{{ URL::asset('assets/img/mobile-app/screen-2.png') }}" alt=""
                                    class="width-18x me-2 me-lg-4 rounded-3 p-2 bg-secondary shadow position-absolute end-0 top-50 translate-middle-y me-7 me-lg-0">
                            </div>
                        </div>
                    </div>
                </div>

            </section>
            <!--/.Hero-end-->

            <section id="features" class="position-relative overflow-hidden">
                <div class="container py-9 py-lg-11 position-relative">
                    <div class="row justify-content-center">
                        <!--Feature column-->
                        <div class="col-12 col-lg-4 text-center mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="150">
                            <div
                                class="flex-center mx-auto width-6x height-6x fs-3 rounded-circle text-bg-primary lh-1 mb-4">
                                <i class="bx bx-alarm"></i>
                            </div>
                            <h5 class="mb-3">Alarm</h5>

                            <p class="mb-0 px-xl-4">
                                Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing
                                industries for layouts and visual mockups.
                            </p>
                        </div>

                        <!--Feature column-->
                        <div class="col-12 col-lg-4 text-center mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="200">
                            <div
                                class="flex-center mx-auto width-6x height-6x fs-3 rounded-circle text-bg-info mb-4">
                                <i class="bx bx-wifi-off"></i>
                            </div>
                            <h5 class="mb-3">Work Offline</h5>
                            <p class="mb-0 px-xl-4">
                                Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing
                                industries for layouts and visual mockups.
                            </p>
                        </div>

                        <!--Feature column-->
                        <div class="col-12 col-lg-4 text-center" data-aos="fade-up" data-aos-delay="250">
                            <div
                                class="flex-center mx-auto width-6x height-6x fs-3 rounded-circle text-bg-success lh-1 mb-4">
                                <i class="bx bx-task"></i>
                            </div>
                            <h5 class="mb-3">Add Edit Tasks</h5>
                            <p class="mb-0 px-xl-4">
                                Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing
                                industries for layouts and visual mockups.
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="position-relative">
                <div class="container overflow-hidden position-relative py-9">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-md-6 col-sm-8 mx-auto mx-md-0 col-xl-5 mb-5 mb-md-0">
                            <div class="position-relative ps-4 z-1" data-aos="fade-left">
                                <!--Parallax-element-->
                                <div class="position-absolute start-0 top-50 translate-middle-y width-7x h-auto">
                                    <div class="rellax" data-rellax-speed="-2" data-rellax-percentage=".9">
                                        <img src="{{ URL::asset('assets/img/vectors/pattern-dots.svg') }}" alt=""
                                            class="fill-warning w-100 h-auto" data-inject-svg></div>
                                </div>
                                <div class="width-19x mx-auto p-1 position-relative">
                                    <img src="{{ URL::asset('assets/img/mobile-app/screen-2.png') }}" alt=""
                                        class="img-fluid shadow-xl p-1 bg-secondary rounded-3">
                                </div>
                                </div>
                        </div>
                        <div class="col-md-6 col-lg-5 text-center text-lg-start position-relative z-1" data-aos="fade-right">

                            <h2 class="mb-4 display-4">
                                Organize tasks
                                with ease</h2>
                            <p class="mb-5">
                                Lorem ipsum dolor sit amet adipiscing elit, sed do eiusmod tempor incididunt ut labore
                                et dolore magna aliqua.Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                                accusantium.
                            </p>

                            <div class="d-flex align-items-center justify-content-center justify-content-md-start">
                                <a href="{{ URL::asset('https://vimeo.com/353105087') }}" data-glightbox data-gallery="gallery07"
                                    class="btn btn-primary hover-lift p-0 width-7x height-7x btn-circle-ripple rounded-pill fs-3 lh-1 flex-center me-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                                        class="bx bx-play align-middle" viewBox="0 0 16 16">
                                        <path
                                            d="M10.804 8L5 4.633v6.734L10.804 8zm.792-.696a.802.802 0 0 1 0 1.392l-6.363 3.692C4.713 12.69 4 12.345 4 11.692V4.308c0-.653.713-.998 1.233-.696l6.363 3.692z" />
                                    </svg>
                                </a>
                                <small class="d-inline-block text-body-secondary ms-2">How does it work? </small>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="position-relative overflow-hidden">
                <div class="container position-relative py-9 py-lg-11">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-md-6 col-sm-8 col-xl-5 mx-auto mx-md-0 mb-5 mb-md-0 order-md-last position-relative">
                            <div class="position-relative ps-4 z-1" data-aos="fade-left">
                                <!--Parallax-element-->
                                <div class="position-absolute end-0 top-50 translate-middle-y width-7x h-auto">
                                    <div class="rellax" data-rellax-speed="-2" data-rellax-percentage=".9">
                                        <img src="{{ URL::asset('assets/img/vectors/pattern-dots.svg') }}" alt=""
                                            class="fill-warning w-100 h-auto" data-inject-svg></div>
                                </div>
                                <div class="width-19x mx-auto p-1 position-relative">
                                    <img src="{{ URL::asset('assets/img/mobile-app/screen-4.png') }}" alt=""
                                        class="img-fluid shadow-xl p-1 bg-secondary rounded-3">
                                </div>
                                </div>
                        </div>
                        <div class="col-md-6 col-xl-5 text-center text-lg-start position-relative z-1 order-md-1" data-aos="fade-right">
                            <h2 class="mb-4 display-4">Multiple editing</h2>
                            <p class="mb-5">
                                Lorem ipsum dolor sit amet adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua.Sed ut perspiciatis unde omnis iste natus
                                error sit voluptatem accusantium.
                            </p>
                            <a href="{{ URL::asset('#!') }}" class="btn btn-primary btn-lg hover-lift">Download the App</a>
                        </div>
                    </div>
                </div>
            </section>
            <section id="faqs" class="position-relative">
                <div class="container pt-9 pt-lg-11 z-1 position-relative overflow-hidden">
                    <div class="row">
                        <div class="col-md-12 mx-auto">
                            <h2 class="mb-7 mb-lg-9 text-center display-4" data-aos="fade-down">Frequently asked
                                questions</h2>
                            <div class="row">
                                <div class="col-xl-7 col-md-10 col-lg-8 mx-auto position-relative">
                                    <div class="swiper pb-9 swiperFaqs position-relative">
                                        <div class="swiper-wrapper">
                                            <div
                                                class="swiper-slide py-7 py-lg-9 px-4 px-lg-5 bg-body border rounded-3">
                                                <h5 class="mb-3">What do I get with this kit?</h5>
                                                <p class="mb-0">
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                                                    ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                                    aliquip ex ea commodo consequat. Duis aute irure dolor in
                                                    reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                                    pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                                                    culpa qui officia deserunt mollit anim id est laborum nisl vel
                                                    pretium lectus quam id leo tincidunt eget nullam non nisi est sit
                                                    amet. Adipiscing elit ut aliquam purus.
                                                </p>
                                            </div>
                                            <div
                                                class="swiper-slide py-7 py-lg-9 px-4 px-lg-5 bg-body border rounded-3">
                                                <h5 class="mb-3">How do i get the new updates?</h5>
                                                <p class="mb-0">
                                                    Feugiat in fermentum posuere urna nec tincidunt praesent. Nisi vitae
                                                    suscipit tellus mauris. Ultrices tincidunt arcu non sodales. Nisl
                                                    pretium fusce id velit ut tortor pretium. Ut sem nulla pharetra diam
                                                    sit amet nisl. Dignissim convallis aenean et tortor. Sit amet
                                                    volutpat consequat mauris. Laoreet sit amet cursus sit amet dictum
                                                    sit. Condimentum id venenatis a condimentum vitae sapien. Rhoncus
                                                    aenean vel elit scelerisque. Consequat nisl vel pretium lectus quam
                                                    id leo. Nisl tincidunt eget nullam non nisi est sit amet facilisis.
                                                    Adipiscing diam donec adipiscing tristique.
                                                </p>
                                            </div>
                                            <div
                                                class="swiper-slide py-7 py-lg-9 px-4 px-lg-5 bg-body border rounded-3">
                                                <h5 class="mb-3">Lorem ipsum dolor sit amet?</h5>
                                                <p class="mb-0">
                                                    Ultrices tincidunt arcu non sodales. Tempus egestas sed sed risus
                                                    pretium quam vulputate. Pellentesque dignissim enim sit amet
                                                    venenatis urna cursus eget. Enim eu turpis egestas pretium aenean.
                                                    Turpis egestas maecenas pharetra convallis posuere. Risus in
                                                    hendrerit gravida rutrum. Enim facilisis gravida neque convallis a
                                                    cras semper. Auctor elit sed vulputate mi. Sem fringilla ut morbi
                                                    tincidunt augue interdum velit. In hac habitasse platea dictumst
                                                    quisque sagittis. Lectus urna duis convallis convallis tellus id
                                                    interdum velit. Rhoncus mattis rhoncus urna neque viverra.
                                                </p>
                                            </div>
                                            <div
                                                class="swiper-slide py-7 py-lg-9 px-4 px-lg-5 bg-body border rounded-3">
                                                <h5 class="mb-2">What's the refund policy?</h5>
                                                <p class="mb-0">
                                                    Malesuada fames ac turpis egestas integer eget aliquet nibh
                                                    praesent. Mauris in aliquam sem fringilla ut morbi. Vulputate enim
                                                    nulla aliquet porttitor lacus luctus. Massa placerat duis ultricies
                                                    lacus sed turpis tincidunt. Commodo odio aenean sed adipiscing diam.
                                                    Eget dolor morbi non arcu risus quis varius quam quisque. A diam
                                                    sollicitudin tempor id eu nisl nunc. Ut placerat orci nulla
                                                    pellentesque dignissim enim sit. Vulputate sapien nec sagittis
                                                    aliquam. Quis varius quam quisque id diam. Adipiscing elit ut
                                                    aliquam purus. Diam sollicitudin tempor id eu nisl nunc mi ipsum.
                                                </p>
                                            </div>
                                            <div
                                                class="swiper-slide py-7 py-lg-9 px-4 px-lg-5 bg-body border rounded-3">
                                                <h5 class="mb-2">Does Assan4 use bootstrap5?</h5>
                                                <p class="mb-0">
                                                    Orci porta non pulvinar neque laoreet suspendisse interdum
                                                    consectetur libero. Amet justo donec enim diam vulputate ut pharetra
                                                    sit amet. Egestas egestas fringilla phasellus faucibus scelerisque
                                                    eleifend. Et netus et malesuada fames. Aliquam faucibus purus in
                                                    massa tempor nec. Tristique senectus et netus et malesuada.
                                                    Venenatis urna cursus eget nunc scelerisque. Malesuada pellentesque
                                                    elit eget gravida cum sociis natoque. Lacus suspendisse faucibus
                                                    interdum posuere lorem ipsum dolor sit. Est placerat in egestas erat
                                                    imperdiet sed. Augue ut lectus arcu bibendum at varius vel.
                                                </p>
                                            </div>
                                            <div
                                                class="swiper-slide py-7 py-lg-9 px-4 px-lg-5 bg-body border rounded-3">
                                                <h5 class="mb-2">Why Assan 4?</h5>
                                                <p class="mb-0">
                                                    Egestas quis ipsum suspendisse ultrices gravida. Accumsan sit amet
                                                    nulla facilisi morbi tempus iaculis. Nunc scelerisque viverra mauris
                                                    in aliquam sem fringilla. Ac feugiat sed lectus vestibulum mattis
                                                    ullamcorper velit sed ullamcorper. Amet nulla facilisi morbi tempus
                                                    iaculis urna id volutpat lacus. Bibendum est ultricies integer quis
                                                    auctor elit sed. Fringilla est ullamcorper eget nulla facilisi.
                                                    Mauris cursus mattis molestie a iaculis at erat pellentesque
                                                    adipiscing. Elit duis tristique sollicitudin nibh sit amet commodo.
                                                    Non sodales neque sodales ut etiam sit amet.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="swiper-pagination text-info"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="position-relative">
                <div id="download" class="container py-9 py-lg-11 z-1 position-relative">
                    <div class="py-5 py-lg-9 px-4 px-lg-7 bg-info shadow-xl text-white rounded-block position-relative overflow-hidden"
                        data-aos="fade-down">
                        <div class="row position-relative">
                            <div class="col-lg-8 offset-lg-1 col-md-9 mb-5 mb-md-0 text-center text-md-start">
                                <h2 class="display-4 mb-4">Download the App now</h2>

                                <div
                                    class="d-flex flex-column flex-sm-row align-items-center justify-content-center justify-content-md-start">
                                    <a href="{{ URL::asset('#!') }}" class="d-inline-block rounded-3 mb-3 mb-sm-0 me-sm-2 hover-lift hover-shadow"
                                        aria-label="Download the app from apple store">
                                        <span class="height-5x w-auto"><img src="{{ URL::asset('assets/img/mobile-app/app-store.svg') }}"
                                                alt="App Store Apple">
                                        </span></a>
                                    <a href="{{ URL::asset('#!') }}" class="d-inline-block hover-lift hover-shadow rounded-3"
                                        aria-label="Download the app from google store">
                                        <span class="height-5x w-auto">
                                            <img src="{{ URL::asset('assets/img/mobile-app/play-store.svg') }}" alt=""></span></a>
                                </div>
                                <div class="pt-4 pt-lg-5 w-md-80 w-lg-100">
                                    Or text <strong>ART</strong> to <strong>123</strong> to get a download link on
                                    your mobile phone.
                                </div>
                            </div>
                        </div>
                        <img src="{{ URL::asset('assets/img/mobile-app/screen-1.png') }}" alt=""
                            class="img-fluid border border-4 border-info-subtle mx-auto me-md-3 me-lg-12 width-18x d-block mb-n15 position-md-absolute end-0 bottom-0 rounded-3 shadow">

                    </div>
                </div>
            </section>
</x-assan-layout>
