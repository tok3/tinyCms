<x-assan-layout layout-type="{{$layoutType}}">
    <!--page-hero-master-slider-->
    <section class="bg-gradient-primary text-white">
      <div class="container pt-12 pt-lg-15 pb-9 pb-lg-12">
        <h2 class="display-3 mb-4 pt-lg-5">Theme RTL</h2>
        <p class="lead mb-0">Starter theme for RTL</p>
      </div>
    </section>



    <section class="position-relative" id="next">
      <div class="container py-9 py-lg-11">
        <!--Information Alerts-->
        <div
          class="alert mb-7 mb-lg-9 w-lg-50 alert-warning rounded-0 border-start border-5 border-warning text-start small">
          <p>
            <strong>RTL is still experimental</strong> and will evolve with feedback. Spotted something or have an
            improvement to suggest?
          </p>
          <div><a href="{{ URL::asset('mailto:mylifedesign143@gmail.com') }}">Please send me an email.</a></div>
        </div>
        <div class="row mb-5 mb-lg-9 justify-content-between align-items-end">
          <div class="col-lg-9 mx-auto text-center">
            <h5 data-aos="fade-up" class="text-gradient">This is theme RTL</h5>
            <h2 class="display-4 mb-0" data-aos="fade-up">Example feature icon cards
            </h2>
          </div>
        </div>
        <div class="row justify-content-around">
          <!--Feature column-->
          <div class="col-12 col-md-6 col-xl-3 mb-7 mb-xl-0" data-aos="fade-up" data-aos-delay="100">
            <div class="text-center">
              <div
                class="mb-5 position-relative width-7x height-7x bg-gradient-primary text-white rounded-circle flex-center overflow-hidden">
                <i class="icon-Repeat-2 fs-3 position-relative"></i>
              </div>
              <h5 class="mb-3">Reusable elements</h5>
              <p class="mb-4">
                Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing
                industries for layouts and visual mockups.
              </p>
              <a href="{{ URL::asset('#!') }}" class="link-hover-underline text-body-secondary fw-semibold">
                Learn More<i class="bx bx-left-arrow-alt align-middle ms-1 lh-1 fs-5"></i>
              </a>
            </div>
          </div>

          <!--Feature column-->
          <div class="col-12 col-md-6 col-xl-3 mb-7 mb-xl-0" data-aos="fade-up" data-aos-delay="150">
            <div class="text-center">
              <div
                class="mb-5 position-relative width-7x height-7x bg-gradient-primary text-white rounded-circle flex-center overflow-hidden">
                <i class="icon-Light-Bulb fs-3 position-relative"></i>
              </div>
              <h5 class="mb-3">Design & innovation</h5>
              <p class="mb-4">
                Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing
                industries for layouts and visual mockups.
              </p>
              <a href="{{ URL::asset('#!') }}" class="link-hover-underline text-body-secondary fw-semibold">
                Learn More<i class="bx bx-left-arrow-alt align-middle ms-1 lh-1 fs-5"></i>
              </a>
            </div>
          </div>

          <!--Feature column-->
          <div class="col-12 col-md-6 col-xl-3 mb-7 mb-md-0" data-aos="fade-up" data-aos-delay="200">
            <div class="text-center">
              <div
                class="mb-5 position-relative width-7x height-7x bg-gradient-primary text-white rounded-circle flex-center overflow-hidden">
                <i class="icon-Thumbs-UpSmiley fs-3 position-relative"></i>
              </div>
              <h5 class="mb-3">Best selling</h5>
              <p class="mb-4">
                Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing
                industries for layouts and visual mockups.
              </p>
              <a href="{{ URL::asset('#!') }}" class="link-hover-underline text-body-secondary fw-semibold">
                Learn More<i class="bx bx-left-arrow-alt align-middle ms-1 lh-1 fs-5"></i>
              </a>
            </div>
          </div>
          <!--Feature column-->
          <div class="col-12 col-md-6 col-xl-3" data-aos="fade-up" data-aos-delay="250">
            <div class="text-center">
              <div
                class="mb-5 position-relative width-7x height-7x bg-gradient-primary text-white rounded-circle flex-center overflow-hidden">
                <i class="icon-Duplicate-Window fs-3 position-relative"></i>
              </div>
              <h5 class="mb-3">Modern & organized</h5>
              <p class="mb-4">
                Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing
                industries for layouts and visual mockups.
              </p>
              <a href="{{ URL::asset('#!') }}" class="link-hover-underline text-body-secondary fw-semibold">
                Learn More<i class="bx bx-left-arrow-alt align-middle ms-1 lh-1 fs-5"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="bg-primary-subtle">
      <div class="container py-9 py-lg-11">
        <h2 class="mb-1 text-primary display-4">
          Starter template
        </h2>
        <p class="mb-5 fs-4">for Theme RTL</p>
        <div class="position-relative text-start" style="max-height: 75vh; overflow-y: auto;">
          <button class="btn btn-sm position-absolute end-0 top-0 me-3 mt-3 z-1 btn-primary copy-link"
            data-clipboard-target="#copyHTML1" data-clipboard-action="copy" id="copyHTML1-1">Copy code</button>
          <pre id="copyHTML1" class="language-markup ps-5 text-start" data-lang="html">
