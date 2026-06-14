@extends('layouts.admin-lte')
@section('page-title', 'Foto de Perfil - ' . ($user->name ?? $user->username))
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title">Foto de Perfil: {{ $user->name ?? $user->username }}</h3>
                <div>
                    <a href="{{ route('admin.usuarios.show', $user) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i> Ver</a>
                    <a href="{{ route('admin.usuarios.edit', $user) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Editar</a>
                    <a href="{{ route('admin.usuarios.index') }}" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Volver</a>
                </div>
            </div>
            <div class="card-body">
                @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="row">
                    <div class="col-md-6 text-center">
                        <h5>Foto Actual</h5>
                        <img id="profile-pic-img" src="{{ $user->profile_pic_url }}" class="img-fluid img-thumbnail rounded-circle" style="max-width:250px">
                    </div>
                    <div class="col-md-6">
                        <h5>Subir Nueva Foto</h5>
                        <form id="form-foto-perfil" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user" value="{{ $user->id }}">
                            <div class="form-group">
                                <div id="select-foto-perfil">
                                    <input type="file" name="image" class="form-control-file" id="input-foto-perfil" accept="image/*">
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

    $('#input-foto-perfil').on('change', function() {
        var file = this.files[0];
        if (!file) return;

        var formData = new FormData();
        formData.append('image', file);
        formData.append('_token', '{{ csrf_token() }}');

        $.ajax({
            url: '{{ route("admin.usuarios.tmp-upload") }}',
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function() {
                $('#select-foto-perfil').hide();
                $('#lets-croppie').hide();
            },
            success: function(filename) {
                $('#lets-croppie').show();
                $('#croppie-actions').show();
                basic.croppie('bind', {
                    url: '{{ asset("storage/assets/images/profile_pictures/tmp") }}/' + filename
                }).then(function() {
                    $('.save-croppie').prop('disabled', false).removeClass('btn-disabled');
                });
            },
            error: function() {
                alert('Error al subir la imagen');
                $('#select-foto-perfil').show();
            }
        });
    });

    $('.save-croppie').on('click', function() {
        basic.croppie('result', { type: 'base64', format: 'jpeg', size: { width: 600, height: 600 } })
            .then(function(base64) {
                $.ajax({
                    url: '{{ route("admin.usuarios.foto-upload", $user) }}',
                    method: 'POST',
                    data: {
                        image: base64,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $('#profile-pic-img').attr('src', response.profile_pic
                            ? '{{ asset("storage/assets/images/profile_pictures") }}/' + response.profile_pic
                            : base64
                        );
                        $('#lets-croppie').hide();
                        $('#croppie-actions').hide();
                        $('#select-foto-perfil').show();
                        $('#form-foto-perfil')[0].reset();
                        $('.save-croppie').prop('disabled', true);
                        Swal.fire('Excelente', 'Foto de perfil actualizada', 'success');
                    },
                    error: function() {
                        Swal.fire('Error', 'No se pudo guardar la foto', 'error');
                    }
                });
            });
    });

    $('.try-another-image').on('click', function() {
        $('#form-foto-perfil')[0].reset();
        $('#lets-croppie').hide();
        $('#croppie-actions').hide();
        $('#select-foto-perfil').show();
        $('.save-croppie').prop('disabled', true);
    });
});
</script>
@endpush
