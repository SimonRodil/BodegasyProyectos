<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\FichaTecnicaController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/acerca-de', [PageController::class, 'about'])->name('about');
Route::get('/servicios', [PageController::class, 'services'])->name('services');
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog-article', [BlogController::class, 'show'])->name('blog.show');
Route::get('/contacto', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contacto/enviar', [ContactController::class, 'send'])->name('contact.send');
Route::get('/propiedades', [PropertyController::class, 'index'])->name('properties.index');
Route::get('/propiedades/{id}', [PropertyController::class, 'show'])->name('properties.show');
Route::match(['get', 'post'], '/filtrar-propiedades', [PropertyController::class, 'filter'])->name('properties.filter');
Route::get('/ficha-tecnica/{id}', [FichaTecnicaController::class, 'download'])->name('properties.pdf');

require __DIR__.'/admin.php';
