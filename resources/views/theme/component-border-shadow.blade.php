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
                                                <li class="breadcrumb-item active" aria-current="page">Border & Shadow
                                                </li>
                                            </ol>
                                        </div>
                                    </nav>
                                    <h1 class="mb-0 display-4">
                                        Border & Shadow
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section class="position-relative" id="next">
                <div class="container py-9 py-lg-11 position-relative z-1">
                    <div class="mb-4 d-flex align-items-center">
                        <h6 class="mb-0 me-3">Border Styles</h6>
                        <div class="pt-1 flex-grow-1 border-bottom"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <div class="p-4 text-center border">
                                Border all
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="p-4 text-center border border-start-0">
                                Border start - 0
                            </div>
                        </div>

                        <div class="col-md-3 mb-3">
                            <div class="p-4 text-center border border-top-0">
                                Border top - 0
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="p-4 text-center border border-end-0">
                                Border end - 0
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="p-4 text-center border border-bottom-0">
                                Border bottom - 0
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="p-4 text-center border border-2">
                                Border custom width<br> [1-5]
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="p-4 text-center border border-primary">
                                Border custom color
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="p-4 text-center border border-dashed">
                                Border Dashed
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="p-4 text-center border border-dotted border-2">
                                Border Dotted
                            </div>
                        </div>
                    </div>

                    <hr class="my-7">
                    <div class="mb-4 d-flex align-items-center">
                        <h6 class="mb-0 me-3">Border Radius</h6>
                        <div class="pt-1 flex-grow-1 border-bottom"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <div class="p-4 p-md-5 text-center bg-body-tertiary">
                                Rounded-0
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="p-4 p-md-5 text-center bg-body-tertiary rounded-1">
                                Rounded-1
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="p-4 p-md-5 text-center bg-body-tertiary rounded-2">
                                Rounded-2
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="p-4 p-md-5 text-center bg-body-tertiary rounded-3">
                                Rounded-3
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="p-4 p-md-5 text-center bg-body-tertiary rounded-4">
                                rounded-4
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="p-4 p-md-5 text-center bg-body-tertiary rounded-5">
                                rounded-5
                            </div>
                        </div>
                        <div class="col-md-5 mb-3">
                            <div class="p-4 p-md-5 text-center bg-body-tertiary rounded-block">
                                Rounded-block
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="p-4 p-md-5 text-center bg-body-tertiary rounded-pill">
                                Rounded-pill
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="width-10x small height-10x flex-center text-center bg-body-tertiary rounded-circle">
                                Rounded-circle
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="p-4 p-md-5 text-center bg-body-tertiary rounded-5 rounded-top-end-0 rounded-bottom-start-0">
                                Custom rounded
                            </div>
                        </div>
                    </div>

                    <hr class="my-7">
                    <div class="mb-4 d-flex align-items-center">
                        <h6 class="mb-0 me-3">Box shadows</h6>
                        <div class="pt-1 flex-grow-1 border-bottom"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <div class="p-4 text-center bg-body-secondary shadow-sm rounded-2 border">
                                Shadow-sm
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="p-4 text-center bg-body-secondary shadow rounded-2 border">
                                Shadow
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="p-4 text-center bg-body-secondary shadow-lg rounded-2 border">
                                Shadow-lg
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="p-4 text-center bg-body-secondary shadow-xl rounded-2 border">
                                Shadow-xl
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="p-4 text-center bg-body-secondary shadow-3d rounded-2 border border-dark">
                                Shadow-3d
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-3 mb-3">
                            <div class="p-4 text-center bg-body-secondary hover-shadow-sm rounded-2 border">
                                Hover-shadow-sm
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="p-4 text-center bg-body-secondary hover-shadow rounded-2 border">
                                Hover-shadow
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="p-4 text-center bg-body-secondary hover-shadow-lg rounded-2 border">
                                Hover-shadow-lg
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="p-4 text-center bg-body-secondary hover-shadow-xl rounded-2 border">
                                Hover-shadow-xl
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="p-4 text-center bg-body-secondary hover-shadow-3d rounded-2 border border-dark">
                                Hover-shadow-3d
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
