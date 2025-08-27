<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ URL::asset('assets/img/favicon.ico') }}" type="image/ico">
    <x-partials.head-includes />
    <!-- Main CSS -->
    @vite(['resources/scss/theme.scss'])



    <title>{{ isset($title) ? $title : '' }}</title>

</head>

<body>
<x-partials.preloader />
<!--Header Start-->

<!--Main content-->
<main class="main-content" id="main-content">
    {{$slot}}
</main>

<!-- begin Back to Top button -->
<a href="{{ URL::asset('#') }}" class="toTop"><svg class="progress-circle" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
        <circle cx="50" cy="50" r="40" fill="none" stroke="currentColor" stroke-width="4" stroke-dasharray="0, 251.2"></circle>
    </svg>
    <i class="bx bxs-up-arrow"></i>
</a>
<!-- scripts -->
<script src="{{ URL::asset('assets/js/theme.bundle.js') }}"></script>

<!--Mastert Slider start (Include jquery before master slider js)-->
<script src="{{ URL::asset('assets/vendor/node_modules/js/jquery.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/theme.bundle.js') }}"></script>
@stack('scripts')

</body>

</html>
