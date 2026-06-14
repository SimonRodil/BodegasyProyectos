<ul class="site-menu js-clone-nav d-none d-lg-block">
    <li><a href="{{ route('home') }}">Inicio</a></li>
    <li class="has-children">
        <a href="javascript:;">Propiedades</a>
        <ul class="dropdown">
            <li class="has-children">
                <a href="javascript:;">Arriendo</a>
                <ul class="dropdown">
                    <li><a href="{{ route('properties.filter') }}?tipo_oferta=2&tipo_propiedad=Locales">Locales</a></li>
                    <li><a href="{{ route('properties.filter') }}?tipo_oferta=2&tipo_propiedad=Casas">Casas</a></li>
                    <li><a href="{{ route('properties.filter') }}?tipo_oferta=2&tipo_propiedad=Oficinas">Oficinas</a></li>
                    <li><a href="{{ route('properties.filter') }}?tipo_oferta=2&tipo_propiedad=Bodegas">Bodegas</a></li>
                    <li><a href="{{ route('properties.filter') }}?tipo_oferta=2&tipo_propiedad=Lotes">Lotes</a></li>
                </ul>
            </li>
            <li class="has-children">
                <a href="javascript:;">Venta</a>
                <ul class="dropdown">
                    <li><a href="{{ route('properties.filter') }}?tipo_oferta=1&tipo_propiedad=Locales">Locales</a></li>
                    <li><a href="{{ route('properties.filter') }}?tipo_oferta=1&tipo_propiedad=Casas">Casas</a></li>
                    <li><a href="{{ route('properties.filter') }}?tipo_oferta=1&tipo_propiedad=Oficinas">Oficinas</a></li>
                    <li><a href="{{ route('properties.filter') }}?tipo_oferta=1&tipo_propiedad=Bodegas">Bodegas</a></li>
                    <li><a href="{{ route('properties.filter') }}?tipo_oferta=1&tipo_propiedad=Lotes">Lotes</a></li>
                </ul>
            </li>
        </ul>
    </li>
    <li><a href="{{ route('services') }}">Servicios</a></li>
    <li><a href="{{ route('blog.index') }}">Blog</a></li>
    <li><a href="{{ route('about') }}">Sobre nosotros</a></li>
    <li><a href="{{ route('contact.show') }}">Contacto</a></li>
</ul>
