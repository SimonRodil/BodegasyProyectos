@extends('layouts.frontend')
@section('content')
<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{ asset('assets/images/hero_bg_3.jpg') }});" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-10">
                <h1 class="mb-2">{{ $post->title }}</h1>
                <div><a href="{{ route('home') }}">Inicio</a> <span class="mx-2 text-white">&bullet;</span> <a href="{{ route('blog.index') }}">Blog</a> <span class="mx-2 text-white">&bullet;</span> <strong class="text-white">{{ $post->title }}</strong></div>
            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-8">
                @if($post->image)
                <img src="{{ asset('assets/images/blog/' . $post->image) }}" alt="Image" class="img-fluid">
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <p class="mb-5"><small class="text-uppercase font-weight-bold">{{ $post->to_publish ? $post->to_publish->format('d/m/Y') : '' }}</small></p>
                <div class="mb-5">{!! nl2br(e($post->content)) !!}</div>
            </div>
        </div>
    </div>
</div>
@endsection
