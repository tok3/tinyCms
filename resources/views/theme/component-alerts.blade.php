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
                                                <li class="breadcrumb-item active" aria-current="page">Alerts</li>
                                            </ol>
                                        </div>
                                    </nav>
                                    <h1 class="mb-0 display-4">
                                        Alerts
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section class="position-relative" id="next">
                <div class="container py-9 position-relative z-1">
                    <div class="row">
                        <div class="col-md-8 mx-auto">
                            <div class="d-flex align-items-center justify-content-center mb-4">
                                <h6 class="mb-0 me-2 me-lg-4">Default</h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>
                            <div class="alert alert-primary" role="alert">
                                A simple primary alert—check it out!
                            </div>
                            <div class="alert alert-secondary" role="alert">
                                A simple secondary alert—check it out!
                            </div>
                            <div class="alert alert-success" role="alert">
                                A simple success alert—check it out!
                            </div>
                            <div class="alert alert-danger" role="alert">
                                A simple danger alert—check it out!
                            </div>
                            <div class="alert alert-warning" role="alert">
                                A simple warning alert—check it out!
                            </div>
                            <div class="alert alert-info" role="alert">
                                A simple info alert—check it out!
                            </div>
                            <div class="alert alert-light" role="alert">
                                A simple light alert—check it out!
                            </div>
                            <div class="alert alert-dark" role="alert">
                                A simple dark alert—check it out!
                            </div>

                            <hr class="my-5">

                            <div class="d-flex align-items-center justify-content-center mb-4">
                                <h6 class="mb-0 me-2 me-lg-4">Link</h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>
                            <div class="alert alert-primary" role="alert">
                                A simple primary alert with
                                <a href="{{ URL::asset('#') }}" class="alert-link">an example link</a>. Give it a click
                                if you like.
                            </div>


                            <hr class="my-5">

                            <div class="d-flex align-items-center justify-content-center mb-4">
                                <h6 class="mb-0 me-2 me-lg-4">Dismissing</h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                You should check in on some of those fields below.
                                <button type="button" class="btn-close p-0 top-50 translate-middle-y me-2" data-bs-dismiss="alert" aria-label="Close">
                                    <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet"
                                        width="16" height="16" viewBox="0 0 128 128">
                                        <g>
                                            <path stroke="currentColor" stroke-width="8" stroke-linecap="square"
                                                fill="none" d="M7 7l114 114m0-114l-114 114" />
                                        </g>
                                    </svg>
                                </button>
                            </div>


                            <hr class="my-5">

                            <div class="d-flex align-items-center justify-content-center mb-4">
                                <h6 class="mb-0 me-2 me-lg-4">Additional content</h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>
                            <div class="alert alert-success mb-0" role="alert">
                                <h5 class="alert-heading">Well done!</h5>
                                <p class="mb-4">
                                    Aww yeah, you successfully read this important alert message. This
                                    example text is going to run a bit longer so that you can see how
                                    spacing within an alert works with this kind of content.
                                </p>
                                <p class="mb-0">
                                    Whenever you need to, be sure to use margin utilities to keep
                                    things nice and tidy.
                                </p>
                            </div>


                            <hr class="my-5">

                            <div class="d-flex align-items-center justify-content-center mb-4">
                                <h6 class="mb-0 me-2 me-lg-4">Custom</h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>
                            <div class="alert alert-white rounded-1 p-4 shadow-lg w-lg-60 w-md-75" role="alert">
                                <h5 class="alert-heading mb-3">We use cookies</h5>
                                <p class="small">
                                    We may place these for analysis of our visitor data, to improve our website, show
                                    personalised content and to give you a great website experience. For more
                                    information about the cookies we use open the settings.
                                </p>
                                <div
                                    class="mb-0 pt-4 border-top d-flex flex-row justify-content-between align-items-center">
                                    <div>
                                        <a href="{{ URL::asset('#') }}" data-bs-dismiss="alert" class="btn btn-primary btn-sm">
                                            Accept All
                                        </a>
                                    </div>
                                    <div>
                                        <a href="{{ URL::asset('#!') }}" class="btn btn-warning btn-sm">
                                            No, Thanks
                                        </a>
                                    </div>
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
