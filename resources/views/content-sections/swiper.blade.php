<style>

    .swiper-container,
    .swiper-slide{
        background-color:{{$data['background_color']}} !important;

    }

    .swiper-container h2{
        color:{{$data['text_color']}};
    }
    .swiper-pagination-progress
    {
        color:{{$data['text_color']}};
    }
    .swiper-pagination-progress-bar
    {

        background-color: {{ \App\Helpers\FormatHelper::hexToRgba($data['text_color'],0.3)}} !important;
    }
    .swiper-pagination-progress-inner{

        background-color:{{$data['text_color']}} !important;

    }
</style>



<section class="position-relative _bg-dark overflow-hidden">
    <!-- Swiper Main -->
    <div class="swiper-container swiper-classic">
        <div class="swiper-wrapper">

            @foreach ($data['slides'] as $slide)
                <div class="swiper-slide"
                     {{--style="background-image: url('{{ $slide['backgroundImage'] ?? asset('assets/img/backgrounds/default.jpg') }}');"--}}>

                    <!--Overlay-->
                    <div class="_bg-dark position-absolute start-0 top-0 w-100 h-100 _opacity-75"></div>
                    <div class="container text-white h-100 position-relative z-1">
                        <div class="row h-100 align-items-center">
                            <div class="col-xl-8 col-lg-10 mx-auto text-center">
                                <ul class="carousel-layers list-unstyled mb-0" style="widht:100% !important;">
                                    <li data-carousel-layer="fade-start">
                                        <h2 class="display-3 mb-4 mb-lg-7">
                                            {{ $slide['text'] ?? '' }}
                                        </h2>
                                    </li>
                                    @if($slide['buttonText'] !="")
                                        <li data-carousel-layer="fade-start">
                                            <a href="{{ $slide['buttonTarget'] ?? '#' }}" class="btn {{ $data['button_color'] ?? 'btn-white' }} btn-lg">
                                                {{ $slide['buttonText'] ?? 'Mehr erfahren' }}
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!--End swiper-main-->

    <!--Swiper thumbnails-->
    <div
        class="progress-swiper-thumbs pb-3 pb-lg-5 position-absolute start-0 bottom-0 w-100 overflow-hidden text-white px-4 swiper-container">
        <div class="swiper-wrapper">
            <!-- Slide -->
            @foreach ($data['slides'] as $slide)
                <div class="swiper-slide swiper-pagination-progress">
                    <div class="swiper-pagination-progress-bar mb-2">
                        <div class="swiper-pagination-progress-inner swiper-pagination-progress-bar-inner"></div>
                    </div>
                    <span class="small d-block text-truncate">{{ $slide['paginationTitle'] ?? 'Seite' }}</span>
                </div>
            @endforeach
            <!-- End Slide -->
        </div>
    </div>
    <!-- End Swiper Thumbs Slider -->
</section>


<!--begin:Swiper slider-->
<script src="http://localhost:8004/assets/vendor/node_modules/js/swiper-bundle.min.js"></script>
<script>
    //Main Hero Slider
    var sliderThumbs = new Swiper('.progress-swiper-thumbs', {
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
        history: false,
        breakpoints: {
            480: {
                slidesPerView: 2,
                spaceBetween: 16,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 16,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 16,
            },
        },
        on: {
            'afterInit': function (swiper) {
                swiper.el.querySelectorAll('.swiper-pagination-progress-inner')
                    .forEach($progress => $progress.style.transitionDuration =
                        `${swiper.params.autoplay.delay}ms`)
            }
        }
    });

    var swiperClassic = new Swiper(".swiper-classic", {
        slidesPerView: 1,
        spaceBetween: 0,
        loop: true,
        grabCursor: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        effect: "creative",
        creativeEffect: {
            prev: {
                shadow: false,
                translate: ["-20%", 0, -1],
            },
            next: {
                translate: ["100%", 0, 0],
            },
        },
        thumbs: {
            swiper: sliderThumbs
        },
    });


</script>
<!--/end:Swiper slider-->
