<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::post('/contactar-asesor', [ApiController::class, 'contactAdvisor']);
Route::get('/barrios/{ciudad}', [ApiController::class, 'neighborhoods']);
Route::post('/filtrar-propiedades', [ApiController::class, 'filterProperties']);
Route::post('/contacto', [ApiController::class, 'sendContact']);
