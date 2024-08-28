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
                                                <li class="breadcrumb-item active" aria-current="page">Avatar</li>
                                            </ol>
                                        </div>
                                    </nav>
                                    <h1 class="mb-0 display-4">
                                        Avatars
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
                        <div class="col-md-10 mx-auto">
                            <div class="d-flex align-items-center justify-content-center mb-4 pt-4">
                                <h6 class="mb-0 me-2 me-lg-4">Avatar sizing</h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>
                            <div class="d-flex flex-wrap align-items-center">
                                <!--xs-->
                                <div class="avatar-item me-2 mb-2">
                                    <img src="{{ URL::asset('assets/img/avatar/1.jpg') }}" alt="" class="avatar rounded-circle xs">
                                </div>

                                <!--sm-->
                                <div class="avatar-item me-2 mb-2">
                                    <img src="{{ URL::asset('assets/img/avatar/2.jpg') }}" alt="" class="avatar rounded-circle sm">
                                </div>

                                <!--default-->
                                <div class="avatar-item me-2 mb-2">
                                    <img src="{{ URL::asset('assets/img/avatar/3.jpg') }}" alt="" class="avatar rounded-circle">
                                </div>

                                <!--lg-->
                                <div class="avatar-item me-2 mb-2">
                                    <img src="{{ URL::asset('assets/img/avatar/4.jpg') }}" alt="" class="avatar rounded-circle lg">
                                </div>

                                <!--xl-->
                                <div class="avatar-item me-2 mb-2">
                                    <img src="{{ URL::asset('assets/img/avatar/5.jpg') }}" alt="" class="avatar rounded-circle xl">
                                </div>
                            </div>
                            <!--///////////CODE SNIPPET-->
                            <div class="position-relative mb-5">
                                <!--Copy clipboard button-->
                                <button
                                    class="btn btn-sm position-absolute rounded-0 end-0 top-0 z-1 mt-2 me-2 btn-primary copy-link"
                                    data-clipboard-target="#copyAvatarSize" data-clipboard-action="copy"
                                    id="copyAvatarSize-1">Copy code</button>
                                <pre id="copyAvatarSize" class="language-markup bg-secondary text-white-50 mt-0" data-lang="html">
 <code>
    &lt;!--xs-->
    &lt;div class="avatar-item me-2 mb-2">
        &lt;img src="{{ URL::asset('assets/img/avatar/1.jpg') }}" alt="" class="avatar rounded-circle xs">
    &lt;/div>
    
     &lt;!--sm-->
    &lt;div class="avatar-item me-2 mb-2">
        &lt;img src="{{ URL::asset('assets/img/avatar/2.jpg') }}" alt="" class="avatar rounded-circle sm">
    &lt;/div>
    
     &lt;!--default-->
    &lt;div class="avatar-item me-2 mb-2">
        &lt;img src="{{ URL::asset('assets/img/avatar/3.jpg') }}" alt="" class="avatar rounded-circle">
    &lt;/div>
    
     &lt;!--lg-->
    &lt;div class="avatar-item me-2 mb-2">
        &lt;img src="{{ URL::asset('assets/img/avatar/4.jpg') }}" alt="" class="avatar rounded-circle lg">
    &lt;/div>
    
     &lt;!--xl-->
    &lt;div class="avatar-item me-2 mb-2">
        &lt;img src="{{ URL::asset('assets/img/avatar/5.jpg') }}" alt="" class="avatar rounded-circle xl">
    &lt;/div>
 </code>
</pre>
                            </div>
                            <!--///////////CODE SNIPPET END-->
                            <hr class="my-7">
                            <div class="d-flex align-items-center justify-content-center mb-4 pt-4">
                                <h6 class="mb-0 me-2 me-lg-4">Initials</h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>
                            <div class="d-flex mb-4 flex-wrap align-items-center">
                                <div class="avatar rounded-circle bg-primary text-white flex-center">
                                    JD
                                </div>
                            </div>
                            <!--///////////CODE SNIPPET-->
                            <div class="position-relative mb-5">
                                <!--Copy clipboard button-->
                                <button
                                    class="btn btn-sm position-absolute rounded-0 end-0 top-0 z-1 mt-2 me-2 btn-primary copy-link"
                                    data-clipboard-target="#copyAvatarInitial" data-clipboard-action="copy"
                                    id="copyAvatarInitial-2">Copy code</button>
                                <pre id="copyAvatarInitial" class="language-markup bg-secondary text-white-50 mt-0" data-lang="html">
<code>
    &lt;!--Update the size using xs,sm,lg,xl utility classes-->
    &lt;div class="avatar rounded-circle bg-primary text-white flex-center">
        JD
    &lt;/div>
