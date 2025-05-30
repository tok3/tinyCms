<!doctype html>
<html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ URL::asset('assets/img/favicon.ico') }}" type="image/ico">

      <!--Box Icons-->
      <link rel="stylesheet" href="{{ URL::asset('assets/fonts/boxicons/css/boxicons.min.css') }}">

    <!--Iconsmind Icons-->
    <link rel="stylesheet" href="{{ URL::asset('assets/fonts/iconsmind/iconsmind.css') }}">

    <!-- Aos Animations CSS -->
    <link href="{{ URL::asset('assets/vendor/node_modules/css/aos.css') }}" rel="stylesheet">

    <link rel="preconnect" href="{{ URL::asset('https://fonts.googleapis.com') }}">
    <link rel="preconnect" href="{{ URL::asset('https://fonts.gstatic.com') }}" crossorigin>
    <link href="{{ URL::asset('https://fonts.googleapis.com/css2?family=Onest:wght@100..900&family=PT+Serif:ital@0;1&display=swap') }}" rel="stylesheet"> 

    <!--Prism css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/node_modules/css/prism-tomorrow.css') }}">
    <!-- Main CSS -->
    <link href="{{ URL::asset('assets/css/theme-green.min.css') }}" rel="stylesheet">

    <title>Assan 4</title>
  </head>

  <body>
    <x-partials.preloader />
    <!--Header Start-->
    <header class="z-fixed header-absolute-top pt-lg-3 header-transparent">
      <nav class="navbar navbar-expand-lg navbar-light navbar-link-white">
        <div class="container position-relative">
          <a class="navbar-brand" href="{{ URL::asset('assan/index.html') }}">
            <img src="{{ URL::asset('assets/img/logo/logo-white.svg') }}" alt="" class="img-fluid">
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
              <a href="{{ URL::asset('#') }}" class="btn btn-white btn-sm">Purchase Now</a>
            </div>
          </div>
          <div class="collapse navbar-collapse" id="mainNavbarTheme">
            <x-partials.headers.default-navbar-items page='features' />
          </div>
        </div>
      </nav>
    </header>
    <!--Main content-->
    <main>
{{$slot}}
    </main>

    <x-partials.footers.footer-2 />
    <!-- begin Back to Top button -->
    <a href="{{ URL::asset('#') }}" class="toTop"><svg class="progress-circle" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
  <circle cx="50" cy="50" r="40" fill="none" stroke="currentColor" stroke-width="4" stroke-dasharray="0, 251.2"></circle>
</svg>
      <i class="bx bxs-up-arrow"></i>
    </a>
    <!-- scripts -->
    <script src="{{ URL::asset('assets/js/theme.bundle.min.js') }}"></script>
    <!--Copy to clipboard + prismJs-->
    <script src="{{ URL::asset('assets/vendor/node_modules/js/prism.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/node_modules/js/clipboard.min.js') }}"></script>
    <script>
      /* Clipboard JS - Copy code button */
      var cl = document.querySelector('.copy-link');
      if (typeof !!cl && (cl) != 'undefined' && cl != null) {
        var cle = document.querySelectorAll('.copy-link');
        cle.forEach(el => {
          el.addEventListener("click", function () {
            var theButton = this;
            var copyId = this.getAttribute('id');
            var clipboard = new ClipboardJS('#' + copyId);

            clipboard.on('success', function (e) {
              e.clearSelection();
              theButton.innerHTML = 'Copied!';
              setTimeout(function () {
                theButton.innerHTML = 'Copy code';
              }, 5000);
            });
          });
        });
      }

    </script>
  </body>

</html>
