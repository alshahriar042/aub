<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title')</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('backEnd/assets/css/app.min.css') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('backEnd/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backEnd/assets/css/components.css') }}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{ asset('backEnd/assets/css/custom.css') }}">
    <link rel='shortcut icon' type='image/x-icon' href='{{ asset('assets/img/favicon.ico') }}' />
</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            @include('backEnd.layouts.partials.header')
            @include('backEnd.layouts.partials.sidebar')
            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    @yield('content')
                </section>
            </div>
            @include('backEnd.layouts.partials.footer')
        </div>
    </div>
    <!-- General JS Scripts -->
    <script src="{{ asset('backEnd/assets/js/app.min.js') }}"></script>
    <!-- JS Libraies -->
    <script src="{{ asset('backEnd/assets/bundles/apexcharts/apexcharts.min.js') }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('backEnd/assets/js/page/index.js') }}"></script>
    <!-- Template JS File -->
    <script src="{{ asset('backEnd/assets/js/scripts.js') }}"></script>
    <!-- Custom JS File -->
    <script src="{{ asset('backEnd/assets/js/custom.js') }}"></script>
</body>

</html>
