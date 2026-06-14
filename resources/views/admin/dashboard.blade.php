@extends('layouts.admin-lte')
@section('page-title', 'Dashboard')
@section('content')
<div class="row">
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $properties }}</h3>
                <p>Propiedades Registradas</p>
            </div>
            <div class="icon"><i class="fas fa-store"></i></div>
            <a href="{{ route('admin.propiedades.index') }}" class="small-box-footer">Ver más <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    @if(auth()->user()->rank > 1)
    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $advisors }}</h3>
                <p>Asesores Registrados</p>
            </div>
            <div class="icon"><i class="fas fa-users"></i></div>
            <a href="{{ route('admin.usuarios.index') }}" class="small-box-footer">Ver más <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    @endif
    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $messages }}</h3>
                <p>Mensajes Recibidos</p>
            </div>
            <div class="icon"><i class="fas fa-envelope"></i></div>
            <a href="{{ route('admin.mensajes.index') }}" class="small-box-footer">Ver más <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header"><h3 class="card-title">Últimas Propiedades Registradas</h3></div>
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead><tr><th>ID</th><th>Nombre</th><th>Ciudad</th></tr></thead>
                    <tbody>
                        @foreach($latestProperties as $p)
                        <tr><td>{{ $p->id }}</td><td>{{ $p->nombre }}</td><td>{{ $p->city->nombre ?? '' }}</td></tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header"><h3 class="card-title">Últimos Mensajes Registrados</h3></div>
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead><tr><th>ID</th><th>Nombre</th><th>Propiedad</th></tr></thead>
                    <tbody>
                        @foreach($latestMessages as $m)
                        <tr><td>{{ $m->id }}</td><td>{{ $m->nombre }}</td><td>{{ $m->property->nombre ?? '' }}</td></tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
