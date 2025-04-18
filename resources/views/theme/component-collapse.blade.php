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
                                                <li class="breadcrumb-item active" aria-current="page">Collapse</li>
                                            </ol>
                                        </div>
                                    </nav>
                                    <h1 class="mb-0 display-4">
                                        Collapse
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="position-relative">
                <div class="py-9 py-lg-11 container">
                    <div class="row">
                        <div class="col-md-10 col-lg-7">
                            <div class="d-flex align-items-center mb-4 mb-lg-6">
                                <h6 class="mb-0 me-3">Login collapse</h6>
                                <div class="flex-grow-1 border-bottom"></div>
                            </div>
                            <h5 class="text-body-secondary">
                                Returning customer? <a class="fw-semibold d-inline-block ms-3" data-bs-toggle="collapse"
                                    href="{{ URL::asset('#collapseSignIn') }}" role="button" aria-expanded="false"
                                    aria-controls="collapseSignIn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                        class="bx bx-log-in-circle me-1" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z" />
                                        <path fill-rule="evenodd"
                                            d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                                    </svg> Login
                                </a>
                            </h5>
                            <div class="collapse" id="collapseSignIn">
                                <form class="w-lg-75">
                                    <div class="pt-4 mb-3">
                                        <input type="email" class="form-control" autofocus placeholder="Username">
                                    </div>
                                    <div class="mb-3">
                                        <input type="password" class="form-control" placeholder="Password">
                                    </div>
                                    <div class="mb-3 d-flex justify-content-between">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Remember me
                                            </label>
                                        </div>
                                        <div>
                                            <label class="text-end d-block small mb-0"><a
                                                    href="{{ URL::asset('page-account-forget-password.html') }}"
                                                    class="text-body-secondary link-decoration">Forget
                                                    Password?</a></label>
                                        </div>
                                    </div>

                                    <div class="d-grid">
                                        <button class="btn btn-primary" type="submit">
                                            Sign in
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="position-relative bg-body-tertiary">
                <div class="py-9 py-lg-11 container">
                    <div class="row">
                        <div class="col-lg-7 col-md-10">
                            <div class="d-flex align-items-center mb-4 mb-lg-6">
                                <h6 class="mb-0 me-3">FAQs collapse</h6>
                                <div class="flex-grow-1 border-bottom"></div>
                            </div>
                            <!--Collapse item-->
                            <div class="border-bottom py-3">
                                <a class="fw-semibold fs-5 d-block" data-bs-toggle="collapse" href="{{ URL::asset('#faq1') }}" role="button"
                                    aria-expanded="true" aria-controls="faq1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bx bx-question-mark text-body-secondary me-2" viewBox="0 0 16 16">
                                        <path
                                            d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z" />
                                    </svg> How much you charge for Extended License?
                                </a>
                                <div class="collapse show" id="faq1">
                                    <p class="pt-3">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. <a href="{{ URL::asset('#!') }}">Quis</a> vel
                                        eros donec ac odio tempor. Ac turpis egestas maecenas pharetra. Nibh venenatis
                                        cras sed
                                        felis. Justo eget magna neque vitae tempus
                                        quam
                                        pellentesque nec. Urna molestie at elementum eu facilisis sed. Congue mauris
                                        rhoncus
                                        aenean vel. Lobortis mattis aliquam faucibus purus. Rutrum quisque non tellus
                                        orci ac
                                        auctor augue.
                                    </p>
                                </div>
                            </div>
                            <!--Collapse item-->
                            <div class="border-bottom py-3">
                                <a class="fw-semibold fs-5 d-block" data-bs-toggle="collapse" href="{{ URL::asset('#faq2') }}" role="button"
                                    aria-expanded="false" aria-controls="faq2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bx bx-question-mark text-body-secondary me-2" viewBox="0 0 16 16">
                                        <path
                                            d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z" />
                                    </svg> What is gsap?
                                </a>
                                <div class="collapse" id="faq2">
                                    <p class="pt-3">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. <a href="{{ URL::asset('#!') }}">Quis</a> vel
                                        eros donec ac odio tempor. Ac turpis egestas maecenas pharetra. Nibh venenatis
                                        cras sed
                                        felis. Justo eget magna neque vitae tempus
                                        quam
                                        pellentesque nec. Urna molestie at elementum eu facilisis sed. Congue mauris
                                        rhoncus
                                        aenean vel. Lobortis mattis aliquam faucibus purus. Rutrum quisque non tellus
                                        orci ac
                                        auctor augue.
                                    </p>
                                </div>
                            </div>

                            <!--Collapse item-->
                            <div class="border-bottom py-3">
                                <a class="fw-semibold fs-5 d-block" data-bs-toggle="collapse" href="{{ URL::asset('#faq3') }}" role="button"
                                    aria-expanded="false" aria-controls="faq3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bx bx-question-mark text-body-secondary me-2" viewBox="0 0 16 16">
                                        <path
                                            d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z" />
                                    </svg> How much you charge for Extended License?
                                </a>
                                <div class="collapse" id="faq3">
                                    <p class="pt-3">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. <a href="{{ URL::asset('#!') }}">Quis</a> vel
                                        eros donec ac odio tempor. Ac turpis egestas maecenas pharetra. Nibh venenatis
                                        cras sed
                                        felis. Justo eget magna neque vitae tempus
                                        quam
                                        pellentesque nec. Urna molestie at elementum eu facilisis sed. Congue mauris
                                        rhoncus
                                        aenean vel. Lobortis mattis aliquam faucibus purus. Rutrum quisque non tellus
                                        orci ac
                                        auctor augue.
                                    </p>
                                </div>
                            </div>

                            <!--Collapse item-->
                            <div class="border-bottom py-3">
                                <a class="fw-semibold fs-5 d-block" data-bs-toggle="collapse" href="{{ URL::asset('#faq4') }}" role="button"
                                    aria-expanded="false" aria-controls="faq4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bx bx-question-mark text-body-secondary me-2" viewBox="0 0 16 16">
                                        <path
                                            d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z" />
                                    </svg> What is collapse?
                                </a>
                                <div class="collapse" id="faq4">
                                    <p class="pt-3">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. <a href="{{ URL::asset('#!') }}">Quis</a> vel
                                        eros donec ac odio tempor. Ac turpis egestas maecenas pharetra. Nibh venenatis
                                        cras sed
                                        felis. Justo eget magna neque vitae tempus
                                        quam
                                        pellentesque nec. Urna molestie at elementum eu facilisis sed. Congue mauris
                                        rhoncus
                                        aenean vel. Lobortis mattis aliquam faucibus purus. Rutrum quisque non tellus
                                        orci ac
                                        auctor augue.
                                    </p>
                                </div>
                            </div>

                            <!--Collapse item-->
                            <div class="py-3">
                                <a class="fw-semibold fs-5 d-block" data-bs-toggle="collapse" href="{{ URL::asset('#faq5') }}" role="button"
                                    aria-expanded="false" aria-controls="faq5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bx bx-question-mark text-body-secondary me-2" viewBox="0 0 16 16">
                                        <path
                                            d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z" />
                                    </svg> Different between collapse & accordion
                                </a>
                                <div class="collapse" id="faq5">
                                    <p class="pt-3">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. <a href="{{ URL::asset('#!') }}">Quis</a> vel
                                        eros donec ac odio tempor. Ac turpis egestas maecenas pharetra. Nibh venenatis
                                        cras sed
                                        felis. Justo eget magna neque vitae tempus
                                        quam
                                        pellentesque nec. Urna molestie at elementum eu facilisis sed. Congue mauris
                                        rhoncus
                                        aenean vel. Lobortis mattis aliquam faucibus purus. Rutrum quisque non tellus
                                        orci ac
                                        auctor augue.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="position-relative">
                <div class="py-9 py-lg-11 container">
                    <div class="row">
                        <div class="col-lg-7 col-md-10">
                            <div class="d-flex align-items-center mb-4 mb-lg-6">
                                <h6 class="mb-0 me-3">Show more content collapse</h6>
                                <div class="flex-grow-1 border-bottom"></div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Quis vel eros donec ac odio tempor.
                                        Ac
                                        turpis egestas maecenas pharetra. Nibh venenatis cras sed felis. Justo eget
                                        magna
                                        neque vitae tempus quam pellentesque nec.
                                        Urna
                                        molestie at elementum eu facilisis sed. Congue mauris rhoncus aenean vel.
                                        Lobortis
                                        mattis aliquam faucibus purus. Rutrum quisque non tellus orci ac auctor augue.
                                        Mattis
                                        nunc sed blandit libero volutpat sed cras. Scelerisque eu ultrices vitae auctor
                                        eu augue
                                        ut.
                                    </p>
                                    <div class="collapse" id="showmore">
                                        <p>
                                            Accumsan sit amet nulla facilisi morbi tempus iaculis urna id. Magna ac
                                            placerat
                                            vestibulum lectus mauris ultrices eros in cursus. Eros donec ac odio tempor
                                            orci
                                            dapibus
                                            ultrices in iaculis. Tellus rutrum tellus pellentesque eu tincidunt tortor
                                            aliquam
                                            nulla. In fermentum posuere urna nec tincidunt praesent semper. Suspendisse
                                            in
                                            est ante
                                            in nibh mauris cursus mattis molestie. Bibendum ut tristique et egestas
                                            quis.
                                        </p>
                                    </div>
                                    <a class="small fw-semibold text-body-secondary showMore-link"
                                        data-bs-toggle="collapse" href="{{ URL::asset('#showmore') }}" role="button" aria-expanded="false"
                                        aria-controls="showmore">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="position-relative bg-body-tertiary">
                <div class="py-9 py-lg-11 container">
                    <div class="row">
                        <div class="col-lg-7 col-md-10">
                            <div class="d-flex align-items-center mb-4 mb-lg-6">
                                <h6 class="mb-0 me-3">Multiple level vertical collapse navbar</h6>
                                <div class="flex-grow-1 border-bottom"></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-5 col-md-8">
                                    <nav class="collapse-group nav border rounded-3 p-3 collapse d-flex flex-column">
                                        <div class="collapse d-block">
                                            <div class="nav flex-column">
                                                <a href="{{ URL::asset('#mens') }}" class="nav-link collapsed" data-bs-toggle="collapse"
                                                    aria-expanded="true">Mens</a>
                                                <div class="collapse show" id="mens">
                                                    <div class="nav nav-level-2 flex-column">
                                                        <a href="{{ URL::asset('#') }}" class="nav-link">Shirts</a>
                                                        <a href="{{ URL::asset('#') }}" class="nav-link">Jeans</a>
                                                        <a href="{{ URL::asset('#') }}" class="nav-link">Shoes</a>
                                                        <a href="{{ URL::asset('#') }}" class="nav-link">Trousers</a>
                                                        <a href="{{ URL::asset('#acc_list') }}" data-bs-toggle="collapse"
                                                            aria-expanded="false" class="nav-link">Accessories</a>
                                                        <div class="collapse" id="acc_list">
                                                            <div class="nav flex-column nav-level-3">
                                                                <a href="{{ URL::asset('#') }}" class="nav-link">Belts</a>
                                                                <a href="{{ URL::asset('#') }}" class="nav-link">Watches</a>
                                                                <a href="{{ URL::asset('#') }}" class="nav-link">Sunglasses</a>
                                                                <a href="{{ URL::asset('#') }}" class="nav-link">Wallets</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="nav flex-column">
                                                <a href="{{ URL::asset('#womens') }}" class="nav-link" data-bs-toggle="collapse"
                                                    aria-expanded="false">Womens</a>
                                                <div class="collapse" id="womens">
                                                    <div class="nav nav-level-2 flex-column">
                                                        <a href="{{ URL::asset('#') }}" class="nav-link">Shirts</a>
                                                        <a href="{{ URL::asset('#') }}" class="nav-link">Jeans</a>
                                                        <a href="{{ URL::asset('#') }}" class="nav-link">Shoes</a>
                                                        <a href="{{ URL::asset('#') }}" class="nav-link">Trousers</a>
                                                        <a href="{{ URL::asset('#') }}" class="nav-link">Accessories</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="{{ URL::asset('#') }}" class="nav-link">Shirts</a>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="bg-gradient bg-secondary text-white position-relative">
                <svg class="position-absolute top-0 start-0 text-white w-50 h-auto w-lg-75" width="136" height="76"
                    viewBox="0 0 136 76" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-opacity=".1"
                        d="M136 -28C136 -14.3425 133.31 -0.818782 128.083 11.7991C122.857 24.4169 115.196 35.8818 105.539 45.5391C95.8818 55.1964 84.4169 62.857 71.7991 68.0835C59.1812 73.31 45.6575 76 32 76C18.3425 76 4.81878 73.31 -7.79908 68.0835C-20.4169 62.857 -31.8818 55.1964 -41.5391 45.5391C-51.1964 35.8818 -58.857 24.4169 -64.0835 11.7991C-69.31 -0.818789 -72 -14.3425 -72 -28L136 -28Z"
                        fill="currentColor" />
                </svg>
                <div class="container py-9 py-lg-11 position-relative z-1">
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
                                <a href="{{ URL::asset('#!') }}" class="btn btn-primary btn-lg">Purchase a
                                    license</a>
                            </div>
                        </div>
                        <!--End Col-->
                    </div> <!-- / .row -->
                </div> <!-- / .container -->
            </section>
</x-assan-layout>
