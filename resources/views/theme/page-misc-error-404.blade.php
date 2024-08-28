<x-assan-layout layout-type="{{$layoutType}}">
           <section class="position-relative overflow-hidden">
               <div class="container pt-14 pt-lg-15 pb-9">
                   <div class="row">
                       <div class="col-md-10 col-lg-8 mx-auto text-center position-relative">
                           
                           <div class=" position-relative z-1">
                                
                            <div class="text-danger mb-5">
                              <img src="{{ URL::asset('assets/img/graphics/illustration/404.svg') }}" class="width-18x mx-auto" alt="">
                            </div>
                               <h1 class="display-1 mb-2">404</h1>
                               <h2 class="mb-4">Oops! Page not found</h2>
                               <p class="w-lg-75 lead mx-auto mb-5">
                                This is a completely custom 404 error page. It seems that page you are looking for no
                                longer exists.
                            </p>
                            <a href="{{ URL::asset('index.html') }}" class="fw-semibold">
                                <i class="bx bx-left-arrow-alt lh-1 fw-normal me-2"></i>Back to Home</a>
                            </div>
                       </div>
                   </div>
               </div>
           </section>
</x-assan-layout>
