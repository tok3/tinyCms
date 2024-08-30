<div @if(isset($data['container_id']))id="{{$data['container_id']}}"@endif @if($prevElem == "")style="margin-top:120px !important;"@endif class="container {{$data['margin_top']}} ">
    <div class="row" style="@if($data['margin_bottom'] != "")margin-bottom:{{$data['margin_bottom']}}!important;@endif @if($data['margin_top'] != "")margin-top:{{$data['margin_top']}} !important;@endif">
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

