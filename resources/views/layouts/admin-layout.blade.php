<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Admin </title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/admin/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/admin/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/admin/css/style.css') }}" rel="stylesheet">

</head>

<body>

{{-- header --}}
<x-admin.header/>
{{-- header end --}}

{{-- sidebar --}}
<x-admin.sidebar/>
{{-- sidebar end --}}

{{-- content --}}
<main id="main" class="main">

    {{ $slot }}

</main>
{{-- content end --}}

{{-- footer --}}
<x-admin.footer/>
{{-- footer end --}}

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{ asset('assets/admin/vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendor/chart.js/chart.umd.js') }}"></script>
<script src="{{ asset('assets/admin/vendor/echarts/echarts.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendor/quill/quill.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendor/simple-datatables/simple-datatables.js') }}"></script>
<script src="{{ asset('assets/admin/vendor/php-email-form/validate.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('assets/admin/js/main.js') }}"></script>

{{-- sweet alert cdn --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{--CSS for Select2 --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

{{-- Include jQuery (required for Select2) --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

{{-- Include Select2 JS --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
@stack('scripts')

</body>

</html>
