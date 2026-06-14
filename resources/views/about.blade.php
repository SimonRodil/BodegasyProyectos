@extends('layouts.frontend')
@section('content')
<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{ asset('assets/images/hero_bg_1.jpg') }});" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-10">
                <h1 class="mb-2">Acerca de</h1>
                <div><a href="{{ route('home') }}">Inicio</a> <span class="mx-2 text-white">&bullet;</span> <strong class="text-white">Acerca de</strong></div>
            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6" data-aos="fade-up">
                <img src="{{ asset('assets/images/about.jpg') }}" alt="Image" class="img-fluid">
            </div>
            <div class="col-md-5 ml-auto" data-aos="fade-up" data-aos-delay="100">
                <h2 class="text-primary">¿Quiénes Somos?</h2>
                <p class="lead">Somos una empresa Inmobiliaria dedicada a la comercialización de inmuebles del sector industrial y comercial, con una amplia experiencia asesorando a las mas grandes empresas colombianas, altos directivos y grandes inversionistas en la consecución del espacio (inmueble) mas adecuado para el logro de sus objetivos y actividades comerciales.</p>
            </div>
        </div>
    </div>
</div>

<div class="site-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="p-4 bg-white">
                    <h2 class="h5 text-primary">Nuestra Misión</h2>
                    <blockquote>&ldquo;Brindar el mejor servicio a cada uno de nuestros clientes, proporcionando la satisfacción de sus necesidades de espacio (inmueble), con la mas alta calidad en el servicio, trasparencia, eficiencia y dedicación de cada uno de nuestros asesores ampliamente capacitados en el área inmobiliaria.&rdquo;</blockquote>
                </div>
            </div>
            <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="p-4 bg-white">
                    <h2 class="h5 text-primary">Nuestra Visión</h2>
                    <blockquote>&ldquo;Ser una de las mejores empresas Inmobiliarias del país, reconocidos por nuestros clientes y el sector inmobiliario por la efectividad de nuestros servicios, la calidad humana y profesional de cada uno de nuestros colaboradores.&rdquo;</blockquote>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="site-section site-section-sm bg-primary" style="background-image: url({{ asset('assets/images/bg_opacity.png') }})">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h2 class="text-white">Amplia Gama de Propiedades solo para tí</h2>
                <p class="lead text-white">Estás en el sitio web donde podrás encontrar lo que estás buscando, tenemos todo en locales, bodegas, oficinas y más.</p>
            </div>
            <div class="col-md-4 text-center">
                <a href="{{ route('properties.index') }}" class="btn btn-outline-primary btn-block py-3 btn-lg">Empecemos a Buscar <i class="icon-search"></i></a>
            </div>
        </div>
    </div>
</div>
@endsection
