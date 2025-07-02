<style>

    .embed-container {
        --video--width: 1296;
        --video--height: 540;

        position: relative;
        padding-bottom: calc(var(--video--height) / var(--video--width) * 100%); /* 41.66666667% */
        overflow: hidden;
        max-width: 100%;
        background: transparent;
    }

    .embed-container iframe,
    .embed-container object,
    .embed-container embed {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

</style>
<section class="py-5 overflow-hidden
    @if(!empty($data['background'])) bg-gradient-light @endif
    @if(!empty($data['border_top'])) border-top @endif">
    <div class="container">
        <div class="row g-16">

            @if($data['layout'] === 'text-left')
                <!-- Text links, Bild/Vimeo rechts -->
                <div class="col-12 col-md-6">
                    <div class="mw-md-lg me-auto">
                        <div class="mb-6">
                            <h3 class="fs-15 fw-medium mb-4">{!! $data['title'] !!}</h3>
                            {!! $data['content'] !!}
                            <div style="padding-bottom: 2px; height: 2px; background: linear-gradient(90deg, rgba(108,213,246,1 ) 0%, rgba(248,157,92,1) 50%, rgba(91,106,240,1) 100%);"></div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="d-flex flex-column justify-content-between mw-md-md h-100">
                        <div>
                            @if(!empty($data['media_type']))
                                @if($data['media_type'] === 'video' && !empty($data['vimeo_url']))
                                    <div class="embed-container">
                                        <iframe src="{{ $data['vimeo_url'] }}" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
                                    </div>
                                @elseif($data['media_type'] === 'image' && !empty($data['image']))

                                    <img
                                        src="{{ asset('storage/' . $data['image']) }}"
                                        class="img-fluid"
                                        alt="{{ $data['alt_text'] }}"
                                        {!! $data['opt_tags'] ?? '' !!}
                                    >
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            @else
                <!-- Bild/Vimeo links, Text rechts (Default) -->
                <div class="col-12 col-md-6">
                    <div class="d-flex flex-column justify-content-between mw-md-md h-100">
                        @if(!empty($data['media_type']))
                            @if($data['media_type'] === 'video' && !empty($data['vimeo_url']))
                                <div class="embed-container">
                                    <iframe src="{{ $data['vimeo_url'] }}" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
                                </div>

                            @elseif($data['media_type'] === 'image' && !empty($data['image']))

                                <img
                                    src="{{ asset('storage/' . $data['image']) }}"
                                    class="img-fluid"
                                    alt="{{ $data['alt_text'] }}"
                                    {!! $data['opt_tags'] ?? '' !!}
                                >
                            @endif
                        @endif

                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mw-md-lg ms-auto">
                        <div class="mb-6">
                            <h3 class="fs-15 fw-medium mb-4">{!! $data['title'] !!}</h3>
                            {!! $data['content'] !!}
                            <div style="padding-bottom: 2px; height: 2px; background: linear-gradient(90deg, rgba(108,213,246,1 ) 0%, rgba(248,157,92,1) 50%, rgba(91,106,240,1) 100%);"></div>
                        </div>
                    </div>
                </div>
            @endif
        </div> <!-- Schließende </div> für .row -->
    </div> <!-- Schließendes </div> für .container -->
</section>
