<x-page-layout navbarType="{{$page->navbar_type}}" page="{!! $page !!}">
{{--
    <!--begin:main slider-->
    <div class="position-relative overflow-hidden">
        <div class="ms-skin-black-1 master-slider" id="masterslider">
            <!--begin:slide-1-->
            <div class="ms-slide bg-dark" data-delay="3" data-fill-mode="fill">
                <img class="opacity-25" src="{{ URL::asset('assets/vendor/masterslider/style/blank.gif') }}" alt="" title=""
                     data-src="{{ URL::asset('assets/img/backgrounds/bg6.jpg') }}" />

                <!--title-->
                <div class="ms-layer ms-title text-white" data-effect="front(800)" data-duration="1200" data-delay="600"
                     data-ease="easeInOutCubic" data-hide-effect="top(long,false)" data-offset-x="0" data-offset-y="-40"
                     data-origin="mc" data-position="center" data-masked="false">
                    <div class="text-center">
                        Create a website <br>you proud of</div>
                </div>
                <!--button-->
                <a href="{{ URL::asset('#') }}" class="ms-layer ms-btn" data-effect="front(800)" data-duration="1200" data-delay="800"
                   data-ease="easeInOutCubic" data-hide-effect="top(long,false)" data-offset-x="0" data-offset-y="140"
                   data-origin="mc" data-position="center" data-masked="false"><span
                        class="btn btn-lg btn-primary btn-sm">Get Started</span>
                </a>
            </div>
            <!--end:slide-1-->

            <!--begin:slide-2-->
            <div class="ms-slide bg-dark" data-delay="3" data-fill-mode="fill">
                <!--bg-->
                <img class="opacity-25" src="{{ URL::asset('assets/vendor/masterslider/style/blank.gif') }}" alt="" title=""
                     data-src="{{ URL::asset('assets/img/backgrounds/bg7.jpg') }}" />

                <!--title-->
                <div class="ms-layer ms-title text-center text-white" data-effect="skewbottom(-10,150)" data-duration="1000"
                     data-delay="600" data-ease="easeInOutCubic" data-hide-effect="top(long,false)" data-offset-x="0"
                     data-offset-y="-40" data-origin="mc" data-position="center" data-masked="false">
                    <div>Ultimate solutions<br> for your website</div>
                </div>
                <!--button-->
                <a href="{{ URL::asset('#') }}" class="ms-layer ms-btn" data-effect="skewbottom(-10,150)" data-duration="1000" data-delay="900"
                   data-ease="easeInOutCubic" data-hide-effect="top(long,false)" data-offset-x="0" data-offset-y="140"
                   data-origin="mc" data-position="center" data-masked="false">
              <span class="btn btn-lg btn-primary btn-sm">Get
                Started</span>
                </a>
            </div>
            <!--end:slide-2-->

            <!--begin:slide-3-->
            <div class="ms-slide bg-dark" data-delay="3" data-fill-mode="fill">
                <!--bg-->
                <img class="opacity-25" src="{{ URL::asset('assets/vendor/masterslider/style/blank.gif') }}" alt="" title=""
                     data-src="{{ URL::asset('assets/img/backgrounds/bg5.jpg') }}" />
                <!--Title-->
                <div class="ms-layer text-center ms-title text-white" data-effect="skewleft(23,500)" data-duration="1000"
                     data-delay="900" data-ease="easeInOutSine" data-hide-effect="top(long,false)" data-offset-x="0"
                     data-offset-y="-40" data-origin="mc" data-position="center" data-masked="false">
                    <div>A responsive theme<br> built for success</div>
                </div>

                <!--Button-->
                <a href="{{ URL::asset('#') }}" class="ms-layer ms-btn" data-effect="skewleft(23,500)" data-duration="1000" data-delay="1200"
                   data-ease="easeInOutSine" data-hide-effect="top(long,false)" data-offset-x="0" data-offset-y="140"
                   data-origin="mc" data-position="center" data-masked="false"><span
                        class="btn btn-lg btn-primary btn-sm">Get Started</span>
                </a>
            </div>
            <!--end:slide-3-->
        </div>
    </div>
    <!--end:main slider-->--}}

    {!! $content !!}


</x-page-layout>
