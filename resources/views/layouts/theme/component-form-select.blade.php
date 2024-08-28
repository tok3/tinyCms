<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{ URL::asset('assets/img/favicon.ico') }}" type="image/ico">
        <x-partials.head-includes />

        <!--select style-->
        <link rel="stylesheet" href="{{ URL::asset('assets/vendor/node_modules/css/choices.min.css') }}">

        <!--Prism css snippets-->
        <link rel="stylesheet" href="{{ URL::asset('assets/vendor/node_modules/css/prism-tomorrow.css') }}">
        <!-- Main CSS -->
        @vite(['resources/scss/theme.scss'])

        <title>Assan 4</title>
    </head>

    <body>
        <x-partials.preloader />
        <!--Header Start-->
        <header class="z-fixed header-transparent header-absolute-top pt-lg-3">
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
                            <a href="{{ URL::asset('#') }}" class="btn btn-success btn-sm rounded-pill">Purchase</a>
                        </div>
                    </div>
                    <div class="collapse navbar-collapse" id="mainNavbarTheme">
                        <x-partials.headers.default-navbar-items page='components' />
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


        <!--Select scripts-->
        <script src="{{ URL::asset('assets/vendor/node_modules/js/choices.min.js') }}"></script>
        <script>
            //Images Array
            var selectImages = [{
                    value: 'John Doe',
                    label: '<img src="{{ URL::asset('assets/img/avatar/6.jpg') }}" class="rounded-pill width-3x h-auto me-2" alt=""> John Doe'
                },
                {
                    value: 'Julia Roberts',
                    label: '<img src="{{ URL::asset('assets/img/avatar/1.jpg') }}" class="rounded-pill width-3x h-auto me-2" alt=""> Julia Roberts'
                },
                {
                    value: 'Mark Otto',
                    label: '<img src="{{ URL::asset('assets/img/avatar/7.jpg') }}" class="rounded-pill width-3x h-auto me-2" alt=""> Mark Otto'
                },
                {
                    value: 'Micheal Smith',
                    label: '<img src="{{ URL::asset('assets/img/avatar/8.jpg') }}" class="rounded-pill width-3x h-auto me-2" alt=""> Micheal Smith'
                },

            ];

            //Choices image
            const element = document.querySelector('.choices-image');
            const choices = new Choices(element, {
                choices: selectImages,
                values: null,
                allowHTML: true,
                itemSelectText: "",
                classNames: {
                    containerInner: element.className,
                    input: 'form-control',
                    inputCloned: 'form-control-xs',
                    listDropdown: 'dropdown-menu',
                    itemChoice: 'dropdown-item',
                    activeState: 'show',
                    selectedState: 'active',
                },
            });

            //Default choices
            var cSelect = document.querySelectorAll("[data-choices]");
            cSelect.forEach(el => {
                const t = {
                    ...el.dataset.choices ? JSON.parse(el.dataset.choices) : {},
                    ...{
                        classNames: {
                            containerInner: el.className,
                            input: "form-control",
                            inputCloned: "form-control-sm",
                            listDropdown: "dropdown-menu",
                            itemChoice: "dropdown-item",
                            activeState: "show",
                            selectedState: "active"
                        }
                    }
                }
                new Choices(el, t)
            });

        </script>


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
