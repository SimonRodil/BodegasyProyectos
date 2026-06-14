@extends('layouts.admin')
@section('page-title', 'Mensajes')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary"><h4 class="card-title">Mensajes</h4></div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="mensajes-table">
                        <thead><tr><th>ID</th><th>Nombre</th><th>Teléfono</th><th>Registrado</th><th>Acciones</th></tr></thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('assets/panel/js/mensajeria/script.js') }}"></script>
@endpush
