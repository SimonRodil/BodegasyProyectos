@extends('layouts.frontend')
@section('content')
<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{ asset('assets/images/hero_bg_2.jpg') }});" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-10">
                <h1 class="mb-2">Servicios</h1>
                <div><a href="{{ route('home') }}">Inicio</a> <span class="mx-2 text-white">&bullet;</span> <strong class="text-white">Servicios</strong></div>
            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="service">
                    <a href="#" data-toggle="modal" data-target="#service-1">
                        <span class="icon icon-home display-4 d-block mb-3 text-primary"></span>
                        <h3>Colocación de Inmuebles</h3>
                    </a>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="service">
                    <a href="#" data-toggle="modal" data-target="#service-2">
                        <span class="icon icon-home display-4 d-block mb-3 text-primary"></span>
                        <h3>Arriendo de Inmuebles</h3>
                    </a>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="service">
                    <a href="#" data-toggle="modal" data-target="#service-3">
                        <span class="icon icon-home display-4 d-block mb-3 text-primary"></span>
                        <h3>Venta de Inmuebles</h3>
                    </a>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="service">
                    <a href="#" data-toggle="modal" data-target="#service-4">
                        <span class="icon icon-home display-4 d-block mb-3 text-primary"></span>
                        <h3>Administración de Inmuebles</h3>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@foreach([1 => 'Colocación de Inmuebles', 2 => 'Arriendo de Inmuebles', 3 => 'Venta de Inmuebles', 4 => 'Administración de Inmuebles'] as $id => $title)
<div class="modal fade" id="service-{{ $id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary">{{ $title }}</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>Somos una empresa Inmobiliaria dedicada a la comercialización de inmuebles del sector industrial y comercial, con una amplia experiencia asesorando a las mas grandes empresas colombianas, altos directivos y grandes inversionistas en la consecución del espacio (inmueble) mas adecuado para el logro de sus objetivos y actividades comerciales.</p>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
