@extends('layouts.admin-lte')
@section('page-title', 'Foto Destacada - ' . $property->nombre)
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title">Foto Destacada: {{ $property->nombre }}</h3>
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
                    <div class="col-md-6 text-center">
                        <h5>Foto Actual</h5>
                        <img id="imagen-destacada-img" src="{{ $property->imagen_destacada_url }}" class="img-fluid img-thumbnail" style="max-height:300px">
                    </div>
                    <div class="col-md-6">
                        <h5>Subir Nueva Foto</h5>
                        <form id="form-foto-destacada" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="propiedad" value="{{ $property->id }}">
                            <div class="form-group">
                                <div id="select-foto-destacada">
                                    <input type="file" name="image" class="form-control-file" id="input-foto-destacada" accept="image/*">
                                </div>
                                <div id="lets-croppie" style="display:none" class="text-center mt-3">
                                    <div id="demo-croppie"></div>
                                    <button type="button" class="btn btn-danger mt-2 try-another-image"><i class="fas fa-redo"></i> Otra foto</button>
                                </div>
                            </div>
                        </form>
                        <div id="croppie-actions" style="display:none" class="mt-3">
                            <button type="button" class="btn btn-primary save-croppie" disabled><i class="fas fa-crop"></i> Guardar Recorte</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
__adminReady(function() {
    var basic = $('#demo-croppie').croppie({
        viewport: { width: 300, height: 300, type: 'square' },
        boundary: { width: 300, height: 300 }
    });

    $('#input-foto-destacada').on('change', function() {
        var file = this.files[0];
        if (!file) return;

        var formData = new FormData();
        formData.append('image', file);
        formData.append('_token', '{{ csrf_token() }}');

        $.ajax({
            url: '{{ route("admin.propiedades.tmp-upload") }}',
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function() {
                $('#select-foto-destacada').hide();
                $('#lets-croppie').hide();
            },
            success: function(filename) {
                $('#lets-croppie').show();
                $('#croppie-actions').show();
                basic.croppie('bind', {
                    url: '{{ asset("storage/assets/images/propiedades/tmp") }}/' + filename
                }).then(function() {
                    $('.save-croppie').prop('disabled', false).removeClass('btn-disabled');
                });
            },
            error: function() {
                alert('Error al subir la imagen');
                $('#select-foto-destacada').show();
            }
        });
    });

    $('.save-croppie').on('click', function() {
        basic.croppie('result', { type: 'base64', format: 'jpeg', size: { width: 600, height: 600 } })
            .then(function(base64) {
                $.ajax({
                    url: '{{ route("admin.propiedades.foto-destacada", $property) }}',
                    method: 'POST',
                    data: {
                        image: base64,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $('#imagen-destacada-img').attr('src', response.imagen_destacada
                            ? '{{ asset("storage/assets/images/propiedades") }}/' + response.imagen_destacada
                            : base64
                        );
                        $('#lets-croppie').hide();
                        $('#croppie-actions').hide();
                        $('#select-foto-destacada').show();
                        $('#form-foto-destacada')[0].reset();
                        $('.save-croppie').prop('disabled', true);
                        Swal.fire('Excelente', 'Foto destacada actualizada', 'success');
                    },
                    error: function() {
                        Swal.fire('Error', 'No se pudo guardar la foto', 'error');
                    }
                });
            });
    });

    $('.try-another-image').on('click', function() {
        $('#form-foto-destacada')[0].reset();
        $('#lets-croppie').hide();
        $('#croppie-actions').hide();
        $('#select-foto-destacada').show();
        $('.save-croppie').prop('disabled', true);
    });
});
</script>
@endpush
