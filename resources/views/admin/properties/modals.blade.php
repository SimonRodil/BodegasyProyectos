<div class="modal fade" id="nuevo-registro" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('admin.propiedades.store') }}" method="POST" send="new">
                @csrf
                <div class="modal-header"><h5 class="modal-title">Nueva Propiedad</h5><button type="button" class="close" data-dismiss="modal">&times;</button></div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6"><div class="form-group"><label>Nombre</label><input type="text" name="nombre" class="form-control" required></div></div>
                        <div class="col-md-6"><div class="form-group"><label>Tipo de Propiedad</label>
                            <select name="tipo_propiedad" class="form-control">
                                <option>Bodegas</option><option>Oficinas</option><option>Locales</option><option>Lotes</option><option>Apartamentos</option><option>Casas</option><option>Consultorios</option>
                            </select></div></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><div class="form-group"><label>Tipo de Oferta</label>
                            <select name="tipo_oferta" class="form-control" required>
                                <option value="1">Venta</option><option value="2">Arriendo</option>
                            </select></div></div>
                        <div class="col-md-4"><div class="form-group"><label>Precio</label><input type="number" name="precio" class="form-control"></div></div>
                        <div class="col-md-4"><div class="form-group"><label>Área (m2)</label><input type="number" name="area" class="form-control"></div></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><div class="form-group"><label>Baños</label><input type="text" name="banos" class="form-control"></div></div>
                        <div class="col-md-4"><div class="form-group"><label>Año</label><input type="number" name="ano" class="form-control"></div></div>
                        <div class="col-md-4"><div class="form-group"><label>Tamaño Lote</label><input type="text" name="tamano_lote" class="form-control"></div></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"><div class="form-group"><label>Ciudad</label>
                            <select name="ciudad" class="form-control select-ciudad">
                                @foreach(\App\Models\City::all() as $c)
                                <option value="{{ $c->id }}">{{ $c->nombre }}</option>
                                @endforeach
                            </select></div></div>
                        <div class="col-md-6"><div class="form-group"><label>Barrio</label>
                            <select name="barrio" class="form-control select-barrio"><option value="">Seleccione</option></select></div></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"><div class="form-group"><label>Dirección</label><input type="text" name="direccion" class="form-control"></div></div>
                        <div class="col-md-6"><div class="form-group"><label>Video (URL)</label><input type="text" name="video" class="form-control"></div></div>
                    </div>
                    <div class="form-group"><label>Descripción</label><textarea name="descripcion" class="form-control" rows="3"></textarea></div>
                    <input type="hidden" name="asesor" value="{{ auth()->id() }}">
                </div>
                <div class="modal-footer"><button type="submit" class="btn btn-primary">Guardar</button></div>
            </form>
        </div>
    </div>
</div>
