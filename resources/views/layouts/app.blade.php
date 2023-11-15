<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="favicon.png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;600;700&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('assets/site/fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/fonts/flaticon/font/flaticon.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="{{ asset('assets/site/css/tiny-slider.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/glightbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/site/css/flatpickr.min.css') }}">
{{-- code highlight css  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/atom-one-dark-reasonable.min.css">

    <title>Blogy</title>
</head>

<body>

{{--header start--}}
<x-site.header/>
{{--header end--}}

{{--content--}}
{{ $slot  }}
{{--end content--}}

{{-- footer start --}}
<x-site.footer/>
{{-- footer end --}}
<!-- Preloader -->
<div id="overlayer"></div>
<div class="loader">
    <div class="spinner-border text-primary" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>

<script src="{{ asset('assets/site/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/site/js/tiny-slider.js') }}"></script>
<script src="{{ asset('assets/site/js/flatpickr.min.js') }}"></script>

<script src="{{ asset('assets/site/js/aos.js') }}"></script>
<script src="{{ asset('assets/site/js/glightbox.min.js') }}"></script>
{{-- <script src="{{ asset('assets/site/js/navbar.js') }}"></script> --}}
<script src="{{ asset('assets/site/js/counter.js') }}"></script>
<script src="{{ asset('assets/site/js/custom.js') }}"></script>

{{--highlight js --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
<script>hljs.highlightAll();</script>
<script src="{{ asset('assets/site/js/code-highlight.js')}}"></script>
</body>
</html>
