# Bodegas y Proyectos

Sistema inmobiliario para gestión de propiedades, consultas y contenido. Migrado de PHP legacy a Laravel 11.

## Requisitos

- PHP 8.2+
- Composer
- MySQL 8+
- Node.js (opcional, para assets)

## Instalación

```bash
git clone <repo-url>
cd BodegasyProyectos

composer install

cp .env.example .env
# Editar .env con credenciales de base de datos

php artisan key:generate
php artisan storage:link
php artisan migrate --seed
```

## Servir

```bash
php artisan serve
# http://localhost:8000
```

## Rutas

### Frontend público

| Ruta | Descripción |
|---|---|
| `/` | Inicio |
| `/acerca-de` | Sobre nosotros |
| `/servicios` | Servicios |
| `/blog` | Blog |
| `/blog/{slug}` | Artículo |
| `/contacto` | Contacto |
| `/propiedades` | Propiedades |
| `/propiedades/{slug}` | Detalle propiedad |
| `/ficha-tecnica/{id}` | Ficha técnica (PDF) |

### Panel admin

| Ruta | Descripción |
|---|---|
| `/admin/login` | Login |
| `/admin/dashboard` | Dashboard |
| `/admin/propiedades` | CRUD propiedades |
| `/admin/usuarios` | CRUD usuarios |
| `/admin/ciudades` | CRUD ciudades |
| `/admin/barrios` | CRUD barrios |
| `/admin/blog` | CRUD blog |
| `/admin/mensajes` | Mensajería |
| `/admin/contacto` | Mensajes contacto |
| `/admin/perfil` | Perfil de usuario |
| `/admin/reportes` | Reportes |

Login por defecto: `admin` / `admin123`

## Seed personalizado

Para crear un usuario admin adicional con tus datos personales, agrega estas variables a `.env` (archivo local, no se sube al repo):

```bash
ADMIN_USERNAME=tu_usuario
ADMIN_NAME=Tu Nombre
ADMIN_EMAIL=tu@email.com
ADMIN_PASSWORD=tu_contraseña
ADMIN_RANK=1
```

Luego ejecuta:

```bash
php artisan migrate:fresh --seed
```

## Stack

- **Framework:** Laravel 11
- **Base de datos:** MySQL
- **Frontend:** Blade + assets originales (CSS/JS/libs)
- **PDF:** mpdf
- **Auth:** Sesión con hash híbrido (Laravel Hash + legacy compatible)
