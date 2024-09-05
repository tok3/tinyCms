<x-page-layout navbarType="{{$page->navbar_type}}" page="{!! $page !!}">
    @section('add-head')
        <link rel="stylesheet" href="{{url('js/repeating-countdown-timer/css/style.css')}}">
    @endsection


   {{-- @include('content-sections.countdown-timer')--}}
    {!! $content !!}



@push('scripts')

    <script src="{{url('js/repeating-countdown-timer/js/app.js')}}"></script>

@endpush
</x-page-layout>
