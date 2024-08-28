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
                                                <li class="breadcrumb-item active" aria-current="page">Blockquote</li>
                                            </ol>
                                        </div>
                                    </nav>
                                    <h1 class="mb-0 display-4">
                                        Blockquote
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section class="position-relative" id="next">
                <div class="container py-9 py-lg-11 position-relative z-1">
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <div class="d-flex align-items-center mb-4 mb-lg-5">
                                <h6 class="mb-0 me-3 me-lg-4">Detault</h6>
                                <div class="border-bottom flex-grow-1"></div>
                            </div>
                            <blockquote class="blockquote font-serif fs-5 border-start border-4 border-primary ps-3">
                                <p>A well-known quote, contained in a blockquote element.</p>
                            </blockquote>
                            <hr class="my-7">
                            <div class="d-flex align-items-center mb-4 mb-lg-5">
                                <h6 class="mb-0 me-3 me-lg-4">Naming a source</h6>
                                <div class="border-bottom flex-grow-1"></div>
                            </div>
                            <figure class="border-start border-4 border-primary ps-4">
                                <blockquote class="blockquote font-serif fs-1 lh-sm mb-4 mb-lg-5">
                                    <p>" Great things in business are never done by one person. "</p>
                                </blockquote>
                                <figcaption class="blockquote-footer">
                                    Steve Jobs
                                </figcaption>
                            </figure>
                            <hr class="my-7">
                            <div class="d-flex align-items-center mb-4 mb-lg-5">
                                <h6 class="mb-0 me-3 me-lg-4">Alignment</h6>
                                <div class="border-bottom flex-grow-1"></div>
                            </div>
                            <figure class="border-start border-4 mb-7 border-primary px-3 text-center">
                                <blockquote class="blockquote font-serif fs-1 lh-sm mb-4 mb-lg-5">
                                    <p>" Great things in business are never done by one person. "</p>
                                </blockquote>
                                <figcaption class="blockquote-footer">
                                    Steve Jobs
                                </figcaption>
                            </figure>
                            <figure class="border-end border-4 border-primary pe-4 text-end">
                                <blockquote class="blockquote font-serif fs-1 lh-sm mb-4 mb-lg-5">
                                    <p>" Great things in business are never done by one person. "</p>
                                </blockquote>
                                <figcaption class="blockquote-footer">
                                    Steve Jobs
                                </figcaption>
                            </figure>
                            <hr class="my-7">
                            <div class="d-flex align-items-center mb-4 mb-lg-5">
                                <h6 class="mb-0 me-3 me-lg-4">Custom style</h6>
                                <div class="border-bottom flex-grow-1"></div>
                            </div>
                            <figure
                                class="bg-gradient bg-secondary text-white border-start border-5 border-primary position-relative overflow-hidden p-4 py-5">
                                <svg class="position-absolute end-0 text-success bottom-0 h-75 h-md-50 w-auto"
                                    width="126" height="81" viewBox="0 0 126 81" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-opacity="1"
                                        d="M209 105C209 91.3425 206.31 77.8188 201.083 65.2009C195.857 52.5831 188.196 41.1182 178.539 31.4609C168.882 21.8036 157.417 14.143 144.799 8.91653C132.181 3.69004 118.657 0.999999 105 1C91.3425 1 77.8188 3.69004 65.2009 8.91653C52.5831 14.143 41.1182 21.8036 31.4609 31.4609C21.8036 41.1182 14.143 52.5831 8.91653 65.2009C3.69004 77.8188 0.999999 91.3425 1 105L209 105Z"
                                        stroke="currentColor" stroke-width="2" />
                                </svg>

                                <blockquote class="blockquote font-serif fs-1 lh-sm mb-4 mb-lg-5">
                                    <p>" Great things in business are never done by one person. "</p>
                                </blockquote>
                                <figcaption class="blockquote-footer mb-0">
                                    Steve Jobs
                                </figcaption>
                            </figure>
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