<code>
   &lt;!doctype html>
   &lt;html lang="ar" dir="rtl">
   &lt;head>
     &lt;!-- Required meta tags -->
     &lt;meta charset="utf-8">
     &lt;meta name="viewport" content="width=device-width, initial-scale=1">
     &lt;link rel="icon" href="{{ URL::asset('assets/img/favicon.ico') }}" type="image/ico">
     &lt;!--Vendors Css-->
     &lt;link rel="stylesheet" href="{{ URL::asset('assets/fonts/boxicons/css/boxicons.min.css') }}">
     &lt;link rel="stylesheet" href="{{ URL::asset('assets/fonts/iconsmind/iconsmind.css') }}">
     &lt;link href="{{ URL::asset('assets/vendor/node_modules/css/aos.css') }}" rel="stylesheet">
     &lt;link rel="stylesheet" href="{{ URL::asset('assets/vendor/node_modules/css/swiper-bundle.min.css') }}">
     
     &lt;!--Google Fonts-->
     &lt;link rel="preconnect" href="{{ URL::asset('https://fonts.googleapis.com') }}">
     &lt;link rel="preconnect" href="{{ URL::asset('https://fonts.gstatic.com') }}" crossorigin>
     &lt;link href="{{ URL::asset('https://fonts.googleapis.com/css2?family=Amiri:ital@0;1&family=Cairo:wght@200..1000&display=swap') }}" rel="stylesheet"> 

     &lt;!-- Main CSS (RTL)-->
     &lt;link href="{{ URL::asset('assets/css/theme.rtl.min.css') }}" rel="stylesheet">

    &lt;!-- Add custom css -->
    &lt;link href="{{ URL::asset('assets/css/custom.css') }}" rel="stylesheet">
    &lt;title>Hello, world!&lt;/title>
  &lt;head>
    &lt;body>                   
    &lt;!--:main header -->
    &lt;header>
      &lt;nav class="navbar navbar-expand-lg navbar-light bg-white">
                                  
      &lt;/nav>
    &lt;/header>
                        
    &lt;!--:main content -->
     &lt;main>
     &lt;/main>
                        
    &lt;!--:main Footer -->
    &lt;footer>  
                       
    &lt;/footer>
                        
    &lt;!-- Vendor + theme scripts -->
    &lt;script src="{{ URL::asset('assets/js/theme.bundle.js') }}">&lt;/script>
    &lt;!-- Add your custom scripts file -->
    &lt;script src="{{ URL::asset('assets/js/custom.js') }}">&lt;/script>
   &lt;/body>
  &lt;/html>
</code>
</pre>
        </div>
      </div>
    </section>
    <section class="position-relative">
      <div class="position-absolute start-0 top-0 w-100 h-50 h-lg-60 bg-primary-subtle"></div>
      <div class="container position-relative">
        <div
          class="px-4 px-lg-6 py-9 py-lg-11 rounded-4 bg-warning-subtle overflow-hidden position-relative">
          <!--blob shape-->
          <svg class="position-absolute flip-x end-0 bottom-0 w-25 mb-n4 h-auto text-warning" width="616" height="464"
            viewBox="0 0 616 464" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
              d="M529.02 0.372621C648.093 -8.86796 677.569 156.046 749.056 240.707C795.671 295.913 839.498 347.565 874.249 409.222C915.961 483.231 978.111 552.938 971.515 635.414C964.041 728.876 936.16 850.497 836.419 882.264C730.359 916.045 640.668 790.168 529.02 776.349C443.047 765.708 360.497 838.142 278.401 813.198C186.892 785.395 118.893 715.022 75.5428 638.567C27.1616 553.239 -34.224 443.94 23.1986 363.109C82.8766 279.102 248.222 335.31 335.376 272.811C431.969 203.541 405.102 9.98913 529.02 0.372621Z"
              fill="currentColor" />
          </svg>

          <div class="row position-relative">
            <div class="col-12 col-md-10 col-lg-9 offset-lg-1">
              <h3 class="mb-4 display-4" data-aos="fade-down">
                Make an impact with design
              </h3>
              <p class="mb-5 w-lg-75 lead" data-aos="zoom-in" data-aos-delay="100">
                There are combined alignment methods – when several types of alignment together are
                used
                in one composition.
              </p>
              <div data-aos="fade-up" data-aos-delay="150">
                <a href="{{ URL::asset('#!') }}" class="btn btn-primary btn-hover-arrow btn-lg">
                  <span>Purchase Now</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</x-assan-layout>
