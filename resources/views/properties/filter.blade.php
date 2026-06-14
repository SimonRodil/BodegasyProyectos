@extends('layouts.frontend')
@section('content')
<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{ asset('assets/images/hero_bg_1.jpg') }});" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-10">
                <h1 class="mb-2">Resultados de Búsqueda</h1>
                <div><a href="{{ route('home') }}">Inicio</a> <span class="mx-2 text-white">&bullet;</span> <strong class="text-white">Resultados</strong></div>
            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        @include('partials.filter-form', ['cities' => $cities, 'filters' => $filters ?? []])
        @if(count($properties))
        <div class="row" id="properties-list">
            @foreach($properties as $property)
            <div class="col-md-6 col-lg-4 mb-5">
                <a href="{{ route('properties.show', $property->id) }}" class="prop-entry d-block">
                    <figure>
                        <img src="{{ asset('assets/images/propiedades/' . $property->imagen_destacada) }}" alt="Image" class="img-fluid">
                    </figure>
                    <div class="prop-text">
                        <div class="inner">
                            <span class="price rounded">${{ $property->precio_format }}</span>
                            <h3 class="title">{{ $property->nombre }}</h3>
                            <p class="location">{{ $property->city->nombre ?? '' }}, {{ $property->neighborhood->nombre ?? '' }}</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <div class="row mt-3">
            <div class="col-lg-12 text-center">
                {{ $total }} resultados encontrados - Página {{ $pagina }} de {{ $totalPages }}
            </div>
        </div>
        @if($totalPages > 1)
        <div class="row mt-3">
            <div class="col-lg-12 text-center">
                <nav>
                    <ul class="pagination justify-content-center">
                        @for($i = 1; $i <= $totalPages; $i++)
                        <li class="page-item {{ $i == $pagina ? 'active' : '' }}">
                            <a class="page-link" href="{{ route('properties.filter', array_merge(request()->query(), ['pagina' => $i])) }}">{{ $i }}</a>
                        </li>
                        @endfor
                    </ul>
                </nav>
            </div>
        </div>
        @endif
        @endif
    </div>
</div>
@endsection
