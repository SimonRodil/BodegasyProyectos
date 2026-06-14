@php $user = \Illuminate\Support\Facades\Auth::user(); @endphp
<nav class="sidebar">
    <div class="sidebar-header">
        <a href="{{ route('admin.dashboard') }}" class="simple-text">Bodegas y Proyectos</a>
    </div>
    <ul class="nav">
        <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <i class="material-icons">dashboard</i>
                <p>Dashboard</p>
            </a>
        </li>
        <li class="nav-item {{ request()->routeIs('admin.propiedades*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.propiedades.index') }}">
                <i class="material-icons">store</i>
                <p>Propiedades</p>
            </a>
        </li>
        @if($user && $user->rank > 1)
        <li class="nav-item {{ request()->routeIs('admin.usuarios*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.usuarios.index') }}">
                <i class="material-icons">people_outline</i>
                <p>Usuarios</p>
            </a>
        </li>
        <li class="nav-item {{ request()->routeIs('admin.ciudades*') || request()->routeIs('admin.barrios*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.ciudades.index') }}">
                <i class="material-icons">tour</i>
                <p>Ciudades y Barrios</p>
            </a>
        </li>
        <li class="nav-item {{ request()->routeIs('admin.blog*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.blog.index') }}">
                <i class="material-icons">book</i>
                <p>Blog</p>
            </a>
        </li>
        @endif
        <li class="nav-item {{ request()->routeIs('admin.mensajes*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.mensajes.index') }}">
                <i class="material-icons">speaker_notes</i>
                <p>Mensajes</p>
            </a>
        </li>
        <li class="nav-item {{ request()->routeIs('admin.perfil*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.perfil.edit') }}">
                <i class="material-icons">account_circle</i>
                <p>Perfil</p>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="material-icons">exit_to_app</i>
                <p>Cerrar Sesión</p>
            </a>
            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display:none;">@csrf</form>
        </li>
    </ul>
</nav>
