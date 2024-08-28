<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{ URL::asset('assets/img/favicon.ico') }}" type="image/ico">

        <link rel="stylesheet" href="{{ URL::asset('assets/vendor/node_modules/css/choices.min.css') }}">

        <x-partials.shop.head-includes />

        <title>Assan Shop</title>
    </head>

    <body>
        <!--Preloader Spinner-->
        <div class="spinner-loader bg-gradient bg-secondary text-white">
            <div class="spinner-border text-primary" role="status">
            </div>
            <span class="small d-block ms-2">Loading...</span>
        </div>

        <x-partials.headers.shop.header-default page='shop' />

        <!--Main content-->
        <main>
{{$slot}}
        </main>

        <x-partials.shop.footer-scripts />

        <!--Format js-->
        <script src="{{ URL::asset('assets/vendor/node_modules/js/choices.min.js') }}"></script>
        <script src="{{ URL::asset('assets/vendor/node_modules/js/cleave.min.js') }}"></script>
        <script>
            var el = document.querySelectorAll("[data-choices]");
            el.forEach(e => {
                const t = {
                    ...e.dataset.choices ? JSON.parse(e.dataset.choices) : {},
                    ...{
                        classNames: {
                            containerInner: e.className,
                            input: "form-control",
                            inputCloned: "form-control-xs",
                            listDropdown: "dropdown-menu",
                            itemChoice: "dropdown-item",
                            activeState: "show",
                            selectedState: "active"
                        }
                    }
                }
                new Choices(e, t)
            });
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
                            console.error('Sorry, your format ' + inputFormat +
                                ' is not available. You can add it to the theme object method - inputFormatter in src/js/theme.js or choose one from the list of available formats: card, cvc, date, date-long, time or custom.'
                                );
                    }
                }
            }();

        </script>
                        
<!--Autosize textarea-->
<script src="{{ URL::asset('assets/vendor/node_modules/js/autosize.min.js') }}"></script>
    <script>
     var ta = document.querySelector('textarea');
     ta.style.display = 'none';
       autosize(ta);
      // Change layout
      ta.style.display = 'block';
       autosize.update(ta);
    </script>
    
    
    </body>

</html>
