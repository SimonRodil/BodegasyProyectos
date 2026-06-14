<!DOCTYPE html>
<html lang="es">
<head>
    <title>{{ $title ?? config('app.name') }} - Panel</title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    @vite(['resources/css/admin.css', 'resources/js/admin.js'])
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('assets/panel/css/material-dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/panel/datatable/language/Spanish.json') }}">
    @stack('styles')
    <script>window.__adminReady=function(fn){if(window.jQuery)jQuery(fn);else{(window.__adminQueue=window.__adminQueue||[]).push(fn);}};</script>
</head>
<body>
    <div class="wrapper">
        @include('partials.admin-sidebar')
        <div class="main-panel">
            @include('partials.admin-navbar')
            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            @include('partials.admin-footer')
        </div>
    </div>

    <script defer src="{{ asset('assets/panel/js/core/bootstrap-material-design.min.js') }}"></script>
    <script defer src="{{ asset('assets/panel/js/material-dashboard.js') }}"></script>
    <script defer src="{{ asset('assets/panel/js/main.js') }}"></script>
    @stack('scripts')
</body>
</html>
