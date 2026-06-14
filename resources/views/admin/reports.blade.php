@extends('layouts.admin-lte')
@section('page-title', 'Reportes')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"><h3 class="card-title">Reportes de Actividad</h3></div>
            <div class="card-body p-0">
                <table class="table table-striped">
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
@endsection
