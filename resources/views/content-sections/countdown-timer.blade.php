
<section class="{!! $data['background'] !!} text-white position-relative"><svg class="position-absolute top-0 start-0 text-white w-50 h-auto w-lg-75" width="136" height="76" viewBox="0 0 136 76" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-opacity=".1" d="M136 -28C136 -14.3425 133.31 -0.818782 128.083 11.7991C122.857 24.4169 115.196 35.8818 105.539 45.5391C95.8818 55.1964 84.4169 62.857 71.7991 68.0835C59.1812 73.31 45.6575 76 32 76C18.3425 76 4.81878 73.31 -7.79908 68.0835C-20.4169 62.857 -31.8818 55.1964 -41.5391 45.5391C-51.1964 35.8818 -58.857 24.4169 -64.0835 11.7991C-69.31 -0.818789 -72 -14.3425 -72 -28L136 -28Z" fill="currentColor"></path></svg>
    <div class="container py-4  position-relative z-1">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7 text-center mx-auto">
                <h2 class="mb-4 display-4 aos-init aos-animate" data-aos="fade-up">{!! $data['heading'] !!}</h2>
                <p class="mb-5 px-lg-5 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">{!! $data['subtext'] !!}</p>

                <div class="counter-container" style="whitespace:nowrap" data-countdown-end="{!! $data['endDate'] !!}">

                    <div class="wrapper">
                        <div class="item">
                            <div class="number">
                                <span id="days">00</span>
                            </div>
                            <span>Tage</span>
                        </div>
                        <div class="item">
                            <div class="number">
                                <span id="hours">00</span>
                            </div>
                            <span>Stunden</span>
                        </div>
                        <div class="item">
                            <div class="number">
                                <span id="minutes">00</span>
                            </div>
                            <span>Minuten</span>
                        </div>
                        <div class="item">
                            <div class="number">
                                <span id="seconds">00</span>
                            </div>
                            <span>Sekunden</span>
                        </div>
                    </div>
                </div>
                @if( $data['buttonText'] != "")
                <div class="aos-init aos-animate" data-aos="fade-up">
                    <a href="{!! $data['buttonTarget'] !!}" class="btn {!! $data['buttonAppearance'] !!} btn-lg">{!! $data['buttonText'] !!}</a></div>
                   @endif
            </div>
            <!--End Col--></div>
        <!-- / .row --></div>
    <!-- / .container --></section>
