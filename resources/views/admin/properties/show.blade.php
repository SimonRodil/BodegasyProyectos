@extends('layouts.admin-lte')
@section('page-title', 'Ver Propiedad')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ $property->nombre }}</h3>
                <div class="card-tools">
                    <a href="{{ route('admin.propiedades.foto', $property) }}" class="btn btn-success btn-sm"><i class="fas fa-camera"></i> Foto</a>
                    <a href="{{ route('admin.propiedades.galeria', $property) }}" class="btn btn-primary btn-sm"><i class="fas fa-images"></i> Galería</a>
                    <a href="{{ route('admin.propiedades.edit', $property) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Editar</a>
                    <a href="{{ route('admin.propiedades.index') }}" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Volver</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <tr><th>ID</th><td>{{ $property->id }}</td></tr>
                            <tr><th>Nombre</th><td>{{ $property->nombre }}</td></tr>
                            <tr><th>Tipo de Propiedad</th><td>{{ $property->tipo_propiedad }}</td></tr>
                            <tr><th>Tipo de Oferta</th><td>{{ $property->tipo_oferta_nombre }}</td></tr>
                            <tr><th>Precio</th><td>${{ number_format($property->precio, 0, ',', '.') }}</td></tr>
                            <tr><th>Área (m2)</th><td>{{ $property->area }}</td></tr>
                            <tr><th>Baños</th><td>{{ $property->banos ?: '-' }}</td></tr>
                            <tr><th>Año</th><td>{{ $property->ano ?: '-' }}</td></tr>
                            <tr><th>Tamaño Lote</th><td>{{ $property->tamano_lote ?: '-' }}</td></tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <tr><th>Ciudad</th><td>{{ $property->city?->nombre ?? '-' }}</td></tr>
                            <tr><th>Barrio</th><td>{{ $property->neighborhood?->nombre ?? '-' }}</td></tr>
                            <tr><th>Dirección</th><td>{{ $property->direccion ?: '-' }}</td></tr>
                            <tr><th>Asesor</th><td>{{ $property->advisor?->name ?? '-' }}</td></tr>
                            <tr><th>Video</th><td>@if($property->video)<a href="{{ $property->video }}" target="_blank">Ver video</a>@else - @endif</td></tr>
                        </table>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <h5>Descripción</h5>
                        <p>{{ $property->descripcion ?: 'Sin descripción' }}</p>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <h5>Foto Destacada</h5>
                        <img src="{{ $property->imagen_destacada_url }}" class="img-fluid" style="max-height:300px">
                    </div>
                </div>
                @if($property->images->count() > 0)
                <div class="row mt-3">
                    <div class="col-md-12">
                        <h5>Galería ({{ $property->images->count() }} fotos)</h5>
                        <div class="row">
                            @foreach($property->images as $img)
                            <div class="col-md-3 mb-2">
                                <img src="{{ $img->url }}" class="img-fluid img-thumbnail">
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
