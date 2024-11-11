<div @if(isset($data['container_id']))id="{{$data['container_id']}}" @endif @if($prevElem == "")style="margin-top:120px !important;" @endif

class="container mb-50">
    <div class="row"
         style="@if(isset($data['margin_bottom']) && $data['margin_bottom'] != 0)margin-bottom:{{$data['margin_bottom']}}!important;@endif @if(isset($data['margin_top']) && $data['margin_top'] != "")margin-top:{{$data['margin_top']}} !important;@endif">
        <div class="col-xl-9 mx-auto">
            @php
                $levelHeadingTag = $data['levelHeading'] ?? 'h1'; // Standardwert ist h4, falls nicht gesetzt
                $levelHeading2Tag = $data['levelHeading2'] ?? 'h2'; // Standardwert ist h4, falls nicht gesetzt
            @endphp
            @if(isset($realHtags) && $realHtags == true)



                <{{ $levelHeadingTag }} class="mb-4">{!! $data['heading'] !!}</{{ $levelHeadingTag }}>

        @if(!empty($data['heading2']))
            <{{ $levelHeading2Tag }} class="mb-4">{!! $data['heading2'] !!}</{{ $levelHeading2Tag }}>
        @endif

    @else


        <div  role="heading" class="mb-4 {{ $levelHeadingTag }} ">{!! $data['heading'] !!}</div>

@if(!empty($data['heading2']))
    <div  role="heading" class="mb-4 {{ $levelHeading2Tag }}">{!! $data['heading2'] !!}</div>
@endif




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
