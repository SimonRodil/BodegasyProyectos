@extends('layouts.admin')
@section('page-title', 'Reportes')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary"><h4 class="card-title">Reportes de Actividad</h4></div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead><tr><th>ID</th><th>Usuario</th><th>Mensaje</th><th>Fecha</th></tr></thead>
                        <tbody>
                            @foreach($reports as $r)
                            <tr><td>{{ $r->id }}</td><td>{{ $r->user }}</td><td>{{ $r->message }}</td><td>{{ $r->created_at }}</td></tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
