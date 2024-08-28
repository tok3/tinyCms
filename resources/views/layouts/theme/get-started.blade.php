<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{ URL::asset('assets/img/favicon.ico') }}" type="image/ico">
        <x-partials.head-includes />
        <!-- Main CSS -->
        @vite(['resources/scss/theme.scss'])

        <title>Index</title>
    </head>

    <body>
        <x-partials.preloader />
        
<header class="z-fixed pt-3 header-absolute-top header-boxed header-sticky">
    <div class="container text-white position-relative d-none d-lg-block">
     <div class="row">
      <div class="col-md-8 ms-auto">
       <div class="d-flex justify-content-end">
        <a href="{{ URL::asset('tel:+011234567890') }}" class="text-white small me-4">
          <i class="bx bx-devices me-1"></i>+01 1234 567 890
        </a>
        <a href="{{ URL::asset('mailto:consult@company.com') }}" class="text-white small">
         <i class="bx bx-envelope me-1"></i>
        consult@company.com
        </a>
       </div>
      </div>
     </div>
    </div>
    <!--Navbar boxed-->
    <div class="navbar-boxed">
    <div class="container">
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light navbar-link-white rounded-3">
      <a class="navbar-brand" href="{{ URL::asset('assan/index.html') }}">
         <img src="{{ URL::asset('assets/img/logo/logo.svg') }}" alt="" class="img-fluid navbar-brand-sticky">
         <img src="{{ URL::asset('assets/img/logo/logo-white.svg') }}" alt="" class="img-fluid navbar-brand-transparent">
      </a>
    <div class="d-flex align-items-center navbar-no-collapse-items order-lg-last">
      <button class="navbar-toggler order-last" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbarTheme" aria-controls="mainNavbarTheme" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"> <i></i> </span>
      </button>
     <div class="nav-item me-2 me-lg-0">
        <a href="{{ URL::asset('#') }}" class="btn btn-primary py-1 px-3">Get started
        </a>
     </div>
    </div>
    <!--Navbar Collapse-->
     <div class="collapse navbar-collapse" id="mainNavbarTheme">
      <!--Navbar items-->
       <ul class="navbar-nav ms-auto">
         <li class="nav-item">
          <a class="nav-link" href="{{ URL::asset('#') }}">Home</a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="{{ URL::asset('#') }}">About</a>
         </li>
         <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="{{ URL::asset('#') }}" data-bs-toggle="dropdown">Dropdown Nav</a>
            <div class="dropdown-menu dropdown-menu-end">
            <a href="{{ URL::asset('#') }}" class="dropdown-item">Dropdown item</a>
            <a href="{{ URL::asset('#') }}" class="dropdown-item">Dropdown item</a>
            <a href="{{ URL::asset('#') }}" class="dropdown-item">Dropdown item</a>
             <a href="{{ URL::asset('#') }}" class="dropdown-item">Dropdown item</a>
          </div>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="{{ URL::asset('#') }}">Projects</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="{{ URL::asset('#') }}">Contact</a>
          </li>
        </ul>  
       </div>
      </nav>
     </div>
    </div>
   </header>
   
        <!--Main content-->
        <main class="main-content" id="main-content">
{{$slot}}
        </main>

                        
<!--Footer Start-->
<footer id="footer" class="bg-white">
    <div class="container pt-9 pt-lg-11 pb-5">
        <div class="row">
            <div class="col-sm-7 mb-4 mb-sm-0">
                <!--Address-->
                <h5 class="mb-0">1355 Market St, <br> Suite 900,
                    San Francisco<br>
                    CA, 94103</h5>
            </div>
            <div class="col-sm-5 text-sm-end">
                <!--Phone-->
                <a href="{{ URL::asset('#!') }}" class="fs-6 link-hover-underline">+011(1234) 56789</a><br><br>
                <!--Email-->
                <a href="{{ URL::asset('mailto:mail@domain.agency') }}" class="fs-6 link-hover-underline">mail@domain.agency</a>
            </div>
        </div>
        <hr class="my-4 my-md-5">
        <div class="row text-secondary">
            <div class="col-sm-7">
                <!--Social List-->
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a class="link-hover-underline" href="{{ URL::asset('#') }}">Facebook</a>
                    </li>
                    <li class="list-inline-item">
                        <a class="link-hover-underline" href="{{ URL::asset('#') }}">Twitter</a>
                    </li>
                    <li class="list-inline-item">
                        <a class="link-hover-underline" href="{{ URL::asset('#') }}">Linkedin</a>
                    </li>
                    <li class="list-inline-item">
                        <a class="link-hover-underline" href="{{ URL::asset('#') }}">Behance</a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-5 text-sm-end">
                <!--Copyright Text-->
                <span class="d-block lh-sm small text-body-secondary">© Copyright
                    <script>
                      document.write(new Date().getFullYear())
                    </script>. Assan
                  </span>
            </div>
        </div>
    </div>
</footer>


        <!-- scripts -->
        <script src="{{ URL::asset('assets/js/theme.bundle.min.js') }}"></script>
    </body>

</html>
