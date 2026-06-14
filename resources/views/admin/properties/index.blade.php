@extends('layouts.admin-lte')
@section('page-title', 'Propiedades')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Propiedades</h3>
            </div>
            <div class="card-body">
                @livewire('admin-properties-table')
            </div>
        </div>
    </div>
</div>
@endsection
