@extends('layouts.frontend')
@section('content')
<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{ asset('assets/images/hero_bg_3.jpg') }});" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-10">
                <h1 class="mb-2">Blog</h1>
                <div><a href="{{ route('home') }}">Inicio</a> <span class="mx-2 text-white">&bullet;</span> <strong class="text-white">Blog</strong></div>
            </div>
        </div>
    </div>
</div>

@if(count($posts))
<div class="site-section">
    <div class="container">
        <div class="row">
            @foreach($posts as $post)
            <div class="col-md-6 col-lg-4 mb-5">
                <a href="{{ route('blog.show', ['id' => $post->id]) }}"><img src="{{ asset('assets/images/blog/' . $post->image) }}" alt="Image" class="img-fluid"></a>
                <div class="p-4 bg-white">
                    <span class="d-block text-secondary small text-uppercase">{{ $post->to_publish ? $post->to_publish->format('d/m/Y') : '' }}</span>
                    <h2 class="h5 text-black mb-3"><a href="{{ route('blog.show', ['id' => $post->id]) }}">{{ $post->title }}</a></h2>
                    <p>{{ strip_tags(Str::limit($post->content, 200)) }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif
@endsection
