<x-assan-layout layout-type="{{$layoutType}}">
        <!-- MasterSlider -->
        <section id="P_masterslider" class="master-slider-parent bg-transparent ms-slider-alt ms-parent-id-3" >
            <!-- MasterSlider Main -->
            <div id="masterslider" class="master-slider bg-transparent ms-skin-minimal" >
                <!--Slide 1-->
                <div class="ms-slide" data-delay="5" data-fill-mode="fill" >
                    <img class="ms-layer" src="{{ URL::asset('assets/vendor/masterslider/style/blank.gif') }}"
                        data-src="{{ URL::asset('assets/img/backgrounds/trans2.png') }}" alt="" data-ease="easeOutQuint" data-parallax="60"
                        data-type="image" data-offset-x="293" data-offset-y="90" data-origin="mc"
                        data-position="normal" />
                    <div class="ms-layer msp-cn-169-5" data-ease="easeOutQuint" data-parallax="70" data-offset-x="-495"
                        data-offset-y="-40" data-origin="mc" data-position="normal">What we <strong>Do</strong></div>
                    <div class="ms-layer bg-body ms-title msp-cn-169-14" data-ease="easeOutQuint" data-parallax="80"
                        data-offset-x="-225" data-offset-y="50" data-origin="mc" data-position="normal">We craft unique
                    </div>
                    <div class="ms-layer bg-body ms-title msp-cn-169-6" data-ease="easeOutQuint" data-parallax="90"
                        data-offset-x="-175" data-offset-y="142" data-origin="mc" data-position="normal">business ideas
                    </div>
                </div>
                <!--Slide 2-->
                <div class="ms-slide" data-delay="5" data-fill-mode="fill">
                    <img class="ms-layer" src="{{ URL::asset('assets/vendor/masterslider/style/blank.gif') }}"
                        data-src="{{ URL::asset('assets/img/backgrounds/trans1.png') }}" alt="" data-ease="easeOutQuint" data-parallax="60"
                        data-type="image" data-offset-x="293" data-offset-y="90" data-origin="mc"
                        data-position="normal" />
                    <div class="ms-layer msp-cn-169-19" data-ease="easeOutQuint" data-parallax="70" data-offset-x="-474"
                        data-offset-y="-40" data-origin="mc" data-position="normal">Our <strong>Motivation</strong>
                    </div>
                    <div class="ms-layer bg-body ms-title msp-cn-169-21" data-ease="easeOutQuint" data-parallax="80"
                        data-offset-x="-175" data-offset-y="50" data-origin="mc" data-position="normal">The best
                        solutions</div>
                    <div class="ms-layer bg-body ms-title msp-cn-169-20" data-ease="easeOutQuint" data-parallax="90"
                        data-offset-x="-125" data-offset-y="142" data-origin="mc" data-position="normal">for your
                        business</div>
                </div>
                <!--Slide 3-->
                <div class="ms-slide" data-delay="5" data-fill-mode="fill">
                    <img class="ms-layer" src="{{ URL::asset('assets/vendor/masterslider/style/blank.gif') }}"
                        data-src="{{ URL::asset('assets/img/backgrounds/trans3.png') }}" alt="" data-ease="easeOutQuint" data-parallax="60"
                        data-type="image" data-offset-x="293" data-offset-y="90" data-origin="mc"
                        data-position="normal" />
                    <div class="ms-layer msp-cn-169-26" data-ease="easeOutQuint" data-parallax="70" data-offset-x="-425"
                        data-offset-y="-40" data-origin="mc" data-position="normal"><strong>Vision</strong></div>
                    <div class="ms-layer bg-body ms-title msp-cn-169-28" data-ease="easeOutQuint" data-parallax="80"
                        data-offset-x="-75" data-offset-y="50" data-origin="mc" data-position="normal">Creative vision
                        and</div>
                    <div class="ms-layer bg-body ms-title msp-cn-169-27" data-ease="easeOutQuint" data-parallax="90"
                        data-offset-x="-55" data-offset-y="142" data-origin="mc" data-position="normal">digital
                        experience</div>
                </div>
            </div>
            <!-- END MasterSlider Main -->
        </section>
        <!-- END MasterSlider -->


        <section class="border-bottom">
            <div class="container pt-9 pt-lg-11">

                <!--//////////////////SNIPPETS:BEGIN////////////////-->
                <nav class="nav-tabs nav">
                    <a href="{{ URL::asset('#tabMain') }}" data-bs-toggle="tab" class="nav-link active">HTML</a>
                    <a href="{{ URL::asset('#tabCss') }}" data-bs-toggle="tab" class="nav-link">Css</a>
                    <a href="{{ URL::asset('#tabJs') }}" data-bs-toggle="tab" class="nav-link">Js</a>
                </nav>
                <div class="tab-content">
                    <!--Element Main code-->
                    <div class="tab-pane fade show active" id="tabMain">
                        <div class="position-relative" style="max-height:75vh; overflow-y:auto">
                            <button
                                class="btn btn-sm position-absolute end-0 top-0 me-3 mt-3 z-1 btn-primary copy-link"
                                data-clipboard-target="#copyHTML1" data-clipboard-action="copy"
                                id="copyHTML1-1">Copy code</button>
                            <pre id="copyHTML1" class="language-markup bg-secondary text-white-50 mt-0" data-lang="html">
            <code>
