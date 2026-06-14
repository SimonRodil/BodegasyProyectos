@extends('layouts.admin-lte')
@section('page-title', 'Ver Usuario')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ $user->name ?? $user->username }}</h3>
                <div class="card-tools">
                    <a href="{{ route('admin.usuarios.foto', $user) }}" class="btn btn-success btn-sm"><i class="fas fa-camera"></i> Foto</a>
                    <a href="{{ route('admin.usuarios.edit', $user) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Editar</a>
                    <a href="{{ route('admin.usuarios.index') }}" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Volver</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 text-center mb-3">
                        <img src="{{ $user->profile_pic_url }}" class="img-fluid img-thumbnail rounded-circle" style="max-width:200px">
                    </div>
                    <div class="col-md-8">
                        <table class="table table-bordered">
                            <tr><th>ID</th><td>{{ $user->id }}</td></tr>
                            <tr><th>Username</th><td>{{ $user->username }}</td></tr>
                            <tr><th>Nombre</th><td>{{ $user->name ?? '-' }}</td></tr>
                            <tr><th>Email</th><td>{{ $user->email }}</td></tr>
                            <tr><th>Rango</th><td>{{ $user->isAdmin() ? 'Admin' : 'Asesor' }}</td></tr>
                            <tr><th>Teléfono</th><td>{{ $user->telephone ?: '-' }}</td></tr>
                            <tr><th>Facebook</th><td>{{ $user->facebook ?: '-' }}</td></tr>
                            <tr><th>LinkedIn</th><td>{{ $user->linkedin ?: '-' }}</td></tr>
                            <tr><th>Twitter</th><td>{{ $user->twitter ?: '-' }}</td></tr>
                            <tr><th>Instagram</th><td>{{ $user->instagram ?: '-' }}</td></tr>
                        </table>
                    </div>
                </div>
                @if($user->about_me)
                <div class="row mt-3">
                    <div class="col-md-12">
                        <h5>Sobre mí</h5>
                        <p>{{ $user->about_me }}</p>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
