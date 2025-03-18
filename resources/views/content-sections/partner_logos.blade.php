{{--
<section class="position-relative">
    <div class="container py-9 py-lg-11">
        <h5 class="text-center mb-7">{{ $data['title'] }}</h5>
        <div class="row grid-separator">
            @foreach ($data['logos'] as $logo)
                <div class="col-6 col-sm-4 col-lg-3 py-9 px-lg-5 d-flex align-items-center">
                    <img src="{{ asset('storage/' . $logo['logo']) }}" class="img-fluid d-block mx-auto img-invert" alt="Partner Logo">
                </div>
            @endforeach
        </div>
    </div>
</section>
--}}

<section class="position-relative">
    <div class="container py-9 py-lg-11">
        <h5 class="text-center mb-7">{{ $data['title'] }}</h5>
        <div class="row grid-separator">
            @php
                // Dynamische Spalten je nach Einstellung
                $gridClass = match ($data['grid_columns'] ?? '4') {
                    '2' => 'col-6 col-sm-6 col-lg-6',
                    '3' => 'col-6 col-sm-4 col-lg-4',
                    '4' => 'col-6 col-sm-4 col-lg-3',
                    default => 'col-6 col-sm-4 col-lg-3',
                };
            @endphp

            @foreach ($data['logos'] as $logo)
                <div class="{{ $gridClass }} py-9 px-lg-5 d-flex align-items-center">
                    @if (!empty($logo['link']))
                        <a href="{{ $logo['link'] }}" target="_blank" rel="nofollow noopener" class="d-block mx-auto    ">
                            <img src="{{ asset('storage/' . $logo['logo']) }}" style="max-height:110px !important" class="img-fluid img-invert" alt="{{ $logo['alt_text'] ?? 'Partner Logo' }}">
                        </a>
                    @else
                        <img src="{{ asset('storage/' . $logo['logo']) }}" style="max-height:110px !important" class="img-fluid d-block mx-auto img-invert" alt="{{ $logo['alt_text'] ?? 'Partner Logo' }}">
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</section>
