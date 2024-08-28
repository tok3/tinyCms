<x-assan-layout layout-type="{{$layoutType}}">
            <section class="position-relative bg-dark text-white">
                <div class="container position-relative py-9 py-lg-15">
                    <div class="row pt-9">
                        <div class="col-xl-9">
                            <h1 class="display-4 mb-3">Header Fullscreen</h1>
                            <p class="lead mb-0">Build stunning website faster than ever</p>
                        </div>
                    </div>
                    <!--/.row-->
                </div>
                <!--/.content-->
            </section>
            <!--/section-->
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
                            <div class="position-relative" style="max-height:75vh;overflow-y: auto;">
                                <button
                                    class="btn btn-sm position-absolute end-0 top-0 me-3 mt-3 z-1 btn-primary copy-link"
                                    data-clipboard-target="#copyHTML1" data-clipboard-action="copy"
                                    id="copyHTML1-1">Copy code</button>
<pre id="copyHTML1" class="language-markup bg-secondary text-white-50 mt-0" data-lang="html">
<code>
    &lt;!--Begin::Header-->
    &lt;header class="z-fixed header-absolute-top pt-lg-1 header-transparent">
        &lt;nav class="navbar navbar-expand-lg navbar-dark">
            &lt;div class="container">
                &lt;!--Logo-->
                &lt;a class="navbar-brand" href="{{ URL::asset('index.html') }}">
                    &lt;img src="{{ URL::asset('assets/img/logo/logo-white.svg') }}" alt="" class="img-fluid">
                &lt;/a>
                &lt;div class="d-flex align-items-center navbar-no-collapse-items py-3 order-last">
                    &lt;div class="nav-item fullscreen-toggler order-last ms-4">
                        &lt;!--Fullscreen trigger-->
                        &lt;a href="{{ URL::asset('#offcanvas-fullscreen') }}" class="nav-link width-3x d-block" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvas-fullscreen">
                            &lt;div class="width-2x mb-1 border-bottom border-white border-2">&lt;/div>
                            &lt;div class="width-2x ms-auto border-bottom border-white border-2">&lt;/div>
                        &lt;/a>
                    &lt;/div>
                    &lt;div class="nav-item ms-3 ms-lg-4">
                        &lt;a href="{{ URL::asset('#') }}"
                            class="btn btn-outline-light border-0 rounded-pill btn-sm p-0 width-3x height-3x flex-center">
                        &lt;i class="bx bxl-facebook fs-5">&lt;/i>    
                        &lt;/a>
                    &lt;/div>
                    &lt;div class="nav-item ms-1">
                        &lt;a href="{{ URL::asset('#') }}"
                            class="btn btn-outline-light border-0 rounded-pill btn-sm p-0 width-3x height-3x flex-center">
                            &lt;i class="bx bxl-twitter fs-5">&lt;/i>
                        &lt;/a>
                    &lt;/div>
                    &lt;div class="nav-item ms-1">
                        &lt;a href="{{ URL::asset('#') }}"
                            class="btn btn-outline-light border-0 rounded-pill btn-sm p-0 width-3x height-3x flex-center">
                            &lt;i class="bx bxl-instagram fs-5">&lt;/i>
                        &lt;/a>
                    &lt;/div>
                    &lt;div class="nav-item ms-1">
                        &lt;a href="{{ URL::asset('#') }}"
                            class="btn btn-outline-light border-0 rounded-pill btn-sm p-0 width-3x height-3x flex-center">
                            &lt;i class="bx bxl-linkedin fs-5">&lt;/i>
                        &lt;/a>
                    &lt;/div>
                &lt;/div>
            &lt;/div>
        &lt;/nav>
    &lt;/header>
    &lt;!--/end::Header-->

    &lt;!--Begin::Fullscreen Offcanvas-->
    &lt;div class="offcanvas offcanvas-fullscreen offcanvas-top h-100" id="offcanvas-fullscreen">
        &lt;div class="offcanvas-body">
            &lt;!--Offcanvas fullscreen close-->
            &lt;div class="position-absolute end-0 top-0 mt-3 me-5">
                &lt;button class="btn btn-outline-secondary p-0 flex-center width-4x height-4x rounded-circle"
                    data-bs-dismiss="offcanvas">
                    &lt;i class="bx bx-x fs-4">&lt;/i>
                &lt;/button>
            &lt;/div>
            &lt;!--Offcanvas fullscreen content-->
            &lt;div class="container h-100">
                &lt;div class="row h-100 align-items-center">
                    &lt;div class="col-md-7 mb-5 mb-md-0">
                        &lt;div class="d-inline-flex">
                            &lt;ul class="js-hover-img">
                                &lt;li class="js-hover-img-item mb-4">
                                    &lt;div class="js-hover-img-link display-4">
                                        &lt;a href="{{ URL::asset('#') }}">Index&lt;/a>
                                    &lt;/div>
                                    &lt;img src="{{ URL::asset('assets/img/projects/1.jpg') }}" alt="Image" class="img">
                                &lt;/li>
                                &lt;li class="js-hover-img-item mb-4">
                                    &lt;div class="js-hover-img-link display-4">
                                        &lt;a href="{{ URL::asset('#') }}">Who we are&lt;/a>
                                    &lt;/div>
                                    &lt;img src="{{ URL::asset('assets/img/projects/2.jpg') }}" alt="Image" class="img">
                                &lt;/li>
                                &lt;li class="js-hover-img-item mb-4">
                                    &lt;div class="js-hover-img-link display-4">
                                        &lt;a href="{{ URL::asset('#') }}">Projects&lt;/a>
                                    &lt;/div>
                                    &lt;img src="{{ URL::asset('assets/img/projects/3.jpg') }}" alt="Image" class="img">
                                &lt;/li>
                                &lt;li class="js-hover-img-item mb-4">
                                    &lt;div class="js-hover-img-link display-4">
                                        &lt;a href="{{ URL::asset('#') }}">Services&lt;/a>
                                    &lt;/div>
                                    &lt;img src="{{ URL::asset('assets/img/projects/4.jpg') }}" alt="Image" class="img">
                                &lt;/li>
                                &lt;li class="js-hover-img-item">
                                    &lt;div class="js-hover-img-link display-4">
                                        &lt;a href="{{ URL::asset('#') }}">Contact&lt;/a>
                                    &lt;/div>
                                    &lt;img src="{{ URL::asset('assets/img/projects/5.jpg') }}" alt="Image" class="img">
                                &lt;/li>
                            &lt;/ul>
                        &lt;/div>
                    &lt;/div>
                    &lt;div class="col-md-5">
                        &lt;!--Address-->
                        &lt;h3 class="mb-4 fullscreen-item">1355 Market St, &lt;br> Suite 900,
                            San Francisco&lt;br>
                            CA, 94103&lt;/h3>
                        &lt;div class="fullscreen-item">
                            &lt;!--Phone-->
                            &lt;a href="{{ URL::asset('#!') }}" class="fs-4 link-hover-underline">+011(1234) 56789&lt;/a>
                            &lt;!--Divider-->
                            &lt;hr class="bg-transparent border-top my-4 opacity-75">
                            &lt;!--Email-->
                            &lt;a href="{{ URL::asset('mailto:mail@domain.agency') }}"
                                class="fs-4 link-hover-underline">mail@domain.agency&lt;/a>
                        &lt;/div>
                    &lt;/div>
                &lt;/div>
            &lt;/div>
        &lt;/div>
    &lt;/div>
    &lt;!--::/end offcanvas fullscreen-->
