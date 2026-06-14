@extends('layouts.admin')
@section('page-title', 'Usuarios')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary d-flex justify-content-between">
                <h4 class="card-title">Usuarios</h4>
                <button class="btn btn-white btn-sm" data-toggle="modal" data-target="#nuevo-registro"><i class="material-icons">add</i> Nuevo</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="users-table">
                        <thead><tr><th>ID</th><th>Nombre de Usuario</th><th>Correo Electrónico</th><th>Acciones</th></tr></thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="nuevo-registro" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.usuarios.store') }}" method="POST">
                @csrf
                <div class="modal-header"><h5 class="modal-title">Nuevo Usuario</h5><button type="button" class="close" data-dismiss="modal">&times;</button></div>
                <div class="modal-body">
                    <div class="form-group"><label>Nombre</label><input type="text" name="name" class="form-control"></div>
                    <div class="form-group"><label>Usuario</label><input type="text" name="username" class="form-control" required></div>
                    <div class="form-group"><label>Correo Electrónico</label><input type="email" name="email" class="form-control" required></div>
                    <div class="form-group"><label>Teléfono</label><input type="text" name="telephone" class="form-control"></div>
                    <div class="form-group"><label>Contraseña</label><input type="password" name="password_1" class="form-control" required></div>
                    <div class="form-group"><label>Confirmar Contraseña</label><input type="password" name="password_2" class="form-control" required></div>
                    <div class="form-group"><label>Rango</label>
                        <select name="rank" class="form-control">
                            <option value="1">Asesor</option>
                            <option value="2">Administrador</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer"><button type="submit" class="btn btn-primary">Guardar</button></div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script defer src="{{ asset('assets/panel/js/users/script.js') }}"></script>
@endpush
