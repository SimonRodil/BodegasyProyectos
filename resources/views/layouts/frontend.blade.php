<!DOCTYPE html>
<html lang="es">
<head>
    <title>{{ $title ?? config('app.name') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @vite(['resources/css/frontend.css', 'resources/js/frontend.js'])
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500">
    <link rel="stylesheet" href="{{ asset('assets/fonts/icomoon/style.css') }}">
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/png">
    <meta name="keywords" content="arrienda, venta, alquiler, administracion, bodegas, locales, oficinas, consultorios, medellin, antioquia, colombia, departamentos, apartamentos, casa, lotes, oferta, promocion, comodo, varato, accesible, alcance, real estate"/>
    <meta name="description" content="Somos una empresa Inmobiliaria dedicada a la comercialización de inmuebles del sector industrial y comercial.">
    <link rel="stylesheet" href="{{ asset('assets/fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fl-bigmug-line.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/floating-wpp.css') }}">
    @stack('styles')
</head>
<body>
    <div class="site-loader"></div>
    <div class="site-wrap">
        <div class="site-mobile-menu">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>

        <div class="border-bottom bg-primary text-white top-bar" data-aos="fade-down">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-6 col-md-6">
                        <p class="mb-0">
                            <a href="tel:3015328300" class="mr-3 text-white">
                                <span class="text-white fl-bigmug-line-phone351"></span>
                                <span class="d-none d-md-inline-block ml-2">(+57) 301 532 83 00</span>
                            </a>
                            <a href="mailto:comercial@bodegasyproyectos.com" class="text-white">
                                <span class="text-white fl-bigmug-line-email64"></span>
                                <span class="d-none d-md-inline-block ml-2">comercial@bodegasyproyectos.com</span>
                            </a>
                        </p>
                    </div>
                    <div class="col-6 col-md-6 text-right text-white">
                        <a href="https://www.facebook.com/bodegasyproyectos" class="mr-3"><span class="text-white icon-facebook"></span></a>
                        <a href="https://www.linkedin.com/in/bodegasyproyectos" class="mr-3"><span class="text-white icon-linkedin"></span></a>
                        <a href="https://twitter.com/bodegasyproyect" class="mr-3"><span class="text-white icon-twitter"></span></a>
                        <a href="https://www.instagram.com/bodegasyproyectos/" class="mr-0"><span class="text-white icon-instagram"></span></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="site-navbar">
            <div class="container py-1">
                <div class="row align-items-center">
                    <div class="col-8 col-md-8 col-lg-4" data-aos="fade-down" data-aos-delay="100">
                        <h1>
                            <a href="{{ route('home') }}" class="h5 text-uppercase text-black">
                                <img src="{{ asset('assets/images/logo.png') }}" class="img-fluid" height="50">
                            </a>
                        </h1>
                    </div>
                    <div class="col-4 col-md-4 col-lg-8">
                        <nav class="site-navigation text-right text-md-right" role="navigation">
                            <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3">
                                <a href="javascript:;" class="site-menu-toggle js-menu-toggle text-black">
                                    <span class="icon-menu h3"></span>
                                </a>
                            </div>
                            @include('partials.frontend-menu')
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        @yield('content')
    </div>

    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3" data-aos="fade-up">
                    <div class="mb-5">
                        <h3 class="footer-heading mb-4">SOBRE NOSOTROS</h3>
                        <p>Somos una Red de Profesionales con la mayor experiencia en finca Raíz y el Sector Inmobiliario. Nuestra Agencia te Ofrece Importantes Proyectos en Alquiler, Venta y Administración de Bodegas, Oficinas, Locales, Lotes y Consultorios.</p>
                    </div>
                </div>
                <div class="col-lg-3 mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
                    <div class="row mb-5">
                        <div class="col-md-12">
                            <h3 class="footer-heading mb-4">Menú de Navegación</h3>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="{{ route('home') }}">Inicio</a></li>
                                <li><a href="{{ route('about') }}">Acerca de</a></li>
                                <li><a href="{{ route('blog.index') }}">Blog</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="{{ route('properties.filter') }}?t=1">Venta</a></li>
                                <li><a href="{{ route('properties.filter') }}?t=2">Arriendo</a></li>
                                <li><a href="{{ route('contact.show') }}">Contáctanos</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="200">
                    <h3 class="footer-heading mb-4">Siguenos</h3>
                    <div>
                        <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                        <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                        <a href="https://instagram.com/bodegasyespacios" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                        <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a><br><br>
                        <p class="mb-0 font-weight-bold">Teléfono</p>
                        <p class="mb-4"><a href="tel:0057301 532 83 00">(+57) 301 532 83 00</a></p>
                        <p class="mb-0 font-weight-bold">Correo Electrónico</p>
                        <p class="mb-4"><a href="mailto:comercial@bodegasyproyectos.com">comercial@bodegasyproyectos.com</a></p>
                        <p class="mb-0 font-weight-bold">Dirección</p>
                        <p class="mb-0">Circular 2 # 70 - 24 of 806, Laureles<br>Medellín - Colombia.</p>
                    </div>
                </div>
                <div class="col-lg-3 mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="300">
                    <div class="mb-5 text-center">
                        <h3 class="footer-heading mb-4">OFERTE con NOSOTROS</h3>
                        <h1 class="text-white"><span class="icon icon-home"></span></h1>
                        <h3 class="px-2">Oferte su Propiedad con Nosotros</h3>
                        <a href="{{ route('contact.show') }}" class="btn btn-primary rounded-0 mt-4 letter-spacing-1">OFERTAR</a>
                    </div>
                </div>
            </div>
            <div class="row pt-5 mt-5 text-center">
                <div class="col-md-12">
                    <p>Copyright &copy; {{ date('Y') }} Todos los derechos reservados | Desarrollado por <a href="https://wa.me/584121656014" target="_blank"><img src="{{ asset('assets/images/logo_sr.png') }}" height="15" style="margin-bottom: 1px"></a></p>
                </div>
            </div>
        </div>
    </footer>

    <div class="wpp-plugin"></div>
    @stack('scripts')
</body>
</html>
