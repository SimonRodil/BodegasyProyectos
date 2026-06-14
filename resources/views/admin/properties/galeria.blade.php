@extends('layouts.admin-lte')
@section('page-title', 'Galería - ' . $property->nombre)
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title">Galería: {{ $property->nombre }}</h3>
                <div>
                    <a href="{{ route('admin.propiedades.show', $property) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i> Ver</a>
                    <a href="{{ route('admin.propiedades.edit', $property) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Editar</a>
                    <a href="{{ route('admin.propiedades.index') }}" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Volver</a>
                </div>
            </div>
            <div class="card-body">
                @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="row">
                    @forelse($property->images as $img)
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <img src="{{ $img->url }}" class="card-img-top" style="height:180px;object-fit:cover">
                            <div class="card-body text-center p-2">
                                <form action="{{ route('admin.galeria.destroy', $img) }}" method="POST" onsubmit="return confirm('Eliminar esta imagen?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-md-12">
                        <p class="text-muted text-center">No hay fotos en la galería</p>
                    </div>
                    @endforelse
                </div>

                <hr>
                <h5>Agregar Foto</h5>
                <form action="{{ route('admin.galeria.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="propiedad" value="{{ $property->id }}">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="file" name="image" class="form-control-file @error('image') is-invalid @enderror" required accept="image/*">
                                @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-success btn-block"><i class="fas fa-upload"></i> Subir</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