&lt;!-- MasterSlider -->
&lt;section id="P_masterslider" class="master-slider-parent bg-body ms-slider-alt ms-parent-id-3" >
&lt;!-- MasterSlider Main -->
&lt;div id="masterslider" class="master-slider bg-body ms-skin-minimal" >
   &lt;!--Slide 1-->
    &lt;div class="ms-slide" data-delay="5" data-fill-mode="fill" >
     &lt;img class="ms-layer" src="{{ URL::asset('assets/vendor/masterslider/style/blank.gif') }}"
         data-src="{{ URL::asset('assets/img/backgrounds/trans2.png') }}" alt="" data-ease="easeOutQuint" data-parallax="60"
         data-type="image" data-offset-x="293" data-offset-y="90" data-origin="mc"
         data-position="normal" />
         &lt;div class="ms-layer msp-cn-169-5" data-ease="easeOutQuint" data-parallax="70" data-offset-x="-495"
         data-offset-y="-40" data-origin="mc" data-position="normal">What we &lt;strong>Do&lt;/strong>&lt;/div>
         &lt;div class="ms-layer bg-body ms-title msp-cn-169-14" data-ease="easeOutQuint" data-parallax="80"
         data-offset-x="-225" data-offset-y="50" data-origin="mc" data-position="normal">We craft unique
         &lt;/div>
          &lt;div class="ms-layer bg-body ms-title msp-cn-169-6" data-ease="easeOutQuint" data-parallax="90"
          data-offset-x="-175" data-offset-y="142" data-origin="mc" data-position="normal">business ideas
         &lt;/div>
       &lt;/div>
        &lt;!--Slide 2-->
        &lt;div class="ms-slide" data-delay="5" data-fill-mode="fill">
        &lt;img class="ms-layer" src="{{ URL::asset('assets/vendor/masterslider/style/blank.gif') }}"
        data-src="{{ URL::asset('assets/img/backgrounds/trans1.png') }}" alt="" data-ease="easeOutQuint" data-parallax="60"
        data-type="image" data-offset-x="293" data-offset-y="90" data-origin="mc"
        data-position="normal" />
        &lt;div class="ms-layer msp-cn-169-19" data-ease="easeOutQuint" data-parallax="70" data-offset-x="-474"
        data-offset-y="-40" data-origin="mc" data-position="normal">Our &lt;strong>Motivation&lt;/strong>
        &lt;/div>
            &lt;div class="ms-layer bg-body ms-title msp-cn-169-21" data-ease="easeOutQuint" data-parallax="80"
            data-offset-x="-175" data-offset-y="50" data-origin="mc" data-position="normal">The best
            solutions&lt;/div>
            &lt;div class="ms-layer bg-body ms-title msp-cn-169-20" data-ease="easeOutQuint" data-parallax="90"
            data-offset-x="-125" data-offset-y="142" data-origin="mc" data-position="normal">for your
            business&lt;/div>
            &lt;/div>
        &lt;!--Slide 3-->
        &lt;div class="ms-slide" data-delay="5" data-fill-mode="fill">
        &lt;img class="ms-layer" src="{{ URL::asset('assets/vendor/masterslider/style/blank.gif') }}"
        data-src="{{ URL::asset('assets/img/backgrounds/trans3.png') }}" alt="" data-ease="easeOutQuint" data-parallax="60"
        data-type="image" data-offset-x="293" data-offset-y="90" data-origin="mc"
        data-position="normal" />
        &lt;div class="ms-layer msp-cn-169-26" data-ease="easeOutQuint" data-parallax="70" data-offset-x="-425"
        data-offset-y="-40" data-origin="mc" data-position="normal">&lt;strong>Vision&lt;/strong>&lt;/div>
        &lt;div class="ms-layer bg-body ms-title msp-cn-169-28" data-ease="easeOutQuint" data-parallax="80"
        data-offset-x="-75" data-offset-y="50" data-origin="mc" data-position="normal">Creative vision
        and&lt;/div>
        &lt;div class="ms-layer bg-body ms-title msp-cn-169-27" data-ease="easeOutQuint" data-parallax="90"
        data-offset-x="-55" data-offset-y="142" data-origin="mc" data-position="normal">digital
        experience&lt;/div>
        &lt;/div>
        &lt;/div>
    &lt;!-- END MasterSlider Main -->
    &lt;/section>
    &lt;!-- END MasterSlider -->
