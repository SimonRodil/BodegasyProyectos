@extends('layouts.admin-lte')
@section('page-title', 'Contacto')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"><h3 class="card-title">Mensajes de Contacto</h3></div>
            <div class="card-body p-0">
                @livewire('admin-contact-table')
            </div>
        </div>
    </div>
</div>
@endsection
