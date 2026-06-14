<!DOCTYPE html>
<html lang="es">
<head>
    <title>{{ $title ?? config('app.name') }} - Panel</title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('assets/panel/css/material-dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/panel/css/croppie.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/panel/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/panel/css/bootstrap-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/panel/css/jquery.steps.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/panel/css/materialize.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/panel/css/datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/panel/datatable/language/Spanish.json') }}">
    @stack('styles')
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

    <script src="{{ asset('assets/panel/js/core/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/panel/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/panel/js/core/bootstrap-material-design.min.js') }}"></script>
    <script src="{{ asset('assets/panel/js/plugins/moment.min.js') }}"></script>
    <script src="{{ asset('assets/panel/js/material-dashboard.js') }}"></script>
    <script src="{{ asset('assets/panel/js/plugins/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/panel/js/plugins/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/panel/js/plugins/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/panel/js/plugins/select2.min.js') }}"></script>
    <script src="{{ asset('assets/panel/js/plugins/bootstrap-select.js') }}"></script>
    <script src="{{ asset('assets/panel/js/plugins/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/panel/js/plugins/summernote.min.js') }}"></script>
    <script src="{{ asset('assets/panel/js/croppie.min.js') }}"></script>
    <script src="{{ asset('assets/panel/js/main.js') }}"></script>
    @stack('scripts')
</body>
</html>
