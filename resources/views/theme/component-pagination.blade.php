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
                                                <li class="breadcrumb-item active" aria-current="page">Pagination</li>
                                            </ol>
                                        </div>
                                    </nav>
                                    <h1 class="mb-0 display-4">
                                        Pagination
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
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item disabled"><a class="page-link" href="{{ URL::asset('#') }}">Previous</a></li>
                                    <li class="page-item active"><a class="page-link" href="{{ URL::asset('#') }}">1</a></li>
                                    <li class="page-item"><a class="page-link" href="{{ URL::asset('#') }}">2</a></li>
                                    <li class="page-item"><a class="page-link" href="{{ URL::asset('#') }}">3</a></li>
                                    <li class="page-item"><a class="page-link" href="{{ URL::asset('#') }}">Next</a></li>
                                </ul>
                            </nav>
                            <hr class="my-7">
                            <div class="d-flex align-items-center justify-content-center mb-4">
                                <h6 class="mb-0 me-2 me-lg-3">With Icons</h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="{{ URL::asset('#') }}" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="{{ URL::asset('#') }}">1</a></li>
                                    <li class="page-item"><a class="page-link" href="{{ URL::asset('#') }}">2</a></li>
                                    <li class="page-item"><a class="page-link" href="{{ URL::asset('#') }}">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="{{ URL::asset('#') }}" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>

                            <hr class="my-7">
                            <div class="d-flex align-items-center justify-content-center mb-4">
                                <h6 class="mb-0 me-2 me-lg-3">Sizing</h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>
                            <nav class="mb-5" aria-label="Page navigation example">
                                <ul class="pagination pagination-sm">
                                    <li class="page-item disabled"><a class="page-link" href="{{ URL::asset('#') }}">Previous</a></li>
                                    <li class="page-item active"><a class="page-link" href="{{ URL::asset('#') }}">1</a></li>
                                    <li class="page-item"><a class="page-link" href="{{ URL::asset('#') }}">2</a></li>
                                    <li class="page-item"><a class="page-link" href="{{ URL::asset('#') }}">3</a></li>
                                    <li class="page-item"><a class="page-link" href="{{ URL::asset('#') }}">Next</a></li>
                                </ul>
                            </nav>
                            <nav class="mb-5" aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item disabled"><a class="page-link" href="{{ URL::asset('#') }}">Previous</a></li>
                                    <li class="page-item active"><a class="page-link" href="{{ URL::asset('#') }}">1</a></li>
                                    <li class="page-item"><a class="page-link" href="{{ URL::asset('#') }}">2</a></li>
                                    <li class="page-item"><a class="page-link" href="{{ URL::asset('#') }}">3</a></li>
                                    <li class="page-item"><a class="page-link" href="{{ URL::asset('#') }}">Next</a></li>
                                </ul>
                            </nav>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination pagination-lg">
                                    <li class="page-item disabled"><a class="page-link" href="{{ URL::asset('#') }}">Previous</a></li>
                                    <li class="page-item active"><a class="page-link" href="{{ URL::asset('#') }}">1</a></li>
                                    <li class="page-item"><a class="page-link" href="{{ URL::asset('#') }}">2</a></li>
                                    <li class="page-item"><a class="page-link" href="{{ URL::asset('#') }}">3</a></li>
                                    <li class="page-item"><a class="page-link" href="{{ URL::asset('#') }}">Next</a></li>
                                </ul>
                            </nav>
                            <hr class="my-7">
                            <div class="d-flex align-items-center justify-content-center mb-4">
                                <h6 class="mb-0 me-2 me-lg-3">Alignment</h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>
                            <nav aria-label="Page navigation example" class="d-flex justify-content-end">
                                <ul class="pagination pagination-sm">
                                    <li class="page-item"><a class="page-link" href="{{ URL::asset('#') }}">Previous</a></li>
                                    <li class="page-item active"><a class="page-link" href="{{ URL::asset('#') }}">1</a></li>
                                    <li class="page-item"><a class="page-link" href="{{ URL::asset('#') }}">2</a></li>
                                    <li class="page-item"><a class="page-link" href="{{ URL::asset('#') }}">3</a></li>
                                    <li class="page-item"><a class="page-link" href="{{ URL::asset('#') }}">Next</a></li>
                                </ul>
                            </nav>
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
