<!doctype html>
<html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ URL::asset('assets/img/favicon.ico') }}" type="image/ico">

    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/node_modules/css/choices.min.css') }}">

    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/node_modules/css/simplebar.min.css') }}">
    <!--swiper-->
    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/node_modules/css/swiper-bundle.min.css') }}">
    <x-partials.shop.head-includes />

    <!--:Simplebar css ()-->
    <style type="text/css">
      .simplebar-track.simplebar-vertical {
        width: 7px;
      }

      .simplebar-scrollbar:before {
        background: currentColor;
      }

    </style>
    <title>Assan Shop</title>
  </head>

  <body>
    <!--:Preloader Spinner-->
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

    <!--scripts-->
    <script src="{{ URL::asset('assets/vendor/node_modules/js/choices.min.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/node_modules/js/swiper-bundle.min.js') }}"></script>
    <script>
      //Swiper thumbnail demo
      var swiperThumbnails = new Swiper(".swiper-thumbnails", {
        spaceBetween: 8,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesProgress: true,
      });
      var swiperThumbnailsMain = new Swiper(".swiper-thumbnails-main", {
        spaceBetween: 0,
        navigation: {
          nextEl: ".swiperThumb-next",
          prevEl: ".swiperThumb-prev"
        },
        thumbs: {
          swiper: swiperThumbnails
        }
      });
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

    </script>
    <script src="{{ URL::asset('assets/vendor/node_modules/js/simplebar.min.js') }}"></script>
  </body>

</html>
