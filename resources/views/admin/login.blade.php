@extends('adminlte::auth.auth-page', ['authType' => 'login'])

@section('adminlte_css_pre')
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
@stop

@section('auth_header', 'Iniciar Sesión')

@section('auth_body')
    <form action="{{ route('admin.login.post') }}" method="post">
        @csrf

        <div class="input-group mb-3">
            <input type="text" name="username" class="form-control @error('error') is-invalid @enderror"
                value="{{ old('username') }}" placeholder="Usuario / Correo Electrónico" autofocus>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user"></span>
                </div>
            </div>
            @error('error')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <div class="input-group mb-3">
            <input type="password" name="password" class="form-control @error('error') is-invalid @enderror"
                placeholder="Contraseña">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-7">
                <div class="icheck-primary">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Recordar Contraseña</label>
                </div>
            </div>
            <div class="col-5">
                <button type="submit" class="btn btn-block btn-flat btn-primary">
                    <span class="fas fa-sign-in-alt"></span> Ingresar
                </button>
            </div>
        </div>
    </form>
@stop

@section('auth_footer')
    <p class="my-0"><a href="{{ route('home') }}">Volver al sitio</a></p>
@stop

@section('adminlte_js')
    <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}" defer></script>
@stop
