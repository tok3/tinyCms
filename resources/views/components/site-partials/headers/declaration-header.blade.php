@props(['navbarType'=>1]) {{-- Setzt einen Standardwert für die Farbe --}}


@if($navbarType == 2)
    <!--begin:Header-->
    <header class="header-transparent sticky-fixed">

        <!--begin:navbar-->
        <nav class="navbar navbar-expand-lg fixed-top navbar-light navbar-link-white">
            <!--Navbar-fixed-background-->
            <div class="navbar-fixed-bg position-absolute"></div>
            <div class="container position-relative z-1">
                <!--begin:logo-->
                <a class="navbar-brand" href="{{ URL('assan/index.html') }}">

                    <img src="{{ URL::asset('assets/img/logo/logo.svg') }}" alt="" class="img-fluid navbar-brand-sticky">
                    <img src="{{ URL::asset('assets/img/logo/logo-white.svg') }}" alt="" class="img-fluid navbar-brand-transparent">
                </a>
                <!--end:logo-->
                <!--begin:navbar-no-collapse-items-->
                <div class="d-flex align-items-center navbar-no-collapse-items order-lg-last">
                    <!--Navbar toggler button-->
                    <button class="navbar-toggler order-last" type="button" data-bs-toggle="collapse"
                            data-bs-target="#mainNavbarTheme" aria-controls="mainNavbarTheme" aria-expanded="false"
                            aria-label="Toggle navigation">
              <span class="navbar-toggler-icon">
                <i></i>
              </span>
                    </button>
                    <!--Button-->
                    <div class="nav-item me-3 ms-lg-3 ms-xl-5 me-lg-0">



                    </div>
                </div>
                <!--end:navbar-no-collapse-items-->

                <!--begin:navbar-collapse-->
                <div class="collapse navbar-collapse" id="mainNavbarTheme">



                </div>
                <!--end:navbar-collapse-->
            </div>

        </nav>
        <!--end:navbar-->
    </header>
    <!--end:header-->
@else
    <header class="z-fixed ">
        <nav class="navbar navbar-expand-lg navbar-light bg-body">
            <div class="container py-lg-2 position-relative">
                <a class="navbar-brand" href="{{ URL::asset('/') }}">
                    <img src="{{ URL::asset('assets/img/logo/logo.svg') }}?t={{time()}}" alt="Logo, dark" class="navbar-brand-light img-fluid" style="padding:0 !important;width:160px!important;">
                    <img src="{{ URL::asset('assets/img/logo/logo-white.svg') }}?t={{time()}}" alt="Logo, light" class="navbar-brand-dark img-fluid">
                </a>

                <div class="d-flex align-items-center navbar-no-collapse-items order-lg-last">
                    <button class="navbar-toggler order-last" type="button" data-bs-toggle="collapse"
                            data-bs-target="#mainNavbarTheme" aria-controls="mainNavbarTheme" aria-expanded="false"
                            aria-label="Toggle navigation">

                        <span class="navbar-toggler-icon">
                                <i></i>
                            </span>
                    </button>
                    <div class="nav-item me-3 me-lg-0">

                    </div>
                </div>
                <div class="collapse navbar-collapse" id="mainNavbarTheme">

                </div>
            </div>
        </nav>
    </header>
@endif