</code>
</pre>
                        </div>
                    </div>
                    <!--Element Css-->
                    <div class="tab-pane fade" id="tabCss">
                        <div class="position-relative">
                            <button
                                class="btn btn-sm position-absolute end-0 top-0 me-3 mt-3 z-1 btn-primary copy-link"
                                data-clipboard-target="#copyCss1" data-clipboard-action="copy" id="copyCss1-2">Copy
                                code</button>
                            <pre id="copyCss1" class="language-markup bg-secondary text-white-50 mt-0" data-lang="html">
            <code>
&lt;!--Master slider-->
&lt;link rel="stylesheet" href="{{ URL::asset('assets/vendor/masterslider/style/masterslider.css') }}">
&lt;link rel="stylesheet" href="{{ URL::asset('assets/vendor/masterslider/skins/black-1/style.css') }}">
&lt;!-- Bootstrap + Vendor + Theme -->
&lt;link href="{{ URL::asset('assets/css/theme.min.css') }}" rel="stylesheet">
</code>
</pre>
                        </div>
                    </div>

                    <!--Element JS-->
                    <div class="tab-pane fade" id="tabJs">
                        <div class="position-relative">
                            <button
                                class="btn btn-sm position-absolute end-0 top-0 me-3 mt-3 z-1 btn-primary copy-link"
                                data-clipboard-target="#copyJs1" data-clipboard-action="copy" id="copyJs1-3">Copy
                                code</button>
                            <pre id="copyJs1" class="language-markup bg-secondary text-white-50 mt-0" data-lang="html">
            <code>
&lt;!-- Bootstrap + Vendor + Theme -->
&lt;script src="{{ URL::asset('assets/css/theme.bundle.js') }}">&lt;/script>
&lt;!--Mastert Slider start (Include jquery before master slider js)-->
&lt;script src="{{ URL::asset('assets/vendor/node_modules/js/jquery.min.js') }}">&lt;/script>
&lt;script src="{{ URL::asset('assets/vendor/masterslider/jquery.easing.min.js') }}">&lt;/script>
&lt;script src="{{ URL::asset('assets/vendor/masterslider/masterslider.min.js') }}">&lt;/script>
&lt;script>
"use strict";
var masterslider = new MasterSlider();

