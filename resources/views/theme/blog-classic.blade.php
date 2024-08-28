<x-assan-layout layout-type="{{$layoutType}}">
            <section class="bg-primary-subtle">
                <div class="container pt-14 pb-9 pb-lg-12">
                    <div class="row pt-lg-7">
                        <div class="col-md-10 col-lg-8">
                            <ol class="breadcrumb mb-3">
                                <li class="breadcrumb-item"><a href="{{ URL::asset('#') }}">Home</a></li>
                                <li class="breadcrumb-item active">Blog</li>
                                <li class="breadcrumb-item active" aria-current="page">Classic</li>
                            </ol>
                            <h1 class="mb-0 display-4">Insights, thoughts & announcements from us</h1>
                        </div>
                    </div>
                </div>
            </section>
            <section class="position-relative">
                <div class="container z-1 position-relative py-9 py-lg-11">
                    <article
                        class="row g-0 mb-4 mb-lg-5 position-relative overflow-hidden hover-lift hover-shadow-lg border rounded-5 card-hover shadow-sm align-items-center">
                        <div class="col-md-6 col-lg-5 p-0 p-lg-0">
                            <div class="overflow-hidden">
                                <img src="{{ URL::asset('assets/img/960x900/1.jpg') }}" alt="" class="img-fluid img-zoom">
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-7">
                            <div class="position-relative p-4 p-lg-5">
                                <div class="d-flex justify-content-start w-100 pb-3 align-items-center">
                                    <small class="text-body-secondary">: Business</small>
                                </div>
                                <div>
                                    <h2 class="mb-4">
                                        How I Build a Personal Website With Monetization (And Without Coding)
                                    </h2>
                                    <div class="d-flex mb-0 align-items-center pt-4">
                                        <div class="position-relative me-2">
                                            <!--Avatar Image-->
                                            <img class="position-relative avatar sm rounded-circle"
                                                src="{{ URL::asset('assets/img/team/3.jpg') }}" alt="">
                                        </div>
                                        <span class="text-body-secondary d-inline-block small">By <a href="{{ URL::asset('#!') }}"
                                                >Jacob</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ URL::asset('#') }}" class="stretched-link"></a>
                    </article>
                    <!--/.article-->
                    <article 
                        class="row g-0 mb-4 mb-lg-5 hover-lift position-relative overflow-hidden hover-shadow-lg border rounded-5 card-hover shadow-sm align-items-center">
                        <div class="col-md-6 col-lg-5 mb-md-0 p-0">
                            <div class="overflow-hidden">
                                <img src="{{ URL::asset('assets/img/960x900/2.jpg') }}" alt="" class="img-fluid img-zoom">
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-7">
                            <div class="position-relative p-4 p-lg-5">
                                <div class="d-flex justify-content-start w-100 pb-3 align-items-center">
                                    <small class="text-body-secondary">: Tech</small>
                                </div>
                                <div>
                                    <h2 class="mb-4">
                                        How We Used Humor to Differentiate Our SaaS Landing Page
                                    </h2>
                                    <div class="d-flex mb-0 align-items-center pt-4">
                                        <div class="position-relative me-2">
                                            <!--Avatar Image-->
                                            <img class="position-relative avatar sm rounded-circle"
                                                src="{{ URL::asset('assets/img/team/4.jpg') }}" alt="">
                                        </div>
                                        <span class="text-body-secondary d-inline-block small">By <a href="{{ URL::asset('#!') }}"
                                                >Natasha</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ URL::asset('#') }}" class="stretched-link"></a>
                    </article>
                    <!--/.article-->
                    <article class="row g-0 mb-4 mb-lg-5 hover-lift position-relative overflow-hidden hover-shadow-lg border rounded-5 card-hover shadow-sm align-items-center">
                        <div class="col-md-6 col-lg-5 p-0">
                            <div class="overflow-hidden">
                                <img src="{{ URL::asset('assets/img/960x900/3.jpg') }}" alt="" class="img-fluid img-zoom">
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-7">
                            <div class="position-relative p-4 p-lg-5">
                                <div class="d-flex justify-content-start w-100 pb-3 align-items-center">

                                    <small class="text-body-secondary">: Design</small>
                                </div>
                                <div>
                                    <h2 class="mb-4">
                                        Introduction to Docker Management with Visual Studio Code
                                    </h2>
                                    <div class="d-flex mb-0 align-items-center pt-4">
                                        <div class="position-relative me-2">
                                            <!--Avatar Image-->
                                            <img class="position-relative avatar sm rounded-circle"
                                                src="{{ URL::asset('assets/img/team/6.jpg') }}" alt="">
                                        </div>
                                        <span class="text-body-secondary d-inline-block small">By <a href="{{ URL::asset('#!') }}"
                                                >Sarah</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ URL::asset('#') }}" class="stretched-link"></a>
                    </article>
                    <!--/.article-->
                    <nav aria-label="Page navigation example" class="d-flex justify-content-end" data-aos="fade-up">
                        <ul class="pagination">
                            <li class="page-item disabled"><a class="page-link" href="{{ URL::asset('#') }}">Previous</a></li>
                            <li class="page-item active"><a class="page-link" href="{{ URL::asset('#') }}">1</a></li>
                            <li class="page-item"><a class="page-link" href="{{ URL::asset('#') }}">2</a></li>
                            <li class="page-item"><a class="page-link" href="{{ URL::asset('#') }}">3</a></li>
                            <li class="page-item"><a class="page-link" href="{{ URL::asset('#') }}">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </section>
            <!--/.Article header-end-->
            <!--/.content section/-->
            <section class="position-relative">
                <div class="container position-relative">
                    <div
                        class="px-4 px-lg-7 py-7 py-lg-9 bg-gradient-primary rounded-5 text-white overflow-hidden position-relative">
                        <svg class="position-absolute end-0 bottom-0 text-warning w-75 h-auto w-lg-75" width="197"
                            height="99" viewBox="0 0 197 99" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M280 141C280 122.615 276.392 104.41 269.381 87.4243C262.371 70.4387 252.095 55.0052 239.141 42.005C226.188 29.0048 210.809 18.6925 193.884 11.6569C176.959 4.6212 158.819 0.999999 140.5 1C122.181 1 104.041 4.62121 87.1157 11.6569C70.1907 18.6925 54.8124 29.0049 41.8586 42.0051C28.9048 55.0053 18.6293 70.4387 11.6188 87.4243C4.60827 104.41 0.999998 122.615 1 141L280 141Z"
                                class="stroke-white" stroke-opacity=".2" stroke-width="1.5" />
                            <path
                                d="M384 151C384 132.615 380.392 114.41 373.381 97.4243C366.371 80.4387 356.095 65.0052 343.141 52.005C330.188 39.0048 314.809 28.6925 297.884 21.6569C280.959 14.6212 262.819 11 244.5 11C226.181 11 208.041 14.6212 191.116 21.6569C174.191 28.6925 158.812 39.0049 145.859 52.0051C132.905 65.0053 122.629 80.4387 115.619 97.4243C108.608 114.41 105 132.615 105 151L384 151Z"
                                class="stroke-white" stroke-opacity=".2" stroke-width="1.5" />
                        </svg>

                        <div class="position-relative">
                            <h3 class="display-6 mb-5" data-aos="fade-up">Get stories direct to your inbox</h3>
                            <form data-aos="fade-up" data-aos-delay="100">
                                <div
                                    class="d-sm-flex w-md-80 w-lg-75 flex-column flex-sm-row mb-4 justify-content-center">
                                    <input type="email" name="email"
                                        class="me-sm-1 mb-2 mb-sm-0 form-control bg-dark bg-opacity-25 text-white shadow-none form-control-lg border-0"
                                        placeholder="Email Address" required="">
                                    <button type="submit" class="ms-sm-1 btn btn-primary btn-lg">
                                        <span>Subscribe</span>
                                    </button>
                                </div>
                            </form>

                            <p class="small mb-0" data-aos="fade-up" data-aos-delay="150">
                                We’ll never share your details.
                                View our <a href="{{ URL::asset('#!') }}" class="link-hover-underline">Privacy Policy</a> for more info.
                            </p>
                        </div>
                    </div>
                </div>
            </section>
</x-assan-layout>
