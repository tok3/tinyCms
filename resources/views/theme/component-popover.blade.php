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
                                                <li class="breadcrumb-item active" aria-current="page">Popovers</li>
                                            </ol>
                                        </div>
                                    </nav>
                                    <h1 class="mb-0 display-4">
                                        Popovers
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section class="position-relative" id="next">
                <div class="container py-9 py-lg-11">
                    <div class="row">
                        <div class="col-md-8 mx-auto">
                            <div class="d-flex align-items-center justify-content-center mb-4">
                                <h6 class="mb-0 me-2 me-lg-3">Example</h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>
                            <button type="button" class="btn btn-secondary" data-bs-toggle="popover"
                                title="Popover title"
                                data-bs-content="And here's some amazing content. It's very engaging. Right?">Click to
                                toggle popover</button>

                            <hr class="my-7">
                            <div class="d-flex align-items-center justify-content-center mb-4">
                                <h6 class="mb-0 me-2 me-lg-3">Four directions</h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>

                            <button type="button" class="btn btn-secondary mb-2 me-1" data-bs-container="body"
                                data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Top popover">
                                Popover on top
                            </button>
                            <button type="button" class="btn btn-secondary mb-2 me-1" data-bs-container="body"
                                data-bs-toggle="popover" data-bs-placement="right" data-bs-content="Right popover">
                                Popover on right
                            </button>
                            <button type="button" class="btn btn-secondary mb-2 me-1" data-bs-container="body"
                                data-bs-toggle="popover" data-bs-placement="bottom" data-bs-content="Bottom popover">
                                Popover on bottom
                            </button>
                            <button type="button" class="btn btn-secondary mb-2 me-1" data-bs-container="body"
                                data-bs-toggle="popover" data-bs-placement="left" data-bs-content="Left popover">
                                Popover on left
                            </button>
                            <hr class="my-7">
                            <div class="d-flex align-items-center justify-content-center mb-4">
                                <h6 class="mb-0 me-2 me-lg-3">Dismiss on next click</h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>
                            <a tabindex="0" class="btn btn-secondary" role="button" data-bs-toggle="popover"
                                data-bs-trigger="focus" title="Dismissible popover"
                                data-bs-content="And here's some amazing content. It's very engaging. Right?">Dismissible
                                popover</a>
                        </div>
                    </div>
                </div>
                </div>
            </section>
            <section class="bg-success-subtle position-relative">
                <div class="container py-9 py-lg-11">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-10 col-lg-8 col-xl-7 text-center mx-auto">
                            <h2 class="mb-4 display-4" data-aos="fade-up">
                                Design anything
                            </h2>
                            <p class="mb-5 px-lg-5" data-aos="fade-up" data-aos-delay="100">
                                Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing
                                industries for previewing layouts and visual mockups.
                            </p>
                            <div data-aos="fade-up">
                                <a href="{{ URL::asset('#!') }}" class="btn btn-primary rounded-pill btn-lg">Purchase a license</a>
                            </div>
                        </div>
                        <!--End Col-->
                    </div> <!-- / .row -->
                </div> <!-- / .container -->
            </section>
</x-assan-layout>
