<?php

return [

    'title' => 'Bodegas y Proyectos',
    'title_prefix' => '',
    'title_postfix' => ' - Panel',

    'use_ico_only' => false,
    'use_full_favicon' => true,

    'google_fonts' => [
        'allowed' => true,
    ],

    'logo' => '',
    'logo_img' => 'assets/images/logo.png',
    'logo_img_class' => 'brand-image',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'Bodegas y Proyectos',

    'auth_logo' => [
        'enabled' => true,
        'img' => [
            'path' => 'assets/images/logo.png',
            'alt' => 'Bodegas y Proyectos',
            'class' => '',
            'width' => 200,
            'height' => 60,
        ],
    ],

    'preloader' => [
        'enabled' => false,
        'mode' => 'fullscreen',
        'img' => [
            'path' => 'assets/images/logo.png',
            'alt' => 'Cargando...',
            'effect' => 'animation__shake',
            'width' => 60,
            'height' => 60,
        ],
    ],

    'usermenu_enabled' => true,
    'usermenu_header' => true,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => true,
    'usermenu_desc' => true,
    'usermenu_profile_url' => 'admin/perfil',

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => true,
    'layout_fixed_navbar' => true,
    'layout_fixed_footer' => null,
    'layout_dark_mode' => null,

    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-primary',

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-primary elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    'sidebar_mini' => 'lg',
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => true,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    'use_route_url' => false,
    'dashboard_url' => 'admin/dashboard',
    'logout_url' => 'admin/logout',
    'login_url' => 'admin/login',
    'register_url' => false,
    'password_reset_url' => false,
    'password_email_url' => false,
    'profile_url' => 'admin/perfil',
    'disable_darkmode_routes' => false,

    'laravel_asset_bundling' => 'vite',
    'laravel_css_path' => 'resources/css/admin.css',
    'laravel_js_path' => 'resources/js/admin.js',

    'menu' => [
        ['header' => 'general'],
        [
            'text' => 'Dashboard',
            'url' => 'admin/dashboard',
            'icon' => 'fas fa-fw fa-tachometer-alt',
        ],
        [
            'text' => 'Propiedades',
            'url' => 'admin/propiedades',
            'icon' => 'fas fa-fw fa-store',
            'active' => ['admin/propiedades*'],
        ],
        ['header' => 'comunicacion'],
        [
            'text' => 'Mensajes',
            'icon' => 'fas fa-fw fa-envelope',
            'active' => ['admin/mensajes*'],
            'submenu' => [
                [
                    'text' => 'Bandeja',
                    'url' => 'admin/mensajes',
                    'icon' => 'fas fa-fw fa-inbox',
                ],
                [
                    'text' => 'Contacto',
                    'url' => 'admin/contacto',
                    'icon' => 'fas fa-fw fa-id-card',
                ],
            ],
        ],
        ['header' => 'administracion'],
        [
            'text' => 'Usuarios',
            'url' => 'admin/usuarios',
            'icon' => 'fas fa-fw fa-users',
            'active' => ['admin/usuarios*'],
        ],
        [
            'text' => 'Blog',
            'url' => 'admin/blog',
            'icon' => 'fas fa-fw fa-book',
            'active' => ['admin/blog*'],
        ],
        [
            'text' => 'Ciudades',
            'url' => 'admin/ciudades',
            'icon' => 'fas fa-fw fa-map-marker-alt',
            'active' => ['admin/ciudades*', 'admin/barrios*'],
        ],
        ['header' => 'reportes'],
        [
            'text' => 'Reportes',
            'url' => 'admin/reportes',
            'icon' => 'fas fa-fw fa-chart-bar',
        ],
        ['header' => 'configuracion'],
        [
            'text' => 'Perfil',
            'url' => 'admin/perfil',
            'icon' => 'fas fa-fw fa-user',
        ],
    ],

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    'plugins' => [
        'Datatables' => ['active' => false],
        'Select2' => ['active' => false],
        'Chartjs' => ['active' => false],
        'Sweetalert2' => ['active' => false],
        'Pace' => ['active' => false],
    ],

    'iframe' => [
        'default_tab' => ['url' => null, 'title' => null],
        'buttons' => [
            'close' => true, 'close_all' => true, 'close_all_other' => true,
            'scroll_left' => true, 'scroll_right' => true, 'fullscreen' => true,
        ],
        'options' => ['loading_screen' => 1000, 'auto_show_new_tab' => true, 'use_navbar_items' => true],
    ],

    'livewire' => false,
];
