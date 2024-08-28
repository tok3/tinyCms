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
                                                <li class="breadcrumb-item active" aria-current="page">Toast</li>
                                            </ol>
                                        </div>
                                    </nav>
                                    <h1 class="mb-0 display-4">
                                        Toast
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="position-relative">
                <div class="container py-9 py-lg-11">
                    <div class="position-relative px-lg-12 px-xl-15">
                        <!--Toast demo example-->
                        <div class="d-flex align-items-center justify-content-center mb-4">
                            <h6 class="mb-0 me-2 me-lg-4">Default</h6>
                            <span class="border-top d-block flex-grow-1"></span>
                        </div>
                        <p class="small text-body-secondary">The following example is the basic default example of bootstrap
                            toast</p>
                        <!--Toast-item-->
                        <div class="position-relative">
                            <!-- Then put toasts within -->
                            <div class="toast fade show" data-bs-autohide="false" role="alert" aria-live="polite"
                                aria-atomic="true" data-bs-delay="10000">
                                <div class="toast-header">
                                    <img src="{{ URL::asset('assets/img/brands/Blogger.svg') }}" class="rounded width-2x height-2x me-2" alt="...">
                                    <strong class="me-auto">Toast top left</strong>
                                    <small class="text-body-secondary">Just now</small>
                                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close">
                                        <i class="bx bx-x"></i>
                                    </button>
                                </div>
                                <div class="toast-body">
                                    Hello, world! This is a toast message.
                                </div>
                            </div>
                        </div>
                        <hr class="my-5">
                        <!--Toast demo example-->
                        <div class="d-flex align-items-center justify-content-center mb-4">
                            <h6 class="mb-0 me-2 me-lg-4">Dark</h6>
                            <span class="border-top d-block flex-grow-1"></span>
                        </div>
                        <p class="small text-body-secondary">Toast dark - Add attribute -
                            <code>[data-bs-theme="dark"]</code></p>
                        <!--Toast-item-->
                        <div class="position-relative">
                            <!-- Then put toasts within -->
                            <div class="toast fade show" data-bs-theme="dark" data-bs-autohide="false"
                                role="alert" aria-live="polite" aria-atomic="true" data-bs-delay="10000">
                                <div class="toast-header">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="me-2 bx bx-bootstrap-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.002 0a4 4 0 0 0-4 4v8a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4V4a4 4 0 0 0-4-4h-8zm1.06 12h3.475c1.804 0 2.888-.908 2.888-2.396 0-1.102-.761-1.916-1.904-2.034v-.1c.832-.14 1.482-.93 1.482-1.816 0-1.3-.955-2.11-2.542-2.11H5.062V12zm1.313-4.875V4.658h1.78c.973 0 1.542.457 1.542 1.237 0 .802-.604 1.23-1.764 1.23H6.375zm0 3.762h1.898c1.184 0 1.81-.48 1.81-1.377 0-.885-.65-1.348-1.886-1.348H6.375v2.725z" />
                                    </svg>
                                    <strong class="me-auto">Bootstrap5 Toast</strong>
                                    <small class="text-body-secondary">Just now</small>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"
                                        aria-label="Close">
                                        <i class="bx bx-x"></i>
                                    </button>
                                </div>
                                <div class="toast-body text-body-emphasis">
                                    Checkout the latest bootstrap5 toast examples
                                </div>
                            </div>
                        </div>
                        <hr class="my-5">
                        <!--Toast demo example-->
                        <div class="d-flex align-items-center justify-content-center mb-4">
                            <h6 class="mb-0 me-2 me-lg-4">Auto hide</h6>
                            <span class="border-top d-block flex-grow-1"></span>
                        </div>
                        <p class="small text-body-secondary">Autohide - Set autohide to <code>"true"</code> to auto hide toast
                        </p>
                        <!--Toast-item-->
                        <div class="position-relative" aria-live="assertive" aria-atomic="true">
                            <!-- Then put toasts within -->
                            <div id="toastAutoHide" class="toast fade bg-dark text-white border-dark" data-bs-delay="10000" data-bs-autohide="true"
                                role="alert" data-bs-delay="3000">
                                <div class="toast-header text-white bg-secondary border-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="me-2 bx bx-bootstrap-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.002 0a4 4 0 0 0-4 4v8a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4V4a4 4 0 0 0-4-4h-8zm1.06 12h3.475c1.804 0 2.888-.908 2.888-2.396 0-1.102-.761-1.916-1.904-2.034v-.1c.832-.14 1.482-.93 1.482-1.816 0-1.3-.955-2.11-2.542-2.11H5.062V12zm1.313-4.875V4.658h1.78c.973 0 1.542.457 1.542 1.237 0 .802-.604 1.23-1.764 1.23H6.375zm0 3.762h1.898c1.184 0 1.81-.48 1.81-1.377 0-.885-.65-1.348-1.886-1.348H6.375v2.725z" />
                                    </svg>
                                    <strong class="me-auto">Bootstrap5 Toast</strong>
                                    <small class="text-body-secondary">Just now</small>
                                </div>
                                <div class="toast-body">
                                    Checkout the latest bootstrap5 toast examples
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="position-relative" id="next">
                <div class="container py-9 py-lg-11 px-lg-12 px-xl-15">
                    <div class="d-flex align-items-center justify-content-center mb-4">
                        <h6 class="mb-0 me-2 me-lg-4">Placement</h6>
                        <span class="border-top d-block flex-grow-1"></span>
                    </div>
                    <p class="small text-body-secondary">Change the placement using classes -&gt;
                        <code>.start-0 .top-0 .end-0 .bottom-0</code></p>
                    <!--For Toast position wrapper-->
                    <div class="position-relative border rounded-3 mb-5" style="height:360px">
                        <!--Toast placement-item-->
                        <div class="position-absolute start-0 top-0 p-3" aria-live="assertive" aria-atomic="true">
                            <small>Top left</small>
                            <!-- Then put toasts within -->
                            <div class="toast fade show" data-bs-autohide="false" role="alert" data-bs-delay="5000">
                                <div class="toast-header">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="me-2 bx bx-bootstrap-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.002 0a4 4 0 0 0-4 4v8a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4V4a4 4 0 0 0-4-4h-8zm1.06 12h3.475c1.804 0 2.888-.908 2.888-2.396 0-1.102-.761-1.916-1.904-2.034v-.1c.832-.14 1.482-.93 1.482-1.816 0-1.3-.955-2.11-2.542-2.11H5.062V12zm1.313-4.875V4.658h1.78c.973 0 1.542.457 1.542 1.237 0 .802-.604 1.23-1.764 1.23H6.375zm0 3.762h1.898c1.184 0 1.81-.48 1.81-1.377 0-.885-.65-1.348-1.886-1.348H6.375v2.725z">
                                        </path>
                                    </svg>
                                    <strong class="me-auto">Awesome bootstrap5</strong>
                                    <small class="text-body-secondary">Just now</small>
                                    <button type="button" class="btn-close" data-bs-dismiss="toast"
                                        aria-label="Close"><i class="bx bx-x"></i></button>
                                </div>
                                <div class="toast-body">
                                    Checkout the latest bootstrap5 toast examples
                                </div>
                            </div>
                        </div>
                        <!--Toast placement-item-->
                        <div class="position-absolute end-0 bottom-0 p-3" aria-live="assertive" aria-atomic="true">
                            <small>Bottom right</small>
                            <!-- Then put toasts within -->
                            <div class="toast fade show" data-bs-autohide="false" role="alert" data-bs-delay="5000">
                                <div class="toast-header">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="me-2 bx bx-bootstrap-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.002 0a4 4 0 0 0-4 4v8a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4V4a4 4 0 0 0-4-4h-8zm1.06 12h3.475c1.804 0 2.888-.908 2.888-2.396 0-1.102-.761-1.916-1.904-2.034v-.1c.832-.14 1.482-.93 1.482-1.816 0-1.3-.955-2.11-2.542-2.11H5.062V12zm1.313-4.875V4.658h1.78c.973 0 1.542.457 1.542 1.237 0 .802-.604 1.23-1.764 1.23H6.375zm0 3.762h1.898c1.184 0 1.81-.48 1.81-1.377 0-.885-.65-1.348-1.886-1.348H6.375v2.725z">
                                        </path>
                                    </svg>
                                    <strong class="me-auto">Awesome bootstrap5</strong>
                                    <small class="text-body-secondary">Just now</small>
                                    <button type="button" class="btn-close" data-bs-dismiss="toast"
                                        aria-label="Close"><i class="bx bx-x"></i></button>
                                </div>
                                <div class="toast-body">
                                    Checkout the latest bootstrap5 toast examples
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="position-relative border rounded-3 mb-5" style="height:360px">
                        <!--Toast placement-item-->
                        <div class="position-absolute end-0 top-0 p-3" aria-live="assertive" aria-atomic="true">
                            <small>Top right</small>
                            <!-- Then put toasts within -->
                            <div class="toast fade show" data-bs-autohide="false" role="alert" data-bs-delay="5000">
                                <div class="toast-header">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="me-2 bx bx-bootstrap-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.002 0a4 4 0 0 0-4 4v8a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4V4a4 4 0 0 0-4-4h-8zm1.06 12h3.475c1.804 0 2.888-.908 2.888-2.396 0-1.102-.761-1.916-1.904-2.034v-.1c.832-.14 1.482-.93 1.482-1.816 0-1.3-.955-2.11-2.542-2.11H5.062V12zm1.313-4.875V4.658h1.78c.973 0 1.542.457 1.542 1.237 0 .802-.604 1.23-1.764 1.23H6.375zm0 3.762h1.898c1.184 0 1.81-.48 1.81-1.377 0-.885-.65-1.348-1.886-1.348H6.375v2.725z">
                                        </path>
                                    </svg>
                                    <strong class="me-auto">Awesome bootstrap5</strong>
                                    <small class="text-body-secondary">Just now</small>
                                    <button type="button" class="btn-close" data-bs-dismiss="toast"
                                        aria-label="Close"><i class="bx bx-x"></i></button>
                                </div>
                                <div class="toast-body">
                                    Checkout the latest bootstrap5 toast examples
                                </div>
                            </div>
                        </div>
                        <!--Toast placement-item-->
                        <div class="position-absolute start-0 bottom-0 p-3" aria-live="assertive" aria-atomic="true">
                            <small>Bottom left</small>
                            <!-- Then put toasts within -->
                            <div class="toast fade show" data-bs-autohide="false" role="alert" data-bs-delay="5000">
                                <div class="toast-header">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="me-2 bx bx-bootstrap-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.002 0a4 4 0 0 0-4 4v8a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4V4a4 4 0 0 0-4-4h-8zm1.06 12h3.475c1.804 0 2.888-.908 2.888-2.396 0-1.102-.761-1.916-1.904-2.034v-.1c.832-.14 1.482-.93 1.482-1.816 0-1.3-.955-2.11-2.542-2.11H5.062V12zm1.313-4.875V4.658h1.78c.973 0 1.542.457 1.542 1.237 0 .802-.604 1.23-1.764 1.23H6.375zm0 3.762h1.898c1.184 0 1.81-.48 1.81-1.377 0-.885-.65-1.348-1.886-1.348H6.375v2.725z">
                                        </path>
                                    </svg>
                                    <strong class="me-auto">Awesome bootstrap5</strong>
                                    <small class="text-body-secondary">Just now</small>
                                    <button type="button" class="btn-close" data-bs-dismiss="toast"
                                        aria-label="Close"><i class="bx bx-x"></i></button>
                                </div>
                                <div class="toast-body">
                                    Checkout the latest bootstrap5 toast examples
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="position-relative border rounded-3 mb-5" style="height:360px">
                        <!--Toast placement-item-->
                        <div class="position-absolute start-50 bottom-0 translate-middle-x p-3" aria-live="assertive"
                            aria-atomic="true">
                            <small>Bottom center</small>
                            <!-- Then put toasts within -->
                            <div class="toast fade show" data-bs-autohide="false" role="alert" data-bs-delay="5000">
                                <div class="toast-header">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="me-2 bx bx-bootstrap-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.002 0a4 4 0 0 0-4 4v8a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4V4a4 4 0 0 0-4-4h-8zm1.06 12h3.475c1.804 0 2.888-.908 2.888-2.396 0-1.102-.761-1.916-1.904-2.034v-.1c.832-.14 1.482-.93 1.482-1.816 0-1.3-.955-2.11-2.542-2.11H5.062V12zm1.313-4.875V4.658h1.78c.973 0 1.542.457 1.542 1.237 0 .802-.604 1.23-1.764 1.23H6.375zm0 3.762h1.898c1.184 0 1.81-.48 1.81-1.377 0-.885-.65-1.348-1.886-1.348H6.375v2.725z">
                                        </path>
                                    </svg>
                                    <strong class="me-auto">Awesome bootstrap5</strong>
                                    <small class="text-body-secondary">Just now</small>
                                    <button type="button" class="btn-close" data-bs-dismiss="toast"
                                        aria-label="Close"><i class="bx bx-x"></i></button>
                                </div>
                                <div class="toast-body">
                                    Checkout the latest bootstrap5 toast examples
                                </div>
                            </div>
                        </div>
                        <!--Toast placement-item-->
                        <div class="position-absolute start-50 top-0 translate-middle-x p-3" aria-live="assertive"
                            aria-atomic="true">
                            <small>Top center</small>
                            <!-- Then put toasts within -->
                            <div class="toast fade show" data-bs-autohide="false" role="alert" data-bs-delay="5000">
                                <div class="toast-header">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="me-2 bx bx-bootstrap-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.002 0a4 4 0 0 0-4 4v8a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4V4a4 4 0 0 0-4-4h-8zm1.06 12h3.475c1.804 0 2.888-.908 2.888-2.396 0-1.102-.761-1.916-1.904-2.034v-.1c.832-.14 1.482-.93 1.482-1.816 0-1.3-.955-2.11-2.542-2.11H5.062V12zm1.313-4.875V4.658h1.78c.973 0 1.542.457 1.542 1.237 0 .802-.604 1.23-1.764 1.23H6.375zm0 3.762h1.898c1.184 0 1.81-.48 1.81-1.377 0-.885-.65-1.348-1.886-1.348H6.375v2.725z">
                                        </path>
                                    </svg>
                                    <strong class="me-auto">Awesome bootstrap5</strong>
                                    <small class="text-body-secondary">Just now</small>
                                    <button type="button" class="btn-close" data-bs-dismiss="toast"
                                        aria-label="Close"><i class="bx bx-x"></i></button>
                                </div>
                                <div class="toast-body">
                                    Checkout the latest bootstrap5 toast examples
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="position-relative border rounded-3 mb-5" style="height:360px">
                        <!--Toast placement-item-->
                        <div class="position-absolute start-50 top-50 translate-middle p-3" aria-live="assertive"
                            aria-atomic="true">
                            <small>Center middle</small>
                            <!-- Then put toasts within -->
                            <div class="toast fade show" data-bs-autohide="false" role="alert" data-bs-delay="5000">
                                <div class="toast-header">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="me-2 bx bx-bootstrap-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.002 0a4 4 0 0 0-4 4v8a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4V4a4 4 0 0 0-4-4h-8zm1.06 12h3.475c1.804 0 2.888-.908 2.888-2.396 0-1.102-.761-1.916-1.904-2.034v-.1c.832-.14 1.482-.93 1.482-1.816 0-1.3-.955-2.11-2.542-2.11H5.062V12zm1.313-4.875V4.658h1.78c.973 0 1.542.457 1.542 1.237 0 .802-.604 1.23-1.764 1.23H6.375zm0 3.762h1.898c1.184 0 1.81-.48 1.81-1.377 0-.885-.65-1.348-1.886-1.348H6.375v2.725z">
                                        </path>
                                    </svg>
                                    <strong class="me-auto">Awesome bootstrap5</strong>
                                    <small class="text-body-secondary">Just now</small>
                                    <button type="button" class="btn-close" data-bs-dismiss="toast"
                                        aria-label="Close"><i class="bx bx-x"></i></button>
                                </div>
                                <div class="toast-body">
                                    Checkout the latest bootstrap5 toast examples
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="position-relative border rounded-3" style="height:360px">
                        <!--Toast placement-item-->
                        <div class="position-absolute end-0 top-0 p-3" aria-live="assertive" aria-atomic="true">
                            <small>Stack</small>
                            <!-- Then put toasts within -->
                            <div class="toast mb-3 fade show" data-bs-autohide="false" role="alert"
                                data-bs-delay="5000">
                                <div class="toast-header">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="me-2 bx bx-bootstrap-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.002 0a4 4 0 0 0-4 4v8a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4V4a4 4 0 0 0-4-4h-8zm1.06 12h3.475c1.804 0 2.888-.908 2.888-2.396 0-1.102-.761-1.916-1.904-2.034v-.1c.832-.14 1.482-.93 1.482-1.816 0-1.3-.955-2.11-2.542-2.11H5.062V12zm1.313-4.875V4.658h1.78c.973 0 1.542.457 1.542 1.237 0 .802-.604 1.23-1.764 1.23H6.375zm0 3.762h1.898c1.184 0 1.81-.48 1.81-1.377 0-.885-.65-1.348-1.886-1.348H6.375v2.725z">
                                        </path>
                                    </svg>
                                    <strong class="me-auto">Awesome bootstrap5</strong>
                                    <small class="text-body-secondary">Just now</small>
                                    <button type="button" class="btn-close" data-bs-dismiss="toast"
                                        aria-label="Close"><i class="bx bx-x"></i></button>
                                </div>
                                <div class="toast-body">
                                    Checkout the latest bootstrap5 toast examples
                                </div>
                            </div>
                            <!-- Then put toasts within -->
                            <div class="toast fade show" data-bs-autohide="false" role="alert" data-bs-delay="5000">
                                <div class="toast-header">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="me-2 bx bx-bootstrap-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.002 0a4 4 0 0 0-4 4v8a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4V4a4 4 0 0 0-4-4h-8zm1.06 12h3.475c1.804 0 2.888-.908 2.888-2.396 0-1.102-.761-1.916-1.904-2.034v-.1c.832-.14 1.482-.93 1.482-1.816 0-1.3-.955-2.11-2.542-2.11H5.062V12zm1.313-4.875V4.658h1.78c.973 0 1.542.457 1.542 1.237 0 .802-.604 1.23-1.764 1.23H6.375zm0 3.762h1.898c1.184 0 1.81-.48 1.81-1.377 0-.885-.65-1.348-1.886-1.348H6.375v2.725z">
                                        </path>
                                    </svg>
                                    <strong class="me-auto">Awesome bootstrap5</strong>
                                    <small class="text-body-secondary">Just now</small>
                                    <button type="button" class="btn-close" data-bs-dismiss="toast"
                                        aria-label="Close"><i class="bx bx-x"></i></button>
                                </div>
                                <div class="toast-body">
                                    Checkout the latest bootstrap5 toast examples
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <section
            class="position-relative overflow-hidden bg-success-subtle">
            <div class="container py-9 py-lg-11">
                <div class="row align-items-end justify-content-around text-center text-md-start">
                    <div class="col-lg-8 col-md-7">
                        <p data-aos="zoom-in" class="mb-4 opacity-75">Are you interested?</p>
                        <h2 class="mb-4 mb-md-0 display-5 fw-lighter" data-aos="zoom-in-up" data-aos-delay="100">
                            Build <span class="text-success font-serif"
                                data-typed='{"strings": ["Stunning", "Amazing", "Responsive", "Working"]}'></span>
                            Website
                        </h2>
                    </div>
                    <!--End Col-->
                    <div class="col-lg-4 col-md-5 text-md-end">

                        <div data-aos="fade-left" data-aos-delay="200">
                            <a href="{{ URL::asset('#!') }}" class="btn btn-primary btn-lg rounded-pill">
                                Get started
                              
                            </a>
                        </div>
                    </div>
                </div> <!-- / .row -->
            </div> <!-- / .container -->
        </section>
</x-assan-layout>
