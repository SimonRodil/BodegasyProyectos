@extends('layouts.admin')
@section('page-title', 'Ciudades y Barrios')
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header card-header-primary d-flex justify-content-between">
                <h4 class="card-title">Ciudades</h4>
                <button class="btn btn-white btn-sm" data-toggle="modal" data-target="#nueva-ciudad"><i class="material-icons">add</i> Nueva</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="ciudades-table">
                        <thead><tr><th>Nombre</th><th>Acciones</th></tr></thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header card-header-primary d-flex justify-content-between">
                <h4 class="card-title">Barrios</h4>
                <button class="btn btn-white btn-sm" data-toggle="modal" data-target="#nuevo-barrio"><i class="material-icons">add</i> Nuevo</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="barrios-table">
                        <thead><tr><th>Nombre</th><th>Ciudad</th><th>Acciones</th></tr></thead>
                        <tbody></tbody>
                    </table>
                </div>
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
<script src="{{ asset('assets/panel/js/ciudades-barrios/ciudades.js') }}"></script>
@endpush
