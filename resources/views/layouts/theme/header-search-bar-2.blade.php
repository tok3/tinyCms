<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{ URL::asset('assets/img/favicon.ico') }}" type="image/ico">
        <x-partials.head-includes />
        <!--Prism css for code snippets-->
        <link rel="stylesheet"
            href="{{ URL::asset('assets/vendor/node_modules/css/prism-tomorrow.css') }}">
        <!-- Main CSS -->
        @vite(['resources/scss/theme.scss'])

        <title>Assan 4</title>
    </head>

    <body>
        <x-partials.preloader />
         <!--Header Start-->
         <header class="z-fixed header-transparent header-absolute-top pt-lg-3">
            <nav class="navbar navbar-expand-lg navbar-dark">
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
                            <a href="{{ URL::asset('#') }}" data-bs-target="#modal-search-bar-2" data-bs-toggle="modal" class="nav-link lh-1">
                                <i class="bx bx-search-alt-2 fs-5 lh-1"></i>
                            </a><!--Search-bar-2-collapse-->
                        </div>
                    </div>
                    <div class="collapse navbar-collapse" id="mainNavbarTheme">
                        <x-partials.headers.default-navbar-items page='features' />
                    </div>
                </div>
            </nav>
        </header>
        <!--Search bar modal-->
        <div id="modal-search-bar-2" class="modal fade" tabindex="-1" aria-labelledby="modal-search-bar-2" aria-hidden="true">
           <div class="modal-dialog modal-dialog-top modal-md">
               <div class="modal-content position-relative">
                  <div class="position-relative px-4">
                    <div class="position-absolute end-0 top-0 d-flex me-2 align-items-center h-100 justify-content-center">
                        <button type="button" class="btn-close w-auto small" data-bs-dismiss="modal" aria-label="Close">
                            <i class="bx bx-x fs-5"></i>
                        </button>
                       </div>
                    <form class="mb-0">
                        <div class="d-flex align-items-center">
                            <div class="d-flex flex-grow-1 align-items-center">
                                <i class="bx bx-search-alt-2 opacity-25"></i>
                                <input type="text" placeholder="Search...." autofocus class="form-control shadow-none border-0 flex-grow-1 form-control-lg">
                            </div>
                        </div>
                    </form>
                  </div>
                
                <div class="p-4 border-top">
                    <h6 class="mb-4">
                        <i class="bx bx-lightning me-2 text-body-secondary"></i>Top searches 
                    </h6>
                    <div class="d-flex flex-wrap gap-2 align-items-center">
                        <span><a href="{{ URL::asset('#!') }}" class="d-block bg-body-secondary px-3 py-1 rounded small">Jeans</a></span>
                        <span><a href="{{ URL::asset('#!') }}" class="d-block bg-body-secondary px-3 py-1 rounded small">Shoes</a></span>
                        <span><a href="{{ URL::asset('#!') }}" class="d-block bg-body-secondary px-3 py-1 rounded small">Watches</a></span>
                        <span><a href="{{ URL::asset('#!') }}" class="d-block bg-body-secondary px-3 py-1 rounded small">Men's</a></span>
                        <span><a href="{{ URL::asset('#!') }}" class="d-block bg-body-secondary px-3 py-1 rounded small">Sneakers</a></span>
                        <span><a href="{{ URL::asset('#!') }}" class="d-block bg-body-secondary px-3 py-1 rounded small">Casual</a></span>
                        <span><a href="{{ URL::asset('#!') }}" class="d-block bg-body-secondary px-3 py-1 rounded small">Shirts</a></span>
                        <span><a href="{{ URL::asset('#!') }}" class="d-block bg-body-secondary px-3 py-1 rounded small">T-shirts</a></span>
                        <span><a href="{{ URL::asset('#!') }}" class="d-block bg-body-secondary px-3 py-1 rounded small">Lowers</a></span>
                    </div>
                </div>
               </div>
           </div>
        </div>
       
         <!--Main content-->
         <main class="main-content" id="main-content">
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


<!--Autofocus input on modal open-->
<script>
    //Modal shown input autoFocus
const myModalEl = document.querySelectorAll('.modal')
myModalEl.forEach(function(el) {
  el.addEventListener('shown.bs.modal', event =>{
    event.preventDefault();
    var input = document.querySelector("[autofocus]");
    input.focus();
  })  
})
</script>
    </body>

</html>
