<div class="container"  @if($prevElem == "")style="margin-top:120px !important;"@endif>
    <div class="row">
        <div class="col-xl-9 mx-auto">

            @php
                $levelHeadingTag = $data['levelHeading'] ?? 'h4'; // Standardwert ist h4, falls nicht gesetzt
                $levelHeading2Tag = $data['levelHeading2'] ?? 'h4'; // Standardwert ist h4, falls nicht gesetzt
            @endphp

            <{{ $levelHeadingTag }} class
            ="mb-4">{!! $data['heading'] !!}</{{ $levelHeadingTag }}>

        @if(!empty($data['heading2']))
            <{{ $levelHeading2Tag }} class="mb-4">{!! $data['heading2'] !!}</{{ $levelHeading2Tag }}>
    @endif

    <p class="lead mb-4 dropcap">
        {!! $data['teaser'] !!}
    </p>

    <p class="mb-5">
        {!! $data['text'] !!}
    </p>

</div>
</div>
</div>

