@extends('layouts.frontend')
@section('content')
<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{ $property->imagen_destacada_url }});" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-10">
                <h1 class="mb-2">{{ $property->nombre }}</h1>
                <div><a href="{{ route('home') }}">Inicio</a> <span class="mx-2 text-white">&bullet;</span> <a href="{{ route('properties.index') }}">Propiedades</a> <span class="mx-2 text-white">&bullet;</span> <strong class="text-white">{{ $property->nombre }}</strong></div>
            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-7">
                <div id="property-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ $property->imagen_destacada_url }}" alt="Image" class="img-fluid">
                        </div>
                        @foreach($property->images as $image)
                        <div class="carousel-item">
                            <img src="{{ $image->url }}" alt="Image" class="img-fluid">
                        </div>
                        @endforeach
                    </div>
                    @if(count($property->images))
                    <a class="carousel-control-prev" href="#property-carousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </a>
                    <a class="carousel-control-next" href="#property-carousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </a>
                    @endif
                </div>
            </div>
            <div class="col-md-4 ml-auto">
                <div class="p-4 border mb-3">
                    <span class="text-primary h2">${{ $property->precio_format }}</span>
                    <p><strong>{{ $property->tipo_oferta_nombre }}</strong></p>
                    @if($property->tipo_propiedad)
                    <p class="mb-0">{{ $property->tipo_propiedad }}</p>
                    @endif
                </div>
                <a href="{{ route('properties.pdf', $property->id) }}" class="btn btn-primary btn-block rounded-0 mb-3" target="_blank"><span class="icon-file-pdf-o"></span> Ficha Técnica</a>
                <div class="p-4 border">
                    <p><strong>Área:</strong> {{ $property->area }}m<sup>2</sup></p>
                    @if($property->ano)<p><strong>Año:</strong> {{ $property->ano }}</p>@endif
                    @if($property->tamano_lote)<p><strong>Tamaño Lote:</strong> {{ $property->tamano_lote }}</p>@endif
                    @if($property->banos)<p><strong>Baños:</strong> {{ $property->banos }}</p>@endif
                    <p><strong>Ciudad:</strong> {{ $property->city->nombre ?? '' }}</p>
                    <p><strong>Barrio:</strong> {{ $property->neighborhood->nombre ?? '' }}</p>
                    @if($property->direccion)<p><strong>Dirección:</strong> {{ $property->direccion }}</p>@endif
                </div>
            </div>
        </div>

        @if($property->descripcion)
        <div class="row mb-5">
            <div class="col-md-12">
                <h3 class="h5 mb-3">Descripción</h3>
                <p>{{ $property->descripcion }}</p>
            </div>
        </div>
        @endif

        @if($property->advisor)
        <div class="row mb-5">
            <div class="col-md-12">
                <h3 class="h5 mb-3">Asesor</h3>
                <div class="p-4 border d-flex">
                    <div class="mr-4">
                        <img src="{{ asset('assets/images/profile_pictures/' . ($property->advisor->profile_pic ?: 'default.jpg')) }}" alt="Image" class="img-fluid rounded-circle" style="width: 80px; height: 80px; object-fit: cover;">
                    </div>
                    <div>
                        <h4 class="h5 mb-1">{{ $property->advisor->name }}</h4>
                        <p class="mb-1">{{ $property->advisor->about_me }}</p>
                        <p><a href="tel:{{ $property->advisor->telephone }}">{{ $property->advisor->telephone }}</a></p>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="row">
            <div class="col-md-8">
                <h3 class="h5 mb-3">Contactar Asesor</h3>
                <form id="contactar-asesor" method="post" action="{{ route('properties.contact', $property->id) }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" id="nombre" name="nombre" class="form-control" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="email">Correo Electrónico</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="telefono">Teléfono</label>
                            <input type="text" id="telefono" name="telefono" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mensaje">Mensaje</label>
                        <textarea name="mensaje" id="mensaje" cols="30" rows="5" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Enviar Mensaje" class="btn btn-primary rounded-0 px-5">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@if(count($related))
<div class="site-section bg-light">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12">
                <h2>Otras Propiedades</h2>
            </div>
        </div>
        <div class="row">
            @foreach($related as $prop)
            <div class="col-md-6 col-lg-4 mb-5">
                <a href="{{ route('properties.show', $prop->id) }}" class="prop-entry d-block">
                    <figure>
                        <img src="{{ $prop->imagen_destacada_url }}" alt="Image" class="img-fluid">
                    </figure>
                    <div class="prop-text">
                        <div class="inner">
                            <span class="price rounded">${{ $prop->precio_format }}</span>
                            <h3 class="title">{{ $prop->nombre }}</h3>
                            <p class="location">{{ $prop->city->nombre ?? '' }}, {{ $prop->neighborhood->nombre ?? '' }}</p>
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


