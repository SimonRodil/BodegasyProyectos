@extends('layouts.frontend')
@section('content')
<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{ asset('assets/images/hero_bg_1.jpg') }});" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-10">
                <h1 class="mb-2">Todas las Propiedades</h1>
                <div><a href="{{ route('home') }}">Inicio</a> <span class="mx-2 text-white">&bullet;</span> <strong class="text-white">Propiedades</strong></div>
            </div>
        </div>
    </div>
</div>

@if(count($properties))
<div class="site-section">
    <div class="container">
        @include('partials.filter-form', ['cities' => $cities, 'filters' => $filters ?? []])
        <div class="row">
            @foreach($properties as $property)
            <div class="col-md-6 col-lg-4 mb-5">
                <a href="{{ route('properties.show', $property->id) }}" class="prop-entry d-block">
                    <figure>
                        <img src="{{ asset('assets/images/propiedades/' . $property->imagen_destacada) }}" alt="Image" class="img-fluid">
                    </figure>
                    <div class="prop-text">
                        <div class="inner">
                            <span class="price rounded">${{ $property->precio_format }}</span>
                            <h3 class="title">{{ $property->nombre }} ({{ $property->tipo_oferta_nombre }})</h3>
                            <p class="location">{{ $property->city->nombre ?? '' }}, {{ $property->neighborhood->nombre ?? '' }}</p>
                        </div>
                        <div class="prop-more-info">
                            <div class="inner d-flex">
                                <div class="col">
                                    <span>Área:</span>
                                    <strong>{{ $property->area }}m<sup>2</sup></strong>
                                </div>
                                <div class="col text-right">
                                    <span class="btn btn-primary btn-sm rounded-0"><span class="icon-search"></span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif
@endsection
