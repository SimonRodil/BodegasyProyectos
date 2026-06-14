<form class="row mb-5" id="main-filter" action="{{ route('properties.filter') }}" method="POST">
    @csrf
    <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
        <div class="select-wrap">
            <span class="icon icon-arrow_drop_down"></span>
            <select name="tipo_oferta" class="form-control d-block rounded-0">
                <option value="-" @selected(!isset($filters['tipo_oferta']) || $filters['tipo_oferta'] == '-')>Tipo de Oferta</option>
                <option value="2" @selected(($filters['tipo_oferta'] ?? '') == '2')>Arriendo</option>
                <option value="1" @selected(($filters['tipo_oferta'] ?? '') == '1')>Venta</option>
            </select>
        </div>
    </div>
    <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
        <div class="select-wrap">
            <span class="icon icon-arrow_drop_down"></span>
            <select name="tipo_propiedad" class="form-control d-block rounded-0">
                <option value="-" @selected(!isset($filters['tipo_propiedad']) || $filters['tipo_propiedad'] == '-')>Tipo de Propiedad</option>
                <option @selected(($filters['tipo_propiedad'] ?? '') == 'Bodegas')>Bodegas</option>
                <option @selected(($filters['tipo_propiedad'] ?? '') == 'Oficinas')>Oficinas</option>
                <option @selected(($filters['tipo_propiedad'] ?? '') == 'Locales')>Locales</option>
                <option @selected(($filters['tipo_propiedad'] ?? '') == 'Lotes')>Lotes</option>
                <option @selected(($filters['tipo_propiedad'] ?? '') == 'Apartamentos')>Apartamentos</option>
                <option @selected(($filters['tipo_propiedad'] ?? '') == 'Casas')>Casas</option>
                <option @selected(($filters['tipo_propiedad'] ?? '') == 'Consultorios')>Consultorios</option>
            </select>
        </div>
    </div>
    <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
        <div class="select-wrap">
            <span class="icon icon-arrow_drop_down"></span>
            <select name="ciudad" class="form-control d-block rounded-0">
                <option value="-" @selected(!isset($filters['ciudad']) || $filters['ciudad'] == '-')>Ciudad</option>
                @foreach($cities as $city)
                <option value="{{ $city->id }}" @selected(($filters['ciudad'] ?? '') == $city->id)> {{ $city->nombre }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
        <div class="select-wrap">
            <span class="icon icon-arrow_drop_down"></span>
            <select name="barrio" class="form-control d-block rounded-0">
                <option value="-" @selected(!isset($filters['barrio']) || $filters['barrio'] == '-')>Barrio</option>
            </select>
        </div>
    </div>
    <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
        <button type="submit" class="btn btn-primary btn-block form-control-same-height rounded-0"><i class="icon-search"></i> Buscar</button>
    </div>
</form>
