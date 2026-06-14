<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\NeighborhoodController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\InquiryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ReportController;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware('admin.auth')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/propiedades/data', [PropertyController::class, 'data'])->name('propiedades.data');
        Route::resource('propiedades', PropertyController::class)->parameters(['propiedades' => 'property']);
        Route::post('propiedades/{property}/foto-destacada', [PropertyController::class, 'uploadFeaturedImage'])->name('propiedades.foto-destacada');
        Route::post('propiedades/tmp-upload', [PropertyController::class, 'tmpUpload'])->name('propiedades.tmp-upload');

        Route::get('/usuarios/data', [UserController::class, 'data'])->name('usuarios.data');
        Route::resource('usuarios', UserController::class)->parameters(['usuarios' => 'user']);
        Route::post('usuarios/{user}/foto', [UserController::class, 'uploadPhoto'])->name('usuarios.foto');
        Route::post('usuarios/tmp-upload', [UserController::class, 'tmpUpload'])->name('usuarios.tmp-upload');

        Route::get('/ciudades/data', [CityController::class, 'data'])->name('ciudades.data');
        Route::resource('ciudades', CityController::class)->parameters(['ciudades' => 'city']);

        Route::get('/barrios/data', [NeighborhoodController::class, 'data'])->name('barrios.data');
        Route::resource('barrios', NeighborhoodController::class)->parameters(['barrios' => 'neighborhood']);

        Route::get('/blog/data', [BlogController::class, 'data'])->name('blog.data');
        Route::resource('blog', BlogController::class)->parameters(['blog' => 'blogPost']);

        Route::get('/mensajes/data', [InquiryController::class, 'data'])->name('mensajes.data');
        Route::get('mensajes', [InquiryController::class, 'index'])->name('mensajes.index');
        Route::delete('mensajes/{inquiry}', [InquiryController::class, 'destroy'])->name('mensajes.destroy');

        Route::get('/contacto/data', [ContactController::class, 'data'])->name('contacto.data');
        Route::get('contacto', [ContactController::class, 'index'])->name('contacto.index');
        Route::post('contacto/{contactMessage}/reply', [ContactController::class, 'reply'])->name('contacto.reply');
        Route::delete('contacto/{contactMessage}', [ContactController::class, 'destroy'])->name('contacto.destroy');

        Route::get('perfil', [ProfileController::class, 'edit'])->name('perfil.edit');
        Route::post('perfil', [ProfileController::class, 'update'])->name('perfil.update');
        Route::post('perfil/foto', [ProfileController::class, 'uploadPhoto'])->name('perfil.foto');

        Route::post('galeria', [GalleryController::class, 'store'])->name('galeria.store');
        Route::get('galeria/{property}', [GalleryController::class, 'show'])->name('galeria.show');
        Route::delete('galeria/{image}', [GalleryController::class, 'destroy'])->name('galeria.destroy');

        Route::get('reportes', [ReportController::class, 'index'])->name('reportes.index');
    });
});
