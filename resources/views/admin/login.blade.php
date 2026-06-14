<!DOCTYPE html>
<html lang="es">
<head>
    <title>Iniciar Sesión - Panel</title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('assets/panel/login/libs/mdl/material.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/panel/login/css/style.css') }}">
</head>
<body>
    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--2-offset-desktop mdl-cell--4-col-tablet mdl-cell--1-offset-tablet mdl-cell--4-col-phone">
            <div class="mdl-card mdl-shadow--16dp">
                <div class="mdl-card__title">
                    <img src="{{ asset('assets/images/logo.png') }}" class="img-fluid" style="width: 100%;">
                </div>
                <div class="mdl-card__supporting-text">
                    <form id="form-login" method="post">
                        @csrf
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" name="username" id="username" required>
                            <label class="mdl-textfield__label" for="username">Usuario / Correo Electrónico</label>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="password" name="password" id="password" required>
                            <label class="mdl-textfield__label" for="password">Contraseña</label>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="remember">
                                <input type="checkbox" name="remember" id="remember" class="mdl-checkbox__input">
                                <span class="mdl-checkbox__label">Recordar Contraseña</span>
                            </label>
                        </div>
                        <p class="text-center">
                            <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect" id="ingresar">
                                Ingresar
                            </button>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/panel/login/libs/mdl/material.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/libs/sweetalert2.all.min.js') }}"></script>
    <script>
        $('#form-login').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: '{{ route("admin.login.post") }}',
                method: 'POST',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(r) {
                    if (r.message === 'success') {
                        Swal.fire({ icon: 'success', title: 'Bienvenido!', showConfirmButton: false, timer: 1500 });
                        setTimeout(function() { window.location.href = '{{ route("admin.dashboard") }}'; }, 1500);
                    }
                },
                error: function() {
                    Swal.fire({ icon: 'error', title: 'Error', text: 'Usuario o contraseña incorrectos' });
                }
            });
        });
    </script>
</body>
</html>
