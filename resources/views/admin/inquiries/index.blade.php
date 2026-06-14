@extends('layouts.admin-lte')
@section('page-title', 'Mensajes')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"><h3 class="card-title">Mensajes</h3></div>
            <div class="card-body p-0">
                <table class="table table-striped" id="mensajes-table">
                    <thead><tr><th>ID</th><th>Nombre</th><th>Teléfono</th><th>Registrado</th><th>Acciones</th></tr></thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script defer src="{{ asset('assets/panel/js/mensajeria/script.js') }}"></script>
@endpush
