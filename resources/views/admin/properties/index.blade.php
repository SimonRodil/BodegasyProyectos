@extends('layouts.admin')
@section('page-title', 'Propiedades')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary d-flex justify-content-between">
                <h4 class="card-title">Propiedades</h4>
                <button class="btn btn-white btn-sm" data-toggle="modal" data-target="#nuevo-registro">
                    <i class="material-icons">add</i> Nuevo
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="propiedades-table">
                        <thead><tr><th>ID</th><th>Nombre</th><th>Ciudad</th><th>Precio</th><th>Acciones</th></tr></thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.properties.modals')
@endsection

@push('scripts')
<script src="{{ asset('assets/panel/js/propiedades/foto-destacada.js') }}" defer></script>
<script src="{{ asset('assets/panel/js/propiedades/galeria-propiedad.js') }}" defer></script>
<script>
__adminReady(function() {
    window.propiedadesTable = $('#propiedades-table').DataTable({
        ajax: { url: '{{ route("admin.propiedades.index") }}', dataSrc: '' },
        columns: [
            { data: 'id' },
            { data: 'nombre' },
            { data: 'city.nombre' },
            { data: 'precio', render: function(d) { return '$' + Number(d).toLocaleString('es-CO'); } },
            { data: null, render: function(d) { return '<button class="btn btn-info btn-sm" onclick="verPropiedad('+d.id+')"><i class="material-icons">visibility</i></button> <button class="btn btn-warning btn-sm" onclick="editarPropiedad('+d.id+')"><i class="material-icons">edit</i></button> <button class="btn btn-danger btn-sm" onclick="eliminarPropiedad('+d.id+')"><i class="material-icons">delete</i></button> <button class="btn btn-success btn-sm" onclick="fotoDestacada('+d.id+')"><i class="material-icons">photo</i></button> <button class="btn btn-primary btn-sm" onclick="galeriaPropiedad('+d.id+')"><i class="material-icons">collections</i></button>'; } }
        ]
    });

    window.verPropiedad = function(id) { $.get('{{ url("admin/propiedades") }}/'+id, function(r) { /* populate modal */ }); };
    window.editarPropiedad = function(id) { $.get('{{ url("admin/propiedades") }}/'+id, function(r) { /* populate edit modal */ }); };
    window.eliminarPropiedad = function(id) { if(confirm('¿Eliminar?')) { $.ajax({url:'{{ url("admin/propiedades") }}/'+id, method:'DELETE', data:{_token:'{{ csrf_token() }}'}, success:function(){propiedadesTable.ajax.reload()}}); } };
    window.fotoDestacada = function(id) { /* croppie modal */ };
    window.galeriaPropiedad = function(id) { /* gallery modal */ };
});
</script>
<script defer src="{{ asset('assets/panel/js/propiedades/script.js') }}"></script>
@endpush
