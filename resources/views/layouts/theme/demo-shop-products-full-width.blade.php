<!doctype html>
<html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ URL::asset('assets/img/favicon.ico') }}" type="image/ico">
    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/node_modules/css/choices.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/node_modules/css/simplebar.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/node_modules/css/nouislider.min.css') }}">
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

    <!--Select scripts-->
    <script src="{{ URL::asset('assets/vendor/node_modules/js/choices.min.js') }}"></script>
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

    </script>

    <!--Custom scrollbar-->
    <script src="{{ URL::asset('assets/vendor/node_modules/js/simplebar.min.js') }}"></script>
    <!--Pricing range-->
    <script src="{{ URL::asset('assets/vendor/node_modules/js/nouislider.min.js') }}"></script>
    <script>
      document.querySelectorAll("[data-range]").forEach(function (e) {
        const t = JSON.parse(e.dataset.range),
          n = document.getElementById("range-min"),
          r = document.getElementById("range-max");
        noUiSlider.create(e, t);
        e.noUiSlider.on("update", function (e, t) {
          t ? r.innerHTML = e[t] : n.innerHTML = e[t];
        });
      });

    </script>
  </body>

</html>
