@extends('layouts.admin-lte')
@section('page-title', 'Nueva Propiedad')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Nueva Propiedad</h3>
                <div class="card-tools">
                    <a href="{{ route('admin.propiedades.index') }}" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Volver</a>
                </div>
            </div>
            <form action="{{ route('admin.propiedades.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nombre *</label>
                                <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}" required>
                                @error('nombre')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tipo de Propiedad</label>
                                <select name="tipo_propiedad" class="form-control">
                                    <option value="">Seleccione</option>
                                    <option value="Bodegas">Bodegas</option>
                                    <option value="Oficinas">Oficinas</option>
                                    <option value="Locales">Locales</option>
                                    <option value="Lotes">Lotes</option>
                                    <option value="Apartamentos">Apartamentos</option>
                                    <option value="Casas">Casas</option>
                                    <option value="Consultorios">Consultorios</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Tipo de Oferta *</label>
                                <select name="tipo_oferta" class="form-control @error('tipo_oferta') is-invalid @enderror" required>
                                    <option value="1" {{ old('tipo_oferta') == 1 ? 'selected' : '' }}>Venta</option>
                                    <option value="2" {{ old('tipo_oferta') == 2 ? 'selected' : '' }}>Arriendo</option>
                                </select>
                                @error('tipo_oferta')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Precio</label>
                                <input type="number" name="precio" class="form-control @error('precio') is-invalid @enderror" value="{{ old('precio') }}">
                                @error('precio')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Área (m2)</label>
                                <input type="number" name="area" class="form-control" value="{{ old('area') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Baños</label>
                                <input type="text" name="banos" class="form-control" value="{{ old('banos') }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Año</label>
                                <input type="number" name="ano" class="form-control" value="{{ old('ano') }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Tamaño Lote</label>
                                <input type="text" name="tamano_lote" class="form-control" value="{{ old('tamano_lote') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ciudad</label>
                                <select name="ciudad" class="form-control select-ciudad">
                                    <option value="">Seleccione</option>
                                    @foreach(\App\Models\City::all() as $c)
                                    <option value="{{ $c->id }}" {{ old('ciudad') == $c->id ? 'selected' : '' }}>{{ $c->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Barrio</label>
                                <select name="barrio" class="form-control select-barrio">
                                    <option value="">Seleccione</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Dirección</label>
                                <input type="text" name="direccion" class="form-control" value="{{ old('direccion') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Video (URL)</label>
                                <input type="text" name="video" class="form-control" value="{{ old('video') }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Descripción</label>
                        <textarea name="descripcion" class="form-control" rows="3">{{ old('descripcion') }}</textarea>
                    </div>
                    <input type="hidden" name="asesor" value="{{ auth()->id() }}">
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('admin.propiedades.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
__adminReady(function() {
    $('.select-ciudad').on('change', function() {
        var ciudad = $(this).val();
        var $barrio = $(this).closest('form').find('.select-barrio');
        $barrio.empty().prop('disabled', true).append('<option value="">Cargando...</option>');
        if (ciudad) {
            $.get('{{ url("api/barrios") }}/' + ciudad, function(barrios) {
                $barrio.empty().append('<option value="">Seleccione</option>');
                $.each(barrios, function(i, b) {
                    $barrio.append('<option value="' + b.id + '">' + b.nombre + '</option>');
                });
                $barrio.prop('disabled', false);
            });
        } else {
            $barrio.empty().append('<option value="">Seleccione</option>').prop('disabled', false);
        }
    });
});
</script>
@endpush
