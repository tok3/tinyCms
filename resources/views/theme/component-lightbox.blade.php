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
                                                <li class="breadcrumb-item active" aria-current="page">Lightbox</li>
                                            </ol>
                                        </div>
                                    </nav>
                                    <h1 class="mb-0 display-4">
                                        Lightbox
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="postition-relative">
                <div class="container py-9 py-lg-11 position-relative z-1">
                    <div class="alert mb-5 alert-info">
                        Don't forget to include <strong>assets/vendors/node_modules/css/glightbox.min.css</strong> in head of HTML File
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h5 class="mb-4">Single images lightbox</h5>
                            <!-- Lightbox Image -->
                            <a href="{{ URL::asset('assets/img/960x900/3.jpg') }}" class="glightbox3" data-glightbox data-gallery="gallery0">
                                <img src="{{ URL::asset('assets/img/960x900/3.jpg') }}" class="width-14x h-auto" alt="image" />
                            </a>
                        </div>
                    </div>
                    <!--//////////COPY TO CLIPBOARD SNIPPETS-->
                    <div class="position-relative" style="max-height: 80vh; overflow-y: auto;">
                        <button
                            class="btn btn-sm position-absolute end-0 top-0 me-3 mt-3 z-1 btn-primary copy-link"
                            data-clipboard-target="#copySingleImage1" data-clipboard-action="copy"
                            id="copySingleImage1-1">Copy code</button>
                        <pre id="copySingleImage1" class="language-markup bg-secondary text-white-50 mt-0" data-lang="html">
<code>
&lt;!-- Single image lightbox -->
&lt;a href="{{ URL::asset('assets/img/960x900/3.jpg') }}" class="glightbox3" data-glightbox data-gallery="gallery0">
 &lt;img src="{{ URL::asset('assets/img/960x900/3.jpg') }}" class="width-14x h-auto" alt="image" />
&lt;/a>
</code>
</pre>
                    </div>
                    <!--//////////COPY TO CLIPBOARD SNIPPETS-->
                </div>

            </section>
            <section class="postition-relative bg-body-tertiary">
                <div class="container py-9 py-lg-11 position-relative z-1">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="mb-4">Multiple images lightbox gallery</h5>
                            <div class="mb-3">
<a href="{{ URL::asset('assets/img/960x900/1.jpg') }}" class="glightbox3" data-glightbox data-gallery="gallery1">
    <img src="{{ URL::asset('assets/img/960x900/1.jpg') }}" class="width-14x h-auto" alt="image" />
  </a>
  <a href="{{ URL::asset('assets/img/960x900/2.jpg') }}" class="glightbox3" data-glightbox data-gallery="gallery1">
    <img src="{{ URL::asset('assets/img/960x900/2.jpg') }}" class="width-14x h-auto" alt="image" />
  </a>
                            </div>
                        </div>
                    </div>
                    <!--//////////COPY TO CLIPBOARD SNIPPETS-->
                    <div class="position-relative" style="max-height: 80vh; overflow-y: auto;">
                        <button
                            class="btn btn-sm position-absolute end-0 top-0 me-3 mt-3 z-1 btn-primary copy-link"
                            data-clipboard-target="#copyGalleryImage1" data-clipboard-action="copy"
                            id="copyGalleryImage1-2">Copy code</button>
                        <pre id="copyGalleryImage1" class="language-markup bg-secondary text-white-50 mt-0" data-lang="html">
<code>
&lt;!--Lightbox gallery-->
&lt;a href="{{ URL::asset('assets/img/960x900/1.jpg') }}" class="glightbox3" data-glightbox data-gallery="gallery1">
  &lt;img src="{{ URL::asset('assets/img/960x900/1.jpg') }}" class="width-14x h-auto" alt="image" />
&lt;/a>
&lt;a href="{{ URL::asset('assets/img/960x900/2.jpg') }}" class="glightbox3" data-glightbox data-gallery="gallery1">
    &lt;img src="{{ URL::asset('assets/img/960x900/2.jpg') }}" class="width-14x h-auto" alt="image" />
&lt;/a>
</code>
</pre>
                    </div>
                    <!--//////////COPY TO CLIPBOARD SNIPPETS-->
                </div>

            </section>
            <section class="postition-relative">
                <div class="container py-9 py-lg-11 position-relative z-1">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h5 class="mb-4">Vimeo video</h5>
                            <a href="{{ URL::asset('https://vimeo.com/167338879') }}" class="btn btn-outline-primary p-0 flex-center glightbox3 width-8x height-8x rounded-circle" data-glightbox data-gallery="gallery-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="36" height="36">
                                    <path fill="currentColor"
                                        d="M6.427 4.427l3.396 3.396a.25.25 0 010 .354l-3.396 3.396A.25.25 0 016 11.396V4.604a.25.25 0 01.427-.177z">
                                    </path>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <!--//////////COPY TO CLIPBOARD SNIPPETS-->
                    <div class="position-relative" style="max-height: 80vh; overflow-y: auto;">
                        <button
                            class="btn btn-sm position-absolute end-0 top-0 me-3 mt-3 z-1 btn-primary copy-link"
                            data-clipboard-target="#copyVimeo1" data-clipboard-action="copy" id="copyVimeo1-1">Copy
                            code</button>
                        <pre id="copyVimeo1" class="language-markup bg-secondary text-white-50 mt-0" data-lang="html">
