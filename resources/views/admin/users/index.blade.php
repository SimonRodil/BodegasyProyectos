@extends('layouts.admin-lte')
@section('page-title', 'Usuarios')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"><h3 class="card-title">Usuarios</h3></div>
            <div class="card-body p-0">
                <table class="table table-striped" id="usuarios-table">
                    <thead><tr><th>ID</th><th>Nombre</th><th>Email</th><th>Rango</th><th>Acciones</th></tr></thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script defer src="{{ asset('assets/panel/js/users/script.js') }}"></script>
@endpush
