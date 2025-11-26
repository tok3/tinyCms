<x-page-layout navbarType="{{$page->navbar_type}}" page="{!! $page !!}">
    @section('add-head')
        <link rel="stylesheet" href="{{url('js/repeating-countdown-timer/css/style.css')}}">
        <style>
            /* Fixed Alert über der Navbar */
            .page-alert {
                position: fixed;
                left: 50%;
                transform: translateX(-50%);
                top: calc(var(--navbar-height, 64px) + 10px); /* 64px anpassen, falls deine Navbar höher ist */
                z-index: 1080; /* höher als Navbar (Bootstrap-Navbar ~1030) */
                width: min(920px, calc(100% - 2rem)); /* hübsche Breite */
            }
        </style>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    @endsection


    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow page-alert" role="alert">
            {!!  session('success')  !!}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Schließen"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show shadow page-alert" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Schließen"></button>
        </div>
    @endif




    {{-- @include('content-sections.countdown-timer')--}}


    {!! $content !!}



    @push('scripts')

        <script src="{{url('js/repeating-countdown-timer/js/app.js')}}?t={{time()}}"></script>
            <script src="{{url('js/wcag-check.js')}}?t={{time()}}"></script>


        <script type="module">
            import {CountUp} from 'https://cdn.jsdelivr.net/npm/countup.js@2.0.7/dist/countUp.min.js';

            // Errors CountUp
            window.startErrorCountUp = (errorCount) => {
                const countUp = new CountUp('totalErrors', errorCount, {duration: 5});
                if (!countUp.error) {
                    countUp.start();
                } else {
                    console.error(countUp.error);
                }
            };

            // Warnings CountUp
            window.startWarningCountUp = (warningCount) => {
                const countUp = new CountUp('totalWarnings', warningCount, {duration: 9});
                if (!countUp.error) {
                    countUp.start();
                } else {
                    console.error(countUp.error);
                }
            };

            // Notices CountUp
            window.startNoticeCountUp = (noticeCount) => {
                const countUp = new CountUp('totalNotices', noticeCount, {duration: 9});
                if (!countUp.error) {
                    countUp.start();
                } else {
                    console.error(countUp.error);
                }
            };


        </script>
    @endpush
</x-page-layout>
