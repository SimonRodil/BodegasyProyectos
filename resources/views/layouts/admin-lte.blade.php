@extends('adminlte::page')

@section('title', $title ?? config('adminlte.title', ''))

@section('content_header')
<div class="d-flex justify-content-between align-items-center">
    <h4 class="mb-0">@yield('page-title', 'Panel de Administración')</h4>
    @yield('content_header_extra')
</div>
@stop

@section('adminlte_css_pre')
<link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
@stop

@section('adminlte_css')
@stack('styles')
@yield('styles')
<link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/png">
@stop

@section('adminlte_js')
<script>window.__adminReady=function(fn){if(window.jQuery)jQuery(fn);else{(window.__adminQueue=window.__adminQueue||[]).push(fn);}};</script>
@stack('scripts')
@yield('scripts')
<script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}" defer></script>
@stop
