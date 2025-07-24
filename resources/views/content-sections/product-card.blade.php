<section class="position-relative {{ $data['background_class'] ?: '' }} " >
    <div class="container position-relative" >
        <div class="row mb-5 mb-lg-9 justify-content-between align-items-end">
            <div class="{{ $data['width_class'] ?: '' }}  col-md-12 mx-auto">


                {{--ab heir card--}}

                <div class="gb-card-variant2">
                    <div class="gb-card-variant2__left {{ $data['gradient_style'] ?: '' }}">
                        <img src="  {{ asset('storage/' . ($data['product_image'] ?: '' )) }}"  alt="{{$data['product_image_alt']}}" class="gb-card-variant2__icon"/>
                    </div>
                    <div class="gb-card-variant2__right">

                        <!-- Neuer Header-Bereich -->
                        <div class="gb-card-variant2__header">
                            <div class="gb-card-variant2__header-icons">
                                @foreach($data['header_icons'] ?? [] as $icon)
                                    @if(!empty($icon['icon']))
                                        <img src="{{ asset('storage/' . $icon['icon']) }}"
                                             alt="{{ $icon['alt'] ?? 'Icon' }}"
                                             style="height: {{ $icon['height'] ?? 27 }}px;"
                                             class="gb-card-variant2__icon-small">
                                    @endif
                                @endforeach
                            </div>
                            <h2 class="gb-card-variant2__title">{{$data['heading']}}</h2>

                        </div>
                        @if(isset($data['heading_sub']))

                            <h3 class="gb-card-variant2__subtitle">{{$data['heading_sub']}}</h3>
                        @endif
                        <p class="gb-card-variant2__text">
                            {!! $data['text'] !!}
                        </p>
                        @if(isset($data['text_box']))

                            <div class="gb-card gb-card--legal mt--10">
                                @if(isset($data['heading_box']))
                                    <h2 class="gb-card__title">{{$data['heading_box']}}</h2>
                                @endif
                                <div class="gb-card__body">
                                    <span class="gb-card-variant2__text">

                                        {!! $data['text_box'] !!}
                                    </span>
                                </div>
                                <div class="gb-card__sidebar">
                                    <span class="gb-card__block gb-card__block--top"></span>
                                    <span class="gb-card__block gb-card__block--bottom"></span>
                                </div>
                            </div>
                        @endif
                        @if(!empty($data['btn_1_txt']) || !empty($data['btn_2_txt']))
                            <div class="gb-card-variant2__footer">

                                @if(!empty($data['btn_1_txt']))
                                    <div class="gradient-button-wrapper">
                                        <a type="button" class="btn btn-white w-100" href="{{ $data['btn_1_target'] ?: '#' }}">
                                            {{ $data['btn_1_txt'] }}
                                        </a>
                                    </div>
                                @endif

                                @if(!empty($data['btn_2_txt']))
                                    <div class="gradient-button-wrapper">
                                        <a type="button" class="btn btn-white w-100" href="{{ $data['btn_2_target'] ?: '#' }}">
                                            {{ $data['btn_2_txt'] }}
                                        </a>
                                    </div>
                                @endif

                            </div>
                        @endif
                    </div>
                </div>


                {{--card end --}}
            </div>
        </div>
    </div>
</section>