</code>
</pre>
                            </div>
                            <!--///////////CODE SNIPPET END-->
                            <hr class="my-7">
                            <div class="d-flex align-items-center justify-content-center mb-4 pt-4">
                                <h6 class="mb-0 me-2 me-lg-4">Status</h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>
                            <div class="d-flex flex-wrap mb-4 align-items-center">

                                <!--Offline-->
                                <div class="avatar-status lg off rounded-pill flex-center me-2 mb-2">
                                    <img src="{{ URL::asset('assets/img/avatar/4.jpg') }}" alt="" class="avatar">
                                </div>

                                <!--Online-->
                                <div class="avatar-status lg on rounded-pill flex-center me-2 mb-2">
                                    <img src="{{ URL::asset('assets/img/avatar/4.jpg') }}" alt="" class="avatar">
                                </div>

                                <!--Away-->
                                <div class="avatar-status lg away rounded-pill flex-center me-2 mb-2">
                                    <img src="{{ URL::asset('assets/img/avatar/4.jpg') }}" alt="" class="avatar">
                                </div>

                                <!--Do not dusturb-->
                                <div class="avatar-status lg dnd rounded-pill flex-center me-2 mb-2">
                                    <img src="{{ URL::asset('assets/img/avatar/4.jpg') }}" alt="" class="avatar">
                                </div>
                            </div>
                            <!--///////////CODE SNIPPET-->
                            <div class="position-relative mb-5">
                                <!--Copy clipboard button-->
                                <button
                                    class="btn btn-sm position-absolute rounded-0 end-0 top-0 z-1 mt-2 me-2 btn-primary copy-link"
                                    data-clipboard-target="#copyAvatarStatus" data-clipboard-action="copy"
                                    id="copyAvatarStatus-3">Copy code</button>
                                <pre id="copyAvatarStatus" class="language-markup bg-secondary text-white-50 mt-0" data-lang="html">
<code>
    &lt;!--Offline-->
    &lt;div class="avatar-status lg off rounded-pill flex-center me-2 mb-2">
       &lt;img src="{{ URL::asset('assets/img/avatar/4.jpg') }}" alt="" class="avatar">
   &lt;/div>
   
   &lt;!--Online-->
   &lt;div class="avatar-status lg on rounded-pill flex-center me-2 mb-2">
       &lt;img src="{{ URL::asset('assets/img/avatar/4.jpg') }}" alt="" class="avatar">
   &lt;/div>
   
   &lt;!--Away-->
   &lt;div class="avatar-status lg away rounded-pill flex-center me-2 mb-2">
       &lt;img src="{{ URL::asset('assets/img/avatar/4.jpg') }}" alt="" class="avatar">
   &lt;/div>
   
   &lt;!--Do not dusturb-->
   &lt;div class="avatar-status lg dnd rounded-pill flex-center me-2 mb-2">
       &lt;img src="{{ URL::asset('assets/img/avatar/4.jpg') }}" alt="" class="avatar">
   &lt;/div>
</code>
</pre>
                            </div>
                            <!--///////////CODE SNIPPET END-->
                            <hr class="my-7">
                            <div class="d-flex align-items-center justify-content-center mb-4 pt-4">
                                <h6 class="mb-0 me-2 me-lg-4">Group</h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>
                            <!--Avatar group default-->
                            <div class="avatar-group mb-4">

                                 <!--Avatar group item-->
                                <div
                                    class="avatar-group-item avatar rounded-circle overflow-hidden shadow">
                                    <img src="{{ URL::asset('assets/img/avatar/1.jpg') }}" alt="" class="img-fluid avatar">
                                </div>

                                 <!--Avatar group item-->
                                <div
                                    class="avatar-group-item avatar rounded-circle overflow-hidden shadow">
                                    <img src="{{ URL::asset('assets/img/avatar/11.jpg') }}" alt="" class="img-fluid avatar">
                                </div>

                                 <!--Avatar group item-->
                                <div
                                    class="avatar-group-item avatar rounded-circle overflow-hidden shadow">
                                    <img src="{{ URL::asset('assets/img/avatar/12.jpg') }}" alt="" class="img-fluid avatar">
                                </div>

                                 <!--Avatar group item-->
                                <div
                                    class="avatar-group-item avatar fs-5 bg-secondary text-white shadow flex-center rounded-circle overflow-hidden">
                                    <i class="bx bx-plus"></i>
                                </div>
                            </div>
                                <!--///////////CODE SNIPPET-->
                                <div class="position-relative mb-5">
                                    <!--Copy clipboard button-->
                                    <button
                                        class="btn btn-sm position-absolute rounded-0 end-0 top-0 z-1 mt-2 me-2 btn-primary copy-link"
                                        data-clipboard-target="#copyAvatarGroup" data-clipboard-action="copy"
                                        id="copyAvatarGroup-4">Copy code</button>
<pre id="copyAvatarGroup" class="language-markup bg-secondary text-white-50 mt-0" data-lang="html">
<code>
        &lt;!--Avatar group default-->
        &lt;div class="avatar-group">
            &lt;!--Avatar group item-->
           &lt;div class="avatar-group-item avatar rounded-circle overflow-hidden shadow">
               &lt;img src="{{ URL::asset('assets/img/avatar/1.jpg') }}" alt="" class="img-fluid avatar">
           &lt;/div>
        
            &lt;!--Avatar group item-->
           &lt;div class="avatar-group-item avatar rounded-circle overflow-hidden shadow">
               &lt;img src="{{ URL::asset('assets/img/avatar/11.jpg') }}" alt="" class="img-fluid avatar">
           &lt;/div>
        
            &lt;!--Avatar group item-->
           &lt;div class="avatar-group-item avatar rounded-circle overflow-hidden shadow">
               &lt;img src="{{ URL::asset('assets/img/avatar/12.jpg') }}" alt="" class="img-fluid avatar">
           &lt;/div>
        
            &lt;!--Avatar group item-->
           &lt;div class="avatar-group-item avatar fs-5 bg-secondary text-white shadow flex-center rounded-circle overflow-hidden">
               &lt;i class="bx bx-plus">&lt;/i>
           &lt;/div>
        &lt;/div>
</code>
</pre>
                                </div>
                                <!--///////////CODE SNIPPET END-->
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
