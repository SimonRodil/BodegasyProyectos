@extends('layouts.admin-lte')
@section('page-title', 'Nuevo Usuario')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Nuevo Usuario</h3>
                <div class="card-tools">
                    <a href="{{ route('admin.usuarios.index') }}" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Volver</a>
                </div>
            </div>
            <form action="{{ route('admin.usuarios.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Username *</label>
                                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" required>
                                @error('username')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email *</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Contraseña *</label>
                                <input type="password" name="password_1" class="form-control @error('password_1') is-invalid @enderror" required>
                                @error('password_1')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Rango</label>
                                <select name="rank" class="form-control">
                                    <option value="1" {{ old('rank') == 1 ? 'selected' : '' }}>Asesor</option>
                                    <option value="2" {{ old('rank') == 2 ? 'selected' : '' }}>Admin</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Teléfono</label>
                                <input type="text" name="telephone" class="form-control" value="{{ old('telephone') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Facebook</label>
                                <input type="text" name="facebook" class="form-control" value="{{ old('facebook') }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>LinkedIn</label>
                                <input type="text" name="linkedin" class="form-control" value="{{ old('linkedin') }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Twitter</label>
                                <input type="text" name="twitter" class="form-control" value="{{ old('twitter') }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Instagram</label>
                                <input type="text" name="instagram" class="form-control" value="{{ old('instagram') }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('admin.usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
