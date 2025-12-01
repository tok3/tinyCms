@props(['navbarType'=>1, 'page'=>'', 'pageinclucert'=>''])
    <!doctype html>
<html lang="de" data-bs-theme="light" style="height: 100%;">
<head>
    <x-site-partials.metas page="{!! $page !!}"/>
    <meta name="msvalidate.01" content="75F1A0336CC5A08AAD490B571E15F456" />
    <link rel="icon" href="{{ URL::asset('assets/img/favicon.ico') }}" type="image/ico">

    <x-partials.head-includes/>

    <!--Master slider-->
    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/masterslider/style/masterslider.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/masterslider/skins/black-1/style.css') }}">

    <!--Swiper slider-->
    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/node_modules/css/swiper-bundle.min.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Karla:ital,wght@0,200..800;1,200..800&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
{{--    <link rel="stylesheet" href="{{ URL::asset('assets/css/aktion-bf.min.css') }}">--}}

    <!-- Main CSS -->
    {{--    <link href="{{ URL::asset('assets/css/theme.min.css')}}" rel="stylesheet">--}}
    <!-- Matomo -->
<script>

    var _paq = window._paq = window._paq || [];
    /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
    _paq.push(['trackPageView']);
    _paq.push(['enableLinkTracking']);
    (function() {
      var u="//tracking.hausverw.de/";
      _paq.push(['setTrackerUrl', u+'matomo.php']);
      _paq.push(['setSiteId', '5']);
      var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
      g.async=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
    })();
  </script>
  <!-- End Matomo Code -->

    @vite(['resources/scss/theme.scss'])

    @yield('add-head')
    @stack('add-head')



@if(isset(json_decode($page, true)['title']))
    <title>{{ json_decode($page, true)['title'] }}</title>
@elseif(isset($pageinclucert['title']))
    <title>IncluCert PDF</title>
@else
    <title></title>
@endif
    <!--<title>{{ isset(json_decode($page, true)['title']) ? json_decode($page, true)['title'] : '' }}</title>-->

</head>

<body style="overflow-y: auto; min-height: 100vh; margin: 0; padding: 0;">

<x-partials.preloader/>
<x-site-partials.headers.default-header navbarType="{{$navbarType}}"/>

<main >
    {{ $slot }}
</main>
<!--end:main content-->


<x-site-partials.footers.default-footer/>

{{--
<!-- begin:Back to Top button -->
<a href="{{ URL::asset('#') }}" class="toTop">
    <svg class="progress-circle" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
        <circle cx="50" cy="50" r="40" fill="none" stroke="currentColor" stroke-width="4" stroke-dasharray="0, 251.2"></circle>
    </svg>
    <i class="bx bxs-up-arrow"></i>
</a>
<!-- begin:Back to Top button -->
--}}


<!-- scripts -->
{{--<script src="{{ URL::asset('assets/js/theme.bundle.min.js') }}"></script>--}}
<script src="{{ URL::asset('assets/js/theme.bundle.js') }}"></script>

<!--Mastert Slider start (Include jquery before master slider js)-->
<script src="{{ URL::asset('assets/vendor/node_modules/js/jquery.min.js') }}"></script>
<script src="{{ URL::asset('assets/vendor/masterslider/jquery.easing.min.js') }}"></script>
<script src="{{ URL::asset('assets/vendor/masterslider/masterslider.min.js') }}"></script>
<script>
    var slider = new MasterSlider();
    slider.setup('masterslider', {
        width: 1140,
        height: 660,
        minHeight: 400,
        space: 0,
        start: 1,
        grabCursor: false,
        layout: "fullwidth",
        wheel: false,
        autoplay: true,
        instantStartLayers: true,
        loop: true,
        view: "basic",
        instantStartLayers: true,
    });
    slider.control('arrows');

</script>


<!--Swiper slider-->
<script src="{{ URL::asset('assets/vendor/node_modules/js/swiper-bundle.min.js') }}"></script>
<script>
    //swiper-projects
    var swiperProjects = new Swiper(".swiper-projects", {
        autoHeight: true,
        spaceBetween: 16,
        centeredSlides: true,
        loop: true,
        breakpoints: {
            640: {
                slidesPerView: 1,
                spaceBetween: 16
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 16
            },
            1024: {
                slidesPerView: 2,
                spaceBetween: 16
            }
        },
        pagination: {
            el: ".swiperProjects-pagination",
            clickable: true
        }
    });

    //swiper-testimonials
    var swiperAuto = new Swiper(".swiper-testimonials", {
        slidesPerView: "auto",
        loop: true,
        centeredSlides: true,
        spaceBetween: 0,
        grabCursor: true,
        pagination: {
            el: ".swiperAuto-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiperAuto-button-next",
            prevEl: ".swiperAuto-button-prev",
        }
    });


    function isMobileDevice() {
        return /Android|iPhone|iPad|iPod|Opera Mini|IEMobile|WPDesktop/i.test(navigator.userAgent);
    }

    function isMobileDevice() {
        return window.matchMedia("(max-width: 768px)").matches;
    }
</script>
@stack('scripts')

<link rel="stylesheet" href="{!! url('service/fixstern.css?t=').time() !!}">
<script src="{!! url('service/01JE6A5H2NQZCT4P9N3FEZG2CX/fixstern.js?t='.time().'&pos=tr&valX=10px&valY=100px') !!}"></script>

<style>
main, .content-wrapper {  /* Target your main content container */
    min-height: calc(100vh - 586px); /* Push footer down; replace [footer-height] with actual px (e.g., 80px) */
    padding-bottom: 586px; /* Prevent content overlap with fixed footer */
}

footer {
    position: relative; /* Change from 'fixed' to 'relative' for natural flow */
    /* Or keep 'fixed' but ensure body scrolls */
}

</style>
</body>

</html>
