<x-assan-layout layout-type="{{$layoutType}}">
             <!--page-hero-->
           <section class="bg-gradient-primary text-white position-relative">
            <div class="container pt-14 pb-9 pb-lg-12 position-relative z-1">
                <div class="row pt-lg-5 align-items-center justify-content-center text-center">
                        <div class="col-lg-10 col-xl-7 z-2">
                            <div class="position-relative">
                                <div>
                                    <nav class="d-flex justify-content-center" aria-label="breadcrumb">
                                        <div class="mb-4">
                                            <ol class="breadcrumb mb-0">
                                                <li class="breadcrumb-item"><a href="{{ URL::asset('#') }}">Home</a></li>
                                                <li class="breadcrumb-item active">Components</li>
                                                <li class="breadcrumb-item active" aria-current="page">Isotope filter
                                                </li>
                                            </ol>
                                        </div>
                                    </nav>
                                    <h1 class="mb-0 display-4">
                                        Isotope filter
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section class="position-relative" id="next">
                <!--Filter container-->
                <div class="container py-9 py-lg-11 position-relative z-1">

                    <!-- Isoptope filter Nav -->
                    <nav class="nav nav-pills justify-content-center mb-4">

                        <!--Filter nav item-->
                        <a class="nav-link px-3 py-1 me-1 mb-1 active" href="{{ URL::asset('#') }}" data-bs-toggle="pill" data-filter="*"
                            data-bs-target="#projects">
                            Projects
                        </a>

                        <!--Filter nav item-->
                        <a class="nav-link px-3 py-1 me-1 mb-1" href="{{ URL::asset('#') }}" data-bs-toggle="pill" data-filter=".bootstrap"
                            data-bs-target="#bootstrap">
                            Bootstrap
                        </a>

                        <!--Filter nav item-->
                        <a class="nav-link px-3 py-1 me-1 mb-1" href="{{ URL::asset('#') }}" data-bs-toggle="pill" data-filter=".javascript"
                            data-bs-target="#javascript">
                            Javascript
                        </a>

                        <!--Filter nav item-->
                        <a class="nav-link px-3 py-1 me-1 mb-1" href="{{ URL::asset('#') }}" data-bs-toggle="pill" data-filter=".figma"
                            data-bs-target="#figma">
                            Figma
                        </a>
                    </nav>

                    <!--Isoptope Filters row-->
                    <div id="projects" data-isotope='{"layoutMode": "masonry"}' class="row">

                        <!--Filter grid item-->
                        <div class="col-md-6 col-lg-4 mb-4 bootstrap grid-item">
                            <a href="{{ URL::asset('#!') }}" class="card-hover">
                                <div class="overflow-hidden position-relative mb-4">
                                    <img src="{{ URL::asset('assets/img/projects/1.jpg') }}" alt="" class="img-zoom img-fluid">
                                </div>
                                <h5 class="mb-1">Sed quia non numquam</h5>
                                <span class="text-body-secondary">UI / UX</span>
                            </a>
                        </div>

                        <!--Filter grid item-->
                        <div class="col-md-6 col-lg-4 mb-4 figma grid-item">
                            <a href="{{ URL::asset('#!') }}" class="card-hover">
                                <div class="overflow-hidden position-relative mb-4">
                                    <img src="{{ URL::asset('assets/img/projects/4.jpg') }}" alt="" class="img-zoom img-fluid">
                                </div>
                                <h5 class="mb-1">Ogólnie znana teza</h5>
                                <span class="text-body-secondary">Category</span>
                            </a>
                        </div>

                        <!--Filter grid item-->
                        <div class="col-md-6 col-lg-4 mb-4 bootstrap grid-item">
                            <a href="{{ URL::asset('#!') }}" class="card-hover">
                                <div class="overflow-hidden position-relative mb-4">
                                    <img src="{{ URL::asset('assets/img/projects/half1.jpg') }}" alt="" class="img-zoom img-fluid">
                                </div>
                                <h5 class="mb-1">El punto de</h5>
                                <span class="text-body-secondary">Category</span>
                            </a>
                        </div>

                        <!--Filter grid item-->
                        <div class="col-md-6 col-lg-4 mb-4 figma grid-item">
                            <a href="{{ URL::asset('#!') }}" class="card-hover">
                                <div class="overflow-hidden position-relative mb-4">
                                    <img src="{{ URL::asset('assets/img/projects/3.jpg') }}" alt="" class="img-zoom img-fluid">
                                </div>
                                <h5 class="mb-1">Sed quia non numquam</h5>
                                <span class="text-body-secondary">Category</span>
                            </a>
                        </div>

                        <!--Filter grid item-->
                        <div class="col-md-6 col-lg-4 mb-4 bootstrap grid-item">
                            <a href="{{ URL::asset('#!') }}" class="card-hover">
                                <div class="overflow-hidden position-relative mb-4">
                                    <img src="{{ URL::asset('assets/img/projects/half2.jpg') }}" alt="" class="img-zoom img-fluid">
                                </div>
                                <h5 class="mb-1">Dashboard Ui</h5>
                                <span class="text-body-secondary">Category</span>
                            </a>
                        </div>

                        <!--Filter grid item-->
                        <div class="col-md-6 col-lg-4 mb-4 javascript grid-item">
                            <a href="{{ URL::asset('#!') }}" class="card-hover">
                                <div class="overflow-hidden position-relative mb-4">
                                    <img src="{{ URL::asset('assets/img/projects/half3.jpg') }}" alt="" class="img-zoom img-fluid">
                                </div>
                                <h5 class="mb-1">Sed quia non numquam</h5>
                                <span class="text-body-secondary">Category</span>
                            </a>
                        </div>
                    </div>
                    <!--/:Filter grid row end-->
                </div>
            </section>
            <section class="position-relative">
                <div class="container pb-9 pb-lg-11">
                    <h5 class="mb-2">Code for Isotope filter</h5>
                    <small class="d-block mb-4">Click to top right corner copy code button to copy the isoptope filter code and paste anywhere into the project</small>
                    <div class="position-relative" style="max-height: 80vh; overflow-y: auto;">
                        <button
                            class="btn btn-sm position-absolute end-0 top-0 me-3 mt-3 z-1 btn-primary copy-link"
                            data-clipboard-target="#copyHTML1" data-clipboard-action="copy"
                            id="copyHTML1-1">Copy code</button>
                        <pre id="copyHTML1" class="language-markup bg-secondary text-white-50 mt-0" data-lang="html">
        <code>
            &lt;!--Filter container-->
            &lt;div class="container py-9 py-lg-11 position-relative z-1">
           
               &lt;!-- Isoptope filter Nav -->
               &lt;nav class="nav nav-pills justify-content-center mb-4">
           
                   &lt;!--Filter nav item-->
                   &lt;a class="nav-link px-3 py-1 me-1 mb-1 active" href="{{ URL::asset('#') }}" data-bs-toggle="pill" data-filter="*"
                       data-bs-target="#projects">
                       Projects
                   &lt;/a>
           
                   &lt;!--Filter nav item-->
                   &lt;a class="nav-link px-3 py-1 me-1 mb-1" href="{{ URL::asset('#') }}" data-bs-toggle="pill" data-filter=".bootstrap"
                       data-bs-target="#bootstrap">
                       Bootstrap
                   &lt;/a>
           
                   &lt;!--Filter nav item-->
                   &lt;a class="nav-link px-3 py-1 me-1 mb-1" href="{{ URL::asset('#') }}" data-bs-toggle="pill" data-filter=".javascript"
                       data-bs-target="#javascript">
                       Javascript
                   &lt;/a>
           
                   &lt;!--Filter nav item-->
                   &lt;a class="nav-link px-3 py-1 me-1 mb-1" href="{{ URL::asset('#') }}" data-bs-toggle="pill" data-filter=".figma"
                       data-bs-target="#figma">
                       Figma
                   &lt;/a>
               </nav>
           
               &lt;!--Isoptope Filters row-->
               &lt;div id="projects" data-isotope='{"layoutMode": "masonry"}' class="row">
           
                   &lt;!--Filter grid item-->
                   &lt;div class="col-md-6 col-lg-4 mb-4 bootstrap grid-item">
                       &lt;a href="{{ URL::asset('#!') }}" class="card-hover">
                           &lt;div class="overflow-hidden position-relative mb-4">
                               &lt;img src="{{ URL::asset('assets/img/projects/1.jpg') }}" alt="" class="img-zoom img-fluid">
                           &lt;/div>
                           &lt;h5 class="mb-1">Sed quia non numquam&lt;/h5>
                           &lt;span class="text-body-secondary">UI / UX&lt;/span>
                       &lt;/a>
                   &lt;/div>
           
                   &lt;!--Filter grid item-->
                   &lt;div class="col-md-6 col-lg-4 mb-4 figma grid-item">
                       &lt;a href="{{ URL::asset('#!') }}" class="card-hover">
                           &lt;div class="overflow-hidden position-relative mb-4">
                               &lt;img src="{{ URL::asset('assets/img/projects/4.jpg') }}" alt="" class="img-zoom img-fluid">
                           &lt;/div>
                           &lt;h5 class="mb-1">Ogólnie znana teza&lt;/h5>
                           &lt;span class="text-body-secondary">Category&lt;/span>
                       &lt;/a>
                   &lt;/div>
           
                   &lt;!--Filter grid item-->
                   &lt;div class="col-md-6 col-lg-4 mb-4 bootstrap grid-item">
                       &lt;a href="{{ URL::asset('#!') }}" class="card-hover">
                           &lt;div class="overflow-hidden position-relative mb-4">
                               &lt;img src="{{ URL::asset('assets/img/projects/half1.jpg') }}" alt="" class="img-zoom img-fluid">
                           &lt;/div>
                           &lt;h5 class="mb-1">El punto de&lt;/h5>
                           &lt;span class="text-body-secondary">Category&lt;/span>
                       &lt;/a>
                   &lt;/div>
           
                   &lt;!--Filter grid item-->
                   &lt;div class="col-md-6 col-lg-4 mb-4 figma grid-item">
                       &lt;a href="{{ URL::asset('#!') }}" class="card-hover">
                           &lt;div class="overflow-hidden position-relative mb-4">
                               &lt;img src="{{ URL::asset('assets/img/projects/3.jpg') }}" alt="" class="img-zoom img-fluid">
                           &lt;/div>
                           &lt;h5 class="mb-1">Sed quia non numquam&lt;/h5>
                           &lt;span class="text-body-secondary">Category&lt;/span>
                       &lt;/a>
                   &lt;/div>
           
                   &lt;!--Filter grid item-->
                   &lt;div class="col-md-6 col-lg-4 mb-4 bootstrap grid-item">
                       &lt;a href="{{ URL::asset('#!') }}" class="card-hover">
                           &lt;div class="overflow-hidden position-relative mb-4">
                               &lt;img src="{{ URL::asset('assets/img/projects/half2.jpg') }}" alt="" class="img-zoom img-fluid">
                           &lt;/div>
                           &lt;h5 class="mb-1">Dashboard Ui&lt;/h5>
                           &lt;span class="text-body-secondary">Category&lt;/span>
                       &lt;/a>
                   &lt;/div>
           
                   &lt;!--Filter grid item-->
                   &lt;div class="col-md-6 col-lg-4 mb-4 javascript grid-item">
                       &lt;a href="{{ URL::asset('#!') }}" class="card-hover">
                           &lt;div class="overflow-hidden position-relative mb-4">
                               &lt;img src="{{ URL::asset('assets/img/projects/half3.jpg') }}" alt="" class="img-zoom img-fluid">
                           &lt;/div>
                           &lt;h5 class="mb-1">Sed quia non numquam&lt;/h5>
                           &lt;span class="text-body-secondary">Category&lt;/span>
                       &lt;/a>
                   &lt;/div>
               &lt;/div>
               &lt;!--/:Filter grid row end-->
           &lt;/div>
</code>
</pre>
                    </div>
                </div>
            </section>
</x-assan-layout>
