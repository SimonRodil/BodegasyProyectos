<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Ficha Técnica - {{ $property->nombre }}</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        h1 { font-size: 18px; color: #333; }
        table { width: 100%; border-collapse: collapse; }
        td, th { padding: 8px; border: 1px solid #ddd; text-align: left; }
        .images img { width: 150px; margin: 5px; }
    </style>
</head>
<body>
    <h1>{{ $property->nombre }}</h1>
    <table>
        <tr><td><strong>Tipo de Oferta:</strong></td><td>{{ $property->tipo_oferta_nombre }}</td></tr>
        @if($property->tipo_propiedad)<tr><td><strong>Tipo de Propiedad:</strong></td><td>{{ $property->tipo_propiedad }}</td></tr>@endif
        <tr><td><strong>Precio:</strong></td><td>${{ $property->precio_format }}</td></tr>
        <tr><td><strong>Área:</strong></td><td>{{ $property->area }}m<sup>2</sup></td></tr>
        @if($property->tamano_lote)<tr><td><strong>Tamaño Lote:</strong></td><td>{{ $property->tamano_lote }}</td></tr>@endif
        @if($property->ano)<tr><td><strong>Año:</strong></td><td>{{ $property->ano }}</td></tr>@endif
        @if($property->banos)<tr><td><strong>Baños:</strong></td><td>{{ $property->banos }}</td></tr>@endif
        <tr><td><strong>Ciudad:</strong></td><td>{{ $property->city->nombre ?? '' }}</td></tr>
        <tr><td><strong>Barrio:</strong></td><td>{{ $property->neighborhood->nombre ?? '' }}</td></tr>
        @if($property->direccion)<tr><td><strong>Dirección:</strong></td><td>{{ $property->direccion }}</td></tr>@endif
        @if($property->descripcion)<tr><td><strong>Descripción:</strong></td><td>{{ $property->descripcion }}</td></tr>@endif
    </table>
    @if(count($property->images))
    <div class="images">
        <h3>Galería</h3>
        @foreach($property->images as $img)
        <img src="{{ public_path('storage/assets/images/propiedades/fotos/' . $img->imagen) }}" alt="Gallery">
        @endforeach
    </div>
    @endif
</body>
</html>
