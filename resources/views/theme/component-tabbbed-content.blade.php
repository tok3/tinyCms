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
                                                <li class="breadcrumb-item active" aria-current="page">Tabbed Content
                                                </li>
                                            </ol>
                                        </div>
                                    </nav>
                                    <h1 class="mb-0 display-4">
                                        Tabbed content (Tabs)
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section class="position-relative">
                <div class="container py-9 py-lg-11 position-relative z-1">
                    <div class="row align-items-center">
                        <div class="col-lg-9 mx-auto">
                            <div class="d-flex align-items-center justify-content-center mb-5">
                                <h6 class="mb-0 me-2 me-lg-4">Tabs style 1</h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>
                            <div>
                                <!-- Tabs -->
                                <nav class="mb-4 nav nav-inline overflow-y-hidden position-relative nav-tabs" role="tablist">
                                    <a class="nav-link active text-nowrap" data-bs-toggle="tab" href="{{ URL::asset('#tab-home') }}" role="tab"
                                    aria-selected="true">the text with their software.</a>
                                <a class="nav-link text-nowrap" data-bs-toggle="tab" href="{{ URL::asset('#tab-profile') }}" role="tab"
                                    aria-selected="false"> in popularity during the 1960s</a>
                                <a class="nav-link text-nowrap" data-bs-toggle="tab" href="{{ URL::asset('#tab-contact') }}" role="tab"
                                    aria-selected="false">The passage experienced a surge </a>
                                    <div class="indicator position-absolute bottom-0 border-primary z-2 border-bottom border-2"></div>
                                </nav>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="tab-home" role="tabpanel">
                                        The passage experienced a surge in popularity during the 1960s when Letraset
                                        used it on their dry-transfer sheets, and again during the 90s as desktop
                                        publishers bundled the text with their software. Today it's seen all around the
                                        web; on templates, websites, and stock designs. Use our generator to get your
                                        own, or read on for the authoritative history of lorem ipsum.
                                    </div>
                                    <div class="tab-pane fade" id="tab-profile" role="tabpanel">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                        nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                                        fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                                        culpa qui officia deserunt mollit anim id est laborum.
                                    </div>
                                    <div class="tab-pane fade" id="tab-contact" role="tabpanel">
                                        Eget aliquet nibh praesent tristique magna sit amet. Ultricies leo integer
                                        malesuada nunc vel. Semper viverra nam libero justo. Dictum fusce ut placerat
                                        orci nulla. Elementum eu facilisis sed odio morbi quis commodo odio aenean.
                                        Consectetur adipiscing elit pellentesque habitant morbi tristique senectus.
                                        Pulvinar mattis nunc sed blandit libero volutpat sed. Facilisis mauris sit amet
                                        massa vitae tortor condimentum lacinia. Commodo elit at imperdiet dui accumsan
                                        sit amet nulla facilisi. Feugiat in ante metus dictum at tempor. Pulvinar
                                        elementum integer enim neque volutpat ac tincidunt vitae. Ullamcorper dignissim
                                        cras tincidunt lobortis feugiat. Lorem ipsum dolor sit amet consectetur
                                        adipiscing. Egestas maecenas pharetra convallis posuere morbi leo urna molestie
                                        at. Scelerisque varius morbi enim nunc. Aliquam vestibulum morbi blandit cursus
                                        risus at.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="position-relative bg-body-tertiary">
                <div class="container py-9 py-lg-11 position-relative z-1">
                    <div class="row align-items-center">
                        <div class="col-lg-9 mx-auto">
                            <div class="d-flex align-items-center justify-content-center mb-5">
                                <h6 class="mb-0 me-2 me-lg-4">Tabs pills</h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>
                            <div>
                                <!-- Tabs -->
                                <nav class="mb-4">
                                    <div class="nav nav-pills d-inline-flex rounded-pill px-2 py-1 border shadow-sm" role="tablist">
                                        <a class="nav-link active rounded-pill" data-bs-toggle="tab" href="{{ URL::asset('#tab2-home') }}" role="tab"
                                            aria-selected="true">Home</a>
                                        <a class="nav-link rounded-pill" data-bs-toggle="tab" href="{{ URL::asset('#tab2-profile') }}" role="tab"
                                            aria-selected="false">Profile</a>
                                        <a class="nav-link rounded-pill" data-bs-toggle="tab" href="{{ URL::asset('#tab2-contact') }}" role="tab"
                                            aria-selected="false">Contact</a>
                                    </div>
                                </nav>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="tab2-home" role="tabpanel">
                                        The passage experienced a surge in popularity during the 1960s when Letraset
                                        used it on their dry-transfer sheets, and again during the 90s as desktop
                                        publishers bundled the text with their software. Today it's seen all around the
                                        web; on templates, websites, and stock designs. Use our generator to get your
                                        own, or read on for the authoritative history of lorem ipsum.
                                    </div>
                                    <div class="tab-pane fade" id="tab2-profile" role="tabpanel">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                        nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                                        fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                                        culpa qui officia deserunt mollit anim id est laborum.
                                    </div>
                                    <div class="tab-pane fade" id="tab2-contact" role="tabpanel">
                                        Eget aliquet nibh praesent tristique magna sit amet. Ultricies leo integer
                                        malesuada nunc vel. Semper viverra nam libero justo. Dictum fusce ut placerat
                                        orci nulla. Elementum eu facilisis sed odio morbi quis commodo odio aenean.
                                        Consectetur adipiscing elit pellentesque habitant morbi tristique senectus.
                                        Pulvinar mattis nunc sed blandit libero volutpat sed. Facilisis mauris sit amet
                                        massa vitae tortor condimentum lacinia. Commodo elit at imperdiet dui accumsan
                                        sit amet nulla facilisi. Feugiat in ante metus dictum at tempor. Pulvinar
                                        elementum integer enim neque volutpat ac tincidunt vitae. Ullamcorper dignissim
                                        cras tincidunt lobortis feugiat. Lorem ipsum dolor sit amet consectetur
                                        adipiscing. Egestas maecenas pharetra convallis posuere morbi leo urna molestie
                                        at. Scelerisque varius morbi enim nunc. Aliquam vestibulum morbi blandit cursus
                                        risus at.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="position-relative">
                <div class="container py-9 py-lg-11 position-relative z-1">
                    <div class="row align-items-center">
                        <div class="col-lg-9 mx-auto">
                            <div class="d-flex align-items-center justify-content-center mb-5">
                                <h6 class="mb-0 me-2 me-lg-4">Tabs pills + justify</h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>
                            <div>
                                <!-- Tabs -->
                                <nav class="mb-4">
                                    <div class="nav nav-pills nav-fill rounded-pill px-2 py-1 bg-body border shadow-sm" role="tablist">
                                        <a class="nav-link rounded-pill active" data-bs-toggle="tab" href="{{ URL::asset('#tab3-home') }}" role="tab"
                                            aria-selected="true">Home</a>
                                        <a class="nav-link rounded-pill" data-bs-toggle="tab" href="{{ URL::asset('#tab3-profile') }}" role="tab"
                                            aria-selected="false">Profile</a>
                                        <a class="nav-link rounded-pill" data-bs-toggle="tab" href="{{ URL::asset('#tab3-contact') }}" role="tab"
                                            aria-selected="false">Contact</a>
                                    </div>
                                </nav>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="tab3-home" role="tabpanel">
                                        The passage experienced a surge in popularity during the 1960s when Letraset
                                        used it on their dry-transfer sheets, and again during the 90s as desktop
                                        publishers bundled the text with their software. Today it's seen all around the
                                        web; on templates, websites, and stock designs. Use our generator to get your
                                        own, or read on for the authoritative history of lorem ipsum.
                                    </div>
                                    <div class="tab-pane fade" id="tab3-profile" role="tabpanel">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                        nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                                        fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                                        culpa qui officia deserunt mollit anim id est laborum.
                                    </div>
                                    <div class="tab-pane fade" id="tab3-contact" role="tabpanel">
                                        Eget aliquet nibh praesent tristique magna sit amet. Ultricies leo integer
                                        malesuada nunc vel. Semper viverra nam libero justo. Dictum fusce ut placerat
                                        orci nulla. Elementum eu facilisis sed odio morbi quis commodo odio aenean.
                                        Consectetur adipiscing elit pellentesque habitant morbi tristique senectus.
                                        Pulvinar mattis nunc sed blandit libero volutpat sed. Facilisis mauris sit amet
                                        massa vitae tortor condimentum lacinia. Commodo elit at imperdiet dui accumsan
                                        sit amet nulla facilisi. Feugiat in ante metus dictum at tempor. Pulvinar
                                        elementum integer enim neque volutpat ac tincidunt vitae. Ullamcorper dignissim
                                        cras tincidunt lobortis feugiat.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="position-relative bg-body-tertiary">
                <div class="container py-9 py-lg-11 position-relative z-1">
                    <div class="row align-items-center">
                        <div class="col-lg-9 mx-auto">
                            <div class="d-flex align-items-center justify-content-center mb-5">
                                <h6 class="mb-0 me-2 me-lg-4">Tabs vertical</h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>
                            <div class="row">
                                <div class="col-md-4">

                                    <!-- Tabs -->
                                    <nav class="mb-4">
                                        <div class="nav nav-vertical flex-column position-relative" role="tablist">
                                            <div class="indicator-vertical w-100 z-n1 position-absolute border-start border-3 bg-body-secondary rounded-2 border-primary start-0"></div>
                                            <a class="nav-link ps-3 active" data-bs-toggle="tab" href="{{ URL::asset('#tab4-home') }}" role="tab"
                                                aria-selected="true"><i class="bx bx-home me-2 align-middle"></i>
                                                Home</a>
                                            <a class="nav-link ps-3" data-bs-toggle="tab" href="{{ URL::asset('#tab4-profile') }}" role="tab"
                                                aria-selected="false"><i
                                                    class="bx bx-user-circle me-2 align-middle"></i> Profile</a>
                                            <a class="nav-link ps-3" data-bs-toggle="tab" href="{{ URL::asset('#tab4-contact') }}" role="tab"
                                                aria-selected="false"><i class="bx bx-message-dots me-2 align-middle"></i>
                                                Contact</a>
                                        </div>
                                    </nav>
                                </div>
                                <div class="col-md-8 col-lg-7 ms-lg-auto">
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="tab4-home" role="tabpanel">
                                            The passage experienced a surge in popularity during the 1960s when Letraset
                                            used it on their dry-transfer sheets, and again during the 90s as desktop
                                            publishers bundled the text with their software. Today it's seen all around
                                            the web; on templates, websites, and stock designs. Use our generator to get
                                            your own, or read on for the authoritative history of lorem ipsum.
                                        </div>
                                        <div class="tab-pane fade" id="tab4-profile" role="tabpanel">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                                            non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                        </div>
                                        <div class="tab-pane fade" id="tab4-contact" role="tabpanel">
                                            Eget aliquet nibh praesent tristique magna sit amet. Ultricies leo integer
                                            malesuada nunc vel. Semper viverra nam libero justo. Dictum fusce ut
                                            placerat orci nulla. Elementum eu facilisis sed odio morbi quis commodo odio
                                            aenean. Consectetur adipiscing elit pellentesque habitant morbi tristique
                                            senectus. Pulvinar mattis nunc sed blandit libero volutpat sed. Facilisis
                                            mauris sit amet massa vitae tortor condimentum lacinia. Commodo elit at
                                            imperdiet dui accumsan sit amet nulla facilisi. Feugiat in ante metus dictum
                                            at tempor. Pulvinar elementum integer enim neque volutpat ac tincidunt
                                            vitae. Ullamcorper dignissim cras tincidunt lobortis feugiat. Lorem ipsum
                                            dolor sit amet consectetur adipiscing.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="position-relative">
                <div class="container py-9 py-lg-11">
                    <div class="row">
                        <div class="col-md-5 col-lg-4 mb-5 mb-md-0">
                            <div class="nav nav-vertical position-relative d-flex flex-column justify-content-start me-md-3"
                                id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <div class="indicator-vertical w-100 z-n1 position-absolute border-start border-3 bg-body-tertiary rounded-3 border-primary start-0"></div>
                                <a class="nav-link px-4 py-3 active mb-md-3" href="{{ URL::asset('#e-howkins') }}" data-bs-toggle="pill"
                                    data-bs-target="#e-howkins" role="tab" aria-controls="e-howkins"
                                    aria-selected="true">
                                    <h5 class="text-reset mb-0">Emily Howkings</h5>
                                    <span class="small lh-sm opacity-75">Founder & CTO</span>
                                </a>
                                <a class="nav-link px-4 py-3 mb-md-3" href="{{ URL::asset('#g-adams') }}" data-bs-toggle="pill"
                                    data-bs-target="#g-adams" role="tab" aria-controls="g-adams" aria-selected="false">
                                    <h5 class="text-reset mb-0">Gabriel Adams</h5>
                                    <span class="small lh-sm opacity-75">Project Manager</span>
                                    </a>
                                    <a class="nav-link px-4 py-3 mb-md-3" href="{{ URL::asset('#d-knight') }}" data-bs-toggle="pill"
                                        data-bs-target="#d-knight" role="tab" aria-controls="d-knight"
                                        aria-selected="false">
                                        <h5 class="text-reset mb-0"> Dagny Knight</h5>
                                        <span class="small lh-sm opacity-75">Illustrator </span>

                                    </a>
                                    <a class="nav-link px-4 py-3" href="{{ URL::asset('#j-tar') }}" data-bs-toggle="pill"
                                        data-bs-target="#j-tar" role="tab" aria-controls="j-tar" aria-selected="false">
                                        <h5 class="text-reset mb-0"> Julia Tar</h5>
                                        <span class="small lh-sm opacity-75">Full stack developer</span>
                                    </a>
                                 </div>
                        </div>
                        <div class="col-md-7 mx-auto">

                            <div class="tab-content" id="tab-panel">
                                <div class="tab-pane fade show active" id="e-howkins" role="tabpanel"
                                    aria-labelledby="e-howkins-tab">
                                    <img src="{{ URL::asset('assets/img/team/1.jpg') }}" alt="" class="img-fluid rounded-3 w-lg-50 w-md-75 mb-4 shadow-xl">
                                    <p class="mb-5 w-md-75 lead">
                                        Lorem Ipsum
                                        Lorem ipsum is placeholder text commonly used in the graphic, print, and
                                        publishing industries for previewing layouts and visual mockups.
                                    </p>
                                    <a href="{{ URL::asset('#!') }}" class="fw-medium link-hover-underline"
                                        href="{{ URL::asset('mailto:mailto@emily.com') }}">Contact Emily
                                        <i class="bx bx-right-arrow-alt fs-5"></i>
                                    </a>
                                </div>
                                <div class="tab-pane fade" id="g-adams" role="tabpanel" aria-labelledby="g-adams-tab">
                                    <img src="{{ URL::asset('assets/img/team/2.jpg') }}" alt="" class="img-fluid rounded-3 w-lg-50 w-md-75 mb-4 shadow-xl">
                                    <p class="mb-5 w-md-75 lead">
                                        Lorem Ipsum
                                        Lorem ipsum is placeholder text commonly used in the graphic, print, and
                                        publishing industries for previewing layouts and visual mockups.
                                    </p>
                                    <a href="{{ URL::asset('#!') }}" class="fw-medium link-hover-underline"
                                        href="{{ URL::asset('mailto:mailto@adams.com') }}">Contact Adams
                                        <i class="bx bx-right-arrow-alt fs-5"></i>
                                    </a>
                                </div>
                                <div class="tab-pane fade" id="d-knight" role="tabpanel" aria-labelledby="d-knight-tab">
                                    <img src="{{ URL::asset('assets/img/team/4.jpg') }}" alt="" class="img-fluid rounded-3 w-lg-50 w-md-75 mb-4 shadow-xl">
                                    <p class="mb-5 w-md-75 lead">
                                        Lorem Ipsum
                                        Lorem ipsum is placeholder text commonly used in the graphic, print, and
                                        publishing industries for previewing layouts and visual mockups.
                                    </p>
                                    <a href="{{ URL::asset('#!') }}" class="fw-medium link-hover-underline"
                                        href="{{ URL::asset('mailto:mailto@knight.com') }}">Contact knight
                                        <i class="bx bx-right-arrow-alt fs-5"></i>
                                    </a>
                                </div>
                                <div class="tab-pane fade" id="j-tar" role="tabpanel" aria-labelledby="j-tar-tab">
                                    <img src="{{ URL::asset('assets/img/team/6.jpg') }}" alt="" class="img-fluid rounded-3 w-lg-50 w-md-75 mb-4 shadow-xl">
                                    <p class="mb-5 w-md-75 lead">
                                        Lorem Ipsum
                                        Lorem ipsum is placeholder text commonly used in the graphic, print, and
                                        publishing industries for previewing layouts and visual mockups.
                                    </p>
                                    <a href="{{ URL::asset('#!') }}" class="fw-medium link-hover-underline"
                                        href="{{ URL::asset('mailto:mailto@joseph.com') }}">Contact Julia
                                        <i class="bx bx-right-arrow-alt fs-5"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="position-relative bg-body-tertiary">
                <div class="container py-9 py-lg-11">
                    <div class="d-flex align-items-center justify-content-center mb-5">
                        <h6 class="mb-0 me-2 me-lg-4">Hover Tabs vertical</h6>
                        <span class="border-top d-block flex-grow-1"></span>
                    </div>
                    <div class="row align-items-center justify-content-between">
                        <div class="col-md-6 col-xl-5 mb-5 mb-md-0">
                            <div class="nav nav-pills d-flex flex-column"
                                id="tabs-hover" role="tablist" aria-orientation="vertical">
                                <a class="nav-link px-4 py-3 rounded-4 active mb-md-3" href="{{ URL::asset('#hover-tab-1') }}" data-bs-toggle="pill"
                                    data-bs-target="#hover-tab-1" role="tab" aria-controls="hover-tab-1"
                                    aria-selected="true">
                                    <div class="d-flex align-items-center">
                                        <!--:Icon:-->
                                        <div class="flex-shrink-0 width-6x height-6x flex-center font-serif fs-3 shadow-sm me-3 rounded-circle bg-white bg-opacity-25">
                                            <i class="icon-Palette"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h5 class="text-reset mb-0">UI UX Design</h5>
                                        </div>
                                    </div>
                                </a>
                                <a class="nav-link px-4 py-3 rounded-4 mb-md-3" href="{{ URL::asset('#hover-tab-2') }}" data-bs-toggle="pill"
                                    data-bs-target="#hover-tab-2" role="tab" aria-controls="hover-tab-2" aria-selected="false">
                                    <div class="d-flex align-items-center">
                                        <!--:Icon:-->
                                        <div class="flex-shrink-0 width-6x height-6x flex-center font-serif fs-3 shadow-sm me-3 rounded-circle bg-white bg-opacity-25">
                                            <i class="icon-Coding"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h5 class="text-reset mb-0">Web Development</h5>
                                        </div>
                                    </div>
                                    </a>
                                    <a class="nav-link px-4 py-3 rounded-4 mb-md-3" href="{{ URL::asset('#hover-tab-3') }}" data-bs-toggle="pill"
                                        data-bs-target="#hover-tab-3" role="tab" aria-controls="hover-tab-3"
                                        aria-selected="false">
                                        <div class="d-flex align-items-center">
                                            <!--:Icon:-->
                                            <div class="flex-shrink-0 width-6x height-6x flex-center font-serif fs-3 shadow-sm me-3 rounded-circle bg-white bg-opacity-25">
                                                <i class="icon-Flag"></i>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h5 class="text-reset mb-0">Marketing</h5>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="nav-link px-4 py-3 rounded-4" href="{{ URL::asset('#hover-tab-4') }}" data-bs-toggle="pill"
                                        data-bs-target="#hover-tab-4" role="tab" aria-controls="hover-tab-4" aria-selected="false">
                                        <div class="d-flex align-items-center">
                                            <!--:Icon:-->
                                            <div class="flex-shrink-0 width-6x height-6x flex-center font-serif fs-3 shadow-sm me-3 rounded-circle bg-white bg-opacity-25">
                                                <i class="icon-Smartphone"></i>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h5 class="text-reset mb-0">Mobile Apps Development</h5>
                                            </div>
                                        </div>
                                    </a>
                                 </div>
                        </div>
                        <div class="col-md-6">

                            <div class="tab-content" id="tab-panel-hover">
                                <div class="tab-pane fade show active" id="hover-tab-1" role="tabpanelhover"
                                    aria-labelledby="hover-tab-1">
                                    <img src="{{ URL::asset('assets/img/960x900/1.jpg') }}" alt="" class="img-fluid rounded-3 shadow-xl">
                                </div>
                                <div class="tab-pane fade" id="hover-tab-2" role="tabpanel" aria-labelledby="hover-tab-2">
                                    <img src="{{ URL::asset('assets/img/960x900/3.jpg') }}" alt="" class="img-fluid rounded-3 shadow-xl">
                                </div>
                                <div class="tab-pane fade" id="hover-tab-3" role="tabpanel" aria-labelledby="hover-tab-3">
                                    <img src="{{ URL::asset('assets/img/960x900/2.jpg') }}" alt="" class="img-fluid rounded-3 shadow-xl">
                                </div>
                                <div class="tab-pane fade" id="hover-tab-4" role="tabpanel" aria-labelledby="hover-tab-4">
                                    <img src="{{ URL::asset('assets/img/960x900/4.jpg') }}" alt="" class="img-fluid rounded-3 shadow-xl">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="postion-relative overflow-hidden">
                <div class="container py-9 py-lg-12">
                    <div class="d-flex align-items-center justify-content-center mb-5">
                        <h6 class="mb-0 me-2 me-lg-4">Indicator Tabs - Also auto adjust horizontall scroll according to active item</h6>
                        <span class="border-top d-block flex-grow-1"></span>
                    </div>
                    <ul class="nav gap-4 nav-inline position-relative">
                        <li class="indicator position-absolute bottom-0 z-n1 border-bottom border-2 border-primary"></li>
                    
                      <li class="nav-item">
                        <a class="nav-link px-0 active" data-bs-toggle="tab" href="{{ URL::asset('#profile') }}">
                            <i class="bx bx-user me-1 align-middle"></i> Profile
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link px-0" data-bs-toggle="tab" href="{{ URL::asset('#edit_profile') }}">
                            <i class="bx bx-edit me-1 align-middle"></i> Edit Profile
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link px-0" data-bs-toggle="tab" href="{{ URL::asset('#passbook') }}">
                            <i class="bx bx-history me-1 align-middle"></i> Passbook
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link px-0" data-bs-toggle="tab" href="{{ URL::asset('#bills') }}">
                            <i class="bx bx-dollar me-1 align-middle"></i> 
                            Bills</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link px-0" data-bs-toggle="tab" href="{{ URL::asset('#orders') }}">
                            <i class="bx bx-cart me-1 align-middle"></i> 
                            Orders</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link px-0" data-bs-toggle="tab" href="{{ URL::asset('#payments') }}">
                            <i class="bx bx-credit-card me-1 align-middle"></i> 
                            Payments</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link px-0" data-bs-toggle="tab" href="{{ URL::asset('#rewards') }}">
                            <i class="bx bx-trophy me-1 align-middle"></i> 
                            Rewards</a>
                      </li>
                     </ul>
                    <div class="tab-content p-4 bg-body-tertiary rounded-bottom-3">
                      <div id="profile" class="tab-pane fade active show">
                        <p class="mb-0 text-body-secondary">Please <a href="{{ URL::asset('page-account-signin.html') }}" target="_blank" class="link-primary">Sign In</a> to view your profile</p>
                      </div>
                       <div id="edit_profile" class="tab-pane fade">
                        <p class="mb-0 text-body-secondary">Please <a href="{{ URL::asset('page-account-signin.html') }}" target="_blank" class="link-primary">Sign In</a> to edit your profile</p>
                       </div>
                         <div id="passbook" class="tab-pane fade">
                            <p class="mb-0 text-body-secondary">0 entries found</p>
                         </div>
                        <div id="bills" class="tab-pane fade">
                            <p class="mb-0 text-body-secondary">0 due bills</p>
                        </div>
                        <div id="orders" class="tab-pane fade">
                            <p class="mb-0 text-body-secondary">0 orders!
                                <a href="" class="btn btn-secondary btn-sm">Shop Now</a>
                            </p>
                        </div>
                        <div id="payments" class="tab-pane fade">
                            <p class="mb-0 text-body-secondary">Please <a href="{{ URL::asset('page-account-signin.html') }}" target="_blank" class="link-primary">Sign In</a> to add/update payment methods</p>
                        </div>
                        <div id="rewards" class="tab-pane fade">
                          <p class="mb-0 text-body-secondary">Nothing here!
                        <a href="" class="btn btn-secondary btn-sm">Shop Now</a>
                    </p>
                        </div>
                    </div>
                  </div>
                  
            </section>
            <section class="bg-success-subtle position-relative">
                <div class="container py-9 py-lg-11">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-10 col-lg-8 col-xl-7 text-center mx-auto">
                            <h2 class="mb-4 display-4" data-aos="fade-up">
                                Let's start building stunning websites
                            </h2>
                            <p class="mb-5 px-lg-5" data-aos="fade-up" data-aos-delay="100">
                                Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing
                                industries for previewing layouts and visual mockups.
                            </p>
                            <div data-aos="fade-up">
                                <a href="{{ URL::asset('#!') }}" class="btn btn-primary rounded-pill btn-lg">Purchase a
                                    license</a>
                            </div>
                        </div>
                        <!--End Col-->
                    </div> <!-- / .row -->
                </div> <!-- / .container -->
            </section>
</x-assan-layout>
