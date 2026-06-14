@extends('layouts.frontend')
@section('content')
<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{ asset('assets/images/hero_bg_4.jpg') }});" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-10">
                <h1 class="mb-2">Contáctanos</h1>
                <div><a href="{{ route('home') }}">Inicio</a> <span class="mx-2 text-white">&bullet;</span> <strong class="text-white">Contáctanos</strong></div>
            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="row">
            <div class="col-lg-7">
                <h2 class="h4 mb-4">Formulario de Contacto</h2>
                <form id="form-contact" method="post" action="{{ route('contact.send') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="name">Nombre</label>
                            <input type="text" id="name" name="name" class="form-control form-control-lg" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="email">Correo Electrónico</label>
                            <input type="email" id="email" name="email" class="form-control form-control-lg" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="telephone">Teléfono</label>
                            <input type="text" id="telephone" name="telephone" class="form-control form-control-lg">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="subject">Asunto</label>
                            <input type="text" id="subject" name="subject" class="form-control form-control-lg">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="message">Mensaje</label>
                            <textarea name="message" id="message" cols="30" rows="7" class="form-control form-control-lg" required></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 form-group">
                            <input type="submit" value="Enviar Mensaje" class="btn btn-primary btn-lg text-white rounded-0 px-5">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 ml-auto">
                <h2 class="h4 mb-4">Información de Contacto</h2>
                <address>
                    <strong>Dirección:</strong><br>
                    Circular 2 # 70 - 24 of 806, Laureles<br>
                    Medellín - Colombia.<br><br>
                    <strong>Teléfono:</strong><br>
                    <a href="tel:3015328300">(+57) 301 532 83 00</a><br><br>
                    <strong>Correo Electrónico:</strong><br>
                    <a href="mailto:comercial@bodegasyproyectos.com">comercial@bodegasyproyectos.com</a>
                </address>
            </div>
        </div>
    </div>
</div>
@endsection