<code>
&lt;!--Video Lightbox-->
 &lt;a href="{{ URL::asset('https://vimeo.com/167338879') }}" class="btn btn-outline-primary p-0 flex-center glightbox3 width-8x height-8x rounded-circle" data-glightbox data-gallery="gallery-2">
  &lt;svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="36" height="36">
   &lt;path fill="currentColor" d="M6.427 4.427l3.396 3.396a.25.25 0 010 .354l-3.396 3.396A.25.25 0 016 11.396V4.604a.25.25 0 01.427-.177z">
  &lt;/path>
 &lt;/svg>
&lt;/a>
</code>
</pre>
                    </div>
                    <!--//////////COPY TO CLIPBOARD SNIPPETS-->
                </div>
            </section>
            <section class="postition-relative bg-body-tertiary">
                <div class="container py-9 py-lg-11 position-relative z-1">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h5 class="mb-4">Youtube video</h5>
                            <a href="{{ URL::asset('https://www.youtube.com/watch?v=V_romThfA0I') }}" data-glightbox data-gallery="gallery-3">
                                <img src="{{ URL::asset('https://img.youtube.com/vi/V_romThfA0I/maxresdefault.jpg') }}" alt=""
                                    class="img-fluid">
                            </a>
                        </div>
                    </div>
                    <!--//////////COPY TO CLIPBOARD SNIPPETS-->
                    <div class="position-relative" style="max-height: 80vh; overflow-y: auto;">
                        <button
                            class="btn btn-sm position-absolute end-0 top-0 me-3 mt-3 z-1 btn-primary copy-link"
                            data-clipboard-target="#copyYoutube1" data-clipboard-action="copy" id="copyYoutube1-1">Copy
                            code</button>
                        <pre id="copyYoutube1" class="language-markup bg-secondary text-white-50 mt-0" data-lang="html">
<code>
&lt;!--Video Lightbox-->
&lt;a href="{{ URL::asset('https://www.youtube.com/watch?v=V_romThfA0I') }}" data-glightbox data-gallery="gallery-3">
&lt;img src="{{ URL::asset('https://img.youtube.com/vi/V_romThfA0I/maxresdefault.jpg') }}" alt=""
        class="img-fluid">
&lt;/a>
</code>
</pre>
                    </div>
                    <!--//////////COPY TO CLIPBOARD SNIPPETS-->
                </div>

            </section>
            <section class="postition-relative">
                <div class="container py-9 py-lg-11 position-relative z-1">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h5 class="mb-4">HTML5 video</h5>
                            <!--Video Lightbox-->
                            <a href="{{ URL::asset('assets/videos/officeloop.mp4') }}" data-glightbox data-gallery="gallery-4">
                                <img src="{{ URL::asset('assets/videos/officeloop-cover.jpg') }}" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>
                    <!--//////////COPY TO CLIPBOARD SNIPPETS-->
                    <div class="position-relative" style="max-height: 80vh; overflow-y: auto;">
                        <button
                            class="btn btn-sm position-absolute end-0 top-0 me-3 mt-3 z-1 btn-primary copy-link"
                            data-clipboard-target="#copyHTML5V1" data-clipboard-action="copy" id="copyHTML5V1-1">Copy
                            code</button>
                        <pre id="copyHTML5V1" class="language-markup bg-secondary text-white-50 mt-0" data-lang="html">
    <code>
     &lt;!--Video Lightbox-->
     &lt;a href="{{ URL::asset('assets/videos/officeloop.mp4') }}" data-glightbox data-gallery="gallery-4">
       &lt;img src="{{ URL::asset('assets/videos/officeloop-cover.jpg') }}" alt="" class="img-fluid">
     &lt;/a>
    </code>
    </pre>
                    </div>
                    <!--//////////COPY TO CLIPBOARD SNIPPETS-->
                </div>

            </section>

            <section class="position-relative bg-body-tertiary">
                <div class="container py-9 py-lg-11 position-relative z-1">
                    <div class="row">
                        <div class="col-12 mx-auto">
                            <div class="text-center">
                                <a href="{{ URL::asset('https://biati-digital.github.io/glightbox/') }}" target="_blank" class="link-underline mb-0">
                                    Plugin Documentation
                                </a>
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
