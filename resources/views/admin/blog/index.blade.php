@extends('layouts.admin')
@section('page-title', 'Blog')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary d-flex justify-content-between">
                <h4 class="card-title">Blog</h4>
                <button class="btn btn-white btn-sm" data-toggle="modal" data-target="#nuevo-registro"><i class="material-icons">add</i> Nuevo</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="blog-table">
                        <thead><tr><th>Título</th><th>Fecha</th><th>Acciones</th></tr></thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="nuevo-registro" tabindex="-1">
    <div class="modal-dialog modal-lg"><div class="modal-content">
        <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-header"><h5 class="modal-title">Nuevo Artículo</h5><button type="button" class="close" data-dismiss="modal">&times;</button></div>
            <div class="modal-body">
                <div class="form-group"><label>Imagen de Portada</label><input type="file" name="image" class="form-control-file"></div>
                <div class="form-group"><label>Título</label><input type="text" name="title" class="form-control" required></div>
                <div class="form-group"><label>Fecha de Publicación</label><input type="date" name="to_publish" class="form-control"></div>
                <div class="form-group"><label>Contenido</label><textarea name="content" class="form-control summernote" rows="10"></textarea></div>
            </div>
            <div class="modal-footer"><button type="submit" class="btn btn-primary">Guardar</button></div>
        </form>
    </div></div>
</div>
@endsection

@push('scripts')
<script defer src="{{ asset('assets/panel/js/blog/script.js') }}"></script>
@endpush
