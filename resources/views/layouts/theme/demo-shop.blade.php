<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{ URL::asset('assets/img/favicon.ico') }}" type="image/ico">

        <!--swiper-->
        <link rel="stylesheet" href="{{ URL::asset('assets/vendor/node_modules/css/swiper-bundle.min.css') }}">
        <x-partials.shop.head-includes />

        <title>Assan 4</title>
    </head>

    <body>
        <!--:Preloader Spinner-->
        <div class="spinner-loader bg-gradient bg-secondary text-white">
            <div class="spinner-border text-primary" role="status">
            </div>
            <span class="small d-block ms-2">Loading...</span>
        </div>


        <x-partials.headers.shop.header-default page='home' />

        <main>
{{$slot}}
        </main>


        <x-partials.shop.footer-scripts />


        <!--Page Countdown + Swiper Slider scripts-->
        <script src="{{ URL::asset('assets/vendor/node_modules/js/jquery.min.js') }}"></script>
        <script src="{{ URL::asset('assets/vendor/node_modules/js/jquery.countdown.min.js') }}"></script>
        <script src="{{ URL::asset('assets/vendor/node_modules/js/swiper-bundle.min.js') }}"></script>
        <script>
            //Swiper Classic
            var swiperClassic = new Swiper(".swiper-classic", {
                slidesPerView: 1,
                spaceBetween: 0,
                loop: true,
                autoplay: {
                    delay: 2500
                },
                pagination: {
                    el: ".swiperClassic-pagination",
                    clickable: true
                }
            });

            function get1dayFromNow() {
                return new Date(new Date().valueOf() + 1 * 24 * 60 * 60 * 1000);
            }

            var $clock = $('.countdown-timer');

            $clock.countdown(get1dayFromNow(), function (event) {
                $(this).html(event.strftime(
                    '<div class="d-flex flex-column px-2 width-7x"><h2 class="mb-0 h4">%H</h2><span class="small text-body-secondary">Hours</span></div><div class="d-flex flex-column px-2 width-7x"><h2 class="mb-0 h4">%M</h2><span class="small text-body-secondary">Minutes</span></div><div class="d-flex flex-column px-2 width-7x"><h2 class="mb-0 h4">%S</h2><span class="small text-body-secondary">Seconds</span></div>'
                ));
            });
            //Swiper testimonials
            var swiper = new Swiper(".swiper-testimonials", {
                loop: true,
                autoHeight: true,
                slidesPerView: 1,
                spaceBetween: 16,
                pagination: {
                    el: ".swiperT-pagination",
                    clickable: true
                },
            });

        </script>
    </body>

</html>
