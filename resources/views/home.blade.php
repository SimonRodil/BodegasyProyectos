@extends('layouts.frontend')

@section('content')
<div class="home-slider">
    <div class="site-blocks-cover" style="background-image: url({{ asset('assets/images/home-bg.JPG') }});" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="text" data-aos="fade-up">
            <h1 class="text-black" data-aos="fade-up" data-aos-delay="200">¡Bienvenido!</h1>
            <p class="mb-2 text-black" data-aos="fade-up" data-aos-delay="400"><strong>Aquí encontrarás lo que estás buscando, en un solo clíc.</strong></p>
            <a href="#filter-div" class="btn btn-primary text-uppercase rounded-0 letter-spacing-1" data-aos="fade-up" data-aos-delay="800" data-aos-anchor-placement="top-bottom"><i class="icon-search"></i> EMPEZAR</a>
        </div>
    </div>
</div>

<div class="py-5" id="filter-div">
    <div class="container">
        <form class="row" id="main-filter" action="{{ route('properties.filter') }}" method="GET">
            <div class="col-lg-12 text-center mb-4 site-section-title" data-aos="fade">
                <h2>¡Empecemos a buscar!</h2>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="select-wrap">
                    <span class="icon icon-arrow_drop_down"></span>
                    <select name="tipo_oferta" class="form-control d-block rounded-0" chosen="-" required>
                        <option value="-" selected>Tipo de Oferta</option>
                        <option value="2">Arriendo</option>
                        <option value="1">Venta</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="select-wrap">
                    <span class="icon icon-arrow_drop_down"></span>
                    <select name="tipo_propiedad" class="form-control d-block rounded-0" chosen="-">
                        <option value="-" selected>Tipo de Propiedad</option>
                        <option>Bodegas</option>
                        <option>Oficinas</option>
                        <option>Locales</option>
                        <option>Lotes</option>
                        <option>Apartamentos</option>
                        <option>Casas</option>
                        <option>Consultorios</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="select-wrap">
                    <span class="icon icon-arrow_drop_down"></span>
                    <select name="ciudad" class="form-control d-block rounded-0" chosen="-">
                        <option value="-" selected>Ciudad</option>
                        @foreach($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->nombre }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="400">
                <div class="select-wrap">
                    <span class="icon icon-arrow_drop_down"></span>
                    <select name="barrio" class="form-control d-block rounded-0" chosen="-">
                        <option value="-" selected>Barrio</option>
                        @foreach($neighborhoods as $n)
                        <option value="{{ $n->id }}">{{ $n->nombre }} ({{ $n->city->nombre ?? '' }})</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="500">
                <div class="select-wrap">
                    <span class="icon icon-arrow_drop_down"></span>
                    <select name="area" class="form-control d-block rounded-0" chosen="-">
                        <option value="-" selected>Área (m2)</option>
                        <option value="-50">Menos de 50mts</option>
                        <option value="50-100">De 50 a 100mts</option>
                        <option value="100-300">De 100 a 300mts</option>
                        <option value="300-500">De 300 a 500mts</option>
                        <option value="500-800">De 500 a 800mts</option>
                        <option value="800-1500">De 800 a 1500mts</option>
                        <option value="+1500">Más de 1500mts</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="600">
                <div class="select-wrap">
                    <span class="icon icon-arrow_drop_down"></span>
                    <select name="precio" class="form-control d-block rounded-0" chosen="-">
                        <option value="-">Todos los precios</option>
                        <option value="0-1">Entre $0 y $1 millón</option>
                        <option value="1-2">Entre $1 y $2 millones</option>
                        <option value="2-5">Entre $2 y $5 millones</option>
                        <option value="5-10">Entre $5 y $10 millones</option>
                        <option value="10-20">Entre $10 y $20 millones</option>
                        <option value="20-50">Entre $20 y $50 millones</option>
                        <option value="50-100">Entre $50 y $100 millones</option>
                        <option value="100-200">Entre $100 y $200 millones</option>
                        <option value="200-500">Entre $200 y $500 millones</option>
                        <option value="500-800">Entre $500 y $800 millones</option>
                        <option value="800-1000">Entre $800 y $1.000 millones</option>
                        <option value="+1000">Más de $1.000 millones</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="700">
                <div class="mb-4">
                    <div class="form-group">
                        <input type="text" name="codigo" class="form-control" placeholder="Código" title="Si rellena esta información, la información previamente indicada no será tomada en cuenta." autocomplete="disabled">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="800">
                <button type="submit" class="btn btn-primary btn-block form-control-same-height rounded-0"><i class="icon-search"></i> Buscar</button>
            </div>
        </form>
    </div>
</div>

<div class="site-section site-section-sm bg-light block-13">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12">
                <div class="site-section-title" data-aos="fade">
                    <h2>Mira las nuevas propiedades</h2>
                </div>
            </div>
        </div>
        <div class="propiedades row">
            @foreach($properties as $property)
            <div class="slide-one-item">
                <a href="{{ route('properties.show', $property->id) }}" class="prop-entry d-block">
                    <figure>
                        <img src="{{ $property->imagen_destacada_url }}" alt="Image" class="img-fluid">
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
        <div class="row mt-3">
            <div class="col-lg-12 text-center">
                <a href="{{ route('properties.index') }}" class="btn btn-primary text-center rounded-0 py-2 px-5">
                    <span class="icon-plus"></span> VER MÁS
                </a>
            </div>
        </div>
    </div>
</div>

<div class="site-section site-section-sm bg-primary" style="background-image: url({{ asset('assets/images/bg_opacity.png') }})">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8" data-aos="fade-up">
                <h2 class="text-white">Amplia Gama de Propiedades solo para tí</h2>
                <p class="lead text-white">Estás en el sitio web donde podrás encontrar lo que estás buscando, tenemos todo en locales, bodegas, oficinas y más.</p>
            </div>
            <div class="col-md-4 text-center" data-aos="fade-up" data-aos-delay="300">
                <a href="#filter-div" class="btn btn-outline-primary btn-block py-3 btn-lg">Empecemos a Buscar <i class="icon-search"></i></a>
            </div>
        </div>
    </div>
</div>

@if(count($blogPosts))
<div class="site-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center">
                <div class="site-section-title" data-aos="fade-up" data-aos-delay="100">
                    <h2>Nuestro Blog</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($blogPosts as $i => $post)
            <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="{{ ($i+1) }}00">
                <a href="{{ route('blog.show', ['id' => $post->id]) }}"><img src="{{ asset('assets/images/blog/' . $post->image) }}" alt="Image" class="img-fluid"></a>
                <div class="p-4 bg-white">
                    <span class="d-block text-secondary small text-uppercase">{{ $post->to_publish ? $post->to_publish->format('d/m/Y') : '' }}</span>
                    <h2 class="h5 text-black mb-3"><a href="{{ route('blog.show', ['id' => $post->id]) }}">{{ $post->title }}</a></h2>
                    {{ strip_tags(Str::limit($post->content, 200)) }}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif
@endsection

@push('scripts')
@vite(['resources/js/filtrar-propiedades.js'])
@endpush
