<x-assan-layout layout-type="{{$layoutType}}">
         <section class="position-relative">
             <div class="container pt-14 pb-9 pb-lg-11">
                 <div class="row pt-lg-7 justify-content-center text-center">
                     <div class="col-xl-8">
                        <div class="width-10x height-10x rounded-circle position-relative bg-success text-white flex-center mb-4">
                            <i class="bx bx-check lh-1 display-4 fw-normal"></i>
                        </div>
                        <h1 class="display-2 mb-3">
                            Thanks for your message!
                        </h1>
                        <p class="mb-5 lead mx-auto">
                            We’ve just received your message and will be contacting you as soon as possible. In the meantime you can explore our recent projects.
                        </p>
                        <a href="{{ URL::asset('index.html') }}" class="btn btn-outline-primary btn-lg px-4 px-lg-5">
                            Explore case studies</a>
            
                     </div>
                 </div>
             </div>
         </section>
            <section>
                <div class="container pb-9 pb-lg-11">
                    <div
                        class="px-4 rounded-3 shadow-lg py-6 px-lg-5 py-lg-7 bg-gradient-primary text-white position-relative overflow-hidden" data-aos="fade-up" data-aos-duration="400" >
                        <svg class="position-absolute end-0 bottom-0 mb-4 text-white opacity-25" width="200"
                        height="400" preserveAspectRatio="none" viewBox="0 0 150 300" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M150 300C130.302 300 110.796 296.12 92.5975 288.582C74.3986 281.044 57.8628 269.995 43.934 256.066C30.0052 242.137 18.9563 225.601 11.4181 207.403C3.87986 189.204 -6.2614e-07 169.698 0 150C6.2614e-07 130.302 3.87987 110.796 11.4181 92.5975C18.9563 74.3987 30.0052 57.8628 43.934 43.934C57.8628 30.0052 74.3987 18.9563 92.5975 11.4181C110.796 3.87986 130.302 3.51961e-06 150 5.00679e-06L150 37.5C135.226 37.5 120.597 40.4099 106.948 46.0636C93.299 51.7172 80.8971 60.0039 70.4505 70.4505C60.0039 80.8971 51.7172 93.299 46.0636 106.948C40.4099 120.597 37.5 135.226 37.5 150C37.5 164.774 40.4099 179.403 46.0636 193.052C51.7172 206.701 60.0039 219.103 70.4505 229.55C80.8971 239.996 93.299 248.283 106.948 253.936C120.597 259.59 135.226 262.5 150 262.5V300Z" fill="currentColor"/>
                            </svg>
                            
                        <div class="row align-items-end position-relative">
                            <div class="col-lg-6 col-xl-7">
                                <h5 class="text-white-50 mb-4">Let's start building</h5>
                                <h1 class="mb-5 mb-md-0 display-6">Stunning websites ease</h1>
                            </div>
                            <div class="col-lg-6 col-xl-5 text-lg-end">
                                <a href="{{ URL::asset('#!') }}" class="btn btn-outline-white btn-lg rounded-3 me-2 mb-2 mb-lg-0">Contact sales</a>
                                <a href="{{ URL::asset('#!') }}" class="btn btn-white btn-lg rounded-3">Purchase Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
</x-assan-layout>
