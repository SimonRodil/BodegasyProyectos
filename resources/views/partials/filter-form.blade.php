<form class="row mb-5" id="main-filter" action="{{ route('properties.filter') }}" method="POST">
    @csrf
    <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
        <div class="select-wrap">
            <span class="icon icon-arrow_drop_down"></span>
            <select name="tipo_oferta" class="form-control d-block rounded-0">
                <option value="-" selected>Tipo de Oferta</option>
                <option value="2">Arriendo</option>
                <option value="1">Venta</option>
            </select>
        </div>
    </div>
    <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
        <div class="select-wrap">
            <span class="icon icon-arrow_drop_down"></span>
            <select name="tipo_propiedad" class="form-control d-block rounded-0">
                <option value="-" selected>Tipo de Propiedad</option>
                <option>Bodegas</option><option>Oficinas</option><option>Locales</option>
                <option>Lotes</option><option>Apartamentos</option><option>Casas</option><option>Consultorios</option>
            </select>
        </div>
    </div>
    <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
        <div class="select-wrap">
            <span class="icon icon-arrow_drop_down"></span>
            <select name="ciudad" class="form-control d-block rounded-0">
                <option value="-" selected>Ciudad</option>
                @foreach($cities as $city)
                <option value="{{ $city->id }}">{{ $city->nombre }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
        <div class="select-wrap">
            <span class="icon icon-arrow_drop_down"></span>
            <select name="barrio" class="form-control d-block rounded-0">
                <option value="-" selected>Barrio</option>
            </select>
        </div>
    </div>
    <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
        <button type="submit" class="btn btn-primary btn-block form-control-same-height rounded-0"><i class="icon-search"></i> Buscar</button>
    </div>
</form>
