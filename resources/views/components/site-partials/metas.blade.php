@props(['navbarType'=>1, 'page'])
<?php

    if(isset($page))
    {
        $pageData = json_decode($page);
    }

?>

    <!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

@if($pageData)
    @foreach(get_object_vars($pageData->meta) as $key => $value)
        <meta name="{{$key}}" content="{{ $value }}"/>
    @endforeach

    <meta property="og:url" content="{{ url()->current() }}"/>
    <meta property="og:title" content="{{ $pageData->title }}"/>
    <meta property="og:site_name" content="{{ config('app.name') }}"/>

    @foreach(get_object_vars($pageData->meta_og) as $key => $value)
        @if($key == 'image')
            @php
                $value = asset('storage/'.$value);
            @endphp
        @endif

        <meta property="og:{{$key}}" content="{{ $value }}"/>
    @endforeach

    <meta property="twitter:title" content="{{ $pageData->title }}"/>
    @foreach(get_object_vars($pageData->meta_twitter) as $key => $value)
        @if($key == 'image')
            @php
                $value = asset('storage/'.$value);
            @endphp
        @endif
        <meta property="twitter:{{$key}}" content="{{ $value }}"/>
    @endforeach
@endif
