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
        <!--Choices select-->
        <link rel="stylesheet" href="{{ URL::asset('assets/vendor/node_modules/css/choices.min.css') }}">

        <!--Swiper-->
        <link rel="stylesheet" href="{{ URL::asset('assets/vendor/node_modules/css/swiper-bundle.min.css') }}">
        <!-- Aos Animations CSS -->
        <link href="{{ URL::asset('assets/vendor/node_modules/css/aos.css') }}" rel="stylesheet">

        <!-- Google fonts CSS -->
        <link rel="preconnect" href="{{ URL::asset('https://fonts.googleapis.com') }}">
        <link rel="preconnect" href="{{ URL::asset('https://fonts.gstatic.com') }}" crossorigin>
        <link href="{{ URL::asset('https://fonts.googleapis.com/css2?family=Onest:wght@100..900&family=PT+Serif:ital@0;1&display=swap') }}"
            rel="stylesheet">
        <!-- Main CSS -->
        <link href="{{ URL::asset('assets/css/theme-green.min.css') }}" rel="stylesheet">

        <title>Assan 4</title>
    </head>

    <body>
        <x-partials.preloader />
        <!--Header Start-->
        <header class="z-fixed header-absolute-top header-transparent sticky-reverse">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container position-relative">
                    <!--:Brand Logo:-->
                    <a class="navbar-brand" href="{{ URL::asset('demo-jobs.html') }}">
                        <img src="{{ URL::asset('assets/img/logo/logo.svg') }}" alt="" class="img-fluid navbar-brand-light">
                        <img src="{{ URL::asset('assets/img/logo/logo-white.svg') }}" alt="" class="img-fluid navbar-brand-dark">
                        <sub class="d-none d-sm-inline-block position-absolute end-0 bottom-0 me-n2 mb-n2">Jobs</sub>
                    </a>
                    <div class="d-flex align-items-center navbar-no-collapse-items order-lg-last">
                        <div class="nav-item btn-group me-2 me-lg-0">
                            <a href="{{ URL::asset('demo-jobs-post-job.html') }}" class="btn btn-outline-info btn-sm py-1 px-3">Post Job</a>
                            <a href="{{ URL::asset('#!') }}" class="btn btn-sm btn-outline-info py-1 px-3"><i
                                    class="bx bxs-user-circle me-1"></i>SignUp</a>

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
                                <a href="{{ URL::asset('demo-jobs.html') }}" class="nav-link active">Home</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="{{ URL::asset('#') }}" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Jobs listing</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ URL::asset('demo-jobs-listing.html') }}">Lisitng Row</a>
                                    <a class="dropdown-item" href="{{ URL::asset('demo-jobs-listing-grid.html') }}">Lisitng Grid</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="{{ URL::asset('#') }}" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ URL::asset('demo-jobs-job-detail.html') }}">Job Details</a>
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

        <!--Swiper slider-->
        <script src="{{ URL::asset('assets/vendor/node_modules/js/swiper-bundle.min.js') }}"></script>
        <script>
            const swiper = new Swiper('.swiper-testimonials', {
                slidesPerView: 1,
                spaceBetween: 24,
                loop: true,

                pagination: {
                    el: ".swiperT-pagination",
                    clickable: true,
                },
                breakpoints: {
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 50,
                    },
                },

                // Navigation arrows
                navigation: {
                    nextEl: '.swiperT-button-next',
                    prevEl: '.swiperT-button-prev',
                },
            });

        </script>


        <!--Countries select-->
        <script src="{{ URL::asset('assets/vendor/node_modules/js/choices.min.js') }}"></script>
        <script>
            var jobLocations = [

                {
                    id: 1,
                    value: 'Remote Jobs',
                    label: '<svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="24" height="24" viewBox="0 0 20 20" fill="none" class="injected-svg  w-5 h-5 stroke-current"><path fill-rule="evenodd" clip-rule="evenodd" stroke="none" d="M10 0C15.5225 0 20 4.47754 20 10C20 15.5225 15.5225 20 10 20C4.47754 20 0 15.5225 0 10C0 4.47754 4.47754 0 10 0Z" fill="#2394E0"></path><path fill-rule="evenodd" clip-rule="evenodd" stroke="none" d="M1.91418 15.1659C1.32499 14.2723 0.883911 13.2713 0.625122 12.1987L2.38619 13.0483L2.39596 13.5741C2.39596 13.7677 2.06718 14.1779 1.96139 14.3341L1.91418 15.1659ZM12.7459 1.05778C16.102 2.17269 18.6199 5.12679 19.1049 8.7238L18.7876 8.68962C18.7306 8.93376 18.6785 8.93864 18.6785 9.23161C18.6785 9.4904 19.004 9.66292 19.004 10.2082C19.004 10.3547 18.6606 10.646 18.646 10.6981L18.1365 10.1007V10.8608L18.06 10.8576L17.9233 9.45459L17.6385 9.54411L17.2999 8.50081L16.185 9.66618L16.172 10.519L15.8074 10.7632L15.42 8.57568L15.1889 8.74496L14.6648 8.03695L13.882 8.05973L13.5825 7.71631L13.2749 7.80095L12.671 7.10921L12.5538 7.18897L12.9282 8.146H13.3628V7.92953H13.5792C13.7355 8.36247 13.9047 8.10531 13.9047 8.3641C13.9047 9.26742 12.7898 9.93148 12.059 10.1007C12.0981 10.2635 12.0835 10.4263 12.2755 10.4263C12.684 10.4263 12.4806 10.3547 12.9266 10.3172C12.9054 11.2401 11.8686 12.342 11.4259 13.0272L11.6245 14.4416C11.6766 14.7492 10.9865 15.0731 10.7521 15.4198L10.8644 15.9618L10.547 16.0903C10.4917 16.647 9.95129 17.2638 9.3442 17.2638H8.69316C8.69316 16.5021 8.14954 15.4132 8.14954 14.8745C8.14954 14.4172 8.36601 14.3553 8.36601 13.7889C8.36601 13.2648 7.82402 12.5145 7.82402 12.3778V11.5086H7.38945C7.32434 11.2661 7.36503 11.1831 7.06392 11.1831H6.95487C6.48124 11.1831 6.56099 11.3996 6.08573 11.3996H5.65116C5.25891 11.3996 4.56555 10.1431 4.56555 9.98845V8.68636C4.56555 8.12484 5.07987 7.51286 5.43469 7.27523V6.73324L5.92297 6.23682L6.19478 6.19124C6.77747 6.19124 6.70748 5.86572 7.06392 5.86572H8.04049V6.62581L9.11471 7.0848L9.21562 6.62093C9.70227 6.73486 9.82922 6.95134 10.4282 6.95134H10.6447C11.0564 6.95134 11.0792 6.40446 11.0792 5.97477L10.2101 6.06104L9.83085 5.23747L9.45487 5.33675C9.52323 5.63135 9.55904 5.50928 9.55904 5.7583C9.55904 5.90479 9.4386 5.92106 9.34094 5.97477L8.96497 5.021L8.15605 4.4432L8.04862 4.54899L8.7371 5.27328C8.64596 5.53369 8.63456 6.28402 8.25533 5.7583L8.61015 5.5874L7.72473 4.65967L7.19413 4.86637L6.67004 5.36768C6.61471 5.77132 6.50566 5.97477 6.08248 5.97477C5.8009 5.97477 5.97017 5.90153 5.53886 5.86572V4.78011H6.51542L6.19804 4.05745L6.08085 4.12907V3.91097L7.66777 3.18018C7.63847 2.95231 7.60103 3.07438 7.60103 2.82536C7.60103 2.81071 7.70683 2.61051 7.71008 2.60726L8.12024 2.86279L8.02258 2.39567L7.38945 2.52588L7.27226 1.95785C7.77356 1.69417 8.8787 0.763184 9.23027 0.763184H9.55579C9.89921 0.763184 10.8172 1.10173 10.9669 1.30518L10.0962 1.21729L10.7423 1.74951L10.8042 1.52165L11.2859 1.38981L11.2924 1.0887H11.5105V1.41423L12.7459 1.05778Z" fill="#A1E367"></path></svg> Remote Jobs'
                },
                {
                    id: 2,
                    value: 'United States',
                    label: '<img src="{{ URL::asset('assets/img/country/us.svg') }}" class="width-2x rounded-pill me-2" alt=""> United States'
                },
                {
                    id: 3,
                    value: 'United Kingdom',
                    label: '<img src="{{ URL::asset('assets/img/country/gb.svg') }}" class="width-2x rounded-pill me-2" alt=""> United Kingdom'
                },
                {
                    id: 4,
                    value: 'Spain',
                    label: '<img src="{{ URL::asset('assets/img/country/es.svg') }}" class="width-2x rounded-pill me-2" alt=""> Spain'
                },
                {
                    id: 5,
                    value: 'France',
                    label: '<img src="{{ URL::asset('assets/img/country/fr.svg') }}" class="width-2x rounded-pill me-2" alt=""> France'
                },
                {
                    id: 6,
                    value: 'Germany',
                    label: '<img src="{{ URL::asset('assets/img/country/de.svg') }}" class="width-2x rounded-pill me-2" alt=""> Germany'
                }
            ];

            const element = document.querySelector('.choices-country');
            const choices = new Choices(element, {
                choices: jobLocations,
                values: null,
                allowHTML: true,
                itemSelectText: '',
                placeholder: true,
                searchEnabled: false,
                placeholderValue: 'Choose location',
                classNames: {
                    containerInner: element.className,
                    input: 'form-control',
                    inputCloned: 'form-control-xs',
                    listDropdown: 'dropdown-menu',
                    itemChoice: 'dropdown-item d-flex align-items-center text-truncate',
                    activeState: 'show',
                    selectedState: 'active',
                },
            });

        </script>
    </body>

</html>