// slider controls
masterslider.control('arrows'     ,{ autohide:true, overVideo:true  });
masterslider.control('bullets'    ,{ autohide:true, overVideo:true, dir:'h', align:'bottom', space:10 , margin:26  });
masterslider.control('timebar'    ,{ autohide:false, overVideo:true, align:'bottom', color:'#f88e6d'  , width:2 });
// slider setup
masterslider.setup("masterslider", {
width           : 1366,
height          : 768,
minHeight       : 0,
space           : 0,
start           : 1,
grabCursor      : true,
swipe           : true,
mouse           : true,
keyboard        : false,
layout          : "fullwidth",
wheel           : false,
autoplay        : true,
instantStartLayers:true,
loop            : true,
shuffle         : false,
preload         : 0,
heightLimit     : true,
autoHeight      : false,
smoothHeight    : true,
endPause        : false,
overPause       : true,
fillMode        : "fill",
centerControls  : false,
startOnAppear   : false,
layersMode      : "center",
autofillTarget  : "",
hideLayers      : false,
fullscreenMargin: 0,
speed           : 18,
dir             : "h",
parallaxMode    : 'swipe',
view            : "basic"
});
&lt;/script>
</code>
</pre>
                        </div>
                    </div>
                </div>
                <!--//////////////////SNIPPETS:END////////////////-->
            </div>
            <div class="container py-9 py-lg-11">
                <div class="px-4 rounded-3 shadow-lg py-6 px-lg-5 py-lg-7 bg-gradient bg-secondary text-white position-relative overflow-hidden"
                    data-aos="fade-up" data-aos-duration="400">
                    <svg class="position-absolute end-0 bottom-0 mb-4 text-success" width="200" height="400"
                        preserveAspectRatio="none" viewBox="0 0 150 300" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M150 300C130.302 300 110.796 296.12 92.5975 288.582C74.3986 281.044 57.8628 269.995 43.934 256.066C30.0052 242.137 18.9563 225.601 11.4181 207.403C3.87986 189.204 -6.2614e-07 169.698 0 150C6.2614e-07 130.302 3.87987 110.796 11.4181 92.5975C18.9563 74.3987 30.0052 57.8628 43.934 43.934C57.8628 30.0052 74.3987 18.9563 92.5975 11.4181C110.796 3.87986 130.302 3.51961e-06 150 5.00679e-06L150 37.5C135.226 37.5 120.597 40.4099 106.948 46.0636C93.299 51.7172 80.8971 60.0039 70.4505 70.4505C60.0039 80.8971 51.7172 93.299 46.0636 106.948C40.4099 120.597 37.5 135.226 37.5 150C37.5 164.774 40.4099 179.403 46.0636 193.052C51.7172 206.701 60.0039 219.103 70.4505 229.55C80.8971 239.996 93.299 248.283 106.948 253.936C120.597 259.59 135.226 262.5 150 262.5V300Z"
                            fill="currentColor"></path>
                    </svg>

                    <div class="row align-items-end position-relative">
                        <div class="col-lg-6 col-xl-7">
                            <h5 class="text-white-50 mb-4">Let's start building</h5>
                            <h2 class="mb-5 mb-md-0 display-5">Stunning websites ease</h2>
                        </div>
                        <div class="col-lg-6 col-xl-5 text-lg-end">
                            <a href="{{ URL::asset('#!') }}" class="btn btn-primary btn-lg me-2 mb-2 mb-lg-0">Contact sales</a>
                            <a href="{{ URL::asset('#!') }}" class="btn btn-gray-200 btn-lg">Purchase Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</x-assan-layout>
