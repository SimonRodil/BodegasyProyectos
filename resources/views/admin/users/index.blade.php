@extends('layouts.admin-lte')
@section('page-title', 'Usuarios')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"><h3 class="card-title">Usuarios</h3></div>
            <div class="card-body p-0">
                @livewire('admin-users-table')
            </div>
        </div>
    </div>
</div>
@endsection
