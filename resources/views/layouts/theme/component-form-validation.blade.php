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

        <title>Assan 4</title>
    </head>

    <body>
        <x-partials.preloader />
        <!--Header Start-->
        <header class="z-fixed header-transparent header-absolute-top sticky-reverse">
            <nav class="navbar navbar-expand-lg navbar-light navbar-link-white">
                <div class="container position-relative">
                    <a class="navbar-brand" href="{{ URL::asset('assan/index.html') }}">
                        <img src="{{ URL::asset('assets/img/logo/logo.svg') }}" alt="" class="img-fluid navbar-brand-sticky">
                        <img src="{{ URL::asset('assets/img/logo/logo-white.svg') }}" alt="" class="img-fluid navbar-brand-transparent">
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
        <script src="{{ URL::asset('assets/vendor/node_modules/js/cleave.min.js') }}"></script>
        <script>
            //cleave form formats
var inputFormatter = function () {
    var input = document.querySelectorAll('[data-format]');
    if (input.length === 0) return;

    for (var i = 0; i < input.length; i++) {
        var inputFormat = input[i].dataset.format,
            blocks = input[i].dataset.blocks,
            delimiter = input[i].dataset.delimiter;
        blocks = blocks !== undefined ? blocks.split(' ').map(Number) : '';
        delimiter = delimiter !== undefined ? delimiter : ' ';

        switch (inputFormat) {
            case 'card':
                var card = new Cleave(input[i], {
                    creditCard: true
                });
                break;
                case 'phone':
                var phone = new Cleave(input[i], {
                    numericOnly: true,
                    blocks: [0, 3, 3, 4],
                    delimiters: ["(", ") ", "-"]
                });
                break;
            case 'cvc':
                var cvc = new Cleave(input[i], {
                    numeral: true,
                    numeralIntegerScale: 3
                });
                break;
            case 'date':
                var date = new Cleave(input[i], {
                    date: true,
                    datePattern: ['m', 'y']
                });
                break;

            case 'date-long':
                var dateLong = new Cleave(input[i], {
                    date: true,
                    datePattern: ['Y', 'm', 'd']
                });
                break;

            case 'time':
                var time = new Cleave(input[i], {
                    time: true,
                    timePattern: ['h', 'm']
                });
                break;
                case 'time-long':
                    var time = new Cleave(input[i], {
                        time: true,
                        timePattern: ['h', 'm', 's']
                    });
                    break;
            case 'custom':
                var custom = new Cleave(input[i], {
                    delimiter: delimiter,
                    blocks: blocks
                });
                break;

            default:
                console.error('Sorry, your format ' + inputFormat + ' is not available. You can add it to the theme object method - inputFormatter in src/js/theme.js or choose one from the list of available formats: card, cvc, date, date-long, time or custom.');
        }
    }
}();
        </script>
    </body>

</html>
