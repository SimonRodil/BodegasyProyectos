<div>
    <div class="row mb-3">
        <div class="col-md-6">
            <input wire:model.live.debounce.300ms="search" type="search" class="form-control" placeholder="Buscar por nombre...">
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('admin.propiedades.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Nuevo
            </a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th wire:click="sortBy('id')" style="cursor:pointer">
                        ID {!! $sortField === 'id' ? ($sortDirection === 'asc' ? '&#9650;' : '&#9660;') : '' !!}
                    </th>
                    <th wire:click="sortBy('nombre')" style="cursor:pointer">
                        Nombre {!! $sortField === 'nombre' ? ($sortDirection === 'asc' ? '&#9650;' : '&#9660;') : '' !!}
                    </th>
                    <th>Ciudad</th>
                    <th wire:click="sortBy('precio')" style="cursor:pointer">
                        Precio {!! $sortField === 'precio' ? ($sortDirection === 'asc' ? '&#9650;' : '&#9660;') : '' !!}
                    </th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($properties as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->nombre }}</td>
                    <td>{{ $p->city?->nombre }}</td>
                    <td>${{ number_format($p->precio, 0, ',', '.') }}</td>
                    <td nowrap>
                        <a href="{{ route('admin.propiedades.show', $p) }}" class="btn btn-info btn-sm" title="Ver">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.propiedades.edit', $p) }}" class="btn btn-warning btn-sm" title="Editar">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="{{ route('admin.propiedades.foto', $p) }}" class="btn btn-success btn-sm" title="Foto destacada">
                            <i class="fas fa-camera"></i>
                        </a>
                        <a href="{{ route('admin.propiedades.galeria', $p) }}" class="btn btn-primary btn-sm" title="Galería">
                            <i class="fas fa-images"></i>
                        </a>
                        <button class="btn btn-danger btn-sm" onclick="if(confirm('Eliminar {{ $p->nombre }}?')) { @this.call('deleteProperty', {{ $p->id }}) }" title="Eliminar">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">No se encontraron propiedades</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="row">
        <div class="col-md-12">
            {{ $properties->links() }}
        </div>
    </div>
</div>