</code>
</pre>
                            </div>
                        </div>
                        <!--Element Css-->
                        <div class="tab-pane fade" id="tabCss">
                            <div class="position-relative" style="max-height:75vh;overflow-y: auto;">
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
                            <div class="position-relative" style="max-height:75vh;overflow-y: auto;">
                                <button
                                    class="btn btn-sm position-absolute end-0 top-0 me-3 mt-3 z-1 btn-primary copy-link"
                                    data-clipboard-target="#copyJs1" data-clipboard-action="copy" id="copyJs1-3">Copy
                                    code</button>
                                <pre id="copyJs1" class="language-markup bg-secondary text-white-50 mt-0" data-lang="html">
                <code>
  &lt;!-- Bootstrap + Vendor + Theme -->
  &lt;script src="{{ URL::asset('assets/css/theme.bundle.js') }}">&lt;/script>
  &lt;!--Gsap animations-->
  &lt;script src="{{ URL::asset('assets/vendor/node_modules/js/gsap.min.js') }}">&lt;/script>
  &lt;script>
     let vw = window.innerWidth || document.documentElement.clientWidth,
     maxVw = 320;
 vw > maxVw && document.querySelectorAll(".js-hover-img-item").forEach(function (e) {
     let t = e,
         r = (t.getBoundingClientRect(),
             e.querySelector("img")),
         a = r.offsetHeight,
         l = r.offsetWidth;
     e.addEventListener("mouseenter",
             s => {
                 e.classList.contains("is-hover") || e.classList.add("is-hover");
                 let o = s.clientX - t.offsetLeft - l / 2,
                     u = s.offsetY - a / 2;
                 gsap.set(r, {
                     x: o,
                     y: u,
                 })
             }),
         e.addEventListener("mousemove",
             e => {
                 let s = e.clientX - t.offsetLeft - l / 2,
                     o = e.offsetY - r.offsetTop - a * .5;
                 gsap.to(r, {
                     x: s,
                     y: o,
                     rotate: -4,
                 })
    }),
    e.addEventListener("mouseleave", () => {
   e.classList.contains("is-hover") && e.classList.remove("is-hover")
  })
 });
 &lt;/script>
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
