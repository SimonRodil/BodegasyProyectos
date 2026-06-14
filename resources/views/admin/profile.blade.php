@extends('layouts.admin-lte')
@section('page-title', 'Perfil')
@section('content_header_extra')
<a href="{{ route('home') }}" class="btn btn-outline-primary btn-sm" target="_blank"><i class="fas fa-external-link-alt"></i> Ver Sitio</a>
@stop
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"><h3 class="card-title">Mi Perfil</h3></div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-md-2 text-center">
                        <img src="{{ asset('assets/images/profile_pictures/' . ($user->profile_pic ?: 'default.jpg')) }}" alt="Photo" class="img-fluid rounded-circle" style="width: 120px; height: 120px; object-fit: cover;">
                        <button class="btn btn-sm btn-primary mt-2" data-toggle="modal" data-target="#cambiar-imagen-perfil">Cambiar Foto</button>
                    </div>
                    <div class="col-md-10">
                        <h3>{{ $user->name }}</h3>
                        <p>{{ $user->rank > 1 ? 'Asesor Ejecutivo' : 'Asesor' }}</p>
                        <p>{{ $user->email }}</p>
                    </div>
                </div>
                <form id="update-profile" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6"><div class="form-group"><label>Nombre</label><input type="text" name="name" class="form-control" value="{{ $user->name }}"></div></div>
                        <div class="col-md-6"><div class="form-group"><label>Correo Electrónico</label><input type="email" name="email" class="form-control" value="{{ $user->email }}" required></div></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"><div class="form-group"><label>Teléfono</label><input type="text" name="telephone" class="form-control" value="{{ $user->telephone }}"></div></div>
                        <div class="col-md-3"><div class="form-group"><label>Contraseña (dejar vacío para mantener)</label><input type="password" name="password_1" class="form-control"></div></div>
                        <div class="col-md-3"><div class="form-group"><label>Confirmar Contraseña</label><input type="password" name="password_2" class="form-control"></div></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"><div class="form-group"><label>Facebook</label><input type="text" name="facebook" class="form-control" value="{{ $user->facebook }}"></div></div>
                        <div class="col-md-3"><div class="form-group"><label>Instagram</label><input type="text" name="instagram" class="form-control" value="{{ $user->instagram }}"></div></div>
                        <div class="col-md-3"><div class="form-group"><label>Twitter</label><input type="text" name="twitter" class="form-control" value="{{ $user->twitter }}"></div></div>
                        <div class="col-md-3"><div class="form-group"><label>LinkedIn</label><input type="text" name="linkedin" class="form-control" value="{{ $user->linkedin }}"></div></div>
                    </div>
                    <div class="form-group"><label>Sobre Mí</label><textarea name="about_me" class="form-control" maxlength="200">{{ $user->about_me }}</textarea></div>
                    <button type="submit" class="btn btn-primary">Actualizar Cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="cambiar-imagen-perfil" tabindex="-1">
    <div class="modal-dialog"><div class="modal-content">
        <div class="modal-header"><h5 class="modal-title">Cambiar Foto de Perfil</h5><button type="button" class="close" data-dismiss="modal">&times;</button></div>
        <div class="modal-body">
            <div class="upload-demo-wrap"><div id="upload-demo"></div></div>
            <input type="file" id="upload" accept="image/*">
            <button class="btn btn-primary btn-block mt-3 upload-result">Guardar</button>
        </div>
    </div></div>
</div>
@endsection

@push('scripts')
<script defer src="{{ asset('assets/panel/js/perfil/script.js') }}"></script>
@endpush
