<x-assan-layout layout-type="{{$layoutType}}">
            <section class="position-relative bg-gradient-primary text-white">
                <div class="container py-9">
             <div class="row pt-9 pt-lg-12">
                 <div class="col-lg-8">
                     <h1>Layout - Sidebar Sticky</h1>
                     <nav aria-label="breadcrumb">
                         <ol class="breadcrumb mb-0">
                             <li class="breadcrumb-item"><a href="{{ URL::asset('#') }}">Home</a></li>
                             <li class="breadcrumb-item"><a href="{{ URL::asset('#') }}">Features</a></li>
                             <li class="breadcrumb-item active" aria-current="page">Layout - Sidebar sticky</li>
                         </ol>
                     </nav>
                 </div>
             </div>    
             </div>
            </section>
            <section class="position-relative border-bottom">
             <div class="container py-9 py-lg-11">
                 <div class="row">
 
                     <!--Sidebar-->
                     <div class="col-lg-3 mb-9 mb-lg-0">
                        
                         <!--Sidebar sticky elements-->
                         <div class="position-sticky top-0 pt-lg-5">
                            <!--widget-->
                         <div class="sidebar-widget">
                            <div class="d-flex align-items-center mb-4">
                                <h5 class="mb-0 me-3">Newsletter</h5>
                                <span class="flex-grow-1 pt-1 bg-body-tertiary"></span>
                            </div>
                            <form>
                                <div class="mb-3">
                                    <input type="email" name="email" class="mb-2 form-control" placeholder="Email Address" required="">
                                   <div class="d-grid">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Subscribe
                                    </button>
                                   </div>
                                </div>
                                <p class="small text-body-secondary mb-0">
                                    We’ll never share your details.
                                    View our <a href="{{ URL::asset('#!') }}">Privacy Policy</a> for more info.
                                </p>
                            </form>
                        </div>
                        <!--widget-->
                        <div class="sidebar-widget pt-5">
                            <div class="d-flex align-items-center mb-4">
                                <h5 class="mb-0 me-3">Popular articles</h5>
                                <span class="flex-grow-1 pt-1 bg-body-tertiary"></span>
                            </div>

                            <a href="{{ URL::asset('#!') }}" class="p-3 hover-lift hover-shadow rounded-3 border mb-3 d-block position-relative">
                                <div class="d-flex justify-content-start w-100 mb-2 align-items-center">
                                    <span class="d-block border border-4 rounded-circle border-success me-2"></span>
                                    <small class="text-body-secondary">UI UX</small>
                                </div>
                                <p class="text-reset lh-sm mb-0">
                                    Lorem enim ad minim veniam, quis nostrud exercitation
                                </p>
                                <small class="text-body-secondary">
                                </small>
                            </a>
                            <a href="{{ URL::asset('#!') }}" class="p-3 hover-lift hover-shadow rounded-3 border mb-3 d-block position-relative">
                                <div class="d-flex justify-content-start w-100 mb-2 align-items-center">
                                    <span class="d-block border border-4 rounded-circle border-primary me-2"></span>
                                    <small class="text-body-secondary">Business</small>
                                </div>
                                <p class="text-reset lh-sm mb-0">
                                    Lorem enim ad minim veniam, quis nostrud exercitation
                                </p>
                                <small class="text-body-secondary">
                                </small>
                            </a>
                            <a href="{{ URL::asset('#!') }}" class="p-3 hover-lift hover-shadow rounded-3 border mb-3 d-block position-relative">
                                <div class="d-flex justify-content-start w-100 mb-2 align-items-center">
                                    <span class="d-block border border-4 rounded-circle border-warning me-2"></span>
                                    <small class="text-body-secondary">Community</small>
                                </div>
                                <p class="text-reset lh-sm mb-0">
                                    Lorem enim ad minim veniam, quis nostrud exercitation
                                </p>
                                <small class="text-body-secondary">
                                </small>
                            </a>
                        </div>
                        <!--Sidebar sticky elements-->
                        <div class="position-sticky top-0 pt-5">
                            <!--widget-->
                        <div class="sidebar-widget">
                            <div class="d-flex align-items-center mb-4">
                                <h5 class="mb-0 me-3">Categories</h5>
                                <span class="flex-grow-1 pt-1 bg-body-tertiary"></span>
                            </div>
                            <div class="d-flex flex-wrap gap-2">
                               <a href="{{ URL::asset('#!') }}" class="badge bg-secondary-subtle border border-secondary-subtle text-body fw-medium hover-shadow">
                                   Javascript
                               </a>
                               <a href="{{ URL::asset('#!') }}" class="badge bg-secondary-subtle border border-secondary-subtle text-body fw-medium hover-shadow">
                                   Bootstrap
                               </a>
                               <a href="{{ URL::asset('#!') }}" class="badge bg-secondary-subtle border border-secondary-subtle text-body fw-medium hover-shadow">
                                   Gsap
                               </a>
                               <a href="{{ URL::asset('#!') }}" class="badge bg-secondary-subtle border border-secondary-subtle text-body fw-medium hover-shadow">
                                   Design
                               </a>
                               <a href="{{ URL::asset('#!') }}" class="badge bg-secondary-subtle border border-secondary-subtle text-body fw-medium hover-shadow">
                                   Business
                               </a>
                               <a href="{{ URL::asset('#!') }}" class="badge bg-secondary-subtle border border-secondary-subtle text-body fw-medium hover-shadow">
                                   UI UX
                               </a>
                               <a href="{{ URL::asset('#!') }}" class="badge bg-secondary-subtle border border-secondary-subtle text-body fw-medium hover-shadow">
                                   Code
                               </a>
                               <a href="{{ URL::asset('#!') }}" class="badge bg-secondary-subtle border border-secondary-subtle text-body fw-medium hover-shadow">
                                   Community
                               </a>
                            </div>
                        </div>
                        <!--widget-->
                        <div class="sidebar-widget pt-5">
                            <a href="{{ URL::asset('#') }}" class="bg-body-secondary rounded p-4 d-flex align-items-center justify-content-center min-height-2x">
                                <span class="text-small text-body-secondary">Advertisement</span>
                            </a>
                        </div>
                        </div>
                         </div>
                     </div>
                     <div class="col-lg-9">
                         <div class="row mb-5">
                             <div class="col-md-4 mb-5 mb-md-0">
                                <img src="{{ URL::asset('assets/img/960x640/2.jpg') }}" class="img-fluid rounded-3" alt="">
                             </div>
                             <div class="col-md-8 mx-auto">
                               <h5></h5>
                               <p class="lead">
                                Exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                               </p>
                               <p class="lead">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod <mark class="highlight">tempor incididunt ut</mark> labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                               </p>
                             </div>
                         </div>
                         
                      
                         <div class="row">
                           
                             <div class="col-md-12">
                                 <div>
                                     <img src="{{ URL::asset('assets/img/1200x600/1.jpg') }}" class="img-fluid mb-7 rounded-3" alt="">
                                 </div>  
                                 <p class="mb-5 lead">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Turpis in eu mi bibendum neque egestas. Vitae tempus quam pellentesque nec nam aliquam sem et tortor. Eu volutpat odio facilisis mauris sit amet massa. Sagittis eu volutpat odio facilisis mauris sit amet massa. Dui nunc mattis enim ut tellus elementum sagittis vitae et. Condimentum mattis pellentesque id nibh tortor id aliquet. Sit amet luctus venenatis lectus magna fringilla urna porttitor rhoncus. Pellentesque nec nam aliquam sem et tortor consequat id. Dui id ornare arcu odio ut sem. Erat nam at lectus urna duis convallis. Dui nunc mattis enim ut tellus elementum sagittis. Magna etiam tempor orci eu lobortis elementum nibh tellus molestie.
                
                                    Etiam dignissim diam quis enim lobortis scelerisque fermentum dui. Felis eget velit aliquet sagittis id. <span class="text-decoration-underline text-primary">Tempus egestas</span> sed sed risus pretium quam vulputate dignissim suspendisse. Parturient montes nascetur ridiculus mus mauris. Vulputate enim nulla aliquet porttitor lacus luctus. Eu consequat ac felis donec et. Aliquet nibh praesent tristique magna sit amet purus. Justo eget magna fermentum iaculis eu. Non blandit massa enim nec dui nunc mattis. Est ullamcorper eget nulla facilisi etiam dignissim diam quis enim. Adipiscing elit duis tristique sollicitudin nibh sit amet commodo. Lacus sed viverra tellus in hac habitasse platea. Non consectetur a erat nam at lectus urna duis. Neque viverra justo nec ultrices. Turpis in eu mi bibendum neque egestas congue quisque. Varius sit amet mattis vulputate. Enim nunc faucibus a pellentesque sit amet porttitor eget dolor. Odio ut enim blandit volutpat maecenas volutpat blandit. Nulla pellentesque dignissim enim sit amet.
                                    
                                    Faucibus pulvinar elementum <mark class="highlight">integer enim neque</mark> volutpat. Faucibus scelerisque eleifend donec pretium. <mark class="highlight">Pellentesque</mark> pulvinar pellentesque habitant morbi tristique. Id neque aliquam vestibulum morbi blandit cursus risus. Massa sapien faucibus et molestie ac. Elementum nibh tellus molestie nunc non. Amet nulla facilisi morbi tempus iaculis urna. Amet porttitor eget dolor morbi non arcu risus quis varius. In dictum non consectetur a erat. Viverra nibh cras pulvinar mattis nunc sed blandit libero. Egestas purus viverra accumsan in nisl nisi scelerisque eu. Ut venenatis tellus in metus vulputate eu scelerisque felis imperdiet. Morbi enim nunc faucibus a pellentesque sit amet. Ut pharetra sit amet aliquam id. Sit amet venenatis urna cursus eget nunc scelerisque viverra mauris.
                                    
                                    Pretium aenean pharetra magna ac placerat vestibulum lectus mauris ultrices. Sit amet luctus venenatis lectus magna fringilla urna porttitor rhoncus. Cras sed felis eget velit aliquet. Nulla aliquet enim tortor at auctor urna nunc id cursus. Tellus molestie nunc non blandit massa enim nec. Blandit aliquam etiam erat velit scelerisque in dictum non. Vulputate enim nulla aliquet porttitor lacus. Metus vulputate eu scelerisque felis imperdiet proin fermentum leo. Purus gravida quis blandit turpis cursus in hac habitasse platea. Eu tincidunt tortor aliquam nulla facilisi cras fermentum odio eu. Id consectetur purus ut faucibus pulvinar elementum integer. Blandit turpis cursus in hac habitasse platea dictumst quisque sagittis. Habitasse platea dictumst vestibulum rhoncus est pellentesque elit. Neque convallis a cras semper auctor neque vitae. Elementum nisi quis eleifend quam.
                                    
                                    Nibh ipsum consequat nisl vel. Erat velit scelerisque in dictum non. Auctor urna nunc id cursus metus aliquam eleifend mi. Posuere ac ut consequat semper. Dolor sit amet consectetur adipiscing elit ut aliquam purus. Morbi tristique senectus et netus. Sapien pellentesque habitant morbi tristique senectus et netus et. Turpis tincidunt id aliquet risus feugiat in. Massa massa ultricies mi quis. Eu tincidunt tortor aliquam nulla facilisi cras. Ipsum suspendisse ultrices gravida dictum fusce ut placerat orci nulla. Eget nulla facilisi etiam dignissim diam quis enim. Sapien faucibus et molestie ac feugiat. Tempor id eu nisl nunc mi ipsum. Tincidunt augue interdum velit euismod in pellentesque. Metus aliquam eleifend mi in nulla posuere sollicitudin aliquam. Egestas congue quisque egestas diam in arcu cursus euismod. Gravida arcu ac tortor dignissim convallis aenean et.
                                 </p>
                                 <h5 class="mb-3">Amazing design layouts with great use of animations</h5>
                                 <p class="mb-5 lead">
                                    Lorem ipsum dolor sit amet sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Turpis in eu mi bibendum neque egestas. Vitae tempus quam pellentesque nec nam aliquam sem et tortor. Eu volutpat odio facilisis mauris sit amet massa. Sagittis eu volutpat odio facilisis mauris sit amet massa. Dui nunc mattis enim ut tellus elementum sagittis vitae et. Condimentum mattis pellentesque id nibh tortor id aliquet. Sit amet luctus venenatis lectus magna fringilla urna porttitor rhoncus. Pellentesque nec nam aliquam sem et tortor consequat id. Dui id ornare arcu odio ut sem. Erat nam at lectus urna duis convallis. Dui nunc mattis enim ut tellus elementum sagittis. Magna etiam tempor orci eu lobortis elementum nibh tellus molestie.
                                 </p>
                                 <h5 class="mb-3">Amazing design layouts with great use of animations</h5>
                                 <p class="mb-0 lead">
                                    Lorem ipsum dolor sit amet, eiusmod tempor incididunt ut labore et dolore magna aliqua  <mark class="highlight">Bibend umneque egestas</mark> Vitae tempus quam pellentesque nec nam aliquam sem et tortor. Eu volutpat odio facilisis mauris sit amet massa. Sagittis eu volutpat odio facilisis mauris sit amet massa. Dui nunc mattis enim ut tellus elementum sagittis vitae et. Condimentum mattis pellentesque id nibh tortor id aliquet. Sit amet luctus venenatis lectus magna fringilla urna porttitor rhoncus. Pellentesque nec nam aliquam sem et tortor consequat id. Dui id ornare arcu odio ut sem. Erat nam at lectus urna duis convallis. Dui nunc mattis enim ut tellus elementum sagittis. Magna etiam tempor orci eu lobortis elementum nibh tellus molestie.
                                 </p>
                             </div>
                            <p class="lead mb-0">
                             Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Semper eget duis at tellus at urna condimentum mattis. Lacus laoreet non curabitur gravida arcu ac. Sagittis vitae et leo duis ut diam quam nulla porttitor. Viverra maecenas accumsan lacus vel facilisis volutpat. Nulla facilisi etiam dignissim diam quis enim lobortis scelerisque. Magna eget est lorem ipsum dolor sit amet consectetur. Fames ac turpis egestas maecenas pharetra convallis posuere morbi. Diam sit amet nisl suscipit. Dignissim convallis aenean et tortor at risus. Malesuada nunc vel risus commodo viverra maecenas accumsan. At erat pellentesque adipiscing commodo elit at imperdiet. Adipiscing elit duis tristique sollicitudin nibh sit amet commodo nulla. Tincidunt tortor aliquam nulla facilisi cras fermentum odio eu feugiat. Pulvinar sapien et ligula ullamcorper. Condimentum lacinia quis vel eros donec ac. Pellentesque dignissim enim sit amet. In nibh mauris cursus mattis molestie a iaculis at erat. Id porta nibh venenatis cras sed.
                         </p>
                         </div>  
                     </div>
                 </div>
          </div>
         </section>
</x-assan-layout>
