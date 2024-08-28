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

        <!--Select css-->
        <link rel="stylesheet" href="{{ URL::asset('assets/vendor/node_modules/css/choices.min.css') }}">

        <!-- Google fonts CSS -->
        <link rel="preconnect" href="{{ URL::asset('https://fonts.googleapis.com') }}">
        <link rel="preconnect" href="{{ URL::asset('https://fonts.gstatic.com') }}" crossorigin>
        <link href="{{ URL::asset('https://fonts.googleapis.com/css2?family=Onest:wght@100..900&family=PT+Serif:ital@0;1&display=swap') }}" rel="stylesheet">
        <!-- Main CSS -->
        <link href="{{ URL::asset('assets/css/theme-green.min.css') }}" rel="stylesheet">

        <title>Assan 4</title>
    </head>

    <body>
        <x-partials.preloader />
        <!--Header Start-->
        <header class="z-fixed header-absolute-top header-transparent sticky-reverse">
            <nav class="navbar navbar-expand-lg navbar-light">
              <div class="container px-xl-7 position-relative">
                <!--:Brand Logo:-->
                <a class="navbar-brand" href="{{ URL::asset('demo-jobs.html') }}">
                    <img src="{{ URL::asset('assets/img/logo/logo.svg') }}" alt="" class="img-fluid navbar-brand-light">
                    <img src="{{ URL::asset('assets/img/logo/logo-white.svg') }}" alt="" class="img-fluid navbar-brand-dark">
                    <sub class="d-none d-sm-inline-block position-absolute end-0 bottom-0 me-n2 mb-n2">Jobs</sub>
                </a>
                <div class="d-flex align-items-center navbar-no-collapse-items order-lg-last">
                    <div class="nav-item btn-group me-2 me-lg-0">
                        <a href="{{ URL::asset('demo-jobs-post-job.html') }}" class="btn btn-outline-info btn-sm py-1 px-3">Post Job</a>
                        <a href="{{ URL::asset('#!') }}" class="btn btn-sm btn-outline-info py-1 px-3"><i class="bx bxs-user-circle me-1"></i>SignUp</a> 
                    </div>
                  <button class="navbar-toggler order-last" type="button" data-bs-toggle="collapse"
                    data-bs-target="#mainNavbarTheme" aria-controls="mainNavbarTheme" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                      <i></i>
                    </span>
                  </button>
                  
                </div>
                <div class="collapse navbar-collapse" id="mainNavbarTheme">
                    
                 <ul class="navbar-nav me-lg-3 ms-lg-auto">
                     <li class="nav-item">
                         <a href="{{ URL::asset('demo-jobs.html') }}" class="nav-link">Home</a>
                     </li>
                     <li class="nav-item dropdown">
                      <a href="{{ URL::asset('#') }}" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Jobs listing</a>
                      <div class="dropdown-menu">
                          <a class="dropdown-item" href="{{ URL::asset('demo-jobs-listing.html') }}">Lisitng Row</a>
                          <a class="dropdown-item" href="{{ URL::asset('demo-jobs-listing-grid.html') }}">Lisitng Grid</a>
                      </div>
                     </li>
                     <li class="nav-item dropdown">
                      <a href="{{ URL::asset('#') }}" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">Pages</a>
                      <div class="dropdown-menu">
                          <a class="dropdown-item active" href="{{ URL::asset('demo-jobs-job-detail.html') }}">Job Details</a>
                          <a class="dropdown-item" href="{{ URL::asset('demo-jobs-job-apply.html') }}">Apply for Job</a>
                          <a class="dropdown-item" href="{{ URL::asset('demo-jobs-employer.html') }}">Employer</a>
                      </div>
                     </li>
                  <li class="nav-item">
                      <a href="{{ URL::asset('demo-jobs-upload-resume.html') }}" class="nav-link">Upload Resume</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a href="{{ URL::asset('#') }}" data-bs-toggle="dropdown" class="nav-link dropdown-toggle">Eng</a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a href="{{ URL::asset('#!') }}" class="active dropdown-item">
                            <img src="{{ URL::asset('assets/img/country/us.svg') }}" class="me-2" width="20" alt="">
                            <small>English</small>
                        </a>
                        <a href="{{ URL::asset('#!') }}" class="dropdown-item">
                            <img src="{{ URL::asset('assets/img/country/pt.svg') }}" class="me-2" width="20" alt="">
                            <small>Portuguese</small>
                        </a>
                        <a href="{{ URL::asset('#!') }}" class="dropdown-item">
                            <img src="{{ URL::asset('assets/img/country/de.svg') }}" class="me-2" width="20" alt="">
                            <small>German</small>
                        </a>
                        <a href="{{ URL::asset('#!') }}" class="dropdown-item">
                            <img src="{{ URL::asset('assets/img/country/fr.svg') }}" class="me-2" width="20" alt="">
                            <small>French</small>
                        </a>
                        <a href="{{ URL::asset('#!') }}" class="dropdown-item">
                            <img src="{{ URL::asset('assets/img/country/dk.svg') }}" class="me-2" width="20" alt="">
                            <small>Danish</small>
                        </a>
                        <a href="{{ URL::asset('#!') }}" class="dropdown-item">
                            <img src="{{ URL::asset('assets/img/country/es.svg') }}" class="me-2" width="20" alt="">
                            <small>Española</small>
                        </a>
                        <a href="{{ URL::asset('#!') }}" class="dropdown-item">
                            <img src="{{ URL::asset('assets/img/country/nl.svg') }}" class="me-2" width="20" alt="">
                            <small>Dutch</small>
                        </a>
                        <a href="{{ URL::asset('#!') }}" class="dropdown-item">
                            <img src="{{ URL::asset('assets/img/country/jp.svg') }}" class="me-2" width="20" alt="">
                            <small>japanese</small>
                        </a>
                    </div>
                </li>
              
                 </ul>
                </div>
              </div>
            </nav>
          </header>
        <!--Main content-->
        <main>
{{$slot}}
        </main>

        <x-partials.footers.footer-jobs />
          <!-- begin:Back to Top button -->
    <a href="{{ URL::asset('#') }}" class="toTop"><svg class="progress-circle" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
        <circle cx="50" cy="50" r="40" fill="none" stroke="currentColor" stroke-width="4" stroke-dasharray="0, 251.2"></circle>
      </svg>
            <i class="bx bxs-up-arrow"></i>
          </a>
          <!-- begin:Back to Top button -->
        <!-- scripts -->
        <script src="{{ URL::asset('assets/js/theme.bundle.min.js') }}"></script>
    </body>

</html>
