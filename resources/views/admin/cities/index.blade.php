@extends('layouts.admin-lte')
@section('page-title', 'Ciudades y Barrios')
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title">Ciudades</h3>
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#nueva-ciudad"><i class="fas fa-plus"></i> Nueva</button>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped" id="ciudades-table">
                    <thead><tr><th>Nombre</th><th>Acciones</th></tr></thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title">Barrios</h3>
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#nuevo-barrio"><i class="fas fa-plus"></i> Nuevo</button>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped" id="barrios-table">
                    <thead><tr><th>Nombre</th><th>Ciudad</th><th>Acciones</th></tr></thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="nueva-ciudad" tabindex="-1">
    <div class="modal-dialog"><div class="modal-content">
        <form action="{{ route('admin.ciudades.store') }}" method="POST">
            @csrf
            <div class="modal-header"><h5 class="modal-title">Nueva Ciudad</h5><button type="button" class="close" data-dismiss="modal">&times;</button></div>
            <div class="modal-body">
                <div class="form-group"><label>Nombre</label><input type="text" name="nombre" class="form-control" required></div>
            </div>
            <div class="modal-footer"><button type="submit" class="btn btn-primary">Guardar</button></div>
        </form>
    </div></div>
</div>

<div class="modal fade" id="nuevo-barrio" tabindex="-1">
    <div class="modal-dialog"><div class="modal-content">
        <form action="{{ route('admin.barrios.store') }}" method="POST">
            @csrf
            <div class="modal-header"><h5 class="modal-title">Nuevo Barrio</h5><button type="button" class="close" data-dismiss="modal">&times;</button></div>
            <div class="modal-body">
                <div class="form-group"><label>Nombre</label><input type="text" name="nombre" class="form-control" required></div>
                <div class="form-group"><label>Ciudad</label>
                    <select name="ciudad" class="form-control" required>
                        @foreach(\App\Models\City::all() as $c)
                        <option value="{{ $c->id }}">{{ $c->nombre }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer"><button type="submit" class="btn btn-primary">Guardar</button></div>
        </form>
    </div></div>
</div>
@endsection

@push('scripts')
<script defer src="{{ asset('assets/panel/js/ciudades-barrios/ciudades.js') }}"></script>
@endpush
