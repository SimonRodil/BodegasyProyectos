@extends('layouts.admin')
@section('page-title', 'Dashboard')
@section('content')
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon"><i class="material-icons">store</i></div>
                <p class="card-category">Propiedades Registradas</p>
                <h3 class="card-title">{{ $properties }}</h3>
            </div>
        </div>
    </div>
    @if(auth()->user()->rank > 1)
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
                <div class="card-icon"><i class="material-icons">people</i></div>
                <p class="card-category">Asesores Registrados</p>
                <h3 class="card-title">{{ $advisors }}</h3>
            </div>
        </div>
    </div>
    @endif
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon"><i class="material-icons">speaker_notes</i></div>
                <p class="card-category">Mensajes Recibidos</p>
                <h3 class="card-title">{{ $messages }}</h3>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Últimas Propiedades Registradas</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
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
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Últimos Mensajes Registrados</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
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
</div>
@endsection
