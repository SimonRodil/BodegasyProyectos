<div>
    <div class="row mb-3">
        <div class="col-md-6">
            <input wire:model.live.debounce.300ms="search" type="search" class="form-control" placeholder="Buscar por nombre, usuario o email...">
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('admin.usuarios.create') }}" class="btn btn-primary btn-sm">
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
                    <th wire:click="sortBy('username')" style="cursor:pointer">
                        Usuario {!! $sortField === 'username' ? ($sortDirection === 'asc' ? '&#9650;' : '&#9660;') : '' !!}
                    </th>
                    <th wire:click="sortBy('name')" style="cursor:pointer">
                        Nombre {!! $sortField === 'name' ? ($sortDirection === 'asc' ? '&#9650;' : '&#9660;') : '' !!}
                    </th>
                    <th wire:click="sortBy('email')" style="cursor:pointer">
                        Email {!! $sortField === 'email' ? ($sortDirection === 'asc' ? '&#9650;' : '&#9660;') : '' !!}
                    </th>
                    <th>Rango</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $u)
                <tr>
                    <td>{{ $u->id }}</td>
                    <td>{{ $u->username }}</td>
                    <td>{{ $u->name }}</td>
                    <td>{{ $u->email }}</td>
                    <td>{{ $u->isAdmin() ? 'Admin' : 'Asesor' }}</td>
                    <td>
                        <div class="dropdown dropleft">
                            <button type="button" class="btn btn-sm px-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none; background:none; color:#6c757d;">
                                <i class="fas fa-bars"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right shadow-sm" style="min-width:180px; border:1px solid #e9ecef;">
                                <a href="{{ route('admin.usuarios.show', $u) }}" class="dropdown-item py-2">
                                    <i class="fas fa-eye mr-2" style="width:16px; color:inherit;"></i> Ver
                                </a>
                                <a href="{{ route('admin.usuarios.edit', $u) }}" class="dropdown-item py-2">
                                    <i class="fas fa-edit mr-2" style="width:16px; color:inherit;"></i> Editar
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="{{ route('admin.usuarios.foto', $u) }}" class="dropdown-item py-2">
                                    <i class="fas fa-camera mr-2" style="width:16px; color:inherit;"></i> Foto de perfil
                                </a>
                                <div class="dropdown-divider"></div>
                                <button class="dropdown-item py-2" onclick="if(confirm('¿Eliminar {{ $u->name }}?')) { @this.call('deleteUser', {{ $u->id }}) }" style="color:#dc3545;">
                                    <i class="fas fa-trash mr-2" style="width:16px;"></i> Eliminar
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">No se encontraron usuarios</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="row">
        <div class="col-md-12">
            {{ $users->links() }}
        </div>
    </div>
</div>
