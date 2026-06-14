@extends('layouts.admin')
@section('page-title', 'Contacto')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary"><h4 class="card-title">Mensajes de Contacto</h4></div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="contact-table">
                        <thead><tr><th>ID</th><th>Nombre</th><th>Correo</th><th>Mensaje</th><th>Estado</th><th>Acciones</th></tr></thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$('#contact-table').DataTable({
    ajax: { url: '{{ route("admin.contacto.index") }}', dataSrc: '' },
    columns: [
        { data: 'id' }, { data: 'name' }, { data: 'email' }, { data: 'message' },
        { data: 'estatus', render: function(d) { return ['Nuevo','Leído','Respondido','Archivado','Eliminado'][d] || d; } },
        { data: null, render: function(d) {
            return '<button class="btn btn-info btn-sm" onclick="responder('+d.id+')"><i class="material-icons">reply</i></button> ';
        }}
    ]
});
function responder(id) {
    Swal.fire({
        title: 'Responder',
        input: 'textarea',
        showCancelButton: true,
        confirmButtonText: 'Enviar',
        preConfirm: function(msg) {
            return $.post('{{ url("admin/contacto") }}/'+id+'/reply', {message: msg, _token: '{{ csrf_token() }}'})
                .then(function() { Swal.fire('Enviado','','success'); });
        }
    });
}
</script>
@endpush
