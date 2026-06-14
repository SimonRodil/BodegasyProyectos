<ul class="site-menu js-clone-nav d-none d-lg-block">
    <li><a href="{{ route('home') }}">Inicio</a></li>
    <li class="has-children">
        <a href="javascript:;">Propiedades</a>
        <ul class="dropdown">
            <li class="has-children">
                <a href="javascript:;">Arriendo</a>
                <ul class="dropdown">
                    <li><a href="{{ route('properties.filter') }}?t=2&p=Locales">Locales</a></li>
                    <li><a href="{{ route('properties.filter') }}?t=2&p=Casas">Casas</a></li>
                    <li><a href="{{ route('properties.filter') }}?t=2&p=Oficinas">Oficinas</a></li>
                    <li><a href="{{ route('properties.filter') }}?t=2&p=Bodegas">Bodegas</a></li>
                    <li><a href="{{ route('properties.filter') }}?t=2&p=Lotes">Lotes</a></li>
                </ul>
            </li>
            <li class="has-children">
                <a href="javascript:;">Venta</a>
                <ul class="dropdown">
                    <li><a href="{{ route('properties.filter') }}?t=1&p=Locales">Locales</a></li>
                    <li><a href="{{ route('properties.filter') }}?t=1&p=Casas">Casas</a></li>
                    <li><a href="{{ route('properties.filter') }}?t=1&p=Oficinas">Oficinas</a></li>
                    <li><a href="{{ route('properties.filter') }}?t=1&p=Bodegas">Bodegas</a></li>
                    <li><a href="{{ route('properties.filter') }}?t=1&p=Lotes">Lotes</a></li>
                </ul>
            </li>
        </ul>
    </li>
    <li><a href="{{ route('services') }}">Servicios</a></li>
    <li><a href="{{ route('blog.index') }}">Blog</a></li>
    <li><a href="{{ route('about') }}">Sobre nosotros</a></li>
    <li><a href="{{ route('contact.show') }}">Contacto</a></li>
</ul>
